<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PT. Multi Abadi Aksana | General Trading, Supplier & Contractor' }}</title>
    <meta name="description" content="PT. Multi Abadi Aksana: Solusi Pengadaan Barang & Jasa Konstruksi, Penerangan Jalan Umum (Tenaga Surya & PLN), serta Rekayasa Mechanical & Electrical Industri di Sidoarjo, Jawa Timur.">
    <meta name="keywords" content="PT Multi Abadi Aksana, Penerangan Jalan Umum, PJU Tenaga Surya, PJU PLN, Kontraktor Sidoarjo, Mechanical Electrical, Impeller Industri, Komponen Mekanikal">
    <meta name="author" content="PT. Multi Abadi Aksana">
    <meta name="robots" content="index, follow">
    <link rel="icon" type="image/jpeg" href="/assets/logo.jpg">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'PT. Multi Abadi Aksana | General Trading, Supplier & Contractor' }}">
    <meta property="og:description" content="Mitra strategis pengadaan barang, konstruksi Penerangan Jalan Umum, dan sistem Mechanical & Electrical Industri.">
    <meta property="og:image" content="/assets/logo.jpg">

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
