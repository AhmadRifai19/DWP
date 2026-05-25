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
        <h1>Daftar Dosen</h1>
        
        <div class="header-actions">
            <form method="GET" action="viewdosen.php" class="search-form">
                <input type="text" name="kata_kunci" class="search-input" placeholder="Cari nama dosen..." 
                       value="<?php if(isset($_GET['kata_kunci'])) { echo htmlspecialchars($_GET['kata_kunci']); } ?>">
                <button type="submit" class="btn-search">Cari</button>
                
                <?php if(isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') { ?>
                    <a href="viewdosen.php" class="btn-reset">Reset</a>
                <?php } ?>
            </form>

            <a href="input.php" class="btn-add">+ Tambah Dosen</a>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Dosen</th>
                        <th>No HP</th>
                        <th style="text-align: center;">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // LOGIKA PENCARIAN DENGAN PREPARED STATEMENTS (OOP)
                    if (isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') {
                        $keyword = $_GET['kata_kunci'];
                        // Kita siapkan variabel pencariannya dengan menambahkan % di awal dan akhir
                        $searchTerm = "%" . $keyword . "%"; 
                        
                        // 1. Prepare: Menyiapkan kerangka query
                        $stmt = $con->prepare("SELECT * FROM t_dosen WHERE namaDosen LIKE ? ORDER BY idDosen ASC");
                        // 2. Bind: Memasukkan string pencarian ke tanda tanya (?)
                        $stmt->bind_param("s", $searchTerm);
                    } else {
                        // Jika tidak ada pencarian, tampilkan semua
                        $stmt = $con->prepare("SELECT * FROM t_dosen ORDER BY idDosen ASC");
                    }
                    
                    // 3. Execute: Menjalankan query
                    $stmt->execute();
                    
                    // 4. Get Result: Mengambil hasil dari eksekusi
                    $result = $stmt->get_result();

                    if(!$result){
                      die ("Query Error: ".$con->errno." - ".$con->error);
                    }

                    // 5. Fetch: Menampilkan data
                    if($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . htmlspecialchars($data['idDosen']) . "</td>";
                          
                          // Mengamankan output dengan htmlspecialchars untuk mencegah XSS
                          echo "<td>" . htmlspecialchars($data['namaDosen']) . "</td>"; 
                          echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                          
                          echo '<td style="text-align: center;">
                            <a href="editdosen.php?idDosen='.$data['idDosen'].'" class="btn-action btn-edit">Edit</a>
                            <a href="hapusdosen.php?idDosen='.$data['idDosen'].'" class="btn-action btn-delete"
                              onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
                            </td>';
                          echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' style='text-align:center; padding: 20px;'>Data tidak ditemukan.</td></tr>";
                    }
                    
                    // 6. Menutup statement
                    $stmt->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>