<?php

/** @var mysqli $link */ // @ts-ignore

// buka koneksi dengan MySQL
include("koneksi.php");

//mengecek apakah di url ada GET kodeMk
if (isset($_GET["kodeMk"])) {

    // menyimpan variabel id dari url ke dalam variabel $kodeMk
    $kodeMk = $_GET["kodeMk"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM t_matakuliah WHERE kodeMk='$kodeMk' ";
    $hasil_query = mysqli_query($link, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_errno($link).
           " - ".mysqli_error($link));
    }
}
// melakukan redirect ke halaman view_matakuliah.php
header("location:view_matakuliah.php");
?>
