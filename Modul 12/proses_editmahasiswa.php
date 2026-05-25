<?php
if (isset($_POST['edit'])) {
  include("koneksi.php");
  $npm = $_POST['npm'];
  $namaMhs = $_POST['namaMhs'];
  $prodi = $_POST['prodi'];
  $alamat = $_POST['alamat'];
  $noHP = $_POST['noHP'];

  // 1. PREPARE: Kerangka query UPDATE menggunakan OOP & Prepared Statements
  $stmt = $con->prepare("UPDATE t_mahasiswa SET namaMhs = ?, prodi = ?, alamat = ?, noHP = ? WHERE npm = ?");
  
  // 2. BIND: Mengikat data. "sssss" artinya 5 Strings
  $stmt->bind_param("sssss", $namaMhs, $prodi, $alamat, $noHP, $npm);

  // 3. EXECUTE: Menjalankan query
  if(!$stmt->execute()) {
    die("Query gagal dijalankan: " . $stmt->errno . " - " . $stmt->error);
  }

  // Tutup statement
  $stmt->close();
}

// lakukan redirect ke halaman view_mahasiswa.php
header("location:view_mahasiswa.php");
exit;
?>