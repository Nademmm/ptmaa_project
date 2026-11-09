@extends('errors.layout')

@section('title', 'Terjadi Gangguan Server')
@section('code', '500')

@section('message')
    Mohon maaf, server kami sedang mengalami kendala teknis saat memproses permintaan ini. Silakan coba muat ulang halaman ini atau kembali ke beranda.
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

@section('extra')
    Jika membutuhkan respon cepat untuk kebutuhan pengadaan proyek, hubungi tim kami via WhatsApp resmi: <a href="https://wa.me/6282342979898" target="_blank" rel="noopener" class="font-semibold text-primary hover:underline">+62 823-4297-9898</a>.
@endsection
