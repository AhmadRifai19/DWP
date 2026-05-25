<?php
// Buka koneksi OOP
include("koneksi.php");

// Cek apakah ada GET npm di URL
if (isset($_GET["npm"])) {
    $npm = $_GET["npm"];

    // 1. PREPARE: Kerangka query hapus data
    $stmt = $con->prepare("DELETE FROM t_mahasiswa WHERE npm = ?");
    
    // 2. BIND: Mengikat data $npm sebagai String ("s")
    $stmt->bind_param("s", $npm);
    
    // 3. EXECUTE: Menjalankan query
    if(!$stmt->execute()) {
        die ("Gagal menghapus data: " . $con->errno . " - " . $con->error);
    }
    
    // Tutup statement
    $stmt->close();
}

// Redirect ke halaman view_mahasiswa.php
header("location:view_mahasiswa.php");
exit;
?>