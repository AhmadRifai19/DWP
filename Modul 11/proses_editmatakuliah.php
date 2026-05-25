<?php

/** @var mysqli $link */ // @ts-ignore

// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("koneksi.php");

  // membuat variabel untuk menampung data dari form edit
  $kodeMk = $_POST['kodeMk'];
  $namaMK = $_POST['namaMK'];
  $sks = $_POST['sks'];
  $jam = $_POST['jam'];

  //buat dan jalankan query UPDATE
  $query = "UPDATE t_matakuliah SET kodeMk = '$kodeMk', namaMK = '$namaMK', sks = '$sks', jam = '$jam' WHERE kodeMk = '$kodeMk'";

  $result = mysqli_query($link, $query);

  //periksa hasil query apakah ada error
  if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link).
       " - ".mysqli_error($link));
  }
}

//lakukan redirect ke halaman view_matakuliah.php
header("location:view_matakuliah.php");
?>
