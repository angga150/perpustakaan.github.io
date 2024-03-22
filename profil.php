<?php 
session_start();
require "config.php";

$user = $_SESSION['login'];

$pinjaman = pinjaman("SELECT * FROM peminjaman WHERE username = '$user' ORDER BY peminjaman DESC");

$koleksi = koleksi("SELECT * FROM koleksi WHERE username = '$user'");

$nama = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");
$result = mysqli_fetch_assoc($nama);

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

if( isset($_POST["simpan"]) ) {
  if( hapussimpanan($_POST) ) {
    echo "<script>alert('buku berhasil dihapus ke koleksi');</script>";
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
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,224L17.1,202.7C34.3,181,69,139,103,106.7C137.1,75,171,53,206,74.7C240,96,274,160,309,176C342.9,192,377,160,411,154.7C445.7,149,480,171,514,160C548.6,149,583,107,617,85.3C651.4,64,686,64,720,96C754.3,128,789,192,823,186.7C857.1,181,891,107,926,101.3C960,96,994,160,1029,202.7C1062.9,245,1097,267,1131,277.3C1165.7,288,1200,288,1234,256C1268.6,224,1303,160,1337,138.7C1371.4,117,1406,139,1423,149.3L1440,160L1440,0L1422.9,0C1405.7,0,1371,0,1337,0C1302.9,0,1269,0,1234,0C1200,0,1166,0,1131,0C1097.1,0,1063,0,1029,0C994.3,0,960,0,926,0C891.4,0,857,0,823,0C788.6,0,754,0,720,0C685.7,0,651,0,617,0C582.9,0,549,0,514,0C480,0,446,0,411,0C377.1,0,343,0,309,0C274.3,0,240,0,206,0C171.4,0,137,0,103,0C68.6,0,34,0,17,0L0,0Z"></path></svg>
<!-- peminjaman -->
<section class="konten-buku">
<div class="jumbotronn text-center">
  <img src="foto/<?php echo $result['gambar'];?>" alt="angga" width="200" class="rounded-circle img-thumbnail">
  <h1 class="display-4"><?php echo $result['nama']; ?></h1>
  <p class="lead"><?php echo $result['alamat']; ?> / Mahasiswa Jurusan INFORMATIKA</p>
</div>
    <h3 class="text-center">Koleksi Buku</h3>
    <table border="0">
      <tr>
        <th>Username</th>
        <th>Judul Buku</th>
        <th>Aksi</th>
      </tr>
      <?php foreach( $koleksi as $row ) : ?>
      <tr>
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["judul"]; ?></td>
        <td>
          <button type="submit" name="hapussimpanan" class="btn btn-danger">Hapus</button>
        </td>
      </tr>
      <?php endforeach; ?>
      
    </table>
  </div>
</section>
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
            <button type="submit" name="ubah" class="btn btn-success" 
              onclick="return confirm('yakin bg mau kembalikan buku <?php echo $row["judul"]; ?>?');">Kembalikan
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


<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,64L26.7,85.3C53.3,107,107,149,160,160C213.3,171,267,149,320,165.3C373.3,181,427,235,480,224C533.3,213,587,139,640,117.3C693.3,96,747,128,800,160C853.3,192,907,224,960,224C1013.3,224,1067,192,1120,197.3C1173.3,203,1227,245,1280,234.7C1333.3,224,1387,160,1413,128L1440,96L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path></svg>
<footer class="bg-primary">
  <p class="text-center">Created by Tim <b>HEBAT</b></p>
</footer>


</body>
</html>