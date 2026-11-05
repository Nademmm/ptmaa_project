@php
    $mainImg = $product->thumbnail_image
        ? (str_starts_with($product->thumbnail_image, '/') || str_starts_with($product->thumbnail_image, 'http') ? $product->thumbnail_image : asset('storage/' . $product->thumbnail_image))
        : '/hero-1.webp';

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
        selectedImage: 0
    }"
    class="space-y-12 md:space-y-20"
>
    <!-- Top Section: Gallery & Direct WhatsApp Action -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12 pt-4 md:pt-8 items-start">
        <!-- Left Column: Image Gallery (4/5 Aspect + 5 Thumbnail Slots like Niscahya) -->
        <div class="lg:col-span-6 space-y-4 md:space-y-6">
            <div class="aspect-4/5 rounded-3xl md:rounded-[48px] overflow-hidden glass border-primary/15 shadow-2xl shadow-primary/10 relative bg-primary-dark">
                <img
                    :src="images[selectedImage]"
                    alt="{{ $product->name }}"
                    width="960"
                    height="1200"
                    class="w-full h-full object-cover transition-all duration-500"
                />
                @if($product->sub_badge)
                    <div class="absolute top-5 left-5">
                        <span class="px-4 py-1.5 rounded-full glass-bright text-[10px] font-black uppercase tracking-[0.2em] text-primary shadow-xl">
                            {{ $product->sub_badge }}
                        </span>
                    </div>
                @endif
            </div>

            <!-- 5-Slot Thumbnail Selector -->
            <div class="grid grid-cols-5 gap-2 md:gap-4">
                @for($i = 0; $i < 5; $i++)
                    @if(isset($galleryList[$i]))
                        <button
                            type="button"
                            @click="selectedImage = {{ $i }}"
                            aria-label="Pilih gambar produk {{ $i + 1 }}"
                            :class="selectedImage === {{ $i }} ? 'border-primary ring-4 ring-primary/15 scale-95' : 'border-transparent opacity-70 hover:opacity-100'"
                            class="aspect-square rounded-xl md:rounded-2xl overflow-hidden border-2 transition-all bg-primary-dark"
                        >
                            <img
                                src="{{ $galleryList[$i] }}"
                                alt="{{ $product->name }} thumbnail {{ $i + 1 }}"
                                loading="lazy"
                                decoding="async"
                                width="200"
                                height="200"
                                class="w-full h-full object-cover"
                            />
                        </button>
                    @else
                        <div class="aspect-square rounded-xl md:rounded-2xl bg-primary/5 border-2 border-dashed border-primary/15 flex items-center justify-center text-primary/25">
                            <i class="bx bx-image text-xl md:text-2xl"></i>
                        </div>
                    @endif
                @endfor
            </div>
        </div>

        <!-- Right Column: Product Info & Direct WhatsApp Consultation -->
        <div class="lg:col-span-6 flex flex-col justify-center space-y-6 md:space-y-8">
            <div class="space-y-4">
                <!-- Breadcrumb -->
                <div class="flex flex-wrap items-center gap-2 text-primary font-black text-[9px] md:text-[10px] uppercase tracking-[0.25em]">
                    <a href="{{ route('products.index') }}" class="hover:underline">Katalog</a>
                    <i class="bx bx-chevron-right text-sm"></i>
                    <a href="{{ route('products.index', ['kategori' => $product->category?->slug]) }}" class="hover:underline">
                        {{ $product->category?->name ?? 'Produk' }}
                    </a>
                    @if($product->brand)
                        <i class="bx bx-chevron-right text-sm"></i>
                        <span class="text-secondary">{{ $product->brand }}</span>
                    @endif
                </div>

                <!-- Product Title -->
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-[1.02] text-text-main">
                    {{ $product->name }}
                </h1>

                <!-- Status & Division Badge -->
                <div class="flex flex-wrap items-center gap-3 pt-1">
                    <span class="px-4 py-1.5 rounded-xl bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        {{ $product->availability_status?->label() ?? 'Tersedia untuk Pengadaan' }}
                    </span>
                    @if($product->category?->contact_phone)
                        <span class="px-4 py-1.5 rounded-xl bg-secondary/15 text-primary text-[10px] font-black uppercase tracking-widest">
                            Divisi Sparepart & Equipment
                        </span>
                    @else
                        <span class="px-4 py-1.5 rounded-xl bg-secondary/15 text-primary text-[10px] font-black uppercase tracking-widest">
                            Divisi Proyek & Pengadaan Utama
                        </span>
                    @endif
                </div>

                @if($product->short_summary)
                    <p class="text-sm md:text-base text-text-secondary font-medium leading-relaxed pt-1">
                        {{ $product->short_summary }}
                    </p>
                @endif
            </div>

            <!-- Quantity & Unit Customizer for WhatsApp Inquiry (No Prices - Strict Non-Ecommerce B2B) -->
            <div class="p-5 md:p-6 rounded-3xl glass border-primary/10 space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-black uppercase tracking-widest text-primary">Estimasi Kebutuhan Proyek (Opsional)</span>
                    <span class="text-[10px] font-bold text-text-secondary">Otomatis terlampir di pesan WhatsApp</span>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="inquiry-qty" class="block text-[10px] font-bold uppercase tracking-wider text-text-secondary mb-1">Jumlah / Volume</label>
                        <input
                            id="inquiry-qty"
                            type="number"
                            min="1"
                            wire:model.live="quantity"
                            class="w-full rounded-xl bg-white border border-primary/15 px-3.5 py-2.5 text-sm font-black text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                        />
                    </div>
                    <div>
                        <label for="inquiry-unit" class="block text-[10px] font-bold uppercase tracking-wider text-text-secondary mb-1">Satuan</label>
                        <select
                            id="inquiry-unit"
                            wire:model.live="unit"
                            class="w-full rounded-xl bg-white border border-primary/15 px-3.5 py-2.5 text-sm font-black text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                        >
                            <option value="Unit">Unit</option>
                            <option value="Set">Set Lengkap</option>
                            <option value="Titik">Titik Tiang</option>
                            <option value="Paket">Paket Proyek</option>
                            <option value="Drum">Drum (209L)</option>
                            <option value="Pail">Pail (20L)</option>
                            <option value="Lembar">Lembar / Batang</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Primary WhatsApp CTA Button -->
            <div class="space-y-4">
                <a
                    href="{{ $whatsAppUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full py-5 md:py-6 bg-primary hover:bg-primary-dark text-white font-black rounded-2xl md:rounded-3xl shadow-2xl shadow-primary/25 flex items-center justify-center gap-3 md:gap-4 text-sm md:text-lg uppercase tracking-wider transition-all hover:scale-[1.01]"
                >
                    <i class="bx bxl-whatsapp text-2xl md:text-3xl"></i>
                    <span>Hubungi WhatsApp Admin Sekarang</span>
                </a>

                <!-- Trust & Standard Badges (Niscahya 2-Box Style) -->
                <div class="grid grid-cols-2 gap-3 md:gap-4">
                    <div class="p-4 rounded-2xl glass border-primary/10 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-2xl shrink-0">
                            <i class="bx bx-shield-quarter"></i>
                        </div>
                        <div>
                            <p class="text-[8px] md:text-[9px] font-black uppercase text-text-secondary tracking-wider">Jaminan Mutu</p>
                            <p class="text-xs md:text-sm font-black uppercase text-primary">Bergaransi Resmi</p>
                        </div>
                    </div>
                    <div class="p-4 rounded-2xl glass border-primary/10 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-secondary/15 text-primary flex items-center justify-center text-2xl shrink-0">
                            <i class="bx bx-hard-hat"></i>
                        </div>
                        <div>
                            <p class="text-[8px] md:text-[9px] font-black uppercase text-text-secondary tracking-wider">Eksekusi Proyek</p>
                            <p class="text-xs md:text-sm font-black uppercase text-primary">Standar K3 & SNI</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section: Description, Why Choose, Technical Specs & Advantages -->
    <div class="pt-10 md:pt-14 border-t border-primary/10">
        <div class="max-w-5xl mx-auto space-y-10 md:space-y-14">
            <div class="space-y-4">
                <h2 class="text-2xl md:text-4xl font-black uppercase tracking-tighter text-primary">
                    Deskripsi & Spesifikasi Teknis
                </h2>
                <div class="h-1.5 w-20 bg-secondary rounded-full"></div>
            </div>

            <div class="glass p-6 sm:p-10 md:p-12 rounded-3xl md:rounded-[48px] border-primary/10 space-y-8 md:space-y-10 shadow-xl shadow-primary/5">
                <!-- Full Description -->
                <div class="space-y-3">
                    <h3 class="text-lg md:text-xl font-black text-primary uppercase tracking-tight">Ringkasan Unit & Layanan</h3>
                    <p class="text-sm md:text-base text-text-secondary leading-relaxed font-medium">
                        {{ $product->description }}
                    </p>
                </div>

                <!-- Mengapa Harus Produk Ini? -->
                @if($product->why_choose_text)
                    <div class="space-y-3 pt-6 border-t border-primary/10">
                        <h3 class="text-lg md:text-xl font-black text-primary uppercase tracking-tight">
                            Mengapa Memilih Unit Ini untuk Proyek Anda?
                        </h3>
                        <p class="text-sm md:text-base text-text-secondary leading-relaxed font-medium">
                            {{ $product->why_choose_text }}
                        </p>
                    </div>
                @endif

                <!-- Technical Specifications Table/Grid -->
                @if(is_array($product->specifications) && count($product->specifications) > 0)
                    <div class="space-y-4 pt-6 border-t border-primary/10">
                        <h3 class="text-lg md:text-xl font-black text-primary uppercase tracking-tight">
                            Parameter Spesifikasi Teknis
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach($product->specifications as $spec)
                                <div class="p-4 rounded-2xl bg-primary/5 border border-primary/10 flex flex-col justify-between">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-secondary">
                                        {{ $spec['label'] ?? 'Parameter' }}
                                    </span>
                                    <span class="text-xs md:text-sm font-black text-text-main mt-1">
                                        {{ $spec['value'] ?? '-' }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Key Advantages List -->
                @if(is_array($product->advantages) && count($product->advantages) > 0)
                    <div class="space-y-4 pt-6 border-t border-primary/10">
                        <h3 class="text-lg md:text-xl font-black text-primary uppercase tracking-tight">
                            Keunggulan Utama
                        </h3>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @foreach($product->advantages as $adv)
                                <li class="flex items-start gap-3 p-3.5 rounded-2xl bg-white border border-primary/10 shadow-sm">
                                    <div class="w-6 h-6 rounded-lg bg-primary text-white flex items-center justify-center text-sm shrink-0 mt-0.5">
                                        <i class="bx bx-check"></i>
                                    </div>
                                    <span class="text-xs md:text-sm font-semibold text-text-main leading-snug">
                                        {{ $adv['point'] ?? '' }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Related Products Section ("Unit Terkait") -->
    @if($relatedProducts->count() > 0)
        <div class="pt-12 md:pt-16 border-t border-primary/10 space-y-8 md:space-y-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
                <div class="space-y-2">
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-secondary block">Rekomendasi Katalog</span>
                    <h2 class="text-2xl sm:text-4xl md:text-5xl font-black uppercase tracking-tighter leading-none">
                        Unit <span class="text-gradient">Terkait.</span>
                    </h2>
                </div>
                <a
                    href="{{ route('products.index') }}"
                    class="px-5 py-3 rounded-xl md:rounded-2xl glass font-black text-xs text-primary hover:bg-primary hover:text-white transition-all flex items-center gap-2 uppercase tracking-wider"
                >
                    <span>Semua Katalog</span>
                    <i class="bx bx-right-arrow-alt text-lg"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach($relatedProducts as $relProduct)
                    <livewire:components.product-card :product="$relProduct" :key="'rel-prod-'.$relProduct->id" />
                @endforeach
            </div>
        </div>
    @endif
</div>
