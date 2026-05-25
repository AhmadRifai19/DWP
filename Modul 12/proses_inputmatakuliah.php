<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
    $kodeMk = $_POST['kodeMk'];
    $namaMK = $_POST['namaMK'];
    $sks = $_POST['sks'];
    $jam = $_POST['jam'];

    // 1. PREPARE: Kerangka query INSERT menggunakan OOP & Prepared Statements
    $stmt = $con->prepare("INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES (?, ?, ?, ?)");
    
    // 2. BIND: Mengikat data. "ssii" artinya String, String, Integer, Integer
    $stmt->bind_param("ssii", $kodeMk, $namaMK, $sks, $jam);

    // 3. EXECUTE: Menjalankan query
    if(!$stmt->execute()) {
        die("Query gagal dijalankan: " . $stmt->errno . " - " . $stmt->error);
    }

    // Tutup statement
    $stmt->close();
}

// melakukan redirect (mengalihkan) ke halaman view_matakuliah.php
header("location:view_matakuliah.php");
exit;
?>
