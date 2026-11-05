<!-- Kerangka Halaman Katalog Produk (/products) -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    <!-- Header Katalog -->
    <div class="border-b border-slate-200 pb-6">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Katalog Produk & Material Pengadaan</h1>
        <p class="mt-2 text-sm text-slate-600 max-w-3xl">
            Etalase digital spesifikasi teknis produk penerangan jalan, mekanikal-elektrikal, interior-eksterior, dan suku cadang industri berstandar mutu dan K3.
        </p>
    </div>

    <!-- Filter Bar Interaktif (Livewire Tanpa Reload) -->
    <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
        <!-- Filter Pills Kategori -->
        <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0 scrollbar-none">
            <button wire:click="setCategory('semua')" class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition {{ $selectedCategory === 'semua' ? 'bg-blue-600 text-white' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-100' }}">
                Semua Kategori
            </button>
            @foreach($categories as $category)
                <button wire:click="setCategory('{{ $category->slug }}')" class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition {{ $selectedCategory === $category->slug ? 'bg-blue-600 text-white' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-100' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <!-- Search Input -->
        <div class="relative w-full md:w-72">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari produk atau merek..." class="w-full pl-9 pr-4 py-2 rounded-lg border border-slate-200 text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <span class="absolute left-3 top-2.5 text-slate-400 text-xs">🔍</span>
        </div>
    </div>

    <!-- Grid Produk (Bukan E-Commerce: Foto, Badge, Judul, Tombol Detail) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
            <livewire:components.product-card :product="$product" :key="$product->id" />
        @empty
            <div class="col-span-full py-16 text-center text-slate-500 bg-white rounded-xl border border-slate-200">
                <span class="text-3xl block mb-2">📦</span>
                <p class="font-bold text-slate-700">Tidak ada produk yang cocok dengan pencarian Anda.</p>
                <p class="text-xs text-slate-400 mt-1">Silakan coba kata kunci lain atau pilih kategori "Semua".</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>

    <!-- Banner Konsultasi Spesifikasi Khusus -->
    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 sm:p-8 flex flex-col md:flex-row items-center justify-between gap-6">
        <div>
            <h3 class="text-lg font-bold text-blue-950">Butuh Spesifikasi Khusus atau Pengadaan Skala Proyek?</h3>
            <p class="text-xs text-blue-700 mt-1">Tim kami siap menyusun estimasi penawaran teknis dan survei lapangan secara profesional.</p>
        </div>
        <a href="{{ route('contact') }}" wire:navigate class="px-6 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs whitespace-nowrap transition">
            Hubungi Tim Ahli
        </a>
    </div>
</div>

