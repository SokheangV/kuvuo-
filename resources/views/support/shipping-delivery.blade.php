<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping &amp; Delivery | KUVUO Heavy Equipment</title>
    <meta name="description" content="Learn how KUVUO handles mini excavator shipping, freight scheduling, delivery inspection, unloading preparation, and transit communication.">
    <link rel="stylesheet" href="{{ asset('css/support-pages.css') }}">
</head>
<body>

@include('partials.header')

<div class="sp-page">

    <section class="sp-hero">
        <div class="sp-shell sp-hero-inner">
            <div>
                <span class="sp-eyebrow">Policy Library</span>
                <h1>Shipping &amp; Delivery</h1>
                <p class="sp-hero-lead">This page explains how KUVUO manages freight planning, estimated delivery windows, site-readiness expectations, and delivery inspection for mini excavator orders.</p>
                <div class="sp-hero-chips">
                    <span class="sp-chip">Freight timelines vary by stock and destination</span>
                    <span class="sp-chip">Commercial access may improve delivery options</span>
                    <span class="sp-chip">Inspection at delivery is strongly recommended</span>
                </div>
            </div>
            <div class="sp-hero-visual" aria-hidden="true">
                <img src="{{ asset('assets/support/shipping-hero.svg') }}" alt="Shipping and delivery illustration">
            </div>
        </div>
    </section>

    <div class="sp-shell sp-body">

        <aside class="sp-sidebar">
            <div class="sp-sidebar-head"><strong>All Support Pages</strong><span>Browse all policies and FAQs.</span></div>
            <nav class="sp-sidebar-nav">
                <a href="{{ route('support.warranty') }}">Warranty Policy</a>
                <a href="{{ route('support.shipping') }}" class="sp-active">Shipping &amp; Delivery</a>
                <a href="{{ route('support.returns') }}">Return &amp; Refund Policy</a>
                <a href="{{ route('support.faq') }}">FAQ</a>
                <a href="{{ route('support.terms') }}">Terms &amp; Conditions</a>
                <a href="{{ route('support.privacy') }}">Privacy Policy</a>
            </nav>
            <div class="sp-sidebar-head"><strong>On This Page</strong><span>Main delivery workflow sections.</span></div>
            <nav class="sp-toc">
                <a href="#order-processing">Order Processing</a>
                <a href="#delivery-timelines">Delivery Timelines</a>
                <a href="#site-preparation">Site Preparation</a>
                <a href="#inspection-and-risk">Inspection and Risk</a>
            </nav>
            <div class="sp-panel-note">If you offer port pickup, container shipping, or country-specific import terms, add those details here before publishing.</div>
        </aside>

        <main class="sp-main">

            <div class="sp-section" id="order-processing">
                <div class="sp-section-label">Section 01</div>
                <h2>Order Processing and Freight Coordination</h2>
                <p>Once payment terms are satisfied and inventory is confirmed, KUVUO begins order processing, preparation, and freight scheduling for the purchased mini excavator or related equipment package.</p>
                <ul>
                    <li>Processing times may vary based on stock location, pre-delivery inspection, crating, and documentation requirements.</li>
                    <li>Customers may be contacted to confirm delivery access, unloading equipment, appointment availability, and consignee details.</li>
                    <li>Shipping charges, liftgate needs, remote-area fees, or re-delivery charges may be quoted separately where applicable.</li>
                </ul>
            </div>

            <div class="sp-section" id="delivery-timelines">
                <div class="sp-section-label">Section 02</div>
                <h2>Estimated Delivery Windows</h2>
                <p>Any transit timeline communicated by KUVUO is an estimate only and should not be treated as a guaranteed arrival date unless specifically confirmed in writing.</p>
                <ul>
                    <li>Transit may be affected by carrier capacity, weather, port congestion, customs clearance, holidays, or regional restrictions.</li>
                    <li>Orders containing attachments, spare parts, or special configuration requests may ship on a different schedule from the base machine.</li>
                    <li>KUVUO will make reasonable efforts to provide status updates when meaningful changes occur.</li>
                </ul>
            </div>

            <div class="sp-section" id="site-preparation">
                <div class="sp-section-label">Section 03</div>
                <h2>Customer Delivery Preparation</h2>
                <p>Customers are responsible for ensuring that the delivery location is safe, accessible, and suitable for the transport vehicle and unloading process.</p>
                <ul>
                    <li>Verify access width, overhead clearance, turning radius, surface condition, and local unloading limitations.</li>
                    <li>Arrange appropriate unloading equipment or personnel if the shipment does not include unloading service.</li>
                    <li>Ensure an authorized recipient is present to receive, inspect, and sign for the equipment.</li>
                </ul>
                <p>Failed delivery due to inaccessible sites, absent recipients, or missing unloading capability may result in storage, re-delivery, or additional carrier charges.</p>
            </div>

            <div class="sp-section" id="inspection-and-risk">
                <div class="sp-section-label">Section 04</div>
                <h2>Inspection, Delivery Acceptance, and Damage Reporting</h2>
                <p>Customers should inspect the shipment carefully at the time of delivery before signing any carrier receipt or proof-of-delivery document.</p>
                <ul>
                    <li>Photograph visible packaging or machine damage immediately and note all issues on the delivery receipt.</li>
                    <li>Report concealed damage to KUVUO as soon as discovered, ideally within 24 to 48 hours of receipt.</li>
                    <li>Ownership and risk of loss may transfer according to the agreed shipping terms, invoice terms, or applicable commercial law.</li>
                </ul>
                <p>KUVUO may assist with freight claims where appropriate, but carrier approval is not guaranteed and depends on documentation quality and reporting timelines.</p>
            </div>

            <div class="sp-notice">
                <div class="sp-section-label">Delivery Note</div>
                <h2>Heavy Equipment Needs Tighter Delivery Language Than Small Parcels</h2>
                <p>Mini excavator shipping often involves LTL, flatbed, or container movement, so this page is written with equipment logistics in mind rather than standard ecommerce parcel shipping.</p>
            </div>

            <div class="sp-contact">
                <div class="sp-section-label">Logistics</div>
                <h2>Shipping Contact</h2>
                <div class="sp-contact-row">
                    <span>Email</span>
                    <div>sales@kuvuo.com</div>
                </div>
                <div class="sp-contact-row">
                    <span>Best To Include</span>
                    <div>Order number, destination city, unloading details, and preferred contact number</div>
                </div>
                <div class="sp-contact-row">
                    <span>Status Updates</span>
                    <div>Provided when the carrier, dispatch team, or warehouse confirms movement milestones</div>
                </div>
            </div>

        </main>
    </div>

    <section class="sp-cta-strip">
        <div class="sp-shell sp-cta-inner">
            <div class="sp-cta-text">
                <h2>Questions about your shipment?</h2>
                <p>Contact KUVUO with your order number and destination details for a shipping status update.</p>
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
