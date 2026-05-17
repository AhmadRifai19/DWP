<?php
// Modul 9 - Soal 9: Array dengan index nama dan umur, konversi ke JSON

$data = array(
    array("nama" => "Ahmad", "umur" => 22),
    array("nama" => "Rizky", "umur" => 25),
    array("nama" => "Nisa", "umur" => 21),
    array("nama" => "Siti", "umur" => 20),
    array("nama" => "Fahmi", "umur" => 24),
    array("nama" => "Aulia", "umur" => 19),
    array("nama" => "Dwi", "umur" => 23),
    array("nama" => "Putra", "umur" => 26),
    array("nama" => "Indra", "umur" => 28),
    array("nama" => "Rina", "umur" => 22),
    array("nama" => "Bayu", "umur" => 21),
    array("nama" => "Dewi", "umur" => 24),
    array("nama" => "Reza", "umur" => 27),
    array("nama" => "Ayu", "umur" => 20),
    array("nama" => "Dimas", "umur" => 25)
);

// Konversi ke JSON
$json = json_encode($data, JSON_PRETTY_PRINT);

echo "<h2>Data Array (Nama dan Umur)</h2>";
echo "<h3>Data dalam format Array Asli (PHP):</h3>";
echo "<pre style='background-color: #f4f4f4; padding: 10px; border-radius: 5px;'>";
print_r($data);
echo "</pre>";

echo "<h3>Data setelah dikonversi ke format JSON:</h3>";
echo "<pre style='background-color: #282c34; color: #61dafb; padding: 10px; border-radius: 5px;'>";
echo $json;
echo "</pre>";
?>
