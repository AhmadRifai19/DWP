<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIA <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="view_mahasiswa.php" class="active">🎓 Mahasiswa</a></li>
            <li><a href="view_matakuliah.php">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Tambah Mahasiswa</h1>
        <p>Input data mahasiswa baru pada Sistem Informasi Akademik</p>
    </div>

    <!-- Main Content Card -->
    <div class="card form-card fade-in">
        <div class="form-title">Form Data Mahasiswa</div>
        <form id="form_mahasiswa" action="proses_inputmahasiswa.php" method="post">
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" name="npm" id="npm" placeholder="Masukkan NPM" required>
            </div>
            
            <div class="form-group">
                <label for="namaMhs">Nama Mahasiswa</label>
                <input type="text" name="namaMhs" id="namaMhs" placeholder="Masukkan nama lengkap" required>
            </div>
            
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" name="prodi" id="prodi" placeholder="Contoh: Teknik Informatika" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat asal" required>
            </div>
            
            <div class="form-group">
                <label for="noHP">Nomor HP</label>
                <input type="text" name="noHP" id="noHP" placeholder="Contoh: 081234567890" required>
            </div>

            <div class="form-actions">
                <button type="submit" name="input" class="btn btn-primary" style="flex: 1; justify-content: center;">Simpan Data</button>
                <a href="view_mahasiswa.php" class="btn btn-danger" style="flex: 1; justify-content: center; text-decoration: none;">Batal</a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik — Modul 11 PHP Database (CRUD)
    </div>
</body>
</html>