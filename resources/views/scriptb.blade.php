@extends('layouts.app')

@section('content')
@php
    $search = request('search');
@endphp

<style>
    .ecwid-shop-page,
    .ecwid-shop-page * {
        font-family: 'Inter', sans-serif;
    }

    .ecwid-shop-page {
        background: #f8f8f5;
        color: #1f1f1f;
        min-height: 100vh;
        padding: 72px 20px 90px;
    }

    .ecwid-shop-wrap {
        max-width: 1400px;
        margin: auto;
    }

    .ecwid-shop-heading {
        text-align: center;
        margin-bottom: 42px;
    }

    .ecwid-shop-heading h1 {
        color: #2f3627;
        font-size: 42px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 14px;
    }

    .ecwid-shop-heading p {
        color: #666;
        font-size: 18px;
        line-height: 1.6;
    }

    #my-store-80100025 {
        --ec-font-family: 'Inter', sans-serif;
        --ec-color-button: #5d694c;
        --ec-btn-primary-background: #5d694c;
        --ec-btn-primary-background-hover: #4c573d;
        --ec-color-link: #5d694c;
        --ec-color-link-hover: #4c573d;
        --ec-color-price: #2f3627;
        --ec-color-text: #1f1f1f;
        --ec-color-background: #f8f8f5;
        --ec-color-border: #e2e5dc;
    }

    #my-store-80100025 .ec-store,
    #my-store-80100025 .grid-product__title,
    #my-store-80100025 .product-details__product-title {
        font-family: 'Inter', sans-serif !important;
    }

    @media (max-width: 768px) {
        .ecwid-shop-page {
            padding: 52px 18px 70px;
        }

        .ecwid-shop-heading h1 {
            font-size: 34px;
        }
    }
</style>

<section class="ecwid-shop-page">
    <div class="ecwid-shop-wrap">

        <div class="ecwid-shop-heading">
        <h1>
            Explore Our Machine Shop
        </h1>

        <p>
            Browse our full equipment catalog, attachments, and secure checkout.
        </p>
        </div>

        <!-- Ecwid Store -->
        <div id="my-store-80100025"></div>

        <script data-cfasync="false"
            type="text/javascript"
            src="https://app.ecwid.com/script.js?80100025&data_platform=code&data_date=2026-02-23"
            charset="utf-8">
        </script>

        <script type="text/javascript">
            @if($search)
                if (!window.location.hash) {
                    window.location.hash = '!/~/search/keyword={{ rawurlencode($search) }}';
                }
            @endif

            xProductBrowser(
                "categoriesPerRow=3",
                "views=grid(20,3) list(60) table(60)",
                "categoryView=grid",
                "searchView=list",
                "id=my-store-80100025"
            );
        </script>

    </div>

</section>

@endsection
