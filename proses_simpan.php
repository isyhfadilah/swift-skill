<?php
$conn = mysqli_connect("localhost", "root", "", "kursus_coding", 8080);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['submit_daftar'])) {
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $paket   = $_POST['paket'];
    $tgl     = $_POST['tanggal'];
    $biaya   = $_POST['biaya'];
    $catatan = $_POST['catatan'];

    $query = "INSERT INTO pendaftaran_kursus (nama_siswa, email_siswa, paket_kursus, tanggal_mulai, biaya_kursus, catatan_khusus) 
              VALUES ('$nama', '$email', '$paket', '$tgl', '$biaya', '$catatan')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php?pesan=berhasil");
    } else {
        header("Location: index.php?pesan=gagal");
    }
}
?>