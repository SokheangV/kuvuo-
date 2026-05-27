<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | KUVUO Heavy Equipment</title>
    <meta name="description" content="Read frequently asked questions about KUVUO mini excavators, shipping, warranties, payment flow, parts support, and machine operation.">
    <link rel="stylesheet" href="{{ asset('css/support-pages.css') }}">
</head>
<body>

@include('partials.header')

<div class="sp-page">

    <section class="sp-hero">
        <div class="sp-shell sp-hero-inner">
            <div>
                <span class="sp-eyebrow">Policy Library</span>
                <h1>Frequently Asked Questions</h1>
                <p class="sp-hero-lead">This page answers common questions about ordering, freight, warranty support, attachments, operating expectations, and after-sales service for KUVUO heavy equipment.</p>
                <div class="sp-hero-chips">
                    <span class="sp-chip">Built for first-time and repeat buyers</span>
                    <span class="sp-chip">Covers sales, logistics, and support topics</span>
                    <span class="sp-chip">Pairs with the full policy pages</span>
                </div>
            </div>
            <div class="sp-hero-visual" aria-hidden="true">
                <img src="{{ asset('assets/support/faq-hero.svg') }}" alt="FAQ illustration">
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
                <a href="{{ route('support.faq') }}" class="sp-active">FAQ</a>
                <a href="{{ route('support.terms') }}">Terms &amp; Conditions</a>
                <a href="{{ route('support.privacy') }}">Privacy Policy</a>
            </nav>
            <div class="sp-sidebar-head"><strong>On This Page</strong><span>Jump to the most asked topics.</span></div>
            <nav class="sp-toc">
                <a href="#ordering">Ordering</a>
                <a href="#delivery">Delivery</a>
                <a href="#warranty">Warranty</a>
                <a href="#support">Support</a>
            </nav>
            <div class="sp-panel-note">If you have specific machine models or engine details to include, a tailored FAQ version can be created for your product catalog.</div>
        </aside>

        <main class="sp-main">

            {{-- Section: Ordering --}}
            <div class="sp-section" id="ordering">
                <div class="sp-section-label">Section 01</div>
                <h2>Ordering and Product Selection</h2>

                <div class="sp-faq-item open">
                    <button class="sp-faq-toggle" type="button" aria-expanded="true">
                        <span>How do I know which mini excavator model is right for my project?</span>
                        <span class="sp-faq-toggle-icon" aria-hidden="true">+</span>
                    </button>
                    <div class="sp-faq-answer">
                        Share the type of work, digging depth requirements, site access limits, attachment needs, and expected usage frequency. KUVUO can then recommend a more suitable compact excavator setup for landscaping, farm work, small construction, or utility jobs.
                    </div>
                </div>

                <div class="sp-faq-item">
                    <button class="sp-faq-toggle" type="button" aria-expanded="false">
                        <span>Are the machine specifications on the website final?</span>
                        <span class="sp-faq-toggle-icon" aria-hidden="true">+</span>
                    </button>
                    <div class="sp-faq-answer">
                        Website specifications are intended as a guide. Final configuration, included accessories, and available stock should always be confirmed on your quote or invoice.
                    </div>
                </div>
            </div>

            {{-- Section: Delivery --}}
            <div class="sp-section" id="delivery">
                <div class="sp-section-label">Section 02</div>
                <h2>Freight, Delivery, and Receiving</h2>

                <div class="sp-faq-item">
                    <button class="sp-faq-toggle" type="button" aria-expanded="false">
                        <span>How long does delivery usually take after ordering?</span>
                        <span class="sp-faq-toggle-icon" aria-hidden="true">+</span>
                    </button>
                    <div class="sp-faq-answer">
                        Delivery timing depends on stock location, machine preparation, freight scheduling, and destination access. KUVUO can provide an estimated shipping window, but transit timing should be treated as an estimate unless guaranteed in writing.
                    </div>
                </div>

                <div class="sp-faq-item">
                    <button class="sp-faq-toggle" type="button" aria-expanded="false">
                        <span>What should I do when the machine arrives?</span>
                        <span class="sp-faq-toggle-icon" aria-hidden="true">+</span>
                    </button>
                    <div class="sp-faq-answer">
                        Inspect the shipment carefully before signing the delivery receipt. Photograph any visible damage, note concerns on the carrier paperwork, and notify KUVUO promptly if the machine appears damaged or incomplete.
                    </div>
                </div>
            </div>

            {{-- Section: Warranty --}}
            <div class="sp-section" id="warranty">
                <div class="sp-section-label">Section 03</div>
                <h2>Warranty and Returns</h2>

                <div class="sp-faq-item">
                    <button class="sp-faq-toggle" type="button" aria-expanded="false">
                        <span>What is normally needed to make a warranty claim?</span>
                        <span class="sp-faq-toggle-icon" aria-hidden="true">+</span>
                    </button>
                    <div class="sp-faq-answer">
                        Most warranty claims require your order reference, machine model, serial number, photos or video of the issue, and a short description of when the fault occurred and how the machine was being used.
                    </div>
                </div>

                <div class="sp-faq-item">
                    <button class="sp-faq-toggle" type="button" aria-expanded="false">
                        <span>Can I return a mini excavator if I change my mind?</span>
                        <span class="sp-faq-toggle-icon" aria-hidden="true">+</span>
                    </button>
                    <div class="sp-faq-answer">
                        Heavy equipment returns are handled case by case. Return approval is not automatic and may depend on condition, usage, freight exposure, and whether the unit was specially ordered or configured.
                    </div>
                </div>
            </div>

            {{-- Section: Support --}}
            <div class="sp-section" id="support">
                <div class="sp-section-label">Section 04</div>
                <h2>Parts, Service, and After-Sales Support</h2>

                <div class="sp-faq-item">
                    <button class="sp-faq-toggle" type="button" aria-expanded="false">
                        <span>Do you help with parts and technical support after purchase?</span>
                        <span class="sp-faq-toggle-icon" aria-hidden="true">+</span>
                    </button>
                    <div class="sp-faq-answer">
                        Yes. KUVUO can help customers with common support requests such as parts lookup, troubleshooting guidance, warranty review, and basic service coordination depending on the product line and available support documentation.
                    </div>
                </div>

                <div class="sp-faq-item">
                    <button class="sp-faq-toggle" type="button" aria-expanded="false">
                        <span>What information should I send when I need help?</span>
                        <span class="sp-faq-toggle-icon" aria-hidden="true">+</span>
                    </button>
                    <div class="sp-faq-answer">
                        Include your machine model, serial number, order reference, photos of the issue, and a concise explanation of what happened. That helps speed up diagnosis and parts identification.
                    </div>
                </div>
            </div>

            <div class="sp-contact">
                <div class="sp-section-label">Contact</div>
                <h2>FAQ and General Support</h2>
                <div class="sp-contact-row">
                    <span>Email</span>
                    <div>sales@kuvuo.com</div>
                </div>
                <div class="sp-contact-row">
                    <span>Coverage</span>
                    <div>General sales questions, order help, shipping updates, warranty guidance, and parts support</div>
                </div>
                <div class="sp-contact-row">
                    <span>Tip</span>
                    <div>Reference your quote, order, or machine serial number when possible</div>
                </div>
            </div>

        </main>
    </div>

    <section class="sp-cta-strip">
        <div class="sp-shell sp-cta-inner">
            <div class="sp-cta-text">
                <h2>Didn't find your answer?</h2>
                <p>Contact the KUVUO team directly — we're here to help with any equipment question.</p>
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
    /* FAQ accordion */
    document.querySelectorAll('.sp-faq-toggle').forEach(function(btn){
        btn.addEventListener('click',function(){
            var item=btn.closest('.sp-faq-item');
            if(!item)return;
            var isOpen=item.classList.toggle('open');
            btn.setAttribute('aria-expanded',isOpen?'true':'false');
        });
    });
    /* TOC */
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
