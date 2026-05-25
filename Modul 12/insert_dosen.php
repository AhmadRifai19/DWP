<?php
$con = new mysqli("localhost", "root", "", "db_dpw");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// eksekusi DML INSERT menggunakan OOP
$sql = "INSERT INTO t_dosen (idDosen, namaDosen, noHP) VALUES (10, 'Rahmat Dwi Prasetya', 'rahmat@example.com')";
$hasil = $con->query($sql);

if ($hasil === TRUE) {
    echo "Data dosen berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>