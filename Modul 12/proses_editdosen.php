<?php
if (isset($_POST['edit'])) {
  include("koneksi.php");

  $id = $_POST['idDosen'];
  $namaDosen = $_POST['namaDosen'];
  $noHP = $_POST['noHP'];

  // 1. PREPARE: Kerangka query UPDATE menggunakan OOP & Prepared Statements
  $stmt = $con->prepare("UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ?");
  
  // 2. BIND: Mengikat data. "ssi" artinya String, String, Integer
  $stmt->bind_param("ssi", $namaDosen, $noHP, $id);

  // 3. EXECUTE: Menjalankan query
  if(!$stmt->execute()) {
    die ("Query gagal dijalankan: " . $stmt->errno . " - " . $stmt->error);
  }

  $stmt->close();
}

header("location:viewdosen.php");
exit;
?>