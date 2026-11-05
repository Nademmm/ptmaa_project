<!-- Kerangka Footer Korporat Dinamis -->
<footer class="bg-slate-900 text-slate-300 pt-16 pb-12 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-10">
        <!-- Kolom 1: Profil & Tagline -->
        <div class="space-y-4">
            <span class="text-xl font-bold text-white tracking-tight">PT. MULTI ABADI AKSANA</span>
            <p class="text-sm text-slate-400 leading-relaxed">
                General Trading, Supplier & Contractor berpusat di Sidoarjo. Mengutamakan Keselamatan dan Kesehatan Kerja (K3) serta kualitas terbaik.
            </p>
            <p class="text-xs text-slate-500 italic">
                "Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan"
            </p>
        </div>

        <!-- Kolom 2: Navigasi Cepat -->
        <div>
            <h4 class="text-sm font-semibold uppercase tracking-wider text-white mb-4">Navigasi</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}" wire:navigate class="hover:text-white transition">Beranda</a></li>
                <li><a href="{{ route('about') }}" wire:navigate class="hover:text-white transition">Tentang Kami & Layanan</a></li>
                <li><a href="{{ route('products.index') }}" wire:navigate class="hover:text-white transition">Katalog Produk</a></li>
                <li><a href="{{ route('gallery.index') }}" wire:navigate class="hover:text-white transition">Projek On Duty</a></li>
                <li><a href="{{ route('contact') }}" wire:navigate class="hover:text-white transition">Kontak & Lokasi</a></li>
            </ul>
        </div>

        <!-- Kolom 3: Kategori Produk -->
        <div>
            <h4 class="text-sm font-semibold uppercase tracking-wider text-white mb-4">Kategori Produk</h4>
            <ul class="space-y-2 text-sm">
                @foreach($categories as $cat)
                    <li>
                        <a href="{{ route('products.index', ['kategori' => $cat->slug]) }}" wire:navigate class="hover:text-white transition">
                            {{ $cat->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Kolom 4: Kontak Resmi -->
        <div>
            <h4 class="text-sm font-semibold uppercase tracking-wider text-white mb-4">Head Office</h4>
            <p class="text-sm text-slate-400 mb-3">
                Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257.
            </p>
            <p class="text-sm text-slate-400"><strong>Email:</strong> ptmultiabadiaksana15@gmail.com</p>
            <p class="text-sm text-slate-400"><strong>WhatsApp:</strong> +62 823-4297-9898</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-6 border-t border-slate-800 text-center text-xs text-slate-500">
        &copy; {{ date('Y') }} PT. Multi Abadi Aksana. All rights reserved.
    </div>
</footer>

