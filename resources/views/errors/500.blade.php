@extends('errors.layout')

@section('title', 'Terjadi Kendala pada Server')
@section('code', '500')
@section('icon-bg', 'bg-rose-50 text-rose-600')
@section('badge-class', 'bg-rose-100/80 text-rose-800')

@section('icon')
    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
    </svg>
@endsection

@section('message')
    Server kami sedang mengalami kendala teknis saat memproses permintaan ini. Sistem telah mencatat aktivitas ini untuk ditindaklanjuti.
@endsection

@section('actions')
    <button type="button" onclick="window.location.reload()" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-primary text-white text-sm font-semibold hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all shadow-sm min-h-[44px]">
        Muat Ulang Halaman
    </button>
    <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-slate-300 transition-all min-h-[44px]">
        Kembali ke Beranda
    </a>
@endsection

@section('extra')
    Jika membutuhkan respon cepat untuk kebutuhan pengadaan proyek, hubungi kami via WhatsApp resmi: <a href="https://wa.me/6282342979898" target="_blank" rel="noopener" class="font-semibold text-primary hover:underline">+62 823-4297-9898</a>.
@endsection
