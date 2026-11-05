<div class="group relative transition-all duration-500 hover:-translate-y-1.5 h-full">
    <a href="{{ route('products.show', $product->slug) }}" class="flex flex-col h-full bg-white rounded-3xl overflow-hidden border border-primary/10 shadow-lg shadow-primary/5 hover:shadow-2xl hover:shadow-primary/15 hover:border-primary/30 transition-all duration-500">
        <!-- Product Visual Area -->
        <div class="relative aspect-[4/3] bg-gradient-to-br from-[#F1F5F9] via-white to-[#E2E8F0] overflow-hidden flex items-center justify-center">
            @php
                $imgUrl = $product->thumbnail_image
                    ? (str_starts_with($product->thumbnail_image, '/') || str_starts_with($product->thumbnail_image, 'http') ? $product->thumbnail_image : asset('storage/' . $product->thumbnail_image))
                    : '/images/products/pju-all-in-one.webp';
                $isCutout = str_contains($imgUrl, 'sparepart-') || str_contains($imgUrl, 'lampu-pju-cob') || str_contains($imgUrl, 'lampu-pju-osram') || str_contains($imgUrl, 'lampu-pju-philips') || str_contains($imgUrl, 'lampu-pju-estika');
            @endphp
            <img
                src="{{ $imgUrl }}"
                alt="{{ $product->name }}"
                loading="lazy"
                decoding="async"
                width="640"
                height="480"
                class="w-full h-full {{ $isCutout ? 'object-contain p-5 bg-[#0F1048]' : 'object-cover' }} transition-transform duration-700 ease-out group-hover:scale-105"
            />

            <!-- Top-left Division & Sub-badge -->
            <div class="absolute top-3.5 left-3.5 right-3.5 flex items-center justify-between gap-2 pointer-events-none">
                <span class="px-3 py-1 rounded-lg bg-primary/95 backdrop-blur-md text-[9px] font-black uppercase tracking-wider text-white shadow-md">
                    {{ $product->sub_badge ?: ($product->category?->name ?? 'Katalog MAA') }}
                </span>
                @if($product->category?->contact_phone)
                    <span class="px-2.5 py-1 rounded-lg bg-secondary/95 backdrop-blur-md text-[8px] font-black uppercase tracking-wider text-white shadow-md">
                        Divisi Sparepart
                    </span>
                @endif
            </div>
        </div>

        <!-- Product Details Area -->
        <div class="p-5 md:p-6 flex flex-col grow justify-between space-y-4">
            <div class="space-y-2">
                <div class="flex items-center justify-between text-[9px] font-extrabold uppercase tracking-widest text-secondary">
                    <span>{{ $product->category?->name ?? 'Pengadaan MAA' }}</span>
                    <span class="text-primary/70">{{ $product->availability_status?->label() ?? 'Tersedia' }}</span>
                </div>

                <h3 class="text-base md:text-lg font-black text-text-main group-hover:text-primary leading-snug tracking-tight uppercase line-clamp-2 transition-colors">
                    {{ $product->name }}
                </h3>

                @if($product->short_summary)
                    <p class="text-xs text-text-secondary font-medium leading-relaxed line-clamp-2">
                        {{ $product->short_summary }}
                    </p>
                @endif
            </div>

            <div class="pt-3.5 border-t border-primary/10 flex items-center justify-between">
                <span class="text-[10px] font-black uppercase tracking-widest text-primary group-hover:text-secondary transition-colors">
                    Lihat Spesifikasi & Detail
                </span>
                <div class="w-8 h-8 rounded-xl bg-primary/10 group-hover:bg-primary text-primary group-hover:text-white flex items-center justify-center transition-all duration-300">
                    <i class="bx bx-right-arrow-alt text-lg group-hover:translate-x-0.5 transition-transform"></i>
                </div>
            </div>
        </div>
    </a>
</div>
