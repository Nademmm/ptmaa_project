# PT. Multi Abadi Aksana

Portal web korporat resmi dan etalase produk digital B2B / B2G (*Non-Ecommerce*) untuk **PT. Multi Abadi Aksana** (General Trading, Supplier & Contractor), berpusat di Sidoarjo, Jawa Timur.

Sistem ini dirancang khusus untuk memfasilitasi pengadaan barang dan jasa industri pada 2 fokus bisnis utama perusahaan: **Penerangan Jalan Umum** (Solar Cell & PLN, Tiang Galvanis, dan Konstruksi Sipil) serta **Mechanical & Electrical** (Fabrikasi & Perbaikan Impeller Presisi, Sistem Blower, Panel Distribusi MDP/SDP/ATS, Instalasi Kelistrikan, hingga Komponen Mekanikal).

---

## 📌 Identitas Korporat Perusahaan

* **Nama Perusahaan:** PT. Multi Abadi Aksana
* **Bidang Usaha:** General Trading, Supplier & Contractor (Pengadaan Barang dan Jasa)
* **Tagline Resmi:** *"Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan"*
* **Prinsip Operasional:** *Utamakan Keselamatan dan Kesehatan Kerja (K3) Terintegrasi*
* **Head Office:** Jl. Taman Surya Agung Blok B No. 11, Wage, Kec. Taman, Sidoarjo, Jawa Timur 61257
* **Workshop & Operasional Teknis:** Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Sidoarjo
* **WhatsApp & Telepon Resmi:** +62 823-4297-9898
* **Email Resmi:** `ptmultiabadiaksana15@gmail.com`
* **Instagram Resmi:** [@pt.multiabadiaksana](https://www.instagram.com/pt.multiabadiaksana?utm_source=ig_web_button_share_sheet&psln=ZDNlZDc0MzIxNw==)

---

## 🚀 Fitur Utama & Arsitektur Sistem

### 1. Pemisahan Katalog Mandiri (Penerangan Jalan Umum & Mechanical & Electrical)
Untuk mengakomodasi karakteristik pengadaan yang berbeda antara infrastruktur jalan dan rekayasa industri, sistem memisahkan lini produk menjadi 2 divisi mandiri yang diakses langsung dari menu dropdown **Produk** pada Navbar:
* **Katalog Penerangan Jalan Umum (`/products?divisi=pju`):** Khusus menampilkan Penerangan Jalan Umum Tenaga Surya (All In One, Two In One, Konvensional), Lampu PJU PLN (Philips, Osram, COB, Estika), serta Tiang Parabola dan Octagonal Hot Dip Galvanized.
* **Katalog Mechanical & Electrical (`/products?divisi=me`):** Khusus menampilkan Fabrikasi & Dynamic Balancing Impeller Stainless Steel, Sistem Blower Industri, Panel Utama (MDP/SDP/ATS), Trafo, Genset, serta Komponen & Suku Cadang Mekanikal.

### 2. Showcase B2B Non-Transaksional (Non-Ecommerce)
* **Tanpa Harga Publik & Tanpa Checkout:** Menghindari sistem e-commerce standar konsumen retail; tidak ada keranjang belanja, ongkos kirim otomatis, maupun payment gateway.
* **Spesifikasi Parameter Teknis:** Menampilkan rincian teknis mendalam (*key-value parameter*), galeri foto multi-sudut pandang, keunggulan produk, dan standar pengujian K3.

### 3. Direct Click-to-WhatsApp RFQ
* Tombol CTA otomatis mengarahkan calon klien ke nomor WhatsApp resmi PT. Multi Abadi Aksana (`+62 823-4297-9898`) dengan pesan yang sudah terisi otomatis (*pre-filled text*) memuat nama unit produk dan tautan halaman.
* Mendukung alur kemitraan 4 tahap PT. Multi Abadi Aksana:
  $$\text{Komunikasi Awal} \longrightarrow \text{Survei Lapangan} \longrightarrow \text{Negosiasi RAB} \longrightarrow \text{Kesepakatan (Deal)}$$

### 4. Dua Fokus Bisnis Utama (Pengadaan Barang & Jasa)
1. **Penerangan Jalan Umum:** Pengadaan unit lampu jalan tenaga surya mandiri (All In One, Two In One, Konvensional), lampu jalan PLN, tiang galvanis, pengecoran pondasi sipil, dan jasa pendirian tiang berstandar K3.
2. **Mechanical & Electrical:** Fabrikasi & perbaikan Impeller industri, sistem blower ventilasi, perakitan panel listrik MDP/SDP/ATS, instalasi jaringan kabel daya, serta penyediaan komponen mekanikal dan pelumas armada/mesin pabrik.

### 5. Dokumentasi Projek On Duty (Portofolio Lapangan)
* Dokumentasi pelaksanaan proyek nyata tim PT. Multi Abadi Aksana di Jawa Timur (Penerangan Jalan Umum Ruas Gempol-Sidoarjo, Fabrikasi Rotor Impeller Stainless Steel, dan Overhaul Blower Industri).
* Dilengkapi modal Lightbox interaktif dan filter divisi (**Penerangan Jalan Umum** & **Mechanical & Electrical**).

### 6. Wawasan & Artikel Edukatif (Technical Blog)
* Publikasi artikel wawasan teknik seputar efisiensi energi solar cell, komparasi armature lampu jalan, dynamic balancing impeller, dan manajemen keselamatan kerja.

### 7. Backoffice CMS Lengkap (Filament PHP v3)
* Manajemen Produk, Kategori, Divisi Layanan, Portofolio Galeri, Artikel Blog, Formulir Penawaran Masuk (Mini CRM), dan Pengaturan Identitas Perusahaan melalui panel admin `/admin`.
* **Catatan Regulasi Konten:** Seluruh berkas/fitur unduh maupun unggah Company Profile berbentuk file PDF ditiadakan dari sistem (baik pada portal publik maupun panel admin). Identitas, portofolio, dan spesifikasi perusahaan disajikan langsung secara digital melalui antarmuka web.

---

## 🛠️ Tech Stack

* **Framework Backend:** Laravel 11.x (PHP 8.2+)
* **Full-Stack UI Component:** Livewire v3
* **Reactivity & Micro-Interactions:** Alpine.js
* **CSS & Design Engine:** Tailwind CSS v3
* **Backoffice Admin CMS:** Filament PHP v3
* **Database:** SQLite (Default / Pengembangan) / MySQL 8.0+ / MariaDB (Produksi)
* **Assets Bundler:** Vite 5

---

## ⚙️ Panduan Menjalankan Proyek (Local Development)

### 1. Prasyarat Sistem
* PHP >= 8.2 dengan ekstensi aktif: `pdo_sqlite` (atau `pdo_mysql`), `curl`, `fileinfo`, `gd`, `intl`, `mbstring`, `zip`.
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

Secara default, aplikasi menggunakan database SQLite lokal:
```env
DB_CONNECTION=sqlite
# DB_DATABASE otomatis mengarah ke database/database.sqlite
```

### 4. Migrasi & Seeding Data Awal
Jalankan migrasi skema tabel beserta data seeder master autentik:
```bash
# Buat berkas database SQLite jika belum ada
touch database/database.sqlite

# Eksekusi migrasi dan pasang seluruh data seeder
php artisan migrate:fresh --seed
```

### 5. Kompilasi Aset Frontend
```bash
# Untuk keperluan build produksi:
npm run build

# Atau untuk pengembangan aktif (Hot Module Replacement):
npm run dev
```

### 6. Menjalankan Server Lokal
```bash
php artisan serve
```
Aplikasi web publik dapat diakses melalui browser di: `http://127.0.0.1:8000`

---

## 🔐 Akses Backoffice CMS (Filament v3)

Panel administrasi CMS dapat diakses pada URL: `http://127.0.0.1:8000/admin`

* **Email:** `admin@ptmaa.co.id`
* **Password:** `password`

---

## 📂 Struktur Direktori Utama

```text
ptmaa_project/
├── app/
│   ├── Enums/                     # Enum status ketersediaan produk & jenis lingkup layanan
│   ├── Filament/Resources/        # Sumber daya manajemen CMS Filament v3 (Product, Gallery, Post, dll)
│   ├── Livewire/
│   │   ├── Components/            # Komponen reaktif (Navbar, Footer, ProductCard, FloatingWhatsApp)
│   │   └── Pages/                 # Halaman utama (HomePage, ProductCatalogPage, ProductDetailPage, dll)
│   ├── Models/                    # Eloquent Models (Product, ProductCategory, ServicePillar, Gallery, Post)
│   └── Services/                  # Business Logic (WhatsAppGeneratorService)
├── database/
│   ├── migrations/                # Skema database terstruktur
│   └── seeders/                   # Data awal master produk, pilar layanan, galeri, dan artikel
├── docs/                          # Dokumentasi PRD & Arsitektur Sistem Terperinci
├── public/
│   ├── assets/                    # Logo resmi PT. Multi Abadi Aksana
│   └── images/                    # Galeri foto proyek asli (PJU Gempol, Adelle Jewellery, Impeller)
├── resources/
│   ├── css/app.css                # Konfigurasi Tailwind, font Inter, dan utility glassmorphism
│   └── views/                     # Blade templates & komponen Livewire
├── routes/
│   └── web.php                    # Deklarasi rute publik aplikasi
└── tailwind.config.js             # Skema warna korporat (Navy, Periwinkle, dsb)
```

---

## 📄 Lisensi & Hak Cipta

Seluruh konten, logo, data produk, dan dokumentasi proyek merupakan hak milik resmi:  
**PT. Multi Abadi Aksana** — *General Trading, Supplier & Contractor*. Seluruh hak cipta dilindungi undang-undang.
