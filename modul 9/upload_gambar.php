<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload file</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords" content="253307049">
    <meta name="author" content="Ahmad Rifai">
</head>
<body>

<?php
if(isset($_POST["submit"])) {
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $tipeGambar = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // check apakah file berupa gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check !== false) {
        echo "File berupa citra/gambar - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.<br>";
        $uploadOk = 0;
    }

    // deteksi apakah ada file dengan nama yang sama
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    // Check file size (500kb max)
    if ($_FILES["gambar"]["size"] > 500000) {
        echo "Sorry, file anda terlalu besar.<br>";
        $uploadOk = 0;
    }

    // Filter format
    if($tipeGambar != "jpg" && $tipeGambar != "png" && $tipeGambar != "jpeg" && $tipeGambar != "gif" ) {
        echo "Sorry, hanya file JPG, JPEG, PNG & GIF.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk telah sesuai dengan kriteria
    if ($uploadOk == 0) {
        echo "Sorry, File anda gagal upload.<br>";
    } else {
        // proses upload file
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "File ". htmlspecialchars( basename( $_FILES["gambar"]["name"])). " berhasil Upload.<br>";
        } else {
            echo "Sorry, Ada eror saat upload.<br>";
        }
    }
}
?>

<br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <p><label>Pilih Gambar yang akan di upload: </label><br>
        <input type="file" name="gambar" value="Pilih Gambar" id="gambar1"></p>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
