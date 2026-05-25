<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
    $namaDosen = $_POST['namaDosen'];
    $noHP = $_POST['noHP'];

    // 1. PREPARE: Kerangka query INSERT menggunakan OOP & Prepared Statements
    $stmt = $con->prepare("INSERT INTO t_dosen (idDosen, namaDosen, noHP) VALUES (NULL, ?, ?)");
    
    // 2. BIND: Mengikat data. "ss" artinya String, String
    $stmt->bind_param("ss", $namaDosen, $noHP);

    // 3. EXECUTE: Menjalankan query
    if(!$stmt->execute()) {
        die("Query gagal dijalankan: " . $stmt->errno . " - " . $stmt->error);
    }

    // Tutup statement
    $stmt->close();
}

// melakukan redirect (mengalihkan) ke halaman viewdosen.php
header("location:viewdosen.php");
exit;
?>