<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Center | KUVUO Heavy Equipment</title>
    <meta name="description" content="KUVUO support center — warranty, shipping, returns, FAQ, terms, and privacy policy for heavy equipment buyers.">
    <link rel="stylesheet" href="{{ asset('css/support-pages.css') }}">
</head>
<body>

@include('partials.header')

<div class="sp-page">

    {{-- ── HERO ── --}}
    <section class="sp-index-hero">
        <div class="sp-shell">
            <div class="sp-index-hero-eyebrow">Support Center</div>
            <h1>How Can We Help?</h1>
            <p>Find warranty information, shipping details, return procedures, legal terms, and answers to common questions about your KUVUO equipment order.</p>
        </div>
    </section>

    {{-- ── CARD GRID ── --}}
    <section class="sp-index-section">
        <div class="sp-shell">
            <div class="sp-index-grid">

                <a href="{{ route('support.warranty') }}" class="sp-index-card" id="support-card-warranty">
                    <div class="sp-index-card-code">01 — Warranty</div>
                    <div class="sp-index-card-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h3>Warranty Policy</h3>
                    <p>Coverage period, what is covered, exclusions, and how to submit a warranty claim for eligible equipment.</p>
                    <span class="sp-index-card-arrow">
                        View Policy
                        <svg viewBox="0 0 16 16"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                    </span>
                </a>

                <a href="{{ route('support.shipping') }}" class="sp-index-card" id="support-card-shipping">
                    <div class="sp-index-card-code">02 — Shipping</div>
                    <div class="sp-index-card-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"><rect x="2" y="7" width="15" height="12"/><polyline points="17 7 22 7 22 19 17 19"/><line x1="12" y1="12" x2="22" y2="12"/><circle cx="6.5" cy="19" r="2"/><circle cx="18.5" cy="19" r="2"/></svg>
                    </div>
                    <h3>Shipping &amp; Delivery</h3>
                    <p>Order processing, freight timelines, site preparation, delivery inspection, and damage reporting guidelines.</p>
                    <span class="sp-index-card-arrow">
                        View Policy
                        <svg viewBox="0 0 16 16"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                    </span>
                </a>

                <a href="{{ route('support.returns') }}" class="sp-index-card" id="support-card-returns">
                    <div class="sp-index-card-code">03 — Returns</div>
                    <div class="sp-index-card-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                    </div>
                    <h3>Return &amp; Refund Policy</h3>
                    <p>Return eligibility, non-returnable items, refund deductions, and how to handle damaged or incorrect deliveries.</p>
                    <span class="sp-index-card-arrow">
                        View Policy
                        <svg viewBox="0 0 16 16"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                    </span>
                </a>

                <a href="{{ route('support.faq') }}" class="sp-index-card" id="support-card-faq">
                    <div class="sp-index-card-code">04 — FAQ</div>
                    <div class="sp-index-card-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    </div>
                    <h3>Frequently Asked Questions</h3>
                    <p>Answers to common questions about ordering, freight, warranty, attachments, and after-sales service.</p>
                    <span class="sp-index-card-arrow">
                        View FAQ
                        <svg viewBox="0 0 16 16"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                    </span>
                </a>

                <a href="{{ route('support.terms') }}" class="sp-index-card" id="support-card-terms">
                    <div class="sp-index-card-code">05 — Terms</div>
                    <div class="sp-index-card-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    </div>
                    <h3>Terms &amp; Conditions</h3>
                    <p>Website use, order acceptance, payment obligations, ownership terms, and limitation of liability.</p>
                    <span class="sp-index-card-arrow">
                        View Terms
                        <svg viewBox="0 0 16 16"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                    </span>
                </a>

                <a href="{{ route('support.privacy') }}" class="sp-index-card" id="support-card-privacy">
                    <div class="sp-index-card-code">06 — Privacy</div>
                    <div class="sp-index-card-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"><rect x="3" y="11" width="18" height="11" rx="0"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <h3>Privacy Policy</h3>
                    <p>How KUVUO collects, uses, stores, and protects personal information for website visitors and buyers.</p>
                    <span class="sp-index-card-arrow">
                        View Policy
                        <svg viewBox="0 0 16 16"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
                    </span>
                </a>

            </div>
        </div>
    </section>

    {{-- ── CTA STRIP ── --}}
    <section class="sp-cta-strip">
        <div class="sp-shell sp-cta-inner">
            <div class="sp-cta-text">
                <h2>Still need help?</h2>
                <p>Contact the KUVUO team directly — reference your quote or order number to speed things up.</p>
            </div>
            <a href="{{ route('contact') }}" class="sp-cta-btn">
                Contact Support
                <svg viewBox="0 0 16 16" aria-hidden="true"><path d="M3 8h9M8 3l5 5-5 5"/></svg>
            </a>
        </div>
    </section>

</div>{{-- .sp-page --}}

@include('partials.footer')

</body>
</html>
