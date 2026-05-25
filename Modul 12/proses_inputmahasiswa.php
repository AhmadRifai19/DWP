<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
    $npm = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];

    // 1. PREPARE: Kerangka query INSERT menggunakan OOP & Prepared Statements
    $stmt = $con->prepare("INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES (?, ?, ?, ?, ?)");
    
    // 2. BIND: Mengikat data. "sssss" artinya 5 Strings
    $stmt->bind_param("sssss", $npm, $namaMhs, $prodi, $alamat, $noHP);

    // 3. EXECUTE: Menjalankan query
    if(!$stmt->execute()) {
        die("Query gagal dijalankan: " . $stmt->errno . " - " . $stmt->error);
    }

    // Tutup statement
    $stmt->close();
}

// melakukan redirect (mengalihkan) ke halaman view_mahasiswa.php
header("location:view_mahasiswa.php");
exit;
?>