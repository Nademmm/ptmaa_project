<!-- Kerangka Navigasi Utama (Header) -->
<header class="w-full bg-white border-b border-slate-200 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        <!-- Logo PT. Multi Abadi Aksana -->
        <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-3">
            <img src="{{ asset('assets/logo.jpg') }}" alt="PT. Multi Abadi Aksana" class="h-12 w-auto object-contain">
            <div class="hidden sm:block">
                <span class="block text-lg font-bold tracking-tight text-slate-900 leading-tight">PT. MULTI ABADI AKSANA</span>
                <span class="block text-xs text-slate-500 font-medium">General Trading, Supplier & Contractor</span>
            </div>
        </a>

        <!-- Menu Links (SPA wire:navigate) -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-700">
            <a href="{{ route('home') }}" wire:navigate class="hover:text-blue-600 transition">Beranda</a>
            <a href="{{ route('about') }}" wire:navigate class="hover:text-blue-600 transition">Tentang Kami</a>
            <a href="{{ route('products.index') }}" wire:navigate class="hover:text-blue-600 transition">Produk</a>
            <a href="{{ route('gallery.index') }}" wire:navigate class="hover:text-blue-600 transition">Galeri</a>
            <a href="{{ route('blog.index') }}" wire:navigate class="hover:text-blue-600 transition">Blog</a>
            <a href="{{ route('contact') }}" wire:navigate class="hover:text-blue-600 transition">Kontak</a>
        </nav>

        <!-- CTA Button -->
        <div class="flex items-center gap-4">
            <a href="{{ route('contact') }}" wire:navigate class="px-5 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm transition">
                Hubungi Kami
            </a>
        </div>
    </div>
</header>

