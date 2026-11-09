@extends('errors.layout')

@section('title', 'Akses Halaman Dibatasi')
@section('code', '403')

@section('message')
    Anda tidak memiliki izin untuk mengakses halaman atau direktori ini. Silakan kembali ke beranda untuk melanjutkan.
@endsection

@section('actions')
    <a
        href="{{ url('/') }}"
        class="inline-flex items-center justify-center gap-2 h-11 sm:h-12 min-h-[44px] px-6 rounded-xl md:rounded-2xl bg-primary hover:bg-primary-dark text-white font-black text-xs uppercase tracking-wider shadow-md shadow-primary/20 transition-all leading-none text-center"
    >
        <i class="bx bx-home text-base leading-none" aria-hidden="true"></i>
        <span>Kembali ke Beranda</span>
    </a>
    <button
        type="button"
        onclick="window.history.length > 1 ? window.history.back() : window.location.href='{{ url('/') }}'"
        class="inline-flex items-center justify-center gap-2 h-11 sm:h-12 min-h-[44px] px-6 rounded-xl md:rounded-2xl bg-white hover:bg-primary/5 text-primary border border-primary/20 font-black text-xs uppercase tracking-wider shadow-sm transition-all leading-none text-center cursor-pointer"
    >
        <i class="bx bx-left-arrow-alt text-base leading-none" aria-hidden="true"></i>
        <span>Halaman Sebelumnya</span>
    </button>
@endsection
