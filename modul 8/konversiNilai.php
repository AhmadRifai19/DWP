<!DOCTYPE html>
<html>
<head>
    <title>Program Konversi Nilai</title>
</head>
<body>
    <h2>Form Input Konversi Nilai</h2>
    
    <!-- Form untuk input data nilai -->
    <form method="POST" action="">
        <label for="nilai">Masukkan Nilai Angka:</label>
        <input type="number" name="nilai" id="nilai" required>
        <button type="submit">Konversi</button>
    </form>

    <hr>

    <?php
    // Mengecek apakah form sudah di-submit
    if (isset($_POST['nilai'])) {
        // Mengambil data nilai dari input form
        $nilai = $_POST['nilai'];

        if ($nilai >= 90) {
            $grade = "A";
        } elseif ($nilai >= 80) {
            $grade = "B";
        } elseif ($nilai >= 70) {
            $grade = "C";
        } elseif ($nilai >= 60) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        echo "<strong>Hasil:</strong><br>";
        echo "Nilai Anda: " . $nilai . "<br>";
        echo "Mendapatkan Grade: <b>" . $grade . "</b>";
    }
    ?>

</body>
</html>