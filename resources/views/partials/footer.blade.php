<footer class="site-footer">
    <div class="container footer-grid">

        <!-- Company Info -->
        <div class="footer-col">
            <h3>KUVUO</h3>
            <p>
                Premium heavy machinery supplier across the USA.
                Mini excavators, skid steers, forklifts, wheel loaders,
                road rollers and professional attachments.
            </p>
        </div>

        <!-- Quick Links -->
        <div class="footer-col">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('shop') }}">Shop</a></li>
                <li><a href="{{ route('attachments') }}">Attachments</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>

        <!-- Product Categories -->
        <div class="footer-col">
            <h3>Product Categories</h3>
            <ul>
                <li><a href="{{ route('shop.category', 'mini-excavator') }}">Mini Excavators</a></li>
                <li><a href="{{ route('shop.category', 'skid-steer') }}">Skid Steer Loader</a></li>
                <li><a href="{{ route('shop.category', 'forklift') }}">Forklift</a></li>
                <li><a href="{{ route('shop.category', 'wheel-loader') }}">Wheel Loader</a></li>
                <li><a href="{{ route('shop.category', 'road-roller') }}">Road Roller</a></li>
            </ul>
        </div>

        <!-- Attachment Categories -->
        <div class="footer-col">
            <h3>Attachment Categories</h3>
            <ul>
                <li><a href="{{ route('attachments') }}">All Attachments</a></li>
                <li><a href="{{ route('attachments.category', 'mini-excavator') }}">Mini Excavator Attachments</a></li>
                <li><a href="{{ route('attachments.category', '2-ton-and-below') }}">2 Ton and Below Attachments</a></li>
                <li><a href="{{ route('attachments.category', 'x2') }}">X2 Attachments</a></li>
                <li><a href="{{ route('attachments.category', 'xxv') }}">XXV Attachments</a></li>
                <li><a href="{{ route('attachments.category', 'skid-steer') }}">Skid Steer Attachments</a></li>
                <li><a href="{{ route('attachments.category', 'compact-series-501-507') }}">Compact Series 501-507 Attachments</a></li>
                <li><a href="{{ route('attachments.category', 'standard-series-x1300-509') }}">Standard Series X1300-509 Attachments</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© {{ date('Y') }} KUVUO. All rights reserved.</p>
    </div>
</footer>

<style>

/* FOOTER */
.site-footer {
    background: #2f3627;
    color: white;
    padding: 80px 0 30px;
    margin-top: 80px;
}

.footer-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr 1fr;
    gap: 50px;
}

.footer-col h3 {
    font-size: 24px;
    margin-bottom: 25px;
    color: #fff;
    font-weight: 700;
}

.footer-col p {
    color: rgba(255,255,255,0.75);
    line-height: 1.8;
    font-size: 15px;
}

.footer-col ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-col ul li {
    margin-bottom: 14px;
}

.footer-col ul li a {
    color: rgba(255,255,255,0.75);
    text-decoration: none;
    transition: 0.3s;
    font-size: 15px;
}

.footer-col ul li a:hover {
    color: #ffffff;
    padding-left: 5px;
}

/* FOOTER BOTTOM */
.footer-bottom {
    margin-top: 50px;
    padding-top: 25px;
    border-top: 1px solid rgba(255,255,255,0.1);
    text-align: center;
}

.footer-bottom p {
    color: rgba(255,255,255,0.6);
    font-size: 14px;
    margin: 0;
}

/* RESPONSIVE */
@media (max-width: 1200px) {
    .footer-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
    }
}

@media (max-width: 768px) {
    .site-footer {
        padding: 60px 0 25px;
    }

    .footer-grid {
        grid-template-columns: 1fr;
        gap: 35px;
        text-align: center;
    }

    .footer-col ul li a:hover {
        padding-left: 0;
    }

    .footer-col p {
        max-width: 400px;
        margin: auto;
    }
}

</style>
