<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Swift Skill</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container-wide {
            max-width: 1200px;
            width: 100%;
        }

        .header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            background: white;
            border-radius: 15px;
            border: 1px solid var(--border);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th,
        td {
            padding: 16px;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
            text-align: left;
        }

        th {
            background-color: #f8fafc;
            color: var(--text-light);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-edit {
            background-color: #ecfdf5;
            color: var(--success);
            border: 1px solid #a7f3d0;
        }

        .btn-edit:hover {
            background-color: var(--success);
            color: white;
        }

        .btn-delete {
            background-color: #fef2f2;
            color: var(--error);
            border: 1px solid #fecaca;
        }

        .btn-delete:hover {
            background-color: var(--error);
            color: white;
        }

        .badge-paket {
            padding: 4px 10px;
            border-radius: 6px;
            background: #f1f5f9;
            font-size: 12px;
            color: var(--primary);
            font-weight: 600;
        }


        .icon {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container container-wide">
        <header class="header-flex">
            <div>
                <h2>Data Pendaftar <span>Swift Skill</span></h2>
                <p>Manajemen data siswa kursus coding.</p>
            </div>
            <a href="index.php" class="btn-submit" style="width: auto; padding: 10px 20px; text-decoration: none;">+ Tambah Baru</a>
        </header>

        <?php
        if (isset($_GET['pesan'])): ?>
            <div class="alert-container">
                <?php if ($_GET['pesan'] == 'edit_berhasil'): ?>
                    <div class="alert alert-success">
                        <span class="icon">✓</span> Data berhasil diperbarui.
                    </div>
                <?php elseif ($_GET['pesan'] == 'edit_gagal'): ?>
                    <div class="alert alert-error">
                        <span class="icon">✕</span> Terjadi kesalahan saat memperbarui data.
                    </div>
                <?php elseif ($_GET['pesan'] == 'hapus_berhasil'): ?>
                    <div class="alert alert-success">
                        <span class="icon">✓</span> Data berhasil dihapus.
                    </div>
                <?php elseif ($_GET['pesan'] == 'hapus_gagal'): ?>
                    <div class="alert alert-error">
                        <span class="icon">✕</span> Terjadi kesalahan saat menghapus data.
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Siswa</th>
                        <th>Paket</th>
                        <th>Tanggal Mulai</th>
                        <th>Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $query = "SELECT * FROM pendaftaran_kursus ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>#<?php echo $row['id']; ?></td>
                            <td>
                                <strong><?php echo htmlspecialchars($row['nama_siswa']); ?></strong><br>
                                <small style="color: var(--text-light)"><?php echo htmlspecialchars($row['email_siswa']); ?></small>
                            </td>
                            <td><span class="badge-paket"><?php echo $row['paket_kursus']; ?></span></td>
                            <td><?php echo date('d M Y', strtotime($row['tanggal_mulai'])); ?></td>
                            <td style="font-weight: 600;">Rp <?php echo number_format($row['biaya_kursus'], 0, ',', '.'); ?></td>
                            <td>
                                <div class="actions">
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-action btn-edit">Edit</a>
                                    <a href="hapus.php?id=<?php echo $row['id']; ?>"
                                        class="btn-action btn-delete"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>