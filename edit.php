<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendaftaran - Swift Skill</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS tambahan untuk pratinjau foto di form edit */
        .current-photo {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px dashed var(--border);
        }

        .img-preview {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid var(--white);
            box-shadow: var(--shadow-sm);
        }

        .photo-info {
            font-size: 12px;
            color: var(--text-light);
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h2>Edit Pendaftaran <span>Swift Skill</span></h2>
            <p>Perbarui data pendaftaran siswa.</p>
        </header>

        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM pendaftaran_kursus WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
        ?>

        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama_siswa']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Email Aktif</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($data['email_siswa']); ?>" required>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label>Paket Kursus</label>
                    <div class="select-wrapper">
                        <select name="paket" required>
                            <?php
                            $queryPaket = "SELECT id, nama_paket FROM paket_kursus";
                            $resultPaket = mysqli_query($conn, $queryPaket);

                            while ($row = mysqli_fetch_assoc($resultPaket)):
                                $selected = ($row['nama_paket'] == $data['paket_kursus']) ? 'selected' : '';
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
                <label>Foto Profil</label>
                <div class="current-photo">
                    <?php if (!empty($data['foto']) && file_exists("uploads/" . $data['foto'])): ?>
                        <img src="uploads/<?php echo $data['foto']; ?>" class="img-preview">
                        <div class="photo-info">
                            Foto saat ini: <br><strong><?php echo $data['foto']; ?></strong>
                        </div>
                    <?php else: ?>
                        <div style="width:60px; height:60px; background:#e2e8f0; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:10px;">No Photo</div>
                        <div class="photo-info">Belum ada foto yang diunggah.</div>
                    <?php endif; ?>
                </div>
                <input type="file" name="foto" accept="image/*">
                <small style="color: var(--text-light); font-size: 11px;">*Kosongkan jika tidak ingin mengubah foto.</small>
            </div>

            <div class="form-group">
                <label>Catatan Khusus</label>
                <textarea name="catatan" rows="3"><?php echo htmlspecialchars($data['catatan_khusus']); ?></textarea>
            </div>

            <button type="submit" name="submit_edit" class="btn-submit">
                <span>Simpan Perubahan</span>
            </button>
            <a href="dashboard.php" style="display: block; text-align: center; margin-top: 15px; font-size: 13px; color: var(--text-light); text-decoration: none;">Batal & Kembali</a>
        </form>
    </div>
</body>

</html>