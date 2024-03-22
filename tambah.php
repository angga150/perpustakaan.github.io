<?php 
// hubungkan ke file config
require "config.php";

// cek apakah tombol submit sudah ditekan apa belum
if( isset($_POST["submit"]) ) {
	// cek apakah data berhasil di tambahan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "Data Berhasil ditambahkan";
		header("Location: buku.php");
	} else {
		echo "Data Gagal ditambahkan";
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
	<title>Tambah Data Buku</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
    <link rel="stylesheet" type="text/css" href="style/index.css">

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
          <a class="nav-link active" aria-current="page" href="admin.php">Kembali</a>
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
<!-- content-->
<section class="konten-buku mt-5">
<div class="table">
<h3 align="center">Form Tambah Buku</h3>
<form action="" method="post">
	<input type="text" name="judul" placeholder="Judul Buku">
	<input type="text" name="penulis" placeholder="Nama Penulis">
	<input type="text" name="penerbit" placeholder="Nama Penerbit">
	<input type="text" name="thn_terbit" placeholder="Tahun Terbit">
	<input type="text" name="gambar" placeholder="Nama Gambar">
	<button type="submit" name="submit" class="btn btn-success">Tambah</button>
</form>
</div>
</section>
<!-- akhir content -->

<!-- footer -->
<footer class="bg-primary">
  <p class="text-center">Created by Tim <b>HEBAT</b></p>
</footer>
<!-- akhir footer -->

</body>
</html>