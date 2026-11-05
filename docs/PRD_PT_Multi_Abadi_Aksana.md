# PRODUCT REQUIREMENTS DOCUMENT (PRD)
**Nama Proyek:** Corporate Web Portal & Digital Product Showcase (B2B/B2G Non-Ecommerce)  
**Klien:** PT. Multi Abadi Aksana (General Trading, Supplier & Contractor)  
**Referensi Struktur & Flow UX:** `cvniscahya.com` (CV Niscahya Indonesia Cerdas)  
**Tech Stack Utama:** TALL Stack (Tailwind CSS, Alpine.js, Laravel 11, Livewire v3) + Filament PHP v3  
**Target Deployment:** Linux VPS (Ubuntu LTS, Nginx, MySQL/PostgreSQL, Redis)  

---

## 1. Executive Summary & Konsep Utama

### 1.1 Latar Belakang Perusahaan
**PT. Multi Abadi Aksana (MAA)** adalah perusahaan penyedia barang dan jasa (*General Trading, Supplier, & Contractor*) yang berpusat di Kabupaten Sidoarjo, Jawa Timur. Perusahaan berkomitmen menyajikan solusi terintegrasi, aman (mengutamakan K3 - *Keselamatan dan Kesehatan Kerja*), dan berkualitas tinggi untuk sektor publik (pemerintahan/dinas) maupun swasta/industri.

### 1.2 Tujuan & Konsep Website (Adaptasi `cvniscahya.com`)
Mengadaptasi penuh struktur navigasi, tata letak informasi, dan alur konversi dari **`cvniscahya.com`**, website PT. Multi Abadi Aksana dirancang sebagai **Corporate Profile & Digital Product Showcase (Non-Ecommerce)**:
1. **Bukan Website Jual-Beli Online (Non-Transactional):** Website **tidak** menampilkan harga produk, keranjang belanja (*shopping cart*), perhitungan ongkos kirim, maupun *payment gateway*.
2. **Katalog Informasi & Spesifikasi Teknis:** Halaman **Produk** berfungsi murni sebagai etalase digital yang menampilkan foto produk, kategori/tipe, deskripsi fungsi, alasan memilih produk (*"Mengapa Harus Produk Ini?"*), poin-poin keunggulan, serta tabel/daftar spesifikasi teknis.
3. **Konversi Langsung ke WhatsApp (Direct Click-to-WhatsApp):** Setiap kartu dan halaman detail produk mengarahkan calon klien langsung ke **WhatsApp Admin** dengan pesan otomatis (*pre-filled text*) untuk memulai alur bisnis perusahaan: **Komunikasi $\rightarrow$ Survei $\rightarrow$ Negosiasi $\rightarrow$ Deal**.

---

## 2. Identitas Korporat & Data Master Perusahaan

Data berikut diekstrak langsung dari 3 dokumen resmi klien (*ComPro MULTI ABADI AKSANA*, *PROPOSAL PJU MAA*, dan *sparepart equipment*):

* **Nama Resmi:** PT. Multi Abadi Aksana
* **Bidang Usaha:** Pengadaan Barang dan Jasa (*General Trading, Supplier & Contractor*)
* **Tagline / Slogan:** *"Membangun bisnis yang berdampak bagi keuntungan perusahaan dan keberlanjutan lingkungan"*
* **Prinsip Kerja Lapangan:** *Utamakan Keselamatan dan Kesehatan Kerja (K3)*
* **Visi:**
  Menjadi perusahaan penyedia barang dan jasa (*general contractor & supplier*) yang terpercaya, profesional, berintegritas tinggi, dan berdaya saing tinggi di Indonesia, serta menjadi mitra strategis unggulan dalam penyediaan solusi infrastruktur, mekanikal-elektrikal, pencahayaan, dan tata ruang yang berkelanjutan.
* **Misi:**
  1. Menyediakan produk penerangan jalan (PJU), *impeller*, komponen mekanikal-elektrikal, *sparepart*, serta pengerjaan interior & eksterior dengan standar mutu terbaik, aman, dan tepat spesifikasi.
  2. Memberikan kepercayaan penuh kepada konsumen baik dalam kualitas maupun pelayanan.
  3. Berperan aktif dengan pemerintahan maupun swasta dalam mengembangkan usaha untuk membangun negara.
  4. Mewujudkan sistem manajemen perusahaan yang menjunjung tinggi etika bisnis dan sosial.
* **3 Keunggulan Utama (Why You Should Choose Us):**
  1. **Kualitas Terjamin:** Produk dan material berkualitas tinggi sesuai spesifikasi teknis dan standar keselamatan.
  2. **Tenaga Ahli Berpengalaman:** Didukung oleh tim profesional yang berpengalaman di bidangnya serta jaringan supplier yang luas.
  3. **Tepat Waktu & Efisien:** Komitmen penuh terhadap ketepatan waktu pengerjaan, proses pengadaan yang transparan, dan efisiensi anggaran.
* **Alur Kerja (The Process):**
  `1. KOMUNIKASI` $\rightarrow$ `2. SURVEI` $\rightarrow$ `3. NEGOSIASI` $\rightarrow$ `4. DEAL`
* **Informasi Kontak & Alamat (Dinamis via CMS Filament):**
  * **Email Resmi:** `ptmultiabadiaksana15@gmail.com`
  * **WhatsApp / Telepon Utama (ComPro & PJU):** `+62 823-4297-9898` / `+62 823-4279-9898`
  * **WhatsApp / Telepon Divisi Sparepart:** `+62 812-1659-2824`
  * **Kantor Utama (Head Office):** Jl. Taman Surya Agung Blok B No. 11, Sritanjung, Wage, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257.
  * **Kantor / Workshop Cabang:** Safira Stone Resort A2-01, Masangan Wetan, Sukodono, Kabupaten Sidoarjo, Jawa Timur.

---

## 3. Pemetaan 4 Pilar Bisnis (Cakupan Barang & Jasa)

Berbeda dengan `cvniscahya.com` yang hanya fokus pada PJU, PT. Multi Abadi Aksana memiliki **4 Pilar Bisnis Utama** yang wajib terwakili di halaman Beranda, Layanan, dan Filter Katalog Produk:

### Pilar 1: Penerangan Jalan Umum (PJU)
* **Pengadaan Barang (Hardware & Material):**
  * *PJU Tenaga Surya (Solar Cell):*
    * **PJU All In One:** Kontroler, baterai, dan solar panel menyatu dalam satu rumah lampu (*housing*) yang bekerja mandiri dan otomatis.
    * **PJU Two In One:** Lampu, kontroler, dan baterai berada dalam satu rumah lampu, sedangkan panel surya terpisah.
    * **PJU Konvensional (Split System):** Lampu, solar panel, dan box sistem baterai terpasang secara terpisah dengan desain kokoh.
  * *PJU PLN:* Lampu LED hemat energi dengan penerangan stabil, dapat diatur intensitas cahayanya, dan terintegrasi sistem kontrol. Merek yang didukung: **COB, OSRAM, PHILIPS, ESTIKA**, serta lampu sorot (*floodlight*).
  * *Tiang & Aksesori PJU:* Tiang PJU PLN (struktur parabola melengkung), Tiang PJU Tenaga Surya (lengan lampu dan tiang utama terpisah dengan klem lengan fleksibel), Tiang Octagonal, Monopole, High Mast, tiang ornamen dekoratif, *arm bracket*, dan tiang lampu taman/pedestrian.
  * *Sistem Kontrol, Panel & Daya:* Panel distribusi PJU, timer, *photocell sensor*, *Smart Lighting Controller*, kabel distribusi (*underground* & udara), trafo penunjang, baterai (*Lithium/Gel*), dan *Solar Charge Controller*.
* **Pengadaan Jasa (Services & Execution):**
  * *Perencanaan & Survei Teknis:* Evaluasi kebutuhan pencahayaan (*lighting design*), perhitungan *lux level*, survei lokasi, dan pemetaan jalur distribusi daya.
  * *Pekerjaan Sipil & Konstruksi:* Penggalian tanah, pembuatan/pengecoran pondasi beton tiang PJU, pembuatan *manhole/handhole* jalur kabel bawah tanah.
  * *Jasa Instalasi & Pemasangan:* Ereksi (pendirian) tiang, pemasangan armature lampu, penarikan kabel daya, penyambungan modul solar cell, perakitan panel distribusi.
  * *Pengujian & Komisioning (Testing & Commissioning):* Pengujian kelistrikan, fungsi sensor/otomatisasi, dan verifikasi standar keselamatan jalan.
  * *Jasa Pemeliharaan & Perbaikan (Maintenance & Repair):* Perawatan berkala, penggantian komponen rusak (lampu/baterai/panel/kabel), dan perbaikan darurat.

### Pilar 2: Interior & Exterior
* **Pengadaan Barang (Material & Produk):**
  * *Penutup Dinding & Plafon:* Gypsum board, panel PVC, wall panel WPC/UVP, *acoustic tile*, dan wallpaper.
  * *Material Lantai (Flooring):* Parket kayu, vinyl, SPC flooring, karpet kantor, serta ubin granit/keramik.
  * *Furnitur & Partisi:* *Custom furniture* (meja kerja, lemari, meja resepsionis), partisi gipsum/kaca, dan *toilet cubicle system*.
  * *Aksesori & Pencahayaan:* Tirai/*blinds*, *downlight decorative*, dan elemen dekoratif interior lainnya.
* **Pengadaan Jasa (Pekerjaan & Pelaksanaan):**
  * *Perancangan & Konsultasi Desain:* Pembuatan konsep tata ruang (*layout design*), visualisasi 3D, pemilihan skema material dan warna.
  * *Konstruksi & Finishing Interior:* Pemasangan partisi, pengecatan dinding, instalasi plafon, penataan lantai, perakitan furnitur.
  * *Aplikasi Eksterior:* Pemasangan fasad ACP/kaca gedung tinggi, pembuatan rangka kanopi, pengerjaan pagar/pintu utama.
  * *Renovasi & Pembenahan Ulang (Refurbishment):* Pembongkaran struktur lama, perbaikan tata ruang, peremajaan tampilan bangunan.
  * *Jasa Pemeliharaan (Maintenance):* Perawatan berkala fasad luar, pembersihan dinding luar gedung (*gondola work*), perbaikan elemen dekoratif.

### Pilar 3: Mechanical & Electrical (ME)
* **Pengadaan Barang (Material & Produk):**
  * *Sistem Elektrikal (Panel & Proteksi):* Panel Utama (MDP/SDP), panel ATS/AMF, panel kontrol motor, *circuit breaker* (MCCB/MCB), dan *capacitor bank*.
  * *Kabel & Jalur Distribusi:* Kabel listrik tegangan rendah dan menengah (NYA, NYM, NYY, XLPE), kabel kontrol, *cable tray*, *ladder*, dan *conduit*.
  * *Peralatan Utama & Industri:* Transformator (trafo), genset, UPS (*Uninterruptible Power Supply*), stabilizer, armature sakelar/stopkontak, **impeller**, suku cadang mekanikal industri, dan komponen sistem perpipaan.
* **Pengadaan Jasa (Pekerjaan & Pelaksanaan):**
  * *Perancangan & Konsultasi Teknis:* Perhitungan beban listrik dan desain skema jalur kelistrikan.
  * *Jasa Instalasi & Pemasangan:* Penarikan kabel daya, perakitan panel listrik, instalasi jaringan penerangan interior/industri.
  * *Fabrikasi & Perbaikan Teknis:* Jasa fabrikasi dan perbaikan komponen mekanikal industri khususnya **impeller** dan peralatan pabrik.
  * *Pengujian & Komisioning:* Uji beban listrik, uji kebocoran perpipaan (*hydrotest*), uji tekanan sistem pemadam, pengujian otomatisasi panel & HVAC.
  * *Jasa Pemeliharaan & Perbaikan:* *Preventive maintenance* berkala pada panel, trafo, genset, dan unit HVAC.

### Pilar 4: Sparepart & Equipment
* **Pengadaan Barang (Katalog Suku Cadang):**
  * Menyediakan perlengkapan *sparepart* kualitas premium untuk kendaraan operasional, armada, alat berat, dan mesin industri:
    1. **Oli (Lubricants)**
    2. **Grease (Gemuk Pelumas)**
    3. **Ban Luar**
    4. **Ban Dalam**
    5. **Aki (Battery)**
    6. **Filter (Oli, Udara, Bahan Bakar)**
    7. **Wiper**
    8. **Baut Roda**
    9. **Bearing**
    10. **Kabel**
    11. **Kampas Kopling**
    12. **Lampu Kendaraan / Alat Berat**
    13. **Peralatan Mesin Lainnya**

---

## 4. Struktur Halaman & Spesifikasi UI/UX (Berkiblat ke `cvniscahya.com`)

### 4.1 Global Navigation Bar & Footer
* **Navbar:** Logo PT. Multi Abadi Aksana di kiri; menu navigasi di tengah/kanan: `Beranda`, `Tentang Kami`, `Produk`, `Galeri`, `Blog`, `Kontak`; serta 1 tombol aksen **"Hubungi Kami"** (mengarah ke WA/Kontak).
* **Floating Button:** Tombol WhatsApp melayang di pojok kanan bawah layar.
* **Footer:** Deskripsi singkat PT. Multi Abadi Aksana, tautan cepat menu, daftar kategori produk utama, alamat lengkap kantor Sidoarjo, email, nomor telepon/WA, dan copyright.

---

### 4.2 Halaman Beranda (`/`)
 Mengikuti alur seksi pada `cvniscahya.com` yang disesuaikan dengan konten PT. Multi Abadi Aksana:
1. **Hero Section:**
   * Badge kecil: `GENERAL TRADING, SUPPLIER & CONTRACTOR`
   * Headline utama: Solusi Terintegrasi Pengadaan Barang & Jasa Infrastruktur, Mekanikal-Elektrikal, PJU, Interior & Sparepart.
   * Sub-headline: Tagline perusahaan & komitmen standar mutu serta keselamatan kerja (K3).
   * Dua Tombol CTA: **"Jelajahi Produk"** (`/products`) dan **"Konsultasi Proyek"** (WhatsApp/Kontak).
2. **Section Tentang Perusahaan & Visi-Misi (Overview):**
   * Penjelasan singkat profil PT. Multi Abadi Aksana sebagai mitra strategis sektor publik & swasta.
   * Kartu **Visi** dan **Misi**.
   * 3 Badge Keunggulan: *Kualitas Terjamin*, *Tenaga Ahli Berpengalaman*, *Tepat Waktu & Efisien*.
3. **Section Statistik / Rekam Jejak (Counter Strip):**
   * Baris angka statistik (dapat diubah dari CMS): *Tahun Pengalaman*, *Proyek Selesai*, *Unit Terpasang/Tersuplai*, *Mitra Klien*, *Cakupan Wilayah*.
4. **Running Text / Marquee Strip:**
   * Animasi teks berjalan horizontal: `PT. MULTI ABADI AKSANA • PENGADAAN BARANG DAN JASA • UTAMAKAN KESELAMATAN DAN KESEHATAN KERJA (K3)`
5. **Section 4 Pilar Layanan (Pengadaan Barang & Jasa):**
   * Menampilkan 4 kartu/tab interaktif untuk **PJU**, **Interior & Exterior**, **Mechanical & Electrical**, dan **Sparepart & Equipment**, lengkap dengan rincian *Pengadaan Barang* vs *Pengadaan Jasa*.
6. **Section Alur Kerja (The Process):**
   * Visualisasi 4 tahap kerja sama: **01. Komunikasi** $\rightarrow$ **02. Survei** $\rightarrow$ **03. Negosiasi** $\rightarrow$ **04. Deal**.
7. **Section Produk Unggulan (Featured Products Showcase):**
   * Menampilkan 4 hingga 8 kartu produk unggulan (seperti di Beranda `cvniscahya.com`).
   * Setiap kartu berisi: Gambar produk, Badge Tipe (misal: `All In One`, `Two In One`, `PJU PLN`, `Mechanical`, `Sparepart`), Nama Produk, dan tombol **"Detail"**.
   * Tombol **"Lihat Semua Produk"** di bagian atas/bawah seksi.
8. **Section Projek On Duty (Highlight Galeri):**
   * Menampilkan cuplikan foto dokumentasi proyek nyata di lapangan (Proyek PJU Gempol-Sidoarjo-Malang, Adelle Jewellery, Betonisasi Sidoarjo, Alat Berat PGIC-E34).
9. **Section Wawasan & Edukasi (Blog Terbaru):**
   * Menampilkan 3 kartu artikel terbaru beserta tanggal rilis, kategori, dan ringkasan singkat.
10. **Bottom CTA & Quick Contact Banner:**
    * Ajakan konsultasi pengadaan barang/jasa beserta tombol langsung ke WhatsApp Admin dan informasi alamat kantor Sidoarjo.

---

### 4.3 Halaman Katalog Produk (`/products`)
Persis seperti halaman `cvniscahya.com/products`, halaman ini berfungsi sebagai katalog informasi produk yang interaktif:
1. **Header Katalog:** Judul *"Katalog Produk & Material Pengadaan"* beserta deskripsi singkat.
2. **Interactive Filter Bar (Livewire v3 tanpa reload):**
   * Tombol *Filter Pills* Kategori:
     * `Semua`
     * `PJU Tenaga Surya` (*All In One, Two In One, Konvensional*)
     * `PJU PLN & Tiang` (*Lampu COB/Osram/Philips/Estika, Tiang Octagonal/Parabola*)
     * `Mechanical & Electrical` (*Panel MDP/SDP, Trafo, Kabel, Impeller*)
     * `Interior & Exterior` (*Gypsum, WPC, Flooring, ACP, Custom Furniture*)
     * `Sparepart & Equipment` (*Oli, Grease, Ban, Aki, Filter, Bearing, Kopling*)
   * Input pencarian cepat (*Search bar*) berdasarkan nama produk atau merek.
3. **Product Grid (Daftar Kartu Produk):**
   * **TIDAK ADA HARGA & TIDAK ADA TOMBOL BELI/KERANJANG.**
   * Isi Kartu:
     * Foto produk rasio konsisten dengan efek *hover zoom* halus.
     * Badge Kategori/Sub-tipe di atas judul (contoh: `Two In One`, `All In One`, `PJU PLN`, `Sparepart`).
     * Judul/Nama Produk (contoh: *PJU Tenaga Surya All In One*, *Lampu PJU PLN Philips/Osram*, *Industrial Impeller*, *Oli & Grease Alat Berat*).
     * Tombol **"Detail"** yang mengarah ke `/products/{slug}`.
4. **Banner Konsultasi di Bawah Katalog:**
   * *"Butuh Spesifikasi Khusus atau Pengadaan Skala Proyek? Hubungi Tim Ahli Kami"* dengan tombol mengarah ke halaman Kontak / WhatsApp.

---

### 4.4 Halaman Detail Produk (`/products/{slug}`)
Mengadopsi penuh tata letak halaman detail produk `cvniscahya.com` (seperti `/products/3in1` atau `/products/konvensional`):
1. **Breadcrumb:** `Beranda > Produk > [Kategori] > [Nama Produk]`
2. **Kolom Kiri (Visual & Media):**
   * Gambar utama produk resolusi tinggi.
   * *Thumbnail Gallery* (jika produk memiliki lebih dari 1 foto sudut pandang) yang bisa diklik menggunakan Alpine.js.
3. **Kolom Kanan (Header, Status & CTA):**
   * Badge Kategori (contoh: `PJU Tenaga Surya` / `Sparepart Equipment`).
   * Judul Produk Besar.
   * Baris Badge Status (persis seperti referensi):
     * Badge Hijau: `Tersedia` (atau *Custom Order*)
     * Badge Biru: `Bergaransi`
     * Badge Pendukung: `Standar Mutu & K3` / `Ramah Lingkungan`
   * Ringkasan singkat produk (1–2 kalimat).
   * **Tombol CTA Utama:** Tombol besar **"WhatsApp Admin"** (dengan ikon WhatsApp). Saat diklik, langsung membuka WA ke nomor Admin divisi terkait dengan teks otomatis:
     > *"Halo Admin PT. Multi Abadi Aksana, saya tertarik dan ingin meminta informasi/penawaran lebih lanjut mengenai produk: *[Nama Produk]* ([Link URL]). Terima kasih."*
4. **Bagian Informasi Detail & Spesifikasi Teknis:**
   * **Deskripsi Produk:** Paragraf penjelasan lengkap mengenai cara kerja dan konstruksi produk.
   * **Seksi "Mengapa Harus [Nama Produk]?"**: Penjelasan nilai tambah produk bagi proyek klien.
   * **Tabel / List Spesifikasi Teknis (Key-Value):**
     * Menampilkan daftar atribut teknis secara rapi (contoh pada PJU: *Model, Sumber Daya, Tipe Lampu, Baterai, Solar Panel, Material Tiang*; contoh pada Sparepart/ME: *Tipe Komponen, Aplikasi Unit, Standar Material*).
   * **Daftar Keunggulan Produk (Bullet Points dengan Ikon Checkmark):**
     * Menampilkan poin-poin kelebihan produk (misal: *Menghemat biaya operasional PLN, Konstruksi tahan cuaca ekstrem, Mudah dalam instalasi dan pemeliharaan*).
5. **Bagian Unit / Produk Terkait (Related Products):**
   * Menampilkan 3–4 kartu produk lain dalam kategori yang sama di bagian paling bawah halaman.

---

### 4.5 Halaman Galeri - "Projek On Duty" (`/gallery`)
Menampilkan bukti nyata kapabilitas PT. Multi Abadi Aksana di lapangan (sesuai halaman *Projek On Duty* di PDF ComPro):
* Filter kategori dokumentasi: `Semua Proyek`, `Proyek PJU`, `Interior & Exterior`, `Mechanical Electrical`, `Alat Berat & Sparepart`.
* Grid foto dokumentasi lapangan dilengkapi *Lightbox Modal* (Alpine.js) saat diklik, menampilkan judul proyek, lokasi (misal: *Ruas Gempol - Sidoarjo - Malang*, *Adelle Jewellery*, *Betonisasi Sidoarjo*, *Unit PGIC-E34*), dan deskripsi singkat pekerjaan.

---

### 4.6 Halaman Blog & Artikel (`/blog` & `/blog/{slug}`)
* Menampilkan daftar artikel edukasi dan berita perusahaan untuk memperkuat SEO.
* Dilengkapi filter kategori artikel dan fitur pencarian judul.

---

### 4.7 Halaman Kontak (`/contact`)
Mengadaptasi struktur halaman `cvniscahya.com/contact`:
1. **3 Kartu Saluran Komunikasi Langsung:**
   * **Kartu WhatsApp (Respon Cepat):** Menampilkan nomor WA Admin Utama (`+62 823-4297-9898`) & Admin Sparepart (`+62 812-1659-2824`) dengan tombol *"Chat Admin Sekarang"*.
   * **Kartu Email Resmi:** Menampilkan `ptmultiabadiaksana15@gmail.com` untuk pengiriman dokumen tender, RAB, atau kerja sama resmi dengan tombol *"Kirim Email"*.
   * **Kartu Media Sosial / Katalog PDF:** Tautan untuk mengunduh PDF Company Profile PT. Multi Abadi Aksana.
2. **Informasi Kantor & Peta Lokasi:**
   * Menampilkan alamat **Head Office (Taman, Sidoarjo)** dan **Workshop/Branch (Sukodono, Sidoarjo)** beserta jam operasional.
   * *Interactive Google Maps Embed*.
3. **Formulir Konsultasi / Permintaan Survei:**
   * Form input (Nama, Nama Perusahaan/Instansi, Nomor WA, Email, Pilih Divisi Layanan, dan Pesan Kebutuhan) yang datanya langsung masuk ke dashboard Filament v3.

---

## 5. Spesifikasi Fitur Admin Panel (Filament PHP v3 - `/admin`)

Agar seluruh konten website dapat dikelola dengan mudah oleh tim PT. Multi Abadi Aksana tanpa menyentuh kode, panel admin Filament v3 wajib menyediakan modul berikut:

1. **Dashboard Overview Widget:**
   * Statistik jumlah produk tayang, total dokumentasi galeri proyek, artikel blog, serta daftar pesan konsultasi terbaru dari klien.
2. **Modul Katalog Produk (`ProductCategoryResource` & `ProductResource`):**
   * Kelola Kategori Produk (Nama, Slug, Urutan, Nomor WA PIC Kategori).
   * Kelola Produk:
     * Input Nama Produk, Slug otomatis, Kategori, dan Label Badge (`All In One`, `Two In One`, `Konvensional`, `PJU PLN`, `Sparepart`, dll).
     * Upload Foto Utama & Galeri Foto Produk (otomatis terkompresi ke format `.webp`).
     * Toggle `Produk Unggulan (Tampil di Beranda)`, `Badge Bergaransi`, dan `Badge K3 / Eco`.
     * *Rich Text Editor* untuk Deskripsi Produk dan seksi *"Mengapa Harus Produk Ini?"*.
     * **Filament Repeater (`specifications`):** Memudahkan admin menambah baris spesifikasi teknis bebas (*Label Spesifikasi* & *Isi Spesifikasi*) sebanyak apa pun sesuai jenis barang.
     * **Filament Repeater (`advantages`):** Memudahkan admin menambah poin-poin keunggulan produk.
3. **Modul Pilar Layanan (`ServicePillarResource`):**
   * Mengelola teks penjelasan 4 divisi utama beserta daftar rincian **Pengadaan Barang** dan **Pengadaan Jasa**.
4. **Modul Galeri "Projek On Duty" (`GalleryResource`):**
   * Upload foto dokumentasi proyek lapangan, nama klien/kode unit, lokasi pengerjaan, dan kategori divisi.
5. **Modul Blog & Artikel (`PostResource`):**
   * Editor artikel lengkap dengan pengaturan *Meta Title*, *Meta Description*, dan gambar sampul.
6. **Modul Pesan & Pipeline Proyek (`ContactInquiryResource`):**
   * Melihat pesan masuk dari halaman Kontak dan memperbarui status progresnya sesuai alur bisnis: `Komunikasi` $\rightarrow$ `Survei` $\rightarrow$ `Negosiasi` $\rightarrow$ `Deal`.
7. **Modul Pengaturan Website (`CompanySettings Page`):**
   * Mengubah Nama Perusahaan, Nomor WhatsApp Admin (Utama & Sparepart), Email, Alamat Kantor, Angka Statistik di Beranda, dan file PDF Company Profile.

---

## 6. Kebutuhan Non-Fungsional & Teknis Deployment (VPS)

1. **Arsitektur TALL Stack Murni:**
   * Menggunakan **Laravel 11**, **Livewire v3** (dengan `wire:navigate` agar perpindahan antar halaman secepat SPA seperti di `cvniscahya.com`), **Alpine.js**, dan **Tailwind CSS**.
2. **Performa & Optimasi Gambar:**
   * Semua gambar produk dan foto dokumentasi lapangan dikonversi ke WebP dan menggunakan atribut `loading="lazy"` agar *PageSpeed Insights* berada di skor $> 90$.
3. **Kesiapan Infrastruktur VPS:**
   * Mendukung deployment di Linux VPS (Ubuntu 24.04 LTS) menggunakan Nginx, PHP 8.3-FPM, MySQL 8.0 / MariaDB, dan Redis untuk *caching* katalog produk.