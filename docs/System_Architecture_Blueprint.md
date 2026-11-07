# SYSTEM ARCHITECTURE, FOLDER STRUCTURE & TALL + FILAMENT V3 BLUEPRINT
**Proyek:** Corporate Web Portal & Digital Product Showcase PT. Multi Abadi Aksana  
**Perusahaan:** PT. Multi Abadi Aksana (General Trading, Supplier & Contractor, Sidoarjo)  
**Tech Stack:** Laravel 11, Livewire v3, Alpine.js, Tailwind CSS, Filament PHP v3  
**Target Environment:** Linux VPS (Ubuntu 24.04 LTS, Nginx, PHP 8.3-FPM, MySQL 8.0+, Redis)  

---

## 1. High-Level System Architecture

Arsitektur aplikasi ini dirancang menggunakan pendekatan **Modular Monolith berbasis TALL Stack** dengan pemisahan yang tegas antara *Public Showcase Layer* (Livewire v3 + Blade + Alpine.js) dan *Backoffice CMS Layer* (Filament PHP v3).

```mermaid
graph TD
    subgraph "Public Visitor / Client (Browser)"
        A[Visitor B2B / Dinas / Swasta] -->|HTTPS Request / wire:navigate| B(Nginx Web Server)
    end

    subgraph "Application Server (Laravel 11 + PHP 8.3-FPM)"
        B --> C{Routing Layer}
        C -->|Public Routes / /products /gallery| D[Livewire v3 Full-Page Components]
        C -->|Admin Routes (Obscured Secret Path)| E[Filament PHP v3 Panel]
        
        D --> F[Gateway & Division Filter: PJU vs ME]
        F --> G[Service & Query Layer + Cache]
        E --> H[Eloquent Models & Observers]
        
        H -->|Invalidate Cache on Save/Delete| I[(Redis Cache & Session)]
        G -->|Read Cached Data| I
        G -->|Fallback Query| J[(MySQL 8.0 Database)]
        H -->|Write / Update Data| J
        H -->|Process & Convert to WebP| K[Local/S3 Storage Media]
    end

    subgraph "External Conversion"
        D -->|Direct Click-to-WA Generator| L[WhatsApp PIC Divisi PJU / ME / Sparepart]
    end
```

### Prinsip Arsitektur Utama:
1. **SPA-like Navigation (`wire:navigate`):** Seluruh perpindahan halaman publik (Beranda <-> Produk <-> Detail Produk <-> Galeri <-> Blog <-> Kontak) menggunakan fitur `wire:navigate` dari Livewire v3 agar terasa instan tanpa *full browser reload*.
2. **Dual-Division Gateway Architecture (PJU vs ME):** Pemisahan tegas portal etalase produk antara Divisi **Penerangan Jalan Umum (PJU)** dan Divisi **Mechanical & Electrical (ME)**. Pengunjung yang mengakses `/products` disambut dengan Gateway Selection Portal jika belum memilih divisi, atau langsung diarahkan via parameter URL (`/products?divisi=pju` atau `/products?divisi=me`). Di dalam katalog, terdapat Division Switcher persisten yang menyaring kategori dan item secara spesifik.
3. **Cache-First Public Catalog:** Karena web ini bersifat *read-heavy* (pengunjung meninjau profil korporat, layanan, dan katalog spesifikasi teknis tanpa transaksi *checkout*), kueri utama disimpan di **Redis/File Cache** dan di-reset otomatis melalui **Eloquent Model Observers** ketika Admin mengubah data di Filament v3.
4. **Contextual WhatsApp Routing:** Sistem memiliki service khusus (`WhatsAppGeneratorService`) yang secara cerdas memilih nomor WhatsApp tujuan dan menyusun teks *pre-filled* berdasarkan divisi dan kategori produk (misal: pengadaan PJU ke tim spesialis PJU, unit alat berat ke divisi mekanikal/sparepart).

---

## 2. Daftar Tech Stack & Dependencies

Berikut adalah daftar dependensi resmi pada `composer.json` dan `package.json`:

### 2.1 Backend Dependencies (`composer.json`)
| Package | Versi | Fungsi Utama dalam Proyek |
| :--- | :--- | :--- |
| `laravel/framework` | `^11.0` | Core PHP Framework & MVC Engine. |
| `livewire/livewire` | `^3.5` | Reactive Frontend Components untuk katalog, filter divisi, dan form interaktif. |
| `filament/filament` | `^3.2` | Admin Panel CMS (Obscured Secret Path: `/portal-internal-maa-9x7k2v`) untuk mengelola seluruh data slider hero, produk, layanan, galeri, blog, dan akun administrator. |
| `spatie/laravel-settings` | `^3.3` | Menyimpan konfigurasi global korporat (Nomor WA, Alamat Sidoarjo, Profil). |
| `filament/spatie-laravel-settings-plugin` | `^3.2` | Integrasi halaman pengaturan `spatie/laravel-settings` ke dalam panel Filament. |
| `intervention/image-laravel` | `^1.3` | Optimasi dan konversi foto produk serta galeri proyek ke format modern `.webp`. |
| `artesaos/seotools` | `^1.3` | Manajemen Meta Title, Meta Description, Canonical URL, dan OpenGraph dinamis. |
| `spatie/laravel-sitemap` | `^7.2` | Otomasi pembuatan `sitemap.xml` untuk seluruh produk (`/products/{slug}`) dan artikel. |

### 2.2 Frontend Dependencies (`package.json`)
* `tailwindcss` (`^3.4`), `@tailwindcss/forms`, `@tailwindcss/typography`
* `alpinejs` (Built-in Livewire v3, digunakan untuk dropdown filter, galeri lightbox, tab interaktif, dan sticky navbar responsive).
* `autoprefixer`, `postcss`, `vite`.

---

## 3. Struktur Direktori Proyek (Folder Structure)

Struktur folder terstandarisasi dan modular:

```text
multi-abadi-aksana/
|-- app/
|   |-- Enums/
|   |   |-- InquiryPipelineStatus.php      # Enum: komunikasi, survei, negosiasi, deal, batal
|   |   |-- ServiceScopeType.php           # Enum: barang, jasa
|   |   `-- ProductAvailability.php        # Enum: Tersedia, Pre-Order, Custom Fabrikasi
|   |
|   |-- Filament/
|   |   |-- Pages/
|   |   |   `-- ManageCompanySettings.php  # Halaman edit WA, Alamat, Visi Misi, Profil
|   |   |-- Resources/
|   |   |   |-- ServicePillarResource.php  # CRUD 4 Pilar + RelationManager Barang & Jasa
|   |   |   |-- ProductCategoryResource.php# CRUD Kategori Filter Katalog
|   |   |   |-- ProductResource.php        # CRUD Katalog Produk (Repeater Spek & Keunggulan)
|   |   |   |-- GalleryResource.php        # CRUD Dokumentasi Projek On Duty
|   |   |   |-- PostResource.php           # CRUD Artikel Blog & Wawasan
|   |   |   `-- ContactInquiryResource.php # Manajemen Leads & Pipeline Bisnis
|   |   `-- Widgets/
|   |       |-- StatsOverviewWidget.php    # Ringkasan Total Produk, Proyek, & Pesan Masuk
|   |       `-- LatestInquiriesWidget.php  # Tabel konsultasi proyek terbaru di Dashboard
|   |
|   |-- Livewire/
|   |   |-- Pages/
|   |   |   |-- HomePage.php               # Beranda Korporat (/)
|   |   |   |-- AboutPage.php              # Profil Perusahaan & Lingkup Layanan (/about)
|   |   |   |-- ProductCatalogPage.php     # Gateway & Katalog Produk PJU vs ME (/products)
|   |   |   |-- ProductDetailPage.php      # Detail Produk + Spek + WA CTA (/products/{slug})
|   |   |   |-- GalleryPage.php            # Dokumentasi Lapangan Projek On Duty (/gallery)
|   |   |   |-- BlogIndexPage.php          # Indeks Wawasan & Artikel (/blog)
|   |   |   |-- BlogDetailPage.php         # Detail Artikel Edukatif (/blog/{slug})
|   |   |   `-- ContactPage.php            # Kontak Resmi & Form Konsultasi (/contact)
|   |   `-- Components/
|   |       |-- Navbar.php                 # Header Navigasi Responsif & Dinamis
|   |       |-- Footer.php                 # Footer Korporat Dinamis
|   |       |-- ProductCard.php            # Reusable Card Produk Terstandar
|   |       `-- FloatingWhatsApp.php       # Tombol WA Melayang Cepat
|   |
|   |-- Models/
|   |   |-- ServicePillar.php
|   |   |-- ServiceScope.php
|   |   |-- ProductCategory.php
|   |   |-- Product.php
|   |   |-- Gallery.php
|   |   |-- PostCategory.php
|   |   |-- Post.php
|   |   `-- ContactInquiry.php
|   |
|   |-- Observers/
|   |   |-- ProductObserver.php            # Auto-clear cache katalog & generate slug
|   |   |-- ServicePillarObserver.php      # Auto-clear cache layanan
|   |   `-- GalleryObserver.php            # Auto-clear cache galeri
|   |
|   |-- Services/
|   |   |-- WhatsAppGeneratorService.php   # URL wa.me dinamis & pre-filled message per divisi
|   |   `-- SeoService.php                 # Pengaturan meta tags dinamis per halaman
|   |
|   `-- Settings/
|       `-- CompanySettings.php            # Spatie Settings Class
|
|-- database/
|   |-- migrations/                        # Urutan migrasi basis data
|   `-- seeders/
|       |-- DatabaseSeeder.php
|       |-- CompanySettingsSeeder.php      # Data kontak resmi, alamat Sidoarjo & statistik
|       |-- ServicePillarSeeder.php        # 4 Pilar: PJU, Interior/Exterior, ME, Sparepart
|       |-- ProductCatalogSeeder.php       # Katalog Produk PJU & Mechanical Electrical
|       `-- GallerySeeder.php              # Dokumentasi Projek On Duty terverifikasi
|
|-- resources/
|   |-- css/
|   |   `-- app.css                        # Styling Tailwind CSS & Custom Utility
|   |-- js/
|   |   `-- app.js                         # Inisialisasi Alpine.js & interaktivitas
|   `-- views/
|       |-- components/
|       |   `-- layouts/
|       |       `-- app.blade.php          # Master Layout Publik (Navbar, Slot, Footer, Floating WA)
|       `-- livewire/
|           |-- pages/                     # Blade view untuk setiap halaman Livewire
|           `-- components/                # View reusable untuk ProductCard, Navbar, Footer
|
`-- routes/
    `-- web.php                            # Definisi rute publik
```

---

## 4. Rancangan Routing & Livewire Components (`routes/web.php`)

Seluruh rute publik dirancang bersih, intuitif, dan mendukung *full-page component* Livewire v3:

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\AboutPage;
use App\Livewire\Pages\ProductCatalogPage;
use App\Livewire\Pages\ProductDetailPage;
use App\Livewire\Pages\GalleryPage;
use App\Livewire\Pages\BlogIndexPage;
use App\Livewire\Pages\BlogDetailPage;
use App\Livewire\Pages\ContactPage;

// Beranda & Profil Korporat
Route::get('/', HomePage::class)->name('home');
Route::get('/about', AboutPage::class)->name('about');

// Showcase Katalog Produk & Gateway Divisi (PJU vs ME)
Route::get('/products', ProductCatalogPage::class)->name('products.index');
Route::get('/products/{slug}', ProductDetailPage::class)->name('products.show');

// Portofolio & Dokumentasi Lapangan
Route::get('/gallery', GalleryPage::class)->name('gallery.index');

// Wawasan, Edukasi & Berita
Route::get('/blog', BlogIndexPage::class)->name('blog.index');
Route::get('/blog/{slug}', BlogDetailPage::class)->name('blog.show');

// Kontak Resmi & Konsultasi Proyek
Route::get('/contact', ContactPage::class)->name('contact');
```

### Detail Perilaku Komponen Kunci Livewire v3:

1. **`ProductCatalogPage.php` (`/products`):**
   * Menggunakan parameter URL terikat:
     * `#[Url(as: 'divisi', except: '')]` untuk menangani pemisahan divisi (`pju` atau `me`).
     * `#[Url(as: 'kategori', except: 'semua')]` untuk menyaring sub-kategori aktif.
     * `#[Url(as: 'cari', except: '')]` untuk pencarian kata kunci nama/kode produk.
   * **Gateway State:** Jika pengunjung membuka `/products` tanpa parameter `divisi`, halaman menampilkan **Gateway Portal Selection** yang interaktif dengan 2 kartu divisi:
     * Divisi Penerangan Jalan Umum (PJU Tenaga Surya & PLN)
     * Divisi Mechanical & Electrical (ME, Genset, Panel, Sparepart & Fabrikasi)
   * **Active Division State:** Setelah divisi dipilih, antarmuka bertransisi mulus ke katalog produk dengan *Sticky Division Switcher*, filter sub-kategori yang sesuai, serta daftar produk yang terisolasi.
   * Render kartu produk menggunakan `<x-product-card :product="$product" />` yang rapi dan seragam.

2. **`ProductDetailPage.php` (`/products/{slug}`):**
   * Mengambil data produk berdasarkan `slug` beserta relasi `category.servicePillar`.
   * Interaktivitas gambar menggunakan Alpine.js (`x-data="{ activeImage: '...' }"`) untuk pergantian foto resolusi tinggi secara instan.
   * Integrasi `WhatsAppGeneratorService::forProduct($product)` yang menghasilkan tautan WhatsApp tertarget ke PIC divisi terkait dengan pesan *pre-filled* informatif:
     > *"Halo Admin PT. Multi Abadi Aksana, saya ingin meminta informasi detail dan konsultasi mengenai produk: [Nama Produk] (Kategori: [Nama Kategori]). Tautan: [URL Produk]"*
   * Merender blok informasi teknis:
     1. **Ringkasan & Deskripsi Lengkap**
     2. **Mengapa Memilih Produk Ini?**
     3. **Tabel Spesifikasi Teknis Dinamis** (Looping data JSON `specifications`: daya, voltase, proteksi IP, sertifikasi, dll.)
     4. **Poin Keunggulan Utama** (Looping data JSON `advantages`)
     5. **Produk Terkait dalam Divisi Sama**

---

## 5. Blueprint Arsitektur Filament PHP v3 & Hardened Security

Panel Admin dilindungi sistem pengamanan *defense-in-depth* dan diakses melalui jalur rahasia (default: `/portal-internal-maa-9x7k2v`), sementara jalur bawaan standar (`/admin`, `/wp-admin`, `/login`) otomatis diblokir (`404 Not Found` + IP logging):

### Lapisan Keamanan Akses:
1. **`SecureLogin` Custom Authentication:** Dilengkapi *anti brute-force rate limiting* (maksimal 3 kali gagal per 5 menit) dan *honeypot decoy trap* anti-bot.
2. **`AdminSecurityHeaders` Middleware:** Menyuntikkan `X-Robots-Tag: noindex, nofollow`, `Referrer-Policy: no-referrer`, `X-Frame-Options: DENY`, `X-Content-Type-Options: nosniff`, dan `Cache-Control: no-store`.
3. **Database Session Encryption:** `SESSION_ENCRYPT=true` dengan masa aktif sesi 60 menit.
4. **Struktur Akun Administrator:** 3 akun resmi terdaftar (1 Admin Utama + 2 Admin Cadangan).

### Pengelompokan Menu CMS:

### Group 1: Katalog & Layanan
1. **`ProductResource` (Menu: "Produk & Material"):**
   * Menggunakan *Form Tabs* untuk memudahkan input data:
     * **Tab 1: Informasi Dasar:** Kategori, Nama Produk (auto-slug), Divisi/Sub-badge, Brand, Status Ketersediaan, dan Toggle status unggulan.
     * **Tab 2: Media & Galeri Foto:** Foto utama (rasio seragam, otomatis WebP) dan galeri multi-foto sudut pandang teknis.
     * **Tab 3: Deskripsi & Alasan Memilih:** Ringkasan singkat, deskripsi mendalam, dan seksi alasan pemilihan produk.
     * **Tab 4: Spesifikasi Teknis & Keunggulan (Dynamic Repeaters):**
       * Repeater Spesifikasi (2 kolom: Label dan Nilai teknis).
       * Repeater Keunggulan (Poin-poin diferensiasi produk).
2. **`ProductCategoryResource` (Menu: "Kategori Produk"):**
   * Mengelola pengelompokan kategori dan asosiasi ke pilar layanan.
3. **`ServicePillarResource` (Menu: "4 Pilar Layanan"):**
   * Dilengkapi `ServiceScopesRelationManager` untuk mengelola daftar Pengadaan Barang dan Pengadaan Jasa secara terstruktur.

### Group 2: Portofolio & Publikasi
4. **`HeroSlideResource` (Menu: "Hero Slider Beranda"):**
   * Mengelola headline judul, deskripsi, urutan tampilan (*drag & drop reorder*), upload foto latar belakang dengan *Image Cropper*, dan saklar aktif/nonaktif instan yang langsung terhubung ke Beranda.
5. **`GalleryResource` (Menu: "Galeri Projek On Duty"):**
   * Input dokumentasi proyek lapangan, nama klien/lokasi, dan foto pengerjaan aktual.
6. **`PostResource` & `PostCategoryResource` (Menu: "Artikel & Wawasan"):**
   * Manajemen artikel edukasi teknis dan informasi korporat.

### Group 3: Interaksi Klien (CRM Ringan)
7. **`ContactInquiryResource` (Menu: "Pesan & Konsultasi"):**
   * Memantau pesan masuk dari formulir kontak dengan status pipeline bisnis:
     * `Komunikasi` (Biru - Info)
     * `Survei` (Kuning - Warning)
     * `Negosiasi` (Ungu - Primary)
     * `Deal` (Hijau - Success)

### Group 4: Pengaturan & Administrasi
8. **`UserResource` (Menu: "Akun Administrator"):**
   * Manajemen akun admin dengan validasi password kuat (min 12 karakter) dan proteksi agar akun aktif tidak terhapus.
9. **`ManageCompanySettings` (Menu: "Pengaturan Identitas Perusahaan"):**
   * Konfigurasi nomor kontak resmi, email, alamat kantor, dan jam operasional.
     * `Deal` (Hijau - Success)
     * `Batal` (Merah - Danger)

### Group 4: Pengaturan Sistem
7. **`ManageCompanySettings` (Menu: "Pengaturan Perusahaan"):**
   * Mengelola nomor WhatsApp resmi, alamat kantor Taman & workshop Sukodono (Sidoarjo), email korporat, dan profil perusahaan.

---

## 6. Master Data Seeder (`DatabaseSeeder`)

Penyediaan data awal yang komprehensif saat inisialisasi sistem (`php artisan migrate --seed`):

1. **`CompanySettingsSeeder`:**
   * Mengisi profil korporat PT. Multi Abadi Aksana, visi, misi, komitmen K3, alamat Sidoarjo, email resmi, dan nomor kontak PIC.
2. **`ServicePillarSeeder`:**
   * Mengisi 4 Pilar Layanan:
     * **Penerangan Jalan Umum (PJU)**
     * **Mechanical & Electrical (ME)**
     * **Interior & Exterior**
     * **Sparepart & Equipment**
     * Beserta rincian lingkup Pengadaan Barang dan Pengadaan Jasa.
3. **`ProductCatalogSeeder`:**
   * Mengisi data produk autentik untuk Divisi PJU dan Divisi ME lengkap dengan spesifikasi teknis dan keunggulannya.
4. **`GallerySeeder`:**
   * Mengisi data dokumentasi lapangan terverifikasi (Projek PJU ruas jalan, instalasi interior Adelle Jewellery, pengerjaan betonisasi, dan maintenance unit mekanikal).
