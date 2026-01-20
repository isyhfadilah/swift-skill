<?php
include 'koneksi.php';

if (isset($_POST['submit_daftar'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $paket = $_POST['paket'];
    $tanggal = $_POST['tanggal'];
    $biaya = $_POST['biaya'];
    $catatan = $_POST['catatan'];

    $foto_name = $_FILES['foto']['name'];
    $foto_tmp  = $_FILES['foto']['tmp_name'];
    $foto_size = $_FILES['foto']['size'];

    $ekstensi = pathinfo($foto_name, PATHINFO_EXTENSION);
    $nama_foto_baru = time() . '_' . $nama . '.' . $ekstensi;
    $folder_upload = "uploads/" . $nama_foto_baru;

    if ($foto_size > 2000000) {
        header("Location: index.php?pesan=gagal");
        exit;
    }

    if (move_uploaded_file($foto_tmp, $folder_upload)) {
        $q_paket = mysqli_query($conn, "SELECT nama_paket FROM paket_kursus WHERE id = '$paket'");
        $data_paket = mysqli_fetch_assoc($q_paket);
        $nama_paket_str = $data_paket['nama_paket'];

        $query = "INSERT INTO pendaftaran_kursus (nama_siswa, email_siswa, paket_kursus, tanggal_mulai, biaya_kursus, catatan_khusus, foto) 
                  VALUES ('$nama', '$email', '$nama_paket_str', '$tanggal', '$biaya', '$catatan', '$nama_foto_baru')";

        if (mysqli_query($conn, $query)) {
            header("Location: index.php?pesan=berhasil");
        } else {
            header("Location: index.php?pesan=gagal");
        }
    } else {
        header("Location: index.php?pesan=gagal");
    }
}
