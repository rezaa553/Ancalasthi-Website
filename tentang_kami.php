<?php
session_start();
require 'db/functions.php';


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
	<link rel="icon" href="img/ans-logo-nt.png">

	<style>
		@font-face {
			font-family: "ocr-a-std";
			src: url("font/ocr-a reg.ttf");
			font-style: normal;
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
	</style>

</head>

<body>
	<nav class="navbar navbar-expand-md fixed-top navbar-dark">
		<div class="container-xl">
			<a class=" bbrand" href="index.php">ANCALASTHI</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link active" href="#">Tentang Kami<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Visi & Misi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Hubungi Kami</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled " href="#" tabindex="-1" aria-disabled="true">Administrasi</a>
					</li>
				</ul>
				<?php if (isset($_SESSION["login"])) : ?>
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown no-arrow">
							<a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $logins ?></a>
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
	<div class="container-fluid cont">
		<div class="container-xl">
			<div class="blog-post">
				<h2 class="blog-post-title">Arti dan Makna Nama Ancalasthi</h2>
				<p class="blog-post-meta">November 1, 2018 by <a href="#">Falah Noer Kusuma</a></p>

				<p>ANCALASTHI merupakan gabungan dari bahasa sangsekerta yaitu "Ancala" yang artinya bukit atau gunung dan "Asthi" yang artinya permata.</p>
				<hr>
				<p>Ancala mewakilkan sejarah awal terbentuknya Ancalasthi oleh 3 orang yang sedang melakukan pendakian ke Gunung Gede Pangrango pada tanggal 21 juli 2017 dan memutuskan untuk membentuk kelompok baru serta membuat komitmen.</p>
				<blockquote>
					<p>Asthi berasal dari bahasa sangsekerta artinya permata yang melambangkan keinginan awal terbentuknya Ancalasthi yaitu menjadi kelompok yang berharga bagi orang lain. Jika digabungkan dengan Ancala berarti bukit atau gunung yang berharga seperti permata.</p>
				</blockquote>
				<p>Asthi juga merupakan singkatan dari kalimat "sungai laut hampiri" yang bermakna bukan hanya gunung tetapi sungai sampai laut-pun Ancalasthi akan menghampirinya.</p>
				<p>Ancalasthi juga mewakili siklus panjang air hujan dari gunung hingga laut yang bermakna Ancalasthi akan selalu ada di setiap musim dan waktu.</p>
			</div>
		</div>
	</div>
</body>
<script src="rep/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
<script>
	window.jQuery || document.write('<script src="rep/jquery-3.5.1.min.js"><\/script>')
</script>
<script src="rep/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>

</html>