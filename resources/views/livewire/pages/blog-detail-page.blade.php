<!-- Kerangka Halaman Baca Blog (/blog/{slug}) -->
<article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    <div class="space-y-3">
        <span class="text-xs font-semibold text-blue-600 uppercase">{{ $post->category?->name ?? 'Wawasan' }}</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">{{ $post->title }}</h1>
        <p class="text-xs text-slate-400">Dipublikasikan pada {{ $post->published_at?->format('d F Y') }}</p>
    </div>

    @if($post->featured_image)
        <div class="aspect-video bg-slate-100 rounded-2xl overflow-hidden">
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        </div>
    @endif

    <div class="prose prose-slate max-w-none text-sm leading-relaxed text-slate-700">
        {!! $post->content !!}
    </div>

    <div class="pt-8 border-t border-slate-200">
        <a href="{{ route('blog.index') }}" wire:navigate class="text-sm font-semibold text-blue-600 hover:text-blue-800">
            &larr; Kembali ke Daftar Artikel
        </a>
    </div>
</article>

