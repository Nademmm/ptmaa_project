<div class="space-y-8 md:space-y-12">
    <!-- Blog Header (Niscahya Style) -->
    <section class="relative pt-6 md:pt-10">
        <div class="max-w-3xl space-y-3 md:space-y-5">
            <span class="px-4 py-1.5 rounded-full bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest inline-block">
                Pusat Edukasi & Informasi Teknis
            </span>
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tighter uppercase leading-[1.05]">
                Wawasan Konstruksi & <br />
                <span class="text-gradient">Infrastruktur.</span>
            </h1>
            <p class="text-sm sm:text-base md:text-xl text-text-secondary font-medium max-w-xl leading-relaxed">
                Pelajari panduan pemilihan PJU Tenaga Surya, pemeliharaan impeller mekanikal pabrik, hingga standar keselamatan kerja (K3).
            </p>
        </div>
    </section>

    <!-- Category Filter Pills -->
    <section class="flex flex-wrap gap-2 md:gap-3">
        <button
            type="button"
            wire:click="$set('selectedCategory', 'semua')"
            class="px-5 py-2.5 rounded-xl text-[10px] font-black tracking-widest uppercase transition-all {{ $selectedCategory === 'semua' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'bg-primary/5 text-text-secondary hover:bg-primary/10' }}"
        >
            Semua Artikel
        </button>
        @foreach($categories as $cat)
            <button
                type="button"
                wire:click="$set('selectedCategory', '{{ $cat->slug }}')"
                class="px-5 py-2.5 rounded-xl text-[10px] font-black tracking-widest uppercase transition-all {{ $selectedCategory === $cat->slug ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'bg-primary/5 text-text-secondary hover:bg-primary/10' }}"
            >
                {{ $cat->name }}
            </button>
        @endforeach
    </section>

    <!-- Blog Grid (2-Column Large Cards like Niscahya Blog.jsx) -->
    <section>
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10">
                @foreach($posts as $post)
                    @php
                        $postImg = $post->featured_image
                            ? (str_starts_with($post->featured_image, '/') || str_starts_with($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image))
                            : '/blog1.webp';
                    @endphp
                    <article class="group glass rounded-3xl md:rounded-[48px] overflow-hidden border-primary/10 hover:border-primary/30 transition-all flex flex-col h-full shadow-xl shadow-primary/5">
                        <a href="{{ route('blog.show', $post->slug) }}" class="relative aspect-video overflow-hidden block bg-primary-dark">
                            <img
                                src="{{ $postImg }}"
                                alt="{{ $post->title }}"
                                loading="lazy"
                                decoding="async"
                                width="1200"
                                height="675"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            />
                            <div class="absolute top-5 left-5">
                                <span class="px-4 py-2 bg-white/95 backdrop-blur-md text-[9px] font-black uppercase tracking-widest rounded-xl text-primary shadow-lg">
                                    {{ $post->category?->name ?? 'Wawasan' }}
                                </span>
                            </div>
                        </a>

                        <div class="p-6 sm:p-8 md:p-10 flex flex-col grow space-y-4">
                            <div class="flex items-center gap-3 text-[10px] font-black text-text-secondary uppercase tracking-widest">
                                <span>{{ $post->published_at?->translatedFormat('d F Y') }}</span>
                                <div class="w-1.5 h-1.5 bg-secondary rounded-full"></div>
                                <span>Oleh Tim Teknis MAA</span>
                            </div>

                            <a href="{{ route('blog.show', $post->slug) }}">
                                <h2 class="text-xl sm:text-2xl md:text-3xl font-black tracking-tighter uppercase leading-[1.1] group-hover:text-primary transition-colors line-clamp-2">
                                    {{ $post->title }}
                                </h2>
                            </a>

                            <p class="text-xs md:text-sm text-text-secondary font-medium line-clamp-3 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>

                            <div class="pt-4 mt-auto">
                                <a
                                    href="{{ route('blog.show', $post->slug) }}"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-primary-dark transition-all shadow-lg shadow-primary/20"
                                >
                                    <span>Baca Selengkapnya</span>
                                    <i class="bx bx-right-arrow-alt text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if($posts->hasPages())
                <div class="pt-8">
                    {{ $posts->links() }}
                </div>
            @endif
        @else
            <div class="py-24 glass rounded-3xl md:rounded-[64px] flex flex-col items-center justify-center text-center space-y-6 border-primary/10">
                <div class="w-20 h-20 bg-primary/10 rounded-3xl flex items-center justify-center text-4xl text-primary">
                    <i class="bx bx-news"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="text-2xl font-black uppercase tracking-tighter text-primary">Artikel Belum Tersedia</h3>
                    <p class="text-xs md:text-sm text-text-secondary font-medium">Tidak ada artikel untuk kategori yang dipilih.</p>
                </div>
                <button
                    type="button"
                    wire:click="$set('selectedCategory', 'semua')"
                    class="px-8 py-3.5 bg-primary text-white text-xs font-black uppercase tracking-widest rounded-2xl"
                >
                    Lihat Semua Artikel
                </button>
            </div>
        @endif
    </section>

    <!-- Bottom CTA Banner (Niscahya Blog Style) -->
    <section class="bg-primary p-8 sm:p-12 md:p-20 rounded-3xl md:rounded-[64px] relative overflow-hidden text-center space-y-6 shadow-2xl">
        <div class="absolute top-0 right-0 p-10 opacity-10 rotate-12 pointer-events-none">
            <i class="bx bx-news text-[180px] text-white"></i>
        </div>
        <div class="max-w-2xl mx-auto space-y-4 relative z-10">
            <h2 class="text-2xl sm:text-4xl md:text-5xl font-black text-white uppercase tracking-tighter leading-tight">
                Butuh Konsultasi Spesifikasi Proyek Anda?
            </h2>
            <p class="text-white/80 font-medium text-sm md:text-lg">
                Diskusikan kebutuhan pengadaan PJU, Mechanical Electrical, Interior Exterior, atau Sparepart bersama tim teknis kami.
            </p>
            <div class="pt-3 flex flex-col sm:flex-row justify-center gap-3 md:gap-4">
                <a
                    href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai spesifikasi teknis proyek.') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="px-8 py-4 bg-white text-primary font-black rounded-2xl hover:bg-secondary hover:text-white transition-all uppercase tracking-widest text-xs"
                >
                    Konsultasi via WhatsApp
                </a>
                <a
                    href="{{ route('products.index') }}"
                    class="px-8 py-4 bg-primary-dark/40 border border-white/25 text-white font-black rounded-2xl hover:bg-white hover:text-primary transition-all uppercase tracking-widest text-xs"
                >
                    Lihat Katalog Produk
                </a>
            </div>
        </div>
    </section>
</div>
