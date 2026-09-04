import re, subprocess, tempfile, os

subprocess.run(['git', 'checkout', 'HEAD', '--', 'index.html', 'home.html'])

pdf_generator_js = '''
    function downloadPropertyBrochure(brochureUrl, title, location, price, specsArea, specsFeature) {
        if (brochureUrl && brochureUrl.trim() && brochureUrl.trim() !== 'undefined' && brochureUrl.trim() !== 'null') {
            var url = brochureUrl.trim();
            if (url.startsWith('data:')) {
                try {
                    var blob = dataURLtoBlob(url);
                    var blobUrl = URL.createObjectURL(blob);
                    var filename = (title ? title.replace(/[^a-zA-Z0-9_-]/g, "_") : "Property") + "_Brochure.pdf";
                    var a = document.createElement('a');
                    a.href = blobUrl;
                    a.download = filename;
                    a.style.display = 'none';
                    document.body.appendChild(a);
                    a.click();
                    setTimeout(function() {
                        if (a.parentNode) a.parentNode.removeChild(a);
                        URL.revokeObjectURL(blobUrl);
                    }, 1000);
                    return;
                } catch(e) {}
            }
            if (url.startsWith('http://') || url.startsWith('https://')) {
                if (url.includes('drive.google.com/file/d/')) {
                    var parts = url.split('drive.google.com/file/d/');
                    var fileId = parts[1].split('/')[0].split('?')[0];
                    url = 'https://drive.google.com/uc?export=download&id=' + fileId;
                }
                var a = document.createElement('a');
                a.href = url;
                a.download = (title ? title.replace(/[^a-zA-Z0-9_-]/g, "_") : "Property") + "_Brochure.pdf";
                a.style.display = 'none';
                document.body.appendChild(a);
                a.click();
                setTimeout(function() {
                    if (a.parentNode) a.parentNode.removeChild(a);
                }, 500);
                return;
            }
        }
        generateBrochureDocFile(title, location, price, specsArea, specsFeature);
    }

    function generateBrochureDocFile(title, location, price, specsArea, specsFeature) {
        var lines = [
            "%PDF-1.4",
            "1 0 obj<</Type/Catalog/Pages 2 0 R>>endobj",
            "2 0 obj<</Type/Pages/Count 1/Kids[3 0 R]>>endobj",
            "3 0 obj<</Type/Page/MediaBox[0 0 595 842]/Parent 2 0 R/Resources<</Font<//F1 4 0 R>>>>/Contents 5 0 R>>endobj",
            "4 0 obj<</Type/Font/Subtype/Type1/BaseFont/Helvetica>>endobj",
            "5 0 obj<</Length 450>>stream",
            "BT",
            "/F1 22 Tf",
            "50 780 Td",
            "(THE ROYALE ESTATES) Tj",
            "/F1 14 Tf",
            "0 -30 Td",
            "(" + escapePdfText(title || 'Property Listing') + ") Tj",
            "/F1 11 Tf",
            "0 -25 Td",
            "(Location: " + escapePdfText(location || 'Bhiwandi, Thane') + ") Tj",
            "0 -20 Td",
            "(Price: " + escapePdfText(price || 'Contact for Price') + ") Tj",
            "0 -20 Td",
            "(Area / Specs: " + escapePdfText(specsArea || '-') + ") Tj",
            "0 -20 Td",
            "(Key Features: " + escapePdfText(specsFeature || '-') + ") Tj",
            "0 -35 Td",
            "(Official Contact: +91 93090 35119 / sales@theroyaleestates.com) Tj",
            "ET",
            "endstream",
            "endobj",
            "xref",
            "0 6",
            "0000000000 65535 f ",
            "0000000009 00000 n ",
            "0000000056 00000 n ",
            "0000000111 00000 n ",
            "0000000212 00000 n ",
            "0000000281 00000 n ",
            "trailer<</Size 6/Root 1 0 R>>",
            "startxref",
            "780",
            "%%EOF"
        ];
        var content = lines.join("\\n");
        var blob = new Blob([content], { type: 'application/pdf' });
        var blobUrl = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = blobUrl;
        a.download = (title ? title.replace(/[^a-zA-Z0-9_-]/g, "_") : "Property") + "_Brochure.pdf";
        a.style.display = 'none';
        document.body.appendChild(a);
        a.click();
        setTimeout(function() {
            if (a.parentNode) a.parentNode.removeChild(a);
            URL.revokeObjectURL(blobUrl);
        }, 1000);
    }

    function escapePdfText(str) {
        return (str || '').replace(/\\\\/g, '\\\\\\\\').replace(/\\(/g, '\\\\(').replace(/\\)/g, '\\\\)');
    }
'''

for fname in ['index.html', 'home.html']:
    filepath = '/Users/user/.gemini/antigravity-ide/scratch/assets/' + fname
    with open(filepath, 'r', encoding='utf-8') as f:
        text = f.read()

    pattern = r'function triggerUnblockedPdfDownload\(.*?\n    \}'
    if re.search(pattern, text, flags=re.DOTALL):
        text = re.sub(pattern, pdf_generator_js.strip(), text, flags=re.DOTALL)
    else:
        text = text.replace('function parseBrochureUrl', pdf_generator_js.strip() + '\n\n    function parseBrochureUrl')

    old_btn = "var brochureBtn = (item.brochure && item.brochure.trim()) ?"
    if old_btn in text:
        start_b = text.find(old_btn)
        end_b = text.find(';\n', text.find('📥 Request PDF Brochure</a>\';', start_b))
        if end_b != -1:
            new_btn_js = '''var brochureBtn = '<button type="button" onclick="downloadPropertyBrochure(\\\'' + (item.brochure || '').replace(/'/g, "\\\\'") + '\\\', \\\'' + (item.title || '').replace(/'/g, "") + '\\\', \\\'' + (item.location || '').replace(/'/g, "") + '\\\', \\\'' + (item.price || '').replace(/'/g, "") + '\\\', \\\'' + (item.specsArea || '').replace(/'/g, "") + '\\\', \\\'' + (item.specsFeature || '').replace(/'/g, "") + '\\\')" class="btn-sm" style="background: linear-gradient(135deg, #0f172a, #1e293b); color: #ffffff; font-weight: 700; padding: 8px 12px; border-radius: 10px; font-size: 0.8rem; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 4px; box-shadow: 0 4px 10px rgba(15,23,42,0.2);">📥 Download PDF Brochure</button>';'''
            text = text[:start_b] + new_btn_js.strip() + text[end_b + 1:]

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(text)

    # Validate with node --check
    scripts = re.findall(r'<script>(.*?)</script>', text, re.DOTALL)
    print(f'=== Validating {fname} scripts ({len(scripts)} scripts found) ===')
    all_ok = True
    for i, code in enumerate(scripts, 1):
        with tempfile.NamedTemporaryFile('w', suffix='.js', delete=False) as tf:
            tf.write(code)
            tf_path = tf.name
        
        p = subprocess.run(['node', '--check', tf_path], capture_output=True, text=True)
        if p.returncode != 0:
            print(f'❌ {fname} Script #{i} HAS SYNTAX ERROR:\n{p.stderr}')
            all_ok = False
        else:
            print(f'✅ {fname} Script #{i} VALID JS')
        os.remove(tf_path)

    if all_ok:
        print(f'🎉 ALL SCRIPTS IN {fname} PASSED 100% VALIDATION!\n')

