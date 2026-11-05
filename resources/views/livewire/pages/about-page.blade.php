<!-- Kerangka Halaman Tentang Kami (/about) -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-16">
    <!-- Profil & Visi Misi -->
    <div class="max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-wider text-blue-600 block mb-2">Tentang Perusahaan</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">PT. Multi Abadi Aksana</h1>
        <p class="mt-4 text-base text-slate-600 leading-relaxed">
            Perusahaan penyedia barang dan jasa (General Trading, Supplier & Contractor) terkemuka yang berpusat di Sidoarjo, Jawa Timur. Berkomitmen menyajikan solusi terintegrasi, aman (mengutamakan K3), dan berkualitas tinggi untuk kebutuhan sektor publik maupun swasta.
        </p>
    </div>

    <!-- 4 Pilar Layanan: Rincian Pengadaan Barang & Jasa -->
    <div class="space-y-10">
        <h2 class="text-2xl font-bold text-slate-900 border-b border-slate-200 pb-4">
            Rincian 4 Pilar Pengadaan Barang & Jasa
        </h2>

        @foreach($pillars as $pillar)
            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm space-y-6">
                <div>
                    <span class="text-xs font-bold uppercase text-blue-600 tracking-wider">{{ $pillar->code }}</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1">{{ $pillar->name }}</h3>
                    <p class="text-sm text-slate-600 mt-2">{{ $pillar->description }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                    @foreach($pillar->scopes as $scope)
                        <div class="bg-slate-50 p-5 rounded-xl border border-slate-200/80">
                            <h4 class="text-sm font-bold text-slate-800 mb-2">{{ $scope->title }}</h4>
                            <p class="text-xs text-slate-500 mb-3">{{ $scope->description }}</p>
                            @if(!empty($scope->items))
                                <ul class="space-y-1.5 text-xs text-slate-600">
                                    @foreach($scope->items as $item)
                                        <li class="flex items-start gap-2">
                                            <span class="text-blue-500">•</span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

