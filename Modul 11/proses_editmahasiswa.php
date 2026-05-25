<?php

/** @var mysqli $link */ // @ts-ignore

// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("koneksi.php");

  // membuat variabel untuk menampung data dari form edit
  $npm = $_POST['npm'];
  $namaMhs = $_POST['namaMhs'];
  $prodi = $_POST['prodi'];
  $alamat = $_POST['alamat'];
  $noHP = $_POST['noHP'];

  //buat dan jalankan query UPDATE
  $query = "UPDATE t_mahasiswa SET npm = '$npm', namaMhs = '$namaMhs', prodi = '$prodi', alamat = '$alamat', noHP = '$noHP' WHERE npm = '$npm'";

  $result = mysqli_query($link, $query);

  //periksa hasil query apakah ada error
  if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link).
       " - ".mysqli_error($link));
  }
}

//lakukan redirect ke halaman viewdosen.php
header("location:view_mahasiswa.php");
?>