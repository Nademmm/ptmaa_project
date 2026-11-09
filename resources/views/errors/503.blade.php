@extends('errors.layout')

@section('title', 'Sistem Dalam Pemeliharaan')
@section('code', '503')
@section('icon-bg', 'bg-indigo-50 text-primary')
@section('badge-class', 'bg-indigo-100/80 text-primary font-bold')

@section('icon')
    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.32l-3.276 3.277a3.004 3.004 0 01-2.25 2.25l-3.276-3.276a4.5 4.5 0 00-6.32 4.486c.049.58.025 1.193-.139 1.743" />
    </svg>
@endsection

@section('message')
    Kami sedang melakukan pemeliharaan sistem berkala demi optimalisasi performa dan keamanan layanan. Portal akan segera dapat diakses kembali.
@endsection

@section('actions')
    <button type="button" onclick="window.location.reload()" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-primary text-white text-sm font-semibold hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all shadow-sm min-h-[44px]">
        Muat Ulang Halaman
    </button>
@endsection

@section('extra')
    Untuk kebutuhan mendesak atau informasi tender, hubungi tim kami via WhatsApp resmi: <a href="https://wa.me/6282342979898" target="_blank" rel="noopener" class="font-semibold text-primary hover:underline">+62 823-4297-9898</a>.
@endsection
