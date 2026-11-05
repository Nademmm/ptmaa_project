<div class="space-y-12 md:space-y-20">
    <!-- Corporate Profile Hero Banner with Authentic Banner Photos -->
    <section class="relative rounded-3xl md:rounded-[44px] bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#242882] p-6 sm:p-10 md:p-14 text-white overflow-hidden shadow-2xl shadow-primary/15">
        <div class="absolute -right-16 -top-16 w-72 h-72 bg-secondary/20 rotate-45 pointer-events-none"></div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-10 items-center relative z-10">
            <div class="lg:col-span-7 space-y-4 md:space-y-5">
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase leading-[1.06]">
                    Pengadaan Barang & Jasa <span class="text-[#8DA2E0]">Berstandar Industri.</span>
                </h1>
                <p class="text-xs sm:text-sm md:text-base text-blue-100/90 font-medium leading-relaxed">
                    <strong class="text-white">PT. Multi Abadi Aksana</strong> adalah perusahaan yang bergerak di bidang <strong class="text-white">Pengadaan Barang dan Jasa</strong> meliputi pengadaan dan pemasangan lampu Penerangan Jalan Umum (PJU), pengadaan dan jasa konstruksi Interior & Exterior, Mechanical & Electrical, serta pengadaan Sparepart dan perawatan mesin/alat berat.
                </p>
                <blockquote class="p-4 rounded-2xl bg-white/10 border-l-4 border-[#8DA2E0] text-xs sm:text-sm font-bold italic text-blue-100">
                    "Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan"
                </blockquote>
                <div class="flex flex-wrap gap-3 pt-2">
                    <a
                        href="{{ route('products.index') }}"
                        class="px-5 py-3 rounded-xl bg-white text-primary hover:bg-secondary hover:text-white text-[10px] md:text-xs font-black uppercase tracking-wider transition-all flex items-center gap-2 shadow-lg"
                    >
                        <i class="bx bx-package text-base"></i>
                        <span>Lihat Katalog Produk</span>
                    </a>
                    <a
                        href="{{ route('contact') }}"
                        class="px-5 py-3 rounded-xl bg-white/10 hover:bg-white hover:text-primary border border-white/20 text-white text-[10px] md:text-xs font-black uppercase tracking-wider transition-all flex items-center gap-2"
                    >
                        <i class="bx bxs-phone-call text-base"></i>
                        <span>Hubungi Kantor Sidoarjo</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5 grid grid-cols-2 gap-3.5">
                <div class="aspect-[4/3] col-span-2 rounded-2xl overflow-hidden border-2 border-white/15 shadow-xl bg-primary-dark relative">
                    <img
                        src="/images/projects/pju-k3-gempol-sidoarjo.webp"
                        alt="Tim Lapangan PT. Multi Abadi Aksana"
                        width="800"
                        height="600"
                        class="w-full h-full object-cover"
                    />
                </div>
                <div class="aspect-[4/3] rounded-2xl overflow-hidden border border-white/15 shadow-lg bg-primary-dark">
                    <img
                        src="/images/banners/corporate-meeting.webp"
                        alt="Diskusi & Perencanaan Teknis PT. Multi Abadi Aksana"
                        loading="lazy"
                        width="400"
                        height="300"
                        class="w-full h-full object-cover"
                    />
                </div>
                <div class="aspect-[4/3] rounded-2xl overflow-hidden border border-white/15 shadow-lg bg-primary-dark">
                    <img
                        src="/images/banners/corporate-handshake.webp"
                        alt="Kemitraan Bisnis PT. Multi Abadi Aksana"
                        loading="lazy"
                        width="400"
                        height="300"
                        class="w-full h-full object-cover"
                    />
                </div>
            </div>
        </div>
    </section>

    <!-- Official Vision & Mission -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
        <!-- Vision Card -->
        <div class="bg-white p-7 sm:p-10 rounded-3xl border border-primary/10 shadow-xl shadow-primary/5 space-y-5 flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-11 h-11 rounded-2xl bg-primary text-white flex items-center justify-center text-xl shadow-md">
                    <i class="bx bx-show"></i>
                </div>
                <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tight text-primary">
                    Visi Perusahaan
                </h2>
                <p class="text-sm md:text-base font-bold text-text-main leading-relaxed">
                    "Menjadi perusahaan yang terus bertumbuh dan mengembangkan kemampuan dalam bidang pengadaan barang dan jasa, berorientasi pada kepuasan pelanggan, keselamatan kerja, dan menjadi mitra terbaik yang dapat diandalkan bagi seluruh pemangku kepentingan."
                </p>
            </div>
            <div class="p-4 rounded-2xl bg-[#F8FAFC] border border-primary/10 space-y-1.5">
                <h3 class="text-xs font-black uppercase tracking-wider text-primary">Komitmen Divisi Sparepart & Equipment</h3>
                <p class="text-xs md:text-sm font-semibold text-text-secondary leading-relaxed">
                    "Menjadi mitra terpercaya dalam penyediaan suku cadang berkualitas tinggi yang mendukung kelancaran operasional berbagai industri di seluruh Indonesia."
                </p>
            </div>
        </div>

        <!-- Mission Card -->
        <div class="bg-white p-7 sm:p-10 rounded-3xl border border-primary/10 shadow-xl shadow-primary/5 space-y-5">
            <div class="w-11 h-11 rounded-2xl bg-secondary text-white flex items-center justify-center text-xl shadow-md">
                <i class="bx bx-target-lock"></i>
            </div>
            <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tight text-primary">
                Misi Perusahaan
            </h2>
            <ul class="space-y-3">
                @php
                    $missions = [
                        'Membangun kegiatan pengadaan barang dan jasa yang berorientasi pada kepuasan pelanggan serta ketepatan waktu dan mutu.',
                        'Menyediakan produk suku cadang dan peralatan teknik yang handal, berkualitas, dan sesuai standar industri dengan harga kompetitif.',
                        'Memberikan layanan pengiriman yang cepat, tepat waktu, serta dukungan teknis yang responsif terhadap kebutuhan klien.',
                        'Mengutamakan Keselamatan dan Kesehatan Kerja (K3) di setiap tahapan instalasi lapangan dan operasional kerja.',
                        'Membangun hubungan kemitraan jangka panjang yang saling menguntungkan dengan pelanggan dan pemasok.'
                    ];
                @endphp
                @foreach($missions as $i => $misi)
                    <li class="flex gap-3 p-3 rounded-xl bg-[#F8FAFC] border border-primary/10 text-xs md:text-sm font-semibold text-text-main leading-relaxed">
                        <div class="w-6 h-6 rounded-lg bg-primary text-white text-[10px] font-black flex items-center justify-center shrink-0 mt-0.5">0{{ $i + 1 }}</div>
                        <p>{{ $misi }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- Why You Should Choose Us -->
    <section class="space-y-6 md:space-y-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <h2 class="text-2xl sm:text-4xl font-black uppercase tracking-tight text-primary">
                Nilai Keunggulan PT. Multi Abadi Aksana
            </h2>
            <p class="text-xs md:text-sm text-text-secondary font-medium max-w-md">
                Tiga fondasi layanan utama kami dalam setiap proyek pengadaan barang dan jasa konstruksi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5 space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center text-2xl">
                    <i class="bx bxs-shield-alt-2"></i>
                </div>
                <h3 class="text-lg md:text-xl font-black uppercase tracking-tight text-primary">Terpercaya</h3>
                <p class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed">
                    Berpengalaman menangani pengadaan barang dan jasa untuk kebutuhan proyek infrastruktur jalan, fasilitas komersial, serta kawasan industri di Jawa Timur.
                </p>
            </div>

            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5 space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-secondary text-white flex items-center justify-center text-2xl">
                    <i class="bx bxs-user-voice"></i>
                </div>
                <h3 class="text-lg md:text-xl font-black uppercase tracking-tight text-primary">Dukungan Pelanggan</h3>
                <p class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed">
                    Didukung jalur komunikasi responsif melalui tim administrasi proyek utama maupun tim khusus divisi sparepart untuk konsultasi spesifikasi dan survei lapangan.
                </p>
            </div>

            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5 space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center text-2xl">
                    <i class="bx bxs-award"></i>
                </div>
                <h3 class="text-lg md:text-xl font-black uppercase tracking-tight text-primary">Kualitas</h3>
                <p class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed">
                    Menggunakan material pilihan berstandar industri (COB, Osram, Philips, Estika, Stainless Steel) dengan eksekusi teknis yang mengutamakan K3.
                </p>
            </div>
        </div>
    </section>

    <!-- 4 Pilar Bisnis Utama -->
    <section class="space-y-8">
        <h2 class="text-2xl sm:text-4xl font-black uppercase tracking-tight text-primary">
            4 Pilar Layanan Utama
        </h2>

        @php
            $pillarImages = [
                'PJU' => '/images/projects/pju-instalasi-panel-tiang.webp',
                'INT-EXT' => '/images/projects/interior-adelle-jewellery.webp',
                'INTERIOR' => '/images/projects/interior-adelle-jewellery.webp',
                'ME' => '/images/projects/me-impeller-rotor-stainless.webp',
                'SPAREPART' => '/images/products/sparepart-oli.webp',
            ];
        @endphp

        <div class="space-y-6">
            @foreach($pillars as $index => $pillar)
                @php
                    $pImg = $pillarImages[$pillar->code] ?? '/images/projects/pju-k3-gempol-sidoarjo.webp';
                    $pengadaanScopes = $pillar->scopes->filter(fn($s) => ($s->scope_type?->value ?? $s->scope_type) === 'pengadaan');
                    $jasaScopes = $pillar->scopes->filter(fn($s) => ($s->scope_type?->value ?? $s->scope_type) === 'jasa');
                @endphp
                <div
                    id="pilar-{{ strtolower($pillar->code) }}"
                    class="bg-white p-6 sm:p-8 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5 grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-8 items-start scroll-mt-28"
                >
                    <!-- Left Column: Pillar Photo & Identity -->
                    <div class="lg:col-span-4 space-y-4">
                        <div class="aspect-[4/3] rounded-2xl overflow-hidden bg-[#1B1B6C] border border-primary/10 relative">
                            <img
                                src="{{ $pImg }}"
                                alt="{{ $pillar->name }}"
                                loading="lazy"
                                width="600"
                                height="450"
                                class="w-full h-full {{ $pillar->code === 'SPAREPART' ? 'object-contain p-6' : 'object-cover' }}"
                            />
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-xl md:text-2xl font-black uppercase tracking-tight text-primary">
                                {{ $pillar->name }}
                            </h3>
                            <p class="text-xs text-text-secondary font-medium leading-relaxed">
                                {{ $pillar->full_description ?? $pillar->short_description }}
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Pengadaan Barang vs Pengadaan Jasa -->
                    <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Pengadaan Barang -->
                        <div class="p-5 rounded-2xl bg-[#F8FAFC] border border-primary/10 space-y-3">
                            <div class="flex items-center gap-2.5 border-b border-primary/10 pb-2.5">
                                <div class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center text-base">
                                    <i class="bx bx-package"></i>
                                </div>
                                <h4 class="text-xs md:text-sm font-black uppercase tracking-wider text-primary">
                                    Pengadaan Barang
                                </h4>
                            </div>
                            <ul class="space-y-2">
                                @forelse($pengadaanScopes as $scope)
                                    <li class="flex items-start gap-2 text-xs text-text-main font-semibold">
                                        <i class="bx bx-check-circle text-secondary text-base shrink-0 mt-0.5"></i>
                                        <div>
                                            <strong class="block font-bold">{{ $scope->title }}</strong>
                                            @if($scope->description)
                                                <p class="text-[11px] text-text-secondary font-medium">{{ $scope->description }}</p>
                                            @endif
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-xs text-text-secondary">Tersedia sesuai spesifikasi kebutuhan proyek.</li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Pengadaan Jasa -->
                        <div class="p-5 rounded-2xl bg-[#F8FAFC] border border-primary/10 space-y-3">
                            <div class="flex items-center gap-2.5 border-b border-primary/10 pb-2.5">
                                <div class="w-8 h-8 rounded-lg bg-secondary text-white flex items-center justify-center text-base">
                                    <i class="bx bx-wrench"></i>
                                </div>
                                <h4 class="text-xs md:text-sm font-black uppercase tracking-wider text-primary">
                                    Pengadaan Jasa
                                </h4>
                            </div>
                            <ul class="space-y-2">
                                @forelse($jasaScopes as $scope)
                                    <li class="flex items-start gap-2 text-xs text-text-main font-semibold">
                                        <i class="bx bx-check-circle text-primary text-base shrink-0 mt-0.5"></i>
                                        <div>
                                            <strong class="block font-bold">{{ $scope->title }}</strong>
                                            @if($scope->description)
                                                <p class="text-[11px] text-text-secondary font-medium">{{ $scope->description }}</p>
                                            @endif
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-xs text-text-secondary">Dukungan teknis & pengiriman langsung ke lokasi mitra.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- The Process (4-Step Workflow) -->
    <section class="bg-[#0F1048] p-7 sm:p-10 md:p-12 rounded-3xl md:rounded-[44px] text-white shadow-2xl space-y-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <h2 class="text-2xl sm:text-4xl font-black uppercase tracking-tight">
                Alur Kemitraan & Pengadaan
            </h2>
            <p class="text-xs md:text-sm text-blue-100/80 max-w-md font-medium">
                Empat tahapan kerja sistematis PT. Multi Abadi Aksana dari diskusi awal hingga kesepakatan dan pengiriman/instalasi.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @php
                $steps = [
                    ['title' => '01. KOMUNIKASI', 'desc' => 'Diskusi awal mengenai spesifikasi produk, volume pengadaan, atau lingkup jasa konstruksi yang dibutuhkan klien.'],
                    ['title' => '02. SURVEI', 'desc' => 'Peninjauan titik lokasi proyek, pengecekan teknis lapangan, dan penyusunan penawaran spesifikasi yang akurat.'],
                    ['title' => '03. NEGOSIASI', 'desc' => 'Penyesuaian penawaran harga terbaik, jadwal pengiriman/instalasi, serta kesepakatan garansi mutu layanan.'],
                    ['title' => '04. DEAL', 'desc' => 'Penandatanganan kerja sama, fabrikasi/pengiriman unit, serta eksekusi pekerjaan dengan disiplin standar K3.'],
                ];
            @endphp
            @foreach($steps as $step)
                <div class="p-6 rounded-2xl bg-white/10 border border-white/15 space-y-2.5">
                    <h3 class="text-base md:text-lg font-black uppercase tracking-tight text-white">{{ $step['title'] }}</h3>
                    <p class="text-xs text-blue-100/80 font-medium leading-relaxed">{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>
</div>
