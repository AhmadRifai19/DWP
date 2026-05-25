<?php
/** @var mysqli $link */ // @ts-ignore
include 'koneksi.php'; // memanggil file koneksi.php
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Matakuliah</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f3f4f6; color: #333; padding: 40px 20px; }
        .container { max-width: 1000px; margin: auto; background: #ffffff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
        h1 { text-align: center; font-size: 26px; font-weight: 600; color: #1f2937; margin-bottom: 20px; }
        .header-actions { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px;}
        .search-form { display: flex; gap: 8px; }
        .search-input { padding: 9px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; width: 250px; outline: none; transition: border-color 0.2s; }
        .search-input:focus { border-color: #3b82f6; }
        .btn-search { padding: 9px 15px; background-color: #4b5563; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; transition: background 0.2s; }
        .btn-search:hover { background-color: #374151; }
        .btn-reset { padding: 9px 15px; background-color: #ef4444; color: white; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 13.5px; transition: background 0.2s; }
        .btn-reset:hover { background-color: #dc2626; }

        .btn-add { padding: 10px 20px; background-color: #2563eb; color: white; text-decoration: none; border-radius: 6px; font-size: 14px; font-weight: 600; transition: background-color 0.2s; }
        .btn-add:hover { background-color: #1d4ed8; }
        .table-responsive { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: 14px; }
        th { background-color: #f9fafb; color: #4b5563; font-weight: 600; padding: 14px 16px; border-bottom: 2px solid #e5e7eb; }
        td { padding: 14px 16px; border-bottom: 1px solid #edf2f7; color: #4a5568; }
        tr:hover { background-color: #f8fafc; }
        .btn-action { display: inline-block; padding: 6px 12px; font-size: 12px; font-weight: 500; text-decoration: none; border-radius: 4px; transition: all 0.2s; }
        .btn-edit { background-color: #fef3c7; color: #d97706; }
        .btn-edit:hover { background-color: #fde68a; }
        .btn-delete { background-color: #fee2e2; color: #dc2626; margin-left: 5px; }
        .btn-delete:hover { background-color: #fca5a5; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Daftar Matakuliah</h1>
        
        <div class="header-actions">
            <form method="GET" action="view_matakuliah.php" class="search-form">
                <input type="text" name="kata_kunci" class="search-input" placeholder="Cari nama matakuliah..." 
                       value="<?php if(isset($_GET['kata_kunci'])) { echo $_GET['kata_kunci']; } ?>">
                <button type="submit" class="btn-search">Cari</button>
                
                <?php if(isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') { ?>
                    <a href="view_matakuliah.php" class="btn-reset">Reset</a>
                <?php } ?>
            </form>

            <a href="input_matakuliah.php" class="btn-add">+ Tambah Matakuliah</a>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Kode MK</th>
                        <th>Nama Matakuliah</th>
                        <th>SKS</th>
                        <th>Jam</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Logika Pencarian
                    if (isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') {
                        $keyword = $_GET['kata_kunci'];
                        $query = "SELECT * FROM t_matakuliah WHERE namaMK LIKE '%$keyword%' ORDER BY kodeMK ASC";
                    } else {
                        $query = "SELECT * FROM t_matakuliah ORDER BY kodeMK ASC";
                    }
                    
                    $result = mysqli_query($link, $query);

                    if(!$result){
                        die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
                    }

                    // Tampilkan data dengan perulangan
                    if(mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><strong>{$data['kodeMK']}</strong></td>";
                            echo "<td>{$data['namaMK']}</td>";
                            echo "<td>{$data['sks']}</td>";
                            echo "<td>{$data['jam']}</td>";
                            echo '<td style="text-align: center;">
                                    <a href="editmatakuliah.php?kodeMk='.$data['kodeMK'].'" class="btn-action btn-edit">Edit</a>
                                    <a href="hapusmatakuliah.php?kodeMk='.$data['kodeMK'].'" class="btn-action btn-delete" 
                                       onclick="return confirm(\'Apakah Anda yakin ingin menghapus data matakuliah ini?\')">Hapus</a>
                                  </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' style='text-align:center; padding: 20px;'>Data matakuliah tidak ditemukan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>