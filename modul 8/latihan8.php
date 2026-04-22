<?php
// data kelas dengan array 2 dimensi
$array = [
    "1C" => ["udin", "ismail", "adi"],
    "1D" => ["lukman", "fajri", "mahmud"]
];

// menampilkan data array
print_r($array);
echo "<br><br>";

// menampilkan kelas 1C
print_r($array['1C']);
echo "<br><br>";

// menampilkan kelas 1D dengan index 0
echo $array['1D'][0];
echo "<br>";

// tampilkan fajri
echo $array['1D'][1];
echo "<br>";

// tampilkan adi
echo $array['1C'][2];
echo "<br><br>";
?>
