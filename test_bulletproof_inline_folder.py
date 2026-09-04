import re

clean_inline_html_js = '''
    <!-- ===== PROPERTY CATEGORIES SECTION (EXACT DESIGN WITH INLINE FOLDER EXPANSION) ===== -->
    <section class="re-section re-section--alt" id="properties-section">
        <div class="container">
            <div class="text-center re-reveal visible" style="margin-bottom: 44px;">
                <p class="re-section__label">Explore Properties by Category</p>
                <h2 class="re-section__heading">Select a Category to View Available Properties</h2>
                <p class="re-section__subtext" style="max-width: 640px; margin: 0 auto;">Click on any of our 5 core deal sectors below to expand its properties directly below.</p>
            </div>

            <!-- THE 5 CATEGORY CARDS GRID (EXACT SAME DESIGN) -->
            <div class="re-cats" id="categoryCardsGrid">
                <!-- 1. Warehouse / Industrial -->
                <div class="re-cats__card visible" data-catkey="warehouse" onclick="handleCategoryFolderClick('warehouse', event)" style="cursor: pointer; position: relative;">
                    <img src="./assets/images/hero/warehouse.jpg" alt="1. Warehouse / Industrial" loading="lazy">
                    <div class="re-cats__overlay">
                        <h3>1. Warehouse / Industrial</h3>
                        <p>Logistics & Industrial Parks in Bhiwandi Hub.</p>
                        <button type="button" class="re-cats__btn" onclick="handleCategoryFolderClick('warehouse', event)">
                            <span>Explore Properties</span>
                            <svg class="cat-chevron" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="transition: transform 0.3s ease; margin-left: 6px;"><path d="M19 9l-7 7-7-7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- 2. Commercial Office -->
                <div class="re-cats__card visible" data-catkey="office" onclick="handleCategoryFolderClick('office', event)" style="cursor: pointer; position: relative;">
                    <img src="./assets/images/hero/office.jpg" alt="2. Commercial Office" loading="lazy">
                    <div class="re-cats__overlay">
                        <h3>2. Commercial Office</h3>
                        <p>Corporate Office Floors & Commercial Retail Spaces.</p>
                        <button type="button" class="re-cats__btn" onclick="handleCategoryFolderClick('office', event)">
                            <span>Explore Properties</span>
                            <svg class="cat-chevron" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="transition: transform 0.3s ease; margin-left: 6px;"><path d="M19 9l-7 7-7-7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- 3. Weekend Homes & Villas -->
                <div class="re-cats__card visible" data-catkey="villas" onclick="handleCategoryFolderClick('villas', event)" style="cursor: pointer; position: relative;">
                    <img src="./assets/images/hero/weekend-home.jpg" alt="3. Weekend Homes & Villas" loading="lazy">
                    <div class="re-cats__overlay">
                        <h3>3. Weekend Homes &amp; Villas</h3>
                        <p>Hillside Estates, Private Pool Retreats & Luxury Villas.</p>
                        <button type="button" class="re-cats__btn" onclick="handleCategoryFolderClick('villas', event)">
                            <span>Explore Properties</span>
                            <svg class="cat-chevron" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="transition: transform 0.3s ease; margin-left: 6px;"><path d="M19 9l-7 7-7-7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- 4. Land -->
                <div class="re-cats__card visible" data-catkey="land" onclick="handleCategoryFolderClick('land', event)" style="cursor: pointer; position: relative;">
                    <img src="./assets/images/hero/land.jpg" alt="4. Land" loading="lazy">
                    <div class="re-cats__overlay">
                        <h3>4. Land</h3>
                        <p>Industrial Plots & Clear Title NA Land Opportunities.</p>
                        <button type="button" class="re-cats__btn" onclick="handleCategoryFolderClick('land', event)">
                            <span>Explore Properties</span>
                            <svg class="cat-chevron" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="transition: transform 0.3s ease; margin-left: 6px;"><path d="M19 9l-7 7-7-7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- 5. Pre-Leased Property -->
                <div class="re-cats__card visible" data-catkey="preleased" onclick="handleCategoryFolderClick('preleased', event)" style="cursor: pointer; position: relative;">
                    <img src="./assets/images/hero/commercial.jpg" alt="5. Pre-Leased Property" loading="lazy">
                    <div class="re-cats__overlay">
                        <h3 style="color: #38bdf8;">5. 🔥 Pre-Leased Property</h3>
                        <p>High-Yield Income Assets (7.5% - 8.5% Guaranteed ROI).</p>
                        <button type="button" class="re-cats__btn" onclick="handleCategoryFolderClick('preleased', event)">
                            <span>Explore 7.5% - 8.5% ROI</span>
                            <svg class="cat-chevron" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="transition: transform 0.3s ease; margin-left: 6px;"><path d="M19 9l-7 7-7-7"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- INLINE EXPANDABLE SUB-FOLDER CONTAINER (DIRECTLY BELOW CATEGORY CARDS GRID) -->
            <div id="inlineCategorySubfolder" style="display: none; margin-top: 36px;">
                <div style="background: #ffffff; border: 2px solid #0284c7; border-radius: 24px; padding: 32px; box-shadow: 0 20px 50px rgba(2,132,199,0.15); animation: folderSlideDown 0.4s ease-out;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 2px solid #0284c7; flex-wrap: wrap; gap: 12px;">
                        <div>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <span style="font-size: 1.6rem;">📁</span>
                                <h3 id="inlineFolderTitle" style="font-size: 1.5rem; font-weight: 800; color: #0f172a; margin: 0;">1. Warehouse / Industrial Properties Folder</h3>
                            </div>
                            <p id="inlineFolderSubtitle" style="color: #64748b; font-size: 0.9rem; margin: 4px 0 0 34px;">Properties inside this category folder</p>
                        </div>
                        <button type="button" onclick="closeInlineSubfolder()" style="background: #0284c7; color: #ffffff; border: none; font-weight: 700; padding: 10px 22px; border-radius: 20px; cursor: pointer; font-size: 0.88rem; box-shadow: 0 4px 14px rgba(2,132,199,0.3);">Close Folder ✕</button>
                    </div>
                    
                    <!-- Property Cards Grid inside Folder -->
                    <div class="re-props__grid" id="inlineFolderPropertyGrid" style="grid-template-columns: repeat(auto-fit, minmax(290px, 1fr)); gap: 24px;">
                        <!-- Rendered dynamically -->
                    </div>
                </div>
            </div>

        </div>
    </section>

    <style>
    @keyframes folderSlideDown {
        from { opacity: 0; transform: translateY(-16px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .re-cats__card.active-cat-folder {
        border: 3px solid #0284c7 !important;
        box-shadow: 0 0 20px rgba(2,132,199,0.5) !important;
    }
    </style>

    <!-- Global Bulletproof Inline Folder Accordion Script -->
    <script>
    var currentOpenCatKey = null;

    var DEFAULT_PROPERTIES_FALLBACK = [
        {
            title: "Pre-Leased Industrial Logistics Warehouse",
            category: "Warehouse",
            badge: "7.5% - 8.5% ROI",
            location: "Bhiwandi Logistics Hub, Thane",
            price: "7.5% to 8.5% ROI",
            specsArea: "50,000 sqft",
            specsFeature: "Pre-Leased Long Term Tenant",
            image: "./assets/images/hero/warehouse.jpg"
        },
        {
            title: "Industrial Logistics Park",
            category: "Warehouse",
            badge: "For Lease",
            location: "Bhiwandi, Thane",
            price: "₹12/sqft /mo",
            specsArea: "25,000 sqft",
            specsFeature: "Loading Dock",
            image: "./assets/images/hero/warehouse.jpg"
        },
        {
            title: "Premium Corporate Office Floor",
            category: "Office Space",
            badge: "For Lease",
            location: "Thane West, Mumbai Region",
            price: "₹55/sqft /mo",
            specsArea: "3,200 sqft",
            specsFeature: "Fully Furnished",
            image: "./assets/images/hero/office.jpg"
        },
        {
            title: "Luxury Hillside Villa",
            category: "Villa",
            badge: "For Sale",
            location: "Lonavala",
            price: "₹2.8 Cr",
            specsArea: "4,500 sqft",
            specsFeature: "4 BHK Private Pool",
            image: "./assets/images/hero/villa.jpg"
        },
        {
            title: "Prime Industrial Plot Land",
            category: "Land / Plot",
            badge: "For Sale",
            location: "Bhiwandi Industrial Zone",
            price: "₹3.5 Cr",
            specsArea: "2 Acres Plot",
            specsFeature: "Clear Title NA Land",
            image: "./assets/images/hero/land.jpg"
        },
        {
            title: "Scenic Weekend Retreat Estate",
            category: "Weekend Home",
            badge: "For Sale",
            location: "Karjat / Igatpuri",
            price: "₹1.2 Cr",
            specsArea: "3 BHK Villa",
            specsFeature: "Mountain View Lawn",
            image: "./assets/images/hero/weekend-home.jpg"
        }
    ];

    function matchCategory(item, targetKey) {
        if (!item) return false;
        var cat = (item.category || '').toLowerCase();
        var title = (item.title || '').toLowerCase();
        var badge = (item.badge || '').toLowerCase();

        if (targetKey === 'preleased') {
            return cat.includes('pre-leased') || cat.includes('preleased') || badge.includes('roi') || title.includes('pre-leased') || title.includes('preleased');
        }
        
        if (badge.includes('roi') || title.includes('pre-leased') || title.includes('preleased')) {
            return false;
        }

        if (targetKey === 'warehouse') {
            return cat.includes('warehouse') || cat.includes('industrial') || title.includes('warehouse') || title.includes('industrial');
        }
        if (targetKey === 'office') {
            return cat.includes('office') || cat.includes('commercial') || title.includes('office') || title.includes('commercial');
        }
        if (targetKey === 'villas') {
            return cat.includes('weekend') || cat.includes('villa') || title.includes('weekend') || title.includes('villa');
        }
        if (targetKey === 'land') {
            return cat.includes('land') || cat.includes('plot') || title.includes('land') || title.includes('plot');
        }

        return false;
    }

    function renderInlineFolderGrid(catKey, props) {
        var gridEl = document.getElementById('inlineFolderPropertyGrid');
        if (!gridEl) return;

        var dataToUse = (props && props.length) ? props : DEFAULT_PROPERTIES_FALLBACK;

        var filtered = dataToUse.filter(function(item) {
            return matchCategory(item, catKey);
        });

        if (!filtered.length) {
            gridEl.innerHTML = '<div style="grid-column: 1/-1; text-align: center; padding: 48px; background: #f8fafc; border-radius: 16px; color: #64748b;">' +
                '<svg width="48" height="48" fill="none" stroke="#94a3b8" stroke-width="1.5" viewBox="0 0 24 24" style="margin-bottom:12px;"><path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>' +
                '<h4 style="font-size:1.1rem; color:#1e293b; margin-bottom:6px;">No Properties Found in this Category Folder</h4>' +
                '<p style="margin:0;">No active listings uploaded in this folder yet. Contact us for custom requirements!</p>' +
            '</div>';
        } else {
            var html = '';
            filtered.forEach(function(item) {
                var badgeClass = (item.badge && item.badge.includes('Sale')) ? 're-props__badge--sale' : 're-props__badge--lease';
                var brochureBtn = item.brochure ? 
                    '<a href="' + item.brochure + '" target="_blank" class="btn-sm" style="background: rgba(15,23,42,0.06); color: #1e293b; text-decoration: none; font-weight: 700; padding: 8px 12px; border-radius: 10px; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 4px;">📄 PDF Brochure</a>' :
                    '<a href="https://wa.me/919309035119?text=Hi%2C%20please%20send%20PDF%20brochure%20for%20' + encodeURIComponent(item.title) + '" target="_blank" class="btn-sm" style="background: rgba(15,23,42,0.06); color: #0284c7; text-decoration: none; font-weight: 700; padding: 8px 12px; border-radius: 10px; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 4px;">📄 Request Brochure</a>';

                html += '<div class="re-props__card" style="background:#fff; border:1px solid rgba(15,23,42,0.1); border-radius:18px; overflow:hidden; box-shadow:0 10px 25px rgba(0,0,0,0.05);">' +
                    '<div class="re-props__imgwrap" style="position:relative;">' +
                        '<img src="' + item.image + '" alt="' + item.title + '" loading="lazy" style="width:100%; height:200px; object-fit:cover;" onerror="this.src=\'./assets/images/hero/warehouse.jpg\'">' +
                        '<span class="re-props__badge ' + badgeClass + '">' + item.badge + '</span>' +
                    '</div>' +
                    '<div class="re-props__body" style="padding:20px;">' +
                        '<h3 class="re-props__title" style="font-size:1.15rem; font-weight:800; color:#0f172a; margin-bottom:8px;">' + item.title + '</h3>' +
                        '<p class="re-props__loc" style="color:#64748b; font-size:0.85rem; margin-bottom:12px;"><svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg> ' + item.location + '</p>' +
                        '<div class="re-props__specs" style="display:flex; gap:12px; margin-bottom:16px; font-size:0.82rem; color:#475569;">' +
                            '<span class="re-props__spec"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/></svg> ' + item.specsArea + '</span>' +
                            '<span class="re-props__spec"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg> ' + item.specsFeature + '</span>' +
                        '</div>' +
                        '<div class="re-props__bottom" style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid rgba(15,23,42,0.08); padding-top:14px; flex-wrap:wrap; gap:8px;">' +
                            '<div class="re-props__price" style="font-size:1.05rem; font-weight:800; color:#0284c7;">' + item.price + '</div>' +
                            '<div style="display:flex; gap:6px; flex-wrap:wrap;">' +
                                brochureBtn +
                                '<a href="https://wa.me/919309035119?text=Hi%2C%20I%27m%20interested%20in%20' + encodeURIComponent(item.title) + '" target="_blank" class="re-props__enquiry" style="padding:8px 14px; font-size:0.8rem; font-weight:700;">Enquire Now</a>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>';
            });
            gridEl.innerHTML = html;
        }
    }

    function handleCategoryFolderClick(catKey, event) {
        if (event && event.stopPropagation) event.stopPropagation();

        var folderEl = document.getElementById('inlineCategorySubfolder');
        var titleEl = document.getElementById('inlineFolderTitle');
        var subtitleEl = document.getElementById('inlineFolderSubtitle');
        if (!folderEl) return;

        // Reset chevrons and active classes on all cards
        document.querySelectorAll('.re-cats__card').forEach(function(card) {
            card.classList.remove('active-cat-folder');
            var chev = card.querySelector('.cat-chevron');
            if (chev) chev.style.transform = 'rotate(0deg)';
        });

        // If clicking the currently open folder, close it cleanly
        if (currentOpenCatKey === catKey && folderEl.style.display !== 'none') {
            closeInlineSubfolder();
            return;
        }

        // Highlight clicked category card and rotate chevron 180deg
        var activeCard = document.querySelector('.re-cats__card[data-catkey="' + catKey + '"]');
        if (activeCard) {
            activeCard.classList.add('active-cat-folder');
            var chev = activeCard.querySelector('.cat-chevron');
            if (chev) chev.style.transform = 'rotate(180deg)';
        }

        var catInfo = {
            'warehouse': { title: '1. Warehouse / Industrial Properties Folder', subtitle: 'Logistics & Industrial Parks in Bhiwandi Hub' },
            'office': { title: '2. Commercial Office Properties Folder', subtitle: 'Corporate Office Floors & Commercial Retail Spaces' },
            'villas': { title: '3. Weekend Homes & Villas Folder', subtitle: 'Hillside Estates, Private Pool Retreats & Luxury Villas' },
            'land': { title: '4. Land & Industrial Plots Folder', subtitle: 'Clear Title NA Land & Industrial Plots' },
            'preleased': { title: '5. 🔥 Pre-Leased Properties (7.5% - 8.5% ROI) Folder', subtitle: 'High-Yield Income Assets with Guaranteed Rental Yields' }
        };

        var info = catInfo[catKey] || { title: catKey + ' Properties Folder', subtitle: 'Available property listings' };
        if (titleEl) titleEl.textContent = info.title;
        if (subtitleEl) subtitleEl.textContent = info.subtitle;

        currentOpenCatKey = catKey;

        // Render properties from cache / fallback
        var stored = localStorage.getItem('royaleProperties');
        var propsToRender = DEFAULT_PROPERTIES_FALLBACK;
        if (stored) {
            try {
                var parsed = JSON.parse(stored);
                if (parsed && parsed.length) propsToRender = parsed;
            } catch(e) {}
        }
        renderInlineFolderGrid(catKey, propsToRender);

        // Display folder inline right below the cards grid
        folderEl.style.display = 'block';

        // Smooth scroll to the expanded folder
        setTimeout(function() {
            folderEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 80);

        // Fetch fresh cloud properties from Gist
        fetchLiveGistFolderProperties(catKey);
    }

    function closeInlineSubfolder() {
        var folderEl = document.getElementById('inlineCategorySubfolder');
        if (folderEl) {
            folderEl.style.display = 'none';
        }

        document.querySelectorAll('.re-cats__card').forEach(function(card) {
            card.classList.remove('active-cat-folder');
            var chev = card.querySelector('.cat-chevron');
            if (chev) chev.style.transform = 'rotate(0deg)';
        });

        currentOpenCatKey = null;
    }

    function fetchLiveGistFolderProperties(catKeyToRender) {
        var GIST_ID = 'eebf5c328e2a6047fb9e71338a6836ba';
        fetch('https://api.github.com/gists/' + GIST_ID + '?t=' + Date.now(), {
            headers: { 'Accept': 'application/vnd.github.v3+json' }
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            if (data && data.files && data.files['properties.json']) {
                var content = JSON.parse(data.files['properties.json'].content);
                if (content && content.length) {
                    localStorage.setItem('royaleProperties', JSON.stringify(content));
                    var target = catKeyToRender || currentOpenCatKey;
                    if (target) {
                        renderInlineFolderGrid(target, content);
                    }
                }
            }
        })
        .catch(function(err) { console.error('Cloud Sync Error:', err); });
    }

    document.addEventListener('DOMContentLoaded', function() {
        fetchLiveGistFolderProperties();
    });
    </script>'''

for fname in ['index.html', 'home.html']:
    with open('/Users/user/.gemini/antigravity-ide/scratch/assets/' + fname, 'r', encoding='utf-8') as f:
        text = f.read()

    # Replace both properties-section & listings-section with clean_inline_html_js
    start_p = text.find('<section class="re-section re-section--alt" id="properties-section">')
    if start_p != -1:
        end_p = text.find('</section>', text.find('<section class="re-props"', start_p))
        if end_p != -1:
            text = text[:start_p] + clean_inline_html_js + text[end_p + 10:]

    # Remove any modal HTML if present
    start_m = text.find('<div class="re-cat-modal"')
    if start_m != -1:
        end_m = text.find('</div>\n    </div>', start_m)
        if end_m != -1:
            text = text[:start_m] + text[end_m + 16:]

    with open('/Users/user/.gemini/antigravity-ide/scratch/assets/' + fname, 'w', encoding='utf-8') as f:
        f.write(text)

print("Updated Bulletproof Inline Folder Accordion in index.html and home.html!")
