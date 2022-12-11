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
    <!-- animasi css dan js -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.2.2-dist/css/bootstrap.css">
    <title>Data Siswa</title>
</head>

<body>
    <?php 
    if(isset($_GET['nisn'])){
        $id = $_GET['nisn'];
        $update = $crud->tampil_data('siswa','nisn',$id);
        foreach($update as $upd){
            $nisn = $upd['nisn'];
            $nama = $upd['nama'];
            $kelas = $upd['kelas'];
            $tanggal = $upd['tanggallahir'];
            $readonly = 'readonly';
            $action = 'update';
        }
    }else{
            $nisn = '';
            $nama = '';
            $kelas = '';
            $tanggal = '';
            $readonly = '';
        $action = 'simpan';
    }
    ?>
    <div>
        <h1 align="center">New Data</h1>
        <form action="tambah-siswa.php" method="post">
            <label for="nisn">NISN</label>
            <input type="text" id="nisn" name="nisn" placeholder="NISN..." value="<?php echo $nisn; ?>" <?php echo $readonly; ?>>
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" placeholder="Nama Lengkap..." value="<?php echo $nama; ?>">

            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" placeholder="Kelas..." value="<?php echo $kelas; ?>">
            <label for="ttl">Tanggal Lahir</label>
            <input type="date" id="ttl" name="ttl" value="<?php echo $tanggal; ?>">

            <input type="submit" value="Simpan" name="simpan" id="simpan">
            <input type="submit" value="Reset" name="reset" id="reset">
            <input type="hidden" name="action" value="<?php echo $action; ?>">
        </form>
    </div><br><br>
    <div data-aos="fade-down" data-aos-duration="1400">
        <h1 align="center">Data Siswa</h1>
        <table class="table table-striped">
            <tr align="center">
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal Tahir</th>
                <th colspan="2">Action</th>
            </tr>
            <?php

            $siswa = $crud->tampil_data('siswa',null,null);
            $no = 1;

            foreach ($siswa as $sis) { ?>
            <tr>
                <td align="center">
                    <?php echo $no++; ?>
                </td>
                <td align="center">
                    <?php echo $sis['nisn'] ?>
                </td>
                <td align="center">
                    <?php echo $sis['nama'] ?>
                </td>
                <td align="center">
                    <?php echo $sis['kelas'] ?>
                </td>
                <td align="center">
                    <?php echo $sis['tanggallahir'] ?>
                </td>
                <td align="center"><a href="index.php?nisn=<?php echo $sis['nisn'] ?>"><input type="button" class="edit"></a></td>
                <td align="center"><a href="hapus-siswa.php?nisn=<?php echo $sis['nisn'] ?>"><input type="button" class="hapus"></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <footer>
        <p align="center" >Copyrirght &copy;Galih Rakasiwi</p>
    </footer>
</body>
<script>
    AOS.init();
</script>

</html>