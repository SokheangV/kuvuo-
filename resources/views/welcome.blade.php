<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KUVUO — Heavy Equipment for Worksites, Farms and Property Projects</title>
    <meta name="description" content="KUVUO supplies mini excavators, skid steers, loaders, forklifts and attachments for excavation, loading, farmland, road maintenance and small construction. Browse the catalog, review specs and request a quote.">

    {{-- Fonts:
         - Science Gothic → headings
         - Nunito         → body text, labels, captions
         - Google Sans    → button text only (with safe fallback chain) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&family=Science+Gothic:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">

    <style>
        /* ─── Reset (homepage scope) ─────────────────────────────────────── */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --green-900: #12372A;
            --green-700: #1F5D45;
            --green-500: #2D7355;
            --green-100: #DCE8E1;
            --green-50:  #EEF5F0;
            --green-25:  #F6FAF7;
            --bg:        #FFFFFF;
            --bg-soft:   #F8FAF9;
            --ink:       #111827;
            --ink-2:     #1F2937;
            --muted:     #6B7280;
            --border:    #D7DED9;
            --border-2:  #E5E7EB;
            --accent:    #D97706;   /* industrial orange — used sparingly */
            --accent-2:  #B7791F;   /* muted brass alt */
        }

        html, body {
            background: var(--bg);
            color: var(--ink);
            font-family: 'Nunito', Arial, Helvetica, sans-serif;
            font-weight: 400;
            line-height: 1.55;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }
        h1, h2, h3, h4, h5, h6 { font-family: 'Science Gothic', Arial, Helvetica, sans-serif; }
        a { color: inherit; text-decoration: none; }
        img { display: block; max-width: 100%; height: auto; }

        /* ─── Layout primitives ──────────────────────────────────────────── */
        .home-wrap { max-width: 1320px; margin: 0 auto; padding: 0 28px; }

        .home-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--green-900);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            padding: 6px 12px;
            border: 1px solid var(--green-900);
            border-radius: 2px;
            background: #fff;
            font-family: 'Nunito', Arial, sans-serif;
        }
        .home-eyebrow::before {
            content: "";
            width: 8px; height: 8px;
            background: var(--accent);
            display: block;
        }
        .home-eyebrow.on-green { color: #fff; border-color: rgba(255,255,255,0.4); background: transparent; }
        .home-eyebrow.on-green::before { background: var(--accent); }

        /* Mono-style technical label */
        .home-tlabel {
            font-family: 'Nunito', Arial, sans-serif;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: var(--green-900);
        }
        .home-tlabel .accent { color: var(--accent); }

        /* ─── Buttons ────────────────────────────────────────────────────── */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 24px;
            font-family: 'Google Sans', Arial, Helvetica, sans-serif;
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 0.01em;
            border-radius: 3px;
            border: 1.5px solid transparent;
            cursor: pointer;
            transition: background-color .18s ease, color .18s ease, border-color .18s ease, transform .12s ease, box-shadow .18s ease;
            white-space: nowrap;
        }
        .btn:active { transform: translateY(1px); }
        .btn-primary { background: var(--green-900); color: #fff; border-color: var(--green-900); }
        .btn-primary:hover { background: var(--green-700); border-color: var(--green-700); box-shadow: 0 6px 18px rgba(18, 55, 42, 0.18); }
        .btn-outline { background: #fff; color: var(--green-900); border-color: var(--green-900); }
        .btn-outline:hover { background: var(--green-50); }
        .btn-ghost { background: transparent; color: var(--green-900); border-color: var(--border-2); }
        .btn-ghost:hover { border-color: var(--green-900); }
        .btn-light { background: #fff; color: var(--green-900); border-color: #fff; }
        .btn-light:hover { background: var(--green-50); border-color: var(--green-50); }

        /* ─── Section primitives ─────────────────────────────────────────── */
        .home-section { padding: 104px 0; }
        .home-section.soft    { background: var(--green-25); }
        .home-section.softer  { background: var(--green-50); }
        .home-section + .home-section { border-top: 1px solid var(--border); }

        .home-section-head { max-width: 760px; margin-bottom: 56px; }
        .home-section-head h2 {
            font-size: clamp(28px, 3.4vw, 44px);
            line-height: 1.08;
            letter-spacing: -0.02em;
            color: var(--ink);
            font-weight: 700;
            margin: 20px 0 14px;
        }
        .home-section-head h2 .accent-mark { color: var(--green-900); }
        .home-section-head h2 .accent-line {
            display: inline-block; width: 28px; height: 3px;
            background: var(--accent); vertical-align: middle;
            margin: 0 10px 8px 0;
        }
        .home-section-head p { font-size: 17px; color: var(--muted); max-width: 620px; }

        /* ─────────────────────────────────────────────────────────────────
           1. HERO
        ───────────────────────────────────────────────────────────────── */
        .home-hero {
            padding: 80px 0 0;
            background:
                radial-gradient(60% 80% at 100% 0%, var(--green-50) 0%, transparent 60%),
                linear-gradient(180deg, #fff 0%, var(--green-25) 100%);
        }
        .home-hero-grid {
            display: grid;
            /* Left content ~45%, right machine visual ~55% */
            grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
            gap: clamp(32px, 5vw, 80px);
            align-items: center;
            padding-bottom: 60px;
        }
        .home-hero h1 {
            font-size: clamp(38px, 4.1vw, 56px);
            line-height: 1.06;
            letter-spacing: -0.025em;
            color: var(--ink);
            font-weight: 700;
            margin: 24px 0 24px;
            max-width: 650px;
        }
        .home-hero h1 .accent { color: var(--green-900); }
        .home-hero h1 .accent-bar {
            display: inline-block;
            width: 44px; height: 5px;
            background: var(--accent);
            margin: 0 0 14px 0;
            position: relative;
        }
        .home-hero p.lead {
            font-size: 17.5px;
            color: var(--muted);
            max-width: 560px;
            margin-bottom: 36px;
            line-height: 1.65;
        }
        .home-hero-ctas { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 36px; }
        .home-hero-trust {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
            border-top: 1px solid var(--border);
            padding-top: 22px;
            max-width: 540px;
        }
        .home-hero-trust > div { padding-right: 18px; border-right: 1px solid var(--border); }
        .home-hero-trust > div:last-child { border-right: none; padding: 0 0 0 18px; }
        .home-hero-trust > div:nth-child(2) { padding-left: 18px; }
        .home-hero-trust strong {
            display: block;
            font-size: 24px;
            color: var(--green-900);
            font-weight: 800;
            line-height: 1;
            margin-bottom: 6px;
            font-family: 'Science Gothic', Arial, sans-serif;
        }
        .home-hero-trust span {
            font-size: 11px; color: var(--muted);
            letter-spacing: 0.1em; text-transform: uppercase; font-weight: 600;
        }

        /* Hero visual frame — machine sits flush to the RIGHT inside it */
        .home-hero-visual {
            position: relative;
            background: #fff;
            border: 1px solid var(--border);
            padding: 18px 18px 18px 34px;
            box-shadow: 0 30px 60px -28px rgba(18, 55, 42, 0.22);
            display: flex;
            justify-content: flex-end;
            align-items: center;
            min-height: 520px;
            overflow: visible;
        }
        .home-hero-visual::before {
            content: ""; position: absolute;
            top: -8px; left: -8px;
            width: 72px; height: 72px;
            border-top: 4px solid var(--green-900);
            border-left: 4px solid var(--green-900);
        }
        .home-hero-visual::after {
            content: ""; position: absolute;
            bottom: -8px; right: -8px;
            width: 72px; height: 72px;
            border-bottom: 4px solid var(--accent);
            border-right: 4px solid var(--accent);
        }
        /* Machine image: right-aligned, no cropping, large and clear */
        .home-hero-visual img {
            width: min(100%, 720px);
            height: auto;
            max-height: 500px;
            object-fit: contain;
            object-position: right center;
            display: block;
        }

        /* Hero floating spec labels */
        .home-hero-spec {
            position: absolute;
            background: #fff;
            border: 1px solid var(--border);
            padding: 10px 14px;
            border-radius: 2px;
            box-shadow: 0 8px 24px rgba(17, 24, 39, 0.08);
            display: flex; flex-direction: column; gap: 2px;
            min-width: 130px;
        }
        .home-hero-spec .lbl { font-size: 10px; color: var(--muted); text-transform: uppercase; letter-spacing: 0.12em; font-weight: 700; }
        .home-hero-spec .val { font-size: 14px; color: var(--ink); font-weight: 700; font-family: 'Science Gothic', Arial, sans-serif; }
        /* Spec chips sit on the LEFT side of the frame (machine is right-aligned),
           so they don't cover any part of the excavator. */
        .home-hero-spec.s1 { top: 32px; left: 14px; border-left: 3px solid var(--accent); }
        .home-hero-spec.s2 { bottom: 32px; left: 14px; border-left: 3px solid var(--green-900); }

        /* Hero bottom spec strip (full width inside wrap) */
        .home-hero-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            background: var(--green-900);
            color: #fff;
            margin-top: 0;
        }
        .home-hero-strip > div {
            padding: 22px 26px;
            border-right: 1px solid rgba(0,0,0,0.18);
            display: flex; align-items: center; gap: 14px;
        }
        .home-hero-strip > div:last-child { border-right: none; }
        .home-hero-strip .strip-icon {
            width: 30px; height: 30px;
            display: flex; align-items: center; justify-content: center;
            color: var(--accent);
        }
        .home-hero-strip .strip-text {
            font-family: 'Nunito', Arial, sans-serif;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            line-height: 1.2;
        }

        /* ─────────────────────────────────────────────────────────────────
           2. VIDEO SECTION
        ───────────────────────────────────────────────────────────────── */
        .home-video-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }
        .home-video-card {
            background: #fff;
            border: 1px solid var(--border);
            box-shadow: 0 22px 44px -34px rgba(18, 55, 42, 0.28);
            overflow: hidden;
        }
        .home-video-frame {
            position: relative;
            padding-top: 56.25%;
            background: var(--green-900);
        }
        .home-video-frame iframe {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        .home-video-copy {
            padding: 20px 22px 22px;
        }
        .home-video-copy .video-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--green-900);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }
        .home-video-copy .video-label::before {
            content: "";
            width: 6px;
            height: 6px;
            background: var(--accent);
            display: block;
        }
        .home-video-copy h3 {
            margin: 14px 0 10px;
            font-family: 'Science Gothic', Arial, sans-serif;
            font-size: 24px;
            line-height: 1.14;
            color: var(--ink);
            letter-spacing: -0.015em;
        }
        .home-video-copy p {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
        }

        /* ─────────────────────────────────────────────────────────────────
           2. USE CASES (editorial: 1 feature + 4 small)
        ───────────────────────────────────────────────────────────────── */
        .home-uc-editorial {
            display: grid;
            grid-template-columns: 1.05fr 1.4fr;
            gap: 28px;
            align-items: stretch;
        }
        .home-uc-feature {
            position: relative;
            background: var(--green-900);
            color: #fff;
            padding: 44px 40px 40px;
            overflow: hidden;
            min-height: 460px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .home-uc-feature::after {
            content: ""; position: absolute;
            bottom: 0; right: 0;
            width: 220px; height: 220px;
            background: radial-gradient(circle, rgba(217, 119, 6, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }
        .home-uc-feature h3 {
            font-size: clamp(26px, 2.6vw, 36px);
            line-height: 1.1;
            font-weight: 700;
            margin: 18px 0 16px;
            letter-spacing: -0.015em;
            color: #fff;
        }
        .home-uc-feature p {
            color: rgba(255,255,255,0.78);
            font-size: 15.5px;
            line-height: 1.7;
            max-width: 440px;
        }
        .home-uc-feature .badge {
            display: inline-flex;
            align-items: center; gap: 8px;
            padding: 6px 10px;
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 2px;
            font-size: 11px; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
            color: #fff;
        }
        .home-uc-feature .badge::before { content: ""; width: 6px; height: 6px; background: var(--accent); display: block; }
        .home-uc-feature .stat-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0;
            margin-top: 32px;
            border-top: 1px solid rgba(255,255,255,0.15);
            padding-top: 24px;
        }
        .home-uc-feature .stat-row > div { padding-right: 16px; border-right: 1px solid rgba(255,255,255,0.15); }
        .home-uc-feature .stat-row > div:last-child { border-right: none; padding-left: 16px; padding-right: 0; }
        .home-uc-feature .stat-row strong {
            display: block;
            font-size: 24px;
            color: var(--accent);
            font-weight: 800;
            font-family: 'Science Gothic', Arial, sans-serif;
            margin-bottom: 4px;
        }
        .home-uc-feature .stat-row span {
            font-size: 11px;
            color: rgba(255,255,255,0.7);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 600;
        }

        .home-uc-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .home-uc-card {
            padding: 26px 24px;
            background: #fff;
            border: 1px solid var(--border);
            transition: border-color .2s ease, transform .2s ease, box-shadow .2s ease;
            position: relative;
        }
        .home-uc-card::before {
            content: ""; position: absolute;
            top: 0; left: 0;
            width: 36px; height: 3px;
            background: var(--green-900);
            transition: width .25s ease, background .2s ease;
        }
        .home-uc-card:hover {
            border-color: var(--green-900);
            transform: translateY(-3px);
            box-shadow: 0 16px 32px -18px rgba(18, 55, 42, 0.18);
        }
        .home-uc-card:hover::before { width: 100%; background: var(--accent); }
        .home-uc-card .uc-num {
            font-family: 'Nunito', Arial, sans-serif;
            font-size: 11px;
            font-weight: 800;
            color: var(--accent);
            letter-spacing: 0.18em;
            margin-bottom: 12px;
            display: block;
        }
        .home-uc-card h4 {
            font-size: 17px;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 6px;
            letter-spacing: -0.005em;
        }
        .home-uc-card p { font-size: 13.5px; color: var(--muted); line-height: 1.6; }

        /* ─────────────────────────────────────────────────────────────────
           3. MACHINE CAPABILITY (technical rows)
        ───────────────────────────────────────────────────────────────── */
        .home-cap-frame {
            background: #fff;
            border: 1px solid var(--border);
            border-top: 3px solid var(--green-900);
        }
        .home-cap-row {
            display: grid;
            grid-template-columns: 110px 1fr 1.4fr 60px;
            gap: 36px;
            padding: 28px 36px;
            border-bottom: 1px solid var(--border-2);
            align-items: center;
            transition: background .18s ease;
        }
        .home-cap-row:last-child { border-bottom: none; }
        .home-cap-row:hover { background: var(--green-25); }
        .home-cap-row:hover .cap-num { color: var(--accent); }
        .home-cap-row:hover .cap-icon { color: var(--accent); }
        .home-cap-row .cap-num {
            font-family: 'Science Gothic', Arial, sans-serif;
            font-size: 22px;
            font-weight: 800;
            color: var(--green-900);
            letter-spacing: 0.02em;
            transition: color .2s ease;
        }
        .home-cap-row .cap-num small {
            display: block;
            font-size: 10px;
            color: var(--muted);
            font-weight: 700;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            margin-top: 4px;
            font-family: 'Nunito', sans-serif;
        }
        .home-cap-row .cap-title {
            font-family: 'Science Gothic', Arial, sans-serif;
            font-size: 19px;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -0.005em;
        }
        .home-cap-row .cap-desc {
            color: var(--muted);
            font-size: 14.5px;
            line-height: 1.55;
        }
        .home-cap-row .cap-icon {
            color: var(--green-900);
            display: flex; justify-content: flex-end;
            transition: color .2s ease;
        }

        /* ─────────────────────────────────────────────────────────────────
           2b. CATEGORIES (premium square card grid — below hero)
        ───────────────────────────────────────────────────────────────── */
        .home-category-section {
            background: #fff;
            padding: 80px 0 96px;
            border-top: 1px solid var(--border);
        }
        .home-category-head {
            max-width: 820px;
            margin-bottom: 52px;
        }
        .home-category-label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--green-900);
            font-family: 'Nunito', Arial, Helvetica, sans-serif;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            padding: 5px 10px;
            border: 1px solid var(--green-900);
            border-radius: 2px;
            background: #fff;
            margin-bottom: 22px;
        }
        .home-category-label::before {
            content: "";
            width: 8px;
            height: 8px;
            background: var(--accent);
            display: block;
            flex-shrink: 0;
        }
        .home-category-head h2 {
            color: var(--ink);
            font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
            font-size: clamp(30px, 3.2vw, 46px);
            font-weight: 700;
            letter-spacing: -0.025em;
            line-height: 1.08;
            margin-bottom: 16px;
        }
        .home-category-head p {
            color: var(--muted);
            font-family: 'Nunito', Arial, Helvetica, sans-serif;
            font-size: 17px;
            line-height: 1.6;
            max-width: 680px;
        }
        /* ── Grid ── */
        .home-cat-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
        }
        /* ── Card ── */
        .home-cat-card {
            position: relative;
            background: #fff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            transition: box-shadow .22s ease;
        }
        /* Top accent bar — animates in on hover */
        .home-cat-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            z-index: 2;
            background: var(--green-900);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .22s cubic-bezier(.4,0,.2,1);
        }
        .home-cat-card:hover {
            z-index: 1;
            box-shadow: 0 16px 40px -12px rgba(18, 55, 42, 0.28);
        }
        .home-cat-card:hover::before,
        .home-cat-card:focus-visible::before {
            transform: scaleX(1);
        }
        .home-cat-card:focus-visible {
            outline: 2px solid var(--green-900);
            outline-offset: 0px;
        }
        /* ── Image zone ── */
        .home-cat-media {
            width: 100%;
            aspect-ratio: 4 / 3;
            background: var(--green-25);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 24px;
            border-bottom: 1px solid var(--border);
        }
        .home-cat-media img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            transition: transform .3s cubic-bezier(.4,0,.2,1);
        }
        .home-cat-card:hover .home-cat-media img {
            transform: scale(1.06);
        }
        /* ── Text zone ── */
        .home-cat-content {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            padding: 22px 22px 24px;
            flex: 1;
        }
        .home-cat-copy { min-width: 0; }
        .home-cat-count {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--accent);
            font-family: 'Nunito', Arial, Helvetica, sans-serif;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        .home-cat-count::before {
            content: "";
            width: 16px;
            height: 2px;
            background: var(--accent);
            display: block;
            flex-shrink: 0;
        }
        .home-cat-card h3 {
            color: var(--ink);
            font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
            font-size: clamp(18px, 1.5vw, 22px);
            font-weight: 700;
            line-height: 1.15;
            letter-spacing: -0.01em;
            margin-bottom: 6px;
        }
        .home-cat-line {
            color: var(--muted);
            font-family: 'Nunito', Arial, Helvetica, sans-serif;
            font-size: 13px;
            line-height: 1.45;
        }
        /* ── Arrow button ── */
        .home-cat-arrow {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            color: var(--green-900);
            border: 1.5px solid var(--green-900);
            border-radius: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background-color .2s ease, color .2s ease, border-color .2s ease;
        }
        .home-cat-card:hover .home-cat-arrow {
            color: #fff;
            background: var(--green-900);
        }

        /* ─────────────────────────────────────────────────────────────────
           5. OPERATION CONFIDENCE (editorial split with checklist)
        ───────────────────────────────────────────────────────────────── */
        .home-op-split {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 64px;
            align-items: start;
        }
        .home-op-text h2 {
            font-size: clamp(28px, 3.2vw, 42px);
            line-height: 1.08;
            font-weight: 700;
            margin: 18px 0 18px;
            color: var(--ink);
            letter-spacing: -0.02em;
        }
        .home-op-text p { color: var(--muted); font-size: 16px; line-height: 1.7; margin-bottom: 28px; }
        .home-op-quote {
            border-left: 4px solid var(--accent);
            padding: 18px 22px;
            background: #fff;
            font-style: normal;
            color: var(--ink-2);
            font-size: 15.5px;
            line-height: 1.65;
            margin-bottom: 28px;
        }
        .home-op-quote strong { color: var(--green-900); }

        .home-op-checklist {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }
        .home-op-item {
            background: #fff;
            border: 1px solid var(--border);
            padding: 22px 22px;
            display: flex;
            gap: 16px;
            align-items: flex-start;
            transition: border-color .2s ease, transform .2s ease;
        }
        .home-op-item:hover { border-color: var(--green-900); transform: translateY(-2px); }
        .home-op-item .check {
            width: 26px; height: 26px;
            flex-shrink: 0;
            background: var(--green-900);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            border-radius: 2px;
        }
        .home-op-item h4 {
            font-size: 15px;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 4px;
        }
        .home-op-item p {
            font-size: 13.5px;
            color: var(--muted);
            line-height: 1.55;
        }

        /* ─────────────────────────────────────────────────────────────────
           6. MAINTENANCE TIMELINE
        ───────────────────────────────────────────────────────────────── */
        .home-timeline {
            position: relative;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
        }
        .home-timeline::before {
            content: "";
            position: absolute;
            top: 38px; left: 0; right: 0;
            height: 2px;
            background: var(--border);
        }
        .home-tl-step {
            padding-right: 28px;
            position: relative;
        }
        .home-tl-step:last-child { padding-right: 0; }
        .home-tl-dot {
            width: 76px; height: 76px;
            background: #fff;
            border: 2px solid var(--green-900);
            color: var(--green-900);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Science Gothic', Arial, sans-serif;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 22px;
            position: relative;
            z-index: 1;
            transition: background .2s ease, color .2s ease;
        }
        .home-tl-step:hover .home-tl-dot {
            background: var(--green-900);
            color: #fff;
        }
        .home-tl-step:hover .home-tl-dot::after {
            content: "";
            position: absolute;
            bottom: -10px; left: 0;
            width: 36px; height: 3px;
            background: var(--accent);
        }
        .home-tl-step h4 {
            font-size: 17px;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 8px;
            letter-spacing: -0.005em;
        }
        .home-tl-step p { font-size: 13.5px; color: var(--muted); line-height: 1.6; max-width: 240px; }

        /* ─────────────────────────────────────────────────────────────────
           7. FINAL CTA BANNER
        ───────────────────────────────────────────────────────────────── */
        .home-cta-band { padding: 96px 0; background: #fff; }
        .home-cta-inner {
            position: relative;
            border: 1px solid var(--green-900);
            padding: 56px 64px;
            background: #fff;
            display: grid;
            grid-template-columns: 1.3fr auto;
            gap: 48px;
            align-items: center;
        }
        .home-cta-inner::before {
            content: "";
            position: absolute;
            top: -1px; left: -1px;
            width: 70px; height: 5px;
            background: var(--accent);
        }
        .home-cta-inner::after {
            content: "";
            position: absolute;
            top: -1px; left: -1px;
            width: 5px; height: 70px;
            background: var(--accent);
        }
        .home-cta-inner h2 {
            font-size: clamp(26px, 2.8vw, 36px);
            color: var(--ink);
            font-weight: 700;
            line-height: 1.12;
            margin-bottom: 10px;
            letter-spacing: -0.02em;
        }
        .home-cta-inner p { color: var(--muted); font-size: 16px; max-width: 560px; line-height: 1.6; }
        .home-cta-actions { display: flex; gap: 12px; flex-wrap: wrap; }

        /* ─────────────────────────────────────────────────────────────────
           RESPONSIVE
        ───────────────────────────────────────────────────────────────── */
        @media (max-width: 1180px) {
            .home-cat-grid { grid-template-columns: repeat(3, 1fr); }
            .home-uc-editorial { grid-template-columns: 1fr; }
            .home-cap-row { grid-template-columns: 90px 1fr 1.2fr 40px; gap: 24px; padding: 24px 28px; }
        }
        @media (max-width: 1000px) {
            .home-hero-grid { grid-template-columns: 1fr; gap: 48px; padding-bottom: 48px; }
            /* Mobile: stack — text first, machine below, image centered */
            .home-hero-visual { justify-content: center; min-height: 0; }
            .home-hero-visual img { max-height: 380px; object-position: center; width: 100%; }
            .home-hero-spec.s1 { top: 14px; left: 14px; }
            .home-hero-spec.s2 { bottom: 14px; left: 14px; }
            .home-hero-strip { grid-template-columns: repeat(2, 1fr); }
            .home-hero-strip > div { border-right: 1px solid rgba(0,0,0,0.18) !important; border-bottom: 1px solid rgba(0,0,0,0.18); }
            .home-hero-strip > div:nth-child(2n) { border-right: none !important; }
            .home-hero-strip > div:nth-last-child(-n+2) { border-bottom: none; }
            .home-video-grid { grid-template-columns: 1fr; }
            .home-op-split { grid-template-columns: 1fr; gap: 40px; }
            .home-timeline { grid-template-columns: repeat(2, 1fr); gap: 36px 28px; }
            .home-timeline::before { display: none; }
            .home-cat-grid { grid-template-columns: repeat(2, 1fr); gap: 1px; }
            .home-uc-grid { grid-template-columns: repeat(2, 1fr); }
            .home-section { padding: 80px 0; }
        }
        @media (max-width: 680px) {
            .home-wrap { padding: 0 20px; }
            .home-uc-grid { grid-template-columns: 1fr; }
            .home-op-checklist { grid-template-columns: 1fr; }
            .home-cap-row { grid-template-columns: 70px 1fr; gap: 16px; padding: 22px 22px; }
            .home-cap-row .cap-desc, .home-cap-row .cap-icon { grid-column: 1 / -1; padding-left: 86px; }
            .home-cap-row .cap-icon { display: none; }
            .home-hero-trust { grid-template-columns: 1fr; gap: 16px; }
            .home-hero-trust > div { border-right: none; padding: 0 0 16px 0 !important; border-bottom: 1px solid var(--border); }
            .home-hero-trust > div:last-child { border-bottom: none; padding-bottom: 0 !important; }
            .home-cta-inner { grid-template-columns: 1fr; padding: 36px 28px; }
            .home-uc-feature { padding: 32px 26px; min-height: auto; }
            .home-uc-feature .stat-row { grid-template-columns: 1fr; }
            .home-uc-feature .stat-row > div { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.15); padding: 0 0 14px 0; margin-bottom: 14px; }
            .home-uc-feature .stat-row > div:last-child { border-bottom: none; padding: 0; }
        }
        @media (max-width: 480px) {
            .home-cat-grid { grid-template-columns: 1fr; background: none; border: none; gap: 16px; }
            .home-timeline { grid-template-columns: 1fr; }
            .home-hero-strip { grid-template-columns: 1fr; }
            .home-hero-strip > div { border-right: none !important; border-bottom: 1px solid rgba(0,0,0,0.18) !important; }
            .home-hero-strip > div:last-child { border-bottom: none !important; }
            .btn { width: 100%; }
            .home-hero-ctas { flex-direction: column; align-items: stretch; }
            .home-cta-actions { flex-direction: column; align-items: stretch; width: 100%; }
            .home-hero-visual img { max-height: 280px; }
            .home-hero-spec { display: none; }
            .home-video-copy { padding: 18px 18px 20px; }
            .home-video-copy h3 { font-size: 21px; }
        }

        /* ═════════════════════════════════════════════════════════════════
           WORKSITE SIMULATION  (#typhon-sim-v3)
        ═════════════════════════════════════════════════════════════════ */
        #typhon-sim-v3 .ksim-card {
            background: #fff;
            border: 1px solid var(--green-900);
            overflow: hidden;
            box-shadow: 0 30px 60px -32px rgba(18, 55, 42, 0.22);
        }
        #typhon-sim-v3 .ksim-header {
            background: var(--green-900);
            padding: 18px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            border-bottom: 4px solid var(--accent);
        }
        #typhon-sim-v3 .ksim-mode {
            display: inline-flex; align-items: center; gap: 12px;
            color: rgba(255,255,255,0.85);
            font-family: 'Nunito', Arial, sans-serif;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.22em;
            text-transform: uppercase;
        }
        #typhon-sim-v3 .ksim-mode::before {
            content: ""; width: 8px; height: 8px; background: var(--accent); display: block;
        }
        #typhon-sim-v3 .ksim-title {
            color: #fff;
            font-family: 'Science Gothic', Arial, sans-serif;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }
        #typhon-sim-v3 .ksim-body {
            display: grid;
            grid-template-columns: 300px 1fr;
            min-height: 540px;
        }
        #typhon-sim-v3 .ksim-tabs {
            background: var(--green-25);
            border-right: 1px solid var(--border);
            padding: 12px 0;
            overflow-x: auto;
        }
        #typhon-sim-v3 .ksim-tab {
            display: flex; align-items: center; gap: 14px;
            width: 100%;
            padding: 16px 22px;
            cursor: pointer;
            background: transparent;
            border: none;
            border-left: 3px solid transparent;
            color: var(--ink-2);
            text-align: left;
            font-family: 'Nunito', Arial, sans-serif;
            transition: background .15s ease, color .15s ease, border-color .15s ease;
        }
        #typhon-sim-v3 .ksim-tab:hover { background: #fff; }
        #typhon-sim-v3 .ksim-tab.active {
            background: var(--green-900);
            color: #fff;
            border-left-color: var(--accent);
        }
        #typhon-sim-v3 .ksim-tab .tab-num {
            font-family: 'Science Gothic', Arial, sans-serif;
            font-size: 15px;
            font-weight: 800;
            color: var(--accent);
            min-width: 28px;
        }
        #typhon-sim-v3 .ksim-tab .tab-label {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.01em;
            line-height: 1.25;
        }
        #typhon-sim-v3 .ksim-tab .tab-arrow {
            margin-left: auto;
            opacity: 0;
            transition: opacity .15s ease, transform .15s ease;
        }
        #typhon-sim-v3 .ksim-tab.active .tab-arrow { opacity: 1; transform: translateX(2px); }
        #typhon-sim-v3 .ksim-content { padding: 36px 40px; }
        #typhon-sim-v3 .ksim-pane { display: none; }
        #typhon-sim-v3 .ksim-pane.active { display: block; }
        #typhon-sim-v3 .ksim-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 4px 10px;
            border: 1px solid var(--green-900);
            color: var(--green-900);
            font-family: 'Nunito', Arial, sans-serif;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }
        #typhon-sim-v3 .ksim-badge::before { content: ""; width: 6px; height: 6px; background: var(--accent); display: block; }
        #typhon-sim-v3 .ksim-pane h3 {
            font-family: 'Science Gothic', Arial, sans-serif;
            font-size: clamp(22px, 2.4vw, 30px);
            font-weight: 700;
            color: var(--ink);
            line-height: 1.15;
            margin-bottom: 12px;
            letter-spacing: -0.015em;
        }
        #typhon-sim-v3 .ksim-pane > p {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.65;
            margin-bottom: 24px;
            max-width: 640px;
        }
        #typhon-sim-v3 .ksim-preview {
            position: relative;
            height: 180px;
            background:
                linear-gradient(135deg, transparent 49%, var(--green-100) 49%, var(--green-100) 51%, transparent 51%) 0 0/20px 20px,
                linear-gradient(45deg,  transparent 49%, var(--green-100) 49%, var(--green-100) 51%, transparent 51%) 0 0/20px 20px,
                var(--green-25);
            border: 1px solid var(--border);
            margin-bottom: 24px;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
        }
        #typhon-sim-v3 .ksim-preview::before {
            content: ""; position: absolute;
            top: 0; left: 0; width: 40px; height: 4px; background: var(--accent);
        }
        #typhon-sim-v3 .ksim-preview .preview-tag {
            position: absolute;
            top: 14px; right: 14px;
            background: #fff;
            border: 1px solid var(--border);
            padding: 6px 10px;
            font-family: 'Nunito', Arial, sans-serif;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: var(--green-900);
        }
        #typhon-sim-v3 .ksim-preview .preview-label {
            font-family: 'Science Gothic', Arial, sans-serif;
            font-size: 28px;
            font-weight: 800;
            color: var(--green-900);
            letter-spacing: -0.01em;
            text-align: center;
            opacity: 0.7;
        }
        #typhon-sim-v3 .ksim-specs {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }
        #typhon-sim-v3 .ksim-spec {
            padding: 16px 16px;
            background: #fff;
            border: 1px solid var(--border);
            border-top: 2px solid var(--green-900);
            transition: border-top-color .2s ease, transform .2s ease;
        }
        #typhon-sim-v3 .ksim-spec:hover { border-top-color: var(--accent); transform: translateY(-2px); }

        /* --- SIMULATOR: mobile/tablet stacking ---
           The default `300px 1fr` grid pushes the scenario content pane off-screen
           on narrow viewports. Below 760px, stack the tab rail above the content
           and let the tabs scroll horizontally so every scenario stays reachable. */
        @media (max-width: 760px) {
            #typhon-sim-v3 .ksim-body {
                grid-template-columns: 1fr;
                min-height: 0;
            }
            #typhon-sim-v3 .ksim-tabs {
                display: flex;
                flex-direction: row;
                border-right: none;
                border-bottom: 1px solid var(--border);
                overflow-x: auto;
                padding: 0;
            }
            #typhon-sim-v3 .ksim-tab {
                width: auto;
                flex: 0 0 auto;
                white-space: nowrap;
                border-left: none;
                border-bottom: 3px solid transparent;
            }
            #typhon-sim-v3 .ksim-tab.active {
                border-left-color: transparent;
                border-bottom-color: var(--accent);
            }
            #typhon-sim-v3 .ksim-tab .tab-arrow { display: none; }
            #typhon-sim-v3 .ksim-content { padding: 28px 22px; }
            
            /* Responsive specs grid - 2 columns on tablet/mobile */
            #typhon-sim-v3 .ksim-specs {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
            #typhon-sim-v3 .ksim-spec {
                padding: 12px 14px;
            }
        }

        @media (max-width: 480px) {
            /* Single column on smaller mobile devices */
            #typhon-sim-v3 .ksim-specs {
                grid-template-columns: 1fr;
                gap: 8px;
            }
        }
        /* --- THEME VARIABLES --- */
        #typhon-bento-final {
            box-sizing: border-box;
            --bn-bg: var(--green-50);
            --bn-text: var(--ink);
            --bn-sub: var(--muted);
            --bn-green: var(--green-900);
            --bn-overlay-grad: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 50%, rgba(0,0,0,0.95) 100%);
            --bn-gap: 24px;
            --bn-radius: 12px;
            
            background-color: var(--bn-bg);
            font-family: 'Nunito', Arial, sans-serif;
            color: var(--bn-text);
        }

        #typhon-bento-final * { box-sizing: border-box; }

        /* --- FILTER ROW --- */
        .bn-filters {
            display: flex;
            justify-content: flex-start;
            gap: 12px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }
        .bn-chip {
            background: var(--green-25);
            border: 1px solid var(--border);
            padding: 8px 20px;
            border-radius: 100px;
            font-family: 'Nunito', Arial, sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: var(--ink-2);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .bn-chip:hover {
            background: var(--green-50);
            border-color: var(--green-900);
            color: var(--green-900);
        }
        .bn-chip.active {
            background: var(--green-900);
            border-color: var(--green-900);
            color: white;
            box-shadow: 0 4px 10px rgba(18, 55, 42, 0.25);
        }

        /* --- 1:1 GRID LAYOUT --- */
        .bn-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-auto-rows: auto; 
            gap: var(--bn-gap);
        }

        /* TILE STYLES */
        .bn-tile {
            position: relative;
            border-radius: var(--bn-radius);
            overflow: hidden;
            cursor: zoom-in;
            background: #1a1a1a;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            
            /* FORCE 1/1 SQUARE RATIO */
            aspect-ratio: 1 / 1;
            width: 100%;
        }

        /* Reset spans */
        .bn-tile-1, .bn-tile-2, .bn-tile-3, 
        .bn-tile-4, .bn-tile-5, .bn-tile-6 { 
            grid-column: auto; 
            grid-row: auto; 
        }
        
        .bn-tile:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            z-index: 2;
        }

        /* Image Wrapper */
        .bn-img-wrap {
            width: 100%;
            height: 100%;
            transition: transform 0.6s ease;
        }
        .bn-tile:hover .bn-img-wrap { transform: scale(1.05); }

        /* The Image Itself */
        .bn-placeholder {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* --- OVERLAY & HOVER REVEAL --- */
        .bn-overlay {
            position: absolute;
            inset: 0;
            background: var(--bn-overlay-grad);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 24px;
            opacity: 0.9;
        }

        .bn-content-group {
            transform: translateY(10px);
            transition: transform 0.3s ease;
        }
        .bn-tile:hover .bn-content-group {
            transform: translateY(0);
        }

        .bn-cat {
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            color: #86efac;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
            display: block;
        }
        .bn-title {
            color: white;
            font-family: 'Science Gothic', Arial, Helvetica, sans-serif;
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 4px 0;
            line-height: 1.2;
        }

        /* The Description */
        .bn-desc {
            color: #d1d5db;
            font-size: 13px;
            line-height: 1.5;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, opacity 0.4s ease, margin-top 0.3s ease;
            margin-top: 0;
        }

        /* Reveal on Hover */
        .bn-tile:hover .bn-desc {
            max-height: 60px;
            opacity: 1;
            margin-top: 8px;
        }

        /* Mobile Responsive */
        @media (max-width: 900px) {
            .bn-grid {
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                gap: 16px;
                padding-bottom: 20px;
                grid-template-columns: none;
                grid-auto-rows: auto;
            }
            .bn-tile {
                flex: 0 0 85vw;
                width: 85vw; 
                height: 85vw; 
                scroll-snap-align: center;
            }
            .bn-desc {
                max-height: 60px;
                opacity: 1;
                margin-top: 8px;
            }
            .bn-content-group { transform: translateY(0); }
            
            .bn-filters {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 10px;
            }
            .bn-chip { flex-shrink: 0; }
        }

        /* --- LIGHTBOX --- */
        .bn-modal {
            position: fixed; inset: 0; background: rgba(0,0,0,0.95); z-index: 10000;
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none; transition: 0.3s;
            padding: 20px;
        }
        .bn-modal.active { opacity: 1; pointer-events: auto; }
        
        .bn-modal-card { width: 100%; max-width: 1000px; text-align: center; position: relative; }
        
        .bn-modal-img { 
            width: auto; max-width: 100%; max-height: 80vh; 
            border-radius: 4px; box-shadow: 0 0 50px rgba(0,0,0,0.5);
            object-fit: contain;
        }
        .bn-modal-info { color: white; margin-top: 20px; }
        .bn-modal-h3 { font-family: 'Science Gothic', Arial, Helvetica, sans-serif; font-size: 24px; margin: 0 0 8px 0; }
        .bn-modal-p { color: #ccc; font-size: 14px; max-width: 600px; margin: 0 auto; }
        .bn-close {
            position: absolute; top: -50px; right: 0;
            background: none; border: none; color: white; font-size: 36px; cursor: pointer;
        }
        .bn-tile.hidden { display: none; }
        #typhon-bento-final .kbento-modal-card {
            background: #fff;
            max-width: 720px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            border: 1px solid var(--green-900);
            border-top: 5px solid var(--accent);
            position: relative;
            box-shadow: 0 40px 80px -20px rgba(0, 0, 0, 0.5);
        }
        #typhon-bento-final .kbento-modal-close {
            position: absolute;
            top: 14px; right: 14px;
            width: 36px; height: 36px;
            background: #fff;
            border: 1px solid var(--border);
            color: var(--ink);
            cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            transition: background .15s ease, color .15s ease, border-color .15s ease;
            z-index: 2;
        }
        #typhon-bento-final .kbento-modal-close:hover {
            background: var(--green-900); color: #fff; border-color: var(--green-900);
        }
        #typhon-bento-final .kbento-modal img {
            width: 100%; max-height: 380px; object-fit: cover; display: block;
        }
        #typhon-bento-final .kbento-modal-body { padding: 28px 32px 32px; }
        #typhon-bento-final .kbento-modal-cat {
            font-family: 'Nunito', Arial, sans-serif;
            font-size: 11px;
            font-weight: 800;
            color: var(--accent);
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-bottom: 10px;
            display: inline-flex; align-items: center; gap: 8px;
        }
        #typhon-bento-final .kbento-modal-cat::before { content: ""; width: 6px; height: 6px; background: var(--accent); display: block; }
        #typhon-bento-final .kbento-modal-body h3 {
            font-family: 'Science Gothic', Arial, sans-serif;
            font-size: clamp(20px, 2.2vw, 28px);
            font-weight: 700;
            color: var(--green-900);
            line-height: 1.15;
            margin-bottom: 14px;
            letter-spacing: -0.015em;
        }
        #typhon-bento-final .kbento-modal-body p {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
        }

        @media (max-width: 980px) {
            #typhon-bento-final .kbento-grid { grid-template-columns: repeat(2, 1fr); grid-auto-rows: 180px; }
            #typhon-bento-final .kbento-tile.featured { grid-column: span 2; grid-row: span 1; }
            #typhon-bento-final .kbento-tile.wide { grid-column: span 2; }
        }
        @media (max-width: 560px) {
            #typhon-bento-final .kbento-grid { grid-template-columns: 1fr; grid-auto-rows: 200px; }
            #typhon-bento-final .kbento-tile,
            #typhon-bento-final .kbento-tile.featured,
            #typhon-bento-final .kbento-tile.wide { grid-column: span 1; grid-row: span 1; }
            #typhon-bento-final .kbento-modal-body { padding: 22px 22px 26px; }
        }
    </style>
</head>
<body>

@include('partials.header')

{{-- ════════════════════════════════════════════════════════════════════
     1. HERO
══════════════════════════════════════════════════════════════════ --}}
<section class="home-hero">
    <div class="home-wrap">
        <div class="home-hero-grid">

            <div>
                <span class="home-eyebrow">KUVUO · Heavy Equipment</span>

                <h1>
                    <span class="accent-bar"></span><br>
                    Ready for <span class="accent">real work.</span>
                </h1>

                <p class="lead">
                    Mini excavators, skid steers, loaders, forklifts and attachments
                    sized for the projects you actually run — not corporate fleet rentals.
                    Real specs on every product, real people on the quote line.
                </p>

                <div class="home-hero-ctas">
                    <a href="{{ route('shop') }}" class="btn btn-primary">
                        Browse Equipment
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                            <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"/>
                        </svg>
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline">Request a Quote</a>
                </div>

                <div class="home-hero-trust">
                    <div>
                        <strong>140+</strong>
                        <span>Catalog SKUs</span>
                    </div>
                    <div>
                        <strong>7</strong>
                        <span>Equipment Categories</span>
                    </div>
                    <div>
                        <strong>USA</strong>
                        <span>Ecwid Checkout</span>
                    </div>
                </div>
            </div>

            <div class="home-hero-visual">
                <img
                    src="https://lightcoral-dove-757536.hostingersite.com/wp-content/uploads/2026/05/Kuvuo-scaled.webp"
                    alt="TYPHON KUVUO mini excavator on a worksite"
                    loading="eager"
                    onerror="this.src='https://placehold.co/720x500/EEF5F0/12372A?text=Heavy+Equipment'"
                >
                <div class="home-hero-spec s1">
                    <span class="lbl">Weight Class</span>
                    <span class="val">0.8 – 2.5 T</span>
                </div>
                <div class="home-hero-spec s2">
                    <span class="lbl">Quick-Hitch</span>
                    <span class="val">TYPHON Coupler</span>
                </div>
            </div>

        </div>
    </div>

    {{-- Dark green spec strip — full-width within the hero --}}
    <div class="home-hero-strip">
        <div>
            <div class="strip-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 20h18M5 20v-6h14v6M7 14V8h10v6M9 8V4h6v4"/></svg>
            </div>
            <div class="strip-text">Worksite<br>Ready</div>
        </div>
        <div>
            <div class="strip-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M4 4h16v6H4z M4 14h16v6H4z M7 7h2 M7 17h2"/></svg>
            </div>
            <div class="strip-text">Ownership<br>Support</div>
        </div>
        <div>
            <div class="strip-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M4 5h16v11H8l-4 4z M8 9h8 M8 12h5"/></svg>
            </div>
            <div class="strip-text">Quote<br>Assistance</div>
        </div>
        <div>
            <div class="strip-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 6h18v14H3z M3 10h18 M7 6V3h10v3"/></svg>
            </div>
            <div class="strip-text">Equipment<br>Catalog</div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════════════
     2. EQUIPMENT CATEGORIES — premium square card grid (directly below hero)
══════════════════════════════════════════════════════════════════ --}}
<section id="equipment-categories" class="home-category-section" aria-label="Browse equipment by category">
    <div class="home-wrap">

        <div class="home-category-head">
            <span class="home-category-label">Browse by Category</span>
            <h2>Machinery for Every Jobsite</h2>
            <p>Explore compact and heavy equipment built for excavation, loading, lifting, warehouse work, road work, and site access.</p>
        </div>

        <div class="home-cat-grid">

            {{-- 1. Mini Excavators --}}
            <a href="{{ route('shop.category', 'mini-excavators') }}" class="home-cat-card" aria-label="Browse Mini Excavators">
                <div class="home-cat-media">
                    <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_16_51-AM.png"
                         alt="Mini Excavators"
                         loading="lazy"
                         onerror="this.src='https://placehold.co/560x420/F6FAF7/12372A?text=Mini+Excavators'">
                </div>
                <div class="home-cat-content">
                    <div class="home-cat-copy">
                        <div class="home-cat-count">42 products</div>
                        <h3>Mini Excavators</h3>
                        <p class="home-cat-line">Compact digging and trenching</p>
                    </div>
                    <span class="home-cat-arrow" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3 9h11M9 4l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="square" stroke-linejoin="miter"/>
                        </svg>
                    </span>
                </div>
            </a>

            {{-- 2. Skid Steer Loaders --}}
            <a href="{{ route('shop.category', 'skid-steer-loader') }}" class="home-cat-card" aria-label="Browse Skid Steer Loaders">
                <div class="home-cat-media">
                    <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_24_42-AM.png"
                         alt="Skid Steer Loaders"
                         loading="lazy"
                         onerror="this.src='https://placehold.co/560x420/F6FAF7/12372A?text=Skid+Steer+Loaders'">
                </div>
                <div class="home-cat-content">
                    <div class="home-cat-copy">
                        <div class="home-cat-count">12 products</div>
                        <h3>Skid Steer Loaders</h3>
                        <p class="home-cat-line">Loading, grading and tool changes</p>
                    </div>
                    <span class="home-cat-arrow" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3 9h11M9 4l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="square" stroke-linejoin="miter"/>
                        </svg>
                    </span>
                </div>
            </a>

            {{-- 3. Wheel Loaders --}}
            <a href="{{ route('shop.category', 'wheel-loaders') }}" class="home-cat-card" aria-label="Browse Wheel Loaders">
                <div class="home-cat-media">
                    <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_16_42-AM.png"
                         alt="Wheel Loaders"
                         loading="lazy"
                         onerror="this.src='https://placehold.co/560x420/F6FAF7/12372A?text=Wheel+Loaders'">
                </div>
                <div class="home-cat-content">
                    <div class="home-cat-copy">
                        <div class="home-cat-count">3 products</div>
                        <h3>Wheel Loaders</h3>
                        <p class="home-cat-line">Bulk material movement</p>
                    </div>
                    <span class="home-cat-arrow" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3 9h11M9 4l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="square" stroke-linejoin="miter"/>
                        </svg>
                    </span>
                </div>
            </a>

            {{-- 4. Forklifts --}}
            <a href="{{ route('shop.category', 'forklift') }}" class="home-cat-card" aria-label="Browse Forklifts">
                <div class="home-cat-media">
                    <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_16_55-AM.png"
                         alt="Forklifts"
                         loading="lazy"
                         onerror="this.src='https://placehold.co/560x420/F6FAF7/12372A?text=Forklifts'">
                </div>
                <div class="home-cat-content">
                    <div class="home-cat-copy">
                        <div class="home-cat-count">3 products</div>
                        <h3>Forklifts</h3>
                        <p class="home-cat-line">Warehouse and yard handling</p>
                    </div>
                    <span class="home-cat-arrow" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3 9h11M9 4l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="square" stroke-linejoin="miter"/>
                        </svg>
                    </span>
                </div>
            </a>

            {{-- 5. Road Rollers --}}
            <a href="{{ route('shop.category', 'mini-road-roller') }}" class="home-cat-card" aria-label="Browse Road Rollers">
                <div class="home-cat-media">
                    <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_16_45-AM.png"
                         alt="Road Rollers"
                         loading="lazy"
                         onerror="this.src='https://placehold.co/560x420/F6FAF7/12372A?text=Road+Rollers'">
                </div>
                <div class="home-cat-content">
                    <div class="home-cat-copy">
                        <div class="home-cat-count">5 products</div>
                        <h3>Road Rollers</h3>
                        <p class="home-cat-line">Asphalt and sub-base compaction</p>
                    </div>
                    <span class="home-cat-arrow" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3 9h11M9 4l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="square" stroke-linejoin="miter"/>
                        </svg>
                    </span>
                </div>
            </a>

            {{-- 6. Scissor Lifts --}}
            <a href="{{ route('shop.category', 'scissor-lifts') }}" class="home-cat-card" aria-label="Browse Scissor Lifts">
                <div class="home-cat-media">
                    <img src="https://machinery.org/wp-content/uploads/2026/04/ChatGPT-Image-Apr-28-2026-10_17_05-AM.png"
                         alt="Scissor Lifts"
                         loading="lazy"
                         onerror="this.src='https://placehold.co/560x420/F6FAF7/12372A?text=Scissor+Lifts'">
                </div>
                <div class="home-cat-content">
                    <div class="home-cat-copy">
                        <div class="home-cat-count">3 products</div>
                        <h3>Scissor Lifts</h3>
                        <p class="home-cat-line">Stable elevated access</p>
                    </div>
                    <span class="home-cat-arrow" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M3 9h11M9 4l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="square" stroke-linejoin="miter"/>
                        </svg>
                    </span>
                </div>
            </a>

        </div>{{-- .home-cat-grid --}}

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════════════
     3. USE CASES — editorial: feature panel + small cards
══════════════════════════════════════════════════════════════════ --}}
<section class="home-section soft">
    <div class="home-wrap">

        <div class="home-section-head">
            <span class="home-eyebrow">What These Machines Do</span>
            <h2><span class="accent-line"></span>One compact machine. Real worksite work.</h2>
            <p>Built around the jobs small contractors, landscapers and property owners actually face — not edge-case fleet scenarios.</p>
        </div>

        <div class="home-uc-editorial">

            {{-- Feature panel --}}
            <div class="home-uc-feature">
                <div>
                    <span class="badge">Featured Capability</span>
                    <h3>Built for real worksites — from residential lots to working farms.</h3>
                    <p>
                        KUVUO compact machines are designed for the in-between work full-size
                        equipment can't reach: tight-access digs, drainage runs, fence line
                        clearing, gravel work and finish grading. One platform, one quick-hitch,
                        many billable jobs.
                    </p>
                </div>

                <div class="stat-row">
                    <div>
                        <strong>0.8–2.5 T</strong>
                        <span>Operating weight class</span>
                    </div>
                    <div>
                        <strong>6+</strong>
                        <span>Compatible attachment types</span>
                    </div>
                </div>
            </div>

            {{-- Small use-case grid --}}
            <div class="home-uc-grid">

                <div class="home-uc-card">
                    <span class="uc-num">USE · 01</span>
                    <h4>Excavation &amp; Trenching</h4>
                    <p>Footings, utility trenches, drainage runs and small foundations.</p>
                </div>

                <div class="home-uc-card">
                    <span class="uc-num">USE · 02</span>
                    <h4>Loading &amp; Material Handling</h4>
                    <p>Move dirt, gravel, mulch and debris between trucks and stockpiles.</p>
                </div>

                <div class="home-uc-card">
                    <span class="uc-num">USE · 03</span>
                    <h4>Farmland &amp; Property</h4>
                    <p>Brush clearing, irrigation lines, fence post setting and land reshaping.</p>
                </div>

                <div class="home-uc-card">
                    <span class="uc-num">USE · 04</span>
                    <h4>Road &amp; Driveway Work</h4>
                    <p>Shoulder cuts, driveway leveling, sub-base prep and patch repairs.</p>
                </div>

                <div class="home-uc-card">
                    <span class="uc-num">USE · 05</span>
                    <h4>Desilting &amp; Drainage</h4>
                    <p>Clear ditches and culverts, maintain field drainage to keep water moving.</p>
                </div>

                <div class="home-uc-card">
                    <span class="uc-num">USE · 06</span>
                    <h4>Small Construction</h4>
                    <p>Site prep, backfill, landscaping and finish-grade for residential builds.</p>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════════════
     3. MACHINE CAPABILITY — technical rows
══════════════════════════════════════════════════════════════════ --}}
<section class="home-section">
    <div class="home-wrap">

        <div class="home-section-head">
            <span class="home-eyebrow">Machine Capability</span>
            <h2><span class="accent-line"></span>Built around the operating envelope you'll actually use.</h2>
            <p>Each KUVUO platform is specified for the work most buyers run day-to-day — no oversized hydraulics, no missing essentials.</p>
        </div>

        <div class="home-cap-frame">

            <div class="home-cap-row">
                <div class="cap-num">01<small>CAP</small></div>
                <div class="cap-title">Excavation</div>
                <div class="cap-desc">Dig trenches, footings, drainage runs and small foundations across compact and standard weight classes.</div>
                <div class="cap-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M2 19h14M3 19v-3h12v3M5 16v-3h8v3M7 13l-2-4 4-2 2 4M11 7l3-1 4 6"/></svg>
                </div>
            </div>

            <div class="home-cap-row">
                <div class="cap-num">02<small>CAP</small></div>
                <div class="cap-title">Loading</div>
                <div class="cap-desc">Bucket and grapple cycles for moving material between piles, trucks and grade with controlled lift response.</div>
                <div class="cap-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 18h18M5 18v-5h14v5M8 13V9h8v4M10 9V6h4v3"/></svg>
                </div>
            </div>

            <div class="home-cap-row">
                <div class="cap-num">03<small>CAP</small></div>
                <div class="cap-title">Lifting Support</div>
                <div class="cap-desc">Rated lift cycles for material handling, pipe runs and structural members within the documented load chart.</div>
                <div class="cap-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M12 3v18M5 8l7-5 7 5M8 21h8M6 12h12"/></svg>
                </div>
            </div>

            <div class="home-cap-row">
                <div class="cap-num">04<small>CAP</small></div>
                <div class="cap-title">Maintenance Access</div>
                <div class="cap-desc">Service points placed for ground-level daily checks — fluids, fasteners and filters without removing panels.</div>
                <div class="cap-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M14 7l3-3 3 3-3 3z M5 18l8-8 3 3-8 8z M5 18v3h3M14 7l-9 9"/></svg>
                </div>
            </div>

            <div class="home-cap-row">
                <div class="cap-num">05<small>CAP</small></div>
                <div class="cap-title">Attachment-Ready Work</div>
                <div class="cap-desc">Quick-hitch coupler matches the full TYPHON tool line — bucket, ripper, auger, grapple, breaker.</div>
                <div class="cap-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M4 14l4-8h8l4 8M4 14h16v6H4z M9 14v6M15 14v6"/></svg>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════════════
     3b. WORKSITE SIMULATION  (interactive scenarios)
══════════════════════════════════════════════════════════════════ --}}
<section id="typhon-sim-v3" class="home-section soft">
    <div class="home-wrap">

        <div class="home-section-head">
            <span class="home-eyebrow">KUVUO Worksite Simulation</span>
            <h2><span class="accent-line"></span>See how KUVUO fits real jobsites.</h2>
            <p>Click through common scenarios — trenching, grading, farm work, loading and tight-space digging — to see how each machine handles the work.</p>
        </div>

        <div class="ksim-card">

            {{-- Header strip --}}
            <div class="ksim-header">
                <span class="ksim-mode">Scenario Mode</span>
                <span class="ksim-title">KUVUO · Interactive Worksite Sim</span>
            </div>

            <div class="ksim-body">

                {{-- Sidebar tabs (industrial control buttons) --}}
                <div class="ksim-tabs" role="tablist" aria-label="Worksite scenarios">

                    <button type="button" class="ksim-tab active" data-sim-tab="trenching" role="tab" aria-selected="true">
                        <span class="tab-num">01</span>
                        <span class="tab-label">Utility Trenching</span>
                        <span class="tab-arrow">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M3 7h8M8 4l3 3-3 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"/></svg>
                        </span>
                    </button>

                    <button type="button" class="ksim-tab" data-sim-tab="grading" role="tab" aria-selected="false">
                        <span class="tab-num">02</span>
                        <span class="tab-label">Driveway &amp; Lot Grading</span>
                        <span class="tab-arrow">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M3 7h8M8 4l3 3-3 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"/></svg>
                        </span>
                    </button>

                    <button type="button" class="ksim-tab" data-sim-tab="farm" role="tab" aria-selected="false">
                        <span class="tab-num">03</span>
                        <span class="tab-label">Farm &amp; Property Work</span>
                        <span class="tab-arrow">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M3 7h8M8 4l3 3-3 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"/></svg>
                        </span>
                    </button>

                    <button type="button" class="ksim-tab" data-sim-tab="loading" role="tab" aria-selected="false">
                        <span class="tab-num">04</span>
                        <span class="tab-label">Pallet &amp; Material Loading</span>
                        <span class="tab-arrow">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M3 7h8M8 4l3 3-3 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"/></svg>
                        </span>
                    </button>

                    <button type="button" class="ksim-tab" data-sim-tab="tight" role="tab" aria-selected="false">
                        <span class="tab-num">05</span>
                        <span class="tab-label">Tight-Space Excavation</span>
                        <span class="tab-arrow">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M3 7h8M8 4l3 3-3 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"/></svg>
                        </span>
                    </button>

                    <button type="button" class="ksim-tab" data-sim-tab="drainage" role="tab" aria-selected="false">
                        <span class="tab-num">06</span>
                        <span class="tab-label">Drainage &amp; Ditch Work</span>
                        <span class="tab-arrow">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M3 7h8M8 4l3 3-3 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="square"/></svg>
                        </span>
                    </button>

                </div>

                {{-- Content panes --}}
                <div class="ksim-content">

                    {{-- Pane 01: Utility Trenching --}}
                    <div class="ksim-pane active" data-sim-pane="trenching" role="tabpanel">
                        <span class="ksim-badge">Scenario · 01</span>
                        <h3>Utility trenching across residential lots.</h3>
                        <p>Compact mini excavator with a narrow trenching bucket handles water lines, electrical conduit, and small drainage runs without tearing up the rest of the yard.</p>

                        <div class="ksim-preview" aria-hidden="true">
                            <span class="preview-tag">Worksite Preview</span>
                            <span class="preview-label">// UTILITY TRENCH //</span>
                        </div>

                        <div class="ksim-specs">
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 12l4-4 4 4 4-4 4 4M3 12v6h18v-6"/></svg></div>
                                <div class="ks-label">Best For</div>
                                <div class="ks-value">Narrow utility &amp; drainage trenches</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><circle cx="12" cy="8" r="3"/><path d="M5 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v2"/></svg></div>
                                <div class="ks-label">Operator Focus</div>
                                <div class="ks-value">Trench line precision &amp; depth</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M4 14l4-8h8l4 8M4 14h16v6H4z"/></svg></div>
                                <div class="ks-label">Attachment Match</div>
                                <div class="ks-value">200–400 mm narrow bucket</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 20h18M5 20V8h4v12M9 20V4h6v16M15 20v-8h4v8"/></svg></div>
                                <div class="ks-label">Site Condition</div>
                                <div class="ks-value">Residential, soft to firm soil</div>
                            </div>
                        </div>

                        <div class="ksim-note">
                            <span class="note-tag">Caution</span>
                            <span>Always call before you dig. Confirm utility locates before any trenching work, especially near older properties.</span>
                        </div>
                    </div>

                    {{-- Pane 02: Driveway & Lot Grading --}}
                    <div class="ksim-pane" data-sim-pane="grading" role="tabpanel">
                        <span class="ksim-badge">Scenario · 02</span>
                        <h3>Driveway and lot grading to finish-grade.</h3>
                        <p>Skid steer with a wide leveling bucket or grader attachment cuts shoulders, levels gravel and brings driveways back to flat without re-spreading the whole base layer.</p>

                        <div class="ksim-preview" aria-hidden="true">
                            <span class="preview-tag">Worksite Preview</span>
                            <span class="preview-label">// FINISH GRADING //</span>
                        </div>

                        <div class="ksim-specs">
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 12l4-4 4 4 4-4 4 4M3 12v6h18v-6"/></svg></div>
                                <div class="ks-label">Best For</div>
                                <div class="ks-value">Gravel drives, sub-base prep</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><circle cx="12" cy="8" r="3"/><path d="M5 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v2"/></svg></div>
                                <div class="ks-label">Operator Focus</div>
                                <div class="ks-value">Even passes, watch material loss</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M4 14l4-8h8l4 8M4 14h16v6H4z"/></svg></div>
                                <div class="ks-label">Attachment Match</div>
                                <div class="ks-value">Leveling bucket / rake</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 20h18M5 20V8h4v12M9 20V4h6v16M15 20v-8h4v8"/></svg></div>
                                <div class="ks-label">Site Condition</div>
                                <div class="ks-value">Open lots, mild slope</div>
                            </div>
                        </div>

                        <div class="ksim-note">
                            <span class="note-tag">Operator Tip</span>
                            <span>Make slow, overlapping passes. Aggressive single passes leave high spots that have to be re-worked anyway.</span>
                        </div>
                    </div>

                    {{-- Pane 03: Farm & Property Work --}}
                    <div class="ksim-pane" data-sim-pane="farm" role="tabpanel">
                        <span class="ksim-badge">Scenario · 03</span>
                        <h3>Farm and property work, season after season.</h3>
                        <p>Compact platforms handle brush clearing, fence post setting, irrigation lines and small reshaping without the transport overhead of full-size equipment.</p>

                        <div class="ksim-preview" aria-hidden="true">
                            <span class="preview-tag">Worksite Preview</span>
                            <span class="preview-label">// FARM &amp; PROPERTY //</span>
                        </div>

                        <div class="ksim-specs">
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 12l4-4 4 4 4-4 4 4M3 12v6h18v-6"/></svg></div>
                                <div class="ks-label">Best For</div>
                                <div class="ks-value">Brush, fence, irrigation runs</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><circle cx="12" cy="8" r="3"/><path d="M5 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v2"/></svg></div>
                                <div class="ks-label">Operator Focus</div>
                                <div class="ks-value">Ground awareness, irrigation lines</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M4 14l4-8h8l4 8M4 14h16v6H4z"/></svg></div>
                                <div class="ks-label">Attachment Match</div>
                                <div class="ks-value">Auger, grapple, post-hole tools</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 20h18M5 20V8h4v12M9 20V4h6v16M15 20v-8h4v8"/></svg></div>
                                <div class="ks-label">Site Condition</div>
                                <div class="ks-value">Mixed terrain, open pasture</div>
                            </div>
                        </div>

                        <div class="ksim-note">
                            <span class="note-tag">Caution</span>
                            <span>Watch for buried irrigation, fence anchors and rock pockets. Slow approach on soft soil to avoid track sink.</span>
                        </div>
                    </div>

                    {{-- Pane 04: Pallet & Material Loading --}}
                    <div class="ksim-pane" data-sim-pane="loading" role="tabpanel">
                        <span class="ksim-badge">Scenario · 04</span>
                        <h3>Pallet handling and material loading.</h3>
                        <p>Forklift or compact loader with pallet forks moves stock between trucks, stockpiles and storage areas with controlled lift cycles within the rated load chart.</p>

                        <div class="ksim-preview" aria-hidden="true">
                            <span class="preview-tag">Worksite Preview</span>
                            <span class="preview-label">// LOAD / UNLOAD //</span>
                        </div>

                        <div class="ksim-specs">
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 12l4-4 4 4 4-4 4 4M3 12v6h18v-6"/></svg></div>
                                <div class="ks-label">Best For</div>
                                <div class="ks-value">Pallets, gravel, mulch handling</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><circle cx="12" cy="8" r="3"/><path d="M5 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v2"/></svg></div>
                                <div class="ks-label">Operator Focus</div>
                                <div class="ks-value">Load chart, lift travel arc</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M4 14l4-8h8l4 8M4 14h16v6H4z"/></svg></div>
                                <div class="ks-label">Attachment Match</div>
                                <div class="ks-value">Pallet forks, grapple bucket</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 20h18M5 20V8h4v12M9 20V4h6v16M15 20v-8h4v8"/></svg></div>
                                <div class="ks-label">Site Condition</div>
                                <div class="ks-value">Yards, warehouses, level ground</div>
                            </div>
                        </div>

                        <div class="ksim-note">
                            <span class="note-tag">Reminder</span>
                            <span>Stay within the rated load chart. Lift heights and arm extension both affect safe operating capacity.</span>
                        </div>
                    </div>

                    {{-- Pane 05: Tight-Space Excavation --}}
                    <div class="ksim-pane" data-sim-pane="tight" role="tabpanel">
                        <span class="ksim-badge">Scenario · 05</span>
                        <h3>Tight-space excavation in urban backyards.</h3>
                        <p>0.8–1.5 t platforms with a tail-swing aware design fit through gates and around landscaping that full-size equipment can't get near.</p>

                        <div class="ksim-preview" aria-hidden="true">
                            <span class="preview-tag">Worksite Preview</span>
                            <span class="preview-label">// TIGHT-ACCESS //</span>
                        </div>

                        <div class="ksim-specs">
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 12l4-4 4 4 4-4 4 4M3 12v6h18v-6"/></svg></div>
                                <div class="ks-label">Best For</div>
                                <div class="ks-value">Backyard digs, gate-access work</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><circle cx="12" cy="8" r="3"/><path d="M5 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v2"/></svg></div>
                                <div class="ks-label">Operator Focus</div>
                                <div class="ks-value">Swing radius, structure clearance</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M4 14l4-8h8l4 8M4 14h16v6H4z"/></svg></div>
                                <div class="ks-label">Attachment Match</div>
                                <div class="ks-value">Standard digging bucket, breaker</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 20h18M5 20V8h4v12M9 20V4h6v16M15 20v-8h4v8"/></svg></div>
                                <div class="ks-label">Site Condition</div>
                                <div class="ks-value">Confined access, structures nearby</div>
                            </div>
                        </div>

                        <div class="ksim-note">
                            <span class="note-tag">Caution</span>
                            <span>Survey the swing path first. Even compact platforms can clip fences, hose bibs and AC units behind the operator.</span>
                        </div>
                    </div>

                    {{-- Pane 06: Drainage & Ditch Work --}}
                    <div class="ksim-pane" data-sim-pane="drainage" role="tabpanel">
                        <span class="ksim-badge">Scenario · 06</span>
                        <h3>Drainage and ditch maintenance after rainy seasons.</h3>
                        <p>Mini excavator with a narrow bucket clears silt from field ditches, reopens culverts and keeps drainage runs flowing without disturbing fence lines or pasture.</p>

                        <div class="ksim-preview" aria-hidden="true">
                            <span class="preview-tag">Worksite Preview</span>
                            <span class="preview-label">// DITCH &amp; DRAIN //</span>
                        </div>

                        <div class="ksim-specs">
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 12l4-4 4 4 4-4 4 4M3 12v6h18v-6"/></svg></div>
                                <div class="ks-label">Best For</div>
                                <div class="ks-value">Silt clearing, ditch reshaping</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><circle cx="12" cy="8" r="3"/><path d="M5 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v2"/></svg></div>
                                <div class="ks-label">Operator Focus</div>
                                <div class="ks-value">Even depth, controlled spoil placement</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M4 14l4-8h8l4 8M4 14h16v6H4z"/></svg></div>
                                <div class="ks-label">Attachment Match</div>
                                <div class="ks-value">Narrow bucket or ditching bucket</div>
                            </div>
                            <div class="ksim-spec">
                                <div class="ks-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M3 20h18M5 20V8h4v12M9 20V4h6v16M15 20v-8h4v8"/></svg></div>
                                <div class="ks-label">Site Condition</div>
                                <div class="ks-value">Saturated soil, ditch lines</div>
                            </div>
                        </div>

                        <div class="ksim-note">
                            <span class="note-tag">Operator Tip</span>
                            <span>Place spoil on the downhill side so it can be spread or hauled. Avoid working tracks on saturated soil where possible.</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════════════
     5. OPERATION CONFIDENCE — editorial split with checklist
══════════════════════════════════════════════════════════════════ --}}
<section class="home-section">
    <div class="home-wrap">
        <div class="home-op-split">

            <div class="home-op-text">
                <span class="home-eyebrow">Operation Confidence</span>
                <h2>Supports safer operation — when used, inspected and maintained correctly.</h2>
                <p>
                    The machine does the lifting. Trained operators, daily checks and worksite
                    awareness do the rest. Every KUVUO platform is documented with the procedures
                    that make safe operation repeatable.
                </p>
                <div class="home-op-quote">
                    <strong>Recommendation —</strong> read the full operation manual before first
                    use, and any time a new operator joins the crew. Three things matter most:
                    pre-start checks, slope and transport procedure, and clear sight lines.
                </div>
            </div>

            <div class="home-op-checklist">

                <div class="home-op-item">
                    <div class="check">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M2 7l3 3 7-7"/></svg>
                    </div>
                    <div>
                        <h4>Trained operators</h4>
                        <p>Manufacturer-recommended training and a read-through of the full product manual before first use.</p>
                    </div>
                </div>

                <div class="home-op-item">
                    <div class="check">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M2 7l3 3 7-7"/></svg>
                    </div>
                    <div>
                        <h4>Daily pre-start inspection</h4>
                        <p>Hydraulic levels, track tension, fasteners, control response and warning lights — five-minute walk-around.</p>
                    </div>
                </div>

                <div class="home-op-item">
                    <div class="check">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M2 7l3 3 7-7"/></svg>
                    </div>
                    <div>
                        <h4>Worksite awareness</h4>
                        <p>Sight lines, swing radius, overhead utilities and bystanders cleared before any swing or travel.</p>
                    </div>
                </div>

                <div class="home-op-item">
                    <div class="check">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true"><path d="M2 7l3 3 7-7"/></svg>
                    </div>
                    <div>
                        <h4>Slope &amp; transport procedure</h4>
                        <p>Documented angle limits, tie-down points and ramp procedures whenever the machine moves on or off site.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════════════
     5b. SITE-PROVEN PERFORMANCE (filtered bento gallery + modal)
══════════════════════════════════════════════════════════════════ --}}
<section id="typhon-bento-final" class="home-section softer">
    <div class="home-wrap">
        
        <div class="home-section-head">
            <span class="home-eyebrow">Site-Proven Performance</span>
            <h2><span class="accent-line"></span>KUVUO in real worksite conditions.</h2>
            <p>Real-world capability. Hover over any scene to see how the KUVUO 4.0 handles essential tasks.</p>
        </div>

        <div class="bn-filters">
            <button class="bn-chip active" onclick="filterBento('all', this)">All Views</button>
            <button class="bn-chip" onclick="filterBento('construction', this)">Construction</button>
            <button class="bn-chip" onclick="filterBento('farm', this)">Farm & Ranch</button>
            <button class="bn-chip" onclick="filterBento('landscaping', this)">Landscaping</button>
        </div>

        <div class="bn-grid">
            
            <div class="bn-tile bn-tile-1" data-cat="construction" onclick="openBnModal(0)">
                <div class="bn-img-wrap">
                    <img src="https://assets.zyrosite.com/A0xVwPgWDeTJ77B6/kuvuo-trenching-uUhgQSzbAS88ksvz.png" 
                         class="bn-placeholder" alt="Utility Trenching">
                </div>
                <div class="bn-overlay">
                    <div class="bn-content-group">
                        <span class="bn-cat">Construction</span>
                        <h3 class="bn-title">Utility Trenching</h3>
                        <p class="bn-desc">Precision digging for residential lines using the offset boom to stay parallel to walls.</p>
                    </div>
                </div>
            </div>

            <div class="bn-tile bn-tile-2" data-cat="construction" onclick="openBnModal(1)">
                <div class="bn-img-wrap">
                    <img src="https://assets.zyrosite.com/A0xVwPgWDeTJ77B6/kuvuo-tight-cornor-dig-Bdd5C0Dsj99QgHRx.png" 
                         class="bn-placeholder" alt="Tight Corner Dig">
                </div>
                <div class="bn-overlay">
                    <div class="bn-content-group">
                        <span class="bn-cat">Construction</span>
                        <h3 class="bn-title">Tight Corner Dig</h3>
                        <p class="bn-desc">Zero tail swing allows safe rotation in confined corners where standard machines can't fit.</p>
                    </div>
                </div>
            </div>

            <div class="bn-tile bn-tile-3" data-cat="construction" onclick="openBnModal(2)">
                <div class="bn-img-wrap">
                    <img src="https://assets.zyrosite.com/A0xVwPgWDeTJ77B6/kuvuo-truck-4u7YkJUpz7Df0Q7p.png" 
                         class="bn-placeholder" alt="Trailer Loading">
                </div>
                <div class="bn-overlay">
                    <div class="bn-content-group">
                        <span class="bn-cat">Logistics</span>
                        <h3 class="bn-title">Trailer Loading</h3>
                        <p class="bn-desc">High dump height makes loading debris into standard dump trailers quick and efficient.</p>
                    </div>
                </div>
            </div>

            <div class="bn-tile bn-tile-4" data-cat="landscaping" onclick="openBnModal(3)">
                <div class="bn-img-wrap">
                    <img src="https://assets.zyrosite.com/A0xVwPgWDeTJ77B6/kuvuo-grading-ZStCM1rbgY3EgMCM.png" 
                         class="bn-placeholder" alt="Finish Grading">
                </div>
                <div class="bn-overlay">
                    <div class="bn-content-group">
                        <span class="bn-cat">Landscaping</span>
                        <h3 class="bn-title">Finish Grading</h3>
                        <p class="bn-desc">Sensitive hydraulic control allows for smooth back-dragging and leveling of topsoil.</p>
                    </div>
                </div>
            </div>

            <div class="bn-tile bn-tile-5" data-cat="farm" onclick="openBnModal(4)">
                <div class="bn-img-wrap">
                    <img src="https://assets.zyrosite.com/A0xVwPgWDeTJ77B6/kuvuo-irrigation-ditch_-0AgUbdvl0Kw9rkmm.png" 
                         class="bn-placeholder" alt="Irrigation Ditch">
                </div>
                <div class="bn-overlay">
                    <div class="bn-content-group">
                        <span class="bn-cat">Agriculture</span>
                        <h3 class="bn-title">Irrigation Ditch</h3>
                        <p class="bn-desc">Metal tracks provide superior traction in muddy agricultural fields and wet soil.</p>
                    </div>
                </div>
            </div>

            <div class="bn-tile bn-tile-6" data-cat="farm" onclick="openBnModal(5)">
                <div class="bn-img-wrap">
                    <img src="https://assets.zyrosite.com/A0xVwPgWDeTJ77B6/dusk-operation-r57Ky14IQaNJdaL8.png" 
                         class="bn-placeholder" alt="Dusk Operations">
                </div>
                <div class="bn-overlay">
                    <div class="bn-content-group">
                        <span class="bn-cat">All-Weather</span>
                        <h3 class="bn-title">Dusk Operations</h3>
                        <p class="bn-desc">Powerful LED boom lights illuminate the bucket area, extending productivity into the night.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="bn-modal" id="bnModal" onclick="closeBnModal()">
        <div class="bn-modal-card" onclick="event.stopPropagation()">
            <button class="bn-close" onclick="closeBnModal()">×</button>
            <div id="bnModalInject"></div>
            <div class="bn-modal-info">
                <h3 class="bn-modal-h3" id="bnModalTitle">Title</h3>
                <p class="bn-modal-p" id="bnModalDesc">Description text.</p>
            </div>
        </div>
    </div>

</section>

{{-- ════════════════════════════════════════════════════════════════════
     6. VIDEO SECTION
══════════════════════════════════════════════════════════════════ --}}
<section class="home-section">
    <div class="home-wrap">

        <div class="home-section-head">
            <span class="home-eyebrow">Video Highlights</span>
            <h2><span class="accent-line"></span>See the machines in motion before you request a quote.</h2>
            <p>Use these videos to get a better feel for size, movement, attachments, and real-world machine presence before you move deeper into the catalog.</p>
        </div>

        <div class="home-video-grid">
            <article class="home-video-card">
                <div class="home-video-frame">
                    <iframe
                        src="https://www.youtube.com/embed/Hm_RlQAzFEY"
                        title="KUVUO video 1"
                        loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="home-video-copy">
                    <span class="video-label">Machine Walkthrough</span>
                    <h3>Watch the machine profile and overall operating presence.</h3>
                    <p>A useful first look for visitors comparing compact equipment size, arm reach, and general machine stance.</p>
                </div>
            </article>

            <article class="home-video-card">
                <div class="home-video-frame">
                    <iframe
                        src="https://www.youtube.com/embed/6hJWkBLKv-4"
                        title="KUVUO video 2"
                        loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="home-video-copy">
                    <span class="video-label">Worksite View</span>
                    <h3>Show movement, boom action, and practical jobsite behavior.</h3>
                    <p>This gives buyers a better sense of how the machine carries itself during real use instead of only static product photos.</p>
                </div>
            </article>

            <article class="home-video-card">
                <div class="home-video-frame">
                    <iframe
                        src="https://www.youtube.com/embed/VEEK9SV7FaQ"
                        title="KUVUO video 3"
                        loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="home-video-copy">
                    <span class="video-label">Closer Detail</span>
                    <h3>Help visitors inspect machine details from a more direct angle.</h3>
                    <p>Useful for reinforcing confidence around machine condition, finish, and component visibility during review.</p>
                </div>
            </article>

            <article class="home-video-card">
                <div class="home-video-frame">
                    <iframe
                        src="https://www.youtube.com/embed/b70mouKuk2A"
                        title="KUVUO video 4"
                        loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <div class="home-video-copy">
                    <span class="video-label">Customer Context</span>
                    <h3>Give buyers one more proof point before they contact your team.</h3>
                    <p>Video content helps bridge the gap between browsing specs online and feeling ready to ask for pricing or shipping details.</p>
                </div>
            </article>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════════════
     7. MAINTENANCE TIMELINE
══════════════════════════════════════════════════════════════════ --}}
<section class="home-section soft">
    <div class="home-wrap">

        <div class="home-section-head">
            <span class="home-eyebrow">Maintenance &amp; Ownership</span>
            <h2><span class="accent-line"></span>Simple service habits, lower running cost.</h2>
            <p>None of these are complicated — but doing them consistently is the cheapest way to protect uptime, attachment life and resale value.</p>
        </div>

        <div class="home-timeline">

            <div class="home-tl-step">
                <div class="home-tl-dot">01</div>
                <h4>Daily Inspection</h4>
                <p>Walk-around for leaks, fasteners and fluid levels before the first cycle of the day.</p>
            </div>

            <div class="home-tl-step">
                <div class="home-tl-dot">02</div>
                <h4>Track &amp; Hydraulic Care</h4>
                <p>Tension monitoring, fitting cleanliness and fluid clarity protect pump and motor life.</p>
            </div>

            <div class="home-tl-step">
                <div class="home-tl-dot">03</div>
                <h4>Scheduled Service</h4>
                <p>Filter and fluid intervals from the manual — staying on schedule protects resale value.</p>
            </div>

            <div class="home-tl-step">
                <div class="home-tl-dot">04</div>
                <h4>Manual-Supported Ownership</h4>
                <p>Full operation and maintenance manual shipped with every machine, plus quote-line support.</p>
            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════════════
     8. FINAL CTA
══════════════════════════════════════════════════════════════════ --}}
<section class="home-cta-band">
    <div class="home-wrap">
        <div class="home-cta-inner">
            <div>
                <span class="home-tlabel"><span class="accent">●</span> READY TO SPEC THE RIGHT MACHINE</span>
                <h2 style="margin-top:14px;">Browse the catalog, or send us your project notes.</h2>
                <p>Compare specs side by side, or let our team help you size the machine and pair the right attachments before you buy.</p>
            </div>
            <div class="home-cta-actions">
                <a href="{{ route('shop') }}" class="btn btn-primary">Browse Equipment</a>
                <a href="{{ route('contact') }}" class="btn btn-outline">Request a Quote</a>
                <a href="{{ route('contact') }}" class="btn btn-ghost">Contact Support</a>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')

<script>
/*
 * Homepage interactions — scoped via IIFE so nothing leaks to the global scope.
 * Handles:
 *   1. #typhon-sim-v3   — tab switching for Worksite Simulation
 *   2. #typhon-bento-final — filter chips + click-to-open modal
 */
(function () {
    'use strict';

    /* ──────────────────────────────────────────────────────────────
       1. Worksite Simulation tabs
    ────────────────────────────────────────────────────────────── */
    var sim = document.getElementById('typhon-sim-v3');
    if (sim) {
        var simTabs  = sim.querySelectorAll('.ksim-tab');
        var simPanes = sim.querySelectorAll('.ksim-pane');

        simTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                var target = tab.getAttribute('data-sim-tab');

                simTabs.forEach(function (t) {
                    var on = (t === tab);
                    t.classList.toggle('active', on);
                    t.setAttribute('aria-selected', on ? 'true' : 'false');
                });
                simPanes.forEach(function (p) {
                    p.classList.toggle('active', p.getAttribute('data-sim-pane') === target);
                });
            });
        });
    }

    /* ──────────────────────────────────────────────────────────────
       2. Bento gallery — filters + modal
    ────────────────────────────────────────────────────────────── */
    // Handled globally below
})();

// --- DATA ---
const bentoItems = [
    { title: "Utility Trenching", desc: "Precision digging for residential utility lines. The boom swing feature allows digging parallel to walls without moving tracks." },
    { title: "Tight Corner Dig", desc: "Zero tail swing lets you rotate safely in confined foundation corners where other machines can't fit." },
    { title: "Trailer Loading", desc: "High dump height clearance makes loading debris into standard dump trailers quick and efficient." },
    { title: "Finish Grading", desc: "Hydraulic precision allows for smooth back-dragging and leveling of topsoil for final landscape prep." },
    { title: "Irrigation Ditch", desc: "Metal tracks provide superior grip in muddy agricultural fields while cutting clean drainage channels." },
    { title: "Dusk Operations", desc: "Powerful LED boom lights illuminate the bucket area, extending productivity into the evening hours." }
];

// --- FILTERING ---
function filterBento(cat, btn) {
    document.querySelectorAll('.bn-chip').forEach(c => c.classList.remove('active'));
    btn.classList.add('active');

    const tiles = document.querySelectorAll('.bn-tile');
    
    if (cat === 'all') {
        tiles.forEach(t => {
            t.classList.remove('hidden');
            t.style.opacity = '1';
            t.style.filter = 'grayscale(0)';
        });
    } else {
        // Opacity Dimming Logic for cleaner UX
        tiles.forEach(t => {
            const tCat = t.getAttribute('data-cat');
            if (tCat === cat || cat === 'all') {
                t.style.opacity = '1';
                t.style.filter = 'grayscale(0)';
            } else {
                t.style.opacity = '0.2';
                t.style.filter = 'grayscale(100%)';
            }
        });
    }
}

// --- MODAL ---
function openBnModal(index) {
    const item = bentoItems[index];
    const modal = document.getElementById('bnModal');
    const inject = document.getElementById('bnModalInject');
    
    // Grab the actual image from the grid to display in lightbox
    const tile = document.querySelector(`.bn-tile-` + (index + 1) + ` img.bn-placeholder`);
    
    if(tile) {
        const clone = tile.cloneNode(true);
        clone.classList.add('bn-modal-img');
        // Remove the placeholder class to avoid conflicting styles in modal
        clone.classList.remove('bn-placeholder');
        inject.innerHTML = '';
        inject.appendChild(clone);
    }
    
    document.getElementById('bnModalTitle').innerText = item.title;
    document.getElementById('bnModalDesc').innerText = item.desc;
    
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeBnModal() {
    document.getElementById('bnModal').classList.remove('active');
    document.body.style.overflow = 'auto';
}

document.addEventListener('keydown', (e) => {
    if(e.key === 'Escape') closeBnModal();
});
</script>

</body>
</html>
