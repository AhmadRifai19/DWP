<?php
$x = 5;
$y = 10;

//Arithmetic operators
echo "Penambahan ".$x + $y."<br>";
echo "Pengurangan ".$x - $y."<br>";
echo "Perkalian ".$x * $y."<br>";
echo "Pembagian ".$x / $y."<br>";
echo "Modulus ".$x % $y."<br>";
echo "Exponensial ".$x ** $y."<br>";
echo("<br>");

//Assignment operators
$x += 2; // $x = $x + 2
$y *= 2; // $y = $y * 2
echo "Penambahan x ".$x."<br>";
echo "Perkalian y ".$y."<br>";
echo("<br>");

//Increment/Decrement operators
echo "Isi ++x = ".++$x."<br>";
echo "Isi x++ = ".$x++."<br>";
echo "Isi x = ".$x."<br>";
echo("<br>");
echo "Isi --y = ".--$y."<br>";
echo "Isi y-- = ".$y--."<br>";
echo "Isi y = ".$y."<br>";
echo("<br>");

//Conditional assignment operators
$user = "Andi darmawan";
// <kondisi> ? <nilai_jika_kondisi_true> : <nilai_jika_kondisi_false>
$status = (empty($user)) ? "Kosong" : "Ada isi";
echo $status."<br>";
// variable $color diisi dengan "red" jika $color tidak ada atau null
echo $color = $color ?? "red";
echo "<br><br>";
echo "<b>Jawaban Pertanyaan:</b><br>";
echo "Apa perbedaan \$x++ dan ++\$x ??<br>";
echo "1. <b>\$x++ (Post-increment)</b>: Akan mengembalikan nilai \$x terlebih dahulu, baru kemudian nilainya ditambah 1.<br>";
echo "2. <b>++\$x (Pre-increment)</b>: Akan menambahkan nilai \$x dengan 1 terlebih dahulu, baru kemudian mengembalikan nilai yang baru.<br>";

?>
