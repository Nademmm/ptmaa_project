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
    x-init="scrolled = (window.scrollY > 30)"
    @scroll.window.passive="scrolled = (window.scrollY > 30)"
    :class="scrolled ? 'pt-3 sm:pt-4 px-3 sm:px-6' : 'pt-0 px-0'"
    class="fixed top-0 left-0 right-0 z-50 pointer-events-none transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
>
    <nav
        :class="scrolled
            ? 'max-w-7xl rounded-2xl md:rounded-full bg-white/95 backdrop-blur-xl shadow-xl shadow-primary/10 border border-primary/15 px-4 sm:px-8 py-2.5'
            : 'max-w-full rounded-none bg-white border-b border-primary/10 shadow-none px-4 sm:px-8 lg:px-12 py-3.5 sm:py-4'"
        class="pointer-events-auto mx-auto w-full transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
    >
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
            <!-- Brand Logo (Directly on Navbar, No Box, Clean) -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                <img
                    src="/assets/logo.jpg"
                    alt="Logo PT. Multi Abadi Aksana"
                    width="120"
                    height="48"
                    class="h-9 sm:h-10 w-auto object-contain shrink-0"
                />
                <div class="flex flex-col">
                    <span class="text-sm sm:text-base font-black tracking-tighter text-primary leading-none uppercase">
                        MULTI ABADI <span class="text-secondary">AKSANA</span>
                    </span>
                    <span class="text-[8px] md:text-[9px] font-extrabold tracking-[0.2em] text-text-secondary uppercase mt-0.5">
                        General Trading & Contractor
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <div
                :class="scrolled ? 'bg-primary/5 p-1 rounded-full border border-primary/5' : 'bg-transparent p-0'"
                class="hidden lg:flex items-center gap-1 transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
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
                    <a
                        href="{{ route($link['route']) }}"
                        :class="scrolled ? 'rounded-full' : 'rounded-xl'"
                        class="px-4 py-2 text-xs font-bold uppercase tracking-wider transition-all duration-300 {{ $isActive ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-text-secondary hover:text-primary hover:bg-primary/5' }}"
                    >
                        {{ $link['name'] }}
                    </a>
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
                        placeholder="Cari PJU, Impeller, Oli..."
                        :class="scrolled ? 'rounded-full' : 'rounded-xl'"
                        class="bg-[#F8FAFC] border border-primary/15 focus:border-primary/40 focus:bg-white py-2 pl-3.5 pr-9 text-xs font-medium w-44 lg:w-52 transition-all duration-300 focus:outline-none"
                    />
                    <button
                        type="submit"
                        aria-label="Cari produk"
                        :class="scrolled ? 'rounded-full' : 'rounded-lg'"
                        class="absolute right-1.5 w-6 h-6 bg-primary text-white flex items-center justify-center hover:bg-primary-dark transition-colors duration-200"
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
                    class="w-10 h-10 rounded-xl bg-primary/5 flex items-center justify-center text-lg text-primary focus:outline-none"
                >
                    <i class="bx" :class="isSearchOpen ? 'bx-x' : 'bx-search'"></i>
                </button>

                <button
                    type="button"
                    @click="isOpen = !isOpen; if (isOpen) isSearchOpen = false;"
                    aria-label="Buka menu navigasi"
                    :aria-expanded="isOpen"
                    class="w-10 h-10 rounded-xl bg-primary/5 flex items-center justify-center text-xl text-primary focus:outline-none"
                >
                    <i class="bx" :class="isOpen ? 'bx-x' : 'bx-menu-alt-right'"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Search Overlay -->
    <div
        x-show="isSearchOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        style="display: none;"
        class="pointer-events-auto md:hidden mx-3 mt-2 bg-white rounded-2xl p-3 shadow-xl border border-primary/10"
    >
        <form @submit.prevent="submitSearch(); isSearchOpen = false;" class="relative flex items-center">
            <label for="mobile-product-search" class="sr-only">Cari Produk</label>
            <input
                id="mobile-product-search"
                type="text"
                x-model="searchQuery"
                placeholder="Cari PJU, M&E, Interior, Sparepart..."
                class="w-full bg-[#F8FAFC] border border-primary/15 rounded-xl py-2.5 pl-3.5 pr-11 text-sm font-medium focus:outline-none focus:bg-white"
            />
            <button
                type="submit"
                aria-label="Jalankan pencarian"
                class="absolute right-1.5 w-8 h-8 bg-primary text-white rounded-lg flex items-center justify-center"
            >
                <i class="bx bx-search text-base"></i>
            </button>
        </form>
    </div>

    <!-- Mobile Menu Overlay -->
    <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        style="display: none;"
        class="pointer-events-auto lg:hidden mx-3 mt-2 bg-white rounded-3xl p-5 shadow-2xl border border-primary/10"
    >
        <div class="flex flex-col gap-1.5">
            @foreach($navLinks as $link)
                @php $isActive = request()->routeIs($link['pattern']); @endphp
                <a
                    href="{{ route($link['route']) }}"
                    @click="isOpen = false"
                    class="px-4 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-colors flex items-center justify-between {{ $isActive ? 'bg-primary text-white shadow-md' : 'hover:bg-primary/5 text-text-main' }}"
                >
                    <span>{{ $link['name'] }}</span>
                    <i class="bx bx-chevron-right text-base"></i>
                </a>
            @endforeach

            <a
                href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai pengadaan barang & jasa.') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="mt-2 bg-primary text-white text-center py-3 rounded-xl text-xs font-bold uppercase tracking-wider flex items-center justify-center gap-2 shadow-md shadow-primary/20"
            >
                <i class="bx bxl-whatsapp text-base"></i>
                <span>Hubungi Admin Utama</span>
            </a>
        </div>
    </div>
</header>
