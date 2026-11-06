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
            <a href="{{ route('products.index') }}" class="text-text-secondary hover:text-primary">Katalog Produk</a>
            <i class="bx bx-chevron-right text-sm text-secondary"></i>
            <a href="{{ route('products.index', ['divisi' => $product->division]) }}" class="text-text-secondary hover:text-primary">
                {{ $product->division_name }}
            </a>
            <i class="bx bx-chevron-right text-sm text-secondary"></i>
            <a href="{{ route('products.index', ['divisi' => $product->division, 'kategori' => $product->category?->slug]) }}" class="hover:underline">
                {{ $product->category?->name ?? 'Unit' }}
            </a>
        </div>
        <a
            href="{{ route('products.index', ['divisi' => $product->division]) }}"
            class="inline-flex items-center gap-1.5 text-[10px] font-black uppercase tracking-widest text-secondary hover:text-primary leading-none"
        >
            <i class="bx bx-left-arrow-alt text-base leading-none"></i>
            <span>Kembali ke {{ $product->division_name }}</span>
        </a>
    </div>

    <!-- Main Technical Product Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12 items-start">
        <!-- Left Column: Technical Image Viewer -->
        <div class="lg:col-span-6 space-y-4">
            <div class="aspect-[4/3] rounded-3xl overflow-hidden border border-primary/15 shadow-xl relative bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#2B358C] flex items-center justify-center">
                <img
                    :src="images[selectedImage]"
                    alt="{{ $product->name }}"
                    width="960"
                    height="720"
                    :class="isCutout(images[selectedImage]) ? 'w-full h-full object-contain p-8 md:p-12 drop-shadow-2xl transition-all duration-500' : 'w-full h-full object-cover transition-all duration-500'"
                />
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
        </div>

        <!-- Right Column: Specification Summary & Direct B2B Inquiry -->
        <div class="lg:col-span-6 space-y-6">
            <div class="space-y-3">
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
                        <p>Parameter Spesifikasi Teknis</p>
                        <i class="bx bx-spreadsheet text-sm"></i>
                    </div>
                    <div class="divide-y divide-primary/10">
                        @foreach($product->specifications as $spec)
                            <div class="px-4 py-2.5 flex items-center justify-between gap-4 text-xs">
                                <p class="font-bold text-text-secondary">{{ $spec['label'] ?? 'Parameter' }}</p>
                                <p class="font-black text-primary text-right">{{ $spec['value'] ?? '-' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Direct WhatsApp Consultation CTA -->
            <div class="pt-2 space-y-3">
                <a
                    href="{{ $whatsAppUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full h-12 md:h-14 bg-primary hover:bg-primary-dark text-white font-black rounded-2xl shadow-xl shadow-primary/20 flex items-center justify-center gap-3 text-xs md:text-sm uppercase tracking-wider transition-all leading-none text-center"
                >
                    <i class="bx bxl-whatsapp text-2xl leading-none text-secondary"></i>
                    <span>Konsultasi Produk via WhatsApp</span>
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
            <div class="text-xs sm:text-sm md:text-base text-text-secondary leading-relaxed font-medium space-y-3">
                @if(str_contains((string) $product->description, '<p>') || str_contains((string) $product->description, '<ul'))
                    {!! $product->description !!}
                @else
                    <p>{{ $product->description }}</p>
                @endif
            </div>

            @if($product->why_choose_text)
                <div class="p-4 sm:p-5 rounded-2xl bg-[#F8FAFC] border border-primary/10 space-y-2">
                    <h3 class="text-xs md:text-sm font-black uppercase tracking-wider text-primary flex items-center gap-2">
                        <i class="bx bxs-badge-check text-secondary text-lg"></i>
                        <span>Keunggulan Implementasi PT. Multi Abadi Aksana</span>
                    </h3>
                    <div class="text-xs md:text-sm text-text-secondary leading-relaxed font-medium">
                        @if(str_contains((string) $product->why_choose_text, '<p>') || str_contains((string) $product->why_choose_text, '<ul'))
                            {!! $product->why_choose_text !!}
                        @else
                            <p>{{ $product->why_choose_text }}</p>
                        @endif
                    </div>
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
                            <p class="text-xs md:text-sm font-bold text-text-main leading-snug">
                                {{ $adv['point'] ?? '' }}
                            </p>
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
                <h2 class="text-2xl md:text-3xl font-black uppercase tracking-tight text-primary">
                    Unit Pengadaan Terkait
                </h2>
                <a
                    href="{{ route('products.index', ['divisi' => $product->division]) }}"
                    class="inline-flex items-center justify-center gap-2 px-5 h-10 rounded-xl bg-white border border-primary/15 font-black text-xs text-primary hover:bg-primary hover:text-white transition-all uppercase tracking-wider leading-none text-center"
                >
                    <span>Lihat Semua {{ $product->division_name }}</span>
                    <i class="bx bx-right-arrow-alt text-base leading-none"></i>
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
