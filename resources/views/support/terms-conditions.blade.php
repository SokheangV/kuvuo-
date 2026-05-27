<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms &amp; Conditions | KUVUO Heavy Equipment</title>
    <meta name="description" content="Read the KUVUO terms and conditions covering website use, order acceptance, product information, payment obligations, and liability limits.">
    <link rel="stylesheet" href="{{ asset('css/support-pages.css') }}">
</head>
<body>

@include('partials.header')

<div class="sp-page">

    <section class="sp-hero">
        <div class="sp-shell sp-hero-inner">
            <div>
                <span class="sp-eyebrow">Policy Library</span>
                <h1>Terms &amp; Conditions</h1>
                <p class="sp-hero-lead">These terms govern use of the KUVUO website, product information, quotations, order acceptance, payment obligations, and limitations related to mini excavator sales and related services.</p>
                <div class="sp-hero-chips">
                    <span class="sp-chip">Applies to browsing, inquiries, and purchases</span>
                    <span class="sp-chip">Quotes subject to confirmation</span>
                    <span class="sp-chip">Commercial terms should match invoice language</span>
                </div>
            </div>
            <div class="sp-hero-visual" aria-hidden="true">
                <img src="{{ asset('assets/support/terms-hero.svg') }}" alt="Terms and conditions illustration">
            </div>
        </div>
    </section>

    <div class="sp-shell sp-body">

        <aside class="sp-sidebar">
            <div class="sp-sidebar-head"><strong>All Support Pages</strong><span>Browse all policies and FAQs.</span></div>
            <nav class="sp-sidebar-nav">
                <a href="{{ route('support.warranty') }}">Warranty Policy</a>
                <a href="{{ route('support.shipping') }}">Shipping &amp; Delivery</a>
                <a href="{{ route('support.returns') }}">Return &amp; Refund Policy</a>
                <a href="{{ route('support.faq') }}">FAQ</a>
                <a href="{{ route('support.terms') }}" class="sp-active">Terms &amp; Conditions</a>
                <a href="{{ route('support.privacy') }}">Privacy Policy</a>
            </nav>
            <div class="sp-sidebar-head"><strong>On This Page</strong><span>Core commercial and website terms.</span></div>
            <nav class="sp-toc">
                <a href="#website-use">Website Use</a>
                <a href="#products-orders">Products and Orders</a>
                <a href="#payments-liability">Payments and Liability</a>
                <a href="#governing-updates">Governing Terms</a>
            </nav>
            <div class="sp-panel-note">Review this page against your invoice terms, dispute language, tax handling, and sales jurisdiction before going live.</div>
        </aside>

        <main class="sp-main">

            <div class="sp-section" id="website-use">
                <div class="sp-section-label">Section 01</div>
                <h2>Website Use and Content Accuracy</h2>
                <p>By using KUVUO.com, visitors agree to use the website only for lawful purposes and in a manner that does not interfere with site operation, security, or the experience of other users.</p>
                <ul>
                    <li>Product descriptions, images, specifications, and availability may be updated without prior notice.</li>
                    <li>Website content is provided for general informational purposes and may not reflect every regional configuration or stock change in real time.</li>
                    <li>Unauthorized copying, scraping, or misuse of site content, trademarks, or media may be prohibited.</li>
                </ul>
            </div>

            <div class="sp-section" id="products-orders">
                <div class="sp-section-label">Section 02</div>
                <h2>Quotes, Orders, and Acceptance</h2>
                <p>A quote, inquiry response, or cart submission does not guarantee acceptance of an order. Orders become final only after KUVUO confirms them and any required payment conditions are satisfied.</p>
                <ul>
                    <li>Pricing, freight estimates, promotions, and availability are subject to correction in the event of clerical, supplier, or market changes.</li>
                    <li>KUVUO reserves the right to decline, cancel, or limit orders where fraud risk, stock errors, or compliance concerns are identified.</li>
                    <li>Customers are responsible for verifying that ordered equipment suits the intended application and local operational requirements.</li>
                </ul>
            </div>

            <div class="sp-section" id="payments-liability">
                <div class="sp-section-label">Section 03</div>
                <h2>Payments, Ownership, and Limitation of Liability</h2>
                <p>Payment terms, deposit requirements, taxes, and release conditions will be governed by the invoice, quote, or other written sales documents issued by KUVUO.</p>
                <ul>
                    <li>Ownership may remain with KUVUO until payment clears in full, where permitted by law and reflected in the sale documents.</li>
                    <li>Customers are responsible for taxes, duties, permitting, registration, and local compliance costs unless otherwise stated.</li>
                    <li>To the maximum extent allowed by law, KUVUO will not be liable for indirect, incidental, special, or consequential damages arising from use, delay, or inability to use purchased equipment.</li>
                </ul>
                <p>Nothing in these terms is intended to remove rights that cannot legally be excluded under applicable consumer or commercial law.</p>
            </div>

            <div class="sp-section" id="governing-updates">
                <div class="sp-section-label">Section 04</div>
                <h2>Governing Terms, Severability, and Revisions</h2>
                <p>These terms should be interpreted together with the privacy policy, warranty policy, shipping policy, return policy, invoice terms, and any signed commercial agreements between KUVUO and the customer.</p>
                <ul>
                    <li>If one provision is found unenforceable, the remaining provisions should continue to apply to the fullest extent permitted.</li>
                    <li>KUVUO may revise these terms periodically by posting an updated version on the website.</li>
                    <li>Continued use of the website after revisions are posted may constitute acceptance of the updated terms.</li>
                </ul>
            </div>

            <div class="sp-notice">
                <div class="sp-section-label">Publishing Note</div>
                <h2>Terms Pages Work Best When They Match Your Order Documents</h2>
                <p>For a stronger legal position and better customer clarity, align the wording on this page with your quotation format, invoices, warranty certificates, and shipping terms.</p>
            </div>

            <div class="sp-contact">
                <div class="sp-section-label">General Contact</div>
                <h2>Questions About These Terms</h2>
                <div class="sp-contact-row">
                    <span>Email</span>
                    <div>sales@kuvuo.com</div>
                </div>
                <div class="sp-contact-row">
                    <span>Department</span>
                    <div>KUVUO Sales and Customer Support</div>
                </div>
                <div class="sp-contact-row">
                    <span>Best Practice</span>
                    <div>Reference your quote or invoice number when contacting the team about an order</div>
                </div>
            </div>

        </main>
    </div>

    <section class="sp-cta-strip">
        <div class="sp-shell sp-cta-inner">
            <div class="sp-cta-text">
                <h2>Questions about our terms?</h2>
                <p>Contact KUVUO directly for clarification on any specific order, quote, or policy matter.</p>
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
