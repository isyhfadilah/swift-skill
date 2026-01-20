<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kursus Coding</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h2>Daftar Kursus IT</h2>

        <?php if(isset($_GET['pesan'])): ?>
        <?php if($_GET['pesan'] == 'berhasil'): ?>
        <div class="alert alert-success">Selamat! Pendaftaran Anda berhasil disimpan.</div>
        <?php elseif($_GET['pesan'] == 'gagal'): ?>
        <div class="alert alert-error">Maaf, terjadi kesalahan saat menyimpan data.</div>
        <?php endif; ?>
        <?php endif; ?>

        <form action="proses_simpan.php" method="POST">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Paket Kursus</label>
                <select name="paket" required>
                    <option value="">-- Pilih Paket --</option>
                    <option value="Web Beginner">Web Beginner</option>
                    <option value="Android Pro">Android Pro</option>
                    <option value="Data Science">Data Science</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal" required>
            </div>

            <div class="form-group">
                <label>Biaya Kursus (Rp)</label>
                <input type="number" name="biaya" required>
            </div>

            <div class="form-group">
                <label>Catatan Khusus</label>
                <textarea name="catatan" rows="3"></textarea>
            </div>

            <button type="submit" name="submit_daftar">Daftar Sekarang</button>
        </form>
    </div>

</body>

</html>