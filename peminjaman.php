<?php 
require "config.php";

$pinjaman = pinjaman("SELECT * FROM peminjaman ORDER BY peminjaman DESC");

if( isset($_POST["ubah"]) ) {

  if( ubahstatus($_POST) > 0 ) {
    echo "
        <script>
          alert('Buku Telah Berhasil dikembalikan');
        </script>
        ";
        header("Location: profil.php");
        exit;
  }

}

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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#buku">Daftar Buku</a>
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
<!-- peminjaman -->
<section class="konten-buku">
  <div class="table">
    <h3>Daftar Peminjaman</h3>
    <table border="0">
      <tr>
        <th>Id Peminjam</th>
        <th>Username</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status Pinjaman</th>
        <th>Aksi</th>

      </tr>
      <?php foreach( $pinjaman as $row ) : ?>
      <tr>
        <td><?php echo $row["peminjaman"]; ?></td>
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["judul"]; ?></td>
        <td><?php echo $row["tgl_peminjaman"]; ?></td>
        <td><?php echo $row["tgl_pengembalian"]; ?></td>
        <td><?php echo $row["status_peminjaman"]; ?></td>
        <form action="" method="post">
          <td>
            <button type="submit" name="hapus" class="btn btn-success" 
              onclick="return confirm('yakin bg mau menghapus peminjam <?php echo $row["judul"]; ?>?');">Hapus
            </button>
          </td>
          <input type="hidden" name="id" value="<?php echo $row["peminjaman"]; ?>">
          <input type="hidden" name="username" value="<?php echo $row["username"]; ?>">
          <input type="hidden" name="judul" value="<?php echo $row["judul"]; ?>">
          <input type="hidden" name="pinjam" value="<?php echo $row["tgl_peminjaman"]; ?>">
          <input type="hidden" name="kembali" value="<?php echo date('d-m-Y'); ?>">
          <input type="hidden" name="status" value="<?php echo "Sudah dikembalikan"; ?>">
        </form>
      </tr>
    <?php endforeach; ?>
    </table>
  </div>
</section>



<footer class="bg-primary">
  <p class="text-center">Created by Tim <b>HEBAT</b></p>
</footer>


</body>
</html>