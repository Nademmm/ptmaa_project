@php
    $mainImg = $product->thumbnail_image
        ? (str_starts_with($product->thumbnail_image, '/') || str_starts_with($product->thumbnail_image, 'http') ? $product->thumbnail_image : asset('storage/' . $product->thumbnail_image))
        : '/images/products/pju-all-in-one.webp';

    $rawGallery = is_array($product->gallery_images) && count($product->gallery_images) > 0
        ? $product->gallery_images
        : [$mainImg];

    $galleryList = collect($rawGallery)->map(function ($img) {
        return str_starts_with($img, '/') || str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
    })->values()->all();

    if (!in_array($mainImg, $galleryList)) {
        array_unshift($galleryList, $mainImg);
    }
@endphp

<div
    x-data="{
        images: {{ Js::from($galleryList) }},
        selectedImage: 0,
        isCutout(src) {
            return src && (src.includes('sparepart-') || src.includes('lampu-pju-'));
        }
    }"
    class="space-y-12 md:space-y-16"
>
    <!-- Top Breadcrumb Bar -->
    <div class="flex flex-wrap items-center justify-between gap-4 pt-2 md:pt-4 border-b border-primary/10 pb-4">
        <div class="flex flex-wrap items-center gap-2 text-primary font-black text-[10px] uppercase tracking-[0.2em]">
            <a href="{{ route('home') }}" class="text-text-secondary hover:text-primary">Beranda</a>
            <i class="bx bx-chevron-right text-sm text-secondary"></i>
            <a href="{{ route('products.index') }}" class="text-text-secondary hover:text-primary">Katalog Pengadaan</a>
            <i class="bx bx-chevron-right text-sm text-secondary"></i>
            <a href="{{ route('products.index', ['kategori' => $product->category?->slug]) }}" class="hover:underline">
                {{ $product->category?->name ?? 'Unit' }}
            </a>
        </div>
        <a
            href="{{ route('products.index') }}"
            class="inline-flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-secondary hover:text-primary"
        >
            <i class="bx bx-left-arrow-alt text-base"></i>
            <span>Kembali ke Katalog</span>
        </a>
    </div>

    <!-- Main Technical Product Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12 items-start">
        <!-- Left Column: Technical Image Viewer (7 Columns) -->
        <div class="lg:col-span-6 space-y-4">
            <div class="aspect-[4/3] rounded-3xl overflow-hidden border border-primary/15 shadow-xl relative bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#2B358C] flex items-center justify-center">
                <img
                    :src="images[selectedImage]"
                    alt="{{ $product->name }}"
                    width="960"
                    height="720"
                    :class="isCutout(images[selectedImage]) ? 'w-full h-full object-contain p-8 md:p-12 drop-shadow-2xl transition-all duration-500' : 'w-full h-full object-cover transition-all duration-500'"
                />
                @if($product->sub_badge)
                    <div class="absolute top-4 left-4">
                        <span class="px-3.5 py-1.5 rounded-xl bg-white/95 backdrop-blur-md text-[10px] font-black uppercase tracking-widest text-primary shadow-md">
                            {{ $product->sub_badge }}
                        </span>
                    </div>
                @endif
                @if($product->brand)
                    <div class="absolute bottom-4 right-4">
                        <span class="px-3.5 py-1.5 rounded-xl bg-[#0F1048]/90 border border-white/15 text-[10px] font-black uppercase tracking-widest text-blue-200">
                            {{ $product->brand }}
                        </span>
                    </div>
                @endif
            </div>

            <!-- Thumbnail Strip -->
            @if(count($galleryList) > 1)
                <div class="grid grid-cols-4 sm:grid-cols-5 gap-3">
                    @foreach($galleryList as $idx => $thumbUrl)
                        <button
                            type="button"
                            @click="selectedImage = {{ $idx }}"
                            aria-label="Pilih gambar {{ $idx + 1 }}"
                            :class="selectedImage === {{ $idx }} ? 'border-primary ring-2 ring-primary/25 scale-95' : 'border-primary/10 opacity-75 hover:opacity-100'"
                            class="aspect-[4/3] rounded-xl overflow-hidden border-2 transition-all bg-[#1B1B6C]"
                        >
                            <img
                                src="{{ $thumbUrl }}"
                                alt="{{ $product->name }} foto {{ $idx + 1 }}"
                                loading="lazy"
                                decoding="async"
                                class="w-full h-full {{ (str_contains($thumbUrl, 'sparepart-') || str_contains($thumbUrl, 'lampu-pju-')) ? 'object-contain p-2' : 'object-cover' }}"
                            />
                        </button>
                    @endforeach
                </div>
            @endif

            <!-- 4-Step Official Process Box (From Proposal PJU & Sparepart PDF) -->
            <div class="bg-white p-5 rounded-2xl border border-primary/10 shadow-sm space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-black uppercase tracking-widest text-primary">Alur Pemesanan & Eksekusi (The Process)</span>
                    <span class="text-[10px] font-bold text-secondary">Standar PT. Multi Abadi Aksana</span>
                </div>
                <div class="grid grid-cols-4 gap-2 text-center">
                    <div class="p-2.5 rounded-xl bg-[#F8FAFC] border border-primary/10">
                        <span class="text-[9px] font-black text-secondary block">01</span>
                        <span class="text-[10px] font-black uppercase text-primary">Komunikasi</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-[#F8FAFC] border border-primary/10">
                        <span class="text-[9px] font-black text-secondary block">02</span>
                        <span class="text-[10px] font-black uppercase text-primary">Survei</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-[#F8FAFC] border border-primary/10">
                        <span class="text-[9px] font-black text-secondary block">03</span>
                        <span class="text-[10px] font-black uppercase text-primary">Negosiasi</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-[#F8FAFC] border border-primary/10">
                        <span class="text-[9px] font-black text-secondary block">04</span>
                        <span class="text-[10px] font-black uppercase text-primary">Deal</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Specification Summary & Direct B2B Inquiry -->
        <div class="lg:col-span-6 space-y-6">
            <div class="space-y-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="px-3 py-1 rounded-lg bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        {{ $product->availability_status?->label() ?? 'Tersedia untuk Pengadaan' }}
                    </span>
                    @if($product->category?->contact_phone)
                        <span class="px-3 py-1 rounded-lg bg-secondary/15 text-primary text-[10px] font-black uppercase tracking-widest">
                            Divisi Sparepart (+62 812-1659-2824)
                        </span>
                    @else
                        <span class="px-3 py-1 rounded-lg bg-secondary/15 text-primary text-[10px] font-black uppercase tracking-widest">
                            Divisi Proyek & PJU (+62 823-4297-9898)
                        </span>
                    @endif
                </div>

                <h1 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight uppercase leading-[1.08] text-text-main">
                    {{ $product->name }}
                </h1>

                @if($product->short_summary)
                    <p class="text-xs sm:text-sm md:text-base text-text-secondary font-medium leading-relaxed">
                        {{ $product->short_summary }}
                    </p>
                @endif
            </div>

            <!-- Quick Technical Spec Preview -->
            @if(is_array($product->specifications) && count($product->specifications) > 0)
                <div class="bg-white rounded-2xl border border-primary/10 overflow-hidden shadow-sm">
                    <div class="px-4 py-2.5 bg-primary text-white text-[10px] font-black uppercase tracking-widest flex items-center justify-between">
                        <span>Ringkasan Parameter Teknis</span>
                        <i class="bx bx-spreadsheet text-sm"></i>
                    </div>
                    <div class="divide-y divide-primary/10">
                        @foreach($product->specifications as $spec)
                            <div class="px-4 py-2.5 flex items-center justify-between gap-4 text-xs">
                                <span class="font-bold text-text-secondary">{{ $spec['label'] ?? 'Parameter' }}</span>
                                <span class="font-black text-primary text-right">{{ $spec['value'] ?? '-' }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Volume Estimator for WhatsApp RFQ -->
            <div class="p-5 rounded-2xl bg-white border border-primary/15 shadow-md space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-black uppercase tracking-widest text-primary">Kustomisasi Volume Pengadaan</span>
                    <span class="text-[10px] font-bold text-secondary">Terlampir Otomatis di Pesan WA</span>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="inquiry-qty" class="block text-[10px] font-bold uppercase tracking-wider text-text-secondary mb-1">Volume Kebutuhan</label>
                        <input
                            id="inquiry-qty"
                            type="number"
                            min="1"
                            wire:model.live="quantity"
                            class="w-full rounded-xl bg-[#F8FAFC] border border-primary/15 px-3.5 py-2.5 text-sm font-black text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                        />
                    </div>
                    <div>
                        <label for="inquiry-unit" class="block text-[10px] font-bold uppercase tracking-wider text-text-secondary mb-1">Satuan</label>
                        <select
                            id="inquiry-unit"
                            wire:model.live="unit"
                            class="w-full rounded-xl bg-[#F8FAFC] border border-primary/15 px-3.5 py-2.5 text-sm font-black text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                        >
                            <option value="Unit">Unit</option>
                            <option value="Set">Set Lengkap</option>
                            <option value="Titik">Titik Tiang</option>
                            <option value="Paket">Paket Proyek</option>
                            <option value="Pcs">Pcs / Buah</option>
                            <option value="Drum">Drum / Pail</option>
                        </select>
                    </div>
                </div>

                <a
                    href="{{ $whatsAppUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full py-4 bg-primary hover:bg-primary-dark text-white font-black rounded-xl shadow-lg shadow-primary/20 flex items-center justify-center gap-2.5 text-xs md:text-sm uppercase tracking-wider transition-all"
                >
                    <i class="bx bxl-whatsapp text-xl"></i>
                    <span>Minta Penawaran Harga via WhatsApp</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Detailed Description, Why Choose & Key Advantages -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-8 pt-6 border-t border-primary/10">
        <div class="lg:col-span-7 bg-white p-6 sm:p-8 rounded-3xl border border-primary/10 shadow-sm space-y-5">
            <h2 class="text-lg md:text-2xl font-black uppercase tracking-tight text-primary">
                Deskripsi Teknis & Lingkup Aplikasi
            </h2>
            <p class="text-xs sm:text-sm md:text-base text-text-secondary leading-relaxed font-medium">
                {{ $product->description }}
            </p>

            @if($product->why_choose_text)
                <div class="p-4 sm:p-5 rounded-2xl bg-[#F8FAFC] border border-primary/10 space-y-2">
                    <h3 class="text-xs md:text-sm font-black uppercase tracking-wider text-primary flex items-center gap-2">
                        <i class="bx bxs-badge-check text-secondary text-lg"></i>
                        <span>Keunggulan Implementasi PT. Multi Abadi Aksana</span>
                    </h3>
                    <p class="text-xs md:text-sm text-text-secondary leading-relaxed font-medium">
                        {{ $product->why_choose_text }}
                    </p>
                </div>
            @endif
        </div>

        <div class="lg:col-span-5 bg-white p-6 sm:p-8 rounded-3xl border border-primary/10 shadow-sm space-y-5">
            <h2 class="text-lg md:text-2xl font-black uppercase tracking-tight text-primary">
                Poin Keunggulan Unit
            </h2>
            @if(is_array($product->advantages) && count($product->advantages) > 0)
                <ul class="space-y-3">
                    @foreach($product->advantages as $adv)
                        <li class="flex items-start gap-3 p-3 rounded-xl bg-[#F8FAFC] border border-primary/10">
                            <div class="w-6 h-6 rounded-lg bg-primary text-white flex items-center justify-center text-sm shrink-0 mt-0.5">
                                <i class="bx bx-check"></i>
                            </div>
                            <span class="text-xs md:text-sm font-bold text-text-main leading-snug">
                                {{ $adv['point'] ?? '' }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <!-- Related Products (3-Column Grid) -->
    @if($relatedProducts->count() > 0)
        <div class="pt-8 border-t border-primary/10 space-y-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                <div>
                    <span class="text-[10px] font-black uppercase tracking-[0.25em] text-secondary block">Rekomendasi Katalog</span>
                    <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tight text-primary">
                        Unit Pengadaan Terkait
                    </h2>
                </div>
                <a
                    href="{{ route('products.index') }}"
                    class="px-4 py-2.5 rounded-xl bg-white border border-primary/15 font-black text-xs text-primary hover:bg-primary hover:text-white transition-all flex items-center gap-2 uppercase tracking-wider"
                >
                    <span>Lihat Semua Katalog</span>
                    <i class="bx bx-right-arrow-alt text-base"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedProducts->take(3) as $relProduct)
                    <livewire:components.product-card :product="$relProduct" :key="'rel-prod-'.$relProduct->id" />
                @endforeach
            </div>
        </div>
    @endif
</div>
