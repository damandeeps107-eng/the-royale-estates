import re, subprocess, tempfile, os

for fname in ['index.html', 'home.html']:
    filepath = '/Users/user/.gemini/antigravity-ide/scratch/assets/' + fname
    with open(filepath, 'r', encoding='utf-8') as f:
        text = f.read()

    # 1. Eliminate any whatsapp href from brochureBtn declarations
    new_brochure_btn_js = '''var brochureBtn = '<button type="button" onclick="downloadPdfDirect(\\\'' + (item.brochure || '').replace(/'/g, "\\\\'") + '\\\', \\\'' + (item.title || '').replace(/'/g, "") + '\\\', \\\'' + (item.location || '').replace(/'/g, "") + '\\\', \\\'' + (item.price || '').replace(/'/g, "") + '\\\', \\\'' + (item.specsArea || '').replace(/'/g, "") + '\\\', \\\'' + (item.specsFeature || '').replace(/'/g, "") + '\\\')" class="btn-sm" style="background: linear-gradient(135deg, #0f172a, #1e293b); color: #ffffff; font-weight: 700; padding: 8px 12px; border-radius: 10px; font-size: 0.8rem; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 4px; box-shadow: 0 4px 10px rgba(15,23,42,0.2);">📥 Download PDF Brochure</button>';'''

    # Replace all occurrences of brochureBtn assignment
    pattern_b1 = r'var brochureUrl = (?:item\.brochure|.*?);\s*var brochureBtn = .*?;\n'
    pattern_b2 = r'var brochureBtn = .*?;\n'

    # Replace any brochureBtn line containing whatsapp or downloadPdfBrochure
    text = re.sub(r'var brochureUrl = (?:item\.brochure|.*?);\s*var brochureBtn = [^\n]+(?:whatsapp|downloadPdfBrochure|property_brochure)[^\n]+;', new_brochure_btn_js, text, flags=re.DOTALL)
    text = re.sub(r'var brochureBtn = (?:item\.brochure|\(item\.brochure)[^\n]+(?:whatsapp|downloadPdfBrochure|property_brochure)[^\n]+;', new_brochure_btn_js, text, flags=re.DOTALL)

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

