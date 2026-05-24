<?php

require_once ('kelas/Manusia.php');

// memasukkan Data
$andi = new Manusia();
$andi->setNama("Andi Pratama");
$andi->setUmur(25);

$budi = new Manusia();
$budi->setNama("Budi Santoso");
$budi->setUmur(30);

echo($andi->getNama());
echo("<br>");


//Tampilkan nama lengkap  budi
echo($budi->getNama());
echo("<br>");

//Tambah dengan identitas saya
$saya = new Manusia();
$saya->setNama("Ahmad Rifai");
$saya->setUmur(20);
echo($saya->getNama() . " (Umur: " . $saya->getUmur() . ")");
echo("<br>");

echo $andi->tampilkanNIK();
echo("<br><br>");

/* File Manusia.php berfungsi sebagai Class (cetak biru) yang mendefinisikan struktur properti dan method dari 
entitas manusia dengan menerapkan prinsip enkapsulasi. Sementara itu, index.php berfungsi sebagai file eksekusi 
utama di mana kita melakukan instansiasi (pembuatan Object) dari Class tersebut, untuk kemudian memanipulasi datanya 
dan menampilkannya ke dalam browser."
*/

?>