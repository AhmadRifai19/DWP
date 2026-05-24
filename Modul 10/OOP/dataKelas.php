<?php
require_once ('kelas/mahasiswa.php');

$mhs1 = new mahasiswa("Ahmad Rifai");
$mhs1->setNIM("253307049");
$mhs1->setKelas("2B");
$mhs1->setJurusan("Teknik");


// tampilkan nama nim dan kelas dari $mhs1
echo($mhs1->getNama())."<br>";
echo($mhs1->getNIM())."<br>";
echo($mhs1->getKelas())."<br>";
echo($mhs1->getJurusan());

?>