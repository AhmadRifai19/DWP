<?php
  include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      table{
        width: 840px;
        margin: auto;
      }
      h1{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>Tabel Dosen</h1>
    <center><a href="input.php">Input Data</a></center>
    <br/>
    
    <div style="width: 840px; margin: 0 auto 15px auto; text-align: right;">
        <form method="GET" action="viewdosen.php">
            <input type="text" name="kata_kunci" placeholder="Cari nama dosen..." 
                   value="<?php if(isset($_GET['kata_kunci'])) { echo htmlspecialchars($_GET['kata_kunci']); } ?>" 
                   style="padding: 5px; width: 200px;">
            <button type="submit" style="padding: 5px 10px;">Cari</button>
            
            <?php if(isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') { ?>
                <a href="viewdosen.php" style="padding: 6px 10px; background-color: #ef4444; color: white; text-decoration: none; font-size: 13px;">Reset</a>
            <?php } ?>
        </form>
    </div>
    
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Nama Dosen</th>
        <th>No HP</th>
        <th>Pilihan</th>
      </tr>
      <?php
      
      // LOGIKA PENCARIAN MENGGUNAKAN PREPARED STATEMENTS (OOP)
      if (isset($_GET['kata_kunci']) && $_GET['kata_kunci'] != '') {
          $keyword = $_GET['kata_kunci'];
          // Menyiapkan string pencarian dengan % di awal dan akhir
          $searchTerm = "%" . $keyword . "%";
          
          // 1. PREPARE
          $stmt = $con->prepare("SELECT * FROM t_dosen WHERE namaDosen LIKE ? ORDER BY idDosen ASC");
          // 2. BIND (s = string)
          $stmt->bind_param("s", $searchTerm);
      } else {
          // Jika tidak ada pencarian, tampilkan semua
          $stmt = $con->prepare("SELECT * FROM t_dosen ORDER BY idDosen ASC");
      }
      
      // 3. EXECUTE
      $stmt->execute();
      
      // 4. GET RESULT
      $result = $stmt->get_result();

      // Mengecek apakah ada error ketika menjalankan query menggunakan format OOP
      if(!$result){
        die ("Query Error: " . $con->errno . " - " . $con->error);
      }

      // 5. Menampilkan hasil dengan perulangan
      // Cek apakah datanya ada
      if ($result->num_rows > 0) {
          while ($data = $result->fetch_assoc())
          {
            echo "<tr>";
            echo "<td>" . $data['idDosen'] . "</td>";
            
            // htmlspecialchars digunakan untuk memfilter data agar bebas dari injeksi script HTML
            echo "<td>" . htmlspecialchars($data['namaDosen']) . "</td>";
            echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
            
            echo '<td>
              <a href="editdosen.php?idDosen='.$data['idDosen'].'">Edit</a> /
              <a href="hapusdosen.php?idDosen='.$data['idDosen'].'"
                onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
              </td>';
            echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='4' style='text-align:center;'>Data tidak ditemukan.</td></tr>";
      }
      
      // 6. Menutup statement
      $stmt->close();
      ?>
    </table>
  </body>
</html>