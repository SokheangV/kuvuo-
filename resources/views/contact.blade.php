@extends('layouts.app')

@section('content')
<style>
    :root {
        --contact-green-900: #12372A;
        --contact-green-700: #1F5D45;
        --contact-green-50: #EEF5F0;
        --contact-green-25: #F6FAF7;
        --contact-ink: #111827;
        --contact-muted: #6B7280;
        --contact-border: #D7DED9;
        --contact-accent: #D97706;
        --contact-white: #FFFFFF;
    }

    .contact-page,
    .contact-page * {
        box-sizing: border-box;
    }

    .contact-page {
        background: var(--contact-white);
        color: var(--contact-ink);
        font-family: 'Nunito', Arial, Helvetica, sans-serif;
    }

    .contact-shell {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 28px;
    }

    .contact-section {
        padding: 96px 0;
    }

    .contact-section + .contact-section {
        border-top: 1px solid var(--contact-border);
    }

    .contact-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--contact-green-900);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        padding: 6px 12px;
        border: 1px solid var(--contact-green-900);
        background: var(--contact-white);
    }

    .contact-eyebrow::before {
        content: "";
        width: 8px;
        height: 8px;
        background: var(--contact-accent);
        display: block;
    }

    .contact-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 24px;
        border: 1.5px solid transparent;
        font-family: 'Google Sans', Arial, Helvetica, sans-serif;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: background-color .18s ease, color .18s ease, border-color .18s ease, transform .12s ease, box-shadow .18s ease;
        cursor: pointer;
    }

    .contact-button:hover {
        transform: translateY(-1px);
    }

    .contact-button-primary {
        background: var(--contact-green-900);
        color: var(--contact-white);
        border-color: var(--contact-green-900);
    }

    .contact-button-primary:hover {
        background: var(--contact-green-700);
        border-color: var(--contact-green-700);
        box-shadow: 0 10px 24px rgba(18, 55, 42, 0.18);
    }

    .contact-button-outline {
        background: var(--contact-white);
        color: var(--contact-green-900);
        border-color: var(--contact-green-900);
    }

    .contact-button-outline:hover {
        background: var(--contact-green-50);
    }

    .contact-hero {
        padding: 84px 0 88px;
        background:
            radial-gradient(60% 70% at 100% 0%, var(--contact-green-50) 0%, transparent 60%),
            linear-gradient(180deg, var(--contact-white) 0%, var(--contact-green-25) 100%);
        border-bottom: 1px solid var(--contact-border);
    }

    .contact-hero-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.15fr) minmax(320px, 0.85fr);
        gap: 36px;
        align-items: stretch;
    }

    .contact-hero-copy h1,
    .contact-section-head h2,
    .contact-form-card h2,
    .contact-info-card h2 {
        font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
    }

    .contact-hero-copy h1 {
        margin: 22px 0 20px;
        font-size: clamp(38px, 4.2vw, 56px);
        line-height: 1.06;
        letter-spacing: -0.02em;
        color: var(--contact-ink);
        max-width: 760px;
    }

    .contact-hero-copy p {
        max-width: 620px;
        font-size: 17px;
        line-height: 1.7;
        color: var(--contact-muted);
    }

    .contact-hero-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-top: 34px;
    }

    .contact-hero-notes {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0;
        max-width: 620px;
        margin-top: 36px;
        border-top: 1px solid var(--contact-border);
        padding-top: 22px;
    }

    .contact-hero-notes article {
        padding-right: 18px;
        border-right: 1px solid var(--contact-border);
    }

    .contact-hero-notes article:nth-child(2) {
        padding-left: 18px;
    }

    .contact-hero-notes article:last-child {
        border-right: 0;
        padding: 0 0 0 18px;
    }

    .contact-hero-notes strong {
        display: block;
        margin-bottom: 6px;
        color: var(--contact-green-900);
        font-size: 24px;
        font-weight: 800;
        line-height: 1;
    }

    .contact-hero-notes span {
        display: block;
        color: var(--contact-muted);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .contact-hero-panel {
        background: var(--contact-white);
        border: 1px solid var(--contact-border);
        padding: 26px;
        box-shadow: 0 30px 60px -30px rgba(18, 55, 42, 0.2);
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .contact-panel-label {
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: var(--contact-green-900);
    }

    .contact-panel-title {
        font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
        font-size: 30px;
        line-height: 1.14;
        color: var(--contact-ink);
    }

    .contact-panel-copy {
        color: var(--contact-muted);
        line-height: 1.7;
        font-size: 15px;
    }

    .contact-panel-list {
        display: grid;
        gap: 12px;
    }

    .contact-panel-item {
        display: grid;
        grid-template-columns: 42px 1fr;
        gap: 14px;
        align-items: start;
        padding: 14px 0;
        border-top: 1px solid var(--contact-border);
    }

    .contact-panel-item:first-child {
        border-top: 0;
        padding-top: 0;
    }

    .contact-panel-icon {
        width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--contact-green-50);
        color: var(--contact-green-900);
        font-size: 16px;
    }

    .contact-panel-item strong {
        display: block;
        margin-bottom: 4px;
        font-size: 14px;
        font-weight: 800;
        color: var(--contact-ink);
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .contact-panel-item p,
    .contact-panel-item a {
        color: var(--contact-muted);
        line-height: 1.6;
        font-size: 15px;
        text-decoration: none;
    }

    .contact-panel-item a:hover {
        color: var(--contact-green-900);
    }

    .contact-section-head {
        max-width: 740px;
        margin-bottom: 42px;
    }

    .contact-section-head h2 {
        margin: 18px 0 14px;
        font-size: clamp(30px, 3.2vw, 44px);
        line-height: 1.08;
        letter-spacing: -0.02em;
        color: var(--contact-ink);
    }

    .contact-section-head p {
        color: var(--contact-muted);
        font-size: 17px;
        line-height: 1.7;
        max-width: 620px;
    }

    .contact-cards-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
    }

    .contact-card,
    .contact-value-card,
    .contact-faq-item {
        background: var(--contact-white);
        border: 1px solid var(--contact-border);
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }

    .contact-card {
        padding: 28px 24px;
    }

    .contact-card:hover,
    .contact-value-card:hover,
    .contact-faq-item:hover {
        transform: translateY(-3px);
        border-color: rgba(18, 55, 42, 0.24);
        box-shadow: 0 20px 40px -32px rgba(18, 55, 42, 0.35);
    }

    .contact-card-icon {
        width: 54px;
        height: 54px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        background: var(--contact-green-50);
        color: var(--contact-green-900);
        font-size: 20px;
    }

    .contact-card h3,
    .contact-value-card h3,
    .contact-faq-item h3 {
        font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
        color: var(--contact-ink);
    }

    .contact-card h3 {
        font-size: 22px;
        margin-bottom: 10px;
    }

    .contact-card p,
    .contact-card a {
        color: var(--contact-muted);
        line-height: 1.7;
        font-size: 15px;
        text-decoration: none;
    }

    .contact-card a:hover {
        color: var(--contact-green-900);
    }

    .contact-form-section {
        background: var(--contact-green-25);
    }

    .contact-form-grid {
        display: grid;
        grid-template-columns: minmax(0, 0.88fr) minmax(0, 1.12fr);
        gap: 24px;
        align-items: start;
    }

    .contact-info-card,
    .contact-form-card {
        background: var(--contact-white);
        border: 1px solid var(--contact-border);
        padding: 34px;
        min-height: 100%;
    }

    .contact-info-card h2,
    .contact-form-card h2 {
        font-size: 32px;
        line-height: 1.12;
        margin-bottom: 14px;
        color: var(--contact-ink);
    }

    .contact-info-card > p,
    .contact-form-card > p {
        color: var(--contact-muted);
        line-height: 1.7;
        font-size: 15px;
        margin-bottom: 24px;
    }

    .contact-info-list {
        display: grid;
        gap: 14px;
        margin-bottom: 28px;
    }

    .contact-info-row {
        display: grid;
        grid-template-columns: 40px 1fr;
        gap: 14px;
        align-items: start;
        padding-bottom: 14px;
        border-bottom: 1px solid var(--contact-border);
    }

    .contact-info-row:last-child {
        padding-bottom: 0;
    }

    .contact-info-row span {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--contact-green-50);
        color: var(--contact-green-900);
        font-size: 15px;
    }

    .contact-info-row strong {
        display: block;
        margin-bottom: 4px;
        color: var(--contact-green-900);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .contact-info-row p,
    .contact-info-row a {
        color: var(--contact-ink);
        text-decoration: none;
        line-height: 1.6;
        font-size: 15px;
    }

    .contact-info-row a:hover {
        color: var(--contact-green-700);
    }

    .contact-trust-grid {
        display: grid;
        gap: 14px;
    }

    .contact-trust-item {
        display: grid;
        grid-template-columns: 46px 1fr;
        gap: 14px;
        align-items: center;
        padding: 16px 18px;
        background: var(--contact-green-50);
        border: 1px solid rgba(18, 55, 42, 0.08);
    }

    .contact-trust-item span {
        width: 46px;
        height: 46px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--contact-white);
        color: var(--contact-green-900);
        font-size: 18px;
    }

    .contact-trust-item h3 {
        font-size: 18px;
        margin-bottom: 4px;
    }

    .contact-trust-item p {
        color: var(--contact-muted);
        line-height: 1.6;
        font-size: 14px;
        margin: 0;
    }

    .contact-flash {
        padding: 14px 16px;
        margin-bottom: 18px;
        border: 1px solid var(--contact-border);
        background: var(--contact-green-50);
        color: var(--contact-green-900);
        font-weight: 700;
    }

    .contact-error-list {
        padding: 14px 16px;
        margin: 0 0 18px;
        border: 1px solid rgba(185, 28, 28, 0.2);
        background: #FFF1F2;
        color: #991B1B;
    }

    .contact-error-list ul {
        margin: 8px 0 0 18px;
    }

    .contact-form-grid-fields {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .contact-form-field {
        display: grid;
        gap: 8px;
    }

    .contact-form-field.full {
        grid-column: 1 / -1;
    }

    .contact-form-field label {
        color: var(--contact-ink);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .contact-form-field input,
    .contact-form-field select,
    .contact-form-field textarea {
        width: 100%;
        min-width: 0;
        padding: 15px 16px;
        border: 1px solid var(--contact-border);
        background: var(--contact-white);
        color: var(--contact-ink);
        font: inherit;
        outline: none;
        transition: border-color .15s ease, box-shadow .15s ease, background-color .15s ease;
    }

    .contact-form-field input:focus,
    .contact-form-field select:focus,
    .contact-form-field textarea:focus {
        border-color: var(--contact-green-900);
        box-shadow: 0 0 0 4px rgba(18, 55, 42, 0.08);
    }

    .contact-form-field textarea {
        min-height: 170px;
        resize: vertical;
    }

    .contact-form-actions {
        display: flex;
        justify-content: flex-start;
        margin-top: 22px;
    }

    .contact-value-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
    }

    .contact-value-card {
        padding: 28px 24px;
    }

    .contact-value-card h3 {
        font-size: 22px;
        margin-bottom: 12px;
    }

    .contact-value-card p {
        color: var(--contact-muted);
        line-height: 1.7;
        font-size: 15px;
    }

    .contact-map-frame {
        overflow: hidden;
        border: 1px solid var(--contact-border);
        box-shadow: 0 28px 56px -34px rgba(18, 55, 42, 0.25);
    }

    .contact-map-frame iframe {
        display: block;
        width: 100%;
        height: 500px;
        border: 0;
    }

    .contact-faq-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .contact-faq-item {
        padding: 28px 24px;
    }

    .contact-faq-item h3 {
        font-size: 20px;
        line-height: 1.25;
        margin-bottom: 12px;
    }

    .contact-faq-item p {
        color: var(--contact-muted);
        line-height: 1.7;
        font-size: 15px;
    }

    @media (max-width: 1200px) {
        .contact-hero-grid,
        .contact-form-grid {
            grid-template-columns: 1fr;
        }

        .contact-cards-grid,
        .contact-value-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .contact-faq-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .contact-shell {
            padding: 0 18px;
        }

        .contact-section,
        .contact-hero {
            padding-top: 72px;
            padding-bottom: 72px;
        }

        .contact-hero-notes {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .contact-hero-notes article,
        .contact-hero-notes article:nth-child(2),
        .contact-hero-notes article:last-child {
            padding: 0;
            border-right: 0;
        }

        .contact-cards-grid,
        .contact-value-grid,
        .contact-form-grid-fields {
            grid-template-columns: 1fr;
        }

        .contact-info-card,
        .contact-form-card,
        .contact-hero-panel {
            padding: 26px 22px;
        }
    }
</style>

<div class="contact-page">
    <section class="contact-hero">
        <div class="contact-shell">
            <div class="contact-hero-grid">
                <div class="contact-hero-copy">
                    <span class="contact-eyebrow">Contact KUVUO</span>
                    <h1>Talk to the team behind the machines, logistics, and quote support.</h1>
                    <p>
                        Reach KUVUO for mini excavators, skid steers, forklifts, wheel loaders, road rollers, and attachments.
                        We can help with machine selection, delivery coordination, and quote requests across the USA.
                    </p>

                    <div class="contact-hero-actions">
                        <a href="tel:+12132142203" class="contact-button contact-button-primary">Call Sales</a>
                        <a href="#contact-form" class="contact-button contact-button-outline">Send a Message</a>
                    </div>

                    <div class="contact-hero-notes">
                        <article>
                            <strong>Sales</strong>
                            <span>Machine quotes and recommendations</span>
                        </article>
                        <article>
                            <strong>Logistics</strong>
                            <span>Shipping coordination and delivery support</span>
                        </article>
                        <article>
                            <strong>Support</strong>
                            <span>Parts, attachments, and customer follow-up</span>
                        </article>
                    </div>
                </div>

                <aside class="contact-hero-panel">
                    <span class="contact-panel-label">Direct Contact</span>
                    <div class="contact-panel-title">Fast answers for equipment, quotes, and support questions.</div>
                    <p class="contact-panel-copy">
                        If you already know the machine you need, send the product name or category and we can respond faster with the right information.
                    </p>

                    <div class="contact-panel-list">
                        <div class="contact-panel-item">
                            <span class="contact-panel-icon"><i class="fa-solid fa-phone"></i></span>
                            <div>
                                <strong>Sales Line</strong>
                                <a href="tel:+12132142203">+1 213-214-2203</a>
                            </div>
                        </div>

                        <div class="contact-panel-item">
                            <span class="contact-panel-icon"><i class="fa-solid fa-truck-fast"></i></span>
                            <div>
                                <strong>Logistics</strong>
                                <a href="tel:+16263892472">+1 626-389-2472</a>
                            </div>
                        </div>

                        <div class="contact-panel-item">
                            <span class="contact-panel-icon"><i class="fa-solid fa-envelope"></i></span>
                            <div>
                                <strong>Email</strong>
                                <a href="mailto:sales@kuvuo.com">sales@kuvuo.com</a>
                            </div>
                        </div>

                        <div class="contact-panel-item">
                            <span class="contact-panel-icon"><i class="fa-solid fa-location-dot"></i></span>
                            <div>
                                <strong>Office</strong>
                                <p>2522 S Malt Ave, Commerce, CA 90040 USA</p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="contact-shell">
            <div class="contact-section-head">
                <span class="contact-eyebrow">Contact Channels</span>
                <h2>Use the right channel for quotes, delivery questions, or general support.</h2>
                <p>
                    The site should feel consistent from page to page, so this section uses the same clean card rhythm as the rest of the storefront while keeping the contact workflow straightforward.
                </p>
            </div>

            <div class="contact-cards-grid">
                <article class="contact-card">
                    <div class="contact-card-icon"><i class="fa-solid fa-phone-volume"></i></div>
                    <h3>Sales</h3>
                    <p><a href="tel:+12132142203">+1 213-214-2203</a></p>
                    <p>Product recommendations, quote requests, and machine availability.</p>
                </article>

                <article class="contact-card">
                    <div class="contact-card-icon"><i class="fa-solid fa-truck-ramp-box"></i></div>
                    <h3>Logistics</h3>
                    <p><a href="tel:+16263892472">+1 626-389-2472</a></p>
                    <p>Delivery timelines, freight coordination, and shipping details.</p>
                </article>

                <article class="contact-card">
                    <div class="contact-card-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
                    <h3>Email</h3>
                    <p><a href="mailto:sales@kuvuo.com">sales@kuvuo.com</a></p>
                    <p>Send machine names, support questions, and business details in one thread.</p>
                </article>

                <article class="contact-card">
                    <div class="contact-card-icon"><i class="fa-solid fa-building"></i></div>
                    <h3>Office</h3>
                    <p>Commerce, California</p>
                    <p>2522 S Malt Ave, Commerce, CA 90040 USA</p>
                </article>
            </div>
        </div>
    </section>

    <section class="contact-section contact-form-section" id="contact-form">
        <div class="contact-shell">
            <div class="contact-form-grid">
                <div class="contact-info-card">
                    <h2>Get in touch with the KUVUO team.</h2>
                    <p>
                        Whether you need a quote, delivery clarification, or help comparing categories, send the key details and we will route the request to the right person.
                    </p>

                    <div class="contact-info-list">
                        <div class="contact-info-row">
                            <span><i class="fa-solid fa-phone"></i></span>
                            <div>
                                <strong>Sales</strong>
                                <a href="tel:+12132142203">+1 213-214-2203</a>
                            </div>
                        </div>

                        <div class="contact-info-row">
                            <span><i class="fa-solid fa-truck-fast"></i></span>
                            <div>
                                <strong>Logistics</strong>
                                <a href="tel:+16263892472">+1 626-389-2472</a>
                            </div>
                        </div>

                        <div class="contact-info-row">
                            <span><i class="fa-solid fa-envelope"></i></span>
                            <div>
                                <strong>Email</strong>
                                <a href="mailto:sales@kuvuo.com">sales@kuvuo.com</a>
                            </div>
                        </div>

                        <div class="contact-info-row">
                            <span><i class="fa-solid fa-clock"></i></span>
                            <div>
                                <strong>Business Hours</strong>
                                <p>Monday to Friday, 9:00 AM to 5:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-trust-grid">
                        <article class="contact-trust-item">
                            <span><i class="fa-solid fa-shield"></i></span>
                            <div>
                                <h3>Real support</h3>
                                <p>Speak with a team that understands equipment categories and attachments.</p>
                            </div>
                        </article>

                        <article class="contact-trust-item">
                            <span><i class="fa-solid fa-boxes-stacked"></i></span>
                            <div>
                                <h3>Useful detail helps</h3>
                                <p>Include the product name, category, or shipping destination for faster replies.</p>
                            </div>
                        </article>

                        <article class="contact-trust-item">
                            <span><i class="fa-solid fa-screwdriver-wrench"></i></span>
                            <div>
                                <h3>More than quotes</h3>
                                <p>We can also help with parts, attachments, and delivery-related questions.</p>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="contact-form-card">
                    <h2>Send message</h2>
                    <p>Use the form below and we’ll follow up as quickly as possible.</p>

                    @if (session('success'))
                        <div class="contact-flash">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="contact-error-list">
                            Please review the form and fix the highlighted issues.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.submit') }}">
                        @csrf

                        <div class="contact-form-grid-fields">
                            <div class="contact-form-field">
                                <label for="contact-name">Full Name</label>
                                <input id="contact-name" type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                            </div>

                            <div class="contact-form-field">
                                <label for="contact-email">Email Address</label>
                                <input id="contact-email" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                            </div>

                            <div class="contact-form-field">
                                <label for="contact-phone">Phone Number</label>
                                <input id="contact-phone" type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
                            </div>

                            <div class="contact-form-field">
                                <label for="contact-company">Company Name</label>
                                <input id="contact-company" type="text" name="company" value="{{ old('company') }}" placeholder="Company Name">
                            </div>

                            <div class="contact-form-field">
                                <label for="contact-machine-interest">Machine Interest</label>
                                <select id="contact-machine-interest" name="machine_interest">
                                    <option value="">Select a category</option>
                                    <option value="Mini Excavator" @selected(old('machine_interest') === 'Mini Excavator')>Mini Excavator</option>
                                    <option value="Road Roller" @selected(old('machine_interest') === 'Road Roller')>Road Roller</option>
                                    <option value="Wheel Loader" @selected(old('machine_interest') === 'Wheel Loader')>Wheel Loader</option>
                                    <option value="Skid Steer Loader" @selected(old('machine_interest') === 'Skid Steer Loader')>Skid Steer Loader</option>
                                    <option value="Forklift" @selected(old('machine_interest') === 'Forklift')>Forklift</option>
                                    <option value="Attachments" @selected(old('machine_interest') === 'Attachments')>Attachments</option>
                                </select>
                            </div>

                            <div class="contact-form-field">
                                <label for="contact-country">Country</label>
                                <input id="contact-country" type="text" name="country" value="{{ old('country') }}" placeholder="Country">
                            </div>

                            <div class="contact-form-field full">
                                <label for="contact-message">Message</label>
                                <textarea id="contact-message" name="message" placeholder="Tell us what machine, attachment, or support help you need." required>{{ old('message') }}</textarea>
                            </div>
                        </div>

                        <div class="contact-form-actions">
                            <button type="submit" class="contact-button contact-button-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="contact-shell">
            <div class="contact-section-head">
                <span class="contact-eyebrow">Why Contact Us</span>
                <h2>Built for the same straightforward, practical experience as the rest of the site.</h2>
                <p>
                    These supporting points keep the page informative without drifting away from the visual language used on the catalog and homepage.
                </p>
            </div>

            <div class="contact-value-grid">
                <article class="contact-value-card">
                    <h3>USA-based support</h3>
                    <p>Reach a team ready to help with machine questions, quotes, and customer follow-up.</p>
                </article>

                <article class="contact-value-card">
                    <h3>Fast logistics coordination</h3>
                    <p>Get guidance on delivery planning, shipping details, and freight communication.</p>
                </article>

                <article class="contact-value-card">
                    <h3>Equipment-focused answers</h3>
                    <p>Discuss mini excavators, skid steers, loaders, forklifts, and attachments in one place.</p>
                </article>

                <article class="contact-value-card">
                    <h3>Parts and attachment follow-up</h3>
                    <p>Use the same contact channel for parts questions, accessories, and after-sale support.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="contact-shell">
            <div class="contact-section-head">
                <span class="contact-eyebrow">Location</span>
                <h2>Commerce, California contact point.</h2>
                <p>Use the address below when coordinating office visits, business records, or shipping-related communication.</p>
            </div>

            <div class="contact-map-frame">
                <iframe src="https://www.google.com/maps?q=2522%20S%20Malt%20Ave%20Commerce%20CA%2090040&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="contact-shell">
            <div class="contact-section-head">
                <span class="contact-eyebrow">FAQ</span>
                <h2>Quick answers before you reach out.</h2>
                <p>If you still need help after this, the sales and support team is one message away.</p>
            </div>

            <div class="contact-faq-grid">
                <article class="contact-faq-item">
                    <h3>Do you ship heavy equipment nationwide?</h3>
                    <p>Yes. KUVUO supports delivery coordination for heavy machinery across the USA.</p>
                </article>

                <article class="contact-faq-item">
                    <h3>Can I ask about attachments and parts too?</h3>
                    <p>Yes. The same team can help with attachments, replacement parts, and related support questions.</p>
                </article>

                <article class="contact-faq-item">
                    <h3>Can I request a quote online?</h3>
                    <p>Yes. Send the machine name or category through the form and we will follow up with the next steps.</p>
                </article>
            </div>
        </div>
    </section>
</div>
@endsection
