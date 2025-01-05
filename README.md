# Website CRUD Sederhana

Website CRUD Sederhana adalah sebuah proyek berbasis web yang menyediakan fitur CRUD (Create, Read, Update, Delete) untuk mengelola data secara sederhana. Proyek ini cocok untuk pemula yang ingin belajar tentang pengembangan aplikasi web dengan dasar operasi database.

## Stack yang Digunakan

Proyek ini dibangun menggunakan teknologi berikut:

1. **Frontend**:
   - HTML
   - CSS
   - JavaScript (Vanilla JS atau library terkait, jika digunakan)

2. **Backend**:
   - PHP (dengan framework atau native, tergantung implementasi)

3. **Database**:
   - MySQL

4. **Server**:
   - Localhost menggunakan XAMPP atau LAMP (Linux, Apache, MySQL, PHP).

## Fitur-Fitur

Website CRUD Sederhana ini memiliki fitur-fitur utama berikut:

1. **Create**: Menambahkan data baru ke dalam database.
2. **Read**: Menampilkan data yang ada dalam database dalam bentuk tabel.
3. **Update**: Mengubah data yang sudah ada di dalam database.
4. **Delete**: Menghapus data dari database.
5. **Login**: Sistem login untuk mengakses fitur CRUD, dengan autentikasi berbasis username dan password.
6. **Validasi Formulir**: Validasi sederhana untuk memastikan data yang dimasukkan sesuai.

## Cara Install

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini di lingkungan lokal Anda:

### Prasyarat
- Pastikan Anda sudah menginstal XAMPP/LAMP atau server lokal lain yang mendukung PHP dan MySQL.
- Git sudah diinstal di komputer Anda.

### Langkah-langkah

1. **Clone Repository**
   ```bash
   git clone https://github.com/Fathi-Farhan/website-crud-sederhana.git
   ```

2. **Pindah ke Direktori Proyek**
   ```bash
   cd website-crud-sederhana
   ```

3. **Pindahkan Folder ke Direktori Server Lokal**
   - Salin folder proyek ke dalam direktori `htdocs` (untuk XAMPP) atau direktori web server lainnya.

4. **Import Database**
   - Buka phpMyAdmin di browser Anda.
   - Buat database baru (misalnya: `crud_sederhana`).
   - Import file SQL yang terdapat dalam folder proyek (biasanya bernama `database.sql`).

5. **Konfigurasi Koneksi Database**
   - Buka file konfigurasi (misalnya `config.php`) dalam proyek.
   - Sesuaikan nama database, username, dan password sesuai dengan pengaturan server lokal Anda.

6. **Jalankan Proyek**
   - Buka browser dan akses proyek melalui URL berikut:
     ```
     http://localhost/website-crud-sederhana
     ```

### Catatan
Pastikan semua dependensi dan ekstensi yang dibutuhkan (seperti ekstensi MySQL di PHP) sudah aktif di server lokal Anda.

---
Jika Anda mengalami masalah atau memiliki pertanyaan, silakan buka *Issues* di repository ini.

