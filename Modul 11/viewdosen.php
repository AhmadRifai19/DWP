<?php

/** @var mysqli $link */ // @ts-ignore

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
                   value="<?php if(isset($_GET['kata_kunci'])) { echo $_GET['kata_kunci']; } ?>" 
                   style="padding: 5px; width: 200px;">
            <button type="submit" style="padding: 5px 10px;">Cari</button>
            
            <?php if(isset($_GET['kata_kunci'])) { ?>
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
      
      // LOGIKA PENCARIAN
      if (isset($_GET['kata_kunci'])) {
          $keyword = $_GET['kata_kunci'];
          $query = "SELECT * FROM t_dosen WHERE namaDosen LIKE '%$keyword%' ORDER BY idDosen ASC";
      } else {
          $query = "SELECT * FROM t_dosen ORDER BY idDosen ASC";
      }
      
      $result = mysqli_query($link, $query);

      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
      }

      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while ($data = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo "<td>$data[idDosen]</td>";
        echo "<td>$data[namaDosen]</td>";
        echo "<td>$data[noHP]</td>";
        echo '<td>
          <a href="editdosen.php?idDosen='.$data['idDosen'].'">Edit</a> /
          <a href="hapusdosen.php?idDosen='.$data['idDosen'].'"
            onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
          </td>';
        echo "</tr>";
      }
      ?>
    </table>
  </body>
</html>