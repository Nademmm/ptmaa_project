<div class="space-y-8 md:space-y-10">
    <!-- ============================================================== -->
    <!-- 1. HERO HEADER KATALOG DIVISI AKTIF                            -->
    <!-- ============================================================== -->
    <section class="relative rounded-3xl md:rounded-[40px] bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#242882] p-6 sm:p-10 md:p-12 text-white overflow-hidden shadow-2xl shadow-primary/15">
        <div class="absolute -right-16 -top-16 w-72 h-72 bg-secondary/20 rotate-45 pointer-events-none"></div>
        <div class="max-w-3xl space-y-3 relative z-10">
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase leading-[1.1]">
                Katalog <span class="text-[#8DA2E0]">{{ $activeDivisionName }}</span>
            </h1>
            <p class="text-xs sm:text-sm md:text-base text-blue-100/90 font-medium leading-relaxed">
                @if($selectedDivision === 'pju')
                    Spesifikasi teknis pengadaan Lampu Jalan Tenaga Surya mandiri (Solar Cell), Lampu Penerangan Jalan Umum PLN standar nasional, serta Tiang Hot Dip Galvanized bersertifikasi K3.
                @else
                    Spesifikasi teknis pengadaan Panel Distribusi Listrik (MDP/SDP), Transformator, Genset, Fabrikasi Industrial Impeller & Blower, serta Suku Cadang Mesin Industri.
                @endif
            </p>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- 2. MAIN CATALOG CONTENT (SIDEBAR + GRID PRODUK)                -->
    <!-- ============================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <!-- Sidebar Filter (3 Kolom) -->
        <aside class="lg:col-span-3 space-y-6">
            <!-- Box Pencarian Cepat -->
            <div class="bg-white p-5 rounded-3xl border border-primary/10 shadow-sm space-y-3">
                <label for="catalog-search-input" class="text-xs font-black uppercase tracking-wider text-primary flex items-center gap-2">
                    <i class="bx bx-search text-base text-secondary"></i>
                    <span>Cari Produk {{ $activeDivisionName }}</span>
                </label>
                <div class="relative">
                    <input
                        id="catalog-search-input"
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Nama spesifikasi atau tipe..."
                        class="w-full bg-[#F8FAFC] border border-primary/15 rounded-xl py-2.5 pl-3.5 pr-9 text-xs font-medium focus:outline-none focus:bg-white focus:border-primary transition-colors text-text-main"
                    />
                    @if(!empty($search))
                        <button
                            type="button"
                            wire:click="$set('search', '')"
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 text-text-secondary hover:text-primary text-base"
                            aria-label="Hapus kata kunci"
                        >
                            <i class="bx bx-x"></i>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Box Filter Kategori -->
            <div class="bg-white p-5 rounded-3xl border border-primary/10 shadow-sm space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-primary/10">
                    <h3 class="text-xs font-black uppercase tracking-wider text-primary flex items-center gap-2">
                        <i class="bx bx-category text-base text-secondary"></i>
                        <span>Kategori Spesifik</span>
                    </h3>
                    <span class="text-[10px] font-bold text-text-secondary uppercase">
                        {{ $categories->count() }} Kategori
                    </span>
                </div>

                <div class="flex flex-col gap-1.5">
                    <!-- Tombol Semua Kategori Divisi Ini -->
                    <button
                        type="button"
                        wire:click="setCategory('semua')"
                        class="w-full text-left px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center justify-between {{ $selectedCategory === 'semua' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-text-main hover:bg-primary/5' }}"
                    >
                        <span class="truncate">Semua {{ $activeDivisionName }}</span>
                        <i class="bx bx-chevron-right text-base"></i>
                    </button>

                    @foreach($categories as $category)
                        <button
                            type="button"
                            wire:click="setCategory('{{ $category->slug }}')"
                            class="w-full text-left px-3.5 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center justify-between {{ $selectedCategory === $category->slug ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-text-main hover:bg-primary/5' }}"
                        >
                            <span class="truncate">{{ $category->name }}</span>
                            <i class="bx bx-chevron-right text-base"></i>
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Box Konsultasi WhatsApp Khusus Divisi Ini -->
            <div class="p-6 rounded-3xl bg-gradient-to-br from-[#0F1048] to-[#1B1B6C] text-white shadow-xl space-y-4">
                <div class="w-10 h-10 rounded-xl bg-white/10 border border-white/15 flex items-center justify-center text-xl text-secondary">
                    <i class="bx bxl-whatsapp"></i>
                </div>
                <div class="space-y-1">
                    <h4 class="text-sm font-black uppercase tracking-tight">Konsultasi Divisi</h4>
                    <p class="text-xs text-blue-100/80 font-medium leading-relaxed">
                        Butuh pengadaan khusus, penyesuaian spesifikasi proyek, atau survei teknis untuk {{ $activeDivisionName }}?
                    </p>
                </div>
                <div class="pt-2">
                    @if($selectedDivision === 'pju')
                        <a
                            href="https://wa.me/6282342979898?text={{ urlencode('Halo Admin Penerangan Jalan Umum PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan lampu penerangan jalan & tiang galvanis.') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="w-full h-11 px-4 rounded-xl bg-secondary hover:bg-secondary-dark text-white text-[11px] font-black uppercase tracking-wider transition-all flex items-center justify-between shadow-lg shadow-secondary/20 leading-none"
                        >
                            <span>WhatsApp Tim PJU</span>
                            <i class="bx bxl-whatsapp text-lg leading-none"></i>
                        </a>
                    @else
                        <a
                            href="https://wa.me/6282342979898?text={{ urlencode('Halo Admin Mechanical & Electrical PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan unit mechanical & electrical.') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="w-full h-11 px-4 rounded-xl bg-secondary hover:bg-secondary-dark text-white text-[11px] font-black uppercase tracking-wider transition-all flex items-center justify-between shadow-lg shadow-secondary/20 leading-none mb-2"
                        >
                            <span>WhatsApp Tim M&E</span>
                            <i class="bx bxl-whatsapp text-lg leading-none"></i>
                        </a>
                        <a
                            href="https://wa.me/6281216592824?text={{ urlencode('Halo Admin Suku Cadang PT. Multi Abadi Aksana, saya ingin menanyakan ketersediaan suku cadang alat berat / pelumas.') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="w-full h-11 px-4 rounded-xl bg-white/10 hover:bg-white hover:text-primary border border-white/15 text-white text-[11px] font-black uppercase tracking-wider transition-all flex items-center justify-between leading-none"
                        >
                            <span>WhatsApp Suku Cadang</span>
                            <i class="bx bxl-whatsapp text-base leading-none"></i>
                        </a>
                    @endif
                </div>
            </div>
        </aside>

        <!-- Right Main Content: Active Filter Bar + Products Grid (9 Kolom) -->
        <main class="lg:col-span-9 space-y-6">
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
                                {{ !empty(trim($search)) ? ' • ' : '' }}Kategori: {{ $categories->firstWhere('slug', $selectedCategory)?->name ?? $selectedCategory }}
                            @endif
                        </h2>
                    </div>
                    <button
                        type="button"
                        wire:click="$set('search', ''); $set('selectedCategory', 'semua')"
                        class="inline-flex items-center justify-center gap-1.5 h-8 px-3.5 rounded-xl bg-primary/5 text-[10px] font-black uppercase tracking-wider text-primary hover:bg-primary hover:text-white transition-all leading-none"
                    >
                        <i class="bx bx-reset text-sm leading-none"></i>
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
                <div class="py-20 bg-white rounded-3xl flex flex-col items-center justify-center text-center space-y-5 border border-primary/10 p-6">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center text-3xl text-primary">
                        <i class="bx bx-package"></i>
                    </div>
                    <div class="space-y-1.5 max-w-md">
                        <h3 class="text-xl font-black uppercase tracking-tight text-primary">Produk Tidak Ditemukan</h3>
                        <p class="text-xs text-text-secondary font-medium">
                            Tidak ada produk pengadaan yang cocok dengan kriteria pencarian atau kategori yang dipilih di divisi {{ $activeDivisionName }}.
                        </p>
                    </div>
                    <button
                        type="button"
                        wire:click="$set('search', ''); $set('selectedCategory', 'semua')"
                        class="inline-flex items-center justify-center px-6 h-11 rounded-xl bg-primary text-white text-xs font-black uppercase tracking-wider hover:bg-primary-dark transition-all leading-none text-center"
                    >
                        <span>Lihat Semua Produk {{ $activeDivisionName }}</span>
                    </button>
                </div>
            @endif
        </main>
    </div>
</div>
