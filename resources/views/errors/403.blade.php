@extends('errors.layout')

@section('title', 'Akses Halaman Dibatasi')
@section('code', '403')

@section('message')
    Anda tidak memiliki izin untuk mengakses halaman atau direktori ini. Silakan kembali ke beranda untuk melanjutkan.
@endsection

@section('actions')
    <a
        href="{{ url('/') }}"
        class="group inline-flex items-center justify-center gap-2.5 min-h-[48px] h-[50px] px-7 rounded-full text-white font-semibold text-[15px] transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-primary/20 cursor-pointer select-none"
        style="background: linear-gradient(180deg, #252589 0%, #1B1B6C 60%, #11114b 100%);"
    >
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="transition-transform duration-300 group-hover:-translate-x-1" aria-hidden="true">
            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="whitespace-nowrap">Kembali ke Beranda</span>
    </a>
    <button
        type="button"
        onclick="window.history.length > 1 ? window.history.back() : window.location.href='{{ url('/') }}'"
        class="inline-flex items-center justify-center min-h-[48px] h-[50px] px-6 rounded-full bg-white hover:bg-slate-100 text-slate-700 font-semibold text-[15px] border border-slate-200/80 shadow-sm transition-all cursor-pointer"
    >
        <span>Halaman Sebelumnya</span>
    </button>
@endsection
