<?php

$data_siswa = [
    1 => ["nama" => "Adi", "poin" => 75],
    2 => ["nama" => "Joni", "poin" => 80],
    3 => ["nama" => "Jihan", "poin" => 65],
    4 => ["nama" => "Aya", "poin" => 70],
    5 => ["nama" => "Ita", "poin" => 85],
    6 => ["nama" => "Budi", "poin" => 90],
    7 => ["nama" => "Tini", "poin" => 95],
    8 => ["nama" => "Sari", "poin" => 65]
];

// a) Tampilkan poin siswa dengan nomor urut 5
echo "a) Poin siswa dengan nomor urut 5: " . $data_siswa[5]["poin"] . "<br>";


// b) Tampilkan semua nama siswa yang memiliki poin 90
echo "b) Siswa yang memiliki poin 90: ";
$nilai_90 = false; // variabel penanda
foreach ($data_siswa as $siswa) {
    if ($siswa["poin"] == 90) {
        echo $siswa["nama"] . " ";
        $nilai_90 = true;
    }
}
// Jika tidak ada yang nilainya 90
if ($nilai_90 == false) {
    echo "tidak ada";
}
echo "<br>";


// c) Tampilkan semua nama siswa yang memiliki poin 100
echo "c) Siswa yang memiliki poin 100: ";
$nilai_100 = false; // variabel penanda
foreach ($data_siswa as $siswa) {
    if ($siswa["poin"] == 100) {
        echo $siswa["nama"] . " ";
        $nilai_100 = true;
    }
}
// Jika tidak ada yang nilainya 100
if ($nilai_100 == false) {
    echo "tidak ada";
}
echo "<br>";

?>
