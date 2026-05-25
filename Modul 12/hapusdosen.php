<?php
// Buka koneksi OOP
include("koneksi.php");

// Cek apakah ada GET idDosen di URL
if (isset($_GET["idDosen"])) {
    $id = $_GET["idDosen"];

    // 1. PREPARE: Kerangka query hapus data
    $stmt = $con->prepare("DELETE FROM t_dosen WHERE idDosen = ?");
    
    // 2. BIND: Mengikat data $id sebagai Integer ("i")
    $stmt->bind_param("i", $id);
    
    // 3. EXECUTE: Menjalankan query
    if(!$stmt->execute()) {
        die ("Gagal menghapus data: " . $con->errno . " - " . $con->error);
    }
    
    // Tutup statement
    $stmt->close();
}

// Redirect ke halaman viewdosen.php
header("location:viewdosen.php");
exit;
?>