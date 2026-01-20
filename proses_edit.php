<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$paket = $_POST['paket'];
$tanggal = $_POST['tanggal'];
$biaya = $_POST['biaya'];
$catatan = $_POST['catatan'];

$query = "UPDATE pendaftaran_kursus SET 
            nama_siswa = '$nama', 
            email_siswa = '$email', 
            paket_kursus = '$paket', 
            tanggal_mulai = '$tanggal', 
            biaya_kursus = '$biaya', 
            catatan_khusus = '$catatan' 
          WHERE id = $id";

if (mysqli_query($conn, $query)) {
    header("Location: dashboard.php?pesan=edit_berhasil");
} else {
    header("Location: dashboard.php?pesan=edit_gagal");
}
