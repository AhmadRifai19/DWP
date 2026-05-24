<?php
require_once "Manusia.php";

class Mahasiswa extends Manusia
{
    // Deklarasi Variabel
    protected $NIM;
    protected $jurusan;
    protected $kelas;

    // Constructor
    public function __construct($nama)
    {
        // kita bisa langsung manfaatkan fungsi dari kelas manusia.php
        $this->setNama($nama);
    }

    // Method menambahkan NIM
    public function setNIM($NIM)
    {
        $this->NIM = $NIM;
    }

    // Method mendapatkan NIM
    public function getNIM()
    {
        return $this->NIM;
    }

    // Method menambahkan Jurusan
    public function setJurusan($jurusan)
    {
        $this->jurusan = $jurusan;
    }

    // Method mendapatkan Jurusan
    public function getJurusan()
    {
        return $this->jurusan;
    }

    // Method menambahkan Kelas
    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }

    // Method mendapatkan Kelas
    public function getKelas()
    {
        return $this->kelas;
    }
}

?>