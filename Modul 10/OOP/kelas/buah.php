<?php

/* Versi yang masih salah
class buah
{
    public $nama;
    protected $warna;
    private $berat;
}

$mango = new buah();
$mango->nama = 'Mango';
$mango->warna = 'Yellow';
$mango->buah = '300';
*/

// Versi yang sudah dilakukan perbaikan
class Buah {
    public $nama;
    protected $warna;
    private $berat;

    public function __construct($nama, $warna, $berat)
    {
        $this->nama = $nama;
        $this->warna = $warna;
        $this->berat = $berat;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        echo("Nama buah adalah : ").$this->nama."<br>";
    }

    public function setWarna($warna)
    {
        $this->warna = $warna;
    }

    public function getWarna()
    {
        echo("Warna buah adalah : ").$this->warna."<br>";
    }

    public function setBerat($berat)
    {
        $this->berat = $berat;
    }

    public function getBerat()
    {
        echo("Berat buah adalah : ").$this->berat."<br>";
    }
}

$Manggo = new Buah("Manggo", "Yellow", 300);
$Manggo->getNama();
$Manggo->getWarna();
$Manggo->getBerat();

/*
Kesimpulan:
Terjadi kesalahan pada variabel $warna yaitu variabel $warna memiliki akses proteted yang membuatnya tidak dapat 
diisi dengan nilai secara langsung dari luar kelas. namun variabel tersebut dapat dilakukan pengisian terhadap 
nilainya akan tetapi dari dalam kelas.
selanjutnya terdapat erro pada Variabel &berat. yang pertama terjadinya kesalahan pemanngilan pada penambahan 
buah yaitu kode memanggil langsung buah untuk mengisikan variabel $berat. namun masih ada kesalahan jika variabel 
buah diganti dengan variabel berat. yaitu pada variabel $buah memiliki akses private yang membuatnya hanya bisa dilakukan 
pengubahan nilai hanya pada kelas yang sama.

*/
?>