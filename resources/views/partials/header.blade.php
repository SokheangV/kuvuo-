<header class="top-social-bar">
    <div class="social-container">
         <div class="social-left">
            <a href="tel:+12132142203">📞 +1 213-214-2203</a>
            <a href="mailto:sales@kuvuo.com">✉ sales@kuvuo.com</a>
        </div>
      <div class="social-right">

    <a href="https://www.facebook.com/MiniExcaMachinery/" target="_blank">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="white">
            <path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.19 2.23.19v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 2.89h-2.34v6.99A10 10 0 0 0 22 12z"/>
        </svg>
    </a>

    <a href="https://www.instagram.com/MiniExcaMachinery" target="_blank">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="white">
            <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 4.5A5.5 5.5 0 1 1 6.5 12 5.5 5.5 0 0 1 12 6.5zm6-.8a1.3 1.3 0 1 1-1.3 1.3A1.3 1.3 0 0 1 18 5.7zM12 8a4 4 0 1 0 4 4 4 4 0 0 0-4-4z"/>
        </svg>
    </a>

    <a href="https://www.youtube.com/@MiniExcavatorMachinery" target="_blank">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="white">
            <path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.4 3.5 12 3.5 12 3.5s-7.4 0-9.4.6A3 3 0 0 0 .5 6.2 31.2 31.2 0 0 0 0 12a31.2 31.2 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c2 .6 9.4.6 9.4.6s7.4 0 9.4-.6a3 3 0 0 0 2.1-2.1A31.2 31.2 0 0 0 24 12a31.2 31.2 0 0 0-.5-5.8zM9.8 15.5v-7l6.2 3.5-6.2 3.5z"/>
        </svg>
    </a>

    <a href="https://x.com/miniexcamachine" target="_blank">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="white">
            <path d="M18.9 2H22l-6.8 7.8L23 22h-6.2l-4.9-6.4L6.2 22H3l7.3-8.4L1 2h6.3l4.4 5.8L18.9 2z"/>
        </svg>
    </a>

</div>
    </div>
</header>

<header class="site-header">
    <div class="header-container">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
            <span>K</span>UVUO
        </a>

        <!-- Navigation -->
        <nav class="main-nav">
            <ul class="nav-menu">

                <li><a href="{{ url('/') }}">Home</a></li>

                <!-- SHOP -->
              <li class="dropdown">
    <a href="{{ route('shop') }}">Shop <span class="arrow">▾</span></a>

    <div class="dropdown-menu mega-menu">

        @foreach($shopMenuCategories as $menuCategory)
        @php
            $menuIcons = [
                'mini-excavator' => '🚜',
                'skid-steer' => '🚛',
                'road-roller' => '🛣️',
                'wheel-loader' => '🏗️',
                'forklift' => '🏭',
            ];
        @endphp
        <a href="{{ route('shop.category', $menuCategory->slug) }}" class="mega-item">
            <div class="mega-icon">{{ $menuIcons[$menuCategory->slug] ?? strtoupper(substr($menuCategory->name, 0, 1)) }}</div>
            <div class="mega-content">
                <h4>{{ $menuCategory->name }}</h4>
                <p>Browse all {{ strtolower($menuCategory->name) }} products</p>
            </div>
            <span class="mega-arrow">→</span>
        </a>
        @endforeach

    </div>
</li>

                <!-- ATTACHMENTS -->
                <li class="dropdown">
                    <a href="{{ route('attachments') }}">Attachments <span class="arrow">▾</span></a>

                    <div class="dropdown-menu attachments-menu">

                        <div class="submenu-parent">
                            <a href="{{ route('attachments.category', 'mini-excavator') }}">
                                Mini Excavator →
                            </a>

                            <div class="submenu-child">
                                <a href="{{ route('attachments.category', '2-ton-and-below') }}">2 Ton and Below</a>
                                <a href="{{ route('attachments.category', 'x2') }}">X2</a>
                                <a href="{{ route('attachments.category', 'xxv') }}">XXV</a>
                            </div>
                        </div>

                        <div class="submenu-parent">
                            <a href="{{ route('attachments.category', 'skid-steer') }}">
                                Skid Steer →
                            </a>

                            <div class="submenu-child">
                                <a href="{{ route('attachments.category', 'compact-series-501-507') }}">Compact Series 501-507</a>
                                <a href="{{ route('attachments.category', 'standard-series-x1300-509') }}">Standard Series X1300-509</a>
                            </div>
                        </div>

                    </div>
                </li>

                <li class="dropdown">
                    <a href="{{ route('about') }}">About <span class="arrow">▾</span></a>

                    <div class="dropdown-menu about-menu">
                        <a href="{{ route('about') }}">About Us</a>
                        <a href="{{ route('faq') }}">FAQ</a>
                        <a href="{{ route('contact') }}">Contact</a>
                    </div>
                </li>
                <li><a href="{{ route('mini-excavator.landing') }}">Mini Excavator</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>

            </ul>
        </nav>

        <!-- Search -->
        <div class="header-search">
            <form action="{{ route('shop.search') }}" method="GET">
                <input type="text" name="search" placeholder="Search equipment...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <!-- CTA -->
        <a href="{{ route('shop') }}" class="header-btn">
            Browse Machines →
        </a>

    </div>
</header>


<style>
/* =========================
   TOP SOCIAL BAR
========================= */
.top-social-bar {
    background: #1f2618;
    color: #fff;
    font-size: 14px;
    padding: 10px 0;
}

.social-container {
    max-width: 1400px;
    margin: auto;
    padding: 0 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.social-left,
.social-right {
    display: flex;
    gap: 20px;
    align-items: center;
}

.social-left a {
    color: #fff;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.social-left a i {
    color: #fff;
    font-size: 14px;
}

/* SOCIAL ICONS */
.social-right {
    display: flex;
    gap: 14px;
    align-items: center;
}

.social-right a {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(255,255,255,0.12);
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-right a i {
    color: #fff !important;
    font-size: 18px !important;
    line-height: 1;
}

.social-right a:hover {
    background: #5F694D;
    transform: translateY(-2px);
}

/* =========================
   MAIN HEADER
========================= */
.site-header {
    width: 100%;
    background: rgba(255,255,255,0.96);
    backdrop-filter: blur(14px);
    box-shadow: 0 5px 30px rgba(0,0,0,0.05);
    position: sticky;
    top: 0;
    z-index: 999;
}

.header-container {
    max-width: 1400px;
    margin: auto;
    padding: 18px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 25px;
}

/* =========================
   LOGO
========================= */
.logo {
    font-size: 2.4rem;
    font-weight: 900;
    color: #222;
    text-decoration: none;
    letter-spacing: 1px;
}

.logo span {
    color: #5F694D;
}

/* =========================
   NAVIGATION
========================= */
.main-nav .nav-menu {
    display: flex;
    gap: 30px;
    list-style: none;
    align-items: center;
    margin: 0;
    padding: 0;
}

.nav-menu li {
    position: relative;
}

.nav-menu li a {
    text-decoration: none;
    color: #222;
    font-weight: 600;
    font-size: 16px;
    position: relative;
    transition: 0.3s;
}

.nav-menu li a:hover {
    color: #5F694D;
}

.nav-menu li a::after {
    content: "";
    width: 0;
    height: 2px;
    background: #5F694D;
    position: absolute;
    bottom: -6px;
    left: 0;
    transition: 0.3s;
}

.nav-menu li a:hover::after {
    width: 100%;
}

.arrow {
    font-size: 12px;
}

/* =========================
   SEARCH BAR
========================= */
.header-search {
    flex: 1;
    max-width: 320px;
}

.header-search form {
    display: flex;
    background: #f8f9f5;
    border: 1px solid #dfe5d7;
    border-radius: 50px;
    overflow: hidden;
}

.header-search input {
    flex: 1;
    border: none;
    padding: 14px 18px;
    outline: none;
    background: transparent;
    font-size: 14px;
}

.header-search button {
    background: #5F694D;
    border: none;
    color: #fff;
    padding: 14px 18px;
    cursor: pointer;
}

.header-search button i {
    color: #fff;
}

/* =========================
   CTA BUTTON
========================= */
.header-btn {
    background: linear-gradient(135deg, #5F694D, #78856a);
    color: #fff;
    padding: 14px 26px;
    border-radius: 40px;
    text-decoration: none;
    font-weight: 700;
    box-shadow: 0 10px 25px rgba(95,105,77,0.25);
    transition: 0.3s;
}

.header-btn:hover {
    transform: translateY(-3px);
    color: #fff;
}

/* =========================
   DROPDOWN
========================= */
.dropdown-menu {
    position: absolute;
    top: 140%;
    left: 0;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.12);
    opacity: 0;
    visibility: hidden;
    transform: translateY(15px);
    transition: all 0.3s ease;
    z-index: 999;
}

.dropdown:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

/* =========================
   SHOP MEGA MENU
========================= */
.mega-menu {
    width: 420px;
    padding: 15px;
}

.mega-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 18px;
    border-radius: 14px;
    text-decoration: none;
    transition: 0.3s;
    border-bottom: 1px solid #f1f1f1;
}

.mega-item:hover {
    background: #f8f9f5;
}

.mega-icon {
    width: 48px;
    height: 48px;
    background: #eef2e7;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mega-content h4 {
    margin: 0;
    font-size: 16px;
    color: #222;
}

.mega-content p {
    margin: 4px 0 0;
    font-size: 13px;
    color: #777;
}

.mega-arrow {
    margin-left: auto;
    color: #5F694D;
}

/* =========================
   ATTACHMENTS MENU
========================= */
.attachments-menu {
    width: 280px;
    padding: 10px 0;
}

.about-menu {
    width: 220px;
    padding: 10px 0;
}

.about-menu a {
    display: block;
    padding: 15px 20px;
}

.about-menu a:hover {
    background: #f8f9f5;
}

.submenu-parent {
    position: relative;
}

.submenu-parent > a {
    display: block;
    padding: 16px 20px;
}

.submenu-parent > a:hover {
    background: #f8f9f5;
}

.submenu-child {
    position: absolute;
    left: 100%;
    top: 0;
    min-width: 220px;
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.10);
    opacity: 0;
    visibility: hidden;
    transform: translateX(15px);
    transition: 0.3s;
}

.submenu-parent:hover .submenu-child {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
}

.submenu-child a {
    display: block;
    padding: 14px 18px;
}

.submenu-child a:hover {
    background: #f8f9f5;
}

/* =========================
   MOBILE RESPONSIVE
========================= */
@media (max-width: 992px) {
    .social-container,
    .header-container {
        flex-direction: column;
        gap: 20px;
    }

    .main-nav .nav-menu {
        flex-wrap: wrap;
        justify-content: center;
    }

    .header-search {
        width: 100%;
        max-width: 100%;
    }

    .mega-menu,
    .attachments-menu {
        width: 320px;
    }

    .submenu-child {
        position: static;
        opacity: 1;
        visibility: visible;
        transform: none;
        box-shadow: none;
        margin-left: 20px;
    }
}
</style>
