<?php
include("../class.crud.php");

$crud = new crud();

if(isset($_GET['nisn'])){
    $id = $_GET['nisn'];

    $hasil = $crud->delete('siswa', 'nisn', $id);
    if($hasil){
        header('location: index.php');
    } else {
        echo "Data Gagal Dihapus!";
    }
}
?>