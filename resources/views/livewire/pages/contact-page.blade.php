<!-- Kerangka Halaman Kontak (/contact) -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">
    <div class="border-b border-slate-200 pb-6">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Hubungi Kami & Konsultasi Proyek</h1>
        <p class="mt-2 text-sm text-slate-600 max-w-2xl">
            Awali kerja sama pengadaan barang dan jasa Anda. Tim kami siap merespon konsultasi teknis, survei lokasi, maupun tender pengadaan.
        </p>
    </div>

    <!-- 3 Kartu Saluran Komunikasi Cepat -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm space-y-2">
            <span class="text-2xl block">💬</span>
            <h3 class="text-base font-bold text-slate-900">WhatsApp Respon Cepat</h3>
            <p class="text-xs text-slate-500">Konsultasi langsung dengan tim admin divisi kami.</p>
            <div class="pt-2 text-xs space-y-1">
                <p><strong>Admin Utama:</strong> +62 823-4297-9898</p>
                <p><strong>Divisi Sparepart:</strong> +62 812-1659-2824</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm space-y-2">
            <span class="text-2xl block">✉️</span>
            <h3 class="text-base font-bold text-slate-900">Email Resmi Tender</h3>
            <p class="text-xs text-slate-500">Pengiriman dokumen pengadaan, RKS, RAB, dan administrasi tender.</p>
            <div class="pt-2 text-xs text-blue-600 font-semibold">
                ptmultiabadiaksana15@gmail.com
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm space-y-2">
            <span class="text-2xl block">🏢</span>
            <h3 class="text-base font-bold text-slate-900">Head Office Sidoarjo</h3>
            <p class="text-xs text-slate-500">Kantor pusat dan operasional PT. Multi Abadi Aksana.</p>
            <div class="pt-2 text-xs text-slate-600">
                Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Taman, Sidoarjo, Jawa Timur 61257.
            </div>
        </div>
    </div>

    <!-- Formulir Konsultasi / Permintaan Survei -->
    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm max-w-3xl mx-auto">
        <h2 class="text-xl font-bold text-slate-900 mb-2">Formulir Permintaan Konsultasi / Survei</h2>
        <p class="text-xs text-slate-500 mb-6">Isi formulir di bawah ini dan data Anda akan langsung terdata pada dashboard CRM tim kami.</p>

        @if($isSubmitted)
            <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-semibold text-center mb-6">
                Terima kasih! Pesan dan permintaan konsultasi Anda telah berhasil dikirim. Tim kami akan segera menghubungi Anda melalui WhatsApp.
            </div>
        @endif

        <form wire:submit="submit" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap *</label>
                    <input type="text" wire:model="full_name" class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:ring-2 focus:ring-blue-500">
                    @error('full_name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Perusahaan / Instansi</label>
                    <input type="text" wire:model="company_or_institution" class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nomor WhatsApp *</label>
                    <input type="text" wire:model="whatsapp_number" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:ring-2 focus:ring-blue-500">
                    @error('whatsapp_number') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Email</label>
                    <input type="email" wire:model="email" class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Pilar Layanan Yang Dibutuhkan</label>
                <select wire:model="service_pillar_id" class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Pilar Layanan</option>
                    @foreach($pillars as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Pesan / Rincian Kebutuhan *</label>
                <textarea wire:model="message" rows="4" placeholder="Jelaskan kebutuhan pengadaan barang atau pekerjaan jasa yang Anda perlukan..." class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:ring-2 focus:ring-blue-500"></textarea>
                @error('message') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full py-3 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm transition">
                Kirim Permintaan Konsultasi
            </button>
        </form>
    </div>
</div>

