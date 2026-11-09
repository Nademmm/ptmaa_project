@extends('errors.layout')

@section('title', 'Terlalu Banyak Permintaan')
@section('code', '429')
@section('icon-bg', 'bg-orange-50 text-orange-600')
@section('badge-class', 'bg-orange-100/80 text-orange-800')

@section('icon')
    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
@endsection

@section('message')
    Sistem mendeteksi terlalu banyak permintaan dalam rentang waktu singkat dari perangkat Anda. Demi keamanan, mohon tunggu sejenak sebelum mencoba kembali.
@endsection

@section('actions')
    <button type="button" onclick="window.location.reload()" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-primary text-white text-sm font-semibold hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all shadow-sm min-h-[44px]">
        Coba Lagi
    </button>
    <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-slate-300 transition-all min-h-[44px]">
        Kembali ke Beranda
    </a>
@endsection
