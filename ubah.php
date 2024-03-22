<?php 
// hubungkan ke file config
require "config.php";

// ambil data dari URL
$id = $_GET["buku_id"];


// cek apakah tombol submit sudah ditekan apa belum
if( isset($_POST["submit"]) ) {
	// cek apakah data berhasil di ubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "Data Berhasil diubah";
		header("Location: buku.php");
	} else {
		echo "Data Gagal diubah";
	}

}

$buku = buku("SELECT * FROM buku WHERE buku_id = $id");

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
<h3 align="center">Form Ubah Buku</h3>
<form action="" method="post">
	<?php foreach($buku as $row ) : ?>

		<input type="hidden" name="buku_id" value="<?php echo $row["buku_id"]; ?>">
		<input type="text" name="judul" id="judul" value="<?php echo $row["judul"]; ?>">
		<input type="text" name="penulis" id="penulis" value="<?php echo $row["penulis"]; ?>">
		<input type="text" name="penerbit" id="penerbit" value="<?php echo $row["penerbit"]; ?>">
		<input type="text" name="thn_terbit" id="thn_terbit" 
		placeholder="Tahun nya aja bg" value="<?php echo $row["thn_terbit"]; ?>">
		<input type="text" name="gambar" id="gambar" value="<?php echo $row["gambar"]; ?>">
		<button type="submit" name="submit" class="btn btn-success">Ubah data</button>

	<?php endforeach; ?>
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