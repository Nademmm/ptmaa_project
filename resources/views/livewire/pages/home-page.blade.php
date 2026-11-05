<div class="space-y-12 md:space-y-20">
    <!-- Hero Slider Section (Niscahya Minimalist Rounded Style) -->
    <section
        x-data="{
            currentSlide: 0,
            slides: [
                {
                    image: '/hero-1.webp',
                    badge: 'General Trading, Supplier & Contractor',
                    title: 'Solusi Infrastruktur & Konstruksi Terintegrasi',
                    desc: 'Mitra strategis pengadaan Lampu PJU Tenaga Surya & PLN, Mechanical Electrical, Interior Exterior, serta Sparepart Industri di Indonesia.'
                },
                {
                    image: '/hero-2.webp',
                    badge: 'PJU Solar Cell & Jaringan PLN',
                    title: 'Penerangan Jalan Berstandar Mutu & K3',
                    desc: 'Pengadaan dan instalasi PJU All In One, Two In One, dan Tiang Octagonal Hot Dip Galvanized untuk jalan nasional maupun kawasan industri.'
                },
                {
                    image: '/hero-3.webp',
                    badge: 'Mechanical Electrical & Sparepart',
                    title: 'Fabrikasi Presisi & Pasokan Suku Cadang',
                    desc: 'Layanan fabrikasi impeller industri, panel distribusi MDP/SDP, konstruksi interior gedung, hingga pelumas heavy-duty alat berat.'
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
                            <span
                                x-text="slide.badge"
                                class="inline-block px-3.5 py-1.5 rounded-full bg-secondary/90 backdrop-blur-md text-[9px] md:text-[10px] font-black uppercase tracking-[0.25em] text-white shadow-lg"
                            ></span>
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

    <!-- About Industry & K3 Commitment Section (2-Column Niscahya Style) -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
        <div class="relative order-2 lg:order-1">
            <div class="aspect-square rounded-3xl md:rounded-[64px] overflow-hidden shadow-2xl border-4 md:border-8 border-white bg-primary-dark">
                <img
                    src="/PJU TENAGA SURYA.webp"
                    alt="Implementasi Proyek PT. Multi Abadi Aksana"
                    loading="lazy"
                    decoding="async"
                    width="900"
                    height="900"
                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-700"
                />
            </div>

            <!-- Floating Highlights Card -->
            <div class="mt-4 sm:mt-0 sm:absolute sm:-bottom-6 sm:left-6 sm:right-6 glass-bright p-5 md:p-7 rounded-2xl md:rounded-3xl shadow-2xl border border-primary/10">
                <div class="grid grid-cols-3 gap-4 items-center text-center divide-x divide-primary/10">
                    <div>
                        <p class="text-lg md:text-2xl font-black text-primary tracking-tighter uppercase">4 Pilar</p>
                        <p class="text-[8px] md:text-[10px] font-extrabold uppercase tracking-widest text-text-secondary">Divisi Inti</p>
                    </div>
                    <div class="pl-3">
                        <p class="text-lg md:text-2xl font-black text-secondary tracking-tighter uppercase">K3</p>
                        <p class="text-[8px] md:text-[10px] font-extrabold uppercase tracking-widest text-text-secondary">Standar Mutu</p>
                    </div>
                    <div class="pl-3">
                        <p class="text-lg md:text-2xl font-black text-primary tracking-tighter uppercase">Original</p>
                        <p class="text-[8px] md:text-[10px] font-extrabold uppercase tracking-widest text-text-secondary">Garansi Resmi</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6 md:space-y-8 order-1 lg:order-2">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-[10px] md:text-xs font-black uppercase tracking-widest">
                <i class="bx bxs-shield-alt-2 text-sm"></i>
                <span>Profil & Komitmen K3</span>
            </div>

            <h2 class="text-3xl sm:text-4xl md:text-6xl font-black tracking-tighter uppercase leading-[0.95] text-text-main">
                Kualitas Terbaik <br />
                <span class="text-gradient">Konstruksi & Pengadaan.</span>
            </h2>

            <p class="text-sm md:text-lg text-text-secondary leading-relaxed font-medium">
                <strong>PT. Multi Abadi Aksana</strong> bergerak di bidang pengadaan barang dan jasa konstruksi terintegrasi yang berpusat di Sidoarjo, Jawa Timur. Kami melayani instansi pemerintah (B2G) maupun korporasi swasta (B2B) dengan mengedepankan ketepatan waktu, transparansi spesifikasi, serta penerapan disiplin <strong>Kesehatan dan Keselamatan Kerja (K3)</strong> di setiap lokasi proyek.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1">
                <div class="p-4 rounded-2xl glass border-primary/10 flex items-start gap-3.5">
                    <div class="w-10 h-10 rounded-xl bg-primary text-white flex items-center justify-center text-xl shrink-0">
                        <i class="bx bx-check-shield"></i>
                    </div>
                    <div>
                        <h3 class="text-xs md:text-sm font-black uppercase tracking-tight text-primary">Pengadaan Barang</h3>
                        <p class="text-[11px] md:text-xs text-text-secondary font-medium mt-0.5">Unit PJU, panel listrik, material interior, dan pelumas bersertifikat.</p>
                    </div>
                </div>
                <div class="p-4 rounded-2xl glass border-primary/10 flex items-start gap-3.5">
                    <div class="w-10 h-10 rounded-xl bg-secondary text-white flex items-center justify-center text-xl shrink-0">
                        <i class="bx bx-hard-hat"></i>
                    </div>
                    <div>
                        <h3 class="text-xs md:text-sm font-black uppercase tracking-tight text-primary">Jasa Konstruksi</h3>
                        <p class="text-[11px] md:text-xs text-text-secondary font-medium mt-0.5">Instalasi tiang, fabrikasi impeller presisi, & manajemen proyek K3.</p>
                    </div>
                </div>
            </div>

            <div class="pt-2">
                <a
                    href="{{ route('about') }}"
                    class="inline-flex items-center gap-3 px-7 py-4 bg-primary text-white font-black rounded-2xl shadow-xl shadow-primary/20 hover:bg-primary-dark transition-all group text-xs uppercase tracking-widest"
                >
                    <span>Pelajari 4 Pilar Layanan</span>
                    <i class="bx bx-right-arrow-alt text-xl group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- 4 Pilar Layanan Inti Section -->
    <section class="space-y-8 md:space-y-12">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div class="space-y-2">
                <span class="text-[9px] md:text-[10px] font-black uppercase tracking-[0.35em] text-secondary block">Cakupan Bisnis Utama</span>
                <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none">
                    4 Pilar <span class="text-gradient">Layanan Inti.</span>
                </h2>
            </div>
            <p class="text-xs md:text-sm text-text-secondary font-medium max-w-md">
                Setiap pilar layanan mengintegrasikan pengadaan material orisinal dengan tim eksekusi teknis berpengalaman.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $pillarIcons = [
                    'PJU' => 'bx-bulb',
                    'INTERIOR' => 'bx-building-house',
                    'ME' => 'bx-cog',
                    'SPAREPART' => 'bx-wrench',
                ];
            @endphp
            @foreach($pillars as $index => $pillar)
                <div class="glass p-6 md:p-8 rounded-3xl md:rounded-[40px] border-primary/10 hover:border-primary/30 transition-all duration-500 flex flex-col justify-between group hover:-translate-y-1.5 shadow-lg shadow-primary/5">
                    <div class="space-y-5">
                        <div class="flex items-center justify-between">
                            <div class="w-14 h-14 rounded-2xl bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white flex items-center justify-center text-3xl transition-colors duration-300 shadow-sm">
                                <i class="bx {{ $pillarIcons[$pillar->code] ?? 'bx-layer' }}"></i>
                            </div>
                            <span class="text-xs font-black text-secondary/60 tracking-widest">0{{ $index + 1 }}</span>
                        </div>

                        <div class="space-y-2">
                            <h3 class="text-lg md:text-xl font-black uppercase tracking-tight text-primary leading-snug">
                                {{ $pillar->name }}
                            </h3>
                            <p class="text-xs text-text-secondary font-medium leading-relaxed line-clamp-3">
                                {{ $pillar->short_description }}
                            </p>
                        </div>

                        @if($pillar->scopes->count() > 0)
                            <div class="pt-3 border-t border-primary/10 space-y-1.5">
                                @foreach($pillar->scopes->take(3) as $scope)
                                    <div class="flex items-start gap-2 text-[11px] font-semibold text-text-main">
                                        <i class="bx bx-check text-secondary text-base leading-none mt-0.5"></i>
                                        <span class="line-clamp-1">{{ $scope->title }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="pt-6 mt-6 border-t border-primary/5">
                        <a
                            href="{{ route('about') }}#pilar-{{ strtolower($pillar->code) }}"
                            class="inline-flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-primary group-hover:text-secondary transition-colors"
                        >
                            <span>Rincian Lingkup Kerja</span>
                            <i class="bx bx-right-arrow-alt text-base group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Marquee Strip (Niscahya Signature Element with Navy Palette) -->
    <div class="py-6 md:py-9 bg-primary -mx-4 sm:-mx-6 overflow-hidden flex whitespace-nowrap border-y-4 border-secondary/30 shadow-inner">
        <div class="animate-marquee flex gap-10 md:gap-16 items-center">
            @for($i = 0; $i < 6; $i++)
                <div class="flex items-center gap-10 md:gap-16">
                    <span class="text-xl md:text-4xl font-black text-white uppercase tracking-tighter italic">PJU Tenaga Surya & PLN</span>
                    <i class="bx bxs-bolt text-xl md:text-3xl text-secondary"></i>
                    <span class="text-xl md:text-4xl font-black text-white uppercase tracking-tighter italic">Mechanical & Electrical</span>
                    <i class="bx bxs-cog text-xl md:text-3xl text-secondary"></i>
                    <span class="text-xl md:text-4xl font-black text-white uppercase tracking-tighter italic">Interior & Exterior</span>
                    <i class="bx bxs-building-house text-xl md:text-3xl text-secondary"></i>
                    <span class="text-xl md:text-4xl font-black text-white uppercase tracking-tighter italic">Sparepart & Pelumas</span>
                    <i class="bx bxs-shield-alt-2 text-xl md:text-3xl text-secondary"></i>
                </div>
            @endfor
        </div>
    </div>

    <!-- Featured Products Section (4-Column Niscahya Grid) -->
    <section class="space-y-8 md:space-y-12">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div class="space-y-2">
                <span class="text-[9px] md:text-[10px] font-black uppercase tracking-[0.35em] text-secondary block">Katalog Pengadaan</span>
                <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none">
                    Produk & <span class="text-gradient">Material Unggulan.</span>
                </h2>
                <p class="text-xs md:text-base text-text-secondary font-medium">
                    Spesifikasi teruji untuk kebutuhan infrastruktur jalan, pabrik, gedung komersial, dan armada alat berat.
                </p>
            </div>
            <a
                href="{{ route('products.index') }}"
                class="px-5 py-3 rounded-xl md:rounded-2xl glass font-black text-xs text-primary hover:bg-primary hover:text-white transition-all flex items-center gap-2 uppercase tracking-wider shrink-0"
            >
                <span>Lihat Semua Produk</span>
                <i class="bx bx-right-arrow-alt text-lg"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @foreach($featuredProducts as $product)
                <livewire:components.product-card :product="$product" :key="'home-prod-'.$product->id" />
            @endforeach
        </div>
    </section>

    <!-- Projek On Duty Preview Section -->
    <section class="space-y-8 md:space-y-12">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            <div class="space-y-2">
                <span class="text-[9px] md:text-[10px] font-black uppercase tracking-[0.35em] text-secondary block">Rekam Jejak Lapangan</span>
                <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none">
                    Projek <span class="text-gradient">On Duty.</span>
                </h2>
                <p class="text-xs md:text-base text-text-secondary font-medium">
                    Dokumentasi nyata eksekusi proyek PJU, betonisasi, interior Adelle Jewellery, serta perawatan unit alat berat.
                </p>
            </div>
            <a
                href="{{ route('gallery.index') }}"
                class="px-5 py-3 rounded-xl md:rounded-2xl glass font-black text-xs text-primary hover:bg-primary hover:text-white transition-all flex items-center gap-2 uppercase tracking-wider shrink-0"
            >
                <span>Galeri Lengkap</span>
                <i class="bx bx-right-arrow-alt text-lg"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredGalleries as $gallery)
                <a href="{{ route('gallery.index') }}" class="group relative aspect-4/5 rounded-3xl md:rounded-[40px] overflow-hidden glass border-primary/10 shadow-lg block bg-primary-dark">
                    @php
                        $galImg = str_starts_with($gallery->image_path, '/') || str_starts_with($gallery->image_path, 'http')
                            ? $gallery->image_path
                            : asset('storage/' . $gallery->image_path);
                    @endphp
                    <img
                        src="{{ $galImg }}"
                        alt="{{ $gallery->title }}"
                        loading="lazy"
                        decoding="async"
                        width="600"
                        height="750"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0F1048] via-[#1B1B6C]/40 to-transparent opacity-90 flex flex-col justify-end p-5 md:p-6">
                        <span class="text-[9px] font-extrabold uppercase tracking-widest text-blue-200 mb-1">
                            {{ $gallery->location }}
                        </span>
                        <h3 class="text-sm md:text-base font-black text-white uppercase tracking-tight leading-snug line-clamp-2">
                            {{ $gallery->title }}
                        </h3>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Latest Blog Section (3-Column Niscahya Style) -->
    @if($latestPosts->count() > 0)
        <section class="space-y-8 md:space-y-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
                <div class="space-y-2">
                    <span class="text-[9px] md:text-[10px] font-black uppercase tracking-[0.35em] text-secondary block">Edukasi & Informasi Teknis</span>
                    <h2 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-none">
                        Wawasan & <span class="text-gradient">Berita Terbaru.</span>
                    </h2>
                    <p class="text-xs md:text-base text-text-secondary font-medium">
                        Informasi seputar teknologi PJU, pemeliharaan mekanikal industri, dan standar konstruksi K3.
                    </p>
                </div>
                <a
                    href="{{ route('blog.index') }}"
                    class="px-5 py-3 rounded-xl md:rounded-2xl glass font-black text-xs text-primary hover:bg-primary hover:text-white transition-all flex items-center gap-2 uppercase tracking-wider shrink-0"
                >
                    <span>Lihat Semua Artikel</span>
                    <i class="bx bx-right-arrow-alt text-lg"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                @foreach($latestPosts as $post)
                    <article class="group glass rounded-3xl md:rounded-[48px] overflow-hidden border-primary/10 hover:border-primary/30 transition-all flex flex-col h-full shadow-lg shadow-primary/5 hover:-translate-y-2 duration-500">
                        <a href="{{ route('blog.show', $post->slug) }}" class="relative aspect-video overflow-hidden block bg-primary-dark">
                            @php
                                $postImg = $post->featured_image
                                    ? (str_starts_with($post->featured_image, '/') || str_starts_with($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image))
                                    : '/blog1.webp';
                            @endphp
                            <img
                                src="{{ $postImg }}"
                                alt="{{ $post->title }}"
                                loading="lazy"
                                decoding="async"
                                width="640"
                                height="360"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            />
                            <div class="absolute top-4 left-4">
                                <span class="px-3.5 py-1.5 bg-white/95 backdrop-blur-md text-[8px] md:text-[9px] font-black uppercase tracking-widest rounded-lg text-primary shadow-md">
                                    {{ $post->category?->name ?? 'Wawasan' }}
                                </span>
                            </div>
                        </a>

                        <div class="p-6 md:p-8 flex flex-col grow space-y-3 md:space-y-4">
                            <div class="flex items-center gap-2 text-[9px] md:text-[10px] font-black text-text-secondary uppercase tracking-widest">
                                <span>{{ $post->published_at?->translatedFormat('d M Y') }}</span>
                                <span class="w-1 h-1 rounded-full bg-secondary"></span>
                                <span>Tim Teknis MAA</span>
                            </div>

                            <a href="{{ route('blog.show', $post->slug) }}">
                                <h3 class="text-lg md:text-xl font-black tracking-tight uppercase leading-tight group-hover:text-primary transition-colors line-clamp-2">
                                    {{ $post->title }}
                                </h3>
                            </a>

                            <p class="text-xs md:text-sm text-text-secondary font-medium line-clamp-2 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>

                            <div class="pt-3 mt-auto">
                                <a
                                    href="{{ route('blog.show', $post->slug) }}"
                                    class="inline-flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-primary group-hover:gap-3 transition-all"
                                >
                                    <span>Baca Selengkapnya</span>
                                    <i class="bx bx-right-arrow-alt text-base"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Contact Info & Google Maps Section (2-Column Niscahya Home Bottom Style) -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-12 items-center pt-4">
        <div class="space-y-6 md:space-y-8">
            <div class="space-y-3">
                <span class="px-4 py-1.5 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest inline-block">
                    Kantor & Konsultasi
                </span>
                <h2 class="text-3xl sm:text-5xl font-black uppercase tracking-tighter leading-[0.95]">
                    Siap Melayani <br /><span class="text-gradient">Kebutuhan Proyek.</span>
                </h2>
                <p class="text-sm md:text-base text-text-secondary font-medium leading-relaxed">
                    Konsultasikan spesifikasi teknis, kebutuhan RAB pengadaan, maupun ketersediaan stok suku cadang langsung bersama tim kami.
                </p>
            </div>

            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 rounded-2xl glass border-primary/10">
                    <div class="w-11 h-11 shrink-0 bg-primary text-white rounded-xl flex items-center justify-center text-xl shadow-md">
                        <i class="bx bxs-map"></i>
                    </div>
                    <div>
                        <p class="text-[9px] font-black uppercase tracking-[0.2em] text-secondary">Head Office & Workshop Sidoarjo</p>
                        <p class="text-xs md:text-sm font-black leading-snug tracking-tight text-text-main mt-0.5">
                            HO: Jl. Taman Surya Agung Blok B No. 11, Wage, Kec. Taman, Sidoarjo 61257 <br />
                            Workshop: Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Sidoarjo
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a
                        href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan barang & jasa.') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="flex items-start gap-3.5 p-4 rounded-2xl glass border-primary/10 hover:border-primary/30 transition-all group"
                    >
                        <div class="w-10 h-10 shrink-0 bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white rounded-xl flex items-center justify-center text-xl transition-colors">
                            <i class="bx bxl-whatsapp"></i>
                        </div>
                        <div>
                            <p class="text-[9px] font-black uppercase tracking-widest text-secondary">Admin Utama (Proyek)</p>
                            <p class="text-sm font-black tracking-tight text-text-main mt-0.5">+62 823-4297-9898</p>
                        </div>
                    </a>

                    <a
                        href="https://wa.me/6281216592824?text={{ urlencode('Halo Admin Divisi Sparepart PT. Multi Abadi Aksana, saya ingin menanyakan suku cadang / pelumas.') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="flex items-start gap-3.5 p-4 rounded-2xl glass border-primary/10 hover:border-primary/30 transition-all group"
                    >
                        <div class="w-10 h-10 shrink-0 bg-secondary/15 text-primary group-hover:bg-secondary group-hover:text-white rounded-xl flex items-center justify-center text-xl transition-colors">
                            <i class="bx bxs-wrench"></i>
                        </div>
                        <div>
                            <p class="text-[9px] font-black uppercase tracking-widest text-secondary">Divisi Sparepart</p>
                            <p class="text-sm font-black tracking-tight text-text-main mt-0.5">+62 812-1659-2824</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="glass p-2 md:p-4 rounded-3xl md:rounded-[48px] border-primary/10 shadow-xl relative overflow-hidden h-80 md:h-[420px]">
            <iframe
                title="Peta Lokasi Kantor PT. Multi Abadi Aksana di Sidoarjo"
                src="https://maps.google.com/maps?q=Taman+Surya+Agung+Sidoarjo&t=&z=15&ie=UTF8&iwloc=&output=embed"
                width="100%"
                height="100%"
                style="border: 0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="rounded-2xl md:rounded-[36px] w-full h-full"
            ></iframe>
        </div>
    </section>
</div>
