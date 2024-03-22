<?php
session_start();
if( isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}
// hubungkan ke file koneksi
require "config.php";

if( isset($_POST['register']) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan');
			</script>";
			sleep(1);
	} else {
		echo mysqli_error($conn);
	}

}


?>


<!DOCTYPE html>
<html>
<!-- Created by Angga Haady Wijaya
      3 Maret 2024
  Mau Custom Web Ucapan Online? DM aja di!!
* Instagram = angga_hdyy -->
<head>
	<title>Halaman Register</title>
<link href="css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="style/login3.css">

</head>
<body style="background-image: url('foto/background.jpg');">

<div class="container2">
<div class="foto">
	<img src="foto/buku.jpg">
</div>

<form action="" method="post">

<h1>Register</h1>
<hr>
    <label for="username">Username :</label>
    <input type="text" name="username" id="username"
    placeholder="Masukan Username" required>
    <label for="password">password :</label>
    <input type="password" name="password" id="password"
    placeholder="Masukan Password" required>
    <label for="password2">Konfirmasi Password :</label>
	<input type="password" name="password2" id="password2"
	placeholder="Masukan Ulang Password" required>

	<button type="submit" name="register">Register</button>
	<div class="register">
        Sudah Punya Akun?
        <a href="login.php">Login</a>
    </div>
    <span>PERPUSTAKAN HEBAT</span>
    
</form>
</div>
</body>
</html>