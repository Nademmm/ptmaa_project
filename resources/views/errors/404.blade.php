@extends('errors.layout')

@section('title', 'Halaman Tidak Ditemukan')
@section('code', '404')

@section('message')
    Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan. Silakan kembali ke beranda untuk melanjutkan.
@endsection

@section('actions')
    <a
        href="{{ url('/') }}"
        class="inline-flex items-center justify-center gap-2 h-11 sm:h-12 min-h-[44px] px-7 rounded-xl md:rounded-2xl bg-primary hover:bg-primary-dark text-white font-black text-xs sm:text-sm uppercase tracking-wider shadow-md shadow-primary/20 transition-all leading-none text-center"
    >
        <i class="bx bx-home text-base sm:text-lg leading-none" aria-hidden="true"></i>
        <span>Kembali ke Beranda</span>
    </a>
@endsection

@section('extra')
    Mencari layanan atau produk spesifik? Silakan telusuri <a href="{{ route('products.index') }}" class="font-semibold text-primary hover:underline">Katalog Produk PJU & ME</a> atau konsultasi langsung melalui <a href="{{ route('contact') }}" class="font-semibold text-primary hover:underline">Halaman Kontak</a>.
@endsection
