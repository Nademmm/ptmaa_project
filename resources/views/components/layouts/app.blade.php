<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1B1B6C">
    <title>{{ $title ?? 'PT. Multi Abadi Aksana | General Trading, Supplier & Contractor' }}</title>
    <meta name="description" content="PT. Multi Abadi Aksana: Solusi Pengadaan Barang & Jasa Konstruksi, Penerangan Jalan Umum (Tenaga Surya & PLN), serta Rekayasa Mechanical & Electrical Industri di Sidoarjo, Jawa Timur.">
    <meta name="keywords" content="PT Multi Abadi Aksana, Penerangan Jalan Umum, PJU Tenaga Surya, PJU PLN, Kontraktor Sidoarjo, Mechanical Electrical, Impeller Industri, Komponen Mekanikal">
    <meta name="author" content="PT. Multi Abadi Aksana">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/webp" href="/assets/logo.webp">

    <!-- Preload Self-Hosted Icons & Preconnect Fonts -->
    <link rel="preload" href="/assets/fonts/boxicons.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap">
    </noscript>

    @stack('head')

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'PT. Multi Abadi Aksana | General Trading, Supplier & Contractor' }}">
    <meta property="og:description" content="Mitra strategis pengadaan barang, konstruksi Penerangan Jalan Umum, dan sistem Mechanical & Electrical Industri.">
    <meta property="og:image" content="{{ asset('assets/logo.webp') }}">

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "PT. Multi Abadi Aksana",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('assets/logo.webp') }}",
        "contactPoint": {
            "@@type": "ContactPoint",
            "telephone": "+62-823-4297-9898",
            "contactType": "sales",
            "areaServed": "ID",
            "availableLanguage": "Indonesian"
        },
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Jl. Taman Surya Agung Blok B No. 11, Wage, Kec. Taman",
            "addressLocality": "Sidoarjo",
            "addressRegion": "Jawa Timur",
            "postalCode": "61257",
            "addressCountry": "ID"
        }
    }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
