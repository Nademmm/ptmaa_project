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

    <link rel="preload" href="/assets/fonts/boxicons.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap">

    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-[#f3f4f6] text-[#101828] flex flex-col items-center justify-between px-4 py-8 relative overflow-hidden font-sans antialiased selection:bg-primary selection:text-white">
    <!-- Dekorasi radial lembut identitas warna korporat navy #1B1B6C -->
    <div class="absolute inset-0 pointer-events-none select-none overflow-hidden" aria-hidden="true">
        <div
            class="absolute top-[8%] right-[-5%] w-[420px] h-[420px] rounded-full opacity-[0.04]"
            style="background: radial-gradient(circle, #1B1B6C 0%, transparent 70%);"
        ></div>
        <div
            class="absolute bottom-[5%] left-[-8%] w-[520px] h-[520px] rounded-full opacity-[0.035]"
            style="background: radial-gradient(circle, #1B1B6C 0%, transparent 70%);"
        ></div>
    </div>

    <!-- Header Logo -->
    <header class="relative z-10 w-full max-w-lg flex items-center justify-between pt-2 sm:pt-4">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-3 transition-transform duration-200 hover:scale-[1.02] focus:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded-xl p-1" aria-label="Beranda PT. Multi Abadi Aksana">
            <img src="{{ asset('assets/logo.webp') }}" alt="Logo PT. Multi Abadi Aksana" class="h-9 sm:h-10 w-auto object-contain">
            <div class="flex flex-col text-left">
                <span class="text-xs sm:text-sm font-extrabold tracking-tight text-primary leading-tight">PT. MULTI ABADI AKSANA</span>
                <span class="text-[10px] sm:text-[11px] font-medium text-slate-500 leading-tight">PJU & Mechanical Electrical</span>
            </div>
        </a>
        <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 px-3.5 h-9 min-h-[44px] rounded-xl bg-primary/5 text-primary hover:bg-primary hover:text-white text-[11px] font-black uppercase tracking-wider transition-all leading-none">
            <i class="bx bx-left-arrow-alt text-base leading-none"></i>
            <span class="hidden sm:inline">Beranda</span>
        </a>
    </header>

    <!-- Konten Utama Error -->
    <main class="relative z-10 w-full max-w-lg flex flex-col items-center text-center my-auto py-8">
        <!-- Angka Error Berukuran Besar dengan Gradasi Navy ke Royal Blue -->
        <h1
            class="font-black text-[110px] sm:text-[150px] md:text-[160px] leading-none tracking-tight text-transparent bg-clip-text select-none"
            style="background-image: linear-gradient(135deg, #0F1048 0%, #1B1B6C 45%, #3D52A0 100%);"
        >
            @yield('code')
        </h1>

        <!-- Judul Error -->
        <h2 class="font-bold text-2xl sm:text-3xl text-[#101828] mt-2 mb-3">
            @yield('title')
        </h2>

        <!-- Deskripsi Pesan -->
        <p class="text-sm sm:text-base text-[#4a5565] leading-relaxed mb-8 max-w-md">
            @yield('message')
        </p>

        <!-- Tombol Aksi dengan Desain Standar PT MAA (rounded-xl, solid primary & glass) -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 w-full sm:w-auto">
            @yield('actions')
        </div>

        <!-- Tautan Bantuan Tambahan -->
        @hasSection('extra')
            <div class="mt-8 pt-6 border-t border-slate-200/60 text-xs text-slate-500 leading-normal max-w-md w-full">
                @yield('extra')
            </div>
        @endif
    </main>

    <!-- Footer Minimalis -->
    <footer class="relative z-10 w-full max-w-lg text-center text-xs text-slate-400 pb-2">
        &copy; {{ date('Y') }} PT. Multi Abadi Aksana. Sidoarjo, Jawa Timur.
    </footer>
</body>
</html>
