<div
    x-data="{ open: false }"
    @keydown.escape.window="open = false"
    class="fixed bottom-5 right-5 z-50 flex flex-col items-end"
>
    <!-- Dual WhatsApp Routing Popup Card -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95"
        style="display: none;"
        class="mb-3 w-72 sm:w-80 glass-bright rounded-3xl p-5 shadow-2xl border border-primary/15 space-y-3"
    >
        <div class="flex items-center justify-between border-b border-primary/10 pb-3">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-primary text-white flex items-center justify-center text-lg font-black">
                    <i class="bx bxl-whatsapp"></i>
                </div>
                <div>
                    <h4 class="text-xs font-black uppercase tracking-tight text-primary">Konsultasi Langsung</h4>
                    <p class="text-[10px] font-bold text-text-secondary">Pilih divisi layanan PT. MAA</p>
                </div>
            </div>
            <button
                type="button"
                @click="open = false"
                aria-label="Tutup pilihan WhatsApp"
                class="w-8 h-8 rounded-lg bg-primary/5 text-text-secondary hover:text-primary flex items-center justify-center"
            >
                <i class="bx bx-x text-lg"></i>
            </button>
        </div>

        <a
            href="{{ $mainWaUrl }}"
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center justify-between p-3.5 rounded-2xl bg-primary text-white hover:bg-primary-dark transition-all shadow-md shadow-primary/15 group"
        >
            <div class="space-y-0.5 pr-2">
                <span class="text-[9px] font-extrabold uppercase tracking-widest text-blue-200 block">Admin Utama</span>
                <span class="text-xs font-black uppercase tracking-tight block">PJU, M&E & Interior</span>
                <span class="text-[10px] font-semibold text-white/80 block">+62 823-4297-9898</span>
            </div>
            <i class="bx bx-right-arrow-alt text-2xl group-hover:translate-x-1 transition-transform"></i>
        </a>

        <a
            href="{{ $sparepartWaUrl }}"
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center justify-between p-3.5 rounded-2xl bg-secondary/15 text-primary hover:bg-secondary hover:text-white transition-all border border-secondary/20 group"
        >
            <div class="space-y-0.5 pr-2">
                <span class="text-[9px] font-extrabold uppercase tracking-widest text-secondary group-hover:text-white/80 block">Admin Divisi Khusus</span>
                <span class="text-xs font-black uppercase tracking-tight block">Sparepart & Pelumas</span>
                <span class="text-[10px] font-semibold opacity-80 block">+62 812-1659-2824</span>
            </div>
            <i class="bx bx-right-arrow-alt text-2xl group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>

    <!-- Floating Trigger Button -->
    <button
        type="button"
        @click="open = !open"
        aria-label="Buka menu konsultasi WhatsApp"
        :aria-expanded="open"
        class="h-14 px-5 rounded-full bg-primary hover:bg-primary-dark text-white shadow-2xl shadow-primary/30 flex items-center gap-2.5 transition-all duration-300 hover:scale-105 border-2 border-white/80"
    >
        <i class="bx text-2xl" :class="open ? 'bx-x' : 'bxl-whatsapp'"></i>
        <span class="text-xs font-black uppercase tracking-wider hidden sm:inline">Chat Admin MAA</span>
    </button>
</div>
