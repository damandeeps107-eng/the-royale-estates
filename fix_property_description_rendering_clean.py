import re, subprocess, tempfile, os

clean_desc_code = """var descHtml = (item.description && item.description.trim()) ? 
    '<p class="re-props__desc" style="color: #334155; font-size: 0.86rem; line-height: 1.55; margin-bottom: 14px; background: rgba(15,23,42,0.04); padding: 10px 14px; border-radius: 10px; border-left: 3.5px solid #0284c7; word-break: break-word;">📝 <strong>Description:</strong> ' + item.description.trim() + '</p>' : '';"""

for fname in ['index.html', 'home.html']:
    filepath = '/Users/user/.gemini/antigravity-ide/scratch/assets/' + fname
    with open(filepath, 'r', encoding='utf-8') as f:
        text = f.read()

    # Remove any broken escaped backslash description strings
    broken_pattern = r"\+ \(item\.description \? '<p class=\\\"re-props__desc\\\".*?<\/p>' : ''\)"
    text = re.sub(broken_pattern, "", text)

    # Insert clean descHtml logic before building property card HTML
    target_loc_pattern = r"(<p class=\"re-props__loc\".*?<\/p>\')"
    text = re.sub(target_loc_pattern, r"\1 + descHtml", text)

    # Ensure var descHtml is defined inside forEach
    foreach_pattern = r"(filtered\.forEach\(function\(item\) \{)"
    text = re.sub(foreach_pattern, r"\1\n                " + clean_desc_code, text)

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

