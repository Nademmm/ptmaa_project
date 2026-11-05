<div class="group relative transition-transform duration-500 hover:-translate-y-2">
    <a href="{{ route('products.show', $product->slug) }}" class="block">
        <div class="glass rounded-3xl md:rounded-[48px] overflow-hidden border-primary/10 transition-all duration-700 group-hover:shadow-2xl group-hover:shadow-primary/15 group-hover:border-primary/30 relative aspect-4/5 bg-primary-dark">
            <!-- Full-bleed Image -->
            <div class="absolute inset-0 overflow-hidden">
                @php
                    $imgUrl = $product->thumbnail_image
                        ? (str_starts_with($product->thumbnail_image, '/') || str_starts_with($product->thumbnail_image, 'http') ? $product->thumbnail_image : asset('storage/' . $product->thumbnail_image))
                        : '/hero-1.webp';
                @endphp
                <img
                    src="{{ $imgUrl }}"
                    alt="{{ $product->name }}"
                    loading="lazy"
                    decoding="async"
                    width="640"
                    height="800"
                    class="w-full h-full object-cover transition-transform duration-1000 ease-out group-hover:scale-110"
                />
                <!-- Deep Navy Gradient Overlay for high WCAG contrast -->
                <div class="absolute inset-0 bg-gradient-to-t from-[#0F1048] via-[#1B1B6C]/45 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-500"></div>
            </div>

            <!-- Top-left Category & Sub-badge -->
            <div class="absolute top-4 md:top-6 left-4 md:left-6 z-10 flex flex-wrap gap-1.5 pr-4">
                <span class="px-3 md:px-4 py-1 md:py-1.5 rounded-full glass-bright text-[8px] md:text-[9px] font-black uppercase tracking-[0.2em] text-primary shadow-xl">
                    {{ $product->category?->name ?? 'Katalog MAA' }}
                </span>
                @if($product->sub_badge)
                    <span class="px-3 py-1 md:py-1.5 rounded-full bg-secondary/90 backdrop-blur-md text-[8px] md:text-[9px] font-black uppercase tracking-[0.15em] text-white shadow-xl">
                        {{ $product->sub_badge }}
                    </span>
                @endif
            </div>

            <!-- Bottom Overlay Content -->
            <div class="absolute inset-x-0 bottom-0 p-5 md:p-8 flex flex-col justify-end z-10 translate-y-1 group-hover:translate-y-0 transition-transform duration-500">
                <div class="space-y-1.5 md:space-y-2">
                    @if($product->brand)
                        <span class="text-[9px] md:text-[10px] font-extrabold uppercase tracking-[0.25em] text-blue-200 block">
                            {{ $product->brand }}
                        </span>
                    @endif
                    <h3 class="text-base md:text-xl font-black text-white leading-tight tracking-tight uppercase line-clamp-2">
                        {{ $product->name }}
                    </h3>
                    <div class="h-1 w-10 md:w-12 bg-secondary rounded-full group-hover:w-20 md:group-hover:w-24 transition-all duration-500"></div>
                </div>

                <!-- Reveal Action Footer -->
                <div class="pt-4 md:pt-5 flex items-center justify-between border-t border-white/15 mt-3 md:mt-4">
                    <span class="text-[9px] md:text-[10px] font-black uppercase tracking-widest text-white/80 group-hover:text-white transition-colors">
                        Spesifikasi & Detail
                    </span>
                    <div class="w-8 h-8 rounded-full bg-white/15 group-hover:bg-secondary text-white flex items-center justify-center transition-all duration-300">
                        <i class="bx bx-right-arrow-alt text-lg group-hover:translate-x-0.5 transition-transform"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
