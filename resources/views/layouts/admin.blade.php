<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KUVUO CMS')</title>
    <link rel="icon" type="image/webp" href="{{ asset('assets/brand/kuvuo-favicon.webp') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/brand/kuvuo-favicon.webp') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&family=Science+Gothic:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --cms-green-900: #12372A;
            --cms-green-700: #1F5D45;
            --cms-green-50: #EEF5F0;
            --cms-green-25: #F6FAF7;
            --cms-ink: #111827;
            --cms-muted: #6B7280;
            --cms-border: #D7DED9;
            --cms-border-strong: #C9D5CE;
            --cms-accent: #D97706;
            --cms-white: #FFFFFF;
            --cms-surface: #FBFCFB;
            --cms-shadow: 0 28px 56px -38px rgba(18, 55, 42, 0.28);
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            padding: 0;
            background: var(--cms-green-25);
            color: var(--cms-ink);
            font-family: 'Nunito', Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a { color: inherit; }

        .cms-admin {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 280px minmax(0, 1fr);
        }

        .cms-sidebar {
            background:
                radial-gradient(80% 80% at 0% 0%, rgba(217, 119, 6, 0.12) 0%, transparent 50%),
                linear-gradient(180deg, #173B2D 0%, #10281F 100%);
            color: #fff;
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
            gap: 22px;
            border-right: 1px solid rgba(255,255,255,0.08);
        }

        .cms-brand {
            display: grid;
            gap: 12px;
        }

        .cms-brand img {
            width: auto;
            height: 50px;
            max-width: 100%;
            object-fit: contain;
        }

        .cms-brand p {
            margin: 0;
            color: rgba(255,255,255,0.74);
            line-height: 1.6;
            font-size: 14px;
        }

        .cms-nav-group {
            display: grid;
            gap: 8px;
        }

        .cms-nav-label {
            color: rgba(255,255,255,0.52);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            padding: 0 10px;
        }

        .cms-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 14px;
            color: rgba(255,255,255,0.82);
            text-decoration: none;
            border: 1px solid transparent;
            transition: background-color .15s ease, border-color .15s ease, color .15s ease;
        }

        .cms-nav-link:hover,
        .cms-nav-link.is-active {
            background: rgba(255,255,255,0.08);
            border-color: rgba(255,255,255,0.12);
            color: #fff;
        }

        .cms-nav-link small {
            color: rgba(255,255,255,0.54);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .cms-sidebar-footer {
            margin-top: auto;
            display: grid;
            gap: 12px;
            padding-top: 16px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .cms-sidebar-footer form { margin: 0; }

        .cms-sidebar-btn {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 14px;
            border: 1px solid rgba(255,255,255,0.18);
            background: transparent;
            color: #fff;
            font: inherit;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .cms-sidebar-btn:hover {
            background: rgba(255,255,255,0.08);
        }

        .cms-main {
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .cms-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 20px 28px;
            background: rgba(255,255,255,0.88);
            border-bottom: 1px solid var(--cms-border);
            backdrop-filter: blur(14px);
            position: sticky;
            top: 0;
            z-index: 40;
        }

        .cms-topbar-copy h1 {
            margin: 0;
            font-family: 'Science Gothic', Arial, sans-serif;
            font-size: clamp(24px, 2.4vw, 34px);
            line-height: 1.08;
        }

        .cms-topbar-copy p {
            margin: 6px 0 0;
            color: var(--cms-muted);
            font-size: 14px;
        }

        .cms-topbar-meta {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .cms-topbar-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border: 1px solid var(--cms-border);
            background: var(--cms-white);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--cms-green-900);
        }

        .cms-topbar-chip::before {
            content: "";
            width: 6px;
            height: 6px;
            background: var(--cms-accent);
            display: block;
        }

        .cms-content {
            padding: 28px;
        }

        .cms-guest {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 28px;
            background:
                radial-gradient(60% 75% at 100% 0%, var(--cms-green-50) 0%, transparent 60%),
                linear-gradient(180deg, var(--cms-white) 0%, var(--cms-green-25) 100%);
        }

        @media (max-width: 960px) {
            .cms-admin {
                grid-template-columns: 1fr;
            }

            .cms-sidebar {
                padding: 20px 18px;
                gap: 18px;
            }

            .cms-topbar,
            .cms-content {
                padding-left: 18px;
                padding-right: 18px;
            }

            .cms-topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .cms-topbar-meta {
                justify-content: flex-start;
            }
        }
    </style>
    @stack('head')
</head>
<body>
    @auth
        @php
            $cmsNavItems = [
                ['label' => 'Blog Posts', 'route' => 'admin.blog-posts.index', 'note' => 'CMS'],
                ['label' => 'Create Post', 'route' => 'admin.blog-posts.create', 'note' => 'New'],
            ];
        @endphp

        <div class="cms-admin">
            <aside class="cms-sidebar">
                <div class="cms-brand">
                    <img src="{{ asset('assets/brand/kuvuo-logo.webp') }}" alt="KUVUO CMS">
                    <p>Publishing, blog management, and content operations for the KUVUO website.</p>
                </div>

                <div class="cms-nav-group">
                    <div class="cms-nav-label">Content</div>
                    @foreach ($cmsNavItems as $item)
                        <a href="{{ route($item['route']) }}" class="cms-nav-link {{ request()->routeIs($item['route']) ? 'is-active' : '' }}">
                            <span>{{ $item['label'] }}</span>
                            <small>{{ $item['note'] }}</small>
                        </a>
                    @endforeach
                </div>

                <div class="cms-nav-group">
                    <div class="cms-nav-label">Public Site</div>
                    <a href="{{ route('blog') }}" class="cms-nav-link" target="_blank" rel="noopener noreferrer">
                        <span>View Blog</span>
                        <small>Live</small>
                    </a>
                    <a href="{{ url('/') }}" class="cms-nav-link" target="_blank" rel="noopener noreferrer">
                        <span>Homepage</span>
                        <small>Site</small>
                    </a>
                </div>

                <div class="cms-sidebar-footer">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="cms-sidebar-btn">Logout</button>
                    </form>
                </div>
            </aside>

            <main class="cms-main">
                <div class="cms-topbar">
                    <div class="cms-topbar-copy">
                        <h1>@yield('cms_title', 'KUVUO CMS')</h1>
                        <p>@yield('cms_subtitle', 'Manage your website content in one place.')</p>
                    </div>

                    <div class="cms-topbar-meta">
                        <span class="cms-topbar-chip">{{ auth()->user()->email }}</span>
                    </div>
                </div>

                <div class="cms-content">
                    @yield('cms_content')
                </div>
            </main>
        </div>
    @else
        <div class="cms-guest">
            @yield('cms_content')
        </div>
    @endauth
</body>
</html>
