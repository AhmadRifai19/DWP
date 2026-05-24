<?php

/* Versi yang masih salah
class buah2 {
    public $nama;
    public $warna;
    public $bobot;

    function set_name($n) {
        $this->nama = $n;
    }
    protected function set_color($n) {
        $this->warna = $n;
    }
    private function set_weight($n) {
        $this->bobot = $n;
    }
}

$mango = new buah2();
$mango->set_name('Mango');
$mango->set_color('Yellow');
$mango->set_weight('300');

*/

// Versi yang sudah dilakukan perbaikan

class Buah2 {
    public $nama;
    protected $warna;
    private $bobot;

    public function __construct($nama, $warna, $bobot)
    {
        $this->nama = $nama;
        $this->warna = $warna;
        $this->bobot = $bobot;
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

    public function setBerat($bobot)
    {
        $this->bobot = $bobot;
    }

    public function getBerat()
    {
        echo("Berat buah adalah : ").$this->bobot."<br>";
    }
}

$Manggo = new Buah2("Manggo", "Yellow", 300);
$Manggo->getNama();
$Manggo->getWarna();
$Manggo->getBerat();

/*
    Kesimpulan:
    - Terjadi kesalahan pada pemanggilan fungsi set_color yaitu fungsi set_color memiliki akses protected yang membuatnya 
    tidak dapat dipanggil secara langsung dari luar kelas. namun fungsi tersebut dapat dilakukan pemanggilan terhadap fungsinya 
    akan tetapi dari dalam kelas.
    - selanjutnya terdapat error pada fungsi set_weight. yaitu pada fungsi set_weight memiliki akses private yang membuatnya hanya 
    bisa dilakukan pemanggilan fungsi hanya pada kelas yang sama.
*/
?>