<footer class="mt-16 md:mt-24 border-t border-primary/10 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12">
            <!-- Brand & Value Prop -->
            <div class="space-y-4 md:space-y-5">
                <div class="h-9 sm:h-10 flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-3.5 sm:gap-4 group">
                        <img
                            src="/assets/logo.webp"
                            alt="Logo PT. Multi Abadi Aksana"
                            loading="lazy"
                            decoding="async"
                            width="50"
                            height="36"
                            class="h-8 sm:h-9 w-auto object-contain shrink-0"
                        />
                        <span class="text-sm sm:text-base md:text-lg font-black tracking-tight text-primary leading-none uppercase whitespace-nowrap">
                            PT. MULTI ABADI <span class="text-secondary">AKSANA</span>
                        </span>
                    </a>
                </div>
                <p class="text-xs md:text-sm text-text-secondary leading-relaxed font-medium">
                    Perusahaan General Trading, Supplier, dan Kontraktor terintegrasi. Mitra terpercaya untuk pengadaan dan konstruksi Penerangan Jalan Umum (Solar Cell & PLN) serta sistem Mechanical & Electrical industri (panel, PLC, tangki, ducting, MEP, BAS) termasuk desain Interior & Exterior dengan standar K3 terbaik.
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
                <div class="h-9 sm:h-10 flex items-center mb-4 md:mb-5">
                    <h2 class="text-xs font-black uppercase tracking-widest text-primary leading-none">Navigasi Utama</h2>
                </div>
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
                <div class="h-9 sm:h-10 flex items-center mb-4 md:mb-5">
                    <h2 class="text-xs font-black uppercase tracking-widest text-primary leading-none">Divisi & Katalog</h2>
                </div>
                <ul class="space-y-3 text-xs md:text-sm font-semibold text-text-secondary">
                    @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('products.index', ['divisi' => $cat->division, 'kategori' => $cat->slug]) }}" class="hover:text-primary transition-colors flex items-start gap-2">
                                <i class="bx bx-chevron-right text-secondary shrink-0 mt-1"></i>
                                <span class="leading-snug">{{ $cat->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Kontak & Alamat Resmi -->
            <div>
                <div class="h-9 sm:h-10 flex items-center mb-4 md:mb-5">
                    <h2 class="text-xs font-black uppercase tracking-widest text-primary leading-none">Kantor &amp; Kontak</h2>
                </div>
                <div class="space-y-3.5 text-xs md:text-sm text-text-secondary font-medium">
                    <p class="flex items-start gap-3">
                        <i class="bx bxs-map text-primary text-lg shrink-0 mt-0.5"></i>
                        <span>
                            <strong class="block text-text-main text-[11px] uppercase">Head Office:</strong>
                            <a href="https://maps.google.com/?q=Jl.+Taman+Surya+Agung+Blok+B+No.+11%2C+Sritanjung%2C+Wage%2C+Kec.+Taman%2C+Kabupaten+Sidoarjo%2C+Jawa+Timur+61257" target="_blank" rel="noopener noreferrer" class="hover:text-primary transition-colors">
                                Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257
                            </a>
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
                            <strong class="block text-text-main text-[11px] uppercase tracking-wider">Kontak Resmi:</strong>
                            <a href="https://wa.me/6282342979898" target="_blank" rel="noopener noreferrer" class="hover:text-primary font-bold">+62 823-4297-9898</a>
                        </span>
                    </p>
                    <p class="flex items-center gap-3">
                        <i class="bx bx-envelope text-primary text-lg shrink-0"></i>
                        <a href="mailto:ptmultiabadiaksana15@gmail.com" class="hover:text-primary font-bold break-all">ptmultiabadiaksana15@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-10 md:mt-14 pt-6 border-t border-primary/10 flex flex-col sm:flex-row justify-between items-center gap-4 text-[10px] md:text-xs font-bold text-text-secondary uppercase tracking-wider">
            <p>&copy; {{ date('Y') }} PT. Multi Abadi Aksana. Seluruh Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>
