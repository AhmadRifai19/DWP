<?php

class akunBank
{
    // Deklarasi Variabel
    protected $accountNumber;
    protected $jmlUang;
    protected $nama;

    // Constructor
    public function __construct($nomorAkun, $nominal)
    {
        $this->accountNumber = $nomorAkun;
        $this->jmlUang = $nominal;
    }

    // Method memanbahkan nama
    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    // Method mendapatkan nama
    public function getNama()
    {
        return $this->nama;
    }

    // Method deposit uang
    public function TambahUang($nominal)
    {
        $this->jmlUang += $nominal;
        echo "Uang sebesar Rp. " . $nominal . " telah ditambahkan.<br>";
    }

    // Method menarik uang
    public function TarikUang($nominal)
    {
        $this->jmlUang -= $nominal;
        echo "Uang sebesar Rp. " . $nominal . " telah ditarik.<br>";
    }

    // Method mencetak saldo
    public function CetakSaldo()
    {
        echo "Saldo Anda sebesar: Rp. " . $this->jmlUang;
    }

    // Method menghitung pajak dan memotong
    public function Pajak()
    {
        $pajak = $this->jmlUang * 0.11;
        echo "Pajak sebesar Rp. " . $pajak . " telah dipotong.<br>";
        $this->jmlUang -= $pajak;
    }
}

?>