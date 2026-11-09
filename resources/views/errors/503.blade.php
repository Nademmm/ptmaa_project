@extends('errors.layout')

@section('title', 'Sistem Dalam Pemeliharaan')
@section('code', '503')

@section('message')
    Kami sedang melakukan pemeliharaan sistem berkala demi optimalisasi performa dan keamanan layanan. Portal akan segera dapat diakses kembali.
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
@endsection

@section('extra')
    Untuk kebutuhan mendesak atau informasi tender, hubungi tim kami via WhatsApp resmi: <a href="https://wa.me/6282342979898" target="_blank" rel="noopener" class="font-semibold text-primary hover:underline">+62 823-4297-9898</a>.
@endsection
