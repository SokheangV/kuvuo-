<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Quote – {{ $product->name }} | KUVUO</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        :root { --primary: #12372A; --dark: #111827; }
        body { background: #f8f8f5; color: #1f1f1f; }
        .container { width: 90%; max-width: 900px; margin: auto; }

        .page-hero {
            padding: 80px 0 50px;
            text-align: center;
        }

        .page-hero h1 { font-size: 42px; color: var(--dark); margin-bottom: 12px; }
        .page-hero p  { color: #666; font-size: 17px; }

        /* Product snapshot */
        .product-snapshot {
            display: flex;
            gap: 24px;
            align-items: center;
            background: white;
            border-radius: 20px;
            padding: 24px 28px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
            margin-bottom: 40px;
        }

        .product-snapshot img {
            width: 100px;
            height: 80px;
            object-fit: contain;
            border-radius: 10px;
            background: #f5f6f2;
            flex-shrink: 0;
        }

        .snapshot-info h3  { font-size: 18px; color: var(--dark); margin-bottom: 4px; }
        .snapshot-info p   { font-size: 14px; color: #666; }

        /* Form */
        .quote-card {
            background: white;
            border-radius: 24px;
            padding: 44px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            margin-bottom: 80px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
            margin-bottom: 22px;
        }

        .form-group { display: flex; flex-direction: column; }

        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 13px 16px;
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            font-size: 15px;
            color: #1f1f1f;
            background: #fafafa;
            transition: border-color 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
        }

        .form-group.full-width { grid-column: 1 / -1; }

        textarea { resize: vertical; min-height: 130px; }

        .required-mark { color: #dc2626; margin-left: 2px; }

        .btn-submit {
            background: var(--primary);
            color: white;
            padding: 15px 36px;
            border-radius: 999px;
            font-size: 16px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-submit:hover { background: #0d2a20; }

        .alert-success {
            background: #dcfce7;
            color: #15803d;
            padding: 16px 22px;
            border-radius: 12px;
            margin-bottom: 28px;
            font-weight: 600;
        }

        @media(max-width: 640px) {
            .form-row { grid-template-columns: 1fr; }
            .product-snapshot { flex-direction: column; text-align: center; }
            .page-hero h1 { font-size: 30px; }
            .quote-card { padding: 28px 22px; }
        }
    </style>
</head>
<body>

@include('partials.header')

<section class="page-hero">
    <div class="container">
        <h1>Request a Quote</h1>
        <p>Fill in your details and we'll get back to you with pricing and availability.</p>
    </div>
</section>

<div class="container">

    {{-- Product snapshot --}}
    <div class="product-snapshot">
        <img
            src="{{ $product->image }}"
            alt="{{ $product->name }}"
            onerror="this.src='https://placehold.co/100x80?text=No+Image'"
        >
        <div class="snapshot-info">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->category->name ?? 'Machinery' }}</p>
        </div>
    </div>

    {{-- Success flash --}}
    @if(session('success'))
    <div class="alert-success">
        ✓ {{ session('success') }}
    </div>
    @endif

    {{-- Validation errors --}}
    @if($errors->any())
    <div style="background:#fee2e2;color:#dc2626;padding:16px 22px;border-radius:12px;margin-bottom:28px;">
        <ul style="padding-left:18px;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="quote-card">
        <form method="POST" action="{{ route('quote.submit') }}">
            @csrf

            {{-- Hidden: product name for record keeping (no DB product ID) --}}
            <input type="hidden" name="product_name" value="{{ $product->name }}">

            <div class="form-row">
                <div class="form-group">
                    <label for="name">Full Name <span class="required-mark">*</span></label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="John Smith"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email Address <span class="required-mark">*</span></label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="john@company.com"
                        required
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="+1 (555) 000-0000"
                    >
                </div>

                <div class="form-group">
                    <label for="company">Company / Business</label>
                    <input
                        type="text"
                        id="company"
                        name="company"
                        value="{{ old('company') }}"
                        placeholder="ACME Construction LLC"
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="country">Country</label>
                    <input
                        type="text"
                        id="country"
                        name="country"
                        value="{{ old('country') }}"
                        placeholder="United States"
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group full-width">
                    <label for="message">Message / Requirements</label>
                    <textarea
                        id="message"
                        name="message"
                        placeholder="Tell us about your project, quantities, delivery location, or any questions…"
                    >{{ old('message') }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                Submit Quote Request →
            </button>
        </form>
    </div>

</div>

@include('partials.footer')
</body>
</html>
