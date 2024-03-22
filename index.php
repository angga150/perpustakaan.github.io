<?php 
session_start();

require "config.php";

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}


$buku = buku("SELECT * FROM buku");

// cek apakah tombol submit sudah ditekan apa belum
if( isset($_POST["submit"]) ) {
  // cek apakah data berhasil di tambahan atau tidak
  if( peminjam($_POST) > 0 ) {
    echo "
        <script>
          alert('Buku Telah Berhasil dipinjam');
        </script>
        ";
        header("Location: profil.php");
  }
}

if( isset($_POST["simpan"]) ) {
  // cek apakah data berhasil di tambahan atau tidak
  if( simpankoleksi($_POST) > 0 ) {
    echo "
        <script>
          alert('Buku Telah Berhasil disimpan');
        </script>
        ";
        header("Location: profil.php");
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
        <li class="nav-item me-5 border border-dark rounded-2">
          <div class="nav-link active" aria-current="page">
            Selamat datang <?php echo $_SESSION["login"]; ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">Daftar Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profil.php">Profil</a>
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
<section class="jumbotron text-center">
  <div class="header">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="foto/naruto3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="foto/tokrev.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="foto/titan.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  </div>
</section>
<!-- akhir jumbotron -->

<!-- About me -->

<section id="about">

  <div class="content">

  
    
  <?php foreach( $buku as $row ) : ?>
    <form action="" method="post">
    <div class="card">
        <img src="foto/<?php echo $row["gambar"]; ?>">
      </a>
      <div class="card-body">
        <h2><?php echo $row["judul"]; ?></h2>
        <span>Penulis</span>
        <?php echo $row["penulis"]; ?>
        <span>Penerbit</span>
        <?php echo $row["penerbit"]; ?>

        <button type="submit" name="simpan" onclick="return confirm('Simpan Buku Sebagai Koleksi!');">
          Simpan
        </button>
        <input type="hidden" name="judulsimpan" value="<?php echo $row["judul"];?>">
        <input type="hidden" name="username" value="<?php echo $_SESSION["login"];?>">

        <span>Tahun Terbit</span>
        <?php echo $row["thn_terbit"]; ?>

        <button type="submit" name="submit" onclick="return confirm('yakin bg mau minjam buku <?php echo $row["judul"];?>?')">
          Pinjam </button>
        <input type="hidden" name="judul" value="<?php echo $row["judul"]; ?>">
        <input type="hidden" name="nama" value="<?php echo $_SESSION["login"]; ?>">
        <input type="hidden" name="pinjam" value="<?php echo date('d-m-Y'); ?>">
        <input type="hidden" name="kembali" value="<?php echo "Belum dikembalikan"; ?>">
        <input type="hidden" name="status" value="<?php echo "Masih dipinjam"; ?>">

      </div>
    </div>
    </form>
  <?php endforeach; ?>

  
    
    
  </div>

  <div class="aside">
    
    <h4>RECOMMENDED</h4>
    <img src="foto/naruto.jpg">
    <h6>Naruto Shippuden dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
    <img src="foto/solo leveling.jpg" class="jujutsu">commodo
    Solo Leveling Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h6>

    <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>
  
      

  </div>
  





  
</section>

<!-- akhit About -->

<!-- Buku -->
<section id="buku">
  <div class="container">
    
  </div>
</section>

<!-- akhir buku -->

<footer class="bg-primary">
  <p class="text-center">Created by Tim <b><u>ANGGA HAADY WIJAYA</u></b></p>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>