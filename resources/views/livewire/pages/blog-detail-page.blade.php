@php
    $postImg = $post->featured_image
        ? (str_starts_with($post->featured_image, '/') || str_starts_with($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image))
        : '/blog1.webp';
@endphp

<div class="space-y-12 md:space-y-16">
    <!-- Hero Header (Niscahya BlogDetail Style) -->
    <section class="relative space-y-8 md:space-y-10 pt-4 md:pt-8">
        <div class="max-w-4xl space-y-5 md:space-y-6">
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('blog.index') }}" class="text-[10px] font-black uppercase tracking-widest text-secondary hover:underline flex items-center gap-1">
                    <i class="bx bx-left-arrow-alt text-base"></i>
                    <span>Kembali ke Blog</span>
                </a>
                <span class="px-4 py-1.5 bg-primary/10 border border-primary/20 text-primary text-[9px] md:text-[10px] font-black uppercase tracking-[0.25em] rounded-xl">
                    {{ $post->category?->name ?? 'Wawasan' }}
                </span>
                <span class="text-text-secondary font-black text-[9px] md:text-[10px] uppercase tracking-widest">
                    {{ $post->published_at?->translatedFormat('d F Y') }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-4xl md:text-5xl font-black tracking-tighter uppercase leading-tight text-text-main">
                {{ $post->title }}
            </h1>

            <div class="flex items-center gap-3.5">
                <div class="w-11 h-11 bg-primary rounded-xl flex items-center justify-center text-white text-base font-black shadow-md">
                    M
                </div>
                <div>
                    <p class="text-[9px] font-black uppercase tracking-widest text-text-secondary">Ditulis Oleh</p>
                    <p class="text-xs md:text-sm font-black uppercase tracking-tight text-primary">Tim Teknis PT. Multi Abadi Aksana</p>
                </div>
            </div>
        </div>

        <div class="aspect-video md:aspect-21/9 rounded-3xl md:rounded-[56px] overflow-hidden shadow-2xl shadow-primary/10 border-4 md:border-8 border-white bg-primary-dark">
            <img
                src="{{ $postImg }}"
                alt="{{ $post->title }}"
                width="1600"
                height="685"
                class="w-full h-full object-cover"
            />
        </div>
    </section>

    <!-- Content & Related Sidebar -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12 items-start">
        <div class="lg:col-span-8">
            <div class="glass p-6 sm:p-10 md:p-14 rounded-3xl md:rounded-[48px] border-primary/10 space-y-6 shadow-xl shadow-primary/5">
                <div class="prose prose-slate md:prose-lg max-w-none text-text-secondary font-medium leading-relaxed">
                    @foreach(explode("\n", $post->content) as $paragraph)
                        @if(trim($paragraph) !== '')
                            <p class="mb-5">{{ trim($paragraph) }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <aside class="lg:col-span-4 space-y-6 sticky top-28">
            <div class="glass p-6 md:p-8 rounded-3xl md:rounded-[40px] border-primary/10 space-y-6 shadow-xl shadow-primary/5">
                <h2 class="text-lg font-black uppercase tracking-tighter text-primary border-b border-primary/10 pb-3">
                    Artikel Lainnya
                </h2>
                <div class="space-y-5">
                    @foreach($recentPosts as $recent)
                        @php
                            $recImg = $recent->featured_image
                                ? (str_starts_with($recent->featured_image, '/') || str_starts_with($recent->featured_image, 'http') ? $recent->featured_image : asset('storage/' . $recent->featured_image))
                                : '/blog2.webp';
                        @endphp
                        <a href="{{ route('blog.show', $recent->slug) }}" class="group flex gap-3.5 items-center">
                            <div class="w-20 h-20 shrink-0 rounded-2xl overflow-hidden bg-primary-dark">
                                <img
                                    src="{{ $recImg }}"
                                    alt="{{ $recent->title }}"
                                    loading="lazy"
                                    decoding="async"
                                    width="160"
                                    height="160"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                />
                            </div>
                            <div class="space-y-1">
                                <span class="text-[8px] font-black uppercase tracking-widest text-secondary block">
                                    {{ $recent->category?->name ?? 'Wawasan' }}
                                </span>
                                <h3 class="text-xs md:text-sm font-black uppercase tracking-tight leading-snug text-text-main group-hover:text-primary transition-colors line-clamp-2">
                                    {{ $recent->title }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </aside>
    </section>
</div>
