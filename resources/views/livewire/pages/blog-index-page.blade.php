<div class="space-y-8 md:space-y-12">
    <!-- B2B Technical Articles Header Banner -->
    <section class="relative rounded-3xl md:rounded-[40px] bg-gradient-to-br from-[#0F1048] via-[#1B1B6C] to-[#242882] p-6 sm:p-10 md:p-12 text-white overflow-hidden shadow-2xl shadow-primary/15">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 relative z-10">
            <div class="space-y-3 max-w-2xl">
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase leading-[1.06]">
                    Wawasan <span class="text-[#8DA2E0]">Teknik & Pengadaan.</span>
                </h1>
                <p class="text-xs sm:text-sm md:text-base text-blue-100/85 font-medium leading-relaxed">
                    Artikel teknis seputar konfigurasi PJU Tenaga Surya & PJU PLN (COB, Osram, Philips, Estika), fabrikasi impeller & blower industri, hingga manajemen suku cadang dan penerapan K3.
                </p>
            </div>

            <!-- Category Filter Buttons -->
            <div class="flex flex-wrap gap-2">
                <button
                    type="button"
                    wire:click="$set('selectedCategory', 'semua')"
                    class="px-4 py-2 rounded-xl text-[10px] font-black tracking-widest uppercase transition-all {{ $selectedCategory === 'semua' ? 'bg-white text-primary shadow-lg' : 'bg-white/10 text-blue-100 hover:bg-white/20' }}"
                >
                    Semua Topik
                </button>
                @foreach($categories as $cat)
                    <button
                        type="button"
                        wire:click="$set('selectedCategory', '{{ $cat->slug }}')"
                        class="px-4 py-2 rounded-xl text-[10px] font-black tracking-widest uppercase transition-all {{ $selectedCategory === $cat->slug ? 'bg-white text-primary shadow-lg' : 'bg-white/10 text-blue-100 hover:bg-white/20' }}"
                    >
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 3-Column Technical Articles Grid -->
    <section>
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach($posts as $post)
                    @php
                        $postImg = $post->featured_image
                            ? (str_starts_with($post->featured_image, '/') || str_starts_with($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image))
                            : '/images/projects/pju-k3-gempol-sidoarjo.webp';
                    @endphp
                    <article class="group bg-white rounded-3xl overflow-hidden border border-primary/10 hover:border-primary/30 transition-all flex flex-col h-full shadow-lg shadow-primary/5">
                        <a href="{{ route('blog.show', $post->slug) }}" class="relative aspect-[16/10] overflow-hidden block bg-[#1B1B6C]">
                            <img
                                src="{{ $postImg }}"
                                alt="{{ $post->title }}"
                                loading="lazy"
                                decoding="async"
                                width="800"
                                height="500"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            />
                        </a>

                        <div class="p-6 flex flex-col grow space-y-3.5">
                            <p class="text-[10px] font-black text-text-secondary uppercase tracking-wider">
                                {{ $post->published_at?->translatedFormat('d M Y') }} • Tim Teknis PT. MAA
                            </p>

                            <a href="{{ route('blog.show', $post->slug) }}">
                                <h2 class="text-lg md:text-xl font-black tracking-tight uppercase leading-snug text-text-main group-hover:text-primary transition-colors line-clamp-2">
                                    {{ $post->title }}
                                </h2>
                            </a>

                            <p class="text-xs text-text-secondary font-medium line-clamp-3 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>

                            <div class="pt-3 mt-auto border-t border-primary/10">
                                <a
                                    href="{{ route('blog.show', $post->slug) }}"
                                    class="inline-flex items-center justify-between w-full text-[10px] font-black uppercase tracking-widest text-primary group-hover:text-secondary transition-colors"
                                >
                                    <span>Baca Artikel Lengkap</span>
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
            <div class="py-20 bg-white rounded-3xl flex flex-col items-center justify-center text-center space-y-5 border border-primary/10">
                <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center text-3xl text-primary">
                    <i class="bx bx-news"></i>
                </div>
                <div class="space-y-1.5">
                    <h3 class="text-xl font-black uppercase tracking-tight text-primary">Artikel Belum Tersedia</h3>
                    <p class="text-xs text-text-secondary font-medium">Tidak ada artikel untuk kategori yang dipilih.</p>
                </div>
                <button
                    type="button"
                    wire:click="$set('selectedCategory', 'semua')"
                    class="px-6 py-3 bg-primary text-white text-xs font-black uppercase tracking-widest rounded-xl"
                >
                    Lihat Semua Artikel
                </button>
            </div>
        @endif
    </section>
</div>
