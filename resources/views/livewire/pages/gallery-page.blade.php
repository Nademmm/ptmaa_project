<div
    x-data="{
        lightboxOpen: false,
        activeItem: { title: '', location: '', desc: '', img: '' },
        openLightbox(item) {
            this.activeItem = item;
            this.lightboxOpen = true;
        }
    }"
    @keydown.escape.window="lightboxOpen = false"
    class="space-y-8 md:space-y-12"
>
    <!-- B2B Portfolio Header Banner -->
    <section class="relative rounded-3xl md:rounded-[40px] bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#242882] p-6 sm:p-10 md:p-12 text-white overflow-hidden shadow-2xl shadow-primary/15">
        <div class="max-w-3xl space-y-3 relative z-10">
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase leading-[1.06]">
                Portofolio <span class="text-[#8DA2E0]">Projek On Duty.</span>
            </h1>
            <p class="text-xs sm:text-sm md:text-base text-blue-100/85 font-medium leading-relaxed">
                Rekam jejak dokumentasi lapangan tim PT. Multi Abadi Aksana: ereksi tiang & instalasi PJU jalan raya, pengerjaan interior komersial, serta fabrikasi impeller stainless steel dan blower industri.
            </p>
        </div>
    </section>

    <!-- Category Filter Bar -->
    <section class="flex flex-wrap items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-primary/10 shadow-sm">
        <div class="flex flex-wrap gap-2">
            @php
                $filterTabs = [
                    'semua' => 'Semua Dokumentasi',
                    'pju' => 'Projek PJU & Infrastruktur',
                    'interior_exterior' => 'Interior & Exterior',
                    'mechanical_electrical' => 'Mechanical & Electrical',
                ];
            @endphp
            @foreach($filterTabs as $key => $label)
                <button
                    type="button"
                    wire:click="setCategory('{{ $key }}')"
                    class="px-4 py-2 rounded-xl text-[10px] md:text-xs font-black uppercase tracking-wider transition-all {{ $selectedCategory === $key ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-[#F8FAFC] text-text-secondary hover:text-primary' }}"
                >
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </section>

    <!-- Structured 3-Column Engineering Project Cards (Clean without Cluttered Badges) -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($galleries as $gallery)
            @php
                $imgPath = str_starts_with($gallery->image_path, '/') || str_starts_with($gallery->image_path, 'http')
                    ? $gallery->image_path
                    : asset('storage/' . $gallery->image_path);
            @endphp
            <article
                @click="openLightbox({
                    title: {{ Js::from($gallery->title) }},
                    location: {{ Js::from($gallery->location ?? 'Jawa Timur') }},
                    desc: {{ Js::from($gallery->description ?? '') }},
                    img: {{ Js::from($imgPath) }}
                })"
                role="button"
                tabindex="0"
                @keydown.enter="openLightbox({
                    title: {{ Js::from($gallery->title) }},
                    location: {{ Js::from($gallery->location ?? 'Jawa Timur') }},
                    desc: {{ Js::from($gallery->description ?? '') }},
                    img: {{ Js::from($imgPath) }}
                })"
                class="group bg-white rounded-3xl overflow-hidden border border-primary/10 hover:border-primary/30 shadow-lg shadow-primary/5 hover:shadow-2xl transition-all duration-300 flex flex-col cursor-pointer focus:outline-none focus:ring-4 focus:ring-primary/20"
            >
                <!-- 4:3 Field Photo Header -->
                <div class="relative aspect-[4/3] overflow-hidden bg-[#1B1B6C]">
                    <img
                        src="{{ $imgPath }}"
                        alt="{{ $gallery->title }}"
                        loading="lazy"
                        decoding="async"
                        width="800"
                        height="600"
                        class="w-full h-full object-cover"
                    />
                    <div class="absolute bottom-3 right-3 w-9 h-9 rounded-xl bg-white/90 text-primary flex items-center justify-center shadow-md group-hover:bg-primary group-hover:text-white transition-colors">
                        <i class="bx bx-fullscreen text-lg"></i>
                    </div>
                </div>

                <!-- Card Metadata Body -->
                <div class="p-5 sm:p-6 flex flex-col justify-between grow space-y-3">
                    <div class="space-y-2">
                        <p class="text-[10px] font-black uppercase tracking-wider text-secondary flex items-center gap-1.5">
                            <i class="bx bxs-map text-xs"></i>
                            <span>{{ $gallery->location }}</span>
                        </p>
                        <h2 class="text-base md:text-lg font-black uppercase tracking-tight text-text-main group-hover:text-primary transition-colors leading-snug">
                            {{ $gallery->title }}
                        </h2>
                        @if($gallery->description)
                            <p class="text-xs text-text-secondary font-medium leading-relaxed line-clamp-3">
                                {{ $gallery->description }}
                            </p>
                        @endif
                    </div>

                    <div class="pt-3 border-t border-primary/10 flex items-center justify-between text-[10px] font-black uppercase tracking-wider text-primary">
                        <p>Perbesar Foto & Detail</p>
                        <i class="bx bx-right-arrow-alt text-base"></i>
                    </div>
                </div>
            </article>
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
        class="fixed inset-0 z-50 bg-[#0F1048]/85 backdrop-blur-md flex items-center justify-center p-4"
        @click.self="lightboxOpen = false"
    >
        <div class="bg-white max-w-4xl w-full rounded-3xl overflow-hidden shadow-2xl border border-primary/20 grid grid-cols-1 md:grid-cols-12">
            <div class="md:col-span-7 aspect-[4/3] md:aspect-auto bg-[#0F1048] flex items-center justify-center">
                <img :src="activeItem.img" :alt="activeItem.title" class="w-full h-full object-contain max-h-[75vh]" />
            </div>
            <div class="md:col-span-5 p-6 md:p-8 flex flex-col justify-between space-y-6">
                <div class="space-y-3">
                    <div class="flex items-center justify-end">
                        <button
                            type="button"
                            @click="lightboxOpen = false"
                            aria-label="Tutup detail projek"
                            class="w-9 h-9 rounded-xl bg-primary/5 text-primary hover:bg-primary hover:text-white flex items-center justify-center transition-colors"
                        >
                            <i class="bx bx-x text-xl"></i>
                        </button>
                    </div>
                    <h3 x-text="activeItem.title" class="text-lg md:text-2xl font-black uppercase tracking-tight text-primary leading-tight"></h3>
                    <p class="text-xs font-bold text-secondary flex items-center gap-1.5">
                        <i class="bx bxs-map"></i>
                        <span x-text="activeItem.location"></span>
                    </p>
                    <p x-text="activeItem.desc" class="text-xs md:text-sm text-text-secondary font-medium leading-relaxed pt-2"></p>
                </div>

                <a
                    href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya tertarik mendiskusikan proyek serupa dengan dokumentasi Projek On Duty Anda.') }}"
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
