# PT. Multi Abadi Aksana - Web Portal & Digital Product Showcase

Portal web korporat resmi dan etalase produk digital B2B / B2G (*Non-Ecommerce*) untuk **PT. Multi Abadi Aksana** (General Trading, Supplier & Contractor) yang berpusat di Kabupaten Sidoarjo, Jawa Timur.

Sistem ini dibangun menggunakan arsitektur modern **TALL Stack (Tailwind CSS, Alpine.js, Laravel 11, Livewire v3)** dan **Filament PHP v3** untuk memfasilitasi pengadaan barang dan jasa industri pada 2 fokus divisi bisnis utama perusahaan: **Penerangan Jalan Umum** (Solar Cell & PLN, Tiang Galvanis, dan Konstruksi Sipil) serta **Mechanical & Electrical** (Fabrikasi & Perbaikan Impeller Presisi, Sistem Blower, Panel Distribusi MDP/SDP/ATS, Transformator, Genset, dan Instalasi Kelistrikan Industri).

---

## 📌 Identitas Korporat Perusahaan

* **Nama Perusahaan:** PT. Multi Abadi Aksana
* **Bidang Usaha:** General Trading, Supplier & Contractor (Pengadaan Barang dan Jasa)
* **Tagline Resmi:** *"Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan"*
* **Prinsip Operasional:** *Utamakan Keselamatan dan Kesehatan Kerja (K3) Terintegrasi*
* **Head Office:** Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257
* **Workshop & Operasional Teknis:** Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Kabupaten Sidoarjo, Jawa Timur
* **WhatsApp & Telepon Resmi:** +62 823-4297-9898
* **Email Resmi:** `ptmultiabadiaksana15@gmail.com`
* **Instagram Resmi:** [@pt.multiabadiaksana](https://www.instagram.com/pt.multiabadiaksana)

---

## 🚀 Fitur Utama Web Publik (Front-Office)

### 1. Floating Navbar Responsif & Modern
* **Desain Glassmorphism:** Efek latar belakang blur (`backdrop-blur-md bg-white/95`) dengan border halus dan bayangan elegan (*soft elevation*) saat digulir.
* **Proporsional di Semua Perangkat:**
  * **Desktop:** Lebar maksimal terpusat `max-w-7xl` (1280px) dengan proporsi rapi sejajar dengan konten hero.
  * **Mobile:** Lebar dinamis responsif `calc(100% - 2.5rem)` dengan *safe-area margin* yang pas di layar HP.
* **Dropdown Menu Produk Interaktif:**
  * **Desktop:** Hover dropdown yang menampilkan pilihan **Penerangan Jalan Umum** dan **Mechanical & Electrical**.
  * **Mobile:** Menu accordion lipat (*expand/collapse*) yang rapi tanpa memotong ruang navigasi.
* **Branding Bersih:** Menggunakan logo resmi dan teks korporat **PT. MULTI ABADI AKSANA** tanpa subjudul panjang agar proporsional di seluruh resolusi layar.

### 2. Dynamic Hero Slider Beranda (CRUD via Admin Panel)
* **Kontrol Penuh dari Admin:** Headline judul, deskripsi/subjudul, foto latar belakang, dan urutan slide dapat diubah kapan saja secara dinamis dari Backoffice Admin (`/portal-internal-maa-9x7k2v/hero-slides`).
* **Format Teks Elegan (Text-Only):** Tampilan slide bersih tanpa tombol CTA yang mengganggu fokus visual foto proyek lapangan.
* **Interaktivitas & Gesture:** Mendukung navigasi tombol panah, indikator titik (*dot pagination*), transisi otomatis halus (*auto-play*), serta *touch swipe gesture* pada layar smartphone.
* **Standardisasi Istilah & K3:** Menggunakan terminologi resmi industri **"Pendirian Tiang"** (*pole erection & civil foundation*) dengan dokumentasi personel bersertifikat APD K3 lengkap.

### 3. Pemisahan Katalog Mandiri (2 Divisi Fokus Bisnis)
Katalog produk memisahkan 2 lini bisnis secara tegas guna mempermudah spesifikasi pengadaan:
* **Katalog Penerangan Jalan Umum (`/products?divisi=pju`):** Menampilkan PJU Tenaga Surya (All In One, Two In One, Konvensional), Lampu PJU PLN (Philips, Osram, COB, Estika), serta Tiang Parabola dan Octagonal Hot Dip Galvanized.
* **Katalog Mechanical & Electrical (`/products?divisi=me`):** Menampilkan Fabrikasi & Dynamic Balancing Impeller Stainless Steel, Sistem Blower Industri (PGIC-E34), Panel Utama (MDP/SDP/ATS), Transformator, Genset, serta Jaringan Distribusi Kabel Daya.

### 4. Showcase B2B Non-Transaksional (Non-Ecommerce)
* **Tanpa Harga Publik & Tanpa Checkout:** Menghindari sistem ritel e-commerce biasa; tidak ada keranjang belanja, ongkir otomatis, maupun payment gateway.
* **Spesifikasi Parameter Teknis Mendalam:** Setiap halaman produk memuat rincian parameter teknis (*key-value*), foto multi-sudut pandang, keunggulan implementasi, dan standar pengujian K3.

### 5. Direct Click-to-WhatsApp RFQ & Alur Kemitraan
* Tombol CTA otomatis menghubungkan calon klien ke nomor WhatsApp resmi PT. Multi Abadi Aksana (`+62 823-4297-9898`) dengan pesan yang terisi otomatis (*pre-filled text*) memuat nama produk yang diminati.
* Mendukung alur kemitraan 4 tahap resmi:
  $$\text{Komunikasi Awal} \longrightarrow \text{Survei Lapangan} \longrightarrow \text{Negosiasi RAB} \longrightarrow \text{Kesepakatan (Deal)}$$

### 6. Dokumentasi Projek On Duty (Portofolio Lapangan Berstandar K3)
* Dokumentasi pelaksanaan proyek nyata tim PT. Multi Abadi Aksana di Jawa Timur (PJU Ruas Gempol-Sidoarjo, Pendirian Tiang dengan Mobil Crane, Fabrikasi Rotor Impeller Stainless Steel, dan Overhaul Blower Industri PGIC-E34) dengan kepatuhan APD K3 lengkap (helm keselamatan, sarung tangan, lengan panjang, dan rompi reflektif).
* Dilengkapi modal Lightbox resolusi tinggi (`x-teleport="body"`) dan filter kategori divisi.

### 7. Wawasan & Artikel Edukatif (Technical Blog)
* Publikasi artikel edukasi teknik seputar efisiensi energi solar cell, komparasi armature lampu jalan, fabrikasi impeller, dan disiplin standar K3 konstruksi industri.

### 8. SEO Teknis & Performa Maksimal (Lighthouse 100 Ready)
* **Dynamic `robots.txt` & XML Sitemap (`/sitemap.xml`):** Mendukung Image Sitemap otomatis untuk seluruh halaman statis, produk, dan artikel teknis dengan invalidasi cache otomatis.
* **Structured Data (JSON-LD `@graph`):** Skema `Organization`, `GeneralContractor`, `WebSite`, `Product`, `TechArticle`, dan `BreadcrumbList`.
* **Meta & OpenGraph Lengkap:** Canonical URL, Hreflang `id-ID`, Geo-Tagging Sidoarjo, OpenGraph, dan Twitter Card.

---

## 🛡️ Arsitektur Keamanan & Panel Administrator (Backoffice CMS)

Panel administrasi dibangun menggunakan **Filament PHP v3** dengan lapisan pengamanan (*defense-in-depth*) tingkat tinggi:

### 1. Obscured Secret Admin Path (URL Rahasia)
* **URL Standar Diblokir:** Akses ke jalur standar `/admin`, `/login`, `/wp-admin`, `/panel`, dan `/administrator` otomatis mengembalikan **`404 Not Found`** dan mencatat alamat IP pengakses ke log keamanan (`storage/logs/laravel.log`).
* **URL Akses Rahasia:**
  * **Akses Laptop (Localhost):** `http://127.0.0.1:8000/portal-internal-maa-9x7k2v`
  * **Akses HP (Jaringan Wi-Fi Sama):** `http://[IP_LAPTOP]:8000/portal-internal-maa-9x7k2v`
  * Jalur ini dikonfigurasi melalui variabel environment `ADMIN_PANEL_PATH` di berkas `.env` dan `config/app.php` sehingga dapat diganti sewaktu-waktu.

### 2. Otentikasi Khusus (`SecureLogin`) & Proteksi Form Publik
* **Anti Brute-Force Rate Limiting:** Login admin dibatasi maksimal **3 kali percobaan gagal dalam 5 menit** per alamat IP. Form konsultasi publik juga dilindungi rate-limiter anti-spam dan *honeypot trap*.
* **Honeypot Anti-Bot Decoy Trap:** Form otorisasi dilengkapi perangkap tersembunyi (`website_security_trap`). Robot scanner otomatis yang mengisi field ini akan langsung digagalkan dan IP-nya dicatat sebagai ancaman.
* **Pemberitahuan Kredensial Umum:** Menolak kredensial yang salah dengan pesan netral guna mencegah *user enumeration*.

### 3. HTTP Security Headers Khusus Admin (`AdminSecurityHeaders`)
Setiap respon dari Portal Admin disuntikkan header keamanan ketat:
* `X-Robots-Tag: noindex, nofollow, noarchive, nosnippet` (mencegah Google dan mesin pencari mengindeks halaman login rahasia).
* `Referrer-Policy: no-referrer` (mencegah URL rahasia bocor melalui *Referer header* saat admin mengklik tautan keluar).
* `X-Frame-Options: DENY` (mencegah serangan *Clickjacking* / embedding iframe).
* `X-Content-Type-Options: nosniff` (mencegah sniffing tipe MIME).
* `Cache-Control: no-store, no-cache, must-revalidate` (mencegah data sensitif tersimpan di cache browser dan memblokir tombol Back setelah logout).

### 4. Manajemen Akun Administrator (1 Utama + 2 Cadangan)
Akun bawaan lama (`admin@ptmaa.co.id` / `password`) telah dihapus secara permanen. Sistem kini memiliki 3 akun resmi dengan hash password Bcrypt 12 rounds:

| No | Peran Akun | Nama Administrator | Email Login | Level Otorisasi |
| :---: | :--- | :--- | :--- | :--- |
| **1** | **Admin Utama** | Admin Utama PT. Multi Abadi Aksana | `admin.utama@ptmaa.co.id` | Super Administrator (Full Access) |
| **2** | **Admin Cadangan 1** | Admin Cadangan 1 - Operasional | `admin.cadangan1@ptmaa.co.id` | Administrator Operasional |
| **3** | **Admin Cadangan 2** | Admin Cadangan 2 - Direksi & Darurat | `admin.cadangan2@ptmaa.co.id` | Emergency Disaster Recovery |

> 🔒 **Penyimpanan Kredensial:** Data kata sandi lengkap tersimpan aman pada dokumen Google Sheets resmi perusahaan di Google Drive folder `Project - PT MAA`:  
> [Buka Google Sheets Kredensial Admin](https://docs.google.com/spreadsheets/d/1mR4yEyN8tDeJ2lQSRF8SkfTWXrndSK__AQMtR52_uVg/edit?usp=drivesdk)

### 5. Kebijakan Password Kuat & Proteksi Hapus
* Validasi password baru di `UserResource` mewajibkan minimal 12 karakter (kombinasi huruf besar, huruf kecil, angka, dan simbol).
* Tombol hapus akun otomatis disembunyikan untuk akun yang sedang aktif digunakan dan ketika jumlah admin tersisa 1 akun.
* Sesi login disimpan terenkripsi (`SESSION_ENCRYPT=true`) dengan batas waktu inaktivitas 60 menit.

---

## 🛠️ Tech Stack & Dependensi

* **Framework Backend:** Laravel 11.x (PHP 8.2 / 8.3+)
* **Full-Stack UI Component:** Livewire v3
* **Reactivity & Micro-Interactions:** Alpine.js v3
* **CSS & Design Engine:** Tailwind CSS v3
* **Backoffice Admin CMS:** Filament PHP v3
* **Database:** SQLite (Default / Pengembangan) / MySQL 8.0+ / MariaDB (Produksi)
* **Assets Bundler:** Vite 5

---

## ⚙️ Panduan Menjalankan Proyek (Local Development)

### 1. Prasyarat Sistem
* PHP >= 8.2 / 8.3 dengan ekstensi aktif: `pdo_sqlite`, `sqlite3`, `curl`, `fileinfo`, `gd`, `intl`, `mbstring`, `zip`, `openssl`, `exif`.
* Composer >= 2.x
* Node.js >= 18.x & NPM

### 2. Instalasi Dependensi
```bash
# Masuk ke direktori proyek
cd ptmaa_project

# Pasang dependensi PHP
composer install

# Pasang dependensi Node.js
npm install
```

### 3. Konfigurasi Lingkungan (.env)
Salin berkas konfigurasi default dan generate application key:
```bash
cp .env.example .env
php artisan key:generate
```

Pastikan variabel penting pada `.env`:
```env
APP_NAME="PT. Multi Abadi Aksana"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

ADMIN_PANEL_PATH=portal-internal-maa-9x7k2v
SESSION_DRIVER=file
SESSION_LIFETIME=60
SESSION_ENCRYPT=true
```

### 4. Migrasi & Seeding Database
Jalankan migrasi skema tabel beserta seluruh master data:
```bash
# Buat database SQLite jika belum ada
touch database/database.sqlite

# Eksekusi migrasi dan pasang seluruh data master
php artisan migrate:fresh --seed
```

### 5. Kompilasi Aset Frontend
```bash
# Untuk build produksi:
npm run build

# Atau untuk pengembangan aktif (Hot Module Replacement):
npm run dev
```

### 6. Menjalankan Server Lokal

#### A. Khusus Laptop (Localhost Saja)
```bash
php artisan serve
```
Akses web: `http://127.0.0.1:8000`

#### B. Akses Bersama dari Laptop & Smartphone (Satu Jaringan Wi-Fi)
Jalankan skrip siap pakai (otomatis mendeteksi IPv4 Laptop Anda):
```cmd
serve-hp.bat
```
Atau melalui perintah terminal:
```bash
php artisan serve --host=0.0.0.0 --port=8000
```
Buka browser:
* **Di Laptop:** `http://127.0.0.1:8000`
* **Di HP:** `http://[IP_LAPTOP]:8000`
* **Panel Admin di HP:** `http://[IP_LAPTOP]:8000/portal-internal-maa-9x7k2v`

---

## 📂 Struktur Direktori Proyek

```text
ptmaa_project/
├── app/
│   ├── Enums/                          # Enum status ketersediaan, tipe cakupan & pipeline inquiry
│   ├── Filament/
│   │   ├── Pages/                      # Halaman khusus Filament (ManageCompanySettings, Auth\SecureLogin)
│   │   ├── Resources/                  # Resource CMS (HeroSlide, Product, Gallery, Post, User, dll)
│   │   └── Widgets/                    # Dashboard widgets (StatsOverview, LatestInquiries)
│   ├── Http/Middleware/                # Middleware keamanan kustom (AdminSecurityHeaders)
│   ├── Livewire/
│   │   ├── Components/                 # Komponen Livewire (Navbar, Footer, FloatingWhatsApp)
│   │   └── Pages/                      # Halaman Livewire (HomePage, ProductCatalogPage, dll)
│   ├── Models/                         # Eloquent Models (HeroSlide, Product, ServicePillar, dll)
│   ├── Observers/                      # Auto-cache invalidation & slug generation
│   ├── Providers/                      # Service Providers (AppServiceProvider, Filament\AdminPanelProvider)
│   ├── Services/                       # Business Logic (WhatsAppGeneratorService)
│   └── Settings/                       # Spatie Settings (CompanySettings)
├── database/
│   ├── migrations/                     # Skema tabel database (termasuk hero_slides & settings)
│   └── seeders/                        # Master data seeder (HeroSlide, Product, User, Settings)
├── docs/                               # Dokumentasi lengkap sistem (PRD, Arsitektur, Readme)
├── public/
│   ├── assets/                         # Logo resmi korporat & self-hosted Boxicons font
│   ├── build/                          # Aset terkompilasi Vite (CSS & JS)
│   └── images/                         # Foto proyek autentik K3 & katalog produk (.webp)
├── resources/
│   ├── css/app.css                     # Tailwind CSS, custom utilities, & style responsive
│   └── views/                          # Blade templates & komponen reusable (product-card)
├── routes/
│   └── web.php                         # Rute publik, dynamic robots.txt, sitemap.xml & decoy trap
├── tests/                              # Automated Feature & Unit Tests
├── deploy-vps.sh                       # Skrip auto-deploy VPS Ubuntu 24.04 + Nginx + Gzip
├── serve-hp.bat                        # Skrip satu-klik server lokal untuk akses HP & Laptop
└── tailwind.config.js                  # Konfigurasi palet warna resmi korporat
```

---

## 📄 Lisensi & Hak Cipta

Seluruh kode sumber, desain antarmuka, aset visual, dan dokumentasi ini merupakan hak milik resmi:  
**PT. Multi Abadi Aksana** - *General Trading, Supplier & Contractor*.  
Seluruh hak cipta dilindungi undang-undang.
