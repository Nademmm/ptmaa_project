<div
    x-data="{ open: false }"
    @keydown.escape.window="open = false"
    class="fixed bottom-5 right-5 z-50 flex flex-col items-end"
>
    <!-- Dual WhatsApp Routing Popup Card -->
    <div
        x-show="open"
        x-transition.opacity.duration.150ms
        style="display: none;"
        class="mb-3 w-72 sm:w-80 bg-white rounded-2xl p-4 shadow-xl border border-primary/15 space-y-2.5"
    >
        <div class="flex items-center justify-between border-b border-primary/10 pb-2.5">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center text-base">
                    <i class="bx bxl-whatsapp"></i>
                </div>
                <div>
                    <h4 class="text-xs font-black uppercase tracking-tight text-primary">Konsultasi Langsung</h4>
                    <p class="text-[10px] font-medium text-text-secondary">Pilih divisi layanan PT. MAA</p>
                </div>
            </div>
            <button
                type="button"
                @click="open = false"
                aria-label="Tutup pilihan WhatsApp"
                class="w-7 h-7 rounded-md bg-primary/5 text-text-secondary hover:text-primary flex items-center justify-center transition-colors duration-150"
            >
                <i class="bx bx-x text-base"></i>
            </button>
        </div>

        <a
            href="{{ $mainWaUrl }}"
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center justify-between p-3 rounded-xl bg-primary text-white hover:bg-primary-dark transition-colors duration-200"
        >
            <div class="space-y-0.5 pr-2">
                <p class="text-xs font-black uppercase tracking-tight">PJU, M&E & Interior</p>
                <p class="text-[10px] font-medium text-white/80">+62 823-4297-9898</p>
            </div>
            <i class="bx bx-right-arrow-alt text-xl"></i>
        </a>

        <a
            href="{{ $sparepartWaUrl }}"
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center justify-between p-3 rounded-xl bg-[#F8FAFC] text-primary hover:bg-secondary hover:text-white transition-colors duration-200 border border-primary/10"
        >
            <div class="space-y-0.5 pr-2">
                <p class="text-xs font-black uppercase tracking-tight">Sparepart & Pelumas</p>
                <p class="text-[10px] font-medium opacity-80">+62 812-1659-2824</p>
            </div>
            <i class="bx bx-right-arrow-alt text-xl"></i>
        </a>
    </div>

    <!-- Floating Trigger Button -->
    <button
        type="button"
        @click="open = !open"
        aria-label="Buka menu konsultasi WhatsApp"
        :aria-expanded="open"
        class="h-12 px-4 rounded-full bg-primary hover:bg-primary-dark text-white shadow-lg flex items-center justify-center gap-2 transition-colors duration-200 leading-none"
    >
        <i class="bx text-xl leading-none" :class="open ? 'bx-x' : 'bxl-whatsapp'"></i>
    </button>
</div>
