<?php
require_once('kelas/akunBank.php');

// Memasukkan data akun bank
$data1 = new akunBank("001", 10000);
$data2 = new akunBank("002", 50000);

// Memasukkan nama akun bank
$data1->setNama("Andi");
$data2->setNama("Budi");

// Menampilkan data transaksi
echo "Data Transaksi ";
echo $data1->getNama();
echo "<br>";
$data1->TambahUang(1000);
$data1->Pajak();
$data1->CetakSaldo();
echo "<br><br>";

// Menampilkan data transaksi
echo "Data Transaksi ";
echo $data2->getNama();
echo "<br>";
$data2->TarikUang(10000);
$data2->Pajak();
$data2->CetakSaldo();
echo "<br>";

?>