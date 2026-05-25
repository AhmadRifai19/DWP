<?php
/** @var mysqli $con */ // @ts-ignore
include 'koneksi.php'; // memanggil file koneksi.php
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Mahasiswa</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6; /* Latar belakang abu terang */
            color: #333;
            padding: 40px 20px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        h1 {
            text-align: center;
            font-size: 26px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 20px;
        }
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .search-form { display: flex; gap: 8px; }
        .search-input { padding: 9px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; width: 250px; outline: none; transition: border-color 0.2s; }
        .search-input:focus { border-color: #3b82f6; }
        .btn-search { padding: 9px 15px; background-color: #4b5563; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; transition: background 0.2s; }
        .btn-search:hover { background-color: #374151; }
        .btn-reset { padding: 9px 15px; background-color: #ef4444; color: white; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 13.5px; transition: background 0.2s; display: flex; align-items: center;}
        .btn-reset:hover { background-color: #dc2626; }

        .btn-add {
            padding: 10px 20px;
            background-color: #2563eb; /* Biru modern */
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            transition: background-color 0.2s;
        }
        .btn-add:hover {
            background-color: #1d4ed8;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f9fafb;
            color: #4b5563;
            font-weight: 600;
            padding: 14px 16px;
            border-bottom: 2px solid #e5e7eb;
        }
        td {
            padding: 14px 16px;
            border-bottom: 1px solid #edf2f7;
            color: #4a5568;
        }
        tr:hover {
            background-color: #f8fafc;
        }
        .btn-action {
            display: inline-block;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.2s;
        }
        .btn-edit {
            background-color: #fef3c7;
            color: #d97706;
        }
        .btn-edit:hover {
            background-color: #fde68a;
        }
        .btn-delete {
            background-color: #fee2e2;
            color: #dc2626;
            margin-left: 5px;
        }
        .btn-delete:hover {
            background-color: #fca5a5;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        
        <div class="header-actions">
            <form method="GET" action="view_mahasiswa.php" class="search-form">
                <input type="text" name="kata_kunci" class="search-input" placeholder="Cari nama mahasiswa..." 
                       value="<?php if(isset($_GET['kata_kunci'])) { echo htmlspecialchars($_GET['kata_kunci']); } ?>">
                <button type="submit" class="btn-search">Cari</button>
                
                <?php if(isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') { ?>
                    <a href="view_mahasiswa.php" class="btn-reset">Reset</a>
                <?php } ?>
            </form>

            <a href="input_mahasiswa.php" class="btn-add">+ Tambah Mahasiswa</a>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // LOGIKA PENCARIAN DENGAN PREPARED STATEMENTS (OOP)
                    if (isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') {
                        $keyword = $_GET['kata_kunci'];
                        $searchTerm = "%" . $keyword . "%";
                        $stmt = $con->prepare("SELECT * FROM t_mahasiswa WHERE namaMhs LIKE ? ORDER BY npm ASC");
                        $stmt->bind_param("s", $searchTerm);
                    } else {
                        $stmt = $con->prepare("SELECT * FROM t_mahasiswa ORDER BY npm ASC");
                    }

                    $stmt->execute();
                    $result = $stmt->get_result();

                    if(!$result){
                        die ("Query Error: " . $con->errno . " - " . $con->error);
                    }

                    // Tampilkan data dengan perulangan
                    if($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><strong>" . htmlspecialchars($data['npm']) . "</strong></td>";
                            echo "<td>" . htmlspecialchars($data['namaMhs']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['prodi']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                            echo '<td style="text-align: center;">
                                    <a href="editmahasiswa.php?npm='.$data['npm'].'" class="btn-action btn-edit">Edit</a>
                                    <a href="hapusmahasiswa.php?npm='.$data['npm'].'" class="btn-action btn-delete" 
                                       onclick="return confirm(\'Apakah Anda yakin ingin menghapus data mahasiswa ini?\')">Hapus</a>
                                  </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' style='text-align:center; padding: 20px;'>Data mahasiswa tidak ditemukan.</td></tr>";
                    }
                    $stmt->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>