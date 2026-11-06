# PRODUCT REQUIREMENTS DOCUMENT (PRD)

**Nama Proyek:** Corporate Web Portal & Digital Product Showcase (B2B/B2G Non-Ecommerce)  
**Klien:** PT. Multi Abadi Aksana (General Trading, Supplier & Contractor)  
**Spesialisasi:** Infrastruktur Penerangan (PJU), Mechanical & Electrical (ME), Fabrikasi Impeller, Interior Exterior & Suku Cadang  
**Tech Stack Utama:** TALL Stack (Tailwind CSS, Alpine.js, Laravel 11, Livewire v3) + Filament PHP v3  
**Target Deployment:** Linux VPS (Ubuntu LTS, Nginx, MySQL/PostgreSQL, Redis)  

---

## 1. Executive Summary & Konsep Utama

### 1.1 Latar Belakang Perusahaan
**PT. Multi Abadi Aksana (MAA)** adalah perusahaan penyedia barang dan jasa (*General Trading, Supplier, & Contractor*) yang berpusat di Kabupaten Sidoarjo, Jawa Timur. Perusahaan berkomitmen menyajikan solusi terintegrasi, aman (mengutamakan K3: *Keselamatan dan Kesehatan Kerja*), dan berkualitas tinggi untuk sektor publik (pemerintahan/dinas) maupun swasta/industri.

### 1.2 Tujuan & Konsep Website
Website PT. Multi Abadi Aksana dirancang sebagai **Corporate Profile & Digital Product Showcase (Non-Ecommerce)**:
1. **Bukan Website Jual-Beli Online (Non-Transactional):** Website **tidak** menampilkan harga produk retail, keranjang belanja (*shopping cart*), perhitungan ongkos kirim otomatis, maupun *payment gateway*.
2. **Pemisahan Divisi Produk Mandiri (Divisi PJU & Divisi ME):** Mengingat karakter teknis pengadaan yang berbeda, katalog produk dipisahkan secara tegas melalui *Gateway Selection Portal* menjadi **Divisi PJU** dan **Divisi ME**.
3. **Katalog Informasi & Spesifikasi Teknis Mendalam:** Halaman produk berfungsi murni sebagai etalase teknis digital yang menampilkan foto produk berkualitas tinggi, parameter spesifikasi teknis (*key-value*), foto galeri multi-sudut, alasan memilih produk (*"Mengapa Harus Produk Ini?"*), serta poin keunggulan implementasi.
4. **Konversi Langsung ke WhatsApp (Direct Click-to-WhatsApp):** Setiap kartu dan halaman detail produk mengarahkan calon klien langsung ke **WhatsApp PIC Divisi Terkait** (Admin Proyek/PJU vs Admin Suku Cadang) dengan pesan otomatis (*pre-filled text*) untuk memulai alur kemitraan resmi: **Komunikasi -> Survei -> Negosiasi -> Deal**.

---

## 2. Identitas Korporat & Data Master Perusahaan

Data diekstrak langsung dari 3 dokumen resmi perusahaan (*Company Profile PT. Multi Abadi Aksana*, *Proposal PJU MAA*, dan *Katalog Sparepart & Equipment*):

* **Nama Resmi:** PT. Multi Abadi Aksana
* **Bidang Usaha:** Pengadaan Barang dan Jasa (*General Trading, Supplier & Contractor*)
* **Tagline Resmi:** *"Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan"*
* **Prinsip Operasional:** *Utamakan Keselamatan dan Kesehatan Kerja (K3) Terintegrasi*
* **Visi:**
  Menjadi perusahaan penyedia barang dan jasa (*general contractor & supplier*) yang terpercaya, profesional, berintegritas tinggi, dan berdaya saing unggul di Indonesia, serta menjadi mitra strategis dalam penyediaan solusi infrastruktur penerangan jalan, mekanikal-elektrikal, fabrikasi presisi, dan tata ruang yang berkelanjutan.
* **Misi:**
  1. Menyediakan produk penerangan jalan umum (PJU), fabrikasi impeller, komponen mekanikal-elektrikal, suku cadang industri, serta pengerjaan interior & eksterior dengan standar mutu terbaik, aman, dan tepat spesifikasi.
  2. Memberikan kepastian mutu dan keandalan pelayanan menyeluruh kepada setiap mitra konsumen.
  3. Berperan aktif bersama instansi pemerintah maupun swasta dalam menyukseskan pembangunan infrastruktur nasional.
  4. Mewujudkan sistem tata kelola manajemen perusahaan yang menjunjung tinggi etika bisnis, transparansi, dan tanggung jawab sosial.
* **3 Nilai Keunggulan (Why You Should Choose Us):**
  1. **Kualitas Terjamin:** Produk dan material berstandar industri sesuai spesifikasi teknis dan regulasi keselamatan kerja.
  2. **Tenaga Ahli Berpengalaman:** Didukung oleh tim lapangan bersertifikasi dan jaringan pemasok resmi terpercaya.
  3. **Tepat Waktu & Efisien:** Komitmen penuh terhadap jadwal pelaksanaan proyek, pengadaan transparan, dan efisiensi anggaran klien.
* **Alur Kemitraan (The Process):**
  `1. KOMUNIKASI` -> `2. SURVEI` -> `3. NEGOSIASI` -> `4. DEAL`
* **Informasi Kontak & Lokasi Resmi:**
  * **Email Resmi:** `ptmultiabadiaksana15@gmail.com`
  * **WhatsApp / Telepon Proyek Utama (PJU, M&E, Interior):** `+62 823-4297-9898`
  * **WhatsApp / Telepon Divisi Sparepart & Pelumas:** `+62 812-1659-2824`
  * **Kantor Utama (Head Office):** Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257.
  * **Workshop & Divisi Suku Cadang:** Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Kabupaten Sidoarjo, Jawa Timur.

---

## 3. Pemetaan 4 Pilar Bisnis (Cakupan Barang & Jasa)

PT. Multi Abadi Aksana memiliki **4 Pilar Bisnis Utama** yang terintegrasi:

### Pilar 1: Penerangan Jalan Umum (PJU)
* **Pengadaan Barang (Hardware & Material):**
  * *PJU Tenaga Surya (Solar Cell):*
    * **PJU All In One:** Kontroler, baterai LiFePO4, dan solar panel menyatu dalam satu rumah lampu (*housing*) yang bekerja mandiri dan otomatis.
    * **PJU Two In One:** Lampu, kontroler, dan baterai berada dalam satu rumah lampu, sedangkan panel surya fleksibel terpasang terpisah di atas tiang.
    * **PJU Konvensional (Split System):** Lampu, panel surya, dan box baterai terpasang terpisah dengan kapasitas daya besar untuk jalan lintas provinsi.
  * *PJU PLN:* Lampu LED hemat energi dengan pencahayaan stabil dan teruji umur pakai panjang. Merek yang didukung: **COB, OSRAM, PHILIPS, ESTIKA**, serta lampu sorot (*floodlight* industri).
  * *Tiang & Aksesori PJU:* Tiang PJU PLN (struktur parabola melengkung), Tiang PJU Solar Cell (klem lengan fleksibel), Tiang Octagonal, Monopole, High Mast, tiang ornamen dekoratif, *arm bracket*, dan angkur pondasi.
  * *Sistem Kontrol, Panel & Daya:* Panel distribusi PJU, timer, *photocell sensor*, kabel instalasi bawah tanah & udara, trafo penunjang, baterai, dan *Solar Charge Controller*.
* **Pengadaan Jasa (Services & Execution):**
  * *Perencanaan & Evaluasi Teknis:* Perhitungan kuat pencahayaan (*lux level*), survei kontur tanah, dan pemetaan jalur distribusi daya.
  * *Pekerjaan Sipil & Pondasi:* Penggalian tanah, pembuatan pondasi tiang beton bertulang, pembuatan *manhole/handhole* jalur kabel.
  * *Jasa Instalasi & Ereksi:* Pendirian tiang, perakitan armature lampu, penarikan kabel daya, dan komisioning panel distribusi.
  * *Uji Fungsi & Pemeliharaan:* Pengujian kelistrikan, otomatisasi sensor malam/siang, verifikasi K3, dan perawatan berkala.

### Pilar 2: Interior & Exterior
* **Pengadaan Barang:**
  * Penutup dinding & plafon: Gypsum board, panel PVC, wall panel WPC/UVP, *acoustic tile*, dan wallpaper.
  * Material lantai (*flooring*): Parket kayu, vinyl, SPC flooring, karpet kantor, dan ubin granit.
  * Furnitur & partisi: *Custom furniture* (meja kerja, lemari arsip, meja resepsionis), partisi kaca, dan *toilet cubicle system*.
  * Fasad eksterior: Lembaran Aluminium Composite Panel (ACP), rangka baja ringan, dan kanopi gedung.
* **Pengadaan Jasa:**
  * Perancangan konsep tata ruang komersial, visualisasi 3D, dan pemilihan skema material.
  * Pelaksanaan konstruksi partisi, pengecatan, instalasi plafon, penataan lantai, dan perakitan furnitur.
  * Pemasangan fasad ACP gedung bertingkat, struktur kanopi, dan renovasi tata ruang perkantoran.

### Pilar 3: Mechanical & Electrical (ME)
* **Pengadaan Barang:**
  * Sistem Elektrikal: Panel Utama Distribusi (MDP/SDP), panel otomatis genset (ATS/AMF), panel kontrol motor industri, *circuit breaker* (MCCB/MCB), dan *capacitor bank*.
  * Kabel & Distribusi Daya: Kabel tegangan rendah dan menengah (NYA, NYM, NYY, XLPE), kabel kontrol, *cable ladder*, dan *conduit*.
  * Peralatan Manufaktur & Mekanikal: Transformator (trafo), genset industri, UPS, sistem blower pabrik, saluran ventilasi, serta **Impeller Stainless Steel**.
* **Pengadaan Jasa:**
  * Fabrikasi presisi dan dynamic balancing **Impeller industri** (material stainless steel AISI 304/316).
  * Instalasi jaringan listrik tegangan rendah/menengah, perakitan panel distribusi daya, dan pemasangan blower ventilasi pabrik.
  * Pengujian beban listrik (*load test*), pengetesan vibrasi impeller, dan perawatan preventif genset/trafo berkala.

### Pilar 4: Sparepart & Equipment
* **Pengadaan Suku Cadang & Perlengkapan Operasional:**
  Katalog pasokan suku cadang mesin, armada operasional, dan alat berat:
  1. **Oli Mesin & Transmisi (Lubricants)**
  2. **Grease (Gemuk Pelumas Khusus Industri)**
  3. **Ban Luar Truk & Alat Berat**
  4. **Ban Dalam**
  5. **Aki Kering & Basah (Battery)**
  6. **Filter (Oli, Udara, Bahan Bakar)**
  7. **Wiper Kaca**
  8. **Baut Roda Heavy Duty**
  9. **Bearing Industri**
  10. **Kabel Kelistrikan Kendaraan**
  11. **Kampas Kopling & Rem**
  12. **Lampu Operasional Kendaraan**
  13. **Peralatan Mesin Tambahan**

---

## 4. Struktur Halaman & Spesifikasi UI/UX

### 4.1 Global Navigation & Header
* **Branding:** Logo resmi PT. Multi Abadi Aksana ditempatkan bersih di navbar tanpa kotak pembungkus berlebih.
* **Menu Navigasi Desktop:**
  * `Beranda`
  * `Produk` (Dropdown interaktif: *Katalog Divisi PJU*, *Katalog Divisi ME*, dan *Pilih Divisi*)
  * `Projek` (Dokumentasi Projek On Duty)
  * `Tentang` (Profil & 4 Pilar Layanan)
  * `Blog` (Wawasan Teknik & Pengadaan)
  * `Kontak` (Lokasi Kantor Sidoarjo & Form RFQ)
* **Navbar Dinamis:** Menempel rapi di bagian atas halaman dan bertransformasi halus (*smooth transition*) menjadi kapsul melayang (*floating capsule*) dengan efek *backdrop blur* saat digulir (*scroll*).
* **Floating WhatsApp Action:** Tombol melayang di sudut kanan bawah dengan pilihan langsung: *Admin Proyek/PJU* atau *Divisi Sparepart*.

### 4.2 Halaman Beranda (`/`)
1. **Hero Slider:**
   * Menampilkan slider foto proyek autentik (PJU Ruas Gempol, PJU Tol, Interior Adelle Jewellery, Fabrikasi Impeller).
   * Headline dan deskripsi dinamis per slide.
   * Dua tombol CTA presisi: **"Eksplorasi Katalog"** dan **"Konsultasi Proyek"** (WhatsApp).
2. **Interactive 4 Pilar Bisnis:**
   * Tab interaktif untuk PJU, Interior, Mechanical Electrical, dan Sparepart dengan pemisahan tegas antara *Pengadaan Barang* dan *Pengadaan Jasa*.
   * Tombol langsung mengarah ke katalog divisi terkait.
3. **Mengapa Memilih Kami & Alur Kerja 4 Tahap:**
   * 3 kartu nilai: *Kualitas Terjamin*, *Tenaga Ahli Berpengalaman*, *Tepat Waktu & Efisien*.
   * Alur kerja kemitraan sistematis: `01. Komunikasi` -> `02. Survei` -> `03. Negosiasi` -> `04. Deal`.
4. **Etalase Produk Unggulan:**
   * Showcase produk terkurasi dengan tombol pintas langsung: **Katalog PJU** dan **Katalog ME**.
5. **Projek On Duty (Portofolio Lapangan):**
   * Grid dokumentasi lapangan dengan tautan langsung ke galeri penuh.
6. **Dual Office & Peta Lokasi:**
   * Informasi Head Office (Taman, Sidoarjo) dan Workshop Sparepart (Sukodono, Sidoarjo) terintegrasi Google Maps.

### 4.3 Halaman Katalog Produk (`/products`)
Katalog menerapkan pemisahan divisi menyeluruh:
1. **Gateway Selection Screen (Saat Belum Memilih Divisi):**
   * Menampilkan dua kartu portal berukuran besar: **Divisi PJU** dan **Divisi ME**.
   * Calon klien diarahkan untuk memilih spesialisasi yang relevan agar navigasi lebih terfokus.
2. **Katalog Khusus Divisi PJU (`/products?divisi=pju`):**
   * Khusus memuat unit PJU Tenaga Surya (AIO, 2in1, Split) dan PJU PLN beserta Tiang Galvanis.
   * Kategori filter di sidebar hanya menampilkan sub-kategori PJU.
   * Kontak WhatsApp langsung terhubung ke Admin Proyek & PJU.
3. **Katalog Khusus Divisi ME (`/products?divisi=me`):**
   * Khusus memuat unit Fabrikasi Impeller, Blower Industri, Panel MDP/SDP, Trafo, Genset, dan Suku Cadang Mesin.
   * Kategori filter di sidebar hanya menampilkan sub-kategori ME & Sparepart.
   * Kontak WhatsApp terhubung ke Tim ME dan Divisi Sparepart.
4. **Persistent Division Switcher:**
   * Terletak di atas katalog untuk berpindah antara `Katalog PJU` dan `Katalog ME` secara instan, atau tombol `Ganti Divisi` untuk kembali ke layar gateway.

### 4.4 Halaman Detail Produk (`/products/{slug}`)
1. **Breadcrumbs Kontekstual:** Menampilkan hierarki sesuai divisi produk: `Beranda > Katalog Produk > Divisi [PJU / ME] > [Kategori] > [Nama Produk]`.
2. **Visual & Galeri Multi-Sudut:** Area penampil foto utama dengan strip thumbnail interaktif.
3. **Informasi Teknis & CTA WhatsApp:**
   * Status unit: *Tersedia / Pre-Order Proyek*, *Bergaransi*, *Standar Mutu & K3*.
   * Estimator volume kebutuhan (Unit, Set, Titik Tiang, Drum, dll).
   * Tombol CTA: **"Minta Penawaran Harga via WhatsApp"** dengan pesan otomatis spesifik produk.
4. **Parameter Spesifikasi Teknis (Key-Value):**
   * Rincian teknis lengkap (Tegangan, Lumen, Kapasitas Baterai, Material Impeller, Dimensi, dll).
5. **Keunggulan & Mengapa Harus Produk Ini:**
   * Poin kelebihan operasional dan daya tahan material.
6. **Unit Terkait (Related Products):**
   * Khusus menampilkan produk lain yang berasal dari divisi yang sama.

### 4.5 Halaman Portofolio Projek On Duty (`/gallery`)
* Filter tab per divisi dokumentasi: *Semua Dokumentasi*, *Projek PJU*, *Interior & Exterior*, *Mechanical & Electrical*.
* Modal Lightbox resolusi tinggi dengan informasi lokasi proyek dan tombol konsultasi pekerjaan serupa.

### 4.6 Halaman Blog & Wawasan Teknik (`/blog` & `/blog/{slug}`)
* Artikel informatif seputar konfigurasi PJU, teknik balancing impeller, efisiensi energi, dan standar keselamatan kerja K3.
* Filter kategori artikel dan rekomendasi bacaan teknis terkait.

### 4.7 Halaman Kontak & Form Penawaran (`/contact`)
* 3 Kartu Saluran Komunikasi: *WhatsApp Proyek Utama*, *WhatsApp Divisi Sparepart*, dan *Email Korporat Resmi*.
* Formulir Permintaan Penawaran Terstruktur (Nama, Instansi/Perusahaan, Nomor WA, Divisi Layanan Terkait, Rincian Spesifikasi). Data formulir langsung tersimpan di backoffice CMS.
* Alamat lengkap Kantor Utama & Workshop serta Google Maps interaktif.

---

## 5. Fitur Backoffice CMS (Filament PHP v3 - `/admin`)

Panel administrasi memudahkan pengelolaan data secara mandiri tanpa modifikasi kode:
1. **Dashboard Widget:** Ringkasan jumlah produk per divisi, portofolio galeri proyek, artikel wawasan, dan pesan penawaran masuk.
2. **Katalog Produk & Kategori:**
   * Kelola Kategori Produk dan penugasan divisi (*PJU* vs *ME*).
   * Kelola Produk (Nama, Slug, Spesifikasi Teknis via *Filament Repeater*, Keunggulan, Galeri Foto WebP).
3. **Pilar Bisnis & Cakupan Layanan:**
   * Kelola teks cakupan *Pengadaan Barang* vs *Pengadaan Jasa* pada 4 pilar bisnis.
4. **Galeri Dokumentasi Proyek:**
   * Unggah foto lapangan, lokasi pekerjaan, dan deskripsi teknis proyek.
5. **Artikel Wawasan Teknik:**
   * Editor artikel berita/teknis lengkap dengan optimasi SEO.
6. **Formulir Permintaan Penawaran (Mini CRM):**
   * Memantau dan memperbarui status prospek proyek klien: `Komunikasi` -> `Survei` -> `Negosiasi` -> `Deal`.
7. **Pengaturan Identitas Perusahaan:**
   * Pengaturan nomor kontak resmi, email, alamat kantor, dan jam operasional.

---

## 6. Kebutuhan Non-Fungsional & Kualitas Sistem

1. **Performa Tinggi & Tanpa Slop:**
   * Mengikuti standar craftsmanship UI: tidak ada teks yang miring atau asimetris, tinggi tombol presisi, dan kontras warna memenuhi standar WCAG AA.
2. **Optimasi Media:**
   * Semua aset gambar dioptimasi ke format WebP dengan atribut `loading="lazy"` dan dimensi eksplisit untuk mencegah *layout shift* (CLS).
3. **Kesiapan Infrastruktur Produksi:**
   * Kompatibel dengan arsitektur Linux VPS (Ubuntu LTS, Nginx, PHP 8.2+, MySQL 8.0/MariaDB, dan Redis Caching).
