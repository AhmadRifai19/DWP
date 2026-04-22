<?php

$namaBuah = array("Nanas", "Mangga", "jeruk", "Apel", "Melon", "Manggis");
echo "saya suka " . $namaBuah[0] . ", " . $namaBuah[1] . " dan " . $namaBuah[2] . ".<br>";

// tampikan Mangga
echo "saya suka " . $namaBuah[1] . "<br>";
// tampikan Jeruk
echo "saya suka " . $namaBuah[2] . "<br>";
// tampikan Apel
echo "saya suka " . $namaBuah[3] . "<br>";
// tampikan Melon
echo "saya suka " . $namaBuah[4] . "<br>";

echo "<br>";

// array dengan spesifik index
$umur = array("Andi"=>"35 Tahun", "Ben"=>"37 Tahun", "Joe"=>"43 Tahun");
$umur['ahmad']="50 Tahun";

// tampikan semua umur
foreach ($umur as $nama => $usia) {
    echo "Umur " . $nama . " adalah " . $usia . "<br>";
}

?>
