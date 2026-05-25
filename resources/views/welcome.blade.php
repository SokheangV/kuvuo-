<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - American Mini Excavator</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        :root {
            --primary: #5d694c;
            --dark: #2f3627;
            --light: #f5f6f2;
            --text: #1f1f1f;
        }

        body {
            background: #f8f8f5;
            color: var(--text);
        }

        .container {
            width: 90%;
            max-width: 1400px;
            margin: auto;
        }

        /* NAVBAR */
        .navbar {
            background: white;
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .nav-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary);
        }

        .nav-menu {
            display: flex;
            gap: 30px;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 12px 22px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
        }

        /* HERO */
     .hero {
    padding: 40px 0 60px;
    background: linear-gradient(to right, #f5f6f2, #eef1e7);
    overflow: hidden;
    position: relative;
    font-family: 'Inter', sans-serif;
}

/* GRID BACKGROUND */
.hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(93,105,76,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(93,105,76,0.03) 1px, transparent 1px);
    background-size: 60px 60px;
    z-index: 1;
}

.hero .container {
    position: relative;
    z-index: 2;
}

/* LAYOUT */
.hero-wrapper {
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    align-items: center;
    gap: 50px;
}

/* IMAGE */
.hero-image {
    position: relative;
    display: flex;
    justify-content: flex-start;
    animation: floatMachine 5s infinite ease-in-out;
}

.hero-image-glow {
    position: absolute;
    width: 70%;
    height: 70%;
    background: radial-gradient(circle, rgba(93,105,76,0.20), transparent);
    border-radius: 50%;
    filter: blur(70px);
    z-index: 1;
    left: 10%;
    top: 15%;
}

.hero-image img {
    width: 100%;
    max-width: 650px;
    position: relative;
    z-index: 2;
    filter: drop-shadow(0 30px 40px rgba(0,0,0,0.15));
    transition: 0.4s ease;
}

.hero-image:hover img {
    transform: scale(1.02);
}

/* CONTENT */
.hero-content {
    font-family: 'Inter', sans-serif;
}

.hero-badge {
    display: inline-block;
    background: rgba(93,105,76,0.10);
    color: var(--primary);
    padding: 10px 22px;
    border-radius: 999px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 25px;
}

.hero-content h1 {
    font-size: 58px;
    line-height: 1.08;
    color: var(--dark);
    font-weight: 800;
    margin-bottom: 25px;
    font-family: 'Inter', sans-serif;
}

.hero-content p {
    font-size: 18px;
    line-height: 1.9;
    color: #666;
    margin-bottom: 35px;
    max-width: 600px;
    font-family: 'Inter', sans-serif;
}

/* BUTTONS */
.hero-buttons {
    display: flex;
    gap: 18px;
    margin-bottom: 30px;
}

.hero .btn-primary,
.hero .btn-outline {
    padding: 16px 32px;
    border-radius: 999px;
    text-decoration: none;
    font-weight: 700;
    transition: 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.hero .btn-primary {
    background: var(--primary);
    color: white;
    box-shadow: 0 10px 25px rgba(93,105,76,0.20);
}

.hero .btn-primary:hover {
    transform: translateY(-3px);
}

.hero .btn-outline {
    border: 2px solid var(--primary);
    color: var(--primary);
    background: transparent;
}

.hero .btn-outline:hover {
    background: var(--primary);
    color: white;
}

/* TRUST */
.hero-trust {
    display: flex;
    gap: 25px;
    flex-wrap: wrap;
    font-size: 15px;
    font-weight: 600;
    color: var(--primary);
    font-family: 'Inter', sans-serif;
}

/* ANIMATION */
@keyframes floatMachine {
    0%,100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-12px);
    }
}

/* RESPONSIVE */
@media(max-width: 992px) {
    .hero {
        padding: 50px 0;
    }

    .hero-wrapper {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .hero-image {
        justify-content: center;
        order: 1;
    }

    .hero-content {
        order: 2;
    }

    .hero-content h1 {
        font-size: 40px;
    }

    .hero-buttons,
    .hero-trust {
        justify-content: center;
    }

    .hero-image img {
        max-width: 100%;
    }
}
        /* STORY */
        .about-section {
            padding: 100px 0;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-content h2 {
            font-size: 42px;
            margin-bottom: 25px;
            color: var(--dark);
        }

        .about-content p {
            color: #666;
            line-height: 1.9;
            margin-bottom: 20px;
        }

        .about-image {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        }

        .about-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        /* STATS */
        .stats-section {
            padding: 80px 0;
            background: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .stat-box {
            text-align: center;
            padding: 40px;
            border-radius: 20px;
            background: #f8f8f5;
        }

        .stat-box h3 {
            font-size: 42px;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .stat-box p {
            color: #666;
        }

        /* WHY US */
        .why-section {
            padding: 100px 0;
        }

        .why-title {
            text-align: center;
            font-size: 42px;
            margin-bottom: 50px;
            color: var(--dark);
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .why-card {
            background: white;
            padding: 35px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .why-card h3 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        .why-card p {
            color: #666;
            line-height: 1.8;
        }

        /* CTA */
        .cta-section {
            padding: 100px 0;
            text-align: center;
            background: var(--primary);
            color: white;
        }

        .cta-section h2 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .cta-section p {
            max-width: 700px;
            margin: auto auto 30px;
            line-height: 1.8;
        }

        .cta-section .btn-primary {
            background: white;
            color: var(--primary);
        }



        /* SECTION */
.machine-categories {
    padding: 100px 0;
    background: #fff;
    font-family: 'Inter', sans-serif;
}

/* TITLE */
.section-heading {
    text-align: center;
    max-width: 750px;
    margin: 0 auto 70px;
}

.section-tag {
    display: inline-block;
    background: rgba(93,105,76,0.10);
    color: var(--primary);
    padding: 10px 22px;
    border-radius: 999px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 20px;
}

.section-heading h2 {
    font-size: 46px;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 20px;
    line-height: 1.1;
}

.section-heading p {
    font-size: 18px;
    color: #666;
    line-height: 1.8;
}

/* GRID */
.category-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 25px;
}

/* CARD */
.category-card {
    position: relative;
    overflow: hidden;
    border-radius: 28px;
    text-decoration: none;
    min-height: 320px;
    display: flex;
    align-items: flex-end;
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    transition: 0.4s ease;
}

.category-card.large,
.category-card.small {
    grid-column: span 1;
    min-height: 420px;
}

.category-card img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.5s ease;
}

.category-card .overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.75), rgba(0,0,0,0.15));
}

.category-card:hover img {
    transform: scale(1.08);
}

.category-card:hover {
    transform: translateY(-8px);
}

/* CONTENT */
.category-content {
    position: relative;
    z-index: 2;
    padding: 35px;
    color: white;
    width: 100%;
}

.category-content span {
    display: inline-block;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 12px;
    color: rgba(255,255,255,0.85);
}

.category-content h3 {
    font-size: 30px;
    font-weight: 800;
    margin-bottom: 15px;
    line-height: 1.1;
}

.category-card.small h3 {
    font-size: 24px;
    margin-bottom: 18px;
}

.category-content p {
    font-size: 15px;
    line-height: 1.7;
    color: rgba(255,255,255,0.85);
    margin-bottom: 20px;
    max-width: 90%;
}

/* BUTTON */
.card-btn {
    display: inline-block;
    background: rgba(255,255,255,0.15);
    padding: 12px 22px;
    border-radius: 999px;
    font-size: 14px;
    font-weight: 700;
    transition: 0.3s ease;
}

.category-card:hover .card-btn {
    background: var(--primary);
}


/* SECTION */
.why-choose {
    padding: 100px 0;
    background: #f8f9f5;
    font-family: 'Inter', sans-serif;
}

/* LAYOUT */
.why-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.1fr;
    gap: 60px;
    align-items: center;
}

/* IMAGE */
.why-image {
    position: relative;
}

.why-image-shape {
    position: absolute;
    width: 280px;
    height: 280px;
    background: rgba(93,105,76,0.12);
    border-radius: 50%;
    filter: blur(80px);
    top: -40px;
    left: -40px;
    z-index: 1;
}

.why-image img {
    width: 100%;
    border-radius: 28px;
    position: relative;
    z-index: 2;
    box-shadow: 0 25px 50px rgba(0,0,0,0.12);
    transition: 0.4s ease;
}

.why-image:hover img {
    transform: scale(1.02);
}

/* CONTENT */
.section-tag {
    display: inline-block;
    background: rgba(93,105,76,0.10);
    color: var(--primary);
    padding: 10px 22px;
    border-radius: 999px;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 20px;
}

.why-content h2 {
    font-size: 48px;
    font-weight: 800;
    color: var(--dark);
    line-height: 1.1;
    margin-bottom: 25px;
}

.why-text {
    font-size: 17px;
    line-height: 1.9;
    color: #666;
    margin-bottom: 35px;
}

/* FEATURES */
.feature-grid {
    display: grid;
    gap: 20px;
    margin-bottom: 40px;
}

.feature-card {
    background: #fff;
    border-radius: 22px;
    padding: 25px;
    display: flex;
    gap: 18px;
    align-items: flex-start;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    transition: 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.feature-icon {
    width: 60px;
    height: 60px;
    background: rgba(93,105,76,0.10);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    flex-shrink: 0;
}

.feature-card h3 {
    font-size: 20px;
    color: var(--dark);
    margin-bottom: 8px;
    font-weight: 700;
}

.feature-card p {
    font-size: 15px;
    color: #666;
    line-height: 1.7;
    margin: 0;
}

/* CTA */
.why-cta {
    background: var(--primary);
    color: white;
    border-radius: 24px;
    padding: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 25px;
    flex-wrap: wrap;
}

.why-cta h4 {
    font-size: 24px;
    margin-bottom: 8px;
    font-weight: 700;
}

.why-cta p {
    margin: 0;
    color: rgba(255,255,255,0.85);
}

.why-btn {
    background: white;
    color: var(--primary);
    padding: 16px 28px;
    border-radius: 999px;
    text-decoration: none;
    font-weight: 700;
    transition: 0.3s ease;
}

.why-btn:hover {
    transform: translateY(-3px);
}

.featured-machines {
    padding: 100px 0;
    background: #f7f8f3;
}

.featured-machines .container {
    max-width: 1400px;
    margin: auto;
    padding: 0 30px;
}

.section-heading {
    text-align: center;
    margin-bottom: 60px;
}

.section-tag {
    display: inline-block;
    padding: 10px 22px;
    background: rgba(95, 105, 77, 0.08);
    color: #5f694d;
    border-radius: 100px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 18px;
}

.section-heading h2 {
    font-size: 48px;
    font-weight: 700;
    color: #1f2a1a;
    margin-bottom: 18px;
    line-height: 1.2;
}

.section-heading p {
    max-width: 760px;
    margin: auto;
    font-size: 18px;
    color: #666;
    line-height: 1.8;
}

.machine-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.machine-card {
    background: #fff;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.05);
    transition: all 0.35s ease;
    border: 1px solid #eef0e8;
}

.machine-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.08);
}

.machine-image {
    position: relative;
    background: #eef1e6;
    padding: 30px;
    text-align: center;
}

.machine-image img {
    width: 100%;
    max-height: 260px;
    object-fit: contain;
}

.badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: #5f694d;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
    padding: 8px 16px;
    border-radius: 100px;
}

.machine-content {
    padding: 30px;
}

.machine-content h3 {
    font-size: 28px;
    color: #1f2a1a;
    margin-bottom: 15px;
}

.machine-desc {
    color: #666;
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 20px;
}

.machine-specs {
    list-style: none;
    padding: 0;
    margin: 0 0 25px;
}

.machine-specs li {
    margin-bottom: 10px;
    color: #44503a;
    font-size: 15px;
    font-weight: 500;
}

.machine-btn {
    display: inline-block;
    padding: 14px 28px;
    background: #5f694d;
    color: #fff;
    text-decoration: none;
    border-radius: 100px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.machine-btn:hover {
    background: #48513a;
}



/* RESPONSIVE */


        @media(max-width: 992px) {
            .about-grid,
            .why-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 40px;
            }


     .machine-categories {
        padding: 70px 0;
    
     }
    .section-heading h2 {
        font-size: 36px;
    }

    .category-grid {
        grid-template-columns: 1fr;
    }

    .category-card.large,
    .category-card.small {
        grid-column: span 1;
        min-height: 380px;
    }


    .why-choose {
        padding: 70px 0;
}

    .why-wrapper {
        grid-template-columns: 1fr;
    }

    .why-content h2 {
        font-size: 36px;
    }

    .why-cta {
        text-align: center;
        justify-content: center;
    }

     .machine-grid {
        grid-template-columns: repeat(2, 1fr);
}

        }

    @media (max-width: 1100px) {
    .machine-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    }
    
    @media (max-width: 768px) {
    .machine-grid {
        grid-template-columns: 1fr;
    }

    .section-heading h2 {
        font-size: 34px;
    }

    .featured-machines {
        padding: 70px 0;
    }
    }

.featured-equipment {
    padding: 120px 0;
    background: #ffffff;
    overflow: hidden;
}

.featured-equipment .container {
    max-width: 1400px;
    margin: auto;
    padding: 0 30px;
}

.featured-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    gap: 80px;
}

/* LEFT IMAGE */
.featured-image {
    position: relative;
    text-align: center;
}

.image-bg-circle {
    position: absolute;
    width: 500px;
    height: 500px;
    background: rgba(95, 105, 77, 0.08);
    border-radius: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.featured-image img {
    position: relative;
    width: 100%;
    max-width: 650px;
    z-index: 2;
    animation: floatMachine 5s ease-in-out infinite;
}

/* RIGHT CONTENT */
.section-tag {
    display: inline-block;
    padding: 10px 22px;
    background: rgba(95, 105, 77, 0.08);
    color: #5f694d;
    border-radius: 100px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
}

.featured-content h2 {
    font-size: 52px;
    line-height: 1.15;
    color: #1f2a1a;
    margin-bottom: 25px;
    font-weight: 700;
}

.featured-text {
    font-size: 18px;
    line-height: 1.9;
    color: #666;
    margin-bottom: 35px;
}

/* Feature Boxes */
.feature-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 40px;
}

.feature-box {
    display: flex;
    gap: 16px;
    padding: 24px;
    background: #f7f8f3;
    border-radius: 18px;
    transition: all 0.3s ease;
}

.feature-box:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.06);
}

.icon {
    width: 55px;
    height: 55px;
    background: #5f694d;
    color: #fff;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
}

.feature-box h4 {
    font-size: 18px;
    color: #1f2a1a;
    margin-bottom: 6px;
}

.feature-box p {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
}

/* Quick Specs */
.quick-specs {
    display: flex;
    gap: 40px;
    margin-bottom: 35px;
}

.quick-specs h3 {
    font-size: 32px;
    color: #5f694d;
    margin-bottom: 5px;
}

.quick-specs p {
    color: #666;
    font-size: 14px;
}

/* Buttons */
.featured-buttons {
    display: flex;
    gap: 18px;
    flex-wrap: wrap;
}

.btn-primary {
    background: #5f694d;
    color: #fff;
    padding: 16px 34px;
    border-radius: 100px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: #49533d;
}

.btn-outline {
    border: 2px solid #5f694d;
    color: #5f694d;
    padding: 16px 34px;
    border-radius: 100px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline:hover {
    background: #5f694d;
    color: #fff;
}

/* Animation */
@keyframes floatMachine {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-15px);
    }
}

/* Responsive */
@media (max-width: 1100px) {
    .featured-wrapper {
        grid-template-columns: 1fr;
    }

    .featured-content h2 {
        font-size: 40px;
    }
}

@media (max-width: 768px) {
    .feature-grid {
        grid-template-columns: 1fr;
    }

    .quick-specs {
        gap: 25px;
        flex-wrap: wrap;
    }

    .featured-content h2 {
        font-size: 32px;
    }

    .featured-equipment {
        padding: 80px 0;
    }

}





/* =========================
TESTIMONIALS SECTION
========================= */
.testimonials-section {
    padding: 100px 0;
    background: #f7f8f3;
}

.testimonial-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.4fr;
    gap: 50px;
    align-items: start;
}

/* LEFT SIDE */
.testimonial-intro h3 {
    font-size: 42px;
    color: #1f2a1a;
    margin-bottom: 20px;
    line-height: 1.2;
}

.testimonial-intro p {
    font-size: 17px;
    color: #666;
    line-height: 1.9;
    margin-bottom: 35px;
}

.trust-stats {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.trust-box {
    background: #fff;
    padding: 25px;
    border-radius: 22px;
    min-width: 180px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.trust-box h4 {
    font-size: 34px;
    color: #5f694d;
    margin-bottom: 8px;
}

.trust-box p {
    font-size: 14px;
    color: #666;
    margin: 0;
}

/* RIGHT SIDE */
.testimonial-grid {
    display: grid;
    gap: 25px;
}

.testimonial-card {
    background: #fff;
    padding: 35px;
    border-radius: 24px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.05);
    position: relative;
    transition: all 0.3s ease;
    border: 1px solid #eef0e8;
}

.testimonial-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.08);
}

.quote-icon {
    font-size: 50px;
    color: rgba(95, 105, 77, 0.15);
    position: absolute;
    top: 20px;
    right: 25px;
}

.stars {
    font-size: 18px;
    color: #5f694d;
    margin-bottom: 18px;
    font-weight: 700;
}

.testimonial-card p {
    font-size: 16px;
    color: #555;
    line-height: 1.9;
    margin-bottom: 25px;
    max-width: 90%;
}

.customer-info h4 {
    font-size: 18px;
    color: #1f2a1a;
    margin-bottom: 5px;
}

.customer-info span {
    font-size: 14px;
    color: #777;
}

/* RESPONSIVE */
@media (max-width: 992px) {
    .testimonial-wrapper {
        grid-template-columns: 1fr;
    }

    .testimonial-intro h3 {
        font-size: 34px;
    }
}

@media (max-width: 768px) {
    .testimonials-section {
        padding: 70px 0;
    }

    .testimonial-card {
        padding: 28px;
    }

    .testimonial-intro h3 {
        font-size: 30px;
    }
}

/* =========================
VIDEO SHOWCASE SECTION
========================= */
.video-showcase {
    padding: 100px 0;
    background: #ffffff;
}

.video-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
}

.video-card {
    background: #fff;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 12px 35px rgba(0,0,0,0.05);
    border: 1px solid #eef0e8;
    transition: all 0.3s ease;
}

.video-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.08);
}

.video-frame {
    position: relative;
    width: 100%;
    padding-top: 56.25%; /* 16:9 */
    overflow: hidden;
}

.video-frame iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
}

.video-content {
    padding: 28px;
}

.video-content h3 {
    font-size: 24px;
    color: #1f2a1a;
    margin-bottom: 12px;
    font-weight: 700;
}

.video-content p {
    font-size: 15px;
    color: #666;
    line-height: 1.8;
}

/* RESPONSIVE */
@media (max-width: 992px) {
    .video-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .video-showcase {
        padding: 70px 0;
    }

    .video-content h3 {
        font-size: 20px;
    }
}


/* =========================
DELIVERY SECTION
========================= */
.delivery-section {
    padding: 100px 0;
    background: #f7f8f3;
}

.delivery-wrapper {
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 70px;
    align-items: center;
}

/* LEFT CONTENT */
.delivery-content h2 {
    font-size: 48px;
    color: #1f2a1a;
    line-height: 1.15;
    margin-bottom: 25px;
    font-weight: 700;
}

.delivery-text {
    font-size: 17px;
    line-height: 1.9;
    color: #666;
    margin-bottom: 35px;
}

/* FEATURES */
.delivery-features {
    display: grid;
    gap: 20px;
    margin-bottom: 35px;
}

.delivery-feature {
    display: flex;
    gap: 18px;
    align-items: flex-start;
    background: #fff;
    padding: 24px;
    border-radius: 22px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.delivery-feature:hover {
    transform: translateY(-5px);
}

.delivery-icon {
    width: 55px;
    height: 55px;
    background: rgba(95, 105, 77, 0.10);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.delivery-feature h4 {
    font-size: 19px;
    color: #1f2a1a;
    margin-bottom: 6px;
}

.delivery-feature p {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
    margin: 0;
}

/* IMAGE */
.delivery-image {
    position: relative;
}

.delivery-glow {
    position: absolute;
    width: 300px;
    height: 300px;
    background: rgba(95, 105, 77, 0.10);
    border-radius: 50%;
    filter: blur(80px);
    top: -40px;
    right: -40px;
    z-index: 1;
}

.delivery-image img {
    width: 100%;
    border-radius: 28px;
    position: relative;
    z-index: 2;
    box-shadow: 0 25px 50px rgba(0,0,0,0.10);
    transition: 0.4s ease;
}

.delivery-image:hover img {
    transform: scale(1.02);
}

/* CTA */
.delivery-cta {
    margin-top: 15px;
}

/* RESPONSIVE */
@media (max-width: 992px) {
    .delivery-wrapper {
        grid-template-columns: 1fr;
    }

    .delivery-content h2 {
        font-size: 36px;
    }
}

@media (max-width: 768px) {
    .delivery-section {
        padding: 70px 0;
    }

    .delivery-content h2 {
        font-size: 30px;
    }
}

/* =========================
FAQ SECTION
========================= */
.faq-section {
    padding: 100px 0;
    background: #ffffff;
}

.faq-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

.faq-card {
    background: #f7f8f3;
    padding: 35px;
    border-radius: 24px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.04);
    border: 1px solid #eef0e8;
    transition: all 0.3s ease;
}

.faq-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 45px rgba(0,0,0,0.06);
}

.faq-card h3 {
    font-size: 22px;
    color: #1f2a1a;
    margin-bottom: 15px;
    line-height: 1.4;
    font-weight: 700;
}

.faq-card p {
    font-size: 15px;
    color: #666;
    line-height: 1.9;
}

/* RESPONSIVE */
@media (max-width: 992px) {
    .faq-grid {
        grid-template-columns: 1fr;
    }

    .faq-card h3 {
        font-size: 20px;
    }
}

@media (max-width: 768px) {
    .faq-section {
        padding: 70px 0;
    }

    .faq-card {
        padding: 28px;
    }
}
    </style>
</head>
<body>

 @include('partials.header')

<section class="hero">
    <div class="container">
        <div class="hero-wrapper">

            <!-- LEFT IMAGE -->
            <div class="hero-image">
                <div class="hero-image-glow"></div>
                <img src="https://lightcoral-dove-757536.hostingersite.com/wp-content/uploads/2026/05/Kuvuo-scaled.webp" alt="Premium Mini Excavator Heavy Equipment for Sale">
            </div>

            <!-- RIGHT CONTENT -->
            <div class="hero-content">

                <span class="hero-badge">
                    Trusted Heavy Equipment Supplier in USA
                </span>

                <h1>
                    Premium Mini Excavators & Heavy Equipment for Sale
                </h1>

                <p>
                    Explore premium mini excavators, skid steers, forklifts, road rollers, wheel loaders and industrial machinery designed for contractors, construction businesses and heavy-duty operations with fast nationwide shipping and expert support.
                </p>

                <div class="hero-buttons">
                    <a href="{{ route('shop') }}" class="btn-primary">
                        Shop Machines →
                    </a>

                    <a href="{{ route('contact') }}" class="btn-outline">
                        Request Quote
                    </a>
                </div>

                <div class="hero-trust">
                    <span>✓ Nationwide Shipping</span>
                    <span>✓ Financing Available</span>
                    <span>✓ USA Support</span>
                </div>

            </div>

        </div>
    </div>
</section>

<section class="machine-categories">
    <div class="container">

        <!-- SECTION TITLE -->
        <div class="section-heading">
            <span class="section-tag">Heavy Equipment Categories</span>
            <h2>Find the Right Machine for Every Job</h2>
            <p>
                Explore our premium range of heavy machinery engineered for construction,
                logistics, agriculture and industrial applications.
            </p>
        </div>

        <!-- CATEGORY GRID -->
        <div class="category-grid">

            <!-- LARGE CARD -->
            <a href="{{ route('shop.category', 'mini-excavators') }}" class="category-card large">
                <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_16_51-AM.png" alt="Mini Excavators">
                <div class="overlay"></div>
                <div class="category-content">
                   
                    <h3>Mini Excavators</h3>
                   
                    <div class="card-btn">Explore Machines →</div>
                </div>
            </a>

            <!-- LARGE CARD -->
            <a href="{{ route('shop.category', 'skid-steer-loader') }}" class="category-card large">
                <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_24_42-AM.png" alt="Skid Steer Loader">
                <div class="overlay"></div>
                <div class="category-content">
                   
                    <h3>Skid Steer Loader</h3>
                   
                    <div class="card-btn">Explore Machines →</div>
                </div>
            </a>

            <!-- SMALL CARD -->
            <a href="{{ route('shop.category', 'forklift') }}" class="category-card small">
                <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_16_55-AM.png" alt="Forklift">
                <div class="overlay"></div>
                <div class="category-content">
                    <h3>Forklift</h3>
                    <div class="card-btn">View →</div>
                </div>
            </a>

            <!-- SMALL CARD -->
            <a href="{{ route('shop.category', 'road-roller') }}" class="category-card small">
                <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_16_45-AM.png" alt="Road Roller">
                <div class="overlay"></div>
                <div class="category-content">
                    <h3>Road Roller</h3>
                    <div class="card-btn">View →</div>
                </div>
            </a>

            <!-- SMALL CARD -->
            <a href="{{ route('shop.category', 'wheel-loader') }}" class="category-card small">
                <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_16_42-AM.png" alt="Wheel Loader">
                <div class="overlay"></div>
                <div class="category-content">
                    <h3>Wheel Loader</h3>
                    <div class="card-btn">View →</div>
                </div>
            </a>

        </div>
    </div>
</section>

<section class="why-choose">
    <div class="container">

        <div class="why-wrapper">

            <!-- LEFT IMAGE -->
            <div class="why-image">
                <div class="why-image-shape"></div>
                <img src="http://americanminiexcavator.com/wp-content/uploads/2026/05/jj.png" alt="Heavy Equipment Support">
            </div>

            <!-- RIGHT CONTENT -->
            <div class="why-content">

                <span class="section-tag">Why Choose KUVUO</span>

                <h2>
                    Built for Contractors, Trusted Nationwide
                </h2>

                <p class="why-text">
                    We provide premium heavy machinery and industrial equipment with expert guidance,
                    fast shipping, financing support and reliable after-sales service designed for
                    contractors, construction companies and growing businesses across the USA.
                </p>

                <div class="feature-grid">

                    <div class="feature-card">
                        <div class="feature-icon">🚚</div>
                        <div>
                            <h3>Nationwide Shipping</h3>
                            <p>Fast delivery across the USA with secure logistics handling.</p>
                        </div>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">💳</div>
                        <div>
                            <h3>Financing Available</h3>
                            <p>Flexible financing options to grow your business easier.</p>
                        </div>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">⚙️</div>
                        <div>
                            <h3>Premium Equipment</h3>
                            <p>Built for performance, durability and long-term operation.</p>
                        </div>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">📞</div>
                        <div>
                            <h3>Expert Support</h3>
                            <p>Real heavy equipment specialists ready to help you anytime.</p>
                        </div>
                    </div>

                </div>

                <!-- CTA BAR -->
                <div class="why-cta">
                    <div>
                        <h4>Need help choosing the right machine?</h4>
                        <p>Talk to our heavy equipment specialists today.</p>
                    </div>

                    <a href="{{ route('contact') }}" class="why-btn">
                        Request Quote →
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>


<section class="why-section">
    <div class="container">

        <h2 class="why-title">Why Choose Us</h2>

        <div class="why-grid">

            <div class="why-card">
                <h3>Premium Machinery</h3>
                <p>Reliable heavy equipment designed for performance, durability, and efficiency.</p>
            </div>

            <div class="why-card">
                <h3>Fast Nationwide Delivery</h3>
                <p>Shipping solutions across the United States with logistics support.</p>
            </div>

            <div class="why-card">
                <h3>Dedicated Support</h3>
                <p>Sales, logistics, and technical assistance from experienced professionals.</p>
            </div>

        </div>
    </div>
</section>

<!-- =========================
SECTION 4 — FEATURED EQUIPMENT
========================= -->
<section class="featured-equipment">
    <div class="container">

        <div class="featured-wrapper">

            <!-- LEFT IMAGE -->
            <div class="featured-image">
                <div class="image-bg-circle"></div>
                <img src="https://d2j6dbq0eux0bg.cloudfront.net/images/80100025/products/801841001/5673594970.jpg" alt="TYPHON KUVUO 4.0 Mini Excavator">
            </div>

            <!-- RIGHT CONTENT -->
            <div class="featured-content">

                <span class="section-tag">Featured Equipment</span>

                <h2>TYPHON KUVUO 4.0 Mini Excavator</h2>

                <p class="featured-text">
                    Designed for contractors, landscapers and construction professionals,
                    the TYPHON KUVUO 4.0 combines hydraulic precision, compact mobility,
                    rugged chassis engineering and powerful digging performance for demanding job sites.
                </p>

                <!-- Feature List -->
                <div class="feature-grid">

                    <div class="feature-box">
                        <div class="icon">⚙️</div>
                        <div>
                            <h4>Hydraulic Pilot System</h4>
                            <p>Smooth responsive control for precise operation</p>
                        </div>
                    </div>

                    <div class="feature-box">
                        <div class="icon">⛽</div>
                        <div>
                            <h4>Fuel Efficient Engine</h4>
                            <p>Low fuel consumption with contractor-grade reliability</p>
                        </div>
                    </div>

                    <div class="feature-box">
                        <div class="icon">🛠️</div>
                        <div>
                            <h4>Heavy Duty Structure</h4>
                            <p>Strong X-frame chassis built for stability and durability</p>
                        </div>
                    </div>

                    <div class="feature-box">
                        <div class="icon">🚚</div>
                        <div>
                            <h4>Compact & Easy Transport</h4>
                            <p>Perfect for job sites with limited access</p>
                        </div>
                    </div>

                </div>

                <!-- Quick Specs -->
          
         

            </div>
        </div>
    </div>
</section>


<!-- =========================
CUSTOMER TESTIMONIALS SECTION
========================= -->
<section class="testimonials-section">
    <div class="container">

        <!-- SECTION TITLE -->
        <div class="section-heading">
            <span class="section-tag">Customer Testimonials</span>
            <h2>Trusted by Contractors Across the USA</h2>
            <p>
                Hear from contractors, business owners and operators who trust KUVUO
                for reliable heavy equipment, fast shipping and expert support.
            </p>
        </div>

        <div class="testimonial-wrapper">

            <!-- LEFT TRUST BLOCK -->
            <div class="testimonial-intro">
                <h3>500+ Contractors Trust KUVUO</h3>
                <p>
                    From construction companies to landscapers and industrial operators,
                    customers nationwide choose KUVUO for dependable machinery and real support.
                </p>

                <div class="trust-stats">
                    <div class="trust-box">
                        <h4>500+</h4>
                        <p>Machines Delivered</p>
                    </div>

                    <div class="trust-box">
                        <h4>98%</h4>
                        <p>Customer Satisfaction</p>
                    </div>
                </div>
            </div>

            <!-- RIGHT TESTIMONIAL CARDS -->
            <div class="testimonial-grid">

                <!-- CARD 1 -->
                <div class="testimonial-card">
                    <div class="quote-icon">❝</div>

                    <div class="stars">★★★★★</div>

                    <p>
                        The excavator arrived fast and exceeded expectations.
                        Smooth operation, powerful performance and excellent support.
                    </p>

                    <div class="customer-info">
                        <h4>Michael R.</h4>
                        <span>Texas Contractor</span>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="testimonial-card">
                    <div class="quote-icon">❝</div>

                    <div class="stars">★★★★★</div>

                    <p>
                        Financing was easy and delivery was smooth.
                        KUVUO made the entire buying process simple for our company.
                    </p>

                    <div class="customer-info">
                        <h4>James P.</h4>
                        <span>Construction Business Owner</span>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="testimonial-card">
                    <div class="quote-icon">❝</div>

                    <div class="stars">★★★★★</div>

                    <p>
                        Great machine quality and excellent communication.
                        Definitely buying from KUVUO again.
                    </p>

                    <div class="customer-info">
                        <h4>Daniel T.</h4>
                        <span>Landscaping Company</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- =========================
VIDEO SHOWCASE SECTION
========================= -->
<section class="video-showcase">
    <div class="container">

        <!-- TITLE -->
        <div class="section-heading">
            <span class="section-tag">Watch Our Machines in Action</span>
            <h2>See KUVUO Equipment Perform on Real Job Sites</h2>
            <p>
                Watch product demos, machine walkarounds and real equipment performance videos
                to explore power, features and operating capabilities.
            </p>
        </div>

        <!-- VIDEO GRID -->
        <div class="video-grid">

            <!-- VIDEO 1 -->
            <div class="video-card">
                <div class="video-frame">
                    <iframe 
                        src="https://www.youtube.com/embed/Hm_RlQAzFEY"
                        title="KUVUO Equipment Video"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="video-content">
                    <h3>Mini Excavator Walkaround</h3>
                    <p>Explore key features, machine design and operating controls.</p>
                </div>
            </div>

            <!-- VIDEO 2 -->
            <div class="video-card">
                <div class="video-frame">
                    <iframe 
                        src="https://www.youtube.com/embed/9WRncw1NIKs"
                        title="KUVUO Equipment Video"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="video-content">
                    <h3>Machine Performance Demo</h3>
                    <p>Watch digging power, movement and hydraulic performance in action.</p>
                </div>
            </div>

            <!-- VIDEO 3 -->
            <div class="video-card">
                <div class="video-frame">
                    <iframe 
                        src="https://www.youtube.com/embed/4kxZJqDlNro"
                        title="KUVUO Equipment Video"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="video-content">
                    <h3>Heavy Equipment Showcase</h3>
                    <p>See real-world performance and contractor-ready capabilities.</p>
                </div>
            </div>

            <!-- VIDEO 4 -->
            <div class="video-card">
                <div class="video-frame">
                    <iframe 
                        src="https://www.youtube.com/embed/b70mouKuk2A"
                        title="KUVUO Equipment Video"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="video-content">
                    <h3>Operator Demo Video</h3>
                    <p>Watch machine handling, controls and practical site use.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- =========================
DELIVERY SECTION
========================= -->
<section class="delivery-section">
    <div class="container">

        <div class="delivery-wrapper">

            <!-- LEFT CONTENT -->
            <div class="delivery-content">

                <span class="section-tag">Nationwide Delivery</span>

                <h2>
                    Fast & Secure Heavy Equipment Delivery Across the USA
                </h2>

                <p class="delivery-text">
                    From mini excavators to skid steers and heavy-duty equipment,
                    KUVUO provides reliable nationwide shipping with secure transport,
                    professional logistics coordination and real-time support from dispatch to delivery.
                </p>

                <!-- FEATURES -->
                <div class="delivery-features">

                    <div class="delivery-feature">
                        <div class="delivery-icon">🚚</div>
                        <div>
                            <h4>Nationwide Shipping</h4>
                            <p>Fast delivery service across all 50 states.</p>
                        </div>
                    </div>

                    <div class="delivery-feature">
                        <div class="delivery-icon">📦</div>
                        <div>
                            <h4>Secure Transport</h4>
                            <p>Professional heavy equipment logistics and handling.</p>
                        </div>
                    </div>

                    <div class="delivery-feature">
                        <div class="delivery-icon">📍</div>
                        <div>
                            <h4>Tracking Support</h4>
                            <p>Stay updated throughout the shipping process.</p>
                        </div>
                    </div>

                    <div class="delivery-feature">
                        <div class="delivery-icon">🤝</div>
                        <div>
                            <h4>Delivery Coordination</h4>
                            <p>Dedicated support from dispatch to final arrival.</p>
                        </div>
                    </div>

                </div>

                <!-- CTA -->
                <div class="delivery-cta">
                    <a href="{{ route('contact') }}" class="btn-primary">
                        Request Shipping Quote →
                    </a>
                </div>

            </div>

            <!-- RIGHT IMAGE -->
            <div class="delivery-image">
                <div class="delivery-glow"></div>
                <img src="https://images.unsplash.com/photo-1519003722824-194d4455a60c" alt="Heavy Equipment Delivery Truck">
            </div>

        </div>
    </div>
</section>

<!-- =========================
FAQ SECTION
========================= -->
<section class="faq-section">
    <div class="container">

        <!-- TITLE -->
        <div class="section-heading">
            <span class="section-tag">Frequently Asked Questions</span>
            <h2>Answers to Common Questions</h2>
            <p>
                Learn more about our heavy equipment, shipping, financing and support
                before making your purchase.
            </p>
        </div>

        <!-- FAQ GRID -->
        <div class="faq-grid">

            <!-- FAQ CARD -->
            <div class="faq-card">
                <h3>Do you ship heavy equipment nationwide?</h3>
                <p>
                    Yes, KUVUO provides secure heavy equipment shipping across the USA
                    with professional logistics coordination and delivery support.
                </p>
            </div>

            <!-- FAQ CARD -->
            <div class="faq-card">
                <h3>Do you offer financing options?</h3>
                <p>
                    Yes, flexible financing options are available for qualified buyers
                    to make equipment purchasing easier for businesses and contractors.
                </p>
            </div>

            <!-- FAQ CARD -->
            <div class="faq-card">
                <h3>Can I request a quote before buying?</h3>
                <p>
                    Absolutely. Our team can provide equipment recommendations,
                    pricing details and custom shipping quotes based on your needs.
                </p>
            </div>

            <!-- FAQ CARD -->
            <div class="faq-card">
                <h3>Do your machines come with attachments?</h3>
                <p>
                    Many machines support optional attachments depending on the model.
                    Our specialists can help you choose the right setup.
                </p>
            </div>

            <!-- FAQ CARD -->
            <div class="faq-card">
                <h3>How long does delivery take?</h3>
                <p>
                    Delivery time depends on your location and machine availability,
                    but our team provides clear shipping timelines during checkout.
                </p>
            </div>

            <!-- FAQ CARD -->
            <div class="faq-card">
                <h3>Do you provide after-sales support?</h3>
                <p>
                    Yes, KUVUO offers customer support, logistics assistance and
                    equipment guidance even after your machine is delivered.
                </p>
            </div>

        </div>
    </div>
</section>

@include('partials.footer')

</body>
</html>