@php
    $postImg = $post->featured_image
        ? (str_starts_with($post->featured_image, '/') || str_starts_with($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image))
        : '/images/projects/pju-k3-gempol-sidoarjo.webp';
@endphp

<div class="space-y-10 md:space-y-14">
    <!-- Top Article Header -->
    <section class="bg-white p-6 sm:p-10 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5 space-y-6">
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('blog.index') }}" class="text-[10px] font-black uppercase tracking-widest text-secondary hover:text-primary flex items-center gap-1">
                <i class="bx bx-left-arrow-alt text-base"></i>
                <span>Kembali ke Daftar Artikel</span>
            </a>
            <span class="px-3.5 py-1 bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest rounded-lg">
                {{ $post->category?->name ?? 'Wawasan Teknis' }}
            </span>
            <span class="text-text-secondary font-black text-[10px] uppercase tracking-widest">
                {{ $post->published_at?->translatedFormat('d F Y') }}
            </span>
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
                class="w-full h-full object-cover"
            />
        </div>
    </section>

    <!-- Content & Sidebar -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <div class="lg:col-span-8 bg-white p-6 sm:p-10 rounded-3xl border border-primary/10 shadow-lg shadow-primary/5">
            <div class="prose prose-slate md:prose-lg max-w-none text-text-secondary font-medium leading-relaxed">
                @foreach(explode("\n", $post->content) as $paragraph)
                    @if(trim($paragraph) !== '')
                        <p class="mb-5">{{ trim($paragraph) }}</p>
                    @endif
                @endforeach
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
                            $recImg = $recent->featured_image
                                ? (str_starts_with($recent->featured_image, '/') || str_starts_with($recent->featured_image, 'http') ? $recent->featured_image : asset('storage/' . $recent->featured_image))
                                : '/images/projects/me-impeller-rotor-stainless.webp';
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
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                />
                            </div>
                            <div class="space-y-1">
                                <span class="text-[9px] font-black uppercase tracking-widest text-secondary block">
                                    {{ $recent->category?->name ?? 'Wawasan' }}
                                </span>
                                <h3 class="text-xs font-black uppercase tracking-tight leading-snug text-text-main group-hover:text-primary transition-colors line-clamp-2">
                                    {{ $recent->title }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="bg-[#0F1048] text-white p-6 rounded-3xl space-y-3 shadow-xl">
                <span class="text-[9px] font-black uppercase tracking-widest text-[#8DA2E0] block">Unduh Dokumen Resmi</span>
                <h3 class="text-sm font-black uppercase tracking-tight">Katalog & Company Profile PDF</h3>
                <div class="space-y-2 pt-1">
                    <a href="/files/ComPro_MULTI_ABADI_AKSANA.pdf" target="_blank" class="flex items-center justify-between p-2.5 rounded-xl bg-white/10 hover:bg-white hover:text-primary text-[11px] font-black transition-all">
                        <span>Company Profile PT. MAA</span>
                        <i class="bx bxs-download text-base"></i>
                    </a>
                    <a href="/files/PROPOSAL_PJU_MAA.pdf" target="_blank" class="flex items-center justify-between p-2.5 rounded-xl bg-white/10 hover:bg-white hover:text-primary text-[11px] font-black transition-all">
                        <span>Proposal PJU MAA</span>
                        <i class="bx bxs-download text-base"></i>
                    </a>
                    <a href="/files/sparepart_equipment.pdf" target="_blank" class="flex items-center justify-between p-2.5 rounded-xl bg-white/10 hover:bg-white hover:text-primary text-[11px] font-black transition-all">
                        <span>Katalog Sparepart Equipment</span>
                        <i class="bx bxs-download text-base"></i>
                    </a>
                </div>
            </div>
        </aside>
    </section>
</div>
