<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query_foto = mysqli_query($conn, "SELECT foto FROM pendaftaran_kursus WHERE id = $id");
    $data = mysqli_fetch_assoc($query_foto);

    if (!empty($data['foto'])) {
        $path_foto = "uploads/" . $data['foto'];
        if (file_exists($path_foto)) {
            unlink($path_foto);
        }
    }

    $query_hapus = "DELETE FROM pendaftaran_kursus WHERE id = $id";

    if (mysqli_query($conn, $query_hapus)) {
        header("Location: dashboard.php?pesan=hapus_berhasil");
    } else {
        header("Location: dashboard.php?pesan=hapus_gagal");
    }
} else {
    header("Location: dashboard.php");
}
