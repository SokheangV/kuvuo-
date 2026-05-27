{{--
    resources/views/support/_layout.blade.php
    Shared structure for all support/policy pages.
    Usage: @include('support._layout', [...])
    Do NOT use as a standalone view.
--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Support' }} | KUVUO Heavy Equipment</title>
    <meta name="description" content="{{ $pageDescription ?? 'KUVUO support center for heavy equipment buyers.' }}">
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
                <h1>{{ $pageTitle }}</h1>
                <p class="sp-hero-lead">{{ $heroLead }}</p>
                <div class="sp-hero-chips">
                    @foreach ($heroChips as $chip)
                        <span class="sp-chip">{{ $chip }}</span>
                    @endforeach
                </div>
            </div>
            <div class="sp-hero-visual" aria-hidden="true">
                <img src="{{ asset('assets/support/' . $heroImage) }}" alt="{{ $heroAlt ?? $pageTitle . ' illustration' }}">
            </div>
        </div>
    </section>

    {{-- ── BODY GRID: sidebar + main ── --}}
    <div class="sp-shell sp-body">

        {{-- Sidebar --}}
        <aside class="sp-sidebar">
            <div class="sp-sidebar-head">
                <strong>All Support Pages</strong>
                <span>Browse all policies and FAQs.</span>
            </div>
            <nav class="sp-sidebar-nav" aria-label="Support pages">
                <a href="{{ route('support.warranty') }}"        {{ request()->routeIs('support.warranty')  ? 'class=sp-active' : '' }}>Warranty Policy</a>
                <a href="{{ route('support.shipping') }}"        {{ request()->routeIs('support.shipping')  ? 'class=sp-active' : '' }}>Shipping &amp; Delivery</a>
                <a href="{{ route('support.returns') }}"         {{ request()->routeIs('support.returns')   ? 'class=sp-active' : '' }}>Return &amp; Refund Policy</a>
                <a href="{{ route('support.faq') }}"             {{ request()->routeIs('support.faq')       ? 'class=sp-active' : '' }}>FAQ</a>
                <a href="{{ route('support.terms') }}"           {{ request()->routeIs('support.terms')     ? 'class=sp-active' : '' }}>Terms &amp; Conditions</a>
                <a href="{{ route('support.privacy') }}"         {{ request()->routeIs('support.privacy')   ? 'class=sp-active' : '' }}>Privacy Policy</a>
            </nav>

            @if(!empty($tocLinks))
                <div class="sp-sidebar-head">
                    <strong>On This Page</strong>
                    <span>Jump to section.</span>
                </div>
                <nav class="sp-toc" aria-label="Table of contents">
                    @foreach ($tocLinks as $anchor => $label)
                        <a href="#{{ $anchor }}">{{ $label }}</a>
                    @endforeach
                </nav>
            @endif

            @if(!empty($panelNote))
                <div class="sp-panel-note">{{ $panelNote }}</div>
            @endif
        </aside>

        {{-- Main content slot --}}
        <main class="sp-main">
            {{ $slot }}

            {{-- CTA at the bottom of every policy page --}}
            <div class="sp-contact">
                <div class="sp-section-label">{{ $contactLabel ?? 'Contact' }}</div>
                <h2>{{ $contactTitle ?? 'Have a Question?' }}</h2>
                @foreach ($contactRows ?? [] as $row)
                    <div class="sp-contact-row">
                        <span>{{ $row['label'] }}</span>
                        <div>{{ $row['value'] }}</div>
                    </div>
                @endforeach
            </div>
        </main>

    </div>{{-- .sp-body --}}

    {{-- Global support CTA strip --}}
    <section class="sp-cta-strip">
        <div class="sp-shell sp-cta-inner">
            <div class="sp-cta-text">
                <h2>Still need help?</h2>
                <p>Contact the KUVUO team directly — quote reference speeds things up.</p>
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
/* Support page JS — scoped, loaded only here */
(function () {
    /* ── Active sidebar link by URL path ── */
    var path = window.location.pathname;
    document.querySelectorAll('.sp-sidebar-nav a').forEach(function (a) {
        if (a.getAttribute('href') === path) {
            a.classList.add('sp-active');
        }
    });

    /* ── FAQ accordion ── */
    document.querySelectorAll('.sp-faq-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var item = btn.closest('.sp-faq-item');
            if (!item) return;
            var isOpen = item.classList.toggle('open');
            btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    });

    /* ── TOC active section via IntersectionObserver ── */
    var tocLinks = Array.from(document.querySelectorAll('.sp-toc a'));
    var sections = tocLinks.map(function (a) {
        var id = a.getAttribute('href');
        return id ? document.querySelector(id) : null;
    }).filter(Boolean);

    if (tocLinks.length && sections.length && 'IntersectionObserver' in window) {
        var obs = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                tocLinks.forEach(function (a) {
                    a.classList.toggle('active', a.getAttribute('href') === '#' + entry.target.id);
                });
            });
        }, { rootMargin: '-20% 0px -60% 0px', threshold: 0.2 });
        sections.forEach(function (s) { obs.observe(s); });
    }
})();
</script>

</body>
</html>
