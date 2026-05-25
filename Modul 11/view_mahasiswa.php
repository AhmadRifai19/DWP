<?php
/** @var mysqli $link */ // @ts-ignore
include 'koneksi.php'; // memanggil file koneksi.php
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Mahasiswa</title>
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
        <h1>Daftar Mahasiswa</h1>
        <p>Manajemen data mahasiswa pada Sistem Informasi Akademik</p>
    </div>

    <!-- Main Content Card -->
    <div class="card fade-in">
        <div class="actions-bar">
            <!-- Search Bar -->
            <form method="GET" action="view_mahasiswa.php" class="search-bar">
                <input type="text" name="kata_kunci" placeholder="Cari nama mahasiswa..." 
                       value="<?php if(isset($_GET['kata_kunci'])) { echo htmlspecialchars($_GET['kata_kunci']); } ?>">
                <button type="submit">Cari</button>
                
                <?php if(isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') { ?>
                    <a href="view_mahasiswa.php" class="btn btn-danger btn-sm" style="display: flex; align-items: center; justify-content: center; height: 100%; text-decoration: none;">Reset</a>
                <?php } ?>
            </form>

            <!-- Add Button -->
            <a href="input_mahasiswa.php" class="btn btn-success">+ Tambah Mahasiswa</a>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th style="width: 160px; text-align: center;">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // LOGIKA PENCARIAN (Prosedural Modul 11)
                    if (isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') {
                        $keyword = $_GET['kata_kunci'];
                        $query = "SELECT * FROM t_mahasiswa WHERE namaMhs LIKE '%$keyword%' ORDER BY npm ASC";
                    } else {
                        $query = "SELECT * FROM t_mahasiswa ORDER BY npm ASC";
                    }

                    $result = mysqli_query($link, $query);

                    if(!$result){
                        die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
                    }

                    // Tampilkan data dengan perulangan
                    if(mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><strong>" . htmlspecialchars($data['npm']) . "</strong></td>";
                            echo "<td>" . htmlspecialchars($data['namaMhs']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['prodi']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                            echo '<td style="text-align: center;">
                                    <div class="action-links" style="justify-content: center;">
                                        <a href="editmahasiswa.php?npm='.$data['npm'].'" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="hapusmahasiswa.php?npm='.$data['npm'].'" class="btn btn-danger btn-sm" 
                                           onclick="return confirm(\'Apakah Anda yakin ingin menghapus data mahasiswa ini?\')">Hapus</a>
                                    </div>
                                  </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='empty-state' style='text-align:center;'>Data mahasiswa tidak ditemukan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik — Modul 11 PHP Database (CRUD)
    </div>
</body>
</html>