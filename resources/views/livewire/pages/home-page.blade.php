<div class="space-y-14 md:space-y-24">
    <!-- 1. Split Engineering B2B/B2G Hero Section (Distinct PT. MAA Layout) -->
    <section class="relative pt-2 md:pt-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center bg-gradient-to-br from-[#1B1B6C] via-[#131454] to-[#0F1048] rounded-3xl md:rounded-[44px] p-6 sm:p-10 md:p-14 text-white shadow-2xl shadow-primary/20 overflow-hidden relative border border-white/10">
            <!-- Diagonal Geometric Stripe Accent (Matching ComPro PDF Header) -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-secondary/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 right-10 hidden xl:flex gap-2 opacity-20 pointer-events-none">
                <div class="w-4 h-16 bg-secondary -skew-x-12"></div>
                <div class="w-4 h-16 bg-secondary -skew-x-12"></div>
                <div class="w-4 h-16 bg-secondary -skew-x-12"></div>
                <div class="w-4 h-16 bg-secondary -skew-x-12"></div>
            </div>

            <!-- Left Column: Identity, Slogan & Dual CTA -->
            <div class="lg:col-span-7 space-y-5 md:space-y-6 relative z-10">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em]">
                        General Trading, Supplier & Contractor
                    </span>
                    <span class="px-3.5 py-1.5 rounded-lg bg-white/10 border border-white/15 text-blue-100 text-[9px] md:text-[10px] font-black uppercase tracking-widest flex items-center gap-1.5">
                        <i class="bx bxs-shield-plus text-secondary text-sm"></i>
                        <span>Utamakan K3</span>
                    </span>
                </div>

                <h1 class="text-3xl sm:text-5xl md:text-6xl font-black uppercase tracking-tighter leading-[1.02]">
                    PT. Multi Abadi <br />
                    <span class="text-blue-200">Aksana.</span>
                </h1>

                <p class="text-sm sm:text-base md:text-lg text-white/90 font-semibold leading-relaxed max-w-2xl border-l-4 border-secondary pl-4 italic">
                    "Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan"
                </p>

                <p class="text-xs sm:text-sm text-blue-100/85 font-medium leading-relaxed max-w-2xl">
                    Mitra strategis sektor publik (pemerintahan/dinas) maupun swasta dalam pengadaan barang dan jasa konstruksi: <strong>Penerangan Jalan Umum (PJU)</strong>, <strong>Interior & Exterior</strong>, <strong>Mechanical & Electrical (Impeller)</strong>, serta <strong>Sparepart & Equipment</strong>.
                </p>

                <div class="pt-2 flex flex-wrap gap-3">
                    <a
                        href="{{ route('products.index') }}"
                        class="px-6 md:px-8 py-3.5 md:py-4 bg-white text-primary rounded-xl md:rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-widest hover:bg-secondary hover:text-white transition-all shadow-xl flex items-center gap-2"
                    >
                        <span>Jelajahi Katalog Produk</span>
                        <i class="bx bx-right-arrow-alt text-lg"></i>
                    </a>
                    <a
                        href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan barang & jasa proyek.') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="px-6 md:px-8 py-3.5 md:py-4 bg-secondary/90 hover:bg-secondary text-white rounded-xl md:rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-widest transition-all flex items-center gap-2 shadow-lg"
                    >
                        <i class="bx bxl-whatsapp text-lg"></i>
                        <span>Konsultasi Proyek</span>
                    </a>
                    <a
                        href="/files/ComPro_MULTI_ABADI_AKSANA.pdf"
                        target="_blank"
                        class="px-5 py-3.5 md:py-4 bg-white/10 hover:bg-white/20 border border-white/20 text-white rounded-xl md:rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-widest transition-all flex items-center gap-2"
                    >
                        <i class="bx bxs-file-pdf text-lg text-blue-200"></i>
                        <span>Unduh ComPro PDF</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: 2x2 Authentic Field Photo Collage from PT. MAA PDFs -->
            <div class="lg:col-span-5 grid grid-cols-2 gap-3 md:gap-4 relative z-10">
                <div class="space-y-3 md:space-y-4">
                    <div class="aspect-[4/5] rounded-2xl md:rounded-3xl overflow-hidden border-2 border-white/20 shadow-xl relative group">
                        <img
                            src="/images/projects/pju-k3-gempol-sidoarjo.webp"
                            alt="Projek PJU Gempol Sidoarjo Malang PT. Multi Abadi Aksana"
                            width="480"
                            height="600"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        />
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-3">
                            <span class="text-[8px] font-black uppercase tracking-widest text-blue-200 block">Pilar 01 • PJU</span>
                            <p class="text-[10px] font-bold text-white leading-tight">Ruas Gempol - Sidoarjo - Malang</p>
                        </div>
                    </div>
                    <div class="aspect-square rounded-2xl md:rounded-3xl overflow-hidden border-2 border-white/20 shadow-xl relative group">
                        <img
                            src="/images/projects/interior-adelle-jewellery.webp"
                            alt="Projek Interior Adelle Jewellery PT. Multi Abadi Aksana"
                            width="480"
                            height="480"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        />
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-3">
                            <span class="text-[8px] font-black uppercase tracking-widest text-blue-200 block">Pilar 02 • Interior</span>
                            <p class="text-[10px] font-bold text-white leading-tight">Adelle Jewellery Store</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-3 md:space-y-4 pt-4 md:pt-8">
                    <div class="aspect-square rounded-2xl md:rounded-3xl overflow-hidden border-2 border-white/20 shadow-xl relative group">
                        <img
                            src="/images/projects/me-impeller-rotor-stainless.webp"
                            alt="Fabrikasi Impeller Unit PGIC-E34 PT. Multi Abadi Aksana"
                            width="480"
                            height="480"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        />
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-3">
                            <span class="text-[8px] font-black uppercase tracking-widest text-blue-200 block">Pilar 03 • M&E Impeller</span>
                            <p class="text-[10px] font-bold text-white leading-tight">Unit Industri PGIC-E34</p>
                        </div>
                    </div>
                    <div class="aspect-[4/5] rounded-2xl md:rounded-3xl overflow-hidden border-2 border-white/20 shadow-xl relative group">
                        <img
                            src="/images/products/sparepart-oli.webp"
                            alt="Divisi Sparepart & Equipment PT. Multi Abadi Aksana"
                            width="480"
                            height="600"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        />
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-3">
                            <span class="text-[8px] font-black uppercase tracking-widest text-blue-200 block">Pilar 04 • Sparepart</span>
                            <p class="text-[10px] font-bold text-white leading-tight">Oli, Grease, Ban, Aki & Filter</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Running Marquee Strip (Sesuai PRD 4.2.4) -->
    <div class="py-4 md:py-5 bg-primary -mx-4 sm:-mx-6 overflow-hidden flex whitespace-nowrap border-y-2 border-secondary/40 shadow-md">
        <div class="animate-marquee flex gap-10 md:gap-14 items-center">
            @for($i = 0; $i < 6; $i++)
                <div class="flex items-center gap-10 md:gap-14">
                    <span class="text-sm md:text-lg font-black text-white uppercase tracking-widest">PT. MULTI ABADI AKSANA</span>
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    <span class="text-sm md:text-lg font-black text-blue-200 uppercase tracking-widest">PENGADAAN BARANG DAN JASA</span>
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    <span class="text-sm md:text-lg font-black text-white uppercase tracking-widest">UTAMAKAN KESELAMATAN DAN KESEHATAN KERJA (K3)</span>
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                </div>
            @endfor
        </div>
    </div>

    <!-- 3. Interactive 4 Pilar Bisnis Tabs (Pengadaan Barang vs Pengadaan Jasa - Sesuai ComPro Hal 4, 6, 8, 10) -->
    <section
        x-data="{ activePillar: 0 }"
        class="space-y-8 md:space-y-10"
    >
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div class="space-y-2">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-secondary block">Cakupan Layanan Terintegrasi</span>
                <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none text-text-main">
                    4 Pilar Bisnis <span class="text-gradient">Barang & Jasa.</span>
                </h2>
            </div>
            <p class="text-xs md:text-sm text-text-secondary font-medium max-w-md">
                Pilih divisi di bawah ini untuk melihat rincian cakupan <strong>Pengadaan Barang</strong> dan <strong>Pengadaan Jasa</strong> sesuai Company Profile resmi kami.
            </p>
        </div>

        <!-- Pillar Selector Tabs -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
            @php
                $pillarIcons = [
                    'PJU' => 'bx-bulb',
                    'INTERIOR' => 'bx-building-house',
                    'ME' => 'bx-cog',
                    'SPAREPART' => 'bx-wrench',
                ];
            @endphp
            @foreach($pillars as $idx => $pillar)
                <button
                    type="button"
                    @click="activePillar = {{ $idx }}"
                    :class="activePillar === {{ $idx }} ? 'bg-primary text-white shadow-xl shadow-primary/20 border-primary' : 'bg-white text-text-main hover:bg-primary/5 border-primary/10'"
                    class="p-4 md:p-5 rounded-2xl border text-left transition-all duration-300 flex items-center gap-3.5"
                >
                    <div
                        :class="activePillar === {{ $idx }} ? 'bg-secondary text-white' : 'bg-primary/10 text-primary'"
                        class="w-11 h-11 rounded-xl flex items-center justify-center text-2xl shrink-0 transition-colors"
                    >
                        <i class="bx {{ $pillarIcons[$pillar->code] ?? 'bx-layer' }}"></i>
                    </div>
                    <div class="min-w-0">
                        <span
                            :class="activePillar === {{ $idx }} ? 'text-blue-200' : 'text-secondary'"
                            class="text-[9px] font-black uppercase tracking-widest block"
                        >
                            Pilar 0{{ $idx + 1 }}
                        </span>
                        <h3 class="text-xs md:text-sm font-black uppercase tracking-tight truncate">
                            {{ $pillar->name }}
                        </h3>
                    </div>
                </button>
            @endforeach
        </div>

        <!-- Active Pillar Detail Panel -->
        @foreach($pillars as $idx => $pillar)
            @php
                $barangScopes = $pillar->scopes->filter(fn($s) => ($s->scope_type?->value ?? $s->scope_type) === 'pengadaan');
                $jasaScopes = $pillar->scopes->filter(fn($s) => ($s->scope_type?->value ?? $s->scope_type) === 'jasa');
                $pillarPhoto = match($pillar->code) {
                    'PJU' => '/images/projects/pju-k3-gempol-sidoarjo.webp',
                    'INTERIOR' => '/images/projects/interior-adelle-jewellery.webp',
                    'ME' => '/images/projects/me-terminasi-kabel-pondasi.webp',
                    default => '/images/products/sparepart-oli.webp',
                };
            @endphp
            <div
                x-show="activePillar === {{ $idx }}"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                style="{{ $idx !== 0 ? 'display: none;' : '' }}"
                class="glass-bright rounded-3xl md:rounded-[40px] p-6 sm:p-8 md:p-10 border border-primary/15 shadow-xl grid grid-cols-1 lg:grid-cols-12 gap-8 items-center"
            >
                <div class="lg:col-span-4">
                    <div class="aspect-[4/5] rounded-2xl md:rounded-3xl overflow-hidden border-2 border-primary/10 shadow-lg relative bg-primary-dark">
                        <img
                            src="{{ $pillarPhoto }}"
                            alt="{{ $pillar->name }}"
                            loading="lazy"
                            decoding="async"
                            width="600"
                            height="750"
                            class="w-full h-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0F1048] via-transparent to-transparent flex flex-col justify-end p-5 text-white">
                            <span class="text-[9px] font-black uppercase tracking-widest text-blue-200">Dokumentasi Asli PT. MAA</span>
                            <h4 class="text-lg font-black uppercase tracking-tight">{{ $pillar->name }}</h4>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8 space-y-6">
                    <div class="space-y-2 border-b border-primary/10 pb-4">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <h3 class="text-xl md:text-3xl font-black uppercase tracking-tighter text-primary">
                                {{ $pillar->name }}
                            </h3>
                            <a
                                href="{{ route('products.index') }}"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-primary text-white text-[10px] font-black uppercase tracking-widest hover:bg-primary-dark transition-all"
                            >
                                <span>Lihat Katalog Divisi</span>
                                <i class="bx bx-right-arrow-alt text-base"></i>
                            </a>
                        </div>
                        <p class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed">
                            {{ $pillar->short_description }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Pengadaan Barang -->
                        <div class="p-5 rounded-2xl bg-white border border-primary/10 space-y-3 shadow-sm">
                            <div class="flex items-center gap-2.5">
                                <span class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center text-base">
                                    <i class="bx bx-package"></i>
                                </span>
                                <h4 class="text-xs font-black uppercase tracking-wider text-primary">
                                    Pengadaan Barang (Hardware & Material)
                                </h4>
                            </div>
                            <ul class="space-y-2.5">
                                @foreach($barangScopes as $scope)
                                    <li class="text-xs text-text-secondary leading-relaxed">
                                        <strong class="text-text-main font-bold block">• {{ $scope->title }}</strong>
                                        <span>{{ $scope->description }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Pengadaan Jasa -->
                        <div class="p-5 rounded-2xl bg-primary/5 border border-primary/10 space-y-3">
                            <div class="flex items-center gap-2.5">
                                <span class="w-8 h-8 rounded-lg bg-secondary text-white flex items-center justify-center text-base">
                                    <i class="bx bx-hard-hat"></i>
                                </span>
                                <h4 class="text-xs font-black uppercase tracking-wider text-primary">
                                    Pengadaan Jasa (Services & Execution)
                                </h4>
                            </div>
                            <ul class="space-y-2.5">
                                @foreach($jasaScopes as $scope)
                                    <li class="text-xs text-text-secondary leading-relaxed">
                                        <strong class="text-text-main font-bold block">• {{ $scope->title }}</strong>
                                        <span>{{ $scope->description }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <!-- 4. Why You Should Choose Us & The Process (Sesuai ComPro Hal 5 & Proposal PJU Hal 4) -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
        <!-- Why Choose Us (3 Pillars) -->
        <div class="lg:col-span-7 glass p-6 sm:p-8 md:p-10 rounded-3xl md:rounded-[40px] border-primary/10 shadow-xl flex flex-col justify-between space-y-6">
            <div class="space-y-2">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-secondary block">Why You Should Choose Us?</span>
                <h2 class="text-2xl sm:text-4xl font-black uppercase tracking-tighter text-primary">
                    Mengapa Bermitra Dengan PT. Multi Abadi Aksana?
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="p-5 rounded-2xl bg-white border border-primary/10 space-y-3 shadow-sm">
                    <div class="w-11 h-11 rounded-xl bg-primary text-white flex items-center justify-center text-2xl">
                        <i class="bx bx-check-shield"></i>
                    </div>
                    <h3 class="text-sm font-black uppercase tracking-tight text-primary">Kualitas Terjamin</h3>
                    <p class="text-xs text-text-secondary font-medium leading-relaxed">
                        Produk dan material berkualitas tinggi sesuai spesifikasi teknis dan standar keselamatan.
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-primary/10 space-y-3 shadow-sm">
                    <div class="w-11 h-11 rounded-xl bg-secondary text-white flex items-center justify-center text-2xl">
                        <i class="bx bx-user-check"></i>
                    </div>
                    <h3 class="text-sm font-black uppercase tracking-tight text-primary">Tenaga Ahli Berpengalaman</h3>
                    <p class="text-xs text-text-secondary font-medium leading-relaxed">
                        Didukung oleh tim profesional yang berpengalaman di bidangnya serta jaringan supplier yang luas.
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-primary/10 space-y-3 shadow-sm">
                    <div class="w-11 h-11 rounded-xl bg-primary text-white flex items-center justify-center text-2xl">
                        <i class="bx bx-timer"></i>
                    </div>
                    <h3 class="text-sm font-black uppercase tracking-tight text-primary">Tepat Waktu & Efisien</h3>
                    <p class="text-xs text-text-secondary font-medium leading-relaxed">
                        Komitmen penuh terhadap ketepatan waktu pengerjaan, pengadaan transparan, dan efisiensi anggaran.
                    </p>
                </div>
            </div>
        </div>

        <!-- The Process: 1. KOMUNIKASI -> 2. SURVEI -> 3. NEGOSIASI -> 4. DEAL -->
        <div class="lg:col-span-5 bg-primary rounded-3xl md:rounded-[40px] p-6 sm:p-8 md:p-10 text-white shadow-xl flex flex-col justify-between space-y-6 relative overflow-hidden">
            <div class="space-y-2 relative z-10">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-200 block">The Process</span>
                <h2 class="text-2xl sm:text-3xl font-black uppercase tracking-tighter">
                    4 Tahap Alur Kerja Sama Proyek
                </h2>
                <p class="text-xs text-blue-100/80 font-medium">
                    Alur standar pengadaan barang dan jasa PT. Multi Abadi Aksana yang transparan dan terukur:
                </p>
            </div>

            <div class="grid grid-cols-2 gap-3 relative z-10">
                @php
                    $processes = [
                        ['step' => '01', 'name' => 'KOMUNIKASI', 'desc' => 'Konsultasi kebutuhan barang/jasa via WhatsApp atau tatap muka.'],
                        ['step' => '02', 'name' => 'SURVEI', 'desc' => 'Peninjauan teknis lokasi proyek, perhitungan lux/beban, & spek.'],
                        ['step' => '03', 'name' => 'NEGOSIASI', 'desc' => 'Penyusunan RAB transparan & penyesuaian efisiensi anggaran.'],
                        ['step' => '04', 'name' => 'DEAL', 'desc' => 'Pengiriman material, eksekusi instalasi berstandar K3 & garansi.'],
                    ];
                @endphp
                @foreach($processes as $proc)
                    <div class="p-4 rounded-2xl bg-white/10 border border-white/15 backdrop-blur-sm space-y-1">
                        <span class="text-[10px] font-black text-secondary bg-white px-2 py-0.5 rounded-md inline-block">{{ $proc['step'] }}</span>
                        <h3 class="text-sm font-black uppercase tracking-wider text-white pt-1">{{ $proc['name'] }}</h3>
                        <p class="text-[11px] text-blue-100/85 leading-snug">{{ $proc['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. Featured Products Showcase (3-Column Technical B2B Cards) -->
    <section class="space-y-8 md:space-y-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div class="space-y-2">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-secondary block">Katalog Pengadaan Utama</span>
                <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none">
                    Produk & <span class="text-gradient">Material Unggulan.</span>
                </h2>
                <p class="text-xs md:text-sm text-text-secondary font-medium">
                    Etalase produk PJU Tenaga Surya, PJU PLN, Fabrikasi Impeller, Interior-Exterior, serta Sparepart Equipment sesuai dokumen resmi PT. MAA.
                </p>
            </div>
            <a
                href="{{ route('products.index') }}"
                class="px-5 py-3 rounded-xl bg-primary text-white font-black text-xs hover:bg-primary-dark transition-all flex items-center gap-2 uppercase tracking-wider shrink-0 shadow-md"
            >
                <span>Lihat Seluruh 12+ Katalog</span>
                <i class="bx bx-right-arrow-alt text-lg"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($featuredProducts as $product)
                <livewire:components.product-card :product="$product" :key="'home-prod-'.$product->id" />
            @endforeach
        </div>
    </section>

    <!-- 6. Projek On Duty (Dokumentasi Asli ComPro Hal 6, 7, 8, 9, 10, 11) -->
    <section class="space-y-8 md:space-y-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div class="space-y-2">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-secondary block">Dokumentasi Lapangan Asli</span>
                <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none">
                    Projek <span class="text-gradient">On Duty.</span>
                </h2>
                <p class="text-xs md:text-sm text-text-secondary font-medium">
                    Bukti nyata pelaksanaan proyek PJU Ruas Gempol-Sidoarjo-Malang, Interior Adelle Jewellery, dan Perawatan Mesin PGIC-E34.
                </p>
            </div>
            <a
                href="{{ route('gallery.index') }}"
                class="px-5 py-3 rounded-xl glass font-black text-xs text-primary hover:bg-primary hover:text-white transition-all flex items-center gap-2 uppercase tracking-wider shrink-0"
            >
                <span>Buka Semua Dokumentasi</span>
                <i class="bx bx-right-arrow-alt text-lg"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredGalleries as $gallery)
                <a href="{{ route('gallery.index') }}" class="group relative aspect-[3/4] rounded-3xl overflow-hidden glass border-primary/10 shadow-xl block bg-primary-dark">
                    <img
                        src="{{ $gallery->image_path }}"
                        alt="{{ $gallery->title }}"
                        loading="lazy"
                        decoding="async"
                        width="600"
                        height="800"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F1048] via-[#1B1B6C]/45 to-transparent opacity-95 flex flex-col justify-end p-5">
                        <span class="px-2.5 py-1 rounded-md bg-secondary text-[8px] font-black uppercase tracking-widest text-white self-start mb-2">
                            {{ $gallery->client_or_unit_code }}
                        </span>
                        <h3 class="text-sm font-black text-white uppercase tracking-tight leading-snug line-clamp-2">
                            {{ $gallery->title }}
                        </h3>
                        <p class="text-[10px] text-blue-200 font-semibold mt-1 flex items-center gap-1">
                            <i class="bx bxs-map"></i>
                            <span>{{ $gallery->location }}</span>
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- 7. Official PDF Documents Download Strip (ComPro, Proposal PJU, Katalog Sparepart) -->
    <section class="glass-bright p-6 sm:p-8 md:p-10 rounded-3xl md:rounded-[40px] border border-primary/15 shadow-xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            <div class="lg:col-span-5 space-y-2">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-secondary block">Dokumen Resmi Perusahaan</span>
                <h2 class="text-xl sm:text-3xl font-black uppercase tracking-tighter text-primary">
                    Unduh Katalog & Company Profile PDF
                </h2>
                <p class="text-xs text-text-secondary font-medium leading-relaxed">
                    Akses langsung 3 dokumen resmi PT. Multi Abadi Aksana untuk keperluan lampiran pengadaan, tender, maupun peninjauan spesifikasi.
                </p>
            </div>
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-3.5">
                <a
                    href="/files/ComPro_MULTI_ABADI_AKSANA.pdf"
                    target="_blank"
                    class="p-4 rounded-2xl bg-white hover:bg-primary hover:text-white border border-primary/15 transition-all group flex flex-col justify-between space-y-3 shadow-sm"
                >
                    <i class="bx bxs-file-pdf text-3xl text-primary group-hover:text-blue-200"></i>
                    <div>
                        <span class="text-[9px] font-black uppercase tracking-widest text-secondary group-hover:text-blue-200 block">Dokumen 01</span>
                        <h3 class="text-xs font-black uppercase tracking-tight">Company Profile PT. MAA</h3>
                    </div>
                </a>
                <a
                    href="/files/PROPOSAL_PJU_MAA.pdf"
                    target="_blank"
                    class="p-4 rounded-2xl bg-white hover:bg-primary hover:text-white border border-primary/15 transition-all group flex flex-col justify-between space-y-3 shadow-sm"
                >
                    <i class="bx bxs-bulb text-3xl text-primary group-hover:text-blue-200"></i>
                    <div>
                        <span class="text-[9px] font-black uppercase tracking-widest text-secondary group-hover:text-blue-200 block">Dokumen 02</span>
                        <h3 class="text-xs font-black uppercase tracking-tight">Proposal PJU PLN & Surya</h3>
                    </div>
                </a>
                <a
                    href="/files/sparepart_equipment.pdf"
                    target="_blank"
                    class="p-4 rounded-2xl bg-white hover:bg-primary hover:text-white border border-primary/15 transition-all group flex flex-col justify-between space-y-3 shadow-sm"
                >
                    <i class="bx bxs-wrench text-3xl text-secondary group-hover:text-blue-200"></i>
                    <div>
                        <span class="text-[9px] font-black uppercase tracking-widest text-secondary group-hover:text-blue-200 block">Dokumen 03</span>
                        <h3 class="text-xs font-black uppercase tracking-tight">Katalog Sparepart Equipment</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- 8. Dual Office & Contact Section (Head Office Taman & Workshop Sukodono Sidoarjo) -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
        <div class="lg:col-span-6 space-y-6">
            <div class="space-y-2">
                <span class="px-3.5 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest inline-block">
                    Please Get In Touch With Us
                </span>
                <h2 class="text-2xl sm:text-4xl font-black uppercase tracking-tighter leading-tight">
                    Kantor & Workshop <span class="text-gradient">Sidoarjo.</span>
                </h2>
            </div>

            <div class="space-y-3.5">
                <div class="p-4 rounded-2xl glass border-primary/10 flex items-start gap-3.5">
                    <div class="w-10 h-10 shrink-0 bg-primary text-white rounded-xl flex items-center justify-center text-lg">
                        <i class="bx bxs-building-house"></i>
                    </div>
                    <div>
                        <p class="text-[9px] font-black uppercase tracking-widest text-secondary">Head Office (ComPro & PJU)</p>
                        <p class="text-xs md:text-sm font-black text-text-main mt-0.5">
                            Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257
                        </p>
                    </div>
                </div>

                <div class="p-4 rounded-2xl glass border-primary/10 flex items-start gap-3.5">
                    <div class="w-10 h-10 shrink-0 bg-secondary text-white rounded-xl flex items-center justify-center text-lg">
                        <i class="bx bxs-wrench"></i>
                    </div>
                    <div>
                        <p class="text-[9px] font-black uppercase tracking-widest text-secondary">Kantor & Workshop Sparepart</p>
                        <p class="text-xs md:text-sm font-black text-text-main mt-0.5">
                            Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Kabupaten Sidoarjo, Jawa Timur
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <a
                        href="https://wa.me/6282342979898"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="p-4 rounded-2xl bg-primary text-white hover:bg-primary-dark transition-all flex items-center justify-between"
                    >
                        <div>
                            <span class="text-[9px] font-extrabold uppercase tracking-widest text-blue-200 block">WA Umum & PJU</span>
                            <span class="text-sm font-black">+62 823-4297-9898</span>
                        </div>
                        <i class="bx bxl-whatsapp text-2xl"></i>
                    </a>
                    <a
                        href="https://wa.me/6281216592824"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="p-4 rounded-2xl bg-secondary text-white hover:bg-primary transition-all flex items-center justify-between"
                    >
                        <div>
                            <span class="text-[9px] font-extrabold uppercase tracking-widest text-white/80 block">WA Divisi Sparepart</span>
                            <span class="text-sm font-black">+62 812-1659-2824</span>
                        </div>
                        <i class="bx bxl-whatsapp text-2xl"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="lg:col-span-6 glass p-2.5 rounded-3xl md:rounded-[40px] border-primary/10 shadow-xl h-80 md:h-96 overflow-hidden">
            <iframe
                title="Peta Lokasi Kantor PT. Multi Abadi Aksana di Sidoarjo"
                src="https://maps.google.com/maps?q=Taman+Surya+Agung+Sidoarjo&t=&z=15&ie=UTF8&iwloc=&output=embed"
                width="100%"
                height="100%"
                style="border: 0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="rounded-2xl md:rounded-[32px] w-full h-full"
            ></iframe>
        </div>
    </section>
</div>
