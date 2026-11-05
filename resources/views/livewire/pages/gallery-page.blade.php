<div
    x-data="{
        lightboxOpen: false,
        activeItem: { title: '', location: '', client: '', desc: '', img: '' },
        openLightbox(item) {
            this.activeItem = item;
            this.lightboxOpen = true;
        }
    }"
    @keydown.escape.window="lightboxOpen = false"
    class="space-y-10 md:space-y-16"
>
    <!-- Page Hero -->
    <section class="relative pt-6 md:pt-10 pb-2 overflow-hidden">
        <div class="max-w-3xl space-y-3 md:space-y-5">
            <span class="px-4 py-1.5 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest inline-block">
                Portofolio & Dokumentasi Lapangan
            </span>
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tighter uppercase leading-[1.05]">
                Galeri <span class="text-gradient">Projek On Duty.</span>
            </h1>
            <p class="text-sm sm:text-base md:text-xl text-text-secondary font-medium leading-relaxed max-w-2xl">
                Dokumentasi implementasi nyata pekerjaan PJU, betonisasi infrastruktur, konstruksi interior & eksterior, serta pemeliharaan alat berat oleh tim PT. Multi Abadi Aksana.
            </p>
        </div>
    </section>

    <!-- Category Filter Pills -->
    <section class="flex flex-wrap gap-2 md:gap-3">
        @php
            $filterTabs = [
                'semua' => 'Semua Projek',
                'pju' => 'PJU & Infrastruktur Jalan',
                'interior_exterior' => 'Interior & Exterior',
                'mechanical_electrical' => 'Mechanical & Electrical',
                'alat_berat_sparepart' => 'Alat Berat & Sparepart',
            ];
        @endphp
        @foreach($filterTabs as $key => $label)
            <button
                type="button"
                wire:click="setCategory('{{ $key }}')"
                class="px-5 py-2.5 rounded-xl md:rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-wider transition-all {{ $selectedCategory === $key ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'glass text-text-secondary hover:text-primary' }}"
            >
                {{ $label }}
            </button>
        @endforeach
    </section>

    <!-- Project Grid (Niscahya Tall Aspect Cards + Interactive Detail Lightbox) -->
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 md:gap-6">
        @foreach($galleries as $gallery)
            @php
                $imgPath = str_starts_with($gallery->image_path, '/') || str_starts_with($gallery->image_path, 'http')
                    ? $gallery->image_path
                    : asset('storage/' . $gallery->image_path);
            @endphp
            <div
                @click="openLightbox({
                    title: {{ Js::from($gallery->title) }},
                    location: {{ Js::from($gallery->location ?? 'Jawa Timur') }},
                    client: {{ Js::from($gallery->client_or_unit_code ?? 'Mitra PT. MAA') }},
                    desc: {{ Js::from($gallery->description ?? '') }},
                    img: {{ Js::from($imgPath) }}
                })"
                role="button"
                tabindex="0"
                @keydown.enter="openLightbox({
                    title: {{ Js::from($gallery->title) }},
                    location: {{ Js::from($gallery->location ?? 'Jawa Timur') }},
                    client: {{ Js::from($gallery->client_or_unit_code ?? 'Mitra PT. MAA') }},
                    desc: {{ Js::from($gallery->description ?? '') }},
                    img: {{ Js::from($imgPath) }}
                })"
                class="group relative aspect-4/5 md:aspect-9/16 glass rounded-3xl md:rounded-[40px] overflow-hidden border-primary/10 shadow-xl cursor-pointer bg-primary-dark focus:outline-none focus:ring-4 focus:ring-primary/30"
            >
                <img
                    src="{{ $imgPath }}"
                    alt="{{ $gallery->title }}"
                    loading="lazy"
                    decoding="async"
                    width="900"
                    height="1600"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-[#0F1048] via-[#1B1B6C]/45 to-transparent opacity-90 flex flex-col justify-end p-5 md:p-7">
                    <div class="space-y-1.5">
                        <span class="inline-block px-3 py-1 rounded-full bg-secondary/90 text-[8px] md:text-[9px] font-black uppercase tracking-widest text-white">
                            {{ $gallery->client_or_unit_code ?? 'On Duty' }}
                        </span>
                        <h2 class="text-sm md:text-lg font-black text-white uppercase tracking-tight leading-snug">
                            {{ $gallery->title }}
                        </h2>
                        <p class="text-[10px] md:text-xs text-blue-200 font-semibold flex items-center gap-1">
                            <i class="bx bxs-map"></i>
                            <span>{{ $gallery->location }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <!-- Lightbox Modal -->
    <div
        x-show="lightboxOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        style="display: none;"
        class="fixed inset-0 z-50 bg-primary-dark/80 backdrop-blur-md flex items-center justify-center p-4"
        @click.self="lightboxOpen = false"
    >
        <div class="glass-bright max-w-3xl w-full rounded-3xl md:rounded-[40px] overflow-hidden shadow-2xl border border-white/20 grid grid-cols-1 md:grid-cols-2">
            <div class="aspect-square md:aspect-auto bg-primary-dark relative">
                <img :src="activeItem.img" :alt="activeItem.title" class="w-full h-full object-cover" />
            </div>
            <div class="p-6 md:p-8 flex flex-col justify-between space-y-6">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span x-text="activeItem.client" class="px-3 py-1 rounded-full bg-primary/10 text-primary text-[9px] font-black uppercase tracking-widest"></span>
                        <button
                            type="button"
                            @click="lightboxOpen = false"
                            aria-label="Tutup detail projek"
                            class="w-9 h-9 rounded-xl bg-primary/5 text-primary hover:bg-primary hover:text-white flex items-center justify-center transition-colors"
                        >
                            <i class="bx bx-x text-xl"></i>
                        </button>
                    </div>
                    <h3 x-text="activeItem.title" class="text-xl md:text-2xl font-black uppercase tracking-tight text-primary leading-tight"></h3>
                    <p class="text-xs font-bold text-secondary flex items-center gap-1.5">
                        <i class="bx bxs-map"></i>
                        <span x-text="activeItem.location"></span>
                    </p>
                    <p x-text="activeItem.desc" class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed pt-2"></p>
                </div>

                <a
                    href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya tertarik mendiskusikan proyek serupa dengan portofolio On Duty Anda.') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full py-3.5 bg-primary text-white text-center rounded-xl text-xs font-black uppercase tracking-widest hover:bg-primary-dark transition-all flex items-center justify-center gap-2"
                >
                    <i class="bx bxl-whatsapp text-lg"></i>
                    <span>Konsultasikan Proyek Serupa</span>
                </a>
            </div>
        </div>
    </div>
</div>
