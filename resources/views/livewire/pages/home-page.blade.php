<!-- Kerangka Halaman Beranda (/) -->
<div class="space-y-16 py-8">
    <!-- 1. Hero Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-12">
        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-100 text-blue-800 mb-4">
            General Trading, Supplier & Contractor
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight max-w-4xl mx-auto leading-tight">
            Solusi Terintegrasi Pengadaan Barang & Jasa Infrastruktur, PJU, ME, Interior, & Sparepart
        </h1>
        <p class="mt-4 text-base sm:text-lg text-slate-600 max-w-2xl mx-auto">
            Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan dengan mengutamakan Keselamatan dan Kesehatan Kerja (K3).
        </p>
        <div class="mt-8 flex justify-center gap-4">
            <a href="{{ route('products.index') }}" wire:navigate class="px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm transition">
                Jelajahi Katalog Produk
            </a>
            <a href="{{ route('contact') }}" wire:navigate class="px-6 py-3 rounded-lg border border-slate-300 hover:bg-slate-100 text-slate-700 font-semibold text-sm transition">
                Konsultasi & Survei Proyek
            </a>
        </div>
    </section>

    <!-- 2. Section 4 Pilar Layanan -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold text-slate-900">4 Pilar Layanan Unggulan</h2>
            <p class="text-sm text-slate-500 mt-1">Cakupan komprehensif pengadaan barang dan pelaksanaan jasa</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($pillars as $pillar)
                <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-blue-600 block mb-1">{{ $pillar->code }}</span>
                        <h3 class="text-lg font-bold text-slate-900">{{ $pillar->name }}</h3>
                        <p class="text-xs text-slate-600 mt-2">{{ $pillar->short_summary }}</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 text-xs text-slate-500">
                        <span>{{ $pillar->scopes->count() }} Lingkup Pengadaan</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 3. Section Alur Kerja (The Process) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-slate-900 text-white p-10 rounded-2xl">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold">Alur Kerja Sama Proyek</h2>
            <p class="text-sm text-slate-400 mt-1">Proses terstruktur untuk memastikan kepuasan dan ketepatan spesifikasi</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
            <div class="p-4 rounded-lg bg-slate-800">
                <span class="text-2xl font-black text-blue-400 block mb-1">01</span>
                <h4 class="font-bold text-sm">Komunikasi</h4>
                <p class="text-xs text-slate-400 mt-1">Konsultasi awal kebutuhan spesifikasi & anggaran proyek.</p>
            </div>
            <div class="p-4 rounded-lg bg-slate-800">
                <span class="text-2xl font-black text-blue-400 block mb-1">02</span>
                <h4 class="font-bold text-sm">Survei</h4>
                <p class="text-xs text-slate-400 mt-1">Peninjauan langsung lapangan & analisis kelayakan teknis.</p>
            </div>
            <div class="p-4 rounded-lg bg-slate-800">
                <span class="text-2xl font-black text-blue-400 block mb-1">03</span>
                <h4 class="font-bold text-sm">Negosiasi</h4>
                <p class="text-xs text-slate-400 mt-1">Penyusunan penawaran harga (RAB) yang transparan & efisien.</p>
            </div>
            <div class="p-4 rounded-lg bg-slate-800">
                <span class="text-2xl font-black text-blue-400 block mb-1">04</span>
                <h4 class="font-bold text-sm">Deal & Eksekusi</h4>
                <p class="text-xs text-slate-400 mt-1">Penandatanganan kontrak kerja sama & pengerjaan berstandar K3.</p>
            </div>
        </div>
    </section>

    <!-- 4. Section Produk Unggulan (Featured Products Showcase) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Produk Unggulan Pengadaan</h2>
                <p class="text-sm text-slate-500">Spesifikasi teknis terjamin untuk sektor publik dan swasta</p>
            </div>
            <a href="{{ route('products.index') }}" wire:navigate class="text-sm font-semibold text-blue-600 hover:text-blue-800">
                Lihat Semua Produk &rarr;
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredProducts as $product)
                <livewire:components.product-card :product="$product" :key="$product->id" />
            @endforeach
        </div>
    </section>

    <!-- 5. Section Projek On Duty Highlight -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Dokumentasi "Projek On Duty"</h2>
                <p class="text-sm text-slate-500">Rekam jejak pengerjaan nyata tim PT. Multi Abadi Aksana di lapangan</p>
            </div>
            <a href="{{ route('gallery.index') }}" wire:navigate class="text-sm font-semibold text-blue-600 hover:text-blue-800">
                Buka Galeri Lengkap &rarr;
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredGalleries as $gallery)
                <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="aspect-video bg-slate-100 flex items-center justify-center">
                        <span class="text-xs text-slate-400">[Foto Proyek: {{ $gallery->title }}]</span>
                    </div>
                    <div class="p-4">
                        <span class="text-xs font-semibold text-blue-600 uppercase">{{ $gallery->client_or_unit_code }}</span>
                        <h4 class="font-bold text-sm text-slate-900 mt-1 line-clamp-1">{{ $gallery->title }}</h4>
                        <p class="text-xs text-slate-500 mt-1">{{ $gallery->location }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

