<!-- Kerangka Halaman Detail Produk (/products/{slug}) -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">
    <!-- 1. Breadcrumb -->
    <nav class="text-xs text-slate-500 flex items-center gap-2">
        <a href="{{ route('home') }}" wire:navigate class="hover:text-blue-600">Beranda</a>
        <span>/</span>
        <a href="{{ route('products.index') }}" wire:navigate class="hover:text-blue-600">Produk</a>
        <span>/</span>
        <a href="{{ route('products.index', ['kategori' => $product->category?->slug]) }}" wire:navigate class="hover:text-blue-600">{{ $product->category?->name }}</a>
        <span>/</span>
        <span class="text-slate-800 font-semibold">{{ $product->name }}</span>
    </nav>

    <!-- 2. Header & Visual Showcase Layer -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <!-- Kolom Kiri: Galeri Foto (Alpine.js Image Switcher) -->
        <div x-data="{ activeImage: '{{ $product->thumbnail_image ? asset('storage/' . $product->thumbnail_image) : '' }}' }" class="space-y-4">
            <div class="aspect-4/3 w-full bg-slate-100 rounded-2xl border border-slate-200 overflow-hidden flex items-center justify-center">
                @if($product->thumbnail_image)
                    <img :src="activeImage" alt="{{ $product->name }}" class="w-full h-full object-cover">
                @else
                    <div class="text-slate-400 text-sm font-medium">[Foto Produk: {{ $product->name }}]</div>
                @endif
            </div>

            <!-- Thumbnail List -->
            @if(!empty($product->gallery_images))
                <div class="flex gap-3 overflow-x-auto pb-2">
                    @foreach($product->gallery_images as $img)
                        <button @click="activeImage = '{{ asset('storage/' . $img) }}'" class="w-20 h-20 rounded-lg border border-slate-200 overflow-hidden focus:ring-2 focus:ring-blue-600 flex-shrink-0">
                            <img src="{{ asset('storage/' . $img) }}" alt="Thumbnail" class="w-full h-full object-cover">
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Kolom Kanan: Detail & Direct WhatsApp CTA -->
        <div class="flex flex-col justify-between space-y-6">
            <div class="space-y-3">
                <!-- Badges -->
                <div class="flex items-center gap-2 flex-wrap">
                    @if($product->sub_badge)
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200">
                            {{ $product->sub_badge }}
                        </span>
                    @endif
                    @if($product->brand)
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                            Merek: {{ $product->brand }}
                        </span>
                    @endif
                    @if($product->has_warranty_badge)
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                            ✓ Bergaransi
                        </span>
                    @endif
                    @if($product->has_eco_k3_badge)
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                            🛡️ Standar K3
                        </span>
                    @endif
                </div>

                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">
                    {{ $product->name }}
                </h1>

                @if($product->short_summary)
                    <p class="text-sm text-slate-600 leading-relaxed">
                        {{ $product->short_summary }}
                    </p>
                @endif
            </div>

            <!-- Tombol Utama: Direct WhatsApp Conversion -->
            <div class="pt-6 border-t border-slate-200">
                <a href="{{ $whatsAppUrl }}" target="_blank" rel="noopener" class="w-full flex items-center justify-center gap-3 py-4 px-6 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-base shadow-lg transition transform hover:scale-[1.01]">
                    <span class="text-xl">💬</span>
                    <span>Konsultasi & Penawaran via WhatsApp</span>
                </a>
                <p class="text-center text-xs text-slate-400 mt-2">
                    Respon langsung oleh tim ahli divisi {{ $product->category?->name ?? 'teknis' }}.
                </p>
            </div>
        </div>
    </div>

    <!-- 3. Rincian Teknis & Mengapa Harus Produk Ini -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 pt-8 border-t border-slate-200">
        <!-- Kolom Deskripsi & Nilai Tambah (2 Kolom) -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Deskripsi Produk -->
            <div>
                <h3 class="text-lg font-bold text-slate-900 mb-3">Deskripsi Produk</h3>
                <div class="text-sm text-slate-600 leading-relaxed prose prose-slate max-w-none">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>

            <!-- Mengapa Harus Produk Ini? -->
            @if($product->why_choose_text)
                <div class="bg-slate-50 p-6 rounded-xl border border-slate-200">
                    <h3 class="text-base font-bold text-slate-900 mb-2">Mengapa Memilih Produk Ini?</h3>
                    <div class="text-xs text-slate-600 leading-relaxed">
                        {!! nl2br(e($product->why_choose_text)) !!}
                    </div>
                </div>
            @endif

            <!-- Tabel Spesifikasi Teknis (Key-Value) -->
            @if(!empty($product->specifications))
                <div>
                    <h3 class="text-lg font-bold text-slate-900 mb-3">Spesifikasi Teknis</h3>
                    <div class="border border-slate-200 rounded-xl overflow-hidden">
                        <table class="min-w-full divide-y divide-slate-200 text-xs">
                            <tbody class="divide-y divide-slate-200">
                                @foreach($product->specifications as $spec)
                                    <tr class="even:bg-slate-50">
                                        <td class="px-4 py-3 font-semibold text-slate-700 w-1/3">{{ $spec['label'] ?? '' }}</td>
                                        <td class="px-4 py-3 text-slate-600">{{ $spec['value'] ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

        <!-- Kolom Keunggulan Produk (1 Kolom) -->
        <div>
            @if(!empty($product->advantages))
                <div class="bg-blue-50/50 p-6 rounded-xl border border-blue-100 space-y-4">
                    <h3 class="text-base font-bold text-blue-950">Poin Keunggulan</h3>
                    <ul class="space-y-3">
                        @foreach($product->advantages as $adv)
                            <li class="flex items-start gap-2 text-xs text-slate-700">
                                <span class="text-emerald-600 font-bold">✓</span>
                                <span>{{ $adv['point'] ?? '' }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <!-- 4. Unit & Produk Terkait -->
    @if($relatedProducts->count() > 0)
        <div class="pt-12 border-t border-slate-200">
            <h3 class="text-xl font-bold text-slate-900 mb-6">Produk Terkait di Kategori Ini</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $rel)
                    <livewire:components.product-card :product="$rel" :key="$rel->id" />
                @endforeach
            </div>
        </div>
    @endif
</div>

