<!-- Kerangka Halaman Daftar Blog (/blog) -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    <div class="border-b border-slate-200 pb-6">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Wawasan & Berita Perusahaan</h1>
        <p class="mt-2 text-sm text-slate-600 max-w-2xl">
            Artikel teknis seputar efisiensi energi PJU, panduan pemeliharaan mesin & sparepart, serta dokumentasi kegiatan PT. Multi Abadi Aksana.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm flex flex-col justify-between">
                <div class="aspect-video bg-slate-100 flex items-center justify-center">
                    <span class="text-xs text-slate-400">[Cover: {{ $post->title }}]</span>
                </div>
                <div class="p-5">
                    <span class="text-xs text-blue-600 font-semibold">{{ $post->category?->name ?? 'Wawasan' }}</span>
                    <h3 class="text-base font-bold text-slate-900 mt-1 line-clamp-2">
                        <a href="{{ route('blog.show', $post->slug) }}" wire:navigate class="hover:text-blue-600">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <p class="text-xs text-slate-500 mt-2 line-clamp-2">{{ $post->excerpt }}</p>
                </div>
                <div class="p-5 pt-0">
                    <a href="{{ route('blog.show', $post->slug) }}" wire:navigate class="text-xs font-semibold text-blue-600 hover:text-blue-800">
                        Baca Selengkapnya &rarr;
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center text-slate-400">
                Belum ada artikel yang dipublikasikan.
            </div>
        @endforelse
    </div>

    <div>
        {{ $posts->links() }}
    </div>
</div>

