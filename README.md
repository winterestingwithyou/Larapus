# Larapus

Larapus adalah sebuah sistem manajemen perpustakaan yang dikembangkan menggunakan Laravel v10.10. Proyek ini dibuat mengikuti buku *Seminggu Belajar Laravel* yang ditulis oleh Rahmat Awaludin.

## 🚀 Teknologi yang Digunakan

Proyek ini dibangun dengan berbagai teknologi modern berikut:
- 🛠️ **Laravel v10.10** (Backend yang kuat dan fleksibel)
- 🌐 **Vue.js** (Frontend interaktif untuk pengalaman pengguna yang lebih baik)
- 🎨 **Bootstrap** (Membantu dalam desain antarmuka yang responsif dan elegan)
- ⚡ **jQuery** (Mempermudah manipulasi DOM dan penggunaan AJAX)

## ✨ Fitur Unggulan

- 🔐 **Login & Autentikasi** – Kelola akses pengguna dengan aman.
- 🎭 **Konfigurasi Role** – Atur hak akses pengguna sesuai peran mereka.
- 📚 **Kelola Buku (CRUD)** – Tambah, ubah, hapus, dan lihat daftar buku dengan mudah.
- ✍️ **Kelola Penulis (CRUD)** – Manajemen penulis agar data lebih terstruktur.
- 👥 **Kelola Pengguna (CRUD)** – Mengelola informasi pengguna dengan efisien.
- 📊 **Statistik & Laporan** – Menyediakan data statistik untuk analisis yang lebih baik.

## 🔧 Cara Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini secara lokal:

### 1. Clone Repository
```sh
git clone https://github.com/username/larapus.git
cd larapus
```

### 2. Install Dependensi
```sh
composer install
npm install
```

### 3. Konfigurasi Lingkungan
Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database:
```sh
cp .env.example .env
```
Edit file `.env` dan sesuaikan bagian berikut:
```env
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```sh
php artisan key:generate
```

### 5. Migrasi dan Seeder
Jalankan perintah berikut untuk membuat tabel dan mengisi database dengan data dummy:
```sh
php artisan migrate --seed
```

### 6. Menjalankan Server
Jalankan server pengembangan Laravel:
```sh
php artisan serve
```
Kemudian buka `http://127.0.0.1:8000` di browser.

### 7. Menjalankan Vite (Frontend Development Server)
Untuk menjalankan tampilan yang menggunakan Vue.js:
```sh
npm run dev
```

## ⚠️ Catatan
- ✅ **Seeder sudah disediakan** untuk mengisi database dengan data contoh.
- 🔑 **Gunakan akun yang telah di-seed** untuk login pertama kali setelah instalasi.

---

Sekian dokumentasi untuk proyek *Larapus*. Jika ada kendala, silakan merujuk ke buku *Seminggu Belajar Laravel* atau dokumentasi resmi Laravel.

