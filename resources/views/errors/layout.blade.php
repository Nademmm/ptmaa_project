<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#1B1B6C">
    <title>@yield('title', 'Pemberitahuan Sistem') | PT. Multi Abadi Aksana</title>

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap">

    @vite(['resources/css/app.css'])
</head>
<body class="min-h-full flex flex-col justify-between bg-slate-50 text-slate-800 antialiased font-sans">
    <!-- Header Minimalis -->
    <header class="w-full max-w-5xl mx-auto px-4 sm:px-6 py-6 flex items-center justify-between">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-3 transition-opacity hover:opacity-90 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded-lg p-1" aria-label="Beranda PT. Multi Abadi Aksana">
            <img src="{{ asset('assets/logo.webp') }}" alt="Logo PT. Multi Abadi Aksana" class="h-9 w-auto object-contain">
            <div class="flex flex-col text-left">
                <span class="text-xs sm:text-sm font-extrabold tracking-tight text-primary leading-tight">PT. MULTI ABADI AKSANA</span>
                <span class="text-[10px] sm:text-[11px] font-medium text-slate-500 leading-tight">PJU & Mechanical Electrical</span>
            </div>
        </a>
        <a href="{{ url('/') }}" class="text-xs font-semibold text-slate-600 hover:text-primary transition-colors py-2 px-3 rounded-lg hover:bg-slate-200/60 min-h-[44px] inline-flex items-center">
            &larr; Beranda
        </a>
    </header>

    <!-- Konten Utama Error -->
    <main class="grow flex items-center justify-center px-4 sm:px-6 py-10">
        <div class="w-full max-w-lg bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-10 text-center">
            <!-- Icon / Visual Indicator -->
            <div class="mx-auto mb-5 flex items-center justify-center w-16 h-16 rounded-2xl @yield('icon-bg', 'bg-blue-50 text-primary')">
                @yield('icon')
            </div>

            <!-- Kode Status -->
            <div class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase mb-3 @yield('badge-class', 'bg-slate-100 text-slate-700')">
                Status @yield('code')
            </div>

            <!-- Judul -->
            <h1 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight mb-2">
                @yield('title')
            </h1>

            <!-- Deskripsi Pesan -->
            <p class="text-slate-600 text-sm leading-relaxed mb-8 max-w-md mx-auto">
                @yield('message')
            </p>

            <!-- Aksi Tombol -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                @yield('actions')
            </div>

            <!-- Catatan Tambahan / Navigasi Bantuan -->
            @hasSection('extra')
                <div class="mt-8 pt-6 border-t border-slate-100 text-xs text-slate-500 leading-normal">
                    @yield('extra')
                </div>
            @endif
        </div>
    </main>

    <!-- Footer Minimalis -->
    <footer class="w-full max-w-5xl mx-auto px-4 sm:px-6 py-6 text-center text-xs text-slate-400">
        &copy; {{ date('Y') }} PT. Multi Abadi Aksana. Sidoarjo, Jawa Timur.
    </footer>
</body>
</html>
