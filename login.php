<?php
session_start();

require ("config.php");

if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
}

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    $ambil = mysqli_fetch_assoc($result);

    // cek username 
    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        if( $password ) {
            // set session
            $_SESSION["login"] = $username;
            // login multi user 
            if( $ambil["username"] == "admin" ) {
                $_SESSION["admin"] = "admin";
                header("Location: admin.php");
            } 
            elseif( $ambil["username"] == "petugas" ) {
                $_SESSION["admin"] = "admin";
                $_SESSION["petugas"] = "petugas";
                header("Location: admin.php");
            }
             else {
                header("Location: index.php");
            }
        }
    }

    $error = true;

}

?>

<!doctype html>
<html lang="en">
<!-- Created by Angga Haady Wijaya
      3 Maret 2024
  Mau Custom Web Ucapan Online? DM aja di!!
* Instagram = angga_hdyy -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style/login3.css">


</head>
<body style="background-image: url('foto/background.jpg');">

<div class="container">
    <div class="foto">
        <img src="foto/buku.jpg">
    </div>
<form action="" method="post">
<h1>Login</h1>


<hr>

    <label for="username">Username :</label>
    <input type="text" name="username" id="username" placeholder="Masukan Username">
    <label for="password">password :</label>
    <input type="password" name="password" id="password" placeholder="Masukan Password">
    <button type="submit" name="login">Login</button>
<?php if( isset($error) ) : ?>
    <p style="color:red;">Username / password salah</p>
<?php endif; ?>
    <span>PERPUSTAKAN HEBAT</span>
    <div class="register">
        Belum Punya Akun?
        <a href="registrasi.php">Buat Akun</a>
    </div>



</form>

</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>