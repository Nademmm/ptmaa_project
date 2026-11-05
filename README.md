# PT. Multi Abadi Aksana — Corporate Web Portal & Digital Product Showcase

Portal web korporat dan etalase produk digital B2B / B2G (*Non-Ecommerce*) untuk **PT. Multi Abadi Aksana** (General Trading, Supplier & Contractor), Sidoarjo, Jawa Timur.

Referensi struktur dan alur konversi diadaptasi dari **`cvniscahya.com`**.

---

## 🚀 Fitur Utama & Prinsip Sistem

1. **Non-Ecommerce & Non-Transactional:**
   * Tidak menampilkan harga produk.
   * Tidak ada keranjang belanja (*shopping cart*), perhitungan ongkos kirim, maupun payment gateway.
2. **Katalog Spesifikasi Teknis Dinamis:**
   * Menampilkan etalase produk dengan rincian spesifikasi teknis (*key-value*), foto galeri sudut pandang, alasan memilih produk (*"Mengapa Harus Produk Ini?"*), dan daftar poin keunggulan.
3. **Direct Click-to-WhatsApp Conversion:**
   * Tombol CTA otomatis mengarahkan calon klien ke nomor WhatsApp PIC divisi terkait (PJU/Utama vs Divisi Sparepart) dengan pesan otomatis (*pre-filled text*) berisi nama produk dan tautan web.
   * Mendukung alur bisnis PT. MAA: **Komunikasi $\rightarrow$ Survei $\rightarrow$ Negosiasi $\rightarrow$ Deal**.
4. **4 Pilar Layanan Terintegrasi:**
   * **Pilar 1: Penerangan Jalan Umum (PJU):** Solar Cell (All in One, Two in One, Split System), PJU PLN (Philips, Osram, COB, Estika), Tiang Galvanis Octagonal/Parabola/High Mast, & Jasa Sipil/Instalasi K3.
   * **Pilar 2: Interior & Exterior:** Wall Panel WPC/PVC, Flooring SPC/Vinyl, Custom Furniture, Fasad ACP/Kaca, & Desain 3D.
   * **Pilar 3: Mechanical & Electrical (ME):** Panel MDP/SDP, Genset, Trafo, Kabel XLPE, serta fabrikasi & balancing **Industrial Impeller**.
   * **Pilar 4: Sparepart & Equipment:** 13 lini suku cadang dan pelumas alat berat & armada industri (Oli, Grease, Ban Luar/Dalam, Aki, Filter, Bearing, Kopling).
5. **Backoffice CMS Lengkap (Filament PHP v3):**
   * Manajemen Produk, Kategori, 4 Pilar Layanan, Galeri "Projek On Duty", Blog Berita, Formulir Permintaan Survei (CRM Ringkas), dan Pengaturan Perusahaan via Spatie Settings.

---

## 🛠️ Tech Stack

* **Backend:** Laravel 11.x, PHP 8.2+
* **Frontend:** Livewire v3 (dengan `wire:navigate` untuk navigasi SPA cepat), Alpine.js, Tailwind CSS v3
* **CMS Panel:** Filament PHP v3 (`/admin`)
* **Database:** SQLite (Lokal) / MySQL 8.0+ / MariaDB (Produksi)
* **Assets Bundler:** Vite 5

---

## ⚙️ Panduan Menjalankan Proyek (Local Development)

### 1. Prasyarat Sistem
* PHP >= 8.2 (Ekstensi aktif: `pdo_sqlite` atau `pdo_mysql`, `curl`, `fileinfo`, `gd`, `intl`, `mbstring`, `zip`)
* Composer >= 2.x
* Node.js >= 18.x & NPM

### 2. Instalasi Dependensi
```bash
# Install PHP dependencies
composer install

# Install Node dependencies & build frontend assets
npm install
npm run build
```

### 3. Konfigurasi Environment & Database
```bash
# Salin konfigurasi environment
cp .env.example .env

# Generate Application Key
php artisan key:generate

# Jalankan migrasi database beserta Master Data Seeder resmi
php artisan migrate --seed
```

### 4. Menjalankan Server Lokal
```bash
# Jalankan development server
php artisan serve
```
Buka browser pada: **`http://127.0.0.1:8000`**

---

## 🔐 Akun Akses Admin Panel (Filament CMS)

Setelah seeder dijalankan, panel admin dapat diakses melalui:
* **URL:** `http://127.0.0.1:8000/admin`
* **Email:** `admin@multiabadiaksana.com`
* **Password:** `admin123`

---

## 📁 Struktur Direktori Utama

```text
├── app/
│   ├── Enums/                 # Pipeline status, service scope type, product availability
│   ├── Filament/              # Panel admin resources, pages, dan widgets
│   ├── Livewire/              # Full-page components & reusable UI components
│   ├── Models/                # Eloquent models & relasi database
│   ├── Observers/             # Auto-slug generation & cache invalidation
│   ├── Services/              # WhatsApp generator & SEO helpers
│   └── Settings/              # Spatie CompanySettings class
├── database/
│   ├── migrations/            # Skema tabel database
│   └── seeders/               # Master data seeder (Pilar, Produk, Galeri, Kontak)
├── docs/                      # Dokumentasi PRD & Arsitektur Blueprint
├── resources/
│   ├── css/ & js/             # Asset Tailwind CSS & Alpine.js
│   └── views/                 # Blade views kerangka aplikasi
└── routes/
    └── web.php                # 20 rute publik & admin
```

