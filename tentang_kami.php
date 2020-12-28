<?php

session_start();

if (isset($_SESSION["login"])) {
  $logins = $_SESSION["login"];
} else {
  $logins = false;
}


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Tentang kami - Ancalasthi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="rep/bootstrap-4.5.3-dist/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="icon" href="img/ans-logo-nt.png">
  <link href="rep/css/carousel.css" rel="stylesheet">

  <style>
    @font-face {
      font-family: "ocr-a-std";
      src: url("font/ocr-a-reg.ttf");
      font-style: normal;
    }

    body {
      font-family: 'Noto Sans';
    }

    .bbrand,
    .bbrand:hover,
    .bbrand:active {
      font-family: "ocr-a-std";
      letter-spacing: 3px;
      color: #CEAE4A;
      padding-right: 50px;
      font-size: 20px;
      text-decoration: none;
    }

    .navbar {
      background-color: #464805;
    }

    .nav-link a {
      color: #FCFCFB;
    }

    .cont {
      padding-top: 80px;
    }

    .profile-btn {
      color: #FFFFFF;
      text-decoration: none;
      list-style-type: none;
      list-style: none;
    }

    .profile-btn:hover {
      text-decoration: none;
      color: #CEAE4A;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    .btn-primary {
      color: #918350;
      background-color: #464805;
      border-color: #918350;
    }

    .btn-primary:hover {
      background-color: #464805;
      border-color: #918350;
    }

    .carousel {
      margin-bottom: 100px;
      font-family: 'Roboto';
    }

    .profile {
      margin-bottom: 10px;
    }

    .arti-ans {
      margin-top: 150px;

    }

    .arti-ans p {
      text-align: justify;

    }

    .card-text {
      padding-bottom: 20px;
    }

    .card-text p {
      padding-bottom: 60px;
    }

    .visi-misi {
      margin-top: 80px;
    }



    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;

      }
    }

    @media(max-width: 767px) {
      .card {
        margin-left: auto;
        margin-right: auto;
      }

      .ans-log {
        width: 250px;
        height: 250px;
        margin: auto;
      }

      .arti-ans h2 {
        font-size: 28px;
        text-align: center;
      }
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark">
      <div class="container-xl">
        <a class=" bbrand" href="index.php">ANCALASTHI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle 	navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link active" href="#">Tentang Kami<span class="sr-only">( current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Visi & Misi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Hubungi Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled " href="#" tabindex="-1" aria-disabled="true	">Administrasi</a>
            </li>
          </ul>
          <?php if (isset($_SESSION["login"])) : ?>
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown no-arrow">
                <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="	button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false	"><?php echo $logins ?></a>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="logout.php">Logout</a>
                  <a class="dropdown-item" href="register.php">Daftar Anggota</a>
                </div>
              </li>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </header>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/car-1.jpg" style="height:auto; box-sizing: border-box;"></svg>
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Arti dan Makna Nama Ancalasthi</h1>
            <p>ANCALASTHI merupakan gabungan dari bahasa sangsekerta yaitu "Ancala" yang artinya bukit atau gunung dan "Asthi" yang artinya permata.</p>
            <p><a class="btn btn-lg btn-primary" href="#ArtiAncalasthi" role="button">Lebih Lanjut</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <img src="img/car-3.jpg" alt="" style="height:1000px; box-sizing: border-box;"></svg>
        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/car-2.jpg" style="height:auto; box-sizing: border-box;"></svg>
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>One more for good measure.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container-sm" id="Founder">
    <hr>
    <div class="row justify-content-center">
      <div class="col-md-auto profile">
        <div class="card shadow-sm" style="width: 350px;">
          <img src="img/rizky.jpg" class="card-img-top" alt="Rizky">
          <div class="card-body">
            <h5 class="card-title">Ahmad Rizky Mudzakir</h5>
            <h6 class="card-text font-italic text-muted">Co-Founder</h6>
            <p class="card-text">"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo eum enim in?"</p>
          </div>
        </div>
      </div>
      <div class="col-md-auto profile">
        <div class="card shadow-sm" style="width: 350px;">
          <img src="img/falah.jpg" class="card-img-top" alt="Falah">
          <div class="card-body">
            <h5 class="card-title">Falah Noer Kusuma</h5>
            <h6 class="card-text font-italic text-muted">Founder</h6>
            <p class="card-text">"Some quick example text to build on the card title and make up the bulk of the card's content."</p>
          </div>
        </div>
      </div>
      <div class="col-md-auto profile">
        <div class="card shadow-sm" style="width: 350px;">
          <img src="img/reza.jpg" class="card-img-top" alt="Reza">
          <div class="card-body">
            <h5 class="card-title">Reza Falich Syaifullah S.</h5>
            <h6 class="card-text font-italic text-muted">Co-Founder</h6>
            <p class="card-text">"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, minus!"</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-sm arti-ans" id="ArtiAncalasthi">
    <div class="row justify-content-center">
      <div class="col-sm-5 ans-log">
        <img class="img-fluid " src="img/ans-logo-nt.png" alt="">
      </div>
      <div class="col-sm-6">
        <h2 class="blog-post-title">Arti dan Makna Nama Ancalasthi</h2>
        <br>
        <p>Ancala mewakilkan sejarah awal terbentuknya Ancalasthi oleh 3 orang yang sedang melakukan pendakian ke Gunung Gede Pangrango pada tanggal 21 juli 2017 dan memutuskan untuk membentuk kelompok baru serta membuat komitmen.</p>
        <blockquote>
          <p>Asthi berasal dari bahasa sangsekerta artinya permata yang melambangkan keinginan awal terbentuknya Ancalasthi yaitu menjadi kelompok yang berharga bagi orang lain. Jika digabungkan dengan Ancala berarti bukit atau gunung yang berharga seperti permata.</p>
        </blockquote>
        <p>Asthi juga merupakan singkatan dari kalimat "sungai laut hampiri" yang bermakna bukan hanya gunung tetapi sungai sampai laut-pun Ancalasthi akan menghampirinya.</p>
        <p>Ancalasthi juga mewakili siklus panjang air hujan dari gunung hingga laut yang bermakna Ancalasthi akan selalu ada di setiap musim dan waktu.</p>
      </div>
    </div>
  </div>
  <div class="container-sm visi-misi" id="VisiMisi">
    <div class="row justify-content-center">
      <div class="col-sm-5">
        <h2 class="blog-post-title">Visi</h2>
        <br>
        <p>Ancalasthi sebagai wadah berkumpulnya para pemuda penggiat kegiatan outdoor yang bersifat kekeluargaan, kebersamaan, solidaritas, loyalitas, kesamaan minat dan menjadi organisasi yang berkenen bagi generasi muda.</p>
      </div>
      <div class="col-sm-6">
        <h2 class="blog-post-title">Misi</h2>
        <br>
        <ul>
          <li>Menjaklankan organisasi secara baik dengan satu tujian yang sama.</li>
          <li>Memberikan wadah berkumpulnya para pemuda penggiat kegiatan outdoor.</li>
          <li>Meningkatkan kekeluargaan, kebersamaan, solidaritas, dan loyalitas antar anggota dan masyarakat sekitar.</li>
        </ul>
      </div>
    </div>
  </div>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy;2020 Ancalasthi</p>
  </footer>
</body>
<script src="rep/jquery-3.5.1.js"></script>
<script>
  window.jQuery || document.write('<script src="rep/jquery-3.5.1.min.js"><\/script>')
</script>
<script src="rep/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>

</html>