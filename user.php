<?php 
require "config.php";

$user = user("SELECT * FROM user");

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
    </button>s
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
    <h3 align="center">Daftar User</h3>
		<table border="0">
			<tr>
				<th>No</th>
				<th>User ID</th>
				<th>Username</th>
			</tr>
      <?php $no = 1; ?>
			<?php foreach ($user as $row ) :?>
			<tr>
				<td><?= $no;?></td>
				<td><?= $row["user_id"];?></td>
				<td><?= $row["username"];?></td>
			</tr>
      <?php $no++; ?>
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