@php
    $footerPrimaryLinks = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Shop', 'url' => route('shop')],
        ['label' => 'Attachments', 'url' => route('attachments')],
        ['label' => 'About Us', 'url' => route('about')],
        ['label' => 'Blog', 'url' => route('blog')],
        ['label' => 'Contact', 'url' => route('contact')],
    ];

    $footerCategoryLinks = [
        ['label' => 'Mini Excavators', 'url' => route('shop.category', 'mini-excavators')],
        ['label' => 'Skid Steer Loader', 'url' => route('shop.category', 'skid-steer-loader')],
        ['label' => 'Wheel Loaders', 'url' => route('shop.category', 'wheel-loaders')],
        ['label' => 'Road Rollers', 'url' => route('shop.category', 'mini-road-roller')],
        ['label' => 'Forklifts', 'url' => route('shop.category', 'forklift')],
        ['label' => 'Support Center', 'url' => route('support.index')],
    ];

    $footerPolicyLinks = [
        ['label' => 'Warranty Policy', 'url' => route('support.warranty')],
        ['label' => 'Shipping & Delivery', 'url' => route('support.shipping')],
        ['label' => 'Return & Refund Policy', 'url' => route('support.returns')],
        ['label' => 'Privacy Policy', 'url' => route('support.privacy')],
        ['label' => 'Terms & Conditions', 'url' => route('support.terms')],
    ];

    $footerSocialLinks = [
        ['label' => 'Facebook', 'url' => 'https://www.facebook.com/MiniExcaMachinery/'],
        ['label' => 'Twitter', 'url' => 'https://x.com/miniexcamachine'],
        ['label' => 'Pinterest', 'url' => 'https://www.pinterest.com/miniexca/'],
        ['label' => 'YouTube', 'url' => 'https://youtube.com/@MiniExcavatorMachinery?reload=9'],
    ];
@endphp

<footer class="kv-footer">
    <div class="kv-footer-shell">
        <div class="kv-footer-top">
            <div class="kv-footer-intro">
                <img src="{{ asset('assets/brand/kuvuo-logo.webp') }}" alt="KUVUO" class="kv-footer-logo">
                <p class="kv-footer-lead">
                    Heavy equipment catalog, quote support, and customer resources designed to feel clear from the first click to the next conversation.
                </p>

                <div class="kv-footer-social" aria-label="KUVUO social media">
                    @foreach ($footerSocialLinks as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $social['label'] }}">
                            <span class="kv-footer-social-text">{{ $social['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="kv-footer-contact">
                <a href="tel:+12132142203">+1 213-214-2203</a>
                <a href="mailto:sales@kuvuo.com">sales@kuvuo.com</a>
                <span>Commerce, California, USA</span>
            </div>
        </div>

        <div class="kv-footer-main">
            <nav class="kv-footer-links" aria-label="Footer navigation">
                <div class="kv-footer-column">
                    <h3>Explore</h3>
                    <ul>
                        @foreach ($footerPrimaryLinks as $link)
                            <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="kv-footer-column">
                    <h3>Categories</h3>
                    <ul>
                        @foreach ($footerCategoryLinks as $link)
                            <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="kv-footer-column">
                    <h3>Policies</h3>
                    <ul>
                        @foreach ($footerPolicyLinks as $link)
                            <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>

        <div class="kv-footer-bottom">
            <p>&copy; {{ date('Y') }} KUVUO. All rights reserved.</p>
            <div class="kv-footer-bottom-links">
                <a href="{{ route('support.privacy') }}">Privacy</a>
                <a href="{{ route('support.terms') }}">Terms</a>
                <a href="{{ route('support.shipping') }}">Shipping</a>
            </div>
        </div>
    </div>
</footer>

<style>
    .kv-footer {
        --kv-footer-bg: #132E24;
        --kv-footer-border: rgba(255, 255, 255, 0.1);
        --kv-footer-text: rgba(255, 255, 255, 0.72);
        --kv-footer-strong: #FFFFFF;
        --kv-footer-accent: #D97706;
        margin-top: 0;
        background: linear-gradient(180deg, #17382c 0%, var(--kv-footer-bg) 100%);
        color: var(--kv-footer-strong);
    }

    .kv-footer-shell {
        max-width: 1320px;
        margin: 0 auto;
        padding: 42px 28px 18px;
    }

    .kv-footer-top,
    .kv-footer-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .kv-footer-top {
        padding-bottom: 18px;
        border-bottom: 1px solid var(--kv-footer-border);
    }

    .kv-footer-intro {
        max-width: 620px;
    }

    .kv-footer-logo {
        display: block;
        width: auto;
        height: 54px;
        max-width: min(100%, 320px);
        margin-bottom: 10px;
        object-fit: contain;
    }

    .kv-footer-lead {
        margin: 0;
        color: var(--kv-footer-text);
        font-size: 14px;
        line-height: 1.7;
    }

    .kv-footer-social {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 14px;
    }

    .kv-footer-social a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 0;
        border-bottom: 1px solid transparent;
        color: rgba(255, 255, 255, 0.86);
        text-decoration: none;
        transition: color .15s ease, border-color .15s ease;
    }

    .kv-footer-social a:hover {
        color: var(--kv-footer-strong);
        border-bottom-color: rgba(255, 255, 255, 0.4);
    }

    .kv-footer-social-text {
        font-size: 13px;
        font-weight: 700;
        line-height: 1;
        white-space: nowrap;
    }

    .kv-footer-contact {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .kv-footer-contact a,
    .kv-footer-contact span {
        color: var(--kv-footer-strong);
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
    }

    .kv-footer-contact a:hover {
        color: #F7C57E;
    }

    .kv-footer-main {
        padding: 20px 0 4px;
    }

    .kv-footer-links {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
    }

    .kv-footer-column h3 {
        margin: 0 0 12px;
        color: var(--kv-footer-strong);
        font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
        font-size: 17px;
    }

    .kv-footer-column ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: grid;
        gap: 8px;
    }

    .kv-footer-column a {
        color: var(--kv-footer-text);
        text-decoration: none;
        font-size: 14px;
        line-height: 1.45;
        transition: color .15s ease;
    }

    .kv-footer-column a:hover {
        color: var(--kv-footer-strong);
    }

    .kv-footer-bottom {
        padding-top: 16px;
        border-top: 1px solid var(--kv-footer-border);
    }

    .kv-footer-bottom p {
        margin: 0;
        color: rgba(255, 255, 255, 0.58);
        font-size: 13px;
    }

    .kv-footer-bottom-links {
        display: flex;
        gap: 18px;
        flex-wrap: wrap;
    }

    .kv-footer-bottom-links a {
        color: rgba(255, 255, 255, 0.72);
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .kv-footer-bottom-links a:hover {
        color: var(--kv-footer-strong);
    }

    @media (max-width: 960px) {
        .kv-footer-links {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .kv-footer-contact {
            justify-content: flex-start;
        }
    }

    @media (max-width: 768px) {
        .kv-footer-shell {
            padding: 34px 18px 18px;
        }

        .kv-footer-logo {
            height: 46px;
        }

        .kv-footer-top,
        .kv-footer-bottom {
            align-items: flex-start;
            flex-direction: column;
        }

        .kv-footer-social a {
            padding: 6px 0;
        }
    }
</style>
