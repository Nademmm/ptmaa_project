@extends('errors.layout')

@section('title', 'Halaman Tidak Ditemukan')
@section('code', '404')
@section('icon-bg', 'bg-amber-50 text-amber-600')
@section('badge-class', 'bg-amber-100/80 text-amber-800')

@section('icon')
    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
    </svg>
@endsection

@section('message')
    Halaman yang Anda tuju tidak dapat ditemukan, telah dipindahkan, atau tautan yang Anda masukkan salah.
@endsection

@section('actions')
    <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-primary text-white text-sm font-semibold hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all shadow-sm min-h-[44px]">
        Kembali ke Beranda
    </a>
    <button type="button" onclick="window.history.length > 1 ? window.history.back() : window.location.href='{{ url('/') }}'" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-slate-300 transition-all min-h-[44px]">
        Halaman Sebelumnya
    </button>
@endsection

@section('extra')
    Mencari layanan atau produk? Silakan telusuri <a href="{{ route('products.index') }}" class="font-semibold text-primary hover:underline">Katalog PJU & ME</a> atau konsultasi langsung melalui <a href="{{ route('contact') }}" class="font-semibold text-primary hover:underline">Halaman Kontak</a>.
@endsection
