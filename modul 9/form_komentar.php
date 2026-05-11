<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$name = $email = $comment = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = bersihkan_input($_POST["name"]);
    $email = bersihkan_input($_POST["email"]);
    $comment = bersihkan_input($_POST["comment"]);
    
    echo("Nama : ".$name."<br>");
    echo("Email : ".$email."<br>");
    echo("Komentar : ".$comment."<br>");
    echo("<hr>");
}

function bersihkan_input(string $data): string {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nama: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    Komentar: <textarea name="comment" rows="5" cols="40"></textarea><br>
    <input type="submit" value="simpan">
    <input type="reset" value="bersihkan">
</form>

<br>
<br>
<p>saat memasukkan data dari kolom input dan dilakukan klik terhadap button simpan, 
    maka PHP akan melakukan proses penyimpanan data dan memunculkannya. namun jika melakukan 
    klik terhadap hapus, maka seluruh isi yang ada didalam kolom input akan hilang terhapus.
</p>

<br>
<br>
<p>
    kode tersebut tetap akan simpan oleh PHP, namun saat sudah tersimpan browser akan 
    menganggapnya sebagai kode tambahan sehingga akan merusak isi website.
</p>

</body>
</html>
