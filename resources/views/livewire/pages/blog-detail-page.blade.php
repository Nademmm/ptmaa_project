@php
    $postImg = $post->featured_image_url;
    $fullPostImgUrl = str_starts_with($postImg, 'http') ? $postImg : url($postImg);
@endphp

@push('head')
    <link rel="preload" as="image" href="{{ $postImg }}" fetchpriority="high">
    <meta property="article:published_time" content="{{ ($post->published_at ?? $post->created_at ?? now())->toAtomString() }}">
    <meta property="article:modified_time" content="{{ ($post->updated_at ?? $post->published_at ?? now())->toAtomString() }}">
    @if($post->category)
        <meta property="article:section" content="{{ $post->category->name }}">
    @endif
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'TechArticle',
                'headline' => $post->title,
                'description' => !empty($post->meta_description) ? $post->meta_description : trim(strip_tags((string) ($post->excerpt ?: $post->content))),
                'image' => [$fullPostImgUrl],
                'datePublished' => ($post->published_at ?? $post->created_at ?? now())->toAtomString(),
                'dateModified' => ($post->updated_at ?? $post->published_at ?? now())->toAtomString(),
                'author' => [
                    '@type' => 'Organization',
                    'name' => 'Tim Engineering PT. Multi Abadi Aksana',
                    'url' => route('home'),
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => 'PT. Multi Abadi Aksana',
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => asset('assets/logo.webp'),
                    ],
                ],
                'mainEntityOfPage' => [
                    '@type' => 'WebPage',
                    '@id' => route('blog.show', $post->slug),
                ],
            ],
            [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Beranda',
                        'item' => route('home'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Wawasan & Artikel',
                        'item' => route('blog.index'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => $post->title,
                        'item' => route('blog.show', $post->slug),
                    ],
                ],
            ],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

<div class="space-y-10 md:space-y-14">
    <!-- Top Article Header -->
    <section class="bg-white p-6 sm:p-10 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5 space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <a href="{{ route('blog.index') }}" class="text-[10px] font-black uppercase tracking-widest text-secondary hover:text-primary flex items-center gap-1">
                <i class="bx bx-left-arrow-alt text-base"></i>
                <span>Kembali ke Daftar Artikel</span>
            </a>
            <p class="text-text-secondary font-black text-[10px] uppercase tracking-widest">
                {{ $post->published_at?->translatedFormat('d F Y') }}
            </p>
        </div>

        <h1 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight uppercase leading-tight text-primary">
            {{ $post->title }}
        </h1>

        <div class="aspect-video md:aspect-[21/9] rounded-2xl overflow-hidden bg-[#1B1B6C] border border-primary/10">
            <img
                src="{{ $postImg }}"
                alt="{{ $post->title }}"
                width="1400"
                height="600"
                fetchpriority="high"
                decoding="sync"
                class="w-full h-full object-cover"
            />
        </div>
    </section>

    <!-- Content & Sidebar -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <div class="lg:col-span-8 bg-white p-6 sm:p-10 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5">
            <div class="prose prose-slate md:prose-lg max-w-none text-text-secondary font-medium leading-relaxed">
                @if(str_contains($post->content, '<p>') || str_contains($post->content, '<h') || str_contains($post->content, '<ul') || str_contains($post->content, '<ol'))
                    {!! $post->content !!}
                @else
                    @foreach(explode("\n", $post->content) as $paragraph)
                        @if(trim($paragraph) !== '')
                            <p class="mb-5">{{ trim($paragraph) }}</p>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

        <aside class="lg:col-span-4 space-y-6 lg:sticky lg:top-24">
            <div class="bg-white p-6 rounded-3xl border border-primary/10 space-y-5 shadow-lg shadow-primary/5">
                <h2 class="text-base font-black uppercase tracking-tight text-primary border-b border-primary/10 pb-3">
                    Artikel Teknis Lainnya
                </h2>
                <div class="space-y-4">
                    @foreach($recentPosts as $recent)
                        @php
                            $recImg = $recent->featured_image_url;
                        @endphp
                        <a href="{{ route('blog.show', $recent->slug) }}" class="group flex gap-3.5 items-center">
                            <div class="w-16 h-16 shrink-0 rounded-xl overflow-hidden bg-[#1B1B6C]">
                                <img
                                    src="{{ $recImg }}"
                                    alt="{{ $recent->title }}"
                                    loading="lazy"
                                    decoding="async"
                                    width="128"
                                    height="128"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <h3 class="text-xs font-black uppercase tracking-tight leading-snug text-text-main group-hover:text-primary transition-colors line-clamp-2">
                                {{ $recent->title }}
                            </h3>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="bg-[#0F1048] text-white p-6 rounded-3xl space-y-3 shadow-xl">
                <h3 class="text-sm font-black uppercase tracking-tight">Konsultasi Spesifikasi Teknis</h3>
                <p class="text-xs text-blue-100/80 leading-relaxed">
                    Hubungi tim teknis PT. Multi Abadi Aksana untuk berdiskusi mengenai pengadaan PJU, konstruksi, maupun suku cadang industri.
                </p>
                <a
                    href="https://wa.me/6282342979898?text={{ urlencode('Halo Tim PT. Multi Abadi Aksana, saya ingin berkonsultasi mengenai spesifikasi teknis proyek.') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full h-11 bg-white text-primary hover:bg-secondary hover:text-white rounded-xl text-xs font-black uppercase tracking-wider flex items-center justify-center gap-2 transition-all leading-none text-center"
                >
                    <i class="bx bxl-whatsapp text-base leading-none"></i>
                    <span>Hubungi Kami</span>
                </a>
            </div>
        </aside>
    </section>
</div>
