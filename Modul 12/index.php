<?php
/** @var mysqli $con */ // @ts-ignore
include("koneksi.php");

// Hitung jumlah data untuk statistik (OOP)
$countDosen = $con->query("SELECT COUNT(*) as total FROM t_dosen")->fetch_assoc()['total'];
$countMhs = $con->query("SELECT COUNT(*) as total FROM t_mahasiswa")->fetch_assoc()['total'];
$countMK = $con->query("SELECT COUNT(*) as total FROM t_matakuliah")->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik (OOP)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIA <span>| Sistem Informasi Akademik (OOP)</span></div>
        <ul class="nav-links">
            <li><a href="index.php" class="active">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="view_mahasiswa.php">🎓 Mahasiswa</a></li>
            <li><a href="view_matakuliah.php">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Dashboard</h1>
        <p>Selamat datang di Sistem Informasi Akademik (OOP & Prepared Statements)</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid fade-in">
        <a href="viewdosen.php" class="stat-card dosen">
            <div class="stat-icon">👨‍🏫</div>
            <div class="stat-value"><?php echo $countDosen; ?></div>
            <div class="stat-label">Total Dosen</div>
        </a>
        <a href="view_mahasiswa.php" class="stat-card mahasiswa">
            <div class="stat-icon">🎓</div>
            <div class="stat-value"><?php echo $countMhs; ?></div>
            <div class="stat-label">Total Mahasiswa</div>
        </a>
        <a href="view_matakuliah.php" class="stat-card matakuliah">
            <div class="stat-icon">📚</div>
            <div class="stat-value"><?php echo $countMK; ?></div>
            <div class="stat-label">Total Mata Kuliah</div>
        </a>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik — Modul 12 PHP Database (OOP)
    </div>
</body>
</html>
