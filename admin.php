<?php 
session_start();

require "config.php";

if( !isset($_SESSION["admin"]) ) {
  header("Location: login.php");
  exit;
}

$query1 = mysqli_query($conn, "SELECT * FROM buku");
$buku = mysqli_num_rows($query1);

$query2 = mysqli_query($conn, "SELECT * FROM user");
$user = mysqli_num_rows($query2);

$query3 = mysqli_query($conn, "SELECT * FROM peminjaman");
$pinjam = mysqli_num_rows($query3);
?>


<!DOCTYPE html>
<html lang="en">
<!-- Created by Angga Haady Wijaya
      3 Maret 2024
  Mau Custom Web Ucapan Online? DM aja di!!
* Instagram = angga_hdyy -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PERPUSTAKAAN</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style/index.css">
<style type="text/css">

</style>

  </head>
  <body>
<!-- navbar -->
<section id="home">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow fixed-top">
  <div class="container shadow-sm">
    <a class="navbar-brand" href="">Perpustakaan Hebat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#home">Halaman Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Halaman User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</section>
<!-- akhir navbar -->
<!-- jumbotron -->
<section class="admin text-center">
<h2>DASBOARD</h2>
<hr>
<p>Selamat datang,</p>
<h5><?php echo $_SESSION["login"]; ?> PERPUSTAKAN HEBAT</h5>
</section>
<!-- akhir jumbotron -->

<!-- About me -->
<section class="dasboard">
  <div class="kartu">
    <p>Jumlah <br> Buku ( <?php echo $buku; ?> )</p>
    <div class="kartu-body">
      <a href="buku.php">Lihat Selengkapnya</a>
    </div>
  </div>
  <div class="kartu">
    <p>Jumlah <br> User ( <?php echo $user; ?> )</p>
    <div class="kartu-body">
      <a href="user.php">Lihat Selengkapnya</a>
    </div>
  </div>
  <div class="kartu">
    <p>Jumlah Pinjaman <br>( <?php echo $pinjam; ?> )</p>
    <div class="kartu-body">
      <a href="peminjaman.php">Lihat Selengkapnya</a>
    </div>
  </div>
  <div class="kartu">
    <p>Jumlah Kembalian <br>( <?php echo $pinjam; ?> )</p>
    <div class="kartu-body">
      <a href="buku.php">Lihat Selengkapnya</a>
    </div>
  </div>
</section>
<!-- akhit About -->

<!-- Buku -->
<!-- akhir buku -->

<footer class="bg-primary">
  <p class="text-center">Created by Tim <b>HEBAT</b></p>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>