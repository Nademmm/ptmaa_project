<!-- Kerangka Halaman Galeri Projek On Duty (/gallery) -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    <div class="border-b border-slate-200 pb-6">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Galeri "Projek On Duty"</h1>
        <p class="mt-2 text-sm text-slate-600 max-w-2xl">
            Bukti nyata kapabilitas, profesionalisme, dan komitmen keselamatan kerja (K3) tim PT. Multi Abadi Aksana di lapangan.
        </p>
    </div>

    <!-- Filter Kategori Proyek -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2">
        <button wire:click="setCategory('semua')" class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap {{ $selectedCategory === 'semua' ? 'bg-blue-600 text-white' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-50' }}">
            Semua Proyek
        </button>
        <button wire:click="setCategory('pju')" class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap {{ $selectedCategory === 'pju' ? 'bg-blue-600 text-white' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-50' }}">
            Proyek PJU
        </button>
        <button wire:click="setCategory('interior_exterior')" class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap {{ $selectedCategory === 'interior_exterior' ? 'bg-blue-600 text-white' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-50' }}">
            Interior & Exterior
        </button>
        <button wire:click="setCategory('me')" class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap {{ $selectedCategory === 'me' ? 'bg-blue-600 text-white' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-50' }}">
            Mechanical Electrical
        </button>
        <button wire:click="setCategory('alat_berat_sparepart')" class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap {{ $selectedCategory === 'alat_berat_sparepart' ? 'bg-blue-600 text-white' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-50' }}">
            Alat Berat & Sparepart
        </button>
    </div>

    <!-- Grid Foto Dokumentasi Lapangan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($galleries as $gallery)
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm flex flex-col justify-between">
                <div class="aspect-4/3 bg-slate-100 flex items-center justify-center overflow-hidden">
                    @if($gallery->image_path)
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-xs text-slate-400">[Foto Proyek: {{ $gallery->title }}]</span>
                    @endif
                </div>
                <div class="p-5">
                    <span class="text-xs font-semibold text-blue-600 uppercase">{{ $gallery->client_or_unit_code }}</span>
                    <h3 class="text-base font-bold text-slate-900 mt-1">{{ $gallery->title }}</h3>
                    <p class="text-xs text-slate-500 mt-1">{{ $gallery->location }}</p>
                    @if($gallery->description)
                        <p class="text-xs text-slate-600 mt-3 line-clamp-3">{{ $gallery->description }}</p>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center text-slate-400">
                Belum ada dokumentasi untuk kategori ini.
            </div>
        @endforelse
    </div>
</div>

