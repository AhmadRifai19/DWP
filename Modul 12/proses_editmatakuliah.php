<?php
if (isset($_POST['edit'])) {
  include("koneksi.php");
  $kodeMk = $_POST['kodeMk'];
  $namaMK = $_POST['namaMK'];
  $sks = $_POST['sks'];
  $jam = $_POST['jam'];

  // 1. PREPARE: Kerangka query UPDATE menggunakan OOP & Prepared Statements
  $stmt = $con->prepare("UPDATE t_matakuliah SET namaMK = ?, sks = ?, jam = ? WHERE kodeMK = ?");
  
  // 2. BIND: Mengikat data. "siis" artinya String, Integer, Integer, String
  $stmt->bind_param("siis", $namaMK, $sks, $jam, $kodeMk);

  // 3. EXECUTE: Menjalankan query
  if(!$stmt->execute()) {
    die("Query gagal dijalankan: " . $stmt->errno . " - " . $stmt->error);
  }

  // Tutup statement
  $stmt->close();
}

// lakukan redirect ke halaman view_matakuliah.php
header("location:view_matakuliah.php");
exit;
?>
