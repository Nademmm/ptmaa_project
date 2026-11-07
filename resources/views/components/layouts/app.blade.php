<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1B1B6C">
    @php
        $seoTitle = $title ?? 'PT. Multi Abadi Aksana | Spesialis PJU Tenaga Surya, PJU PLN & Mechanical Electrical Sidoarjo';
        $seoDescription = $metaDescription ?? 'PT. Multi Abadi Aksana: Perusahaan General Trading, Supplier & Kontraktor di Sidoarjo, Jawa Timur. Spesialis Pengadaan dan Konstruksi Penerangan Jalan Umum (Solar Cell & PLN), Fabrikasi Impeller, Panel MDP/SDP, serta Suku Cadang Mekanikal Industri berstandar K3.';
        $seoKeywords = $metaKeywords ?? 'PT Multi Abadi Aksana, Penerangan Jalan Umum, PJU Tenaga Surya, PJU All In One, PJU Two In One, PJU PLN, Tiang PJU Octagonal, Kontraktor PJU Sidoarjo, Mechanical Electrical Jawa Timur, Fabrikasi Impeller Blower, Panel MDP SDP ATS, Suku Cadang Industri';
        $seoCanonical = $canonicalUrl ?? url()->current();
        $seoOgType = $ogType ?? 'website';
        $seoOgImage = isset($ogImage) && !empty($ogImage)
            ? (str_starts_with($ogImage, 'http') ? $ogImage : url($ogImage))
            : asset('images/projects/pju-k3-gempol-sidoarjo.webp');
    @endphp
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="keywords" content="{{ $seoKeywords }}">
    <meta name="author" content="PT. Multi Abadi Aksana">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- Geo & Local Business SEO Meta (Sidoarjo, Jawa Timur) -->
    <meta name="geo.region" content="ID-JI">
    <meta name="geo.placename" content="Sidoarjo, Jawa Timur, Indonesia">
    <meta name="geo.position" content="-7.3644;112.7089">
    <meta name="ICBM" content="-7.3644, 112.7089">

    <!-- Canonical, Hreflang & Sitemap Discovery -->
    <link rel="canonical" href="{{ $seoCanonical }}">
    <link rel="alternate" hreflang="id-ID" href="{{ $seoCanonical }}">
    <link rel="alternate" hreflang="x-default" href="{{ $seoCanonical }}">
    <link rel="sitemap" type="application/xml" title="Sitemap PT. Multi Abadi Aksana" href="{{ url('/sitemap.xml') }}">
    <link rel="icon" type="image/webp" href="/assets/logo.webp">
    <link rel="apple-touch-icon" href="/assets/logo.webp">

    <!-- Preload Self-Hosted Icons & Preconnect Fonts -->
    <link rel="preload" href="/assets/fonts/boxicons.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap">
    </noscript>

    <!-- Open Graph / Facebook / WhatsApp Rich Preview -->
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="PT. Multi Abadi Aksana">
    <meta property="og:type" content="{{ $seoOgType }}">
    <meta property="og:url" content="{{ $seoCanonical }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:image" content="{{ $seoOgImage }}">
    <meta property="og:image:alt" content="{{ $seoTitle }}">

    <!-- Twitter / X Large Card Preview -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoOgImage }}">

    @stack('head')

    <!-- Global Structured Data (JSON-LD @graph: Organization, GeneralContractor LocalBusiness, WebSite) -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@graph": [
            {
                "@@type": ["Organization", "GeneralContractor"],
                "@@id": "{{ url('/') }}#organization",
                "name": "PT. Multi Abadi Aksana",
                "alternateName": "PT MAA Sidoarjo",
                "url": "{{ url('/') }}",
                "logo": {
                    "@@type": "ImageObject",
                    "url": "{{ asset('assets/logo.webp') }}",
                    "width": 105,
                    "height": 64
                },
                "image": "{{ asset('images/projects/pju-k3-gempol-sidoarjo.webp') }}",
                "description": "Perusahaan General Trading, Supplier, dan Kontraktor terintegrasi di Sidoarjo, Jawa Timur untuk pengadaan dan konstruksi Penerangan Jalan Umum (Solar Cell & PLN) serta sistem Mechanical & Electrical industri.",
                "email": "ptmultiabadiaksana15@gmail.com",
                "telephone": "+62-823-4297-9898",
                "priceRange": "$$$",
                "address": [
                    {
                        "@@type": "PostalAddress",
                        "name": "Head Office PT. Multi Abadi Aksana",
                        "streetAddress": "Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Kec. Taman",
                        "addressLocality": "Kabupaten Sidoarjo",
                        "addressRegion": "Jawa Timur",
                        "postalCode": "61257",
                        "addressCountry": "ID"
                    },
                    {
                        "@@type": "PostalAddress",
                        "name": "Workshop & Operasional Teknis PT. Multi Abadi Aksana",
                        "streetAddress": "Safira Stone Resort A2-01, Masangan Wetan, Kec. Sukodono",
                        "addressLocality": "Kabupaten Sidoarjo",
                        "addressRegion": "Jawa Timur",
                        "addressCountry": "ID"
                    }
                ],
                "geo": {
                    "@@type": "GeoCoordinates",
                    "latitude": -7.3644,
                    "longitude": 112.7089
                },
                "areaServed": {
                    "@@type": "Country",
                    "name": "Indonesia"
                },
                "contactPoint": {
                    "@@type": "ContactPoint",
                    "telephone": "+62-823-4297-9898",
                    "contactType": "sales",
                    "email": "ptmultiabadiaksana15@gmail.com",
                    "areaServed": "ID",
                    "availableLanguage": ["Indonesian"]
                },
                "sameAs": [
                    "https://www.instagram.com/pt.multiabadiaksana",
                    "https://wa.me/6282342979898"
                ]
            },
            {
                "@@type": "WebSite",
                "@@id": "{{ url('/') }}#website",
                "url": "{{ url('/') }}",
                "name": "PT. Multi Abadi Aksana",
                "publisher": {
                    "@@id": "{{ url('/') }}#organization"
                },
                "inLanguage": "id-ID",
                "potentialAction": {
                    "@@type": "SearchAction",
                    "target": {
                        "@@type": "EntryPoint",
                        "urlTemplate": "{{ route('products.index') }}?cari={search_term_string}"
                    },
                    "query-input": "required name=search_term_string"
                }
            }
        ]
    }
    </script>

    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="min-h-screen flex flex-col bg-mesh selection:bg-primary selection:text-white text-text-main">
    <livewire:components.navbar />

    <main class="grow pt-24 md:pt-28 pb-12 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            {{ $slot }}
        </div>
    </main>

    <livewire:components.floating-whats-app />

    <livewire:components.footer />

    @livewireScripts
</body>
</html>
