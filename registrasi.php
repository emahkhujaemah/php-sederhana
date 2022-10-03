<?php

require 'functions.php';

if( isset($_POST["register"]) ){
    if ( registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan')
              </script>";
    }else{
        // echo mysqli_error($conn);
        header("Location: login.php");
        exit;
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
    <link href="assets/css/signin.css" rel="stylesheet">
    <title>Halaman Registrasi</title>
    <style>
    </style>
</head>
<body>

<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/popper.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
            <div class="text-center">
                <img src="assets/img/picture11.png" alt="Register" width="100" class="text-center">
                    <h1>Halaman Registrasi</h1>
            </div>
            
                    <form role="form" action="" method="post">
                        <div class="form-group">
                        <label for="username" class="form-label" >Username : </label>
                        <input type="text" name="username" id="username"  class="form-control" placeholder="Username" required autofocus>
                        </div>
                        <div class="class-group">
                        <label for="password" class="form-label">Password : </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        
                        <div class="class-group">
                        <label for="password2" class="form-label" >Konfirmasi : </label>
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Password" required>
                        </div>

                        <br>

                        <div class="class-group text-center">
                        <h6><a href="login.php">Login</a></h6>
                            <br>
                        <button class="btn btn-lg btn-primary" type="submit" name="register">Register!</button>
                        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
                        </div>
                        
                    </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</body>
</html>