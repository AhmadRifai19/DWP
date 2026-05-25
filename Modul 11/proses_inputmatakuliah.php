<?php

/** @var mysqli $link */ // @ts-ignore

// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// mengecek apakah tombol input dari form telah diklik
if (isset($_POST['input'])) {

    // membuat variabel untuk menampung data dari form
    $kodeMk = $_POST['kodeMk'];
    $namaMK = $_POST['namaMK'];
    $sks = $_POST['sks'];
    $jam = $_POST['jam'];

    // jalankan query INSERT untuk menambah data ke database
    $query = "INSERT INTO t_matakuliah VALUES ('$kodeMk', '$namaMK', '$sks', '$jam')";
    $result = mysqli_query($link, $query);

    // periksa query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($link).
            " - ".mysqli_error($link));
    }
}

// melakukan redirect (mengalihkan) ke halaman view_matakuliah.php
header("location:view_matakuliah.php");
?>
