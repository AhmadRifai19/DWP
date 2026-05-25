<?php
/** @var mysqli $link */ // @ts-ignore
include 'koneksi.php';

// mengecek apakah di url ada nilai GET npm
if (isset($_GET['npm'])) {
    $npm = $_GET["npm"];

    // menampilkan data t_mahasiswa dari database yang mempunyai npm=$npm
    $query = "SELECT * FROM t_mahasiswa WHERE npm='$npm'";
    $result = mysqli_query($link, $query);
    
    if(!$result){
      die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
    }
    
    $data = mysqli_fetch_assoc($result);
    $npm = $data["npm"];
    $namaMhs = $data["namaMhs"];
    $prodi = $data["prodi"];
    $alamat = $data["alamat"];
    $noHP = $data["noHP"];
} else {
    header("location:view_mahasiswa.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
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
        <h1>Edit Mahasiswa</h1>
        <p>Perbarui informasi mahasiswa pada Sistem Informasi Akademik</p>
    </div>

    <!-- Main Content Card -->
    <div class="card form-card fade-in">
        <div class="form-title">Form Edit Mahasiswa</div>
        <form id="form_mahasiswa" action="proses_editmahasiswa.php" method="post">
            
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="hidden" name="npm" value="<?php echo htmlspecialchars($npm); ?>">
                <input type="text" name="npmDisabled" id="npmDisabled" value="<?php echo htmlspecialchars($npm); ?>" disabled>
            </div>
            
            <div class="form-group">
                <label for="namaMhs">Nama Mahasiswa</label>
                <input type="text" name="namaMhs" id="namaMhs" value="<?php echo htmlspecialchars($namaMhs); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" name="prodi" id="prodi" value="<?php echo htmlspecialchars($prodi); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="<?php echo htmlspecialchars($alamat); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="noHP">Nomor HP</label>
                <input type="text" name="noHP" id="noHP" value="<?php echo htmlspecialchars($noHP); ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" name="edit" class="btn btn-primary" style="flex: 1; justify-content: center;">Update Data</button>
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