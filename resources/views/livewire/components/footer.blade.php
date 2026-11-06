<footer class="mt-16 md:mt-24 border-t border-primary/10 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12">
            <!-- Brand & Value Prop -->
            <div class="space-y-5">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <img
                        src="/assets/logo.jpg"
                        alt="Logo PT. Multi Abadi Aksana"
                        loading="lazy"
                        decoding="async"
                        width="120"
                        height="48"
                        class="h-10 md:h-12 w-auto object-contain shrink-0"
                    />
                    <div class="flex flex-col">
                        <span class="text-base md:text-lg font-black tracking-tighter text-primary leading-none uppercase">
                            PT. MULTI ABADI <span class="text-secondary">AKSANA</span>
                        </span>
                        <span class="text-[9px] font-extrabold tracking-[0.2em] text-text-secondary uppercase mt-1">
                            Sidoarjo • Jawa Timur
                        </span>
                    </div>
                </a>
                <p class="text-xs md:text-sm text-text-secondary leading-relaxed font-medium">
                    Perusahaan General Trading, Supplier, dan Kontraktor terintegrasi. Mitra terpercaya untuk pengadaan dan konstruksi Penerangan Jalan Umum (Solar Cell & PLN) serta sistem Mechanical & Electrical industri dengan standar K3 terbaik.
                </p>
                <div class="flex gap-2.5">
                    <a
                        href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan barang & jasa.') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="WhatsApp Admin Utama PT. Multi Abadi Aksana"
                        class="w-11 h-11 rounded-xl bg-[#F8FAFC] border border-primary/10 flex items-center justify-center text-lg text-primary hover:bg-primary hover:text-white transition-all duration-300 shadow-sm"
                    >
                        <i class="bx bxl-whatsapp"></i>
                    </a>
                    <a
                        href="https://www.instagram.com/pt.multiabadiaksana?utm_source=ig_web_button_share_sheet&psln=ZDNlZDc0MzIxNw=="
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Instagram Resmi PT. Multi Abadi Aksana"
                        class="w-11 h-11 rounded-xl bg-[#F8FAFC] border border-primary/10 flex items-center justify-center text-lg text-primary hover:bg-primary hover:text-white transition-all duration-300 shadow-sm"
                    >
                        <i class="bx bxl-instagram"></i>
                    </a>
                    <a
                        href="mailto:ptmultiabadiaksana15@gmail.com"
                        aria-label="Kirim Email ke PT. Multi Abadi Aksana"
                        class="w-11 h-11 rounded-xl bg-[#F8FAFC] border border-primary/10 flex items-center justify-center text-lg text-primary hover:bg-primary hover:text-white transition-all duration-300 shadow-sm"
                    >
                        <i class="bx bx-envelope"></i>
                    </a>
                    <a
                        href="{{ route('contact') }}"
                        aria-label="Lokasi Kantor PT. Multi Abadi Aksana"
                        class="w-11 h-11 rounded-xl bg-[#F8FAFC] border border-primary/10 flex items-center justify-center text-lg text-primary hover:bg-primary hover:text-white transition-all duration-300 shadow-sm"
                    >
                        <i class="bx bx-map"></i>
                    </a>
                </div>
            </div>

            <!-- Navigasi Cepat -->
            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-primary mb-5">Navigasi Utama</h4>
                <ul class="space-y-3 text-xs md:text-sm font-semibold text-text-secondary">
                    <li><a href="{{ route('home') }}" class="hover:text-primary transition-colors flex items-center gap-2"><i class="bx bx-chevron-right text-secondary"></i> Beranda</a></li>
                    <li><a href="{{ route('products.index', ['divisi' => 'pju']) }}" class="hover:text-primary transition-colors flex items-center gap-2"><i class="bx bx-chevron-right text-secondary"></i> Penerangan Jalan Umum</a></li>
                    <li><a href="{{ route('products.index', ['divisi' => 'me']) }}" class="hover:text-primary transition-colors flex items-center gap-2"><i class="bx bx-chevron-right text-secondary"></i> Mechanical & Electrical</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="hover:text-primary transition-colors flex items-center gap-2"><i class="bx bx-chevron-right text-secondary"></i> Projek On Duty</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-primary transition-colors flex items-center gap-2"><i class="bx bx-chevron-right text-secondary"></i> Tentang Kami</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-primary transition-colors flex items-center gap-2"><i class="bx bx-chevron-right text-secondary"></i> Wawasan & Artikel</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-primary transition-colors flex items-center gap-2"><i class="bx bx-chevron-right text-secondary"></i> Hubungi Kami</a></li>
                </ul>
            </div>

            <!-- Divisi & Kategori Layanan -->
            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-primary mb-5">Divisi & Katalog</h4>
                <ul class="space-y-3 text-xs md:text-sm font-semibold text-text-secondary">
                    @foreach($categories as $cat)
                        <li>
                            @php
                                $divSlug = in_array($cat->slug, ['pju-tenaga-surya', 'pju-pln-tiang']) ? 'pju' : 'me';
                            @endphp
                            <a href="{{ route('products.index', ['divisi' => $divSlug, 'kategori' => $cat->slug]) }}" class="hover:text-primary transition-colors flex items-start gap-2">
                                <i class="bx bx-chevron-right text-secondary shrink-0 mt-1"></i>
                                <span class="leading-snug">{{ $cat->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Kontak & Alamat Resmi -->
            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-primary mb-5">0  Kontak</h4>
                <div class="space-y-3.5 text-xs md:text-sm text-text-secondary font-medium">
                    <p class="flex items-start gap-3">
                        <i class="bx bxs-map text-primary text-lg shrink-0 mt-0.5"></i>
                        <span>
                            <strong class="block text-text-main text-[11px] uppercase">Head Office:</strong>
                            Jl. Taman Surya Agung Blok B No. 11, Wage, Kec. Taman, Sidoarjo 61257
                        </span>
                    </p>
                    <p class="flex items-start gap-3">
                        <i class="bx bxs-buildings text-secondary text-lg shrink-0 mt-0.5"></i>
                        <span>
                            <strong class="block text-text-main text-[11px] uppercase">Workshop:</strong>
                            Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Sidoarjo
                        </span>
                    </p>
                    <p class="flex items-start gap-3">
                        <i class="bx bxl-whatsapp text-primary text-lg shrink-0 mt-0.5"></i>
                        <span>
                            <strong class="block text-text-main text-[11px] uppercase tracking-wider">Kontak Resmi (WhatsApp):</strong>
                            <a href="https://wa.me/6282342979898" target="_blank" rel="noopener noreferrer" class="hover:text-primary font-bold">+62 823-4297-9898</a>
                        </span>
                    </p>
                    <p class="flex items-center gap-3">
                        <i class="bx bx-envelope text-primary text-lg shrink-0"></i>
                        <a href="mailto:ptmultiabadiaksana15@gmail.com" class="hover:text-primary font-bold break-all">ptmultiabadiaksana15@gmail.com</a>
                    </p>
                    <p class="flex items-center gap-3">
                        <i class="bx bxl-instagram text-primary text-lg shrink-0"></i>
                        <a href="https://www.instagram.com/pt.multiabadiaksana?utm_source=ig_web_button_share_sheet&psln=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" class="hover:text-primary font-bold">@pt.multiabadiaksana</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-10 md:mt-14 pt-6 border-t border-primary/10 flex flex-col sm:flex-row justify-between items-center gap-4 text-[10px] md:text-xs font-bold text-text-secondary uppercase tracking-wider">
            <p>© {{ date('Y') }} PT. Multi Abadi Aksana. Seluruh Hak Cipta Dilindungi.</p>        </div>
    </div>
</footer>
