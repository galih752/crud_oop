<?php
include("../class.crud.php");
$crud = new crud;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=date],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #simpan {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #reset {
            width: 100%;
            background-color: #B2B2B2;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .hapus {
            border: 1px solid #db5d59;
            background: #db5d59 url('../images/hapus.png') no-repeat 5px 4px;
            height: 22px;
            padding-left: 15px;
            padding-top: 5px;
            border-radius: 3px;
        }

        .hapus:hover {
            box-shadow: 4px 4px 6px black;
        }

        .edit {
            border: 1px solid #00b3a8;
            background: #00b3a8 url('../images/edit.png') no-repeat 5px 4px;
            height: 22px;
            padding-left: 15px;
            padding-top: 5px;
            border-radius: 3px;
        }

        .edit:hover {
            box-shadow: 4px 4px 6px black;
        }
</style>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $update = $crud->tampil_data('siswa','nisn',$id);
        foreach($update as $upd){
            $nisn = $upd['nisn'];
            $nama = $upd['nama'];
            $kelas = $upd['kelas'];
            $tanggal = $upd['tanggallahir'];
        }
    }else{
            $nisn = '';
            $nama = '';
            $kelas = '';
            $tanggal = '';
    }
    ?>
<form action="tambah-siswa.php" method="post">
            <label for="nisn">NISN</label>
            <input type="text" id="nisn" name="nisn" value="<?php echo $nisn; ?>">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">

            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" value="<?php echo $kelas; ?>">
            <label for="ttl">Tanggal Lahir</label>
            <input type="date" id="ttl" name="ttl" value="<?php echo $tanggal; ?>">

            <input type="submit" value="Simpan" name="simpan" id="simpan">
            <input type="submit" value="Reset" name="reset" id="reset">
        </form>
</body>
</html>