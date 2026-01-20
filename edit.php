<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <header>
            <h2>Edit Pendaftaran</h2>
            <p>Perbarui data pendaftaran siswa.</p>
        </header>

        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM pendaftaran_kursus WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
        ?>

        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="<?php echo $data['nama_siswa']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Email Aktif</label>
                    <input type="email" name="email" value="<?php echo $data['email_siswa']; ?>" required>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label>Paket Kursus</label>
                    <div class="select-wrapper">
                        <select name="paket" required>
                            <option value="" disabled>Pilih Paket</option>
                            <?php
                            $queryPaket = "SELECT id, nama_paket FROM paket_kursus";
                            $resultPaket = mysqli_query($conn, $queryPaket);

                            while ($row = mysqli_fetch_assoc($resultPaket)):
                                $selected = $row['nama_paket'] == $data['paket_kursus'] ? 'selected' : '';
                            ?>
                                <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>>
                                    <?php echo $row['nama_paket']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal" value="<?php echo $data['tanggal_mulai']; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label>Biaya Kursus (IDR)</label>
                <input type="number" name="biaya" value="<?php echo $data['biaya_kursus']; ?>" required>
            </div>

            <div class="form-group">
                <label>Catatan Khusus</label>
                <textarea name="catatan" rows="3" required><?php echo $data['catatan_khusus']; ?></textarea>
            </div>

            <button type="submit" class="btn-submit">
                <span>Simpan Perubahan</span>
            </button>
        </form>
    </div>
</body>

</html>