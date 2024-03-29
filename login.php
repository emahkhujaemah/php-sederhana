<?php
session_start();
require 'functions.php';

//cek cookie
if( isset ($_COOKIE['id']) && isset($_COOKIE['key']) ){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id ");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if($key === hash('sha256', $row['username']) ){
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION["login"]) ){
    header("location: index.php");
    exit;
}


if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    //cek apakah ada barisan yang dikembalikan 
    if( mysqli_num_rows($result) == 1){
        
        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"]) ){
        // if($password == $row["password"] ){
            //set session
            $_SESSION["login"] = true;

            //cek remember me
            if( isset($_POST['remember']) ){
                // buat cookie
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
                // setcookie('login','true', time() + 60 );
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
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
    <link href="assets/css/signin.css" rel="stylesheet">

    <title>Document</title>

</head>
<body class="text-center">

    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <main class="form-signin">
  <form role="form" action="" method="post">
    <img class="mb-4" src="assets/img/picture11.png" alt="" width="100" >
    <h1 class="h3 mb-3 fw-normal">Halaman Login</h1>

    <?php if( isset($error) ) : ?>
    <p style="color: red; font-style : italic;"  >username/password salah</p>
    <?php endif; ?>

    <label for="username" class="visually-hidden">Username</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
    <label for="password" class="visually-hidden">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me" name="remember"> Remember me
      </label>
      <h6><a href="registrasi.php">Registrasi</a></h6>
    </div>
    <button class="btn btn-lg btn-primary" type="submit" name="login" >Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
  </form>
</main>


</body>
</html>