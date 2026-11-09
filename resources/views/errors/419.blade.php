@extends('errors.layout')

@section('title', 'Sesi Halaman Berakhir')
@section('code', '419')
@section('icon-bg', 'bg-sky-50 text-sky-600')
@section('badge-class', 'bg-sky-100/80 text-sky-800')

@section('icon')
    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
    </svg>
@endsection

@section('message')
    Masa aktif formulir atau sesi keamanan halaman Anda telah berakhir. Silakan muat ulang halaman untuk memperbarui token keamanan.
@endsection

@section('actions')
    <button type="button" onclick="window.location.reload()" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-primary text-white text-sm font-semibold hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all shadow-sm min-h-[44px]">
        Muat Ulang Halaman
    </button>
    <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-slate-300 transition-all min-h-[44px]">
        Kembali ke Beranda
    </a>
@endsection
