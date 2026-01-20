CREATE DATABASE kursus_coding;
USE kursus_coding;

CREATE TABLE pendaftaran_kursus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_siswa VARCHAR(100) NOT NULL,
    email_siswa VARCHAR(100) NOT NULL,
    paket_kursus ENUM('Web Beginner', 'Android Pro', 'Data Science') NOT NULL,
    tanggal_mulai DATE NOT NULL,
    biaya_kursus DECIMAL(10, 2) NOT NULL,
    catatan_khusus TEXT,
    status_input TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);