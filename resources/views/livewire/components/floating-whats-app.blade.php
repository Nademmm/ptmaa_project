<!-- Kerangka Floating WhatsApp Button -->
<div x-data="{ open: false }" class="fixed bottom-6 right-6 z-50">
    <!-- Popover Pilihan Divisi -->
    <div x-show="open" @click.away="open = false" x-transition class="mb-3 w-72 bg-white rounded-xl shadow-xl border border-slate-200 p-4 space-y-3">
        <div class="border-b border-slate-100 pb-2">
            <span class="text-xs font-bold text-slate-800 uppercase tracking-wider block">Konsultasi via WhatsApp</span>
            <span class="text-xs text-slate-500">Pilih divisi yang ingin Anda hubungi:</span>
        </div>
        <a href="{{ $mainWaUrl }}" target="_blank" rel="noopener" class="block p-2.5 rounded-lg bg-slate-50 hover:bg-emerald-50 text-slate-700 hover:text-emerald-800 text-xs font-semibold border border-slate-200 hover:border-emerald-300 transition">
            💬 Divisi PJU, ME & Interior (Utama)
        </a>
        <a href="{{ $sparepartWaUrl }}" target="_blank" rel="noopener" class="block p-2.5 rounded-lg bg-slate-50 hover:bg-emerald-50 text-slate-700 hover:text-emerald-800 text-xs font-semibold border border-slate-200 hover:border-emerald-300 transition">
            ⚙️ Divisi Sparepart & Alat Berat
        </a>
    </div>

    <!-- Main Floating Trigger Button -->
    <button @click="open = !open" class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-3 rounded-full shadow-lg transition transform hover:scale-105">
        <span class="text-lg">💬</span>
        <span class="text-xs font-bold">Chat WhatsApp</span>
    </button>
</div>

