<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Gambar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }
        .gallery img {
            width: 200px;
            height: 200px;
            object-fit: cover; /* Biar gambar tidak gepeng */
            border: 2px solid #ddd;
            border-radius: 8px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .gallery img:hover {
            transform: scale(1.05); /* Efek zoom saat dihover */
        }
    </style>
</head>
<body>

    <h2>Galeri Gambar Hasil Upload</h2>
    
    <div class="gallery">
        <?php
        // Mengambil semua file yang ada di dalam folder 'gambar/'
        $fileList = glob('gambar/*');
        
        // Mengecek apakah ada file yang ditemukan
        if($fileList !== false && count($fileList) > 0) {
            foreach ($fileList as $filename) {
                if (is_file($filename)) {
                    // Modifikasi: Menampilkan sebagai tag <img> HTML, bukan sekadar teks nama file
                    echo '<img src="' . htmlspecialchars($filename) . '" alt="Gambar di folder">';
                }
            }
        } else {
            echo "<p>Belum ada gambar yang di-upload. Silakan upload gambar terlebih dahulu.</p>";
        }
        ?>
    </div>

</body>
</html>
