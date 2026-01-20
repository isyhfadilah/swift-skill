# Swift Skill

Swift Skill adalah sebuah **sistem sederhana pendaftaran kursus IT** yang dikembangkan sebagai bagian dari **persiapan UAS mata kuliah Teknologi Database**. Sistem ini dirancang untuk mengimplementasikan konsep dasar CRUD (*Create, Read, Update, Delete*) menggunakan **PHP** dan **MySQL**, dengan tampilan antarmuka yang dibangun menggunakan **CSS murni**.

Aplikasi ini berfokus pada pengelolaan data pendaftar kursus, mulai dari proses pendaftaran hingga manajemen data oleh admin.

---

## Getting Started

Dokumentasi ini akan membantu menjalankan sistem Swift Skill di lingkungan lokal untuk keperluan pembelajaran, latihan, dan simulasi ujian.

---

### Prerequisites

Pastikan perangkat telah memenuhi kebutuhan berikut sebelum menjalankan aplikasi:

* Web server lokal (XAMPP / WAMP / Laragon)
* PHP versi 7.x atau lebih baru
* MySQL / MariaDB
* Browser modern (Chrome, Firefox, Edge, dll)

---

### Installing

Ikuti langkah-langkah berikut untuk menjalankan project secara lokal:

1. Clone repository

   ```bash
   git clone https://github.com/<username>/swift-skill.git
   ```

2. Masuk ke direktori project

   ```bash
   cd swift-skill
   ```

3. Pindahkan folder project ke direktori server lokal

   * Contoh (XAMPP): `C:/xampp/htdocs/swift-skill`

4. Import database

   * Buka phpMyAdmin
   * Buat database baru dengan nama `swift_skill`
   * Import file SQL dari folder `database/`

5. Konfigurasi koneksi database

   * Buka file konfigurasi (misalnya `config.php` atau `koneksi.php`)
   * Sesuaikan host, username, password, dan nama database

6. Jalankan aplikasi

   * Aktifkan Apache dan MySQL
   * Akses melalui browser: `http://localhost/swift-skill`

---

## Running the tests

Aplikasi ini tidak menggunakan *automated testing*. Pengujian dilakukan secara manual untuk memastikan setiap fitur berjalan dengan baik:

* Menambahkan data pendaftar kursus
* Menampilkan daftar pendaftar pada dashboard
* Mengedit data pendaftar
* Menghapus data pendaftar

---

### Break down into end to end tests

Pengujian dilakukan berdasarkan alur penggunaan sistem secara menyeluruh:

* Validasi input form pendaftaran
* Penyimpanan data ke database
* Penampilan data dari database ke dashboard
* Konsistensi data setelah proses edit dan hapus

---

### And coding style tests

Penulisan kode mengikuti standar dasar pemrograman web yang dipelajari di perkuliahan:

* Struktur file PHP yang terorganisir
* Pemisahan logika backend dan tampilan
* Penamaan variabel yang jelas dan konsisten
* Penggunaan CSS murni tanpa framework tambahan

---

## Deployment

Sistem Swift Skill ditujukan untuk penggunaan lokal sebagai media latihan dan evaluasi akademik.

Untuk deployment ke server produksi, dibutuhkan:

* Hosting yang mendukung PHP
* Database MySQL
* Konfigurasi keamanan tambahan (validasi & sanitasi input)

---

## Built With

Teknologi yang digunakan dalam pengembangan sistem ini:

* **PHP** – Backend logic & CRUD
* **MySQL** – Relational database
* **CSS** – Styling antarmuka
* **HTML** – Struktur halaman

---

## Contributing

Repository ini dibuat untuk keperluan pembelajaran dan persiapan ujian. Kontribusi tidak dibuka secara umum.

Namun, pengembangan pribadi dapat dilakukan dengan:

1. Fork repository
2. Buat branch baru (`feature/nama-fitur`)
3. Commit perubahan
4. Ajukan Pull Request

---

## Versioning

Versioning belum diterapkan secara formal. Riwayat perubahan dapat dilihat melalui commit Git.

---

## License

Project ini dibuat untuk keperluan pembelajaran dan akademik.

---

## Acknowledgments

* Dosen pengampu mata kuliah Teknologi Database
* Dokumentasi resmi PHP
* MySQL Reference Manual
