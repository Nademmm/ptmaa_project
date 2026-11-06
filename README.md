# PT. Multi Abadi Aksana

Portal web korporat resmi dan etalase produk digital B2B / B2G (*Non-Ecommerce*) untuk **PT. Multi Abadi Aksana** (General Trading, Supplier & Contractor), berpusat di Sidoarjo, Jawa Timur.

Sistem ini dirancang khusus untuk memfasilitasi pengadaan barang dan jasa industri, mulai dari sistem Penerangan Jalan Umum (PJU Tenaga Surya & PLN), pekerjaan Mechanical & Electrical (ME), perbaikan dan fabrikasi Impeller presisi, konstruksi Interior & Exterior komersial, hingga penyediaan suku cadang dan pelumas alat berat.

---

## 📌 Identitas Korporat Perusahaan

* **Nama Perusahaan:** PT. Multi Abadi Aksana
* **Bidang Usaha:** General Trading, Supplier & Contractor (Pengadaan Barang dan Jasa)
* **Tagline Resmi:** *"Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan"*
* **Prinsip Operasional:** *Utamakan Keselamatan dan Kesehatan Kerja (K3) Terintegrasi*
* **Head Office:** Jl. Taman Surya Agung Blok B No. 11, Wage, Kec. Taman, Sidoarjo, Jawa Timur 61257
* **Workshop & Divisi Sparepart:** Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Sidoarjo
* **WhatsApp & Telepon Resmi:** +62 823-4297-9898
* **Email Resmi:** `ptmultiabadiaksana15@gmail.com`

---

## 🚀 Fitur Utama & Arsitektur Sistem

### 1. Pemisahan Katalog Mandiri (Divisi PJU & Divisi ME)
Untuk mengakomodasi karakteristik pengadaan yang berbeda antara infrastruktur jalan dan manufaktur industri, sistem memisahkan lini produk menjadi 2 divisi mandiri:
* **Gateway Selection Portal (`/products`):** Layar pembuka interaktif yang menyajikan kartu spesialisasi **Divisi PJU** dan **Divisi ME** sebelum calon klien masuk ke etalase teknis.
* **Katalog Divisi PJU (`/products?divisi=pju`):** Khusus menampilkan PJU Tenaga Surya (All In One, Two In One, Konvensional), Lampu PJU PLN (Philips, Osram, COB, Estika), serta Tiang Parabola dan Octagonal Hot Dip Galvanized.
* **Katalog Divisi ME (`/products?divisi=me`):** Khusus menampilkan Fabrikasi & Dynamic Balancing Impeller Stainless Steel, Sistem Blower Industri, Panel Utama (MDP/SDP), Trafo, Genset, serta 12 Lini Suku Cadang Mesin Pabrik.
* **Division Switcher Terpadu:** Kapsul navigasi di bagian atas katalog yang memudahkan perpindahan divisi kapan saja tanpa kehilangan konteks.

### 2. Showcase B2B Non-Transaksional (Non-Ecommerce)
* **Tanpa Harga Publik & Tanpa Checkout:** Menghindari sistem e-commerce standar konsumen retail; tidak ada keranjang belanja, ongkos kirim otomatis, maupun payment gateway.
* **Spesifikasi Parameter Teknis:** Menampilkan rincian teknis mendalam (*key-value parameter*), galeri foto multi-sudut pandang, keunggulan produk, dan standar pengujian K3.

### 3. Multi-Channel Click-to-WhatsApp Direct RFQ
* Tombol CTA otomatis mengarahkan calon klien ke nomor WhatsApp PIC divisi terkait (Admin Proyek & PJU vs Admin Sparepart & Pelumas) dengan pesan yang sudah terisi otomatis (*pre-filled text*) memuat nama unit produk dan tautan halaman.
* Mendukung alur kemitraan 4 tahap PT. Multi Abadi Aksana:
  $$\text{Komunikasi Awal} \longrightarrow \text{Survei Lapangan} \longrightarrow \text{Negosiasi RAB} \longrightarrow \text{Kesepakatan (Deal)}$$

### 4. Empat Pilar Bisnis Terintegrasi
1. **Penerangan Jalan Umum (PJU):** Pengadaan lampu surya mandiri, lampu jalan PLN, tiang galvanis, pondasi tiang, dan jasa instalasi keselamatan jalan.
2. **Interior & Exterior:** Pekerjaan tata ruang, partisi dinding WPC/PVC, lantai vinyl/SPC, custom furniture, dan fasad ACP komersial.
3. **Mechanical & Electrical (ME):** Fabrikasi & perbaikan impeller industri, blower ventilasi, perakitan panel listrik MDP/SDP, trafo, dan jaringan kabel daya.
4. **Sparepart & Equipment:** Pasokan 12 lini suku cadang mesin, oli dan grease pelumas armada, ban alat berat, aki, filter, wiper, dan bearing industri.

### 5. Dokumentasi Projek On Duty (Portofolio Lapangan)
* Dokumentasi pelaksanaan proyek nyata tim PT. MAA di Jawa Timur (PJU Ruas Gempol-Sidoarjo, Interior Adelle Jewellery, Fabrikasi Rotor Impeller).
* Dilengkapi modal Lightbox interaktif dan tombol konsultasi proyek serupa.

### 6. Wawasan & Artikel Edukatif (Technical Blog)
* Publikasi artikel wawasan teknik seputar efisiensi energi solar cell, komparasi armature lampu jalan, dynamic balancing impeller, dan manajemen keselamatan kerja.

### 7. Backoffice CMS Lengkap (Filament PHP v3)
* Manajemen Produk, Kategori, 4 Pilar Layanan, Portofolio Galeri, Artikel Blog, Formulir Penawaran Masuk (Mini CRM), dan Pengaturan Identitas Perusahaan melalui panel admin `/admin`.

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
