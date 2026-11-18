<div
    x-data="{
        activeItem: { title: '', categoryLabel: '', location: '', desc: '', img: '' },
        init() {
            const dialog = this.$refs.projectDialog;
            if (!dialog || dialog.dataset.lightDismissReady) {
                return;
            }
            dialog.dataset.lightDismissReady = '1';

            if (!('closedBy' in HTMLDialogElement.prototype)) {
                let pressedOutside = false;
                const isOutside = (e) => {
                    const rect = dialog.getBoundingClientRect();
                    return e.clientX < rect.left || e.clientX > rect.right || e.clientY < rect.top || e.clientY > rect.bottom;
                };
                dialog.addEventListener('pointerdown', (e) => {
                    pressedOutside = isOutside(e);
                });
                dialog.addEventListener('pointerup', (e) => {
                    if (pressedOutside && isOutside(e)) {
                        dialog.close();
                    }
                    pressedOutside = false;
                });
            }
        },
        openDetail(item) {
            this.activeItem = item;
            this.$refs.projectDialog?.showModal();
        },
        closeDetail() {
            this.$refs.projectDialog?.close();
        }
    }"
    class="space-y-8 md:space-y-12"
>
    <!-- B2B Portfolio Header Banner -->
    <section class="relative rounded-3xl md:rounded-[40px] bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#242882] p-6 sm:p-10 md:p-12 text-white overflow-hidden shadow-2xl shadow-primary/15">
        <div class="max-w-3xl space-y-3 relative z-10">
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase leading-[1.06]">
                Portofolio <span class="text-[#8DA2E0]">Projek On Duty.</span>
            </h1>
            <p class="text-xs sm:text-sm md:text-base text-blue-100/85 font-medium leading-relaxed">
                Rekam jejak dokumentasi lapangan tim PT. Multi Abadi Aksana: pendirian tiang &amp; instalasi Penerangan Jalan Umum jalan raya, fabrikasi Impeller stainless steel, sistem blower, kelistrikan Mechanical &amp; Electrical industri, serta pengerjaan Interior &amp; Exterior. Klik foto untuk melihat detail projek.
            </p>
        </div>
    </section>

    <!-- Category Filter Bar -->
    <section class="flex flex-wrap items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-primary/10 shadow-sm">
        <div class="flex flex-wrap gap-2">
            @php
                $filterTabs = [
                    'semua' => 'Semua Dokumentasi',
                    'pju' => 'Penerangan Jalan Umum',
                    'mechanical_electrical' => 'Mechanical & Electrical',
                ];
            @endphp
            @foreach($filterTabs as $key => $label)
                <button
                    type="button"
                    wire:click="setCategory('{{ $key }}')"
                    class="inline-flex items-center justify-center min-h-[44px] px-4 sm:px-5 rounded-xl text-[11px] md:text-xs font-black uppercase tracking-wider leading-none text-center transition-all {{ $selectedCategory === $key ? 'bg-primary text-white shadow-md shadow-primary/20' : 'bg-[#F8FAFC] text-text-secondary hover:text-primary' }}"
                >
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </section>

    <!-- Image-Only Project Grid Cards -->
    @if($galleries->isEmpty())
        <div class="bg-white rounded-3xl border border-primary/10 p-10 text-center space-y-2 shadow-sm">
            <p class="text-sm font-bold text-text-main">Belum ada dokumentasi pada kategori ini.</p>
            <p class="text-xs text-text-secondary">Pilih tab kategori lain untuk melihat dokumentasi projek lainnya.</p>
        </div>
    @else
        <section aria-label="Galeri Foto Projek" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
            @foreach($galleries as $gallery)
                @php
                    $imgPath = $gallery->image_url;
                    $categoryLabel = $gallery->category === 'pju' ? 'Penerangan Jalan Umum' : 'Mechanical & Electrical';
                    $payload = [
                        'title' => $gallery->title,
                        'categoryLabel' => $categoryLabel,
                        'location' => $gallery->location ?: 'Jawa Timur',
                        'desc' => $gallery->description ?: '',
                        'img' => $imgPath,
                    ];
                @endphp
                <button
                    type="button"
                    wire:key="gallery-card-{{ $gallery->id }}"
                    @click="openDetail({{ Js::from($payload) }})"
                    aria-label="Lihat detail projek: {{ $gallery->title }}"
                    class="group block w-full aspect-[4/3] rounded-2xl sm:rounded-3xl overflow-hidden bg-[#1B1B6C] border border-primary/10 hover:border-primary/35 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-out cursor-pointer focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-primary/25 p-0 text-left"
                >
                    <img
                        src="{{ $imgPath }}"
                        alt="{{ $gallery->title }}"
                        loading="lazy"
                        decoding="async"
                        width="800"
                        height="600"
                        class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                    />
                </button>
            @endforeach
        </section>
    @endif

    <!-- Native Modal Detail Dialog -->
    <dialog
        x-ref="projectDialog"
        closedby="any"
        aria-labelledby="project-detail-title"
        class="project-detail-dialog"
    >
        <div class="bg-white w-full rounded-3xl overflow-hidden shadow-2xl border border-neutral-200 grid grid-cols-1 md:grid-cols-12 max-h-[calc(100dvh-2rem)] overflow-y-auto overscroll-contain">
            <div class="md:col-span-7 aspect-[4/3] md:aspect-auto md:min-h-[420px] bg-neutral-950 flex items-center justify-center">
                <img
                    :src="activeItem.img"
                    :alt="activeItem.title"
                    class="w-full h-full object-contain max-h-[52dvh] md:max-h-[80dvh]"
                />
            </div>
            <div class="md:col-span-5 p-5 sm:p-6 md:p-8 flex flex-col justify-between gap-6 bg-white">
                <div class="space-y-3">
                    <div class="flex items-center justify-between gap-3">
                        <span x-text="activeItem.categoryLabel" class="text-[11px] font-black uppercase tracking-wider text-secondary"></span>
                        <button
                            type="button"
                            autofocus
                            @click="closeDetail()"
                            aria-label="Tutup detail projek"
                            class="w-11 h-11 min-w-[44px] min-h-[44px] rounded-xl bg-neutral-100 text-neutral-800 hover:bg-primary hover:text-white flex items-center justify-center transition-colors shrink-0 cursor-pointer"
                        >
                            <i class="bx bx-x text-2xl" aria-hidden="true"></i>
                        </button>
                    </div>
                    <h2 id="project-detail-title" x-text="activeItem.title" class="text-lg sm:text-xl md:text-2xl font-black uppercase tracking-tight text-primary leading-tight"></h2>
                    <p x-show="activeItem.location" class="text-xs font-bold text-text-secondary flex items-center gap-1.5">
                        <i class="bx bxs-map text-primary text-sm shrink-0" aria-hidden="true"></i>
                        <span x-text="activeItem.location"></span>
                    </p>
                    <p x-show="activeItem.desc" x-text="activeItem.desc" class="text-xs sm:text-sm text-text-secondary font-medium leading-relaxed pt-1"></p>
                </div>

                <a
                    :href="'https://wa.me/6282342979898?text=' + encodeURIComponent('Halo Tim PT. Multi Abadi Aksana, saya tertarik mendiskusikan proyek serupa dengan dokumentasi: ' + (activeItem.title || 'Projek On Duty'))"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full min-h-[48px] bg-primary text-white text-center rounded-xl text-xs font-black uppercase tracking-wider hover:bg-primary-dark transition-all flex items-center justify-center gap-2 leading-none px-4"
                >
                    <i class="bx bxl-whatsapp text-lg leading-none" aria-hidden="true"></i>
                    <span>Diskusi Lebih Lanjut</span>
                </a>
            </div>
        </div>
    </dialog>
</div>
