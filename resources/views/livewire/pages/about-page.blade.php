<div class="space-y-12 md:space-y-20">
    <!-- Hero Header (Niscahya Minimalist PageHero Style) -->
    <section class="relative pt-6 md:pt-10 pb-0 overflow-hidden">
        <div class="absolute top-0 right-0 p-6 md:p-16 -z-10 opacity-5 pointer-events-none">
            <i class="bx bx-buildings text-[140px] md:text-[260px] text-primary"></i>
        </div>

        <div class="max-w-3xl space-y-3 md:space-y-5">
            <span class="px-4 py-1.5 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest inline-block">
                Profil Perusahaan & Lingkup Kerja
            </span>
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tighter uppercase leading-[1.05] text-text-main">
                Cerita & Pilar <br />
                <span class="text-gradient">Layanan Kami.</span>
            </h1>
            <p class="text-sm sm:text-base md:text-xl text-text-secondary font-medium leading-relaxed max-w-2xl">
                PT. Multi Abadi Aksana adalah perusahaan General Trading, Supplier, dan Kontraktor yang berfokus pada ketepatan spesifikasi teknis, keandalan pasokan, dan disiplin keselamatan kerja (K3).
            </p>
        </div>
    </section>

    <!-- Vision & Mission Section (Niscahya 2-Column Layout) -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-start">
        <div class="space-y-6 md:space-y-8 pt-2 md:pt-6">
            <p class="text-base md:text-xl text-text-secondary font-medium leading-relaxed">
                Berpusat di Sukodono, Kabupaten Sidoarjo, Jawa Timur, <strong class="text-primary">PT. Multi Abadi Aksana</strong> hadir sebagai mitra strategis bagi instansi pemerintah maupun sektor industri swasta dalam menjawab kebutuhan infrastruktur jalan, sistem mekanikal elektrikal, tata ruang arsitektur, hingga pemeliharaan alat berat.
            </p>

            <div class="space-y-4 md:space-y-5 pt-2">
                <div class="flex gap-4 md:gap-5 p-4 rounded-2xl glass border-primary/10">
                    <div class="w-11 h-11 md:w-12 md:h-12 shrink-0 bg-primary text-white rounded-xl flex items-center justify-center text-xl md:text-2xl shadow-md">
                        <i class="bx bx-check-double"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm md:text-base font-black uppercase tracking-tight text-primary">Komitmen Kualitas & Spesifikasi</h3>
                        <p class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed">
                            Seluruh pengadaan material mengacu pada standar SNI, ASTM, serta spesifikasi pabrikan orisinal yang terverifikasi.
                        </p>
                    </div>
                </div>

                <div class="flex gap-4 md:gap-5 p-4 rounded-2xl glass border-primary/10">
                    <div class="w-11 h-11 md:w-12 md:h-12 shrink-0 bg-secondary text-white rounded-xl flex items-center justify-center text-xl md:text-2xl shadow-md">
                        <i class="bx bx-hard-hat"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm md:text-base font-black uppercase tracking-tight text-primary">Disiplin Standar K3</h3>
                        <p class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed">
                            Mengutamakan Kesehatan dan Keselamatan Kerja (K3) di setiap tahapan instalasi lapangan demi target Zero Accident.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative">
            <div class="absolute -inset-3 bg-primary/10 rounded-[56px] blur-2xl -z-10"></div>
            <div class="glass-bright p-7 sm:p-10 md:p-12 rounded-3xl md:rounded-[56px] border-primary/15 shadow-2xl space-y-8 relative overflow-hidden">
                <div class="space-y-3 md:space-y-4">
                    <h2 class="text-lg md:text-2xl font-black uppercase tracking-tighter text-primary border-b border-primary/10 pb-3">
                        Visi Perusahaan
                    </h2>
                    <p class="text-sm md:text-lg font-bold text-text-main italic leading-relaxed">
                        "Menjadi perusahaan General Trading, Supplier, dan Kontraktor terkemuka di Indonesia yang dipercaya karena integritas mutu, ketepatan eksekusi teknik, dan keunggulan budaya keselamatan kerja."
                    </p>
                </div>

                <div class="space-y-3 md:space-y-4">
                    <h2 class="text-lg md:text-2xl font-black uppercase tracking-tighter text-primary border-b border-primary/10 pb-3">
                        Misi Perusahaan
                    </h2>
                    <ul class="space-y-3">
                        @php
                            $missions = [
                                'Menyediakan produk pengadaan dan suku cadang berkualitas tinggi dengan jaminan keaslian serta ketersediaan pasokan yang berkesinambungan.',
                                'Melaksanakan jasa konstruksi PJU, Mechanical Electrical, serta Interior & Exterior secara profesional, tepat waktu, dan sesuai anggaran.',
                                'Menerapkan manajemen mutu dan Kesehatan & Keselamatan Kerja (K3) secara konsisten di setiap proyek.',
                                'Membangun kemitraan jangka panjang yang saling menguntungkan dengan instansi pemerintah maupun swasta.'
                            ];
                        @endphp
                        @foreach($missions as $i => $misi)
                            <li class="flex gap-3 text-xs md:text-sm font-medium text-text-secondary leading-relaxed">
                                <span class="text-primary font-black shrink-0">0{{ $i + 1 }}.</span>
                                <span>{{ $misi }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 4 Pilar Layanan Lengkap (Pengadaan vs Jasa Konstruksi) -->
    <section class="space-y-8 md:space-y-12">
        <div class="text-center max-w-2xl mx-auto space-y-2 md:space-y-3">
            <span class="text-[9px] md:text-[10px] font-black tracking-[0.35em] text-secondary uppercase block">Spesialisasi Terpadu</span>
            <h2 class="text-3xl md:text-5xl font-black uppercase tracking-tighter text-text-main">
                4 Pilar <span class="text-gradient">Layanan Utama.</span>
            </h2>
            <p class="text-xs md:text-sm text-text-secondary font-medium">
                Pemisahan jelas antara cakupan Pengadaan Barang (Supply) dan Jasa Konstruksi / Teknis (Service) di setiap divisi.
            </p>
        </div>

        <div class="space-y-6 md:space-y-8">
            @foreach($pillars as $index => $pillar)
                <div
                    id="pilar-{{ strtolower($pillar->code) }}"
                    class="glass p-6 sm:p-8 md:p-10 rounded-3xl md:rounded-[48px] border-primary/10 shadow-xl shadow-primary/5 space-y-6 scroll-mt-28"
                >
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-primary/10 pb-5">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-primary text-white flex items-center justify-center text-lg md:text-xl font-black shrink-0 shadow-lg">
                                0{{ $index + 1 }}
                            </div>
                            <div>
                                <span class="text-[9px] font-black uppercase tracking-[0.25em] text-secondary block">Divisi {{ $pillar->code }}</span>
                                <h3 class="text-xl md:text-3xl font-black uppercase tracking-tighter text-primary">
                                    {{ $pillar->name }}
                                </h3>
                            </div>
                        </div>
                        <a
                            href="{{ route('products.index') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-primary/10 text-primary hover:bg-primary hover:text-white text-[10px] font-black uppercase tracking-widest transition-all self-start md:self-auto"
                        >
                            <span>Lihat Unit Terkait</span>
                            <i class="bx bx-right-arrow-alt text-base"></i>
                        </a>
                    </div>

                    <p class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed">
                        {{ $pillar->full_description ?? $pillar->short_description }}
                    </p>

                    @php
                        $pengadaanScopes = $pillar->scopes->filter(fn($s) => ($s->scope_type?->value ?? $s->scope_type) === 'pengadaan');
                        $jasaScopes = $pillar->scopes->filter(fn($s) => ($s->scope_type?->value ?? $s->scope_type) === 'jasa');
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Pengadaan Barang -->
                        <div class="p-5 md:p-6 rounded-2xl bg-white/80 border border-primary/10 space-y-4">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center text-base">
                                    <i class="bx bx-package"></i>
                                </div>
                                <h4 class="text-xs md:text-sm font-black uppercase tracking-wider text-primary">
                                    Lingkup Pengadaan Barang
                                </h4>
                            </div>
                            <ul class="space-y-2.5">
                                @forelse($pengadaanScopes as $scope)
                                    <li class="flex items-start gap-2.5 text-xs text-text-main font-semibold">
                                        <i class="bx bx-check-circle text-secondary text-base shrink-0 mt-0.5"></i>
                                        <div>
                                            <span class="block font-bold">{{ $scope->title }}</span>
                                            @if($scope->description)
                                                <span class="text-[11px] text-text-secondary font-medium block">{{ $scope->description }}</span>
                                            @endif
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-xs text-text-secondary">Tersedia sesuai spesifikasi kebutuhan proyek.</li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Jasa Konstruksi / Teknis -->
                        <div class="p-5 md:p-6 rounded-2xl bg-primary/5 border border-primary/10 space-y-4">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-secondary text-white flex items-center justify-center text-base">
                                    <i class="bx bx-wrench"></i>
                                </div>
                                <h4 class="text-xs md:text-sm font-black uppercase tracking-wider text-primary">
                                    Lingkup Jasa Konstruksi & Teknis
                                </h4>
                            </div>
                            <ul class="space-y-2.5">
                                @forelse($jasaScopes as $scope)
                                    <li class="flex items-start gap-2.5 text-xs text-text-main font-semibold">
                                        <i class="bx bx-check-circle text-primary text-base shrink-0 mt-0.5"></i>
                                        <div>
                                            <span class="block font-bold">{{ $scope->title }}</span>
                                            @if($scope->description)
                                                <span class="text-[11px] text-text-secondary font-medium block">{{ $scope->description }}</span>
                                            @endif
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-xs text-text-secondary">Dukungan teknis & pengiriman langsung ke titik proyek.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Core Values & Workflow Banner -->
    <section class="bg-primary p-8 sm:p-12 md:p-16 rounded-3xl md:rounded-[64px] relative overflow-hidden text-white shadow-2xl">
        <div class="absolute top-0 right-0 p-8 opacity-10 -rotate-12 pointer-events-none">
            <i class="bx bx-certification text-[150px] md:text-[240px] text-white"></i>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12 items-center relative z-10">
            <div class="lg:col-span-5 space-y-4">
                <span class="px-3.5 py-1 rounded-full bg-secondary text-white text-[9px] font-black uppercase tracking-widest inline-block">
                    Alur Kerja Proyek
                </span>
                <h2 class="text-3xl md:text-5xl font-black uppercase tracking-tighter leading-none">
                    Mitra Konstruksi <br />Terpercaya.
                </h2>
                <p class="text-white/80 font-medium text-xs md:text-base leading-relaxed">
                    Setiap proyek dijalankan melalui 4 tahapan terukur: Komunikasi & Konsultasi, Survei & Perencanaan RAB, Eksekusi Pengadaan & Instalasi K3, hingga Serah Terima & Garansi Pemeliharaan.
                </p>
            </div>

            <div class="lg:col-span-7 grid grid-cols-2 sm:grid-cols-4 gap-3 md:gap-4">
                @php
                    $steps = [
                        ['num' => '01', 'title' => 'Komunikasi', 'sub' => 'Identifikasi Kebutuhan'],
                        ['num' => '02', 'title' => 'Perencanaan', 'sub' => 'Survei & Spesifikasi'],
                        ['num' => '03', 'title' => 'Eksekusi', 'sub' => 'Instalasi Standar K3'],
                        ['num' => '04', 'title' => 'Penyelesaian', 'sub' => 'Uji Fungsi & Garansi'],
                    ];
                @endphp
                @foreach($steps as $step)
                    <div class="glass-bright p-5 rounded-2xl md:rounded-3xl text-center space-y-1.5 border-white/20 shadow-xl">
                        <span class="text-xs font-black text-secondary block">{{ $step['num'] }}</span>
                        <h3 class="text-sm md:text-base font-black text-primary uppercase tracking-tight">{{ $step['title'] }}</h3>
                        <p class="text-[9px] md:text-[10px] font-bold uppercase tracking-wider text-text-secondary">{{ $step['sub'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
