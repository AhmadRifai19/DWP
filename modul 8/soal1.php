<?php

$gaji_pokok = 3250000;
$tunjangan = 1200000;
$pajak_persen = 0.10; // 10%

$gaji_kotor = $gaji_pokok + $tunjangan;
$pajak_penghasilan = $gaji_kotor * $pajak_persen;
$gaji_bersih = $gaji_kotor - $pajak_penghasilan;

echo "Perhitungan Gaji Obi Bulan Ini:<br>";
echo "Gaji Pokok = Rp. " . $gaji_pokok . "<br>";
echo "Tunjangan Jabatan = Rp. " . $tunjangan . "<br>";
echo "Gaji Kotor = Rp. " . $gaji_kotor . "<br>";
echo "Potongan Pajak (10%) = Rp. " . $pajak_penghasilan . "<br>";
echo "Total Gaji Bersih yang diterima = Rp. " . $gaji_bersih;

?>
