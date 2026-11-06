<header
    x-data="{
        isOpen: false,
        isSearchOpen: false,
        scrolled: false,
        ready: false,
        searchQuery: '{{ request('cari', '') }}',
        init() {
            this.scrolled = (window.scrollY > 25);
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    this.ready = true;
                });
            });
        },
        submitSearch() {
            const q = this.searchQuery.trim();
            window.location.href = q ? '{{ route('products.index') }}?cari=' + encodeURIComponent(q) : '{{ route('products.index') }}';
        }
    }"
    @scroll.window.passive="scrolled = (window.scrollY > 25)"
    :class="[
        scrolled ? 'pt-3 sm:pt-4' : 'pt-0',
        ready ? 'navbar-float-transition' : 'transition-none'
    ]"
    class="fixed top-0 left-0 right-0 z-50 pointer-events-none pt-0 transition-none"
>
    <nav
        :class="[
            scrolled
                ? 'max-w-[1220px] mx-3.5 sm:mx-6 lg:mx-auto rounded-[36px] bg-white/95 backdrop-blur-xl shadow-2xl shadow-primary/15 border border-primary/15 px-4 sm:px-7 py-2.5'
                : 'max-w-full mx-0 rounded-[0px] bg-white border-b border-primary/10 shadow-none px-4 sm:px-8 lg:px-12 py-3.5 sm:py-4',
            ready ? 'navbar-float-transition' : 'transition-none'
        ]"
        class="pointer-events-auto w-full max-w-full mx-0 rounded-[0px] bg-white border-b border-primary/10 shadow-none px-4 sm:px-8 lg:px-12 py-3.5 sm:py-4 transition-none"
    >
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-3 sm:gap-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 shrink-0 pl-1 sm:pl-0">
                <img
                    src="/assets/logo.jpg"
                    alt="Logo PT. Multi Abadi Aksana"
                    width="120"
                    height="48"
                    class="h-8 sm:h-10 w-auto object-contain shrink-0"
                />
                <div class="flex flex-col">
                    <span class="text-xs sm:text-base font-black tracking-tighter text-primary leading-none uppercase">
                        MULTI ABADI <span class="text-secondary">AKSANA</span>
                    </span>
                    <span class="text-[8px] md:text-[9px] font-extrabold tracking-[0.18em] text-text-secondary uppercase mt-0.5">
                        General Trading & Contractor
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <div
                :class="[
                    scrolled ? 'bg-primary/[0.04] p-1 rounded-[24px] border border-primary/10' : 'bg-transparent p-0 rounded-[0px] border border-transparent',
                    ready ? 'navbar-float-transition' : 'transition-none'
                ]"
                class="hidden lg:flex items-center gap-1 bg-transparent p-0 rounded-[0px] border border-transparent transition-none"
            >
                @php
                    $navLinks = [
                        ['name' => 'Beranda', 'route' => 'home', 'pattern' => 'home'],
                        ['name' => 'Produk', 'route' => 'products.index', 'pattern' => 'products.*'],
                        ['name' => 'Projek', 'route' => 'gallery.index', 'pattern' => 'gallery.*'],
                        ['name' => 'Tentang', 'route' => 'about', 'pattern' => 'about'],
                        ['name' => 'Blog', 'route' => 'blog.index', 'pattern' => 'blog.*'],
                        ['name' => 'Kontak', 'route' => 'contact', 'pattern' => 'contact'],
                    ];
                @endphp

                @foreach($navLinks as $link)
                    @php $isActive = request()->routeIs($link['pattern']); @endphp
                    @if($link['name'] === 'Produk')
                        <div
                            class="relative"
                            x-data="{ productDropdown: false }"
                            @mouseenter="productDropdown = true"
                            @mouseleave="productDropdown = false"
                        >
                            <a
                                href="{{ route('products.index') }}"
                                :class="[
                                    scrolled ? 'rounded-[20px]' : 'rounded-xl',
                                    ready ? 'navbar-float-transition' : 'transition-none'
                                ]"
                                class="inline-flex items-center justify-center gap-1.5 h-9 px-4 rounded-xl text-xs font-bold uppercase tracking-wider leading-none text-center {{ $isActive ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-text-secondary hover:text-primary hover:bg-primary/5' }}"
                            >
                                <span>Produk</span>
                                <i class="bx bx-chevron-down text-sm transition-transform duration-300" :class="productDropdown ? 'rotate-180' : ''"></i>
                            </a>

                            <div
                                x-cloak
                                x-show="productDropdown"
                                x-transition:enter="transition ease-out duration-250"
                                x-transition:enter-start="opacity-0 translate-y-1.5"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1.5"
                                style="display: none;"
                                class="absolute top-full left-1/2 -translate-x-1/2 pt-2.5 w-72 z-50 pointer-events-auto"
                            >
                                <div class="bg-white rounded-2xl p-2 shadow-2xl border border-primary/10">
                                    <a
                                        href="{{ route('products.index', ['divisi' => 'pju']) }}"
                                        class="flex items-center gap-3 p-3 rounded-xl transition-colors group {{ request('divisi', 'pju') === 'pju' && request()->routeIs('products.*') ? 'bg-primary/10 border border-primary/15' : 'hover:bg-primary/5' }}"
                                    >
                                        <div class="w-9 h-9 rounded-lg {{ request('divisi', 'pju') === 'pju' && request()->routeIs('products.*') ? 'bg-primary text-white' : 'bg-primary/10 text-primary' }} group-hover:bg-primary group-hover:text-white flex items-center justify-center text-lg transition-colors shrink-0">
                                            <i class="bx bx-bulb"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs font-black uppercase tracking-wider {{ request('divisi', 'pju') === 'pju' && request()->routeIs('products.*') ? 'text-primary' : 'text-text-main' }} group-hover:text-primary leading-tight">Penerangan Jalan Umum</p>
                                            <p class="text-[10px] text-text-secondary font-medium leading-tight mt-0.5">Solar Cell, Lampu PLN & Tiang</p>
                                        </div>
                                    </a>

                                    <a
                                        href="{{ route('products.index', ['divisi' => 'me']) }}"
                                        class="flex items-center gap-3 p-3 rounded-xl transition-colors group {{ request('divisi') === 'me' && request()->routeIs('products.*') ? 'bg-primary/10 border border-primary/15' : 'hover:bg-primary/5' }}"
                                    >
                                        <div class="w-9 h-9 rounded-lg {{ request('divisi') === 'me' && request()->routeIs('products.*') ? 'bg-primary text-white' : 'bg-primary/10 text-primary' }} group-hover:bg-primary group-hover:text-white flex items-center justify-center text-lg transition-colors shrink-0">
                                            <i class="bx bx-cog"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs font-black uppercase tracking-wider {{ request('divisi') === 'me' && request()->routeIs('products.*') ? 'text-primary' : 'text-text-main' }} group-hover:text-primary leading-tight">Mechanical & Electrical</p>
                                            <p class="text-[10px] text-text-secondary font-medium leading-tight mt-0.5">Panel, Genset, Impeller & Komponen</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ route($link['route']) }}"
                            :class="[
                                scrolled ? 'rounded-[20px]' : 'rounded-xl',
                                ready ? 'navbar-float-transition' : 'transition-none'
                            ]"
                            class="inline-flex items-center justify-center h-9 px-4 rounded-xl text-xs font-bold uppercase tracking-wider leading-none text-center {{ $isActive ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-text-secondary hover:text-primary hover:bg-primary/5' }}"
                        >
                            {{ $link['name'] }}
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- Desktop Search Input -->
            <div class="hidden md:flex items-center">
                <form @submit.prevent="submitSearch()" class="relative flex items-center">
                    <label for="desktop-product-search" class="sr-only">Cari Produk atau Spesifikasi</label>
                    <input
                        id="desktop-product-search"
                        type="text"
                        x-model="searchQuery"
                        placeholder="Cari PJU, Impeller, Panel..."
                        :class="[
                            scrolled ? 'rounded-[22px]' : 'rounded-xl',
                            ready ? 'navbar-float-transition' : 'transition-none'
                        ]"
                        class="bg-[#F8FAFC] border border-primary/15 focus:border-primary/40 focus:bg-white rounded-xl py-2 pl-3.5 pr-9 text-xs font-medium w-44 lg:w-52 focus:outline-none"
                    />
                    <button
                        type="submit"
                        aria-label="Cari produk"
                        :class="[
                            scrolled ? 'rounded-[16px]' : 'rounded-lg',
                            ready ? 'navbar-float-transition' : 'transition-none'
                        ]"
                        class="absolute right-1.5 w-6 h-6 rounded-lg bg-primary text-white flex items-center justify-center hover:bg-primary-dark"
                    >
                        <i class="bx bx-search text-xs"></i>
                    </button>
                </form>
            </div>

            <!-- Mobile Search & Hamburger Toggle -->
            <div class="flex items-center gap-1.5 md:hidden">
                <button
                    type="button"
                    @click="isSearchOpen = !isSearchOpen; if (isSearchOpen) isOpen = false;"
                    aria-label="Buka pencarian produk"
                    :aria-expanded="isSearchOpen"
                    :class="[
                        scrolled ? 'rounded-[20px]' : 'rounded-xl',
                        ready ? 'navbar-float-transition' : 'transition-none'
                    ]"
                    class="w-10 h-10 rounded-xl bg-primary/5 hover:bg-primary/10 flex items-center justify-center text-lg text-primary focus:outline-none"
                >
                    <i class="bx bx-search" x-show="!isSearchOpen"></i>
                    <i class="bx bx-x" x-cloak x-show="isSearchOpen" style="display: none;"></i>
                </button>

                <button
                    type="button"
                    @click="isOpen = !isOpen; if (isOpen) isSearchOpen = false;"
                    aria-label="Buka menu navigasi"
                    :aria-expanded="isOpen"
                    :class="[
                        scrolled ? 'rounded-[20px]' : 'rounded-xl',
                        ready ? 'navbar-float-transition' : 'transition-none'
                    ]"
                    class="w-10 h-10 rounded-xl bg-primary/5 hover:bg-primary/10 flex items-center justify-center text-xl text-primary focus:outline-none"
                >
                    <i class="bx bx-menu-alt-right" x-show="!isOpen"></i>
                    <i class="bx bx-x" x-cloak x-show="isOpen" style="display: none;"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Overlays Container (Fixed Margin, Zero Resizing on Scroll) -->
    <div class="px-3.5 sm:px-6 max-w-7xl mx-auto w-full">
        <!-- Mobile Search Overlay -->
        <div
            x-cloak
            x-show="isSearchOpen"
            x-transition:enter="transition ease-out duration-250"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            style="display: none;"
            class="pointer-events-auto md:hidden mt-2.5 bg-white/95 backdrop-blur-xl rounded-[28px] p-3.5 sm:p-4 shadow-2xl border border-primary/15"
        >
            <form @submit.prevent="submitSearch(); isSearchOpen = false;" class="relative flex items-center w-full">
                <label for="mobile-product-search" class="sr-only">Cari Produk</label>
                <input
                    id="mobile-product-search"
                    type="text"
                    x-model="searchQuery"
                    placeholder="Cari Penerangan Jalan Umum, Mechanical & Electrical..."
                    class="w-full bg-[#F8FAFC] border-2 border-primary/15 rounded-[22px] py-3.5 sm:py-4 pl-4 sm:pl-5 pr-14 text-sm sm:text-base font-semibold text-text-main placeholder:text-xs sm:placeholder:text-sm placeholder:text-text-secondary/70 focus:outline-none focus:border-primary/40 focus:bg-white transition-colors"
                />
                <button
                    type="submit"
                    aria-label="Jalankan pencarian"
                    class="absolute right-2 w-10 h-10 sm:w-11 sm:h-11 bg-primary text-white rounded-[18px] flex items-center justify-center hover:bg-primary-dark transition-colors shadow-md shadow-primary/20"
                >
                    <i class="bx bx-search text-lg sm:text-xl"></i>
                </button>
            </form>
        </div>

        <!-- Mobile Menu Overlay -->
        <div
            x-cloak
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-250"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            style="display: none;"
            class="pointer-events-auto lg:hidden mt-2.5 bg-white/95 backdrop-blur-xl rounded-[28px] p-5 shadow-2xl border border-primary/15"
        >
            <div class="flex flex-col gap-1.5">
                @foreach($navLinks as $link)
                    @php $isActive = request()->routeIs($link['pattern']); @endphp
                    @if($link['name'] === 'Produk')
                        <div class="space-y-1.5 bg-primary/5 rounded-2xl p-2.5 border border-primary/10">
                            <p class="px-2.5 pt-1 text-[10px] font-black uppercase tracking-wider text-text-secondary">
                                Katalog Produk
                            </p>
                            <div class="flex flex-col gap-1.5">
                                <a
                                    href="{{ route('products.index', ['divisi' => 'pju']) }}"
                                    @click="isOpen = false"
                                    class="p-3 rounded-xl bg-white hover:bg-primary hover:text-white transition-colors flex items-center gap-3 text-xs font-black uppercase tracking-wider {{ request('divisi', 'pju') === 'pju' && request()->routeIs('products.*') ? 'bg-primary text-white' : 'text-text-main' }} shadow-sm"
                                >
                                    <i class="bx bx-bulb text-lg text-secondary"></i>
                                    <span>Penerangan Jalan Umum</span>
                                </a>
                                <a
                                    href="{{ route('products.index', ['divisi' => 'me']) }}"
                                    @click="isOpen = false"
                                    class="p-3 rounded-xl bg-white hover:bg-primary hover:text-white transition-colors flex items-center gap-3 text-xs font-black uppercase tracking-wider {{ request('divisi') === 'me' && request()->routeIs('products.*') ? 'bg-primary text-white' : 'text-text-main' }} shadow-sm"
                                >
                                    <i class="bx bx-cog text-lg text-secondary"></i>
                                    <span>Mechanical & Electrical</span>
                                </a>
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ route($link['route']) }}"
                            @click="isOpen = false"
                            class="px-4 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-colors flex items-center justify-between {{ $isActive ? 'bg-primary text-white shadow-md' : 'hover:bg-primary/5 text-text-main' }}"
                        >
                            <span>{{ $link['name'] }}</span>
                            <i class="bx bx-chevron-right text-base"></i>
                        </a>
                    @endif
                @endforeach

                <a
                    href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan barang & jasa.') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="mt-2 h-11 bg-primary text-white text-center rounded-2xl text-xs font-bold uppercase tracking-wider flex items-center justify-center gap-2 shadow-md shadow-primary/20 leading-none"
                >
                    <i class="bx bxl-whatsapp text-lg leading-none"></i>
                    <span>Hubungi Kami</span>
                </a>
            </div>
        </div>
    </div>
</header>
