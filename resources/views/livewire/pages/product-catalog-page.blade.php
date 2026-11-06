<div class="space-y-8 md:space-y-12">
    @if($selectedDivision === '' && empty(trim($search)))
        <!-- ============================================================== -->
        <!-- 1. GATEWAY SELECTION PORTAL (PILIH DIVISI: PJU ATAU ME)        -->
        <!-- ============================================================== -->
        <section class="relative rounded-3xl md:rounded-[44px] bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#242882] p-6 sm:p-10 md:p-14 text-white overflow-hidden shadow-2xl shadow-primary/15">
            <div class="absolute -right-16 -top-16 w-72 h-72 bg-secondary/20 rotate-45 pointer-events-none"></div>
            <div class="max-w-3xl space-y-3 relative z-10">
                <span class="inline-flex items-center px-3.5 h-7 rounded-full bg-white/10 text-blue-200 text-[10px] font-black uppercase tracking-widest border border-white/15 leading-none">
                    Spesialisasi Pengadaan & Fabrikasi
                </span>
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase leading-[1.05]">
                    Pilih Divisi <span class="text-[#8DA2E0]">Produk Pengadaan.</span>
                </h1>
                <p class="text-xs sm:text-sm md:text-base text-blue-100/90 font-medium leading-relaxed">
                    PT. Multi Abadi Aksana memisahkan spesifikasi teknis unit pengadaan ke dalam 2 divisi independen agar kebutuhan proyek Anda tertangani secara terfokus, presisi, dan sesuai standar keselamatan kerja. Silakan tentukan divisi yang ingin Anda telusuri:
                </p>
            </div>
        </section>

        <!-- 2 Interactive Division Portal Cards -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            <!-- PORTAL CARD 1: DIVISI PJU -->
            <div class="group bg-white rounded-3xl md:rounded-[40px] border-2 border-primary/15 hover:border-primary/40 shadow-xl shadow-primary/5 hover:shadow-2xl hover:shadow-primary/15 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div>
                    <!-- Visual Header -->
                    <div class="relative aspect-[16/9] overflow-hidden bg-primary-dark">
                        <img
                            src="/images/projects/pju-k3-gempol-sidoarjo.webp"
                            alt="Divisi PJU PT. Multi Abadi Aksana"
                            width="800"
                            height="450"
                            class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0F1048] via-[#0F1048]/40 to-transparent flex flex-col justify-end p-6 text-white">
                            <span class="inline-flex items-center px-3 h-6 rounded-md bg-secondary text-white text-[9px] font-black uppercase tracking-wider leading-none self-start mb-2">
                                Divisi Penerangan Jalan
                            </span>
                            <h2 class="text-xl sm:text-2xl font-black uppercase tracking-tight leading-tight">
                                Divisi PJU & Tenaga Surya
                            </h2>
                        </div>
                    </div>

                    <!-- Body Content -->
                    <div class="p-6 sm:p-8 space-y-5">
                        <p class="text-xs sm:text-sm text-text-secondary font-medium leading-relaxed">
                            Pengadaan dan instalasi lampu jalan tenaga surya mandiri, lampu jalan PLN standar nasional, serta tiang penerangan jalan parabola dan oktagonal berkualitas Hot Dip Galvanized.
                        </p>

                        <div class="space-y-2.5 pt-2 border-t border-primary/10">
                            <p class="text-[10px] font-black uppercase tracking-widest text-primary">Cakupan Unit Pengadaan PJU:</p>
                            <ul class="space-y-2 text-xs font-semibold text-text-main">
                                <li class="flex items-center gap-2.5">
                                    <i class="bx bx-check-circle text-secondary text-base shrink-0"></i>
                                    <span>PJU Tenaga Surya All In One, Two In One, & Konvensional</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <i class="bx bx-check-circle text-secondary text-base shrink-0"></i>
                                    <span>Armature Lampu PJU PLN (COB, Philips, Osram, Estika)</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <i class="bx bx-check-circle text-secondary text-base shrink-0"></i>
                                    <span>Tiang PJU Parabola Melengkung & Octagonal Hot Dip Galvanized</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <i class="bx bx-check-circle text-secondary text-base shrink-0"></i>
                                    <span>Tiang High Mast & Ornamen Pedestrian / Kawasan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Footer Action Area -->
                <div class="p-6 sm:p-8 pt-0">
                    <button
                        type="button"
                        wire:click="selectDivision('pju')"
                        class="w-full h-12 md:h-14 rounded-2xl bg-primary hover:bg-primary-dark text-white font-black text-xs md:text-sm uppercase tracking-wider shadow-lg shadow-primary/20 transition-all flex items-center justify-center gap-2 leading-none text-center"
                    >
                        <i class="bx bx-bulb text-lg leading-none"></i>
                        <span>Buka Katalog Divisi PJU</span>
                    </button>
                </div>
            </div>

            <!-- PORTAL CARD 2: DIVISI ME -->
            <div class="group bg-white rounded-3xl md:rounded-[40px] border-2 border-primary/15 hover:border-secondary/40 shadow-xl shadow-primary/5 hover:shadow-2xl hover:shadow-secondary/15 transition-all duration-300 flex flex-col justify-between overflow-hidden">
                <div>
                    <!-- Visual Header -->
                    <div class="relative aspect-[16/9] overflow-hidden bg-primary-dark">
                        <img
                            src="/images/projects/me-impeller-rotor-stainless.webp"
                            alt="Divisi Mechanical Electrical PT. Multi Abadi Aksana"
                            width="800"
                            height="450"
                            class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0F1048] via-[#0F1048]/40 to-transparent flex flex-col justify-end p-6 text-white">
                            <span class="inline-flex items-center px-3 h-6 rounded-md bg-primary text-white text-[9px] font-black uppercase tracking-wider leading-none self-start mb-2">
                                Divisi Fabrikasi & Kelistrikan
                            </span>
                            <h2 class="text-xl sm:text-2xl font-black uppercase tracking-tight leading-tight">
                                Divisi Mechanical & Electrical
                            </h2>
                        </div>
                    </div>

                    <!-- Body Content -->
                    <div class="p-6 sm:p-8 space-y-5">
                        <p class="text-xs sm:text-sm text-text-secondary font-medium leading-relaxed">
                            Layanan manufaktur presisi dan perbaikan Impeller stainless steel, sistem blower industri, perakitan panel distribusi listrik utama (MDP/SDP), trafo, genset, serta suku cadang mesin.
                        </p>

                        <div class="space-y-2.5 pt-2 border-t border-primary/10">
                            <p class="text-[10px] font-black uppercase tracking-widest text-primary">Cakupan Unit Pengadaan ME:</p>
                            <ul class="space-y-2 text-xs font-semibold text-text-main">
                                <li class="flex items-center gap-2.5">
                                    <i class="bx bx-check-circle text-primary text-base shrink-0"></i>
                                    <span>Fabrikasi & Dynamic Balancing Impeller Stainless Steel</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <i class="bx bx-check-circle text-primary text-base shrink-0"></i>
                                    <span>Sistem Blower Industri & Saluran Ventilasi Pabrik</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <i class="bx bx-check-circle text-primary text-base shrink-0"></i>
                                    <span>Panel Utama Distribusi MDP/SDP, Trafo, & Genset Industri</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <i class="bx bx-check-circle text-primary text-base shrink-0"></i>
                                    <span>12 Lini Suku Cadang Alat Berat, Oli/Grease, Ban & Bearing</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Footer Action Area -->
                <div class="p-6 sm:p-8 pt-0">
                    <button
                        type="button"
                        wire:click="selectDivision('me')"
                        class="w-full h-12 md:h-14 rounded-2xl bg-secondary hover:bg-primary text-white font-black text-xs md:text-sm uppercase tracking-wider shadow-lg shadow-secondary/20 transition-all flex items-center justify-center gap-2 leading-none text-center"
                    >
                        <i class="bx bx-cog text-lg leading-none"></i>
                        <span>Buka Katalog Divisi ME</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Information & Dual Routing Notice -->
        <section class="bg-white p-6 sm:p-8 rounded-3xl border border-primary/10 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="space-y-1 max-w-2xl text-center md:text-left">
                <h3 class="text-sm font-black uppercase tracking-tight text-primary">
                    Butuh Penawaran RAB atau Konsultasi Spesifikasi Proyek?
                </h3>
                <p class="text-xs text-text-secondary font-medium leading-relaxed">
                    Tim administrasi proyek dan divisi suku cadang PT. Multi Abadi Aksana siap membantu survei lokasi dan penyusunan spesifikasi teknis resmi.
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-3 shrink-0">
                <a
                    href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan proyek.') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center justify-center gap-2 px-5 h-11 rounded-xl bg-primary text-white text-xs font-black uppercase tracking-wider hover:bg-primary-dark transition-all shadow-md leading-none"
                >
                    <i class="bx bxl-whatsapp text-base leading-none"></i>
                    <span>Konsultasi Proyek</span>
                </a>
                <a
                    href="https://wa.me/6281216592824?text={{ urlencode('Halo Admin Sparepart PT. Multi Abadi Aksana, saya ingin menanyakan ketersediaan suku cadang.') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center justify-center gap-2 px-5 h-11 rounded-xl bg-secondary text-white text-xs font-black uppercase tracking-wider hover:bg-primary transition-all shadow-md leading-none"
                >
                    <i class="bx bxs-wrench text-base leading-none"></i>
                    <span>Divisi Sparepart</span>
                </a>
            </div>
        </section>

    @else
        <!-- ============================================================== -->
        <!-- 2. ISOLATED DIVISION CATALOG VIEW (PJU ATAU ME)               -->
        <!-- ============================================================== -->

        <!-- Top Division Switcher Bar -->
        <div class="bg-white p-3 sm:p-4 rounded-2xl md:rounded-3xl border border-primary/10 shadow-sm flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-[10px] md:text-xs font-black uppercase tracking-wider text-text-secondary">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Beranda</a>
                <i class="bx bx-chevron-right text-sm"></i>
                <button type="button" wire:click="selectDivision('')" class="hover:text-primary transition-colors">
                    Katalog Produk
                </button>
                <i class="bx bx-chevron-right text-sm"></i>
                <span class="text-primary font-bold">
                    @if($selectedDivision === 'pju')
                        Divisi PJU (Penerangan Jalan)
                    @elseif($selectedDivision === 'me')
                        Divisi ME (Mechanical & Electrical)
                    @else
                        Hasil Pencarian
                    @endif
                </span>
            </div>

            <!-- Division Switcher Buttons -->
            <div class="flex flex-wrap items-center gap-2">
                <button
                    type="button"
                    wire:click="selectDivision('pju')"
                    class="inline-flex items-center justify-center gap-1.5 h-9 px-4 rounded-xl text-xs font-black uppercase tracking-wider leading-none transition-all {{ $selectedDivision === 'pju' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-[#F8FAFC] text-text-secondary hover:text-primary hover:bg-primary/5' }}"
                >
                    <i class="bx bx-bulb text-sm leading-none"></i>
                    <span>Katalog PJU</span>
                </button>

                <button
                    type="button"
                    wire:click="selectDivision('me')"
                    class="inline-flex items-center justify-center gap-1.5 h-9 px-4 rounded-xl text-xs font-black uppercase tracking-wider leading-none transition-all {{ $selectedDivision === 'me' ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-[#F8FAFC] text-text-secondary hover:text-primary hover:bg-primary/5' }}"
                >
                    <i class="bx bx-cog text-sm leading-none"></i>
                    <span>Katalog ME</span>
                </button>

                <button
                    type="button"
                    wire:click="selectDivision('')"
                    class="inline-flex items-center justify-center gap-1.5 h-9 px-3.5 rounded-xl border border-primary/15 bg-white text-text-secondary hover:text-primary text-[11px] font-bold uppercase tracking-wider leading-none transition-all"
                >
                    <i class="bx bx-grid-alt text-sm leading-none"></i>
                    <span>Ganti Divisi</span>
                </button>
            </div>
        </div>

        <!-- Technical Catalog Header Banner -->
        <section class="relative rounded-3xl md:rounded-[40px] bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#242882] p-6 sm:p-10 md:p-12 text-white overflow-hidden shadow-2xl shadow-primary/15">
            <div class="absolute -right-12 -top-12 w-56 h-56 bg-secondary/20 rotate-45 pointer-events-none"></div>
            <div class="relative z-10 max-w-3xl space-y-3">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center px-3 h-6 rounded-md bg-white/10 border border-white/20 text-blue-200 text-[10px] font-black uppercase tracking-widest leading-none">
                        @if($selectedDivision === 'pju')
                            Divisi Khusus PJU
                        @elseif($selectedDivision === 'me')
                            Divisi Khusus ME & Fabrikasi
                        @else
                            Katalog Pengadaan
                        @endif
                    </span>
                </div>
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase leading-[1.05]">
                    @if($selectedDivision === 'pju')
                        Katalog PJU & <span class="text-[#8DA2E0]">Tenaga Surya.</span>
                    @elseif($selectedDivision === 'me')
                        Katalog Mechanical & <span class="text-[#8DA2E0]">Electrical (ME).</span>
                    @else
                        Hasil Pencarian <span class="text-[#8DA2E0]">Produk.</span>
                    @endif
                </h1>
                <p class="text-xs sm:text-sm md:text-base text-blue-100/85 font-medium leading-relaxed">
                    @if($selectedDivision === 'pju')
                        Spesifikasi teknis PJU Tenaga Surya (All In One, Two In One, Konvensional), Lampu PJU PLN (Armature COB, Philips, Osram, Estika), serta Tiang Parabola & Octagonal Hot Dip Galvanized.
                    @elseif($selectedDivision === 'me')
                        Spesifikasi teknis fabrikasi & balancing Impeller stainless steel, sistem blower industri, panel distribusi kelistrikan (MDP/SDP, Trafo, Genset), serta 12 lini suku cadang mesin.
                    @else
                        Daftar unit material pengadaan PT. Multi Abadi Aksana yang sesuai dengan pencarian Anda.
                    @endif
                </p>
            </div>
        </section>

        <!-- Main Catalog Layout: Sidebar Filter (Left) + Product Grid (Right) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-8 items-start">
            <!-- Left Sidebar -->
            <aside class="lg:col-span-3 space-y-5 lg:sticky lg:top-24">
                <!-- Search Box -->
                <div class="bg-white p-5 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5 space-y-3">
                    <label for="catalog-search-input" class="block text-[10px] font-black uppercase tracking-[0.2em] text-primary">
                        Cari di Divisi Ini
                    </label>
                    <div class="relative">
                        <input
                            id="catalog-search-input"
                            type="text"
                            wire:model.live.debounce.300ms="search"
                            placeholder="{{ $selectedDivision === 'pju' ? 'Cari Solar, Tiang, Philips...' : 'Cari Impeller, Panel, Oli...' }}"
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

                <!-- Category Sub-filter List -->
                <div class="bg-white p-5 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5 space-y-3">
                    <div class="flex items-center justify-between">
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">
                            {{ $selectedDivision === 'pju' ? 'Kategori PJU' : ($selectedDivision === 'me' ? 'Kategori ME' : 'Kategori Unit') }}
                        </p>
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
                            <span>{{ $selectedDivision === 'pju' ? 'Semua Unit PJU' : ($selectedDivision === 'me' ? 'Semua Unit ME' : 'Semua Unit') }}</span>
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

                <!-- Direct Division Consultation Box -->
                <div class="bg-[#0F1048] text-white p-5 rounded-3xl space-y-3.5 shadow-xl">
                    <h2 class="text-sm font-black uppercase tracking-tight leading-snug">
                        {{ $selectedDivision === 'pju' ? 'Konsultasi Proyek & Spesifikasi PJU' : 'Konsultasi Teknis & Fabrikasi ME' }}
                    </h2>
                    <p class="text-[11px] text-blue-100/80 font-medium leading-relaxed">
                        {{ $selectedDivision === 'pju'
                            ? 'Diskusikan RAB pengadaan tiang, kebutuhan lumen lampu jalan, dan jadwal survei lapangan langsung dengan tim proyek kami:'
                            : 'Diskusikan gambar teknik impeller, kapasitas blower pabrik, atau stok suku cadang mesin langsung dengan tim teknis:' }}
                    </p>
                    <div class="space-y-2 pt-1">
                        @if($selectedDivision === 'pju')
                            <a
                                href="https://wa.me/6282342979898?text={{ urlencode('Halo Admin Proyek PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai spesifikasi pengadaan PJU / Tiang Galvanis.') }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="w-full h-11 px-4 rounded-xl bg-white text-primary hover:bg-secondary hover:text-white text-[11px] font-black uppercase tracking-wider transition-all flex items-center justify-between leading-none"
                            >
                                <span>WA Admin Proyek PJU</span>
                                <i class="bx bxl-whatsapp text-base leading-none"></i>
                            </a>
                        @else
                            <a
                                href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim ME PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai fabrikasi Impeller / Blower / Panel.') }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="w-full h-11 px-4 rounded-xl bg-white text-primary hover:bg-secondary hover:text-white text-[11px] font-black uppercase tracking-wider transition-all flex items-center justify-between leading-none"
                            >
                                <span>WA Tim ME & Fabrikasi</span>
                                <i class="bx bxl-whatsapp text-base leading-none"></i>
                            </a>
                            <a
                                href="https://wa.me/6281216592824?text={{ urlencode('Halo Admin Sparepart PT. Multi Abadi Aksana, saya ingin menanyakan ketersediaan suku cadang / pelumas.') }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="w-full h-11 px-4 rounded-xl bg-white/10 hover:bg-white hover:text-primary border border-white/15 text-white text-[11px] font-black uppercase tracking-wider transition-all flex items-center justify-between leading-none"
                            >
                                <span>WA Divisi Sparepart</span>
                                <i class="bx bxl-whatsapp text-base leading-none"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </aside>

            <!-- Right Main Content: Active Filter Bar + Products Grid -->
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
                                Tidak ada produk pengadaan yang cocok dengan kriteria pencarian atau kategori yang dipilih di divisi ini.
                            </p>
                        </div>
                        <button
                            type="button"
                            wire:click="$set('search', ''); $set('selectedCategory', 'semua')"
                            class="inline-flex items-center justify-center px-6 h-11 rounded-xl bg-primary text-white text-xs font-black uppercase tracking-wider hover:bg-primary-dark transition-all leading-none text-center"
                        >
                            <span>Lihat Semua Produk Divisi Ini</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
