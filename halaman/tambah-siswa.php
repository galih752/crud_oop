<?php
include("../class.crud.php");

$crud = new crud();
if ($_POST['action'] == 'simpan'){
    $tambah = array(
        'nisn' => $_POST['nisn'],
        'nama' => $_POST['nama'],
        'kelas' => $_POST['kelas'],
        'tanggallahir' => $_POST['ttl']
    );
    
    $hasil = $crud->tambah('siswa', $tambah);
} else {
    $tambah = array(
        "nama='".$_POST['nama']."'",
        "kelas='".$_POST['kelas']."'",
        "tanggallahir='".$_POST['ttl']."'"
    );

    $idvalue = $_POST['nisn'];
    $hasil = $crud->update('siswa', $tambah,'nisn',$idvalue);
}
if($hasil){
    header('location: index.php');
}else{
    echo "Data Gagal Disimpan!";
}
    ?>