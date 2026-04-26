<?php

$jumlah_uang = 1387500;

echo "Jumlah tabungan yang diambil Ani = Rp. " . $jumlah_uang . "<br><br>";
echo "Rincian uang pecahan yang diperoleh:<br>";

// Hitung pecahan 100.000
$lembar_100rb = floor($jumlah_uang / 100000);
$jumlah_uang = $jumlah_uang % 100000;

// Hitung pecahan 50.000
$lembar_50rb = floor($jumlah_uang / 50000);
$jumlah_uang = $jumlah_uang % 50000;

// Hitung pecahan 20.000
$lembar_20rb = floor($jumlah_uang / 20000);
$jumlah_uang = $jumlah_uang % 20000;

// Hitung pecahan 10.000
$lembar_10rb = floor($jumlah_uang / 10000);
$jumlah_uang = $jumlah_uang % 10000;

// Hitung pecahan 5.000
$lembar_5rb = floor($jumlah_uang / 5000);
$jumlah_uang = $jumlah_uang % 5000;

// Hitung pecahan 2.000
$lembar_2rb = floor($jumlah_uang / 2000);
$jumlah_uang = $jumlah_uang % 2000;

// Hitung pecahan 500
$koin_500 = floor($jumlah_uang / 500);
$jumlah_uang = $jumlah_uang % 500;

// Menampilkan hasil
echo "Pecahan Rp. 100.000 = " . $lembar_100rb . " lembar<br>";
echo "Pecahan Rp. 50.000 = " . $lembar_50rb . " lembar<br>";
echo "Pecahan Rp. 20.000 = " . $lembar_20rb . " lembar<br>";
echo "Pecahan Rp. 10.000 = " . $lembar_10rb . " lembar<br>";
echo "Pecahan Rp. 5.000 = " . $lembar_5rb . " lembar<br>";
echo "Pecahan Rp. 2.000 = " . $lembar_2rb . " lembar<br>";
echo "Pecahan Rp. 500 = " . $koin_500 . " keping<br>";

?>
