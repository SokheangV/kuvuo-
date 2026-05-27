<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Nunito:wght@300;400;500;600;700;800&family=Science+Gothic:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

@php
    $equipmentMenuItems = [
        ['name' => 'Mini Excavator',    'slug' => 'mini-excavators',  'code' => '01'],
        ['name' => 'Skid Steer Loader', 'slug' => 'skid-steer-loader','code' => '02'],
        ['name' => 'Wheel Loader',      'slug' => 'wheel-loaders',    'code' => '03'],
        ['name' => 'Road Roller',       'slug' => 'mini-road-roller', 'code' => '04'],
        ['name' => 'Scissor Lift',      'slug' => 'scissor-lifts',    'code' => '05'],
        ['name' => 'Forklift',          'slug' => 'forklift',         'code' => '06'],
    ];
    $miniExcavatorAttachmentItems = [
        ['name' => 'X2 Attachments',             'slug' => 'x2',              'code' => '01'],
        ['name' => 'XXV Attachments',            'slug' => 'xxv',             'code' => '02'],
        ['name' => 'Attachments 2 Tons and Below','slug' => '2-ton-and-below','code' => '03'],
        // No dedicated above-two-ton filter exists; use the complete valid mini attachment listing.
        ['name' => 'Attachments 2 Tons Above',  'slug' => 'mini-excavator',  'code' => '04'],
    ];
    $skidSteerAttachmentItems = [
        ['name' => 'Compact Series 501-507',       'slug' => 'compact-series-501-507',    'code' => '05'],
        ['name' => 'Standard Series X1300-509',    'slug' => 'standard-series-x1300-509', 'code' => '06'],
    ];
	    $supportItems = [
        ['name' => 'Support Hub',             'route' => 'support.index',    'code' => '01'],
        ['name' => 'Warranty Policy',         'route' => 'support.warranty', 'code' => '02'],
        ['name' => 'Shipping & Delivery',     'route' => 'support.shipping', 'code' => '03'],
        ['name' => 'Return & Refund Policy',  'route' => 'support.returns',  'code' => '04'],
        ['name' => 'FAQ',                     'route' => 'support.faq',      'code' => '05'],
        ['name' => 'Terms & Conditions',      'route' => 'support.terms',    'code' => '06'],
        ['name' => 'Privacy Policy',          'route' => 'support.privacy',  'code' => '07'],
    ];
    $homeIsActive       = url()->current() === url('/');
    $equipmentIsActive  = request()->routeIs('shop', 'shop.category', 'shop.search');
    $attachmentsIsActive = request()->routeIs('attachments', 'attachments.category');
	    $supportIsActive    = request()->routeIs('support.*', 'faq');
	    $contactIsActive    = request()->routeIs('contact');
        $headerSearch = request('search', '');
	@endphp

<header class="kv-header" data-kv-header>
    <div class="kv-utility" data-kv-utility>
        <div class="kv-shell kv-utility-inner">
            <p class="kv-utility-label">
                <span aria-hidden="true"></span>
                Heavy Equipment Catalog
            </p>

            <div class="kv-utility-actions" aria-label="Quick links">
                <a href="{{ route('shop') }}">Browse Catalog</a>
                <a href="{{ route('contact') }}">Quote Assistance</a>
                <a class="kv-utility-phone" href="tel:+12132142203">+1 213-214-2203</a>
                <a class="kv-utility-email" href="mailto:sales@kuvuo.com">sales@kuvuo.com</a>
            </div>
        </div>
    </div>

    <div class="kv-navigation">
        <div class="kv-shell kv-navigation-inner">
            <a href="{{ url('/') }}" class="kv-brand" aria-label="KUVUO home">
                <img src="{{ asset('assets/brand/kuvuo-logo.webp') }}" alt="KUVUO" class="kv-brand-logo">
            </a>

            <button class="kv-menu-toggle" type="button" aria-expanded="false" aria-controls="kv-primary-navigation" data-kv-toggle>
                <span class="kv-toggle-label">Menu</span>
                <span class="kv-toggle-lines" aria-hidden="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <nav class="kv-nav" id="kv-primary-navigation" aria-label="Primary navigation" data-kv-menu>
                <div class="kv-links">
                    <a href="{{ url('/') }}" class="kv-nav-link {{ $homeIsActive ? 'is-active' : '' }}" @if($homeIsActive) aria-current="page" @endif>Home</a>

                    <details class="kv-disclosure {{ $equipmentIsActive ? 'is-active' : '' }}" data-kv-disclosure>
                        <summary class="kv-nav-link">
                            Equipment
                            <svg viewBox="0 0 12 12" aria-hidden="true"><path d="M2 4.25 6 8l4-3.75"/></svg>
                        </summary>

                        <div class="kv-equipment-panel">
                            <div class="kv-panel-header">
                                <div>
                                    <span class="kv-panel-label">Equipment Catalog</span>
                                    <p>Browse machinery by category</p>
                                </div>
                                <a href="{{ route('shop') }}" class="kv-panel-all">
                                    View All
                                    <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                                </a>
                            </div>

                            <div class="kv-equipment-grid">
                                @foreach ($equipmentMenuItems as $equipmentMenuItem)
                                    <a href="{{ route('shop.category', $equipmentMenuItem['slug']) }}" class="kv-dropdown-item">
                                        <span class="kv-item-code">{{ $equipmentMenuItem['code'] }}</span>
                                        <span class="kv-item-name">{{ $equipmentMenuItem['name'] }}</span>
                                        <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </details>

                    <details class="kv-disclosure kv-attachments {{ $attachmentsIsActive ? 'is-active' : '' }}" data-kv-disclosure>
                        <summary class="kv-nav-link">
                            Attachments
                            <svg viewBox="0 0 12 12" aria-hidden="true"><path d="M2 4.25 6 8l4-3.75"/></svg>
                        </summary>
                        <div class="kv-attachments-panel">
                            <div class="kv-panel-header">
                                <div>
                                    <span class="kv-panel-label">Attachment Catalog</span>
                                    <p>Browse attachments by machine type</p>
                                </div>
                                <a href="{{ route('attachments') }}" class="kv-panel-all">
                                    View All
                                    <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                                </a>
                            </div>
                            <div class="kv-attachments-columns">
                                <div class="kv-attachments-column">
                                    <h3 class="kv-column-title">Mini Excavator Attachments</h3>
                                    <div class="kv-column-grid">
                                        @foreach ($miniExcavatorAttachmentItems as $attachmentItem)
                                            <a href="{{ route('attachments.category', $attachmentItem['slug']) }}" class="kv-dropdown-item">
                                                <span class="kv-item-code">{{ $attachmentItem['code'] }}</span>
                                                <span class="kv-item-name">{{ $attachmentItem['name'] }}</span>
                                                <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="kv-attachments-column">
                                    <h3 class="kv-column-title">Skid Steer Loader Attachments</h3>
                                    <div class="kv-column-grid">
                                        @foreach ($skidSteerAttachmentItems as $attachmentItem)
                                            <a href="{{ route('attachments.category', $attachmentItem['slug']) }}" class="kv-dropdown-item">
                                                <span class="kv-item-code">{{ $attachmentItem['code'] }}</span>
                                                <span class="kv-item-name">{{ $attachmentItem['name'] }}</span>
                                                <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </details>

                    <a href="{{ route('about') }}" class="kv-nav-link {{ request()->routeIs('about') ? 'is-active' : '' }}" @if(request()->routeIs('about')) aria-current="page" @endif>About Us</a>
                    <a href="{{ route('blog') }}" class="kv-nav-link {{ request()->routeIs('blog', 'blog.details') ? 'is-active' : '' }}" @if(request()->routeIs('blog', 'blog.details')) aria-current="page" @endif>Blog</a>

                    <details class="kv-disclosure kv-support {{ $supportIsActive ? 'is-active' : '' }}" data-kv-disclosure>
                        <summary class="kv-nav-link">
                            Support
                            <svg viewBox="0 0 12 12" aria-hidden="true"><path d="M2 4.25 6 8l4-3.75"/></svg>
                        </summary>
                        <div class="kv-support-panel">
                            <div class="kv-panel-header">
                                <div>
                                    <span class="kv-panel-label">Support Center</span>
                                    <p>Help, policies, and customer resources</p>
                                </div>
                            </div>
                            <div class="kv-support-grid">
                                @foreach ($supportItems as $supportItem)
                                    <a href="{{ route($supportItem['route']) }}" class="kv-dropdown-item">
                                        <span class="kv-item-code">{{ $supportItem['code'] }}</span>
                                        <span class="kv-item-name">{{ $supportItem['name'] }}</span>
                                        <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </details>
                </div>

                <div class="kv-actions">
                    <form class="kv-search" method="GET" action="{{ route('shop.search') }}" role="search" aria-label="Search equipment">
                        <label class="kv-search-label" for="kv-header-search">Search</label>
                        <input
                            id="kv-header-search"
                            type="search"
                            name="search"
                            value="{{ $headerSearch }}"
                            placeholder="Search equipment"
                        >
                        <button type="submit" class="kv-search-button" aria-label="Submit search">
                            <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M11.5 11.5 15 15M7 12.5A5.5 5.5 0 1 1 7 1.5a5.5 5.5 0 0 1 0 11Z"/></svg>
                        </button>
                    </form>

                    <a href="{{ route('contact') }}" class="kv-cta {{ $contactIsActive ? 'is-active' : '' }}" @if($contactIsActive) aria-current="page" @endif>
                        Contact
                        <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>

<style>
.kv-header {
    --kv-green:     var(--green-900, var(--primary, #12372A));
    --kv-green-mid: var(--green-700, var(--primary-dark, #1F5D45));
    --kv-accent:    var(--accent, #D97706);
    --kv-text:      var(--ink, var(--text, #111827));
    --kv-muted:     var(--muted, var(--gray, #6B7280));
    --kv-border:    var(--border, #D7DED9);
    --kv-soft:      var(--green-50, var(--light, #F6FAF7));
    position: sticky;
    top: 0;
    z-index: 1000;
    font-family: 'Nunito', Arial, Helvetica, sans-serif;
}

/* ── Shell ── */
.kv-shell {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 28px;
}

/* ─────────────────────────────────────────────────────────
   UTILITY BAR
───────────────────────────────────────────────────────── */
.kv-utility {
    background: var(--kv-green);
    color: #fff;
    font-size: 12px;
    letter-spacing: 0.02em;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}
.kv-utility-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 9px;
    padding-bottom: 9px;
    gap: 16px;
}
.kv-utility-label {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgba(255,255,255,0.72);
    font-weight: 600;
    font-size: 11px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}
.kv-utility-label span {
    width: 6px; height: 6px;
    background: var(--kv-accent);
    display: block;
    flex-shrink: 0;
}
.kv-utility-actions {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}
.kv-utility-actions a {
    color: rgba(255,255,255,0.75);
    text-decoration: none;
    font-weight: 500;
    font-size: 12px;
    transition: color .15s;
}
.kv-utility-actions a:hover { color: #fff; }
.kv-utility-phone,
.kv-utility-email {
    font-weight: 600;
    color: rgba(255,255,255,0.9) !important;
}

/* ─────────────────────────────────────────────────────────
   NAVIGATION BAR
───────────────────────────────────────────────────────── */
.kv-navigation {
    background: #fff;
    border-bottom: 1px solid var(--kv-border);
    box-shadow: 0 1px 0 rgba(0,0,0,0.04);
}
.kv-navigation-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    padding-top: 0;
    padding-bottom: 0;
    height: 64px;
}

/* ─────────────────────────────────────────────────────────
   BRAND / LOGO
───────────────────────────────────────────────────────── */
.kv-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    flex-shrink: 0;
}
.kv-brand-logo {
    display: block;
    width: auto;
    height: 56px;
    max-width: 280px;
    object-fit: contain;
    flex-shrink: 0;
}

/* ─────────────────────────────────────────────────────────
   NAV
───────────────────────────────────────────────────────── */
.kv-nav {
    display: flex;
    align-items: center;
    gap: 0;
    flex: 1;
    justify-content: space-between;
}
.kv-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
}
.kv-links {
    display: flex;
    align-items: stretch;
    gap: 0;
    height: 64px;
}
.kv-nav-link {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 0 16px;
    height: 100%;
    font-size: 14px;
    font-weight: 600;
    color: var(--kv-text);
    text-decoration: none;
    border-bottom: 2px solid transparent;
    transition: color .15s, border-color .15s;
    cursor: pointer;
    list-style: none;
    background: none;
    border-top: none;
    border-left: none;
    border-right: none;
    font-family: inherit;
    white-space: nowrap;
}
.kv-nav-link:hover,
.kv-nav-link:focus-visible {
    color: var(--kv-green);
    border-bottom-color: var(--kv-green);
    outline: none;
}
.kv-nav-link.is-active {
    color: var(--kv-green);
    border-bottom-color: var(--kv-green);
}
.kv-nav-link svg {
    width: 10px; height: 10px;
    stroke: currentColor;
    fill: none;
    stroke-width: 1.8;
    stroke-linecap: square;
    stroke-linejoin: miter;
    transition: transform .2s;
    flex-shrink: 0;
}
.kv-disclosure[open] > summary.kv-nav-link svg {
    transform: rotate(180deg);
}
.kv-disclosure[open] > summary.kv-nav-link,
.kv-disclosure.is-active > summary.kv-nav-link {
    color: var(--kv-green);
    border-bottom-color: var(--kv-green);
}

/* ─────────────────────────────────────────────────────────
   DETAILS / DISCLOSURE (Dropdown trigger)
───────────────────────────────────────────────────────── */
.kv-disclosure {
    position: relative;
    display: flex;
    align-items: stretch;
}
.kv-disclosure > summary {
    list-style: none;
}
.kv-disclosure > summary::-webkit-details-marker { display: none; }

/* ─────────────────────────────────────────────────────────
   DROPDOWN PANELS (shared base)
───────────────────────────────────────────────────────── */
.kv-equipment-panel,
.kv-attachments-panel,
.kv-support-panel {
    position: absolute;
    top: calc(100% + 1px);
    left: 0;
    background: #fff;
    border: 1px solid var(--kv-border);
    border-top: 3px solid var(--kv-green);
    box-shadow: 0 16px 48px rgba(0,0,0,0.10);
    z-index: 200;
    animation: kv-drop-in .16s ease both;
}
@keyframes kv-drop-in {
    from { opacity: 0; transform: translateY(6px); }
    to   { opacity: 1; transform: translateY(0);   }
}

/* Panel header row (label + "View All") */
.kv-panel-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 24px;
    padding: 20px 24px 16px;
    border-bottom: 1px solid var(--kv-border);
}
.kv-panel-label {
    display: block;
    font-family: 'Science Gothic', Arial, sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: var(--kv-green);
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 4px;
}
.kv-panel-header p {
    font-size: 12px;
    color: var(--kv-muted);
    margin: 0;
    font-weight: 500;
}
.kv-panel-all {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 700;
    color: var(--kv-green);
    text-decoration: none;
    white-space: nowrap;
    padding: 4px 10px;
    border: 1px solid var(--kv-green);
    flex-shrink: 0;
    transition: background .15s, color .15s;
}
.kv-panel-all:hover { background: var(--kv-green); color: #fff; }
.kv-panel-all svg {
    width: 13px; height: 13px;
    stroke: currentColor; fill: none;
    stroke-width: 1.8; stroke-linecap: square; stroke-linejoin: miter;
}

/* Dropdown item (shared across all panels) */
.kv-dropdown-item {
    display: grid;
    grid-template-columns: 28px 1fr 14px;
    align-items: center;
    gap: 10px;
    padding: 13px 24px;
    text-decoration: none;
    color: var(--kv-text);
    border-bottom: 1px solid var(--kv-border);
    transition: background .12s, color .12s;
    font-size: 14px;
    font-weight: 500;
}
.kv-dropdown-item:last-child { border-bottom: none; }
.kv-dropdown-item:hover {
    background: var(--kv-soft);
    color: var(--kv-green);
}
.kv-dropdown-item:hover .kv-item-code { color: var(--kv-accent); }
.kv-item-code {
    font-size: 10px;
    font-weight: 800;
    color: var(--kv-muted);
    letter-spacing: 0.1em;
    font-family: 'Nunito', Arial, sans-serif;
    transition: color .12s;
}
.kv-item-name { font-weight: 600; }
.kv-dropdown-item svg {
    width: 13px; height: 13px;
    stroke: currentColor; fill: none;
    stroke-width: 1.8; stroke-linecap: square; stroke-linejoin: miter;
    opacity: 0;
    transition: opacity .12s;
}
.kv-dropdown-item:hover svg { opacity: 1; }

/* ─────────────────────────────────────────────────────────
   EQUIPMENT PANEL
───────────────────────────────────────────────────────── */
.kv-equipment-panel {
    width: 520px;
}
.kv-equipment-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
}
.kv-equipment-grid .kv-dropdown-item:nth-child(odd) {
    border-right: 1px solid var(--kv-border);
}

/* ─────────────────────────────────────────────────────────
   ATTACHMENTS PANEL
───────────────────────────────────────────────────────── */
.kv-attachments-panel {
    width: 620px;
}
.kv-attachments-columns {
    display: grid;
    grid-template-columns: 1fr 1fr;
}
.kv-attachments-column {
    border-right: 1px solid var(--kv-border);
}
.kv-attachments-column:last-child { border-right: none; }
.kv-column-title {
    padding: 14px 24px 10px;
    font-family: 'Science Gothic', Arial, sans-serif;
    font-size: 11px;
    font-weight: 700;
    color: var(--kv-muted);
    letter-spacing: 0.12em;
    text-transform: uppercase;
    border-bottom: 1px solid var(--kv-border);
}

/* ─────────────────────────────────────────────────────────
   SUPPORT PANEL
───────────────────────────────────────────────────────── */
.kv-support-panel {
    width: 380px;
}
.kv-support-grid { display: flex; flex-direction: column; }

/* ─────────────────────────────────────────────────────────
   SEARCH
───────────────────────────────────────────────────────── */
.kv-search {
    display: flex;
    align-items: center;
    gap: 0;
    height: 42px;
    padding-left: 14px;
    border: 1px solid var(--kv-border);
    background: #fff;
}
.kv-search-label {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}
.kv-search input {
    width: 190px;
    border: none;
    outline: none;
    background: transparent;
    color: var(--kv-text);
    font-family: 'Nunito', Arial, sans-serif;
    font-size: 14px;
    font-weight: 600;
    padding: 0;
}
.kv-search input::placeholder {
    color: var(--kv-muted);
    font-weight: 600;
}
.kv-search-button {
    width: 42px;
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-left: 1px solid var(--kv-border);
    background: transparent;
    color: var(--kv-green);
    cursor: pointer;
    transition: background-color .15s ease, color .15s ease;
}
.kv-search-button:hover {
    background: var(--kv-soft);
}
.kv-search-button svg {
    width: 16px;
    height: 16px;
    stroke: currentColor;
    fill: none;
    stroke-width: 1.8;
    stroke-linecap: square;
    stroke-linejoin: miter;
}

/* ─────────────────────────────────────────────────────────
   CONTACT CTA
───────────────────────────────────────────────────────── */
.kv-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: var(--kv-green);
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    font-family: 'Nunito', Arial, sans-serif;
    text-decoration: none;
    border: 2px solid var(--kv-green);
    transition: background .15s, color .15s;
    white-space: nowrap;
    flex-shrink: 0;
}
.kv-cta:hover { background: var(--kv-green-mid); border-color: var(--kv-green-mid); }
.kv-cta.is-active { background: var(--kv-green-mid); border-color: var(--kv-green-mid); }
.kv-cta svg {
    width: 13px; height: 13px;
    stroke: currentColor; fill: none;
    stroke-width: 1.8; stroke-linecap: square; stroke-linejoin: miter;
}

/* ─────────────────────────────────────────────────────────
   MOBILE TOGGLE
───────────────────────────────────────────────────────── */
.kv-menu-toggle {
    display: none;
    flex-direction: column;
    justify-content: center;
    align-items: flex-end;
    gap: 5px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px 0;
    margin-left: auto;
}
.kv-toggle-label { display: none; }
.kv-toggle-lines { display: flex; flex-direction: column; gap: 5px; align-items: flex-end; }
.kv-toggle-lines span {
    display: block;
    height: 2px;
    background: var(--kv-green);
    border-radius: 1px;
    transition: width .2s, transform .2s, opacity .2s;
}
.kv-toggle-lines span:nth-child(1) { width: 26px; }
.kv-toggle-lines span:nth-child(2) { width: 20px; }
.kv-toggle-lines span:nth-child(3) { width: 14px; }
[aria-expanded="true"] .kv-toggle-lines span:nth-child(1) { width: 24px; transform: translateY(7px) rotate(45deg); }
[aria-expanded="true"] .kv-toggle-lines span:nth-child(2) { opacity: 0; }
[aria-expanded="true"] .kv-toggle-lines span:nth-child(3) { width: 24px; transform: translateY(-7px) rotate(-45deg); }

/* ─────────────────────────────────────────────────────────
   RESPONSIVE
───────────────────────────────────────────────────────── */
@media (max-width: 1024px) {
    .kv-menu-toggle { display: flex; }

    .kv-nav {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #fff;
        border-top: 1px solid var(--kv-border);
        border-bottom: 3px solid var(--kv-green);
        flex-direction: column;
        align-items: stretch;
        gap: 0;
        padding: 8px 0 16px;
        box-shadow: 0 12px 32px rgba(0,0,0,0.1);
        z-index: 100;
    }
    .kv-nav.is-open { display: flex; }

    .kv-actions {
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
        padding: 12px 24px 0;
    }

    .kv-links {
        flex-direction: column;
        align-items: stretch;
        height: auto;
    }

    .kv-nav-link {
        height: auto;
        padding: 14px 24px;
        border-bottom: 1px solid var(--kv-border);
        border-left: 3px solid transparent;
        justify-content: space-between;
    }
    .kv-nav-link:hover,
    .kv-nav-link:focus-visible {
        border-left-color: var(--kv-green);
        border-bottom-color: var(--kv-border);
    }
    .kv-nav-link.is-active {
        border-left-color: var(--kv-green);
        border-bottom-color: var(--kv-border);
    }

    .kv-disclosure {
        flex-direction: column;
    }
    .kv-equipment-panel,
    .kv-attachments-panel,
    .kv-support-panel {
        position: static;
        width: 100%;
        border: none;
        border-top: 1px solid var(--kv-border);
        box-shadow: none;
        animation: none;
        background: var(--kv-soft);
    }
    .kv-attachments-columns { grid-template-columns: 1fr; }
    .kv-attachments-column { border-right: none; border-bottom: 1px solid var(--kv-border); }
    .kv-equipment-grid { grid-template-columns: 1fr; }
    .kv-equipment-grid .kv-dropdown-item:nth-child(odd) { border-right: none; }
    .kv-panel-header { padding: 14px 20px 12px; }

    .kv-search {
        width: 100%;
        padding-left: 14px;
    }
    .kv-search input {
        width: 100%;
    }

    .kv-cta {
        margin: 0;
        justify-content: center;
    }

    .kv-navigation { position: relative; }
    .kv-navigation-inner { height: 60px; }
}

@media (max-width: 520px) {
    .kv-shell { padding: 0 16px; }
    .kv-utility-actions a:not(.kv-utility-phone):not(.kv-utility-email) { display: none; }
    .kv-brand-logo { height: 44px; max-width: 210px; }
    .kv-search input { width: 100%; }
}
</style>

<script>
(function () {
    /* ── Mobile nav toggle ── */
    const toggle = document.querySelector('[data-kv-toggle]');
    const nav    = document.querySelector('[data-kv-menu]');
    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            const open = nav.classList.toggle('is-open');
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    }

    /* ── Close dropdowns when clicking outside ── */
    document.addEventListener('click', (e) => {
        document.querySelectorAll('[data-kv-disclosure][open]').forEach(d => {
            if (!d.contains(e.target)) d.removeAttribute('open');
        });
    });

    /* ── Close other disclosures when one opens ── */
    document.querySelectorAll('[data-kv-disclosure]').forEach(d => {
        d.addEventListener('toggle', () => {
            if (d.open) {
                document.querySelectorAll('[data-kv-disclosure]').forEach(other => {
                    if (other !== d) other.removeAttribute('open');
                });
            }
        });
    });
})();
</script>
