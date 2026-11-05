<div class="space-y-8 md:space-y-12">
    <!-- B2B Technical Catalog Header Banner -->
    <section class="relative rounded-3xl md:rounded-[40px] bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#242882] p-6 sm:p-10 md:p-12 text-white overflow-hidden shadow-2xl shadow-primary/15">
        <div class="absolute -right-12 -top-12 w-56 h-56 bg-secondary/20 rotate-45 pointer-events-none"></div>
        <div class="relative z-10 max-w-3xl space-y-3">
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase leading-[1.05]">
                Katalog Produk & <span class="text-[#8DA2E0]">Spesifikasi Teknis.</span>
            </h1>
            <p class="text-xs sm:text-sm md:text-base text-blue-100/85 font-medium leading-relaxed">
                Temukan unit PJU Tenaga Surya (All In One, Two In One, Konvensional), PJU PLN (COB, Osram, Philips, Estika), konstruksi Interior & Exterior, fabrikasi Mechanical Electrical, hingga 12 lini Sparepart & Equipment.
            </p>
        </div>
    </section>

    <!-- Main Catalog Layout: Sidebar Filter (Left) + 3-Column Technical Grid (Right) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-8 items-start">
        <!-- Left Sidebar: Live Search + Division Filter + Direct WhatsApp Routing -->
        <aside class="lg:col-span-3 space-y-5 lg:sticky lg:top-24">
            <!-- Search Box -->
            <div class="bg-white p-5 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5 space-y-3">
                <label for="catalog-search-input" class="block text-[10px] font-black uppercase tracking-[0.2em] text-primary">
                    Cari Produk / Merek
                </label>
                <div class="relative">
                    <input
                        id="catalog-search-input"
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Misal: Philips, Impeller, Oli..."
                        class="w-full bg-[#F8FAFC] border border-primary/15 focus:border-primary focus:bg-white rounded-xl py-2.5 pl-3.5 pr-9 text-xs font-semibold text-text-main placeholder:text-text-secondary/70 focus:outline-none"
                    />
                    @if(!empty($search))
                        <button
                            type="button"
                            wire:click="$set('search', '')"
                            aria-label="Hapus pencarian"
                            class="absolute right-2 top-1/2 -translate-y-1/2 w-6 h-6 rounded-lg bg-primary/10 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition-colors"
                        >
                            <i class="bx bx-x text-base"></i>
                        </button>
                    @else
                        <i class="bx bx-search absolute right-3 top-1/2 -translate-y-1/2 text-primary text-base pointer-events-none"></i>
                    @endif
                </div>
            </div>

            <!-- Category List -->
            <div class="bg-white p-5 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5 space-y-3">
                <div class="flex items-center justify-between">
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Divisi Katalog</p>
                    @if($selectedCategory !== 'semua' || !empty($search))
                        <button
                            type="button"
                            wire:click="$set('search', ''); $set('selectedCategory', 'semua')"
                            class="text-[10px] font-black uppercase tracking-wider text-secondary hover:text-primary"
                        >
                            Reset
                        </button>
                    @endif
                </div>

                <div class="space-y-1.5">
                    <button
                        type="button"
                        wire:click="setCategory('semua')"
                        class="w-full text-left px-3.5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-all flex items-center justify-between {{ $selectedCategory === 'semua' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-text-secondary hover:bg-primary/5 hover:text-primary' }}"
                    >
                        <span>Semua Kategori</span>
                        <i class="bx bx-chevron-right text-base"></i>
                    </button>

                    @foreach($categories as $category)
                        <button
                            type="button"
                            wire:click="setCategory('{{ $category->slug }}')"
                            class="w-full text-left px-3.5 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-all flex items-center justify-between {{ $selectedCategory === $category->slug ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-text-secondary hover:bg-primary/5 hover:text-primary' }}"
                        >
                            <span class="truncate pr-2">{{ $category->name }}</span>
                            <i class="bx bx-chevron-right text-base shrink-0"></i>
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Direct Dual WhatsApp Consultation Box -->
            <div class="bg-[#0F1048] text-white p-5 rounded-3xl space-y-3.5 shadow-xl">
                <h2 class="text-sm font-black uppercase tracking-tight leading-snug">
                    Butuh Spesifikasi Custom atau Volume Proyek?
                </h2>
                <p class="text-[11px] text-blue-100/80 font-medium leading-relaxed">
                    Konsultasikan kebutuhan RAB, survei lokasi, atau ketersediaan stok suku cadang langsung dengan admin divisi terkait:
                </p>
                <div class="space-y-2 pt-1">
                    <a
                        href="https://wa.me/6282342979898?text={{ urlencode('Halo Admin Proyek PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan PJU / Konstruksi / ME.') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-full py-2.5 px-3 rounded-xl bg-white text-primary hover:bg-secondary hover:text-white text-[10px] font-black uppercase tracking-wider transition-all flex items-center justify-between"
                    >
                        <span>WA Divisi PJU & Konstruksi</span>
                        <i class="bx bxl-whatsapp text-base"></i>
                    </a>
                    <a
                        href="https://wa.me/6281216592824?text={{ urlencode('Halo Admin Sparepart PT. Multi Abadi Aksana, saya ingin menanyakan ketersediaan suku cadang / pelumas industri.') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-full py-2.5 px-3 rounded-xl bg-white/10 hover:bg-white hover:text-primary border border-white/15 text-white text-[10px] font-black uppercase tracking-wider transition-all flex items-center justify-between"
                    >
                        <span>WA Divisi Sparepart</span>
                        <i class="bx bxl-whatsapp text-base"></i>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Right Main Content: Active Filter Bar + 3-Column Product Cards -->
        <div class="lg:col-span-9 space-y-6">
            @if(!empty(trim($search)) || $selectedCategory !== 'semua')
                <div class="flex flex-wrap items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-primary/10 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-primary text-white flex items-center justify-center text-base">
                            <i class="bx bx-filter-alt"></i>
                        </div>
                        <h2 class="text-xs md:text-sm font-black uppercase tracking-tight text-primary">
                            @if(!empty(trim($search)))
                                Kata Kunci: "{{ $search }}"
                            @endif
                            @if($selectedCategory !== 'semua')
                                {{ !empty(trim($search)) ? ' • ' : '' }}Divisi: {{ $categories->firstWhere('slug', $selectedCategory)?->name ?? $selectedCategory }}
                            @endif
                        </h2>
                    </div>
                    <button
                        type="button"
                        wire:click="$set('search', ''); $set('selectedCategory', 'semua')"
                        class="px-3.5 py-2 rounded-xl bg-primary/5 text-[10px] font-black uppercase tracking-widest text-primary hover:bg-primary hover:text-white transition-all flex items-center gap-1.5"
                    >
                        <i class="bx bx-reset text-sm"></i>
                        <span>Tampilkan Semua</span>
                    </button>
                </div>
            @endif

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
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
                <div class="py-20 bg-white rounded-3xl flex flex-col items-center justify-center text-center px-6 space-y-5 shadow-lg border border-primary/10">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center text-3xl text-primary">
                        <i class="bx bx-package"></i>
                    </div>
                    <div class="space-y-1.5 max-w-md">
                        <h3 class="text-xl md:text-2xl font-black uppercase tracking-tight text-primary">Unit Tidak Ditemukan</h3>
                        <p class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed">
                            Tidak ada produk yang cocok dengan kata kunci atau kategori saat ini. Silakan reset filter atau hubungi WhatsApp Admin untuk pengadaan spesifikasi khusus.
                        </p>
                    </div>
                    <div class="flex flex-wrap justify-center gap-3">
                        <button
                            type="button"
                            wire:click="$set('search', ''); $set('selectedCategory', 'semua')"
                            class="px-6 py-3 bg-primary text-white text-xs font-black uppercase tracking-widest rounded-xl hover:bg-primary-dark transition-all"
                        >
                            Reset Filter Katalog
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
