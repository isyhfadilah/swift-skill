<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Swift Skill</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <header>
            <h2>Learning with <span>Swift Skill</span></h2>
            <p>Tingkatkan keahlianmu bersama para mentor profesional di bidangnya.</p>
        </header>

        <?php if (isset($_GET['pesan'])): ?>
            <div class="alert-container">
                <?php if ($_GET['pesan'] == 'berhasil'): ?>
                    <div class="alert alert-success">
                        <span class="icon">✓</span> Selamat! Pendaftaran Anda berhasil disimpan.
                    </div>
                <?php elseif ($_GET['pesan'] == 'gagal'): ?>
                    <div class="alert alert-error">
                        <span class="icon">✕</span> Maaf, terjadi kesalahan saat menyimpan data.
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <form action="proses_simpan.php" method="POST" enctype="multipart/form-data">
            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="form-group">
                    <label>Email Aktif</label>
                    <input type="email" name="email" placeholder="contoh@email.com" required>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label>Paket Kursus</label>
                    <div class="select-wrapper">
                        <select name="paket" required>
                            <option value="" disabled selected>Pilih Paket</option>
                            <?php
                            include 'koneksi.php';

                            $query = "SELECT id, nama_paket FROM paket_kursus";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)): ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['nama_paket']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal" required>
                </div>
            </div>

            <div class="form-group">
                <label>Foto Profil / Identitas</label>
                <input type="file" name="foto" accept="image/*" required>
                <small style="color: var(--text-light); font-size: 11px;">Format: JPG, PNG, JPEG (Maks. 2MB)</small>
            </div>

            <div class="form-group">
                <label>Biaya Kursus (IDR)</label>
                <input type="number" name="biaya" placeholder="Contoh: 500000" required>
            </div>

            <div class="form-group">
                <label>Catatan Khusus</label>
                <textarea name="catatan" rows="3" placeholder="Tambahkan catatan jika ada..."></textarea>
            </div>

            <button type="submit" name="submit_daftar" class="btn-submit">
                <span>Daftar Sekarang</span>
            </button>
        </form>
    </div>

</body>

</html>