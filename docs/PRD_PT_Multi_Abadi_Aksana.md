# PRODUCT REQUIREMENTS DOCUMENT (PRD)

**Nama Proyek:** Corporate Web Portal & Digital Product Showcase (B2B/B2G Non-Ecommerce)  
**Klien:** PT. Multi Abadi Aksana (General Trading, Supplier & Contractor)  
**Spesialisasi:** Infrastruktur Penerangan Jalan Umum (PJU Tenaga Surya & PLN) serta Rekayasa Mechanical & Electrical (ME) Industri  
**Tech Stack Utama:** TALL Stack (Tailwind CSS, Alpine.js, Laravel 11, Livewire v3) + Filament PHP v3  
**Target Deployment:** Linux VPS (Ubuntu 24.04 LTS, Nginx, SQLite/MySQL)  

---

## 1. Executive Summary & Konsep Utama

### 1.1 Latar Belakang Perusahaan
**PT. Multi Abadi Aksana (MAA)** adalah perusahaan penyedia barang dan jasa (*General Trading, Supplier, & Contractor*) yang berpusat di Kabupaten Sidoarjo, Jawa Timur. Perusahaan berkomitmen menyajikan solusi terintegrasi, aman (mengutamakan K3: *Keselamatan dan Kesehatan Kerja*), dan berkualitas tinggi untuk sektor publik (pemerintahan/dinas) maupun swasta/industri.

### 1.2 Tujuan & Konsep Website
Website PT. Multi Abadi Aksana dirancang sebagai **Corporate Profile & Digital Product Showcase (Non-Ecommerce)**:
1. **Bukan Website Jual-Beli Online (Non-Transactional):** Website **tidak** menampilkan harga produk retail, keranjang belanja (*shopping cart*), perhitungan ongkos kirim otomatis, maupun *payment gateway*.
2. **Pemisahan 2 Divisi Bisnis Utama (Divisi PJU & Divisi ME):** Katalog produk dipisahkan secara tegas menjadi **Divisi Penerangan Jalan Umum (`pju`)** dan **Divisi Mechanical & Electrical (`me`)**.
3. **Katalog Informasi & Spesifikasi Teknis Mendalam:** Halaman produk berfungsi murni sebagai etalase teknis digital yang menampilkan foto produk berstandar K3, parameter spesifikasi teknis (*key-value*), foto galeri multi-sudut, alasan memilih produk (*"Keunggulan Implementasi"*), serta poin keunggulan unit.
4. **Konversi Langsung ke WhatsApp (Direct Click-to-WhatsApp):** Setiap halaman detail produk mengarahkan calon klien langsung ke **WhatsApp Resmi PT. Multi Abadi Aksana (`+62 823-4297-9898`)** dengan pesan otomatis (*pre-filled text*) untuk memulai alur kemitraan resmi: **Komunikasi -> Survei -> Negosiasi -> Deal**.

---

## 2. Identitas Korporat & Data Master Perusahaan

* **Nama Resmi:** PT. Multi Abadi Aksana
* **Bidang Usaha:** Pengadaan Barang dan Jasa (*General Trading, Supplier & Contractor*)
* **Tagline Resmi:** *"Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan"*
* **Prinsip Operasional:** *Utamakan Keselamatan dan Kesehatan Kerja (K3) Terintegrasi*
* **Visi:**
  Menjadi perusahaan penyedia barang dan jasa (*general contractor & supplier*) yang terpercaya, profesional, berintegritas tinggi, dan berdaya saing tinggi di Indonesia, serta menjadi mitra strategis unggulan dalam penyediaan solusi infrastruktur Penerangan Jalan Umum dan Mechanical & Electrical yang berkelanjutan.
* **Misi:**
  1. Menyediakan produk Penerangan Jalan Umum (Solar Cell & PLN), fabrikasi Impeller presisi, serta instalasi sistem Mechanical & Electrical dengan standar mutu terbaik, aman, dan tepat spesifikasi.
  2. Memberikan kepercayaan penuh kepada konsumen baik dalam kualitas maupun pelayanan.
  3. Berperan aktif dengan pemerintahan maupun swasta dalam mengembangkan usaha untuk membangun negara.
  4. Mewujudkan sistem manajemen perusahaan yang menjunjung tinggi etika bisnis dan sosial.
* **3 Nilai Keunggulan (Why You Should Choose Us):**
  1. **Kualitas Terjamin:** Produk dan material berstandar industri sesuai spesifikasi teknis dan regulasi keselamatan kerja.
  2. **Tenaga Ahli Berpengalaman:** Didukung oleh tim lapangan bersertifikasi dan jaringan pemasok resmi terpercaya.
  3. **Tepat Waktu & Efisien:** Komitmen penuh terhadap jadwal pelaksanaan proyek, pengadaan transparan, dan efisiensi anggaran klien.
* **Alur Kemitraan (The Process):**
  `01. KOMUNIKASI` -> `02. SURVEI` -> `03. NEGOSIASI` -> `04. DEAL`
* **Informasi Kontak & Lokasi Resmi:**
  * **Email Resmi:** `ptmultiabadiaksana15@gmail.com`
  * **WhatsApp & Telepon Resmi Perusahaan:** `+62 823-4297-9898`
  * **Instagram Resmi:** `@pt.multiabadiaksana`
  * **Kantor Utama (Head Office):** Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257.
  * **Workshop & Operasional Teknis:** Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Kabupaten Sidoarjo, Jawa Timur.

---

## 3. Pemetaan 2 Divisi Bisnis Utama (Cakupan Barang & Jasa)

PT. Multi Abadi Aksana berfokus pada **2 Divisi Bisnis Utama** yang terintegrasi:

### Divisi 1: Penerangan Jalan Umum (PJU)
* **Pengadaan Barang (Hardware & Material):**
  * *PJU Tenaga Surya (Solar Cell):*
    * **PJU All In One:** Kontroler, baterai LiFePO4, dan solar panel menyatu dalam satu rumah lampu (*housing*) yang bekerja mandiri dan otomatis.
    * **PJU Two In One:** Lampu, kontroler, dan baterai berada dalam satu rumah lampu, sedangkan panel surya terpasang terpisah dengan sistem klem lengan fleksibel.
    * **PJU Konvensional (Split System):** Lampu, panel surya, dan box baterai terpasang terpisah dengan kapasitas daya besar untuk jalan lintas provinsi.
  * *PJU PLN:* Lampu LED hemat energi dengan pencahayaan stabil dan teruji umur pakai panjang. Merek yang didukung: **COB, OSRAM, PHILIPS, ESTIKA**, serta lampu sorot (*floodlight* industri).
  * *Tiang & Aksesori PJU:* Tiang PJU PLN (struktur parabola melengkung), Tiang PJU Solar Cell (klem lengan fleksibel), Tiang Octagonal, Monopole, High Mast, tiang ornamen dekoratif, *arm bracket*, dan angkur pondasi.
* **Pengadaan Jasa (Services & Execution):**
  * *Perencanaan & Evaluasi Teknis:* Perhitungan kuat pencahayaan (*lux level*), survei titik koordinat, dan pemetaan jalur distribusi daya.
  * *Pekerjaan Sipil & Pondasi:* Penggalian tanah, pengecoran pondasi tiang beton bertulang (baseplate), pembuatan *manhole/handhole* jalur kabel.
  * *Jasa Instalasi & Pendirian Tiang:* Pendirian tiang (*pole erection*) menggunakan armada mobil crane dan skylift, perakitan armature lampu, penarikan kabel daya, dan komisioning panel distribusi berstandar APD K3 lengkap.

### Divisi 2: Mechanical & Electrical (ME)
* **Pengadaan Barang:**
  * *Fabrikasi Mekanikal Presisi:* Impeller Industri (Centrifugal Blower, Rotor Blade Stainless Steel, Fan Housing & Ducting).
  * *Sistem Elektrikal & Proteksi:* Panel Utama Distribusi (MDP/SDP), panel otomatis genset (ATS/AMF), panel kapasitor bank, *circuit breaker* (ACB/MCCB/MCB), dan kontaktor.
  * *Kabel & Distribusi Daya:* Kabel tegangan rendah dan menengah (NYA, NYM, NYY, XLPE), kabel kontrol, *cable tray/ladder*, dan *conduit*.
  * *Mesin & Peralatan Utama:* Transformator (trafo), genset industri, motor listrik 3 phase, pompa industri, inverter VFD, dan sistem HVAC.
* **Pengadaan Jasa:**
  * Fabrikasi kustom, rekondisi, penggantian shaft/blade, dan dynamic balancing **Impeller blower industri** (seperti unit PGIC-E34).
  * Instalasi jaringan kelistrikan pabrik, gudang logistik, dan fasilitas industri (terminasi panel, penarikan kabel, grounding & penangkal petir).
  * Pengujian beban listrik (*commissioning*), audit efisiensi daya, dan *preventive maintenance* berkala oleh teknisi bersertifikat K3.

---

## 4. Struktur Halaman & Spesifikasi UI/UX

### 4.1 Global Navigation & Header
* **Branding:** Logo resmi PT. Multi Abadi Aksana ditempatkan bersih di navbar.
* **Menu Navigasi Desktop & Mobile:**
  * `Beranda` (`/`)
  * `Produk` (Dropdown interaktif: *Penerangan Jalan Umum* dan *Mechanical & Electrical*)
  * `Projek` (`/gallery` - Dokumentasi Projek On Duty)
  * `Tentang` (`/about` - Profil & 2 Divisi Layanan)
  * `Blog` (`/blog` - Wawasan Teknik & Pengadaan)
  * `Kontak` (`/contact` - Lokasi Kantor Sidoarjo & Form RFQ)
* **Navbar Dinamis:** Menempel rapi di bagian atas halaman dan bertransformasi halus menjadi kapsul melayang (*floating capsule*) dengan efek *backdrop blur* saat digulir.
* **Floating WhatsApp Action:** Tombol melayang di sudut kanan bawah menuju WhatsApp resmi perusahaan.

### 4.2 Halaman Beranda (`/`)
1. **Hero Slider Dinamis:** Menampilkan slider foto proyek autentik berstandar K3 lengkap yang dikelola langsung dari panel admin.
2. **Interactive 2 Fokus Bisnis Utama:** Tab interaktif untuk **Penerangan Jalan Umum** dan **Mechanical & Electrical** dengan pemisahan tegas antara *Pengadaan Barang* dan *Pengadaan Jasa*.
3. **Mengapa Bermitra & 4 Tahap Alur Kerja Sama:** Kartu nilai keunggulan perusahaan dan 4 tahapan alur kerja sama proyek (`01. Komunikasi` -> `02. Survei` -> `03. Negosiasi` -> `04. Deal`).
4. **Produk & Material Unggulan:** Showcase produk unggulan dengan pintasan langsung ke divisi PJU dan ME.
5. **Projek On Duty (Portofolio Lapangan):** Grid 4 dokumentasi lapangan pilihan.
6. **Kantor & Workshop Sidoarjo:** Informasi Head Office (Wage, Kec. Taman, Sidoarjo), Workshop (Sukodono, Sidoarjo), tombol WhatsApp Resmi, tombol Instagram Resmi, serta peta Google Maps interaktif.

### 4.3 Halaman Katalog Produk (`/products`)
1. **Katalog Penerangan Jalan Umum (`/products?divisi=pju`):** Memuat kategori *Penerangan Jalan Umum Tenaga Surya* dan *Penerangan Jalan Umum PLN & Tiang*.
2. **Katalog Mechanical & Electrical (`/products?divisi=me`):** Memuat kategori *Sistem Mechanical & Electrical* (Fabrikasi Impeller & Blower serta Panel MDP/SDP, Trafo, Genset & Kabel).
3. **Pencarian & Filter Kategori:** Dilengkapi pencarian kata kunci secara *real-time* (`wire:model.live.debounce.300ms`) dan filter sub-kategori spesifik.

### 4.4 Halaman Detail Produk (`/products/{slug}`)
1. **Breadcrumbs Kontekstual & JSON-LD Product Schema:** Menampilkan hierarki navigasi dan structured data SEO otomatis.
2. **Visual & Galeri Multi-Sudut:** Area penampil foto utama dengan strip thumbnail interaktif.
3. **Parameter Spesifikasi Teknis & CTA WhatsApp:** Tabel parameter spesifikasi teknis (*key-value*) dan tombol konsultasi langsung via WhatsApp.
4. **Deskripsi Teknis, Keunggulan Implementasi & Unit Terkait:** Menampilkan rincian aplikasi, poin keunggulan unit, serta 3 produk terkait dari divisi yang sama.

### 4.5 Halaman Portofolio Projek On Duty (`/gallery`)
* Filter tab per divisi: *Semua Dokumentasi*, *Penerangan Jalan Umum*, dan *Mechanical & Electrical*.
* Seluruh foto dokumentasi lapangan mematuhi standar K3 lengkap (helm safety, sarung tangan, lengan panjang, rompi reflektif).
* Modal Lightbox layar penuh (`x-teleport="body"`, `z-[100]`, backdrop blur netral) dengan informasi lokasi proyek dan tombol konsultasi via WhatsApp.

### 4.6 Halaman Blog & Wawasan Teknik (`/blog` & `/blog/{slug}`)
* Artikel edukasi teknis seputar konfigurasi PJU Tenaga Surya & PLN, fabrikasi Impeller blower industri, serta disiplin standar K3 konstruksi.
* Dilengkapi skema JSON-LD `TechArticle` dan filter topik kategori.

### 4.7 Halaman Kontak & Form Penawaran (`/contact`)
* 3 Kartu Informasi Utama: *WhatsApp Resmi*, *Email Resmi*, dan *Kantor & Workshop Sidoarjo*.
* Formulir Permintaan Penawaran Terstruktur dengan proteksi anti-spam (*rate limiter* & *honeypot trap*) yang langsung masuk ke mini-CRM di panel admin.
* Alamat lengkap Head Office & Workshop beserta Google Maps interaktif.

---

## 5. Fitur Backoffice CMS & Keamanan Tingkat Tinggi (Filament PHP v3)

### 5.1 Proteksi & Keamanan Akses Portal
1. **Obscured Secret Admin Path:** Jalur standar `/admin`, `/login`, dan `/wp-admin` diblokir permanen (`404 Not Found` + IP logging). Portal diakses melalui URL rahasia (`/portal-internal-maa-9x7k2v`).
2. **Anti Brute-Force Rate Limiting:** Maksimal 3 kali kesalahan login dalam 5 menit per IP, terkunci otomatis selama 300 detik.
3. **Honeypot Decoy Trap:** Perangkap bot otomatis pada form otorisasi.
4. **HTTP Security Headers:** `X-Robots-Tag: noindex, nofollow`, `Referrer-Policy: no-referrer`, `X-Frame-Options: DENY`, `X-Content-Type-Options: nosniff`.
5. **Manajemen Akun Terproteksi (1 Utama + 2 Cadangan):** Otentikasi Bcrypt 12 rounds dengan sesi terenkripsi (`SESSION_ENCRYPT=true`, 60 menit) dan validasi password minimal 12 karakter.

### 5.2 Modul Sumber Daya CMS
1. **Hero Slider Beranda (`HeroSlideResource`)**
2. **Divisi Bisnis Utama (`ServicePillarResource`)**
3. **Kategori & Katalog Produk (`ProductCategoryResource` & `ProductResource`)**
4. **Galeri Projek On Duty (`GalleryResource`)**
5. **Artikel & Kategori Wawasan (`PostResource` & `PostCategoryResource`)**
6. **Permintaan & Konsultasi Klien (`ContactInquiryResource`)**
7. **Pengaturan Profil & Akun Admin (`ManageCompanySettings` & `UserResource`)**

---

## 6. Kebutuhan Non-Fungsional & Kualitas Sistem

1. **Standar K3 Visual 100%:** Seluruh aset gambar dokumentasi proyek wajib menampilkan teknisi dengan APD K3 lengkap.
2. **SEO & Lighthouse 100:** Dynamic `robots.txt` dengan URL Sitemap absolut, XML + Image Sitemap otomatis, header `X-Robots-Tag: index, follow`, serta optimasi font dan gambar `.webp`.
3. **Kesiapan Infrastruktur Produksi:** Dilengkapi skrip otomasi `deploy-vps.sh` untuk Ubuntu 24.04 LTS dan Nginx.
