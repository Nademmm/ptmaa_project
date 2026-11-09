@extends('errors.layout')

@section('title', 'Terlalu Banyak Permintaan')
@section('code', '429')

@section('message')
    Sistem mendeteksi terlalu banyak permintaan dalam rentang waktu singkat dari perangkat Anda. Demi keamanan, mohon tunggu sejenak sebelum mencoba kembali.
@endsection

@section('actions')
    <button
        type="button"
        onclick="window.location.reload()"
        class="group inline-flex items-center justify-center gap-2.5 min-h-[48px] h-[50px] px-7 rounded-full text-white font-semibold text-[15px] transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-primary/20 cursor-pointer select-none"
        style="background: linear-gradient(180deg, #252589 0%, #1B1B6C 60%, #11114b 100%);"
    >
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="transition-transform duration-300 group-hover:rotate-90" aria-hidden="true">
            <path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="whitespace-nowrap">Coba Lagi</span>
    </button>
    <a
        href="{{ url('/') }}"
        class="inline-flex items-center justify-center min-h-[48px] h-[50px] px-6 rounded-full bg-white hover:bg-slate-100 text-slate-700 font-semibold text-[15px] border border-slate-200/80 shadow-sm transition-all cursor-pointer"
    >
        <span>Kembali ke Beranda</span>
    </a>
@endsection
