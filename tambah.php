<?php
session_start();

//jika tidak ada user login
if( !isset($_SESSION["login"])){
    //tendang ke halaman login
    header("Location: login.php");
    exit;
}
require 'functions.php';
require 'header.php';

//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])){

    //cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/popper.min.js"></script>

<div class="container">
    <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h1>Tambah Data Mahasiswa</h1>
        <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nim">NIM : </label>
                    <input type="text" name="nim" id="nim" required autofocus class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama" class="form-label">Nama : </label>
                    <input type="text" name="nama" id="nama" required class="form-control" >
                </div>         
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="text" name="email" id="email" required class="form-control">
                </div>
                    
                <div class="form-group">
                    <label for="jurusan">Jurusan : </label>
                    <input type="text" name="jurusan" id="jurusan" required class="form-control">
                </div>
                    
                <div class="form-group">
                    <label for="gambar">Gambar : </label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                </div>
                    
                    <br>

                <div class="class-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary"  >Tambah Data!</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
                </div>
                    
        
    
        </form>
    </div>
    <div class="col-lg-3"></div>
    </div>
</div>


</body>
</html>