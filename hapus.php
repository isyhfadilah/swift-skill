<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM pendaftaran_kursus WHERE id = $id";

if (mysqli_query($conn, $query)) {
    header("Location: dashboard.php?pesan=hapus_berhasil");
} else {
    header("Location: dashboard.php?pesan=hapus_gagal");
}
