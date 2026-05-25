<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Matakuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIA <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="view_mahasiswa.php">🎓 Mahasiswa</a></li>
            <li><a href="view_matakuliah.php" class="active">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Tambah Matakuliah</h1>
        <p>Input data mata kuliah baru pada Sistem Informasi Akademik</p>
    </div>

    <!-- Main Content Card -->
    <div class="card form-card fade-in">
        <div class="form-title">Form Data Matakuliah</div>
        <form id="form_matakuliah" action="proses_inputmatakuliah.php" method="post">
            <div class="form-group">
                <label for="kodeMk">Kode MK</label>
                <input type="text" name="kodeMk" id="kodeMk" placeholder="Masukkan Kode MK" required>
            </div>
            
            <div class="form-group">
                <label for="namaMK">Nama Matakuliah</label>
                <input type="text" name="namaMK" id="namaMK" placeholder="Masukkan Nama Matakuliah" required>
            </div>
            
            <div class="form-group">
                <label for="sks">SKS</label>
                <input type="number" name="sks" id="sks" placeholder="Contoh: 3" required>
            </div>
            
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="number" name="jam" id="jam" placeholder="Masukkan Total Jam" required>
            </div>

            <div class="form-actions">
                <button type="submit" name="input" class="btn btn-primary" style="flex: 1; justify-content: center;">Simpan Data</button>
                <a href="view_matakuliah.php" class="btn btn-danger" style="flex: 1; justify-content: center; text-decoration: none;">Batal</a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik — Modul 11 PHP Database (CRUD)
    </div>
</body>
</html>
