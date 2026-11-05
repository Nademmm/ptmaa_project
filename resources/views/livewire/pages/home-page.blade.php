<div class="space-y-14 md:space-y-24">
    <!-- 1. Hero Slider Section -->
    <section
        x-data="{
            currentSlide: 0,
            slides: [
                {
                    image: '/images/projects/pju-k3-gempol-sidoarjo.webp',
                    title: 'Solusi Infrastruktur & Konstruksi Terintegrasi',
                    desc: 'Mitra strategis pengadaan Lampu PJU Tenaga Surya & PLN, Mechanical Electrical, Interior Exterior, serta Sparepart Industri di Indonesia.'
                },
                {
                    image: '/images/projects/pju-tiang-jalan-tol.webp',
                    title: 'Penerangan Jalan Berstandar Mutu & K3',
                    desc: 'Pengadaan dan instalasi PJU All In One, Two In One, dan Tiang Octagonal Hot Dip Galvanized untuk jalan nasional maupun kawasan industri.'
                },
                {
                    image: '/images/projects/interior-adelle-jewellery.webp',
                    title: 'Pengerjaan Interior & Exterior Presisi',
                    desc: 'Pelaksanaan pekerjaan tata ruang komersial, partisi perkantoran, koridor modern, serta fasilitas gedung berstandar estetika tinggi.'
                },
                {
                    image: '/images/projects/me-impeller-rotor-stainless.webp',
                    title: 'Fabrikasi Presisi & Pasokan Suku Cadang',
                    desc: 'Layanan fabrikasi impeller stainless steel industri, sistem blower industri, hingga 12 lini suku cadang dan pelumas alat berat.'
                }
            ],
            timer: null,
            init() {
                this.startTimer();
            },
            startTimer() {
                this.timer = setInterval(() => {
                    this.next();
                }, 6000);
            },
            resetTimer() {
                clearInterval(this.timer);
                this.startTimer();
            },
            next() {
                this.currentSlide = (this.currentSlide + 1) % this.slides.length;
            },
            prev() {
                this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
            }
        }"
        class="relative pt-1 md:pt-2 overflow-hidden"
    >
        <div class="relative w-full aspect-4/5 sm:aspect-video md:aspect-21/9 rounded-3xl md:rounded-[48px] overflow-hidden shadow-2xl shadow-primary/15 border-2 md:border-8 border-white bg-primary-dark">
            <template x-for="(slide, index) in slides" :key="index">
                <div
                    x-show="currentSlide === index"
                    x-transition:enter="transition ease-out duration-700"
                    x-transition:enter-start="opacity-0 scale-105"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-500"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute inset-0 w-full h-full"
                >
                    <img
                        :src="slide.image"
                        :alt="slide.title"
                        width="1600"
                        height="685"
                        class="w-full h-full object-cover"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F1048] via-[#1B1B6C]/60 to-transparent flex flex-col justify-end p-6 sm:p-10 md:p-16 text-white">
                        <div class="max-w-3xl space-y-3 md:space-y-4">
                            <h1
                                x-text="slide.title"
                                class="text-2xl sm:text-4xl md:text-6xl font-black uppercase tracking-tighter leading-[1.05]"
                            ></h1>
                            <p
                                x-text="slide.desc"
                                class="text-xs sm:text-sm md:text-lg text-white/90 font-medium max-w-2xl leading-relaxed line-clamp-3 md:line-clamp-none"
                            ></p>
                            <div class="pt-2 flex flex-wrap gap-3">
                                <a
                                    href="{{ route('products.index') }}"
                                    class="px-5 md:px-7 py-3 md:py-3.5 bg-white text-primary rounded-xl md:rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-widest hover:bg-secondary hover:text-white transition-all shadow-xl"
                                >
                                    Eksplorasi Katalog
                                </a>
                                <a
                                    href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan barang & jasa.') }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="px-5 md:px-7 py-3 md:py-3.5 bg-primary/60 backdrop-blur-md border border-white/25 text-white rounded-xl md:rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-widest hover:bg-white hover:text-primary transition-all flex items-center gap-2"
                                >
                                    <i class="bx bxl-whatsapp text-base"></i>
                                    <span>Konsultasi Proyek</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Slider Controls -->
            <button
                type="button"
                @click="prev(); resetTimer()"
                aria-label="Slide sebelumnya"
                class="absolute left-3 md:left-6 top-1/2 -translate-y-1/2 w-11 h-11 md:w-12 md:h-12 rounded-xl md:rounded-2xl glass flex items-center justify-center text-lg md:text-2xl text-primary hover:bg-primary hover:text-white transition-all z-10 shadow-lg"
            >
                <i class="bx bx-chevron-left"></i>
            </button>
            <button
                type="button"
                @click="next(); resetTimer()"
                aria-label="Slide berikutnya"
                class="absolute right-3 md:right-6 top-1/2 -translate-y-1/2 w-11 h-11 md:w-12 md:h-12 rounded-xl md:rounded-2xl glass flex items-center justify-center text-lg md:text-2xl text-primary hover:bg-primary hover:text-white transition-all z-10 shadow-lg"
            >
                <i class="bx bx-chevron-right"></i>
            </button>

            <!-- Dots Indicator -->
            <div class="absolute bottom-4 md:bottom-6 right-6 md:right-12 flex gap-2 z-10">
                <template x-for="(slide, index) in slides" :key="index">
                    <button
                        type="button"
                        @click="currentSlide = index; resetTimer()"
                        :aria-label="'Ke slide ' + (index + 1)"
                        :class="currentSlide === index ? 'bg-white w-8' : 'bg-white/40 w-2.5'"
                        class="h-2.5 rounded-full transition-all duration-300"
                    ></button>
                </template>
            </div>
        </div>
    </section>

    <!-- 2. Interactive 4 Pilar Bisnis Tabs (Pengadaan Barang vs Pengadaan Jasa) -->
    <section
        x-data="{ activePillar: 0 }"
        class="space-y-8 md:space-y-10"
    >
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none text-text-main">
                4 Pilar Bisnis <span class="text-gradient">Barang & Jasa.</span>
            </h2>
            <p class="text-xs md:text-sm text-text-secondary font-medium max-w-md">
                Pilih divisi di bawah ini untuk melihat rincian cakupan <strong>Pengadaan Barang</strong> dan <strong>Pengadaan Jasa</strong> PT. Multi Abadi Aksana.
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
                    <h3 class="text-xs md:text-sm font-black uppercase tracking-tight truncate">
                        {{ $pillar->name }}
                    </h3>
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
                                <div class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center text-base">
                                    <i class="bx bx-package"></i>
                                </div>
                                <h4 class="text-xs font-black uppercase tracking-wider text-primary">
                                    Pengadaan Barang
                                </h4>
                            </div>
                            <ul class="space-y-2.5">
                                @foreach($barangScopes as $scope)
                                    <li class="text-xs text-text-secondary leading-relaxed">
                                        <strong class="text-text-main font-bold block">• {{ $scope->title }}</strong>
                                        <p class="mt-0.5">{{ $scope->description }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Pengadaan Jasa -->
                        <div class="p-5 rounded-2xl bg-primary/5 border border-primary/10 space-y-3">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-secondary text-white flex items-center justify-center text-base">
                                    <i class="bx bx-hard-hat"></i>
                                </div>
                                <h4 class="text-xs font-black uppercase tracking-wider text-primary">
                                    Pengadaan Jasa
                                </h4>
                            </div>
                            <ul class="space-y-2.5">
                                @foreach($jasaScopes as $scope)
                                    <li class="text-xs text-text-secondary leading-relaxed">
                                        <strong class="text-text-main font-bold block">• {{ $scope->title }}</strong>
                                        <p class="mt-0.5">{{ $scope->description }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <!-- 3. Why You Should Choose Us & The Process -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
        <!-- Why Choose Us -->
        <div class="lg:col-span-7 glass p-6 sm:p-8 md:p-10 rounded-3xl md:rounded-[40px] border-primary/10 shadow-xl flex flex-col justify-between space-y-6">
            <h2 class="text-2xl sm:text-4xl font-black uppercase tracking-tighter text-primary">
                Mengapa Bermitra Dengan PT. Multi Abadi Aksana?
            </h2>

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
                        ['step' => '01. KOMUNIKASI', 'desc' => 'Konsultasi kebutuhan barang/jasa via WhatsApp atau tatap muka.'],
                        ['step' => '02. SURVEI', 'desc' => 'Peninjauan teknis lokasi proyek, perhitungan beban, & spesifikasi.'],
                        ['step' => '03. NEGOSIASI', 'desc' => 'Penyusunan RAB transparan & penyesuaian efisiensi anggaran.'],
                        ['step' => '04. DEAL', 'desc' => 'Pengiriman material, eksekusi instalasi berstandar K3 & garansi.'],
                    ];
                @endphp
                @foreach($processes as $proc)
                    <div class="p-4 rounded-2xl bg-white/10 border border-white/15 backdrop-blur-sm space-y-1.5">
                        <h3 class="text-xs sm:text-sm font-black uppercase tracking-wider text-white">{{ $proc['step'] }}</h3>
                        <p class="text-[11px] text-blue-100/85 leading-snug">{{ $proc['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4. Featured Products Showcase -->
    <section class="space-y-8 md:space-y-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div class="space-y-2">
                <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none">
                    Produk & <span class="text-gradient">Material Unggulan.</span>
                </h2>
                <p class="text-xs md:text-sm text-text-secondary font-medium">
                    Etalase produk PJU Tenaga Surya, PJU PLN, Fabrikasi Impeller, Interior-Exterior, serta Sparepart Equipment PT. Multi Abadi Aksana.
                </p>
            </div>
            <a
                href="{{ route('products.index') }}"
                class="px-5 py-3 rounded-xl bg-primary text-white font-black text-xs hover:bg-primary-dark transition-all flex items-center gap-2 uppercase tracking-wider shrink-0 shadow-md"
            >
                <span>Lihat Seluruh Katalog</span>
                <i class="bx bx-right-arrow-alt text-lg"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($featuredProducts as $product)
                <livewire:components.product-card :product="$product" :key="'home-prod-'.$product->id" />
            @endforeach
        </div>
    </section>

    <!-- 5. Projek On Duty -->
    <section class="space-y-8 md:space-y-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div class="space-y-2">
                <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none">
                    Projek <span class="text-gradient">On Duty.</span>
                </h2>
                <p class="text-xs md:text-sm text-text-secondary font-medium">
                    Dokumentasi pelaksanaan proyek PJU Ruas Gempol-Sidoarjo-Malang, Interior Adelle Jewellery, dan Perawatan Mesin Industri.
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

    <!-- 6. Dual Office & Contact Section -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
        <div class="lg:col-span-6 space-y-6">
            <h2 class="text-2xl sm:text-4xl font-black uppercase tracking-tighter leading-tight">
                Kantor & Workshop <span class="text-gradient">Sidoarjo.</span>
            </h2>

            <div class="space-y-3.5">
                <div class="p-4 rounded-2xl glass border-primary/10 flex items-start gap-3.5">
                    <div class="w-10 h-10 shrink-0 bg-primary text-white rounded-xl flex items-center justify-center text-lg">
                        <i class="bx bxs-building-house"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-secondary">Head Office</p>
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
                        <p class="text-[10px] font-black uppercase tracking-widest text-secondary">Kantor & Workshop Sparepart</p>
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
                            <p class="text-[9px] font-extrabold uppercase tracking-widest text-blue-200">WA Umum & Proyek</p>
                            <p class="text-sm font-black mt-0.5">+62 823-4297-9898</p>
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
                            <p class="text-[9px] font-extrabold uppercase tracking-widest text-white/80">WA Divisi Sparepart</p>
                            <p class="text-sm font-black mt-0.5">+62 812-1659-2824</p>
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
