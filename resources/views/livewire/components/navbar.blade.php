<header
    x-data="{
        isOpen: false,
        isSearchOpen: false,
        scrolled: false,
        searchQuery: '{{ request('cari', '') }}',
        submitSearch() {
            const q = this.searchQuery.trim();
            window.location.href = q ? '{{ route('products.index') }}?cari=' + encodeURIComponent(q) : '{{ route('products.index') }}';
        }
    }"
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="scrolled ? 'py-2 md:py-3' : 'py-3 md:py-5'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 px-3 sm:px-6"
>
    <nav class="max-w-7xl mx-auto glass rounded-2xl md:rounded-4xl px-3 md:px-6 py-2.5 md:py-3 flex items-center justify-between shadow-lg shadow-primary/5 border-primary/10">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 md:gap-3 group shrink-0">
            <div class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center rounded-xl bg-white p-1 shadow-sm border border-primary/10 transition-transform duration-300 group-hover:scale-105">
                <img
                    src="/assets/logo.jpg"
                    alt="Logo PT. Multi Abadi Aksana"
                    width="88"
                    height="88"
                    class="w-full h-full object-contain"
                />
            </div>
            <div class="flex flex-col">
                <span class="text-sm sm:text-base md:text-lg font-black tracking-tighter text-primary leading-none uppercase">
                    MULTI ABADI <span class="text-secondary">AKSANA</span>
                </span>
                <span class="text-[8px] md:text-[9px] font-extrabold tracking-[0.2em] text-text-secondary uppercase mt-0.5">
                    General Trading & Contractor
                </span>
            </div>
        </a>

        <!-- Desktop Navigation Pill Bar -->
        <div class="hidden lg:flex items-center gap-1 bg-primary/5 p-1 rounded-2xl border border-primary/5">
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
                <a
                    href="{{ route($link['route']) }}"
                    class="relative px-4 py-2 rounded-xl text-xs font-black uppercase tracking-wider transition-all duration-300 {{ $isActive ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-text-secondary hover:text-primary' }}"
                >
                    {{ $link['name'] }}
                </a>
            @endforeach
        </div>

        <!-- Desktop Search Input & Quick CTA -->
        <div class="hidden md:flex items-center gap-2.5">
            <form @submit.prevent="submitSearch()" class="relative group flex items-center">
                <label for="desktop-product-search" class="sr-only">Cari Produk atau Spesifikasi</label>
                <input
                    id="desktop-product-search"
                    type="text"
                    x-model="searchQuery"
                    placeholder="Cari PJU, Impeller, Oli..."
                    class="bg-primary/5 border border-transparent focus:border-primary/20 focus:bg-white rounded-xl py-2 pl-4 pr-10 text-xs font-medium w-36 lg:w-52 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-primary/5"
                />
                <button
                    type="submit"
                    aria-label="Cari produk"
                    class="absolute right-1.5 w-7 h-7 bg-primary text-white rounded-lg flex items-center justify-center hover:bg-primary-dark transition-all shadow-sm"
                >
                    <i class="bx bx-search text-sm"></i>
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
                class="w-11 h-11 rounded-xl bg-primary/5 flex items-center justify-center text-lg text-primary focus:outline-none"
            >
                <i class="bx" :class="isSearchOpen ? 'bx-x' : 'bx-search'"></i>
            </button>

            <button
                type="button"
                @click="isOpen = !isOpen; if (isOpen) isSearchOpen = false;"
                aria-label="Buka menu navigasi"
                :aria-expanded="isOpen"
                class="w-11 h-11 rounded-xl bg-primary/5 flex items-center justify-center text-xl text-primary focus:outline-none"
            >
                <i class="bx" :class="isOpen ? 'bx-x' : 'bx-menu-alt-right'"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Search Overlay -->
    <div
        x-show="isSearchOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        style="display: none;"
        class="md:hidden mt-2 glass rounded-2xl p-3 shadow-2xl border-primary/10 overflow-hidden"
    >
        <form @submit.prevent="submitSearch(); isSearchOpen = false;" class="relative flex items-center">
            <label for="mobile-product-search" class="sr-only">Cari Produk</label>
            <input
                id="mobile-product-search"
                type="text"
                x-model="searchQuery"
                placeholder="Cari PJU, M&E, Interior, Sparepart..."
                class="w-full bg-primary/5 border border-primary/10 rounded-xl py-3 pl-4 pr-12 text-sm font-medium focus:outline-none focus:bg-white"
            />
            <button
                type="submit"
                aria-label="Jalankan pencarian"
                class="absolute right-1.5 w-9 h-9 bg-primary text-white rounded-lg flex items-center justify-center shadow-md"
            >
                <i class="bx bx-search text-lg"></i>
            </button>
        </form>
    </div>

    <!-- Mobile Menu Overlay -->
    <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        style="display: none;"
        class="lg:hidden mt-2 glass rounded-3xl p-5 shadow-2xl border-primary/10 overflow-hidden"
    >
        <div class="flex flex-col gap-2">
            @foreach($navLinks as $link)
                @php $isActive = request()->routeIs($link['pattern']); @endphp
                <a
                    href="{{ route($link['route']) }}"
                    @click="isOpen = false"
                    class="px-4 py-3 rounded-xl text-sm font-black uppercase tracking-wider transition-all flex items-center justify-between {{ $isActive ? 'bg-primary text-white shadow-md shadow-primary/20' : 'hover:bg-primary/5 text-text-main' }}"
                >
                    <span>{{ $link['name'] }}</span>
                    <i class="bx bx-chevron-right text-lg"></i>
                </a>
            @endforeach

            <a
                href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan barang & jasa.') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="mt-2 bg-primary text-white text-center py-3.5 rounded-xl text-xs font-black uppercase tracking-widest shadow-lg shadow-primary/20 flex items-center justify-center gap-2"
            >
                <i class="bx bxl-whatsapp text-lg"></i>
                <span>Hubungi Admin Utama</span>
            </a>
        </div>
    </div>
</header>
