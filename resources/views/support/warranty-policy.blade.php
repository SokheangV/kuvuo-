<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warranty Policy | KUVUO Heavy Equipment</title>
    <meta name="description" content="Review KUVUO warranty coverage terms for mini excavators, components, exclusions, claim procedures, and customer responsibilities.">
    <link rel="stylesheet" href="{{ asset('css/support-pages.css') }}">
</head>
<body>

@include('partials.header')

<div class="sp-page">

    {{-- ── HERO ── --}}
    <section class="sp-hero">
        <div class="sp-shell sp-hero-inner">
            <div>
                <span class="sp-eyebrow">Policy Library</span>
                <h1>Warranty Policy</h1>
                <p class="sp-hero-lead">This warranty policy outlines the scope of coverage, claim process, exclusions, and owner responsibilities for mini excavators and related products sold by KUVUO.</p>
                <div class="sp-hero-chips">
                    <span class="sp-chip">Applies to eligible KUVUO equipment sales</span>
                    <span class="sp-chip">Covers manufacturing defects only</span>
                    <span class="sp-chip">Proof of purchase and serial number required</span>
                </div>
            </div>
            <div class="sp-hero-visual" aria-hidden="true">
                <img src="{{ asset('assets/support/warranty-hero.svg') }}" alt="Warranty shield illustration">
            </div>
        </div>
    </section>

    {{-- ── BODY ── --}}
    <div class="sp-shell sp-body">

        {{-- Sidebar --}}
        <aside class="sp-sidebar">
            <div class="sp-sidebar-head"><strong>All Support Pages</strong><span>Browse all policies and FAQs.</span></div>
            <nav class="sp-sidebar-nav">
                <a href="{{ route('support.warranty') }}" class="sp-active">Warranty Policy</a>
                <a href="{{ route('support.shipping') }}">Shipping &amp; Delivery</a>
                <a href="{{ route('support.returns') }}">Return &amp; Refund Policy</a>
                <a href="{{ route('support.faq') }}">FAQ</a>
                <a href="{{ route('support.terms') }}">Terms &amp; Conditions</a>
                <a href="{{ route('support.privacy') }}">Privacy Policy</a>
            </nav>
            <div class="sp-sidebar-head"><strong>On This Page</strong><span>Core warranty terms at a glance.</span></div>
            <nav class="sp-toc">
                <a href="#coverage-period">Coverage Period</a>
                <a href="#what-is-covered">What Is Covered</a>
                <a href="#what-is-not-covered">Exclusions</a>
                <a href="#claims-process">Claims Process</a>
            </nav>
            <div class="sp-panel-note">Confirm the exact coverage duration, wear-part exclusions, and labor terms before publishing this version live.</div>
        </aside>

        {{-- Main --}}
        <main class="sp-main">

            <div class="sp-section" id="coverage-period">
                <div class="sp-section-label">Section 01</div>
                <h2>Coverage Period and Eligibility</h2>
                <p>Unless otherwise stated in writing on the invoice or product documentation, KUVUO may provide a limited warranty for new mini excavators covering defects in materials and workmanship for a defined period starting on the delivery date.</p>
                <ul>
                    <li>Warranty eligibility typically requires proof of purchase and the original machine serial number.</li>
                    <li>Coverage generally applies only to the original purchaser unless local law or a written transfer approval states otherwise.</li>
                    <li>Any replacement part supplied under warranty may be covered only for the remainder of the original warranty period.</li>
                </ul>
            </div>

            <div class="sp-section" id="what-is-covered">
                <div class="sp-section-label">Section 02</div>
                <h2>What the Warranty Covers</h2>
                <p>KUVUO's limited warranty is intended to address verified manufacturing defects that affect the intended operation of the machine under normal use and proper maintenance.</p>
                <ul>
                    <li>Defects in factory-installed components that fail due to workmanship or material issues.</li>
                    <li>Replacement parts approved by KUVUO to resolve a verified covered defect.</li>
                    <li>Remote troubleshooting support and claim guidance to confirm diagnosis before corrective action.</li>
                </ul>
                <p>KUVUO reserves the right to repair, replace, or provide an equivalent remedy based on parts availability, inspection results, and the nature of the claim.</p>
            </div>

            <div class="sp-section" id="what-is-not-covered">
                <div class="sp-section-label">Section 03</div>
                <h2>Exclusions and Owner Responsibilities</h2>
                <p>The warranty does not cover issues caused by misuse, neglect, accidents, unauthorized modifications, improper storage, lack of maintenance, or operation outside the equipment's intended specifications.</p>
                <ul>
                    <li>Normal wear items such as filters, hoses, seals, belts, tracks, teeth, cutting edges, and fluids may be excluded.</li>
                    <li>Damage caused by overloading, improper transport, contaminated fuel, operator error, or unapproved attachments may be excluded.</li>
                    <li>Field labor, travel time, downtime costs, rental replacement costs, and indirect losses may not be included unless agreed in writing.</li>
                </ul>
                <p>Owners are responsible for performing routine maintenance, following operation manuals, keeping service records, and stopping use when a machine defect could cause additional damage.</p>
            </div>

            <div class="sp-section" id="claims-process">
                <div class="sp-section-label">Section 04</div>
                <h2>How to Submit a Warranty Claim</h2>
                <ol>
                    <li>Contact KUVUO support promptly after discovering the issue and provide the order number, model, and serial number.</li>
                    <li>Share photos, videos, maintenance records, and a clear description of the fault and operating conditions.</li>
                    <li>Wait for troubleshooting instructions or inspection approval before arranging third-party repairs.</li>
                    <li>If approved, follow KUVUO's written guidance for parts return, replacement, or repair handling.</li>
                </ol>
                <p>Claims may be denied if unauthorized repairs are performed first, if required evidence is missing, or if the issue falls outside the stated warranty scope.</p>
            </div>

            <div class="sp-notice">
                <div class="sp-section-label">Operational Note</div>
                <h2>Warranty Language Should Match Real Support Capacity</h2>
                <p>If your business offers parts-only coverage, limited labor assistance, or different terms by product class, adjust this draft so the website matches the actual promise customers receive after purchase.</p>
            </div>

            <div class="sp-contact">
                <div class="sp-section-label">Support</div>
                <h2>Warranty Contact</h2>
                <div class="sp-contact-row">
                    <span>Email</span>
                    <div>sales@kuvuo.com</div>
                </div>
                <div class="sp-contact-row">
                    <span>Required Info</span>
                    <div>Invoice number, machine model, serial number, photos, and issue summary</div>
                </div>
                <div class="sp-contact-row">
                    <span>Claim Review</span>
                    <div>Initial response target within 2 business days</div>
                </div>
            </div>

        </main>
    </div>

    {{-- CTA Strip --}}
    <section class="sp-cta-strip">
        <div class="sp-shell sp-cta-inner">
            <div class="sp-cta-text">
                <h2>Need help with a warranty claim?</h2>
                <p>Contact KUVUO directly — have your order number and machine serial number ready.</p>
            </div>
            <a href="{{ route('contact') }}" class="sp-cta-btn">
                Contact Support
                <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
            </a>
        </div>
    </section>

</div>{{-- .sp-page --}}

@include('partials.footer')

<script>
(function(){
    document.querySelectorAll('.sp-toc a').forEach(function(a){
        a.addEventListener('click',function(){
            document.querySelectorAll('.sp-toc a').forEach(function(l){l.classList.remove('active');});
            a.classList.add('active');
        });
    });
    var tocLinks=Array.from(document.querySelectorAll('.sp-toc a'));
    var sections=tocLinks.map(function(a){var id=a.getAttribute('href');return id?document.querySelector(id):null;}).filter(Boolean);
    if(tocLinks.length&&sections.length&&'IntersectionObserver'in window){
        var obs=new IntersectionObserver(function(entries){entries.forEach(function(e){if(!e.isIntersecting)return;tocLinks.forEach(function(a){a.classList.toggle('active',a.getAttribute('href')==='#'+e.target.id);});});},{rootMargin:'-20% 0px -60% 0px',threshold:0.2});
        sections.forEach(function(s){obs.observe(s);});
    }
})();
</script>
</body>
</html>
