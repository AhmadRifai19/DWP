<?php

$angka = array(12, 13, 15, 16, 67, 189, 346, 876, 54232, 3256);

// Menggunakan foreach untuk mengulang setiap elemen di dalam array
foreach ($angka as $nilai) {
    // Jika angka habis dibagi 2, maka akan menunjukkan keteranag bahwa bilangan tersebut ganjil (sesuai contoh harus kebalikannya)
    if ($nilai % 2 == 0) {
        echo "Nomor : " . $nilai . " Ganjil<br>";
    } else {
        // Jika tidak habis dibagi 2, maka ganjil
        echo "Nomor : " . $nilai . " Genap<br>";
    }
}

?>
