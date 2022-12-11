<?php
class koneksi {
    private $servername = "localhost";
    private $username = "root";
    private $database = "data_siswa";
    private $password = "";

    protected $koneksi;
    function __construct(){
        if(!isset($this->koneksi)){
            $this->koneksi = new mysqli($this->servername, $this->username, $this->password, $this->database);
        }
        if(!$this->koneksi){
            echo "Koneksi Gagal!";
        }
        return $this->koneksi;
    }
}
?>