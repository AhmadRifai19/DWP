<?php

/** @var mysqli $link */ // @ts-ignore

  // memanggil file koneksi.php untuk membuat koneksi
  include 'koneksi.php';

  // mengecek apakah di url ada nilai GET idDosen
  if (isset($_GET['npm'])) {
    // ambil nilai npm dari url dan disimpan dalam variabel $npm
    $npm = ($_GET["npm"]);

    // menampilkan data t_mahasiswa dari database yang mempunyai npm=$npm
    $query = "SELECT * FROM t_mahasiswa WHERE npm='$npm'";
    $result = mysqli_query($link, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
    }
    // mengambil data dari database dan membuat variabel-variabel utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $npm = $data["npm"];
    $namaMhs = $data["namaMhs"];
    $prodi = $data["prodi"];
    $alamat = $data["alamat"];
    $noHP = $data["noHP"];
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    header("location:view_mahasiswa.php");
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', 'Segoe UI', sans-serif; background-color: #f3f4f6; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .card { background: #ffffff; width: 100%; max-width: 450px; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
        h1 { text-align: center; font-size: 24px; font-weight: 600; margin-bottom: 24px; color: #1f2937; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-size: 14px; font-weight: 500; margin-bottom: 6px; color: #4b5563; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; transition: all 0.2s ease-in-out; }
        input[type="text"]:focus, input[type="number"]:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2); }
        input[disabled] { background-color: #e5e7eb; cursor: not-allowed; color: #6b7280; }
        .btn-submit { width: 100%; padding: 12px; background-color: #2563eb; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; transition: background-color 0.2s; margin-top: 10px; }
        .btn-submit:hover { background-color: #1d4ed8; }
        .back-link { display: block; text-align: center; margin-top: 16px; font-size: 14px; color: #6b7280; text-decoration: none; }
        .back-link:hover { color: #374151; text-decoration: underline; }
    </style>
</head>
<body>

    <div class="card">
        <h1>Edit Mahasiswa</h1>
        <form id="form_mahasiswa" action="proses_editmahasiswa.php" method="post">
            
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="hidden" name="npm" value="<?php echo $npm; ?>">
                <input type="text" name="npmDisabled" id="npmDisabled" value="<?php echo $npm; ?>" disabled>
            </div>
            
            <div class="form-group">
                <label for="namaMhs">Nama Mahasiswa</label>
                <input type="text" name="namaMhs" id="namaMhs" value="<?php echo $namaMhs; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" name="prodi" id="prodi" value="<?php echo $prodi; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="<?php echo $alamat; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="noHP">Nomor HP</label>
                <input type="text" name="noHP" id="noHP" value="<?php echo $noHP; ?>" required>
            </div>

            <button type="submit" name="edit" class="btn-submit">Update Data</button>
            <a href="view_mahasiswa.php" class="back-link">Batal dan Kembali</a>
        </form>
    </div>

</body>
</html>