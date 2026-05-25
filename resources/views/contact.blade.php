@extends('layouts.app')

@section('content')

<style>
:root {
    --primary: #5F694D;
    --primary-dark: #49533b;
    --light: #f7f8f4;
    --dark: #1f2618;
    --gray: #666;
    --white: #fff;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--light);
    color: var(--dark);
    overflow-x: hidden;
}

.contact-page section {
    padding: 100px 0;
    position: relative;
}

.container {
    width: 90%;
    max-width: 1400px;
    margin: auto;
}

/* HERO */
.contact-hero {
    min-height: 85vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, #f7f8f4, #edf2e7);
    overflow: hidden;
    position: relative;
}

.hero-shape {
    position: absolute;
    border-radius: 50%;
    opacity: 0.08;
    animation: floatShape 10s infinite ease-in-out;
}

.shape1 {
    width: 300px;
    height: 300px;
    background: var(--primary);
    top: -100px;
    right: 10%;
}

.shape2 {
    width: 180px;
    height: 180px;
    background: var(--primary);
    bottom: 10%;
    left: 5%;
    animation-delay: 2s;
}

@keyframes floatShape {
    0%,100% { transform: translateY(0px); }
    50% { transform: translateY(-30px); }
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.hero-content h1 {
    font-size: 68px;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 25px;
    opacity: 0;
    transform: translateY(40px);
    animation: fadeUp 1s forwards;
}

.hero-content p {
    font-size: 20px;
    max-width: 850px;
    margin: auto;
    line-height: 1.8;
    color: var(--gray);
    opacity: 0;
    transform: translateY(40px);
    animation: fadeUp 1s forwards 0.3s;
}

.hero-buttons {
    margin-top: 40px;
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
    opacity: 0;
    transform: translateY(40px);
    animation: fadeUp 1s forwards 0.6s;
}

.btn {
    padding: 16px 32px;
    border-radius: 999px;
    font-weight: 700;
    text-decoration: none;
    display: inline-block;
    position: relative;
    overflow: hidden;
    transition: 0.3s;
}

.btn-primary {
    background: var(--primary);
    color: white;
}

.btn-secondary {
    border: 2px solid var(--primary);
    color: var(--primary);
}

.btn:hover {
    transform: translateY(-4px);
}

.btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: -120%;
    width: 120%;
    height: 100%;
    background: rgba(255,255,255,0.2);
    transform: skewX(-25deg);
    transition: 0.7s;
}

.btn:hover::before {
    left: 120%;
}

/* CONTACT CARDS */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 25px;
}

.contact-card {
    background: white;
    padding: 40px 30px;
    border-radius: 24px;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0,0,0,0.05);
    transition: all 0.4s ease;
    opacity: 0;
    transform: translateY(40px);
}

.contact-card.show {
    opacity: 1;
    transform: translateY(0);
}

.contact-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.08);
}

.card-icon {
    width: 80px;
    height: 80px;
    background: #eef2e7;
    border-radius: 20px;
    margin: auto auto 20px;
    font-size: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-card h3 {
    margin-bottom: 10px;
}

/* FORM SECTION */
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    align-items: stretch;   /* important */
}


.form-box {
    background: #fff;
    border-radius: 30px;
    padding: 50px;
}

.info-box {
    background: #fff;
    border-radius: 30px;
    padding: 50px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;  /* stretches content nicely */
}


.info-box.show,
.form-box.show {
    opacity: 1;
    transform: translateY(0);
    transition: 0.8s ease;
}

.info-box h2,
.form-box h2 {
    font-size: 40px;
    margin-bottom: 25px;
}

.info-box p {
    margin-bottom: 16px;
    color: var(--gray);
}

input,
textarea,
select {
    width: 100%;
    padding: 16px;
    border: 1px solid #ddd;
    border-radius: 14px;
    margin-bottom: 18px;
    transition: 0.3s;
    outline: none;
}

input:focus,
textarea:focus,
select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(95,105,77,0.1);
}

textarea {
    min-height: 150px;
    resize: none;
}

/* WHY */
.why-grid {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 25px;
}

.why-card {
    background: white;
    padding: 35px;
    border-radius: 24px;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0,0,0,0.05);
    transition: 0.4s;
}

.why-card:hover {
    transform: scale(1.04);
}

/* FAQ */
.faq-title {
    text-align: center;
    font-size: 48px;
    margin-bottom: 50px;
}

.faq-item {
    background: white;
    padding: 30px;
    border-radius: 20px;
    margin-bottom: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.04);
}

/* MAP */
.map-box iframe {
    width: 100%;
    height: 500px;
    border: 0;
    border-radius: 30px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.06);
}

.quick-trust {
    margin-top: 35px;
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.trust-mini {
    display: flex;
    align-items: center;
    gap: 15px;
    background: #f7f8f4;
    padding: 18px;
    border-radius: 16px;
    transition: 0.3s;
}

.trust-mini:hover {
    transform: translateX(8px);
    background: #eef2e7;
}

.trust-mini span {
    width: 50px;
    height: 50px;
    background: #e8ede0;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.trust-mini h4 {
    margin: 0;
    font-size: 16px;
}

.trust-mini p {
    margin: 4px 0 0;
    font-size: 13px;
    color: #777;
}

@keyframes fadeUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media(max-width: 1200px){
    .cards-grid,
    .why-grid {
        grid-template-columns: repeat(2,1fr);
    }

    .contact-grid {
        grid-template-columns: 1fr;
    }
}

@media(max-width: 768px){
    .hero-content h1 {
        font-size: 42px;
    }

    .cards-grid,
    .why-grid {
        grid-template-columns: 1fr;
    }

    .info-box,
    .form-box {
        padding: 30px;
    }
}
</style>

<div class="contact-page">

<!-- HERO -->
<section class="contact-hero">
    <div class="hero-shape shape1"></div>
    <div class="hero-shape shape2"></div>

    <div class="container">
        <div class="hero-content">
            <h1>Contact KUVUO Heavy Equipment Experts</h1>
            <p>
                Looking for mini excavators, forklifts, wheel loaders, road rollers, skid steers or attachments?
                Our specialists are ready to help with machinery sales, logistics and support across the USA.
            </p>

            <div class="hero-buttons">
                <a href="tel:+12132142203" class="btn btn-primary">Call Sales</a>
                <a href="#contact-form" class="btn btn-secondary">Request Quote</a>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT CARDS -->
<section>
    <div class="container">
        <div class="cards-grid">

            <div class="contact-card reveal">
                <div class="card-icon">📞</div>
                <h3>Sales</h3>
                <p>+1 213-214-2203</p>
            </div>

            <div class="contact-card reveal">
                <div class="card-icon">🚚</div>
                <h3>Logistics</h3>
                <p>+626 389-2472</p>
            </div>

            <div class="contact-card reveal">
                <div class="card-icon">✉</div>
                <h3>Email</h3>
                <p>sales@kuvuo.com</p>
            </div>

            <div class="contact-card reveal">
                <div class="card-icon">📍</div>
                <h3>Office</h3>
                <p>Commerce, California USA</p>
            </div>

        </div>
    </div>
</section>

<!-- CONTACT FORM -->
<section id="contact-form">
    <div class="container">
        <div class="contact-grid">

           <div class="info-box reveal">
    <h2>Get In Touch</h2>

    <p><strong>Sales:</strong> +1 213-214-2203</p>
    <p><strong>Logistics:</strong> +626 389-2472</p>
    <p><strong>Email:</strong> sales@kuvuo.com</p>
    <p><strong>Address:</strong> 2522 S Malt Ave, Commerce, CA 90040 USA</p>
    <p><strong>Hours:</strong> Mon - Fri : 9AM - 5PM</p>

    <div class="quick-trust">

        <div class="trust-mini">
            <span>🚚</span>
            <div>
                <h4>Fast Shipping</h4>
                <p>USA logistics support</p>
            </div>
        </div>

        <div class="trust-mini">
            <span>🛠️</span>
            <div>
                <h4>Machine Experts</h4>
                <p>Professional support team</p>
            </div>
        </div>

        <div class="trust-mini">
            <span>📦</span>
            <div>
                <h4>Parts Available</h4>
                <p>Attachments & replacements</p>
            </div>
        </div>

    </div>
</div>

            <div class="form-box reveal">
                <h2>Send Message</h2>

                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf

                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="text" name="phone" placeholder="Phone Number">
                    <input type="text" name="company" placeholder="Company Name">

                    <select name="machine_interest">
                        <option>Machine Interested In</option>
                        <option>Mini Excavator</option>
                        <option>Road Roller</option>
                        <option>Wheel Loader</option>
                        <option>Skid Steer</option>
                        <option>Forklift</option>
                        <option>Attachments</option>
                    </select>

                    <input type="text" name="country" placeholder="Country">

                    <textarea name="message" placeholder="Write your message..." required></textarea>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- WHY US -->
<section>
    <div class="container">
        <div class="why-grid">

            <div class="why-card">
                <h3>USA Based Support</h3>
                <p>Heavy equipment specialists ready to assist.</p>
            </div>

            <div class="why-card">
                <h3>Fast Logistics</h3>
                <p>Reliable machinery delivery support.</p>
            </div>

            <div class="why-card">
                <h3>Machine Experts</h3>
                <p>Professional construction equipment guidance.</p>
            </div>

            <div class="why-card">
                <h3>Parts & Attachments</h3>
                <p>Complete attachment and parts solutions.</p>
            </div>

        </div>
    </div>
</section>

<!-- MAP -->
<section>
    <div class="container">
        <div class="map-box">
            <iframe src="https://www.google.com/maps?q=2522%20S%20Malt%20Ave%20Commerce%20CA%2090040&output=embed"></iframe>
        </div>
    </div>
</section>

<!-- FAQ -->
<section>
    <div class="container">

        <h2 class="faq-title">Frequently Asked Questions</h2>

        <div class="faq-item">
            <h3>Do you ship heavy equipment nationwide?</h3>
            <p>Yes. KUVUO supports heavy machinery logistics across the USA.</p>
        </div>

        <div class="faq-item">
            <h3>Do you sell attachments?</h3>
            <p>Yes. We offer mini excavator and skid steer attachments.</p>
        </div>

        <div class="faq-item">
            <h3>Can I request a machine quote online?</h3>
            <p>Yes. Fill out the form and our sales team will respond quickly.</p>
        </div>

    </div>
</section>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const reveals = document.querySelectorAll(".reveal");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting){
                entry.target.classList.add("show");
            }
        });
    }, {
        threshold: 0.2
    });

    reveals.forEach(el => observer.observe(el));
});
</script>

@endsection