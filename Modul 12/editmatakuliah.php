<?php
/** @var mysqli $con */ // @ts-ignore
include 'koneksi.php';

if (isset($_GET['kodeMk'])) {
    $kodeMk = $_GET["kodeMk"];
    $stmt = $con->prepare("SELECT * FROM t_matakuliah WHERE kodeMK = ?");
    $stmt->bind_param("s", $kodeMk);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Query Error: " . $con->errno . " - " . $con->error);
    }

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $kodeMk = $data["kodeMK"];
        $namaMK = $data["namaMK"];
        $sks = $data["sks"];
        $jam = $data["jam"];
    } else {
        header("location:view_matakuliah.php");
        exit;
    }
    $stmt->close();
} else {
    header("location:view_matakuliah.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Matakuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIA <span>| Sistem Informasi Akademik (OOP)</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="view_mahasiswa.php">🎓 Mahasiswa</a></li>
            <li><a href="view_matakuliah.php" class="active">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Edit Matakuliah</h1>
        <p>Perbarui informasi mata kuliah pada Sistem Informasi Akademik</p>
    </div>

    <!-- Main Content Card -->
    <div class="card form-card fade-in">
        <div class="form-title">Form Edit Matakuliah</div>
        <form id="form_matakuliah" action="proses_editmatakuliah.php" method="post">
            
            <div class="form-group">
                <label for="kodeMk">Kode MK</label>
                <input type="hidden" name="kodeMk" value="<?php echo htmlspecialchars($kodeMk); ?>">
                <input type="text" name="kodeMkDisabled" id="kodeMkDisabled" value="<?php echo htmlspecialchars($kodeMk); ?>" disabled>
            </div>
            
            <div class="form-group">
                <label for="namaMK">Nama Matakuliah</label>
                <input type="text" name="namaMK" id="namaMK" value="<?php echo htmlspecialchars($namaMK); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="sks">SKS</label>
                <input type="number" name="sks" id="sks" value="<?php echo htmlspecialchars($sks); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="number" name="jam" id="jam" value="<?php echo htmlspecialchars($jam); ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" name="edit" class="btn btn-primary" style="flex: 1; justify-content: center;">Update Data</button>
                <a href="view_matakuliah.php" class="btn btn-danger" style="flex: 1; justify-content: center; text-decoration: none;">Batal</a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik — Modul 12 PHP Database (OOP)
    </div>
</body>
</html>
