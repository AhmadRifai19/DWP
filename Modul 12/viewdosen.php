<?php
/** @var mysqli $con */ // @ts-ignore
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIA <span>| Sistem Informasi Akademik (OOP)</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php" class="active">👨‍🏫 Dosen</a></li>
            <li><a href="view_mahasiswa.php">🎓 Mahasiswa</a></li>
            <li><a href="view_matakuliah.php">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Daftar Dosen</h1>
        <p>Manajemen data dosen pada Sistem Informasi Akademik</p>
    </div>

    <!-- Main Content Card -->
    <div class="card fade-in">
        <div class="actions-bar">
            <!-- Search Bar -->
            <form method="GET" action="viewdosen.php" class="search-bar">
                <input type="text" name="kata_kunci" placeholder="Cari nama dosen..." 
                       value="<?php if(isset($_GET['kata_kunci'])) { echo htmlspecialchars($_GET['kata_kunci']); } ?>">
                <button type="submit">Cari</button>
                
                <?php if(isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') { ?>
                    <a href="viewdosen.php" class="btn btn-danger btn-sm" style="display: flex; align-items: center; justify-content: center; height: 100%; text-decoration: none;">Reset</a>
                <?php } ?>
            </form>

            <!-- Add Button -->
            <a href="input.php" class="btn btn-success">+ Tambah Dosen</a>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Dosen</th>
                        <th>No HP</th>
                        <th style="width: 160px; text-align: center;">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // LOGIKA PENCARIAN DENGAN PREPARED STATEMENTS (OOP)
                    if (isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') {
                        $keyword = $_GET['kata_kunci'];
                        $searchTerm = "%" . $keyword . "%"; 
                        
                        $stmt = $con->prepare("SELECT * FROM t_dosen WHERE namaDosen LIKE ? ORDER BY idDosen ASC");
                        $stmt->bind_param("s", $searchTerm);
                    } else {
                        $stmt = $con->prepare("SELECT * FROM t_dosen ORDER BY idDosen ASC");
                    }
                    
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if(!$result){
                      die ("Query Error: ".$con->errno." - ".$con->error);
                    }

                    if($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . htmlspecialchars($data['idDosen']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['namaDosen']) . "</td>"; 
                          echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                          
                          echo '<td style="text-align: center;">
                                  <div class="action-links" style="justify-content: center;">
                                    <a href="editdosen.php?idDosen='.$data['idDosen'].'" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapusdosen.php?idDosen='.$data['idDosen'].'" class="btn btn-danger btn-sm"
                                      onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
                                  </div>
                                </td>';
                          echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='empty-state' style='text-align:center;'>Data tidak ditemukan.</td></tr>";
                    }
                    $stmt->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik — Modul 12 PHP Database (OOP)
    </div>
</body>
</html>