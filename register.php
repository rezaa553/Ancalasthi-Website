<?php

session_start();

require 'db/functions.php';

$logins = $_SESSION["login"];


if (isset($_POST["daftar"])) {
	if (pendaftaran($_POST) > 0) {
		$msg = "success";
	} else {
		$msg = "failed";
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Anggota Ancalasthi</title>
	<link rel="stylesheet" href="rep/bootstrap-4.5.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="rep/bootstrap-4.5.3-dist/css/bootstrap-datepicker.standalone.min.css">
	<link rel="icon" href="img/ans-logo-nt.png">

	<style type="text/css">
		.container {
			max-width: 960px;
		}

		.lh-condensed {
			line-height: 1.25;
		}
	</style>

</head>

<body>

	<body class="bg-light">
		<div class="container">
			<div class="py-5 text-center">
				<img class="d-block mx-auto mb-4" src="img/ans-logo.png" alt="" width="72" height="72">
				<h2>Form Pendaftaran</h2>
				<p class="lead">Dengan mengisi formulir dibawah ini maka anda menyetujui syarat dan ketentuan yang berlaku </p>
				<?php if ($msg == "success") : ?>
					<div class="alert alert-success" role="alert">
						Anda Berhasil Mendaftar
					</div>
					<a class="btn btn-secondary btn-lg btn-block" href="tentang_kami.php">Kembali</a>
				<?php endif ?>
				<?php if ($msg == "failed") : ?>
					<div class="alert alert-danger" role="alert">Pendaftaran Gagal
						<br>
						<?= mysqli_error($conn); ?>
					</div>
				<?php endif ?>
			</div>
			<div class="col-lg order-md-1">
				<h5 class="mb-3">Harap Diisi Dengan Benar</h5>
				<form class="needs-validation" action="" method="POST" novalidate>
					<div class="mb-3">
						<label for="name">Nama Lengkap</label>
						<input type="text" class="form-control" id="name" placeholder="" value="" name="name" required>
						<div class="invalid-feedback">
							Nama tidak boleh kosong
						</div>
					</div>
					<div class="mb-3">
						<label for="email">Email</span></label>
						<input type="email" class="form-control" id="email" placeholder="<?php echo $logins ?>" name="email" value="<?php echo $logins; ?>" readonly>
						<div class="invalid-feedback">
							Email tidak boleh kosong
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="phone">No. Telepon</label>
							<input type="text" class="form-control" id="phone" placeholder="08181111111" name="phone" required>
							<div class="invalid-feedback">
								No telepon wajib diisi
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="username">Tanggal Lahir</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
								</div>
								<input type="text" class="form-control datepicker text-muted" data-provide="datepicker" data-date-format="yyyy-mm-dd" id="tglLahir" name="tglLahir" required>
								<div class="invalid-feedback" style="width: 100%;">
									Harap masukkan tanggal lahir
								</div>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="address">Alamat</label>
						<input type="text" class="form-control" id="address" placeholder="Jl. Air Terjun Raya, No. 1" name="address" required>
						<div class="invalid-feedback">
							Alamat tidak boleh kosong
						</div>
					</div>
					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="kel">Kelurahan</label>
							<input type="text" class="form-control" id="kel" name="kel" required>
							<div class="invalid-feedback">
								Kelurahan wajib diisi
							</div>
						</div>
						<div class="col-md-7 mb-3">
							<label for="kec">Kecamatan</label>
							<input type="text" class="form-control" id="kec" name="kec" required>
							<div class="invalid-feedback">
								Kecamatan wajib diisi
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="city">Kota</label>
							<input type="text" class="form-control" id="city" name="city" required>
							<div class="invalid-feedback">
								Kota wajib diisi
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="state">Provinsi</label>
							<input type="text" class="form-control" id="state" name="state" required>
							<div class="invalid-feedback">
								Provinsi wajib diisi
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="zip">Kode Pos</label>
							<input type="text" class="form-control" id="zip" placeholder="" name="zip" required>
							<div class="invalid-feedback">
								Kode Pos wajib diisi
							</div>
						</div>
					</div>
					<hr class="mb-4">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="real-data" required>
						<label class="custom-control-label" for="real-data">Dengan ini saya menyatakan bahwa data yang diisi sudah benar</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="agree-tnc" required>
						<label class="custom-control-label" for="agree-tnc">Saya menyetujui syarat dan ketentuan yang berlaku</label>
					</div>
					<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit" name="daftar">Daftar</button>
				</form>
			</div>
			<footer class="my-5 pt-5 text-muted text-center text-small">
				<p class="mb-1">&copy; 2017-2020 Ancalasthi</p>
				<ul class="list-inline">
					<li class="list-inline-item"><a href="#">Privacy</a></li>
					<li class="list-inline-item"><a href="#">Terms</a></li>
					<li class="list-inline-item"><a href="#">Support</a></li>
				</ul>
			</footer>
		</div>
		<script src="rep/jquery-3.5.1.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="rep/bootstrap-4.5.3-dist/js/bootstrap.min.js"><\/script>')
		</script>
		<script src="rep/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
		<script src="rep/form-validation.js"></script>
		<script src="rep/bootstrap-4.5.3-dist/js/bootstrap-datepicker.min.js"></script>
		<script src="rep/bootstrap-4.5.3-dist/js/bootstrap-datepicker.th.min.js"></script>
		<script src="https://kit.fontawesome.com/678d6d00e7.js" crossorigin="anonymous"></script>
	</body>

</html>