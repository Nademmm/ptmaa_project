@props(['product'])

<div class="h-full">
    <a href="{{ route('products.show', $product->slug) }}" class="group flex flex-col h-full bg-white rounded-3xl overflow-hidden border border-primary/10 hover:border-primary/30 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-out">
        <!-- Product Visual Area -->
        <div class="relative aspect-[4/3] bg-[#F8FAFC] overflow-hidden flex items-center justify-center">
            @php
                $imgUrl = $product->thumbnail_url;
                $isCutout = str_contains($imgUrl, 'sparepart-') || str_contains($imgUrl, 'lampu-pju-cob') || str_contains($imgUrl, 'lampu-pju-osram') || str_contains($imgUrl, 'lampu-pju-philips') || str_contains($imgUrl, 'lampu-pju-estika');
            @endphp
            <img
                src="{{ $imgUrl }}"
                alt="{{ $product->name }}"
                loading="lazy"
                decoding="async"
                width="640"
                height="480"
                class="w-full h-full {{ $isCutout ? 'object-contain p-5 bg-[#0F1048]' : 'object-cover' }}"
            />
        </div>

        <!-- Product Details Area -->
        <div class="p-5 flex flex-col grow justify-between space-y-4">
            <div class="space-y-1.5">
                <h3 class="text-base font-black text-text-main group-hover:text-primary leading-snug tracking-tight uppercase line-clamp-2 transition-colors duration-200">
                    {{ $product->name }}
                </h3>

                @if($product->short_summary)
                    <p class="text-xs text-text-secondary font-medium leading-relaxed line-clamp-2">
                        {{ $product->short_summary }}
                    </p>
                @endif
            </div>

            <div class="pt-3 border-t border-primary/10 flex items-center justify-between">
                <p class="text-[11px] font-bold uppercase tracking-wider text-primary">
                    Lihat Detail Produk
                </p>
                <div class="w-7 h-7 rounded-lg bg-primary/10 group-hover:bg-primary text-primary group-hover:text-white flex items-center justify-center transition-colors duration-200">
                    <i class="bx bx-right-arrow-alt text-base"></i>
                </div>
            </div>
        </div>
    </a>
</div>

