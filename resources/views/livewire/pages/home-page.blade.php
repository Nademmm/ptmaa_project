@if(!empty($heroSlides[0]['image']))
    @push('head')
        <link rel="preload" as="image" href="{{ $heroSlides[0]['image'] }}" fetchpriority="high">
    @endpush
@endif

<div class="space-y-14 md:space-y-24">
    <!-- 1. Hero Slider Section -->
    <section
        x-data="{
            currentSlide: 0,
            touchX: 0,
            totalSlides: {{ count($heroSlides) }},
            timer: null,
            init() {
                if (this.totalSlides > 1) {
                    this.startTimer();
                }
            },
            startTimer() {
                if (this.totalSlides <= 1) return;
                this.timer = setInterval(() => {
                    this.next();
                }, 8000);
            },
            resetTimer() {
                clearInterval(this.timer);
                this.startTimer();
            },
            next() {
                if (this.totalSlides <= 1) return;
                this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
            },
            prev() {
                if (this.totalSlides <= 1) return;
                this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            }
        }"
        class="relative pt-1 md:pt-2 overflow-hidden"
    >
        <div @touchstart.passive="touchX = $event.changedTouches[0].clientX" @touchend.passive="let d = $event.changedTouches[0].clientX - touchX; if (Math.abs(d) > 50) { d < 0 ? next() : prev(); resetTimer(); }" class="relative w-full aspect-4/5 sm:aspect-video lg:aspect-21/9 rounded-3xl md:rounded-[48px] overflow-hidden shadow-2xl shadow-primary/15 border-2 md:border-8 border-white bg-primary-dark">
            @foreach($heroSlides as $index => $slide)
                <div
                    @if($index !== 0) x-cloak @endif
                    x-show="currentSlide === {{ $index }}"
                    x-transition:enter="transition-opacity duration-700 ease-out"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity duration-700 ease-in-out"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 w-full h-full"
                >
                    <img
                        src="{{ $slide['image'] }}"
                        alt="{{ $slide['title'] }}"
                        width="1280"
                        height="548"
                        @if($index === 0)
                            fetchpriority="high"
                            loading="eager"
                            decoding="sync"
                        @else
                            loading="lazy"
                            decoding="async"
                        @endif
                        class="w-full h-full object-cover"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F1048] via-[#1B1B6C]/60 to-transparent text-white">
                        <div class="absolute inset-x-0 top-1/2 -mt-5 sm:-mt-[1.375rem] md:-mt-6 px-5 sm:px-20 md:px-24 lg:px-28">
                            <div class="max-w-3xl space-y-2.5 md:space-y-3.5">
                                @if($index === 0)
                                    <h1 class="text-[22px] sm:text-3xl md:text-4xl lg:text-5xl font-black uppercase tracking-tighter leading-[1.08]">
                                        {{ $slide['title'] }}
                                    </h1>
                                @else
                                    <p role="heading" aria-level="2" class="text-[22px] sm:text-3xl md:text-4xl lg:text-5xl font-black uppercase tracking-tighter leading-[1.08]">
                                        {{ $slide['title'] }}
                                    </p>
                                @endif
                                <p class="text-xs sm:text-sm md:text-base lg:text-lg text-white/90 font-medium max-w-2xl leading-relaxed line-clamp-3 md:line-clamp-none">
                                    {{ $slide['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if(count($heroSlides) > 1)
                <!-- Slider Controls -->
                <button
                    type="button"
                    @click="prev(); resetTimer()"
                    aria-label="Slide sebelumnya"
                    class="hidden sm:flex absolute left-3 sm:left-4 md:left-6 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-xl md:rounded-2xl glass flex items-center justify-center text-lg md:text-2xl text-primary hover:bg-primary hover:text-white transition-colors z-10 shadow-lg"
                >
                    <i class="bx bx-chevron-left"></i>
                </button>
                <button
                    type="button"
                    @click="next(); resetTimer()"
                    aria-label="Slide berikutnya"
                    class="hidden sm:flex absolute right-3 sm:right-4 md:right-6 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 rounded-xl md:rounded-2xl glass flex items-center justify-center text-lg md:text-2xl text-primary hover:bg-primary hover:text-white transition-colors z-10 shadow-lg"
                >
                    <i class="bx bx-chevron-right"></i>
                </button>

                <!-- Dots Indicator -->
                <div class="absolute bottom-4 md:bottom-5 left-4 sm:left-auto right-auto sm:right-5 md:right-11 flex gap-1 z-10">
                    @foreach($heroSlides as $index => $slide)
                        <button
                            type="button"
                            @click="currentSlide = {{ $index }}; resetTimer()"
                            aria-label="Ke slide {{ $index + 1 }}"
                            class="min-w-[28px] min-h-[28px] p-1 flex items-center justify-center focus:outline-none"
                        >
                            <span
                                :class="currentSlide === {{ $index }} ? 'bg-white w-8' : 'bg-white/45 w-2.5 hover:bg-white/75'"
                                class="block h-2.5 rounded-full transition-all duration-500 ease-out"
                            ></span>
                        </button>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- 2. Interactive 2 Fokus Bisnis Utama Tabs (Pengadaan Barang vs Pengadaan Jasa) -->
    <section
        x-data="{ activePillar: 0 }"
        class="space-y-8 md:space-y-10"
    >
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none text-text-main">
                2 Fokus Bisnis <span class="text-gradient">Barang & Jasa.</span>
            </h2>
            <p class="text-xs md:text-sm text-text-secondary font-medium max-w-md">
                Pilih divisi utama di bawah ini untuk melihat rincian cakupan <strong>Pengadaan Barang</strong> dan <strong>Pengadaan Jasa</strong> PT. Multi Abadi Aksana.
            </p>
        </div>

        <!-- 2 Core Division Selector Tabs -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach($pillars as $idx => $pillar)
                @php
                    $isPjuPillar = $pillar->slug === 'penerangan-jalan-umum';
                @endphp
                <button
                    type="button"
                    @click="activePillar = {{ $idx }}"
                    :class="activePillar === {{ $idx }} ? 'bg-primary text-white shadow-xl shadow-primary/20 border-primary' : 'bg-white text-text-main hover:bg-primary/5 border-primary/10'"
                    class="p-5 md:p-6 rounded-2xl md:rounded-3xl border text-left transition-all duration-300 flex items-center justify-between gap-4"
                >
                    <div class="flex items-center gap-4 min-w-0">
                        <div
                            :class="activePillar === {{ $idx }} ? 'bg-secondary text-white' : 'bg-primary/10 text-primary'"
                            class="w-12 h-12 rounded-2xl flex items-center justify-center text-2xl shrink-0 transition-colors"
                        >
                            <i class="bx {{ $isPjuPillar ? 'bx-bulb' : 'bx-cog' }}"></i>
                        </div>
                        <div class="min-w-0">
                            <span
                                :class="activePillar === {{ $idx }} ? 'text-blue-200' : 'text-secondary'"
                                class="text-[10px] font-black uppercase tracking-widest block"
                            >
                                {{ $pillar->code ?? ('Divisi ' . ($idx + 1)) }}
                            </span>
                            <h3 class="text-sm sm:text-base md:text-lg font-black uppercase tracking-tight truncate mt-0.5">
                                {{ $pillar->name }}
                            </h3>
                        </div>
                    </div>
                    <i
                        :class="activePillar === {{ $idx }} ? 'text-white translate-x-0.5' : 'text-primary/40'"
                        class="bx bx-chevron-right text-2xl shrink-0 transition-all"
                    ></i>
                </button>
            @endforeach
        </div>

        <!-- Active Division Detail Panel -->
        @foreach($pillars as $idx => $pillar)
            @php
                $isPjuPillar = $pillar->slug === 'penerangan-jalan-umum';
                $barangScopes = $pillar->scopes->filter(fn($s) => in_array(($s->type?->value ?? $s->type), ['barang', 'pengadaan']));
                $jasaScopes = $pillar->scopes->filter(fn($s) => ($s->type?->value ?? $s->type) === 'jasa');
                $pillarRoute = $isPjuPillar
                    ? route('products.index', ['divisi' => 'pju'])
                    : route('products.index', ['divisi' => 'me']);
                $pillarPhoto = $isPjuPillar
                    ? '/images/projects/pju-k3-gempol-sidoarjo.webp'
                    : '/images/projects/me-impeller-rotor-stainless.webp';
            @endphp
            <div
                @if($idx !== 0) x-cloak @endif
                x-show="activePillar === {{ $idx }}"
                x-transition:enter="transition-all duration-400 ease-out"
                x-transition:enter-start="opacity-0 translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition-all duration-200 ease-in"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-2"
                class="glass-bright rounded-3xl md:rounded-[40px] p-6 sm:p-8 md:p-10 border border-primary/15 shadow-xl grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch"
            >
                <div class="lg:col-span-4 flex">
                    <div class="w-full min-h-[280px] rounded-2xl md:rounded-3xl overflow-hidden border-2 border-primary/10 shadow-lg relative bg-primary-dark">
                        <img
                            src="{{ $pillarPhoto }}"
                            alt="{{ $pillar->name }}"
                            loading="lazy"
                            decoding="async"
                            width="600"
                            height="750"
                            class="w-full h-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0F1048] via-[#0F1048]/35 to-transparent flex flex-col justify-end p-6 text-white">
                            <span class="text-[10px] font-black uppercase tracking-widest text-[#8DA2E0]">{{ $pillar->code ?? 'Fokus Bisnis Utama' }}</span>
                            <p class="text-xl font-black uppercase tracking-tight mt-1">{{ $pillar->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8 space-y-6 flex flex-col justify-between">
                    <div class="space-y-2.5 border-b border-primary/10 pb-4">
                        <div class="flex flex-wrap items-center justify-between gap-3">
                            <h3 class="text-xl md:text-3xl font-black uppercase tracking-tighter text-primary">
                                {{ $pillar->name }}
                            </h3>
                            <a
                                href="{{ $pillarRoute }}"
                                class="inline-flex items-center justify-center gap-2 px-5 h-10 rounded-xl bg-primary text-white text-[11px] font-black uppercase tracking-wider hover:bg-primary-dark transition-all leading-none text-center shadow-md shadow-primary/15"
                            >
                                <span>Lihat Katalog</span>
                                <i class="bx bx-right-arrow-alt text-base leading-none"></i>
                            </a>
                        </div>
                        <p class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed">
                            {{ $pillar->short_summary ?? $pillar->description }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Pengadaan Barang -->
                        <div class="p-5 rounded-2xl bg-white border border-primary/10 space-y-3.5 shadow-sm">
                            <div class="flex items-center gap-2.5">
                                <div class="w-9 h-9 rounded-xl bg-primary text-white flex items-center justify-center text-lg shrink-0">
                                    <i class="bx bx-package"></i>
                                </div>
                                <div>
                                    <h4 class="text-xs font-black uppercase tracking-wider text-primary">
                                        Pengadaan Barang
                                    </h4>
                                    <p class="text-[10px] font-bold text-text-secondary">Suplai Perangkat & Material Resmi</p>
                                </div>
                            </div>
                            @foreach($barangScopes as $scope)
                                <ul class="space-y-2 pt-1">
                                    @foreach(($scope->items ?? []) as $item)
                                        <li class="flex items-start gap-2 text-xs text-text-secondary font-medium leading-relaxed">
                                            <i class="bx bxs-check-circle text-primary text-sm shrink-0 mt-0.5"></i>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>

                        <!-- Pengadaan Jasa -->
                        <div class="p-5 rounded-2xl bg-primary/5 border border-primary/10 space-y-3.5">
                            <div class="flex items-center gap-2.5">
                                <div class="w-9 h-9 rounded-xl bg-secondary text-white flex items-center justify-center text-lg shrink-0">
                                    <i class="bx bx-hard-hat"></i>
                                </div>
                                <div>
                                    <h4 class="text-xs font-black uppercase tracking-wider text-primary">
                                        Pengadaan Jasa
                                    </h4>
                                    <p class="text-[10px] font-bold text-text-secondary">Instalasi, Konstruksi & Perawatan K3</p>
                                </div>
                            </div>
                            @foreach($jasaScopes as $scope)
                                <ul class="space-y-2 pt-1">
                                    @foreach(($scope->items ?? []) as $item)
                                        <li class="flex items-start gap-2 text-xs text-text-secondary font-medium leading-relaxed">
                                            <i class="bx bxs-check-circle text-secondary text-sm shrink-0 mt-0.5"></i>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endforeach
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
                    Etalase spesifikasi pengadaan Penerangan Jalan Umum Tenaga Surya, Lampu Jalan PLN, Fabrikasi Impeller, serta unit Mechanical & Electrical PT. Multi Abadi Aksana.
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-2.5 shrink-0">
                <a
                    href="{{ route('products.index', ['divisi' => 'pju']) }}"
                    class="inline-flex items-center justify-center gap-2 px-5 h-11 md:h-12 rounded-xl md:rounded-2xl bg-primary text-white font-black text-xs hover:bg-primary-dark transition-all uppercase tracking-wider shadow-md leading-none text-center"
                >
                    <i class="bx bx-bulb text-base leading-none"></i>
                    <span>Penerangan Jalan Umum</span>
                </a>
                <a
                    href="{{ route('products.index', ['divisi' => 'me']) }}"
                    class="inline-flex items-center justify-center gap-2 px-5 h-11 md:h-12 rounded-xl md:rounded-2xl bg-secondary text-white font-black text-xs hover:bg-primary transition-all uppercase tracking-wider shadow-md leading-none text-center"
                >
                    <i class="bx bx-cog text-base leading-none"></i>
                    <span>Mechanical & Electrical</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($featuredProducts as $product)
                <x-product-card :product="$product" />
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
                    Dokumentasi pelaksanaan proyek Penerangan Jalan Umum Ruas Gempol-Sidoarjo-Malang serta Fabrikasi & Perawatan Mechanical & Electrical Industri.
                </p>
            </div>
            <a
                href="{{ route('gallery.index') }}"
                class="inline-flex items-center justify-center gap-2 px-6 h-11 md:h-12 rounded-xl md:rounded-2xl glass font-black text-xs text-primary hover:bg-primary hover:text-white transition-all uppercase tracking-wider shrink-0 leading-none text-center"
            >
                <span>Buka Semua Dokumentasi</span>
                <i class="bx bx-right-arrow-alt text-lg leading-none"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredGalleries as $gallery)
                @php
                    $galleryImg = $gallery->image_url;
                @endphp
                <a href="{{ route('gallery.index') }}" class="group relative aspect-[3/4] rounded-3xl overflow-hidden glass border border-primary/10 hover:border-primary/30 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-out block bg-primary-dark">
                    <img
                        src="{{ $galleryImg }}"
                        alt="{{ $gallery->title }}"
                        loading="lazy"
                        decoding="async"
                        width="600"
                        height="800"
                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
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
                        <p class="text-[10px] font-black uppercase tracking-widest text-secondary">Workshop & Operasional Teknis</p>
                        <p class="text-xs md:text-sm font-black text-text-main mt-0.5">
                            Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Kabupaten Sidoarjo, Jawa Timur
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <a
                        href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan barang & jasa.') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="p-4 rounded-2xl bg-primary text-white hover:bg-primary-dark transition-all flex items-center justify-between gap-3"
                    >
                        <div class="min-w-0">
                            <p class="text-[9px] font-extrabold uppercase tracking-widest text-blue-200">WhatsApp Resmi</p>
                            <p class="text-xs md:text-sm font-black mt-0.5 whitespace-nowrap">+62 823-4297-9898</p>
                        </div>
                        <i class="bx bxl-whatsapp text-2xl shrink-0"></i>
                    </a>
                    <a
                        href="mailto:ptmultiabadiaksana15@gmail.com"
                        class="p-4 rounded-2xl bg-[#F8FAFC] border border-primary/10 text-primary hover:bg-primary hover:text-white transition-all flex items-center justify-between gap-3"
                    >
                        <div class="min-w-0">
                            <p class="text-[9px] font-extrabold uppercase tracking-widest text-secondary">Email Resmi</p>
                            <p class="text-[11px] sm:text-xs md:text-sm font-black mt-0.5 break-all leading-tight">ptmultiabadiaksana15@gmail.com</p>
                        </div>
                        <i class="bx bx-envelope text-2xl shrink-0"></i>
                    </a>
                </div>
            </div>
        </div>

        <div
            x-data="{ mapLoaded: false }"
            x-init="
                const triggerMap = () => { mapLoaded = true; };
                window.addEventListener('scroll', triggerMap, { once: true, passive: true });
                window.addEventListener('mousemove', triggerMap, { once: true, passive: true });
                window.addEventListener('touchstart', triggerMap, { once: true, passive: true });
            "
            class="lg:col-span-6 glass p-2.5 rounded-3xl md:rounded-[40px] border-primary/10 shadow-xl h-80 md:h-96 overflow-hidden relative"
        >
            <template x-if="mapLoaded">
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
            </template>
            <div
                x-show="!mapLoaded"
                @click="mapLoaded = true"
                class="rounded-2xl md:rounded-[32px] w-full h-full bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#3D52A0] flex flex-col items-center justify-center text-white p-6 text-center cursor-pointer"
            >
                <div class="w-14 h-14 rounded-2xl bg-white/15 flex items-center justify-center text-3xl mb-3">
                    <i class="bx bxs-map"></i>
                </div>
                <p class="text-sm font-black uppercase tracking-wider">Peta Lokasi Kantor Sidoarjo</p>
                <p class="text-xs text-blue-100 mt-1">Jl. Taman Surya Agung Blok B No. 11, Wage, Kec. Taman, Sidoarjo</p>
            </div>
        </div>
    </section>
</div>
