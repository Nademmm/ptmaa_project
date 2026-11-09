# SYSTEM ARCHITECTURE, FOLDER STRUCTURE & TALL + FILAMENT V3 BLUEPRINT

**Proyek:** Corporate Web Portal & Digital Product Showcase PT. Multi Abadi Aksana  
**Perusahaan:** PT. Multi Abadi Aksana (General Trading, Supplier & Contractor, Sidoarjo)  
**Tech Stack:** Laravel 11, Livewire v3, Alpine.js, Tailwind CSS, Filament PHP v3  
**Target Environment:** Linux VPS (Ubuntu 24.04 LTS, Nginx, PHP 8.3-FPM, SQLite / MySQL 8.0+)  

---

## 1. High-Level System Architecture

Arsitektur aplikasi ini dirancang menggunakan pendekatan **Modular Monolith berbasis TALL Stack** dengan pemisahan yang tegas antara *Public Showcase Layer* (Livewire v3 + Blade + Alpine.js) dan *Backoffice CMS Layer* (Filament PHP v3).

```mermaid
graph TD
    subgraph "Public Visitor / Client (Browser)"
        A["Visitor B2B / Dinas / Swasta"] -->|HTTPS Request| B("Nginx Web Server")
    end

    subgraph "Application Server (Laravel 11 + PHP 8.3-FPM)"
        B --> C{"Routing Layer"}
        C -->|Public Routes / /products /gallery| D["Livewire v3 Full-Page Components"]
        C -->|Admin Routes (Obscured Secret Path)| E["Filament PHP v3 Panel"]
        
        D --> F["2-Division Filter: PJU vs ME"]
        F --> G["Service & Query Layer + Cache"]
        E --> H["Eloquent Models & Observers"]
        
        H -->|Invalidate Cache on Save/Delete| I[("Application Cache")]
        G -->|Read Cached Data| I
        G -->|Fallback Query| J[("SQLite / MySQL Database")]
        H -->|Write / Update Data| J
        H -->|Store Optimized WebP| K["Public & Storage Media"]
    end

    subgraph "External Conversion"
        D -->|Direct Click-to-WA Generator| L["WhatsApp Resmi PT. MAA (+62 823-4297-9898)"]
    end
```

### Prinsip Arsitektur Utama:
1. **Dual-Division Focus Architecture (PJU vs ME):** Pemisahan tegas portal etalase produk antara Divisi **Penerangan Jalan Umum (`pju`)** dan Divisi **Mechanical & Electrical (`me`)** melalui parameter URL (`/products?divisi=pju` atau `/products?divisi=me`).
2. **Cache-First Public Showcase:** Kueri utama (Hero Slides, Pilar Layanan, Produk Unggulan, Kategori Katalog, Galeri, Artikel Terbaru, dan Sitemap XML) disimpan di dalam Cache dan di-reset otomatis melalui **Eloquent Model Observers** & model lifecycle hooks ketika Admin mengubah data di Filament v3.
3. **Automatic Image Cache-Busting:** `Product::resolvePublicImageUrl()` dan `HeroSlide::getImageUrlAttribute()` menyematkan parameter versi berbasis `filemtime()` secara otomatis sehingga setiap pembaruan foto langsung ter-render tanpa kendala cache browser.
4. **Contextual WhatsApp Routing:** `WhatsAppGeneratorService` menyusun tautan `wa.me` resmi dengan teks *pre-filled* yang memuat nama produk, kategori, dan tautan referensi halaman.

---

## 2. Daftar Tech Stack & Dependencies

### 2.1 Backend Dependencies (`composer.json`)
| Package | Versi | Fungsi Utama dalam Proyek |
| :--- | :--- | :--- |
| `laravel/framework` | `^11.0` | Core PHP Framework & MVC Engine. |
| `livewire/livewire` | `3.5` | Reactive Frontend Components untuk katalog, filter divisi, dan form interaktif. |
| `filament/filament` | `^3.2` | Admin Panel CMS (Obscured Secret Path: `/portal-internal-maa-9x7k2v`) untuk mengelola seluruh data slider hero, produk, layanan, galeri, blog, dan akun administrator. |
| `spatie/laravel-settings` | `^3.3` | Menyimpan konfigurasi global korporat (Nomor WA, Alamat Sidoarjo, Profil). |
| `filament/spatie-laravel-settings-plugin` | `^3.2` | Integrasi halaman pengaturan `spatie/laravel-settings` ke dalam panel Filament. |
| `intervention/image-laravel` | `^1.3` | Optimasi dan pemrosesan gambar `.webp`. |
| `artesaos/seotools` | `^1.3` | Dukungan utilitas SEO metadata. |
| `spatie/laravel-sitemap` | `^7.2` | Dukungan standar struktur XML sitemap. |

### 2.2 Frontend Dependencies (`package.json`)
* `tailwindcss` (`^3.4.3`), `@tailwindcss/forms`, `@tailwindcss/typography`
* `alpinejs` (Built-in Livewire v3, digunakan untuk dropdown filter, galeri lightbox `x-teleport`, tab interaktif, dan floating navbar).
* `autoprefixer`, `postcss`, `vite` (`^5.0`).

---

## 3. Struktur Direktori Proyek (Folder Structure)

```text
ptmaa_project/
|-- app/
|   |-- Enums/
|   |   |-- InquiryPipelineStatus.php      # Enum: komunikasi, survei, negosiasi, deal, batal
|   |   |-- ServiceScopeType.php           # Enum: barang, jasa
|   |   `-- ProductAvailability.php        # Enum: tersedia, pre_order, custom
|   |
|   |-- Filament/
|   |   |-- Pages/
|   |   |   |-- Auth/SecureLogin.php       # Login kustom dengan rate-limit & honeypot
|   |   |   `-- ManageCompanySettings.php  # Halaman edit WA, Alamat Sidoarjo, Visi Misi
|   |   |-- Resources/
|   |   |   |-- HeroSlideResource.php      # CRUD Hero Slider Beranda
|   |   |   |-- ServicePillarResource.php  # CRUD 2 Divisi Bisnis + Repeater Barang & Jasa
|   |   |   |-- ProductCategoryResource.php# CRUD Kategori Filter Katalog
|   |   |   |-- ProductResource.php        # CRUD Katalog Produk (Repeater Spek & Keunggulan)
|   |   |   |-- GalleryResource.php        # CRUD Dokumentasi Projek On Duty
|   |   |   |-- PostCategoryResource.php   # CRUD Kategori Artikel
|   |   |   |-- PostResource.php           # CRUD Artikel Blog & Wawasan
|   |   |   |-- ContactInquiryResource.php # Manajemen Leads & Pipeline Bisnis
|   |   |   `-- UserResource.php           # Manajemen Akun Administrator
|   |   `-- Widgets/
|   |       |-- StatsOverviewWidget.php    # Ringkasan Total Produk, Proyek, & Pesan Masuk
|   |       `-- LatestInquiriesWidget.php  # Tabel konsultasi proyek terbaru di Dashboard
|   |
|   |-- Http/Middleware/
|   |   `-- AdminSecurityHeaders.php       # Header keamanan khusus Portal Admin
|   |
|   |-- Livewire/
|   |   |-- Pages/
|   |   |   |-- HomePage.php               # Beranda Korporat (/)
|   |   |   |-- AboutPage.php              # Profil Perusahaan & 2 Divisi Layanan (/about)
|   |   |   |-- ProductCatalogPage.php     # Katalog Produk PJU vs ME (/products)
|   |   |   |-- ProductDetailPage.php      # Detail Produk + Spek + WA CTA (/products/{slug})
|   |   |   |-- GalleryPage.php            # Dokumentasi Lapangan Projek On Duty (/gallery)
|   |   |   |-- BlogIndexPage.php          # Indeks Wawasan & Artikel (/blog)
|   |   |   |-- BlogDetailPage.php         # Detail Artikel Edukatif (/blog/{slug})
|   |   |   `-- ContactPage.php            # Kontak Resmi & Form Konsultasi (/contact)
|   |   `-- Components/
|   |       |-- Navbar.php                 # Header Navigasi Responsif & Dinamis
|   |       |-- Footer.php                 # Footer Korporat Dinamis
|   |       `-- FloatingWhatsApp.php       # Tombol WA Melayang Cepat
|   |
|   |-- Models/
|   |   |-- HeroSlide.php
|   |   |-- ServicePillar.php
|   |   |-- ServiceScope.php
|   |   |-- ProductCategory.php
|   |   |-- Product.php
|   |   |-- Gallery.php
|   |   |-- PostCategory.php
|   |   |-- Post.php
|   |   |-- ContactInquiry.php
|   |   `-- User.php
|   |
|   |-- Observers/
|   |   |-- ProductObserver.php            # Auto-clear cache katalog, sitemap & generate slug
|   |   |-- ServicePillarObserver.php      # Auto-clear cache layanan
|   |   `-- GalleryObserver.php            # Auto-clear cache galeri
|   |
|   |-- Services/
|   |   `-- WhatsAppGeneratorService.php   # URL wa.me dinamis & pre-filled message
|   |
|   `-- Settings/
|       `-- CompanySettings.php            # Spatie Settings Class
|
|-- database/
|   |-- migrations/                        # Urutan migrasi basis data
|   `-- seeders/
|       |-- DatabaseSeeder.php
|       |-- HeroSlideSeeder.php            # 4 Slide Hero utama berstandar K3
|       |-- CompanySettingsSeeder.php      # Data kontak resmi & alamat Sidoarjo
|       |-- ServicePillarSeeder.php        # 2 Divisi: PJU & Mechanical Electrical
|       |-- ProductCatalogSeeder.php       # Katalog Produk PJU & Mechanical Electrical
|       |-- GallerySeeder.php              # 11 Dokumentasi Projek On Duty berstandar K3
|       `-- PostSeeder.php                 # Artikel teknis PJU, ME & Standar K3
|
|-- resources/
|   |-- css/
|   |   `-- app.css                        # Styling Tailwind CSS, Boxicons & Custom Utility
|   `-- views/
|       |-- components/
|       |   |-- product-card.blade.php     # Komponen kartu produk reusable
|       |   `-- layouts/
|       |       `-- app.blade.php          # Master Layout Publik + JSON-LD Schema
|       `-- livewire/
|           |-- pages/                     # Blade view untuk setiap halaman Livewire
|           `-- components/                # View untuk Navbar, Footer, FloatingWhatsApp
|
`-- routes/
    `-- web.php                            # Rute publik, /robots.txt, /sitemap.xml & decoy trap
```

---

## 4. Rancangan Routing & SEO Endpoints (`routes/web.php`)

* `GET /` -> `HomePage::class` (`home`)
* `GET /about` -> `AboutPage::class` (`about`)
* `GET /products` -> `ProductCatalogPage::class` (`products.index`)
* `GET /products/{slug}` -> `ProductDetailPage::class` (`products.show`)
* `GET /gallery` -> `GalleryPage::class` (`gallery.index`)
* `GET /blog` -> `BlogIndexPage::class` (`blog.index`)
* `GET /blog/{slug}` -> `BlogDetailPage::class` (`blog.show`)
* `GET /contact` -> `ContactPage::class` (`contact`)
* `GET /robots.txt` -> Dynamic RFC 9309 compliant `robots.txt` dengan URL `Sitemap` absolut
* `GET /sitemap.xml` -> Dynamic XML Sitemap + Google Image Sitemap (`xmlns:image`)
* `ANY /{decoyPath}/{subpath?}` -> Honeypot pemblokir akses `/admin`, `/login`, `/wp-admin`, dll. (`404 Not Found` + Security Log)
