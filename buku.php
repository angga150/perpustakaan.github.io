<?php 
require "config.php";

$buku = buku("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html>
<!-- Created by Angga Haady Wijaya
      3 Maret 2024
  Mau Custom Web Ucapan Online? DM aja di!!
* Instagram = angga_hdyy -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keterangan Buku</title>
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
<section class="konten-buku">
	<div class="table">
    <h3 align="center">Daftar Buku</h3>
    <p align="center"><a href="tambah.php" class="btn btn-success">Tambah Buku</a></p>
		<table border="0">
			<tr>
				<th>Buku Id</th>
				<th>Gambar</th>
				<th>Penulis</th>
				<th>Penerbit</th>
				<th>Tahun terbit</th>
				<th>aksi</th>
			</tr>
			<?php foreach ($buku as $row ) :?>
			<tr>
				<td><?= $row["buku_id"];?></td>
				<td><?= $row["gambar"];?></td>
				<td><?= $row["penulis"];?></td>
				<td><?= $row["penerbit"];?></td>
				<td><?= $row["thn_terbit"];?></td>
				<td>
					<a href="ubah.php?buku_id=<?= $row["buku_id"];?>" class="btn btn-warning">Edit</a>
					<a href="hapus.php?buku_id=<?= $row["buku_id"];?>" class="btn btn-danger" 
            onclick="return confirm('yakin mau menghapus buku <?php echo $row["judul"];?>?')">Hapus</a>
				</td>
			</tr>
			<?php endforeach;?>
		</table>
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