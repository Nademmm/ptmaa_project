<div class="space-y-8 md:space-y-12">
    <!-- Header Section -->
    <div class="relative pt-4 md:pt-8 overflow-hidden">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 md:gap-8 relative z-10">
            <div class="space-y-2 md:space-y-4">
                <span class="px-4 py-1.5 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest inline-block">
                    Katalog Pengadaan B2B & B2G
                </span>
                <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tighter uppercase leading-[0.95] text-text-main">
                    Solusi <span class="text-gradient">Terdepan.</span>
                </h1>
            </div>
            <p class="text-sm md:text-lg text-text-secondary max-w-md font-medium leading-relaxed">
                Temukan unit PJU Tenaga Surya & PLN, komponen Mechanical Electrical, material Interior Exterior, hingga pelumas dan suku cadang alat berat berstandar industri.
            </p>
        </div>
    </div>

    <!-- Sticky Filter & Live Search Bar (Niscahya Style) -->
    <div class="sticky top-20 md:top-24 z-40 py-2">
        <div class="glass-bright p-2.5 md:p-4 rounded-2xl md:rounded-4xl shadow-2xl shadow-primary/10 border-primary/15 space-y-2.5">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-3">
                <!-- Category Pills -->
                <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar py-0.5 px-0.5">
                    <button
                        type="button"
                        wire:click="setCategory('semua')"
                        class="px-4 md:px-6 py-2.5 rounded-xl md:rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-wider transition-all duration-300 whitespace-nowrap flex items-center gap-2 {{ $selectedCategory === 'semua' ? 'bg-primary text-white shadow-lg shadow-primary/25' : 'text-text-secondary hover:text-primary hover:bg-primary/5' }}"
                    >
                        <i class="bx bx-grid-alt text-sm"></i>
                        <span>Semua Kategori</span>
                    </button>

                    @foreach($categories as $category)
                        <button
                            type="button"
                            wire:click="setCategory('{{ $category->slug }}')"
                            class="px-4 md:px-6 py-2.5 rounded-xl md:rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-wider transition-all duration-300 whitespace-nowrap {{ $selectedCategory === $category->slug ? 'bg-primary text-white shadow-lg shadow-primary/25' : 'text-text-secondary hover:text-primary hover:bg-primary/5' }}"
                        >
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

                <!-- Live Search Input -->
                <div class="relative shrink-0 w-full lg:w-72">
                    <label for="catalog-search-input" class="sr-only">Cari nama produk, merek, atau tipe</label>
                    <input
                        id="catalog-search-input"
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Ketik nama unit / spesifikasi..."
                        class="w-full bg-primary/5 border border-primary/10 focus:border-primary/30 focus:bg-white rounded-xl md:rounded-2xl py-2.5 pl-4 pr-10 text-xs font-semibold text-text-main placeholder:text-text-secondary/70 focus:outline-none focus:ring-4 focus:ring-primary/5"
                    />
                    @if(!empty($search))
                        <button
                            type="button"
                            wire:click="$set('search', '')"
                            aria-label="Hapus pencarian"
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 w-6 h-6 rounded-lg bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-colors"
                        >
                            <i class="bx bx-x text-base"></i>
                        </button>
                    @else
                        <i class="bx bx-search absolute right-3.5 top-1/2 -translate-y-1/2 text-primary text-base pointer-events-none"></i>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Active Search / Filter Indicator Banner -->
    @if(!empty(trim($search)) || $selectedCategory !== 'semua')
        <div class="flex flex-wrap items-center justify-between gap-4 bg-primary/5 p-4 md:p-5 rounded-2xl md:rounded-3xl border border-primary/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-primary text-white flex items-center justify-center text-lg shadow-md">
                    <i class="bx bx-filter-alt"></i>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-secondary">Filter Katalog Aktif</p>
                    <h2 class="text-sm md:text-lg font-black uppercase tracking-tight text-primary">
                        @if(!empty(trim($search)))
                            Pencarian: "{{ $search }}"
                        @endif
                        @if($selectedCategory !== 'semua')
                            {{ !empty(trim($search)) ? ' • ' : '' }}Kategori: {{ $categories->firstWhere('slug', $selectedCategory)?->name ?? $selectedCategory }}
                        @endif
                    </h2>
                </div>
            </div>
            <button
                type="button"
                wire:click="$set('search', ''); $set('selectedCategory', 'semua')"
                class="px-4 py-2.5 rounded-xl bg-white text-xs font-black uppercase tracking-widest text-primary hover:bg-primary hover:text-white transition-all shadow-sm flex items-center gap-1.5 border border-primary/10"
            >
                <i class="bx bx-reset text-base"></i>
                <span>Reset Filter</span>
            </button>
        </div>
    @endif

    <!-- Product Grid -->
    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @foreach($products as $product)
                <livewire:components.product-card :product="$product" :key="'cat-prod-'.$product->id" />
            @endforeach
        </div>

        @if($products->hasPages())
            <div class="pt-6">
                {{ $products->links() }}
            </div>
        @endif
    @else
        <!-- Empty State -->
        <div class="py-24 md:py-32 glass rounded-3xl md:rounded-[64px] flex flex-col items-center justify-center text-center px-6 space-y-6 shadow-xl border-primary/10">
            <div class="w-20 h-20 md:w-24 md:h-24 bg-primary/10 rounded-3xl flex items-center justify-center border border-primary/15">
                <i class="bx bx-package text-4xl md:text-5xl text-primary"></i>
            </div>
            <div class="space-y-2 max-w-md">
                <h3 class="text-2xl md:text-3xl font-black uppercase tracking-tighter text-primary">Produk Tidak Ditemukan</h3>
                <p class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed">
                    Tidak ada unit katalog yang cocok dengan filter saat ini. Anda juga dapat langsung menanyakan ketersediaan barang custom melalui WhatsApp Admin kami.
                </p>
            </div>
            <div class="flex flex-wrap justify-center gap-3">
                <button
                    type="button"
                    wire:click="$set('search', ''); $set('selectedCategory', 'semua')"
                    class="px-7 py-3.5 bg-primary text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-primary-dark transition-all shadow-lg shadow-primary/20"
                >
                    Tampilkan Semua Produk
                </button>
                <a
                    href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin menanyakan pengadaan barang / spesifikasi khusus.') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="px-7 py-3.5 glass text-primary text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-secondary hover:text-white transition-all flex items-center gap-2"
                >
                    <i class="bx bxl-whatsapp text-lg"></i>
                    <span>Tanya Ketersediaan Stok</span>
                </a>
            </div>
        </div>
    @endif
</div>
