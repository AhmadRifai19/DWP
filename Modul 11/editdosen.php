<?php
/** @var mysqli $link */ // @ts-ignore
include 'koneksi.php';

// mengecek apakah di url ada nilai GET idDosen
if (isset($_GET['idDosen'])) {
    // ambil nilai idDosen dari url dan disimpan dalam variabel $id
    $id = ($_GET["idDosen"]);

    // menampilkan data t_dosen dari database yang mempunyai idDosen=$id
    $query = "SELECT * FROM t_dosen WHERE idDosen='$id'";
    $result = mysqli_query($link, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
    }
    // mengambil data dari database dan membuat variabel-variabel utk menampung data
    $data = mysqli_fetch_assoc($result);
    $idDosen = $data["idDosen"];
    $namaDosen = $data["namaDosen"];
    $noHP = $data["noHP"];
} else {
    // apabila tidak ada data GET id pada akan di redirect ke viewdosen.php
    header("location:viewdosen.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIA <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php" class="active">👨‍🏫 Dosen</a></li>
            <li><a href="view_mahasiswa.php">🎓 Mahasiswa</a></li>
            <li><a href="view_matakuliah.php">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Edit Dosen</h1>
        <p>Perbarui informasi dosen pada Sistem Informasi Akademik</p>
    </div>

    <!-- Main Content Card -->
    <div class="card form-card fade-in">
        <div class="form-title">Form Edit Dosen</div>
        <form id="form_dosen" action="proses_editdosen.php" method="post">
            
            <div class="form-group">
                <label for="idDosen">ID</label>
                <input type="hidden" name="idDosen" value="<?php echo htmlspecialchars($idDosen); ?>">
                <input type="text" name="idDosenDisabled" id="idDosenDisabled" value="<?php echo htmlspecialchars($idDosen); ?>" disabled>
            </div>
            
            <div class="form-group">
                <label for="namaDosen">Nama Dosen</label>
                <input type="text" name="namaDosen" id="namaDosen" value="<?php echo htmlspecialchars($namaDosen); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="noHP">Nomor HP</label>
                <input type="text" name="noHP" id="noHP" value="<?php echo htmlspecialchars($noHP); ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" name="edit" class="btn btn-primary" style="flex: 1; justify-content: center;">Update Data</button>
                <a href="viewdosen.php" class="btn btn-danger" style="flex: 1; justify-content: center; text-decoration: none;">Batal</a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik — Modul 11 PHP Database (CRUD)
    </div>
</body>
</html>