import re, subprocess, tempfile, os

for fname in ['index.html', 'home.html']:
    filepath = '/Users/user/.gemini/antigravity-ide/scratch/assets/' + fname
    with open(filepath, 'r', encoding='utf-8') as f:
        text = f.read()

    # Update renderInlineFolderGrid html generation to include video badge and video tour button
    old_brochure_code = '''                var brochureBtn = item.brochure ? 
                    '<a href="' + item.brochure + '" target="_blank" class="btn-sm" style="background: rgba(15,23,42,0.06); color: #1e293b; text-decoration: none; font-weight: 700; padding: 8px 12px; border-radius: 10px; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 4px;">📄 PDF Brochure</a>' :
                    '<a href="https://wa.me/919309035119?text=Hi%2C%20please%20send%20PDF%20brochure%20for%20' + encodeURIComponent(item.title) + '" target="_blank" class="btn-sm" style="background: rgba(15,23,42,0.06); color: #0284c7; text-decoration: none; font-weight: 700; padding: 8px 12px; border-radius: 10px; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 4px;">📄 Request Brochure</a>';'''

    new_brochure_and_video_code = '''                var brochureBtn = item.brochure ? 
                    '<a href="' + item.brochure + '" target="_blank" class="btn-sm" style="background: rgba(15,23,42,0.06); color: #1e293b; text-decoration: none; font-weight: 700; padding: 8px 12px; border-radius: 10px; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 4px;">📄 PDF Brochure</a>' :
                    '<a href="https://wa.me/919309035119?text=Hi%2C%20please%20send%20PDF%20brochure%20for%20' + encodeURIComponent(item.title) + '" target="_blank" class="btn-sm" style="background: rgba(15,23,42,0.06); color: #0284c7; text-decoration: none; font-weight: 700; padding: 8px 12px; border-radius: 10px; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 4px;">📄 Request Brochure</a>';

                var videoBtn = item.video ? 
                    '<a href="' + item.video + '" target="_blank" class="btn-sm" style="background: linear-gradient(135deg, #0284c7, #0369a1); color: #ffffff; text-decoration: none; font-weight: 700; padding: 8px 12px; border-radius: 10px; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 4px; box-shadow: 0 4px 10px rgba(2,132,199,0.3);">▶️ Video Tour</a>' : 
                    '<a href="https://wa.me/919309035119?text=Hi%2C%20please%20send%20video%20tour%20for%20' + encodeURIComponent(item.title) + '" target="_blank" class="btn-sm" style="background: rgba(2,132,199,0.08); color: #0284c7; text-decoration: none; font-weight: 700; padding: 8px 12px; border-radius: 10px; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 4px;">▶️ Video Request</a>';'''

    text = text.replace(old_brochure_code, new_brochure_and_video_code)

    old_btn_group = 'brochureBtn +'
    new_btn_group = 'videoBtn + brochureBtn +'
    text = text.replace(old_btn_group, new_btn_group)

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

