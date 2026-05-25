<?php
// Buka koneksi OOP
include("koneksi.php");

// Cek apakah ada GET kodeMk di URL
if (isset($_GET["kodeMk"])) {
    $kodeMk = $_GET["kodeMk"];

    // 1. PREPARE: Kerangka query hapus data
    $stmt = $con->prepare("DELETE FROM t_matakuliah WHERE kodeMK = ?");
    
    // 2. BIND: Mengikat data $kodeMk sebagai String ("s")
    $stmt->bind_param("s", $kodeMk);
    
    // 3. EXECUTE: Menjalankan query
    if(!$stmt->execute()) {
        die ("Gagal menghapus data: " . $con->errno . " - " . $con->error);
    }
    
    // Tutup statement
    $stmt->close();
}

// Redirect ke halaman view_matakuliah.php
header("location:view_matakuliah.php");
exit;
?>
