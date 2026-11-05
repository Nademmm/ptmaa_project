<?php

use App\Livewire\Pages\AboutPage;
use App\Livewire\Pages\BlogDetailPage;
use App\Livewire\Pages\BlogIndexPage;
use App\Livewire\Pages\ContactPage;
use App\Livewire\Pages\GalleryPage;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\ProductCatalogPage;
use App\Livewire\Pages\ProductDetailPage;
use Illuminate\Support\Facades\Route;

// Beranda & Profil Korporat
Route::get('/', HomePage::class)->name('home');
Route::get('/about', AboutPage::class)->name('about');

// Katalog & Detail Produk (Non-Ecommerce Showcase)
Route::get('/products', ProductCatalogPage::class)->name('products.index');
Route::get('/products/{slug}', ProductDetailPage::class)->name('products.show');

// Galeri Dokumentasi "Projek On Duty"
Route::get('/gallery', GalleryPage::class)->name('gallery.index');

// Wawasan & Berita Edukatif (Blog)
Route::get('/blog', BlogIndexPage::class)->name('blog.index');
Route::get('/blog/{slug}', BlogDetailPage::class)->name('blog.show');

// Kontak, Konsultasi, & Permintaan Survei Lapangan
Route::get('/contact', ContactPage::class)->name('contact');

