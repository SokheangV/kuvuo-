<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return &amp; Refund Policy | KUVUO Heavy Equipment</title>
    <meta name="description" content="Understand KUVUO return approval requirements, refund conditions, restocking considerations, and non-returnable mini excavator items.">
    <link rel="stylesheet" href="{{ asset('css/support-pages.css') }}">
</head>
<body>

@include('partials.header')

<div class="sp-page">

    <section class="sp-hero">
        <div class="sp-shell sp-hero-inner">
            <div>
                <span class="sp-eyebrow">Policy Library</span>
                <h1>Return &amp; Refund Policy</h1>
                <p class="sp-hero-lead">This policy explains when returns may be accepted, how refund eligibility is reviewed, and what conditions apply to mini excavators, attachments, parts, and special-order products sold by KUVUO.</p>
                <div class="sp-hero-chips">
                    <span class="sp-chip">Return authorization required</span>
                    <span class="sp-chip">Unused condition may be required</span>
                    <span class="sp-chip">Heavy equipment returns may involve restocking and freight fees</span>
                </div>
            </div>
            <div class="sp-hero-visual" aria-hidden="true">
                <img src="{{ asset('assets/support/returns-hero.svg') }}" alt="Return and refund illustration">
            </div>
        </div>
    </section>

    <div class="sp-shell sp-body">

        <aside class="sp-sidebar">
            <div class="sp-sidebar-head"><strong>All Support Pages</strong><span>Browse all policies and FAQs.</span></div>
            <nav class="sp-sidebar-nav">
                <a href="{{ route('support.warranty') }}">Warranty Policy</a>
                <a href="{{ route('support.shipping') }}">Shipping &amp; Delivery</a>
                <a href="{{ route('support.returns') }}" class="sp-active">Return &amp; Refund Policy</a>
                <a href="{{ route('support.faq') }}">FAQ</a>
                <a href="{{ route('support.terms') }}">Terms &amp; Conditions</a>
                <a href="{{ route('support.privacy') }}">Privacy Policy</a>
            </nav>
            <div class="sp-sidebar-head"><strong>On This Page</strong><span>Main return and refund rules.</span></div>
            <nav class="sp-toc">
                <a href="#return-eligibility">Return Eligibility</a>
                <a href="#non-returnable-items">Non-Returnable Items</a>
                <a href="#refund-processing">Refund Processing</a>
                <a href="#damaged-or-incorrect">Damaged or Incorrect Orders</a>
            </nav>
            <div class="sp-panel-note">Heavy equipment return policies often differ sharply from normal retail. Keep this page aligned with your real inspection, resale, and freight cost exposure.</div>
        </aside>

        <main class="sp-main">

            <div class="sp-section" id="return-eligibility">
                <div class="sp-section-label">Section 01</div>
                <h2>Return Eligibility and Approval</h2>
                <p>Returns are not automatically accepted. Customers must contact KUVUO and obtain written return authorization before sending back any product, attachment, accessory, or machine.</p>
                <ul>
                    <li>Approved returns may need to be requested within a stated number of days after delivery.</li>
                    <li>Items may need to be unused, uninstalled, unmodified, and in substantially original condition with all included components.</li>
                    <li>Return approval may depend on product type, reason for return, inventory condition, and supplier acceptance.</li>
                </ul>
            </div>

            <div class="sp-section" id="non-returnable-items">
                <div class="sp-section-label">Section 02</div>
                <h2>Items Commonly Excluded From Return</h2>
                <p>Because mini excavators and equipment accessories may require freight handling, inspection, setup, or special sourcing, some items may be non-returnable unless they arrive damaged or materially not as ordered.</p>
                <ul>
                    <li>Used equipment, special-order units, custom-configured items, and clearance inventory may be final sale.</li>
                    <li>Electrical components, hydraulic components, fluids, consumables, and installed parts may be non-returnable.</li>
                    <li>Items returned without authorization or with shipping damage caused by improper repacking may be refused.</li>
                </ul>
            </div>

            <div class="sp-section" id="refund-processing">
                <div class="sp-section-label">Section 03</div>
                <h2>Refund Method, Deductions, and Timing</h2>
                <p>If a return is approved and received in acceptable condition, KUVUO may issue a refund to the original payment method or another agreed method, less applicable deductions.</p>
                <ul>
                    <li>Original outbound freight, return freight, insurance, customs, storage, and handling fees may be non-refundable.</li>
                    <li>Restocking fees may apply where inspection, repackaging, supplier penalties, or value reduction are involved.</li>
                    <li>Refund timing may depend on warehouse inspection completion, banking timelines, and the original payment channel.</li>
                </ul>
            </div>

            <div class="sp-section" id="damaged-or-incorrect">
                <div class="sp-section-label">Section 04</div>
                <h2>Damaged, Defective, or Incorrect Deliveries</h2>
                <p>If an item arrives visibly damaged, defective on arrival, or materially different from the confirmed order, the customer should notify KUVUO promptly and preserve all packaging, photos, and delivery records.</p>
                <ul>
                    <li>Visible freight damage should be noted on the carrier receipt at delivery.</li>
                    <li>Claims should include photos, serial numbers, packaging condition, and a concise issue summary.</li>
                    <li>KUVUO may offer replacement, repair support, partial credit, or another remedy depending on the verified issue.</li>
                </ul>
            </div>

            <div class="sp-notice">
                <div class="sp-section-label">Commercial Note</div>
                <h2>Returns for Mini Excavators Are Operationally Sensitive</h2>
                <p>Unlike lightweight consumer goods, machine returns can create high freight, inspection, depreciation, and safety handling costs. This page is intentionally written with that commercial reality in mind.</p>
            </div>

            <div class="sp-contact">
                <div class="sp-section-label">Returns</div>
                <h2>Return Request Contact</h2>
                <div class="sp-contact-row">
                    <span>Email</span>
                    <div>sales@kuvuo.com</div>
                </div>
                <div class="sp-contact-row">
                    <span>Include</span>
                    <div>Order number, item details, photos, condition summary, and reason for request</div>
                </div>
                <div class="sp-contact-row">
                    <span>Review Window</span>
                    <div>Typically 2 to 5 business days after receiving complete information</div>
                </div>
            </div>

        </main>
    </div>

    <section class="sp-cta-strip">
        <div class="sp-shell sp-cta-inner">
            <div class="sp-cta-text">
                <h2>Need to request a return?</h2>
                <p>Contact KUVUO with your order details before sending anything back — authorization is required.</p>
            </div>
            <a href="{{ route('contact') }}" class="sp-cta-btn">
                Contact Support
                <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
            </a>
        </div>
    </section>

</div>
@include('partials.footer')

<script>
(function(){
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
