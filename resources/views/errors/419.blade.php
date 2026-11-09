@extends('errors.layout')

@section('title', 'Sesi Halaman Berakhir')
@section('code', '419')

@section('message')
    Masa aktif formulir atau sesi keamanan halaman Anda telah berakhir. Silakan muat ulang halaman untuk memperbarui token keamanan.
@endsection

@section('actions')
    <button
        type="button"
        onclick="window.location.reload()"
        class="inline-flex items-center justify-center gap-2 h-11 sm:h-12 min-h-[44px] px-6 rounded-xl md:rounded-2xl bg-primary hover:bg-primary-dark text-white font-black text-xs uppercase tracking-wider shadow-md shadow-primary/20 transition-all leading-none text-center cursor-pointer"
    >
        <i class="bx bx-refresh text-base leading-none" aria-hidden="true"></i>
        <span>Muat Ulang Halaman</span>
    </button>
    <a
        href="{{ url('/') }}"
        class="inline-flex items-center justify-center gap-2 h-11 sm:h-12 min-h-[44px] px-6 rounded-xl md:rounded-2xl bg-white hover:bg-primary/5 text-primary border border-primary/20 font-black text-xs uppercase tracking-wider shadow-sm transition-all leading-none text-center"
    >
        <i class="bx bx-home text-base leading-none" aria-hidden="true"></i>
        <span>Kembali ke Beranda</span>
    </a>
@endsection
