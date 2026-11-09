@extends('errors.layout')

@section('title', 'Akses Halaman Dibatasi')
@section('code', '403')
@section('icon-bg', 'bg-slate-100 text-slate-700')
@section('badge-class', 'bg-slate-200 text-slate-800')

@section('icon')
    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
    </svg>
@endsection

@section('message')
    Anda tidak memiliki hak akses untuk membuka halaman atau direktori ini.
@endsection

@section('actions')
    <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-primary text-white text-sm font-semibold hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all shadow-sm min-h-[44px]">
        Kembali ke Beranda
    </a>
    <button type="button" onclick="window.history.length > 1 ? window.history.back() : window.location.href='{{ url('/') }}'" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-slate-300 transition-all min-h-[44px]">
        Halaman Sebelumnya
    </button>
@endsection
