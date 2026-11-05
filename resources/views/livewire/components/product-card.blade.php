<!-- Kerangka Reusable Card Produk (Non-Ecommerce Showcase) -->
<div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between group hover:shadow-md transition">
    <div>
        <!-- Foto Produk (Placeholder / Uploaded) -->
        <div class="aspect-video w-full bg-slate-100 flex items-center justify-center overflow-hidden">
            @if($product->thumbnail_image)
                <img src="{{ asset('storage/' . $product->thumbnail_image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
            @else
                <div class="text-slate-400 text-sm font-medium flex items-center gap-2">
                    <span>[Foto Produk]</span>
                </div>
            @endif
        </div>

        <div class="p-5">
            <!-- Badge Tipe & Kategori -->
            <div class="flex items-center gap-2 mb-2 flex-wrap">
                @if($product->sub_badge)
                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                        {{ $product->sub_badge }}
                    </span>
                @endif
                <span class="text-xs text-slate-500 font-medium">
                    {{ $product->category?->name }}
                </span>
            </div>

            <!-- Nama Produk -->
            <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-600 transition line-clamp-2">
                <a href="{{ route('products.show', $product->slug) }}" wire:navigate>
                    {{ $product->name }}
                </a>
            </h3>

            <!-- Ringkasan Singkat -->
            @if($product->short_summary)
                <p class="mt-2 text-xs text-slate-600 line-clamp-2">
                    {{ $product->short_summary }}
                </p>
            @endif
        </div>
    </div>

    <!-- Tombol Detail (Bukan Beli / Checkout) -->
    <div class="p-5 pt-0">
        <a href="{{ route('products.show', $product->slug) }}" wire:navigate class="w-full block text-center py-2 px-4 rounded-lg border border-slate-300 hover:border-blue-600 hover:bg-blue-50 hover:text-blue-700 text-slate-700 text-sm font-medium transition">
            Lihat Spesifikasi & Detail
        </a>
    </div>
</div>

