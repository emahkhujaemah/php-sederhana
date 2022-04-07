<?php
session_start();

//jika tidak ada user login
if( !isset($_SESSION["login"])){
    //tendang ke halaman login
    header("Location: login.php");
    exit;
}

require 'functions.php';

//membuuat panination
//konfigurasi 
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
// if( isset($_GET["halaman"]) ){
//     $halamanAktif = $_GET["halaman"];
// }else{
//     $halamanAktif = 1;
// }

// pakai cara ternary
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif)-$jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

//tombol cari ditekan
if( isset($_POST["cari"]) ){
    $mahasiswa = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">

    <title>Halaman Admin</title>
</head>
<body>

<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/popper.min.js"></script>

<!-- Navigasi Bootstrap -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Mahasiswa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tambah.php">Tambah Data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php" >Logout</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown04">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form action="" method="post" class="form-horizontal" role="form">   
        <input type="text" name="keyword" size="30" autofocus placeholder = "masukan keyword pencarian.." autocomplete="off">
        <button type="submit" name="cari" class="btn btn-primary navbar-btn">Cari!</button>
        </form>            
      </div>
    </div>
  </nav>

    <h1 class="text-center">Daftar Mahasiswa</h1>
    <br>

    <div class="text-center">
      <!-- navigasi -->
      <?php if($halamanAktif > 1): ?>
          <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
      <?php endif; ?>

      <?php for($i = 1; $i<=$jumlahHalaman; $i++ ) :?>
          <?php if($i == $halamanAktif) : ?>
              <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>     
          <?php else : ?>
              <a href="?halaman=<?= $i; ?>"; ><?= $i; ?></a> 
          <?php endif; ?>
      <?php endfor; ?>

      <?php if($halamanAktif < $jumlahHalaman): ?>
          <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
      <?php endif; ?>
    </div>
    

    <br>
      <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-sm-12 col-lg-10" >
            <div class="table-responsive">
            <table class="table table-bordered table-hover" cellpadding="10" cellspacing="0">
                <thead>
                  <tr>
                      <th>NO.</th>
                      <th>Aksi</th>
                      <th>Gambar</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jurusan</th>
                  </tr>
                </thead>
              <tbody>
                  <?php $i = 1; ?>
                  <?php foreach( $mahasiswa as $row ) : ?>    
                      <tr>
                          <td><?= $i ?></td>
                          <td>
                              <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                              <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?');" >Hapus</a>
                          </td>
                          <td><img src="img/<?= $row["gambar"]; ?>" width="70"></td>
                          <td><?= $row["nim"]; ?></td>
                          <td><?= $row["nama"]; ?></td>
                          <td><?= $row["email"]; ?></td>
                          <td><?= $row["jurusan"]; ?></td>
                      </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                  </tbody>    
              </table>
            </div>
            
            </div>
            <div class="col-lg-1"></div>
        </div>
      </div>
    
</body>
</html>