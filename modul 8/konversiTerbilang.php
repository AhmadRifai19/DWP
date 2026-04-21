<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Angka ke Terbilang</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .result { margin-top: 15px; padding: 10px; background-color: #f0f8ff; border: 1px solid #cce7ff; display: inline-block; }
    </style>
</head>
<body>

    <h2>Konversi Angka ke Huruf Terbilang</h2>
    
    <!-- Form input data -->
    <form method="POST" action="">
        <label for="angka">Masukkan Angka (1 - 9):</label>
        <input type="number" name="angka" id="angka" min="1" max="9" required>
        <button type="submit">Konversi</button>
    </form>

    <br>

<?php
// Mengecek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Mengambil nilai angka dari input form
    $angka = $_POST['angka']; 
    $terbilang = "";

    // Logika switch untuk konversi
    switch ($angka) {
        case 1:  $terbilang = "satu"; break;
        case 2:  $terbilang = "dua"; break;
        case 3:  $terbilang = "tiga"; break;
        case 4:  $terbilang = "empat"; break;
        case 5:  $terbilang = "lima"; break;
        case 6:  $terbilang = "enam"; break;
        case 7:  $terbilang = "tujuh"; break;
        case 8:  $terbilang = "delapan"; break;
        case 9:  $terbilang = "sembilan"; break;
        default: $terbilang = "tidak dikenali (tolong masukkan angka 1 sampai 9)"; break;
    }

    // Menampilkan hasil
    echo "<div class='result'>";
    echo "Angka <strong>{$angka}</strong> dikonversi menjadi: <strong>\"{$terbilang}\"</strong>";
    echo "</div>";
}
?>

</body>
</html>
