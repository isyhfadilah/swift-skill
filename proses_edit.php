<?php
include 'koneksi.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $id_paket = $_POST['paket'];
    $tanggal = $_POST['tanggal'];
    $biaya = $_POST['biaya'];
    $catatan = $_POST['catatan'];

    $q_pkt = mysqli_query($conn, "SELECT nama_paket FROM paket_kursus WHERE id = '$id_paket'");
    $d_pkt = mysqli_fetch_assoc($q_pkt);
    $nama_paket = $d_pkt['nama_paket'];

    $query = "UPDATE pendaftaran_kursus SET 
                nama_siswa = '$nama', 
                email_siswa = '$email', 
                paket_kursus = '$nama_paket', 
                tanggal_mulai = '$tanggal', 
                biaya_kursus = '$biaya',
                catatan_khusus = '$catatan'";

    if (!empty($_FILES['foto']['name'])) {
        $foto_name = $_FILES['foto']['name'];
        $foto_tmp  = $_FILES['foto']['tmp_name'];
        $nama_foto_baru = time() . '_' . str_replace(' ', '_', $nama) . '.' . pathinfo($foto_name, PATHINFO_EXTENSION);

        if (move_uploaded_file($foto_tmp, "uploads/" . $nama_foto_baru)) {
            $q_lama = mysqli_query($conn, "SELECT foto FROM pendaftaran_kursus WHERE id = $id");
            $d_lama = mysqli_fetch_assoc($q_lama);
            if (!empty($d_lama['foto']) && file_exists("uploads/" . $d_lama['foto'])) {
                unlink("uploads/" . $d_lama['foto']);
            }

            $query .= ", foto = '$nama_foto_baru'";
        }
    }

    $query .= " WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php?pesan=edit_berhasil");
    } else {
        header("Location: dashboard.php?pesan=edit_gagal");
    }
}
