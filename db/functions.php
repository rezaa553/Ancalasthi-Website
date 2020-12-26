<?php

require 'koneksi.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

$conn = $koneksi;
$msg = "";
$msg_telp = "";

function registrasii($data)
{
	global $conn;
	global $msg;

	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	$result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
          alert ('Email sudah terdaftar!')
          </script>";
		return false;
	}

	if ($password !== $password2) {
		$msg = "pass_missmatch";
		//	echo "<script>
		//      alert ('Password tidak sama!')
		//      </script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($conn, "INSERT INTO users VALUES('', '$email', '$password', '', 0) ");

	return mysqli_affected_rows($conn);
}

function validateEmail($data)
{

	$email = strtolower(stripslashes($data["email"]));

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}

function pendaftaran($data)
{

	global $conn;
	global $msg_telp;

	$nama = ucfirst($data["name"]);
	$email = strtolower(stripslashes($data["email"]));
	$phone = filter_var($data["phone"], FILTER_SANITIZE_NUMBER_INT);
	$telp = str_replace("-", "", $phone);
	$tglLahir = $data["tglLahir"];
	$alamat = $data["address"];
	$kelurahan = $data["kel"];
	$kecamatan = $data["kec"];
	$kota = $data["city"];
	$provinsi = $data["state"];
	$kodePos = $data["zip"];

	$result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
	$sql = "INSERT INTO anggota (nama, email, telp, tglLahir, alamat, kelurahan, kecamatan, kota, provinsi, kodePos) VALUES('$nama', '$email', '$telp', '$tglLahir', '$alamat', '$kelurahan', '$kecamatan', '$kota', '$provinsi', '$kodePos')";

	if (mysqli_fetch_assoc($result)) {
		mysqli_query($conn, $sql);
		return mysqli_affected_rows($conn);
	}
}

function kirimEmail($data)
{
	require "vendor/autoload.php";

	$email = strtolower(stripslashes($data["email"]));
	$token = hash('sha256', md5($email));

	$mail = new PHPMailer(true);
	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'psbtestman1@gmail.com';
	$mail->Password = 'PSBtestman1';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;

	$mail->setFrom('psbtestman1@gmail.com', 'ANACONDA');
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject = "Aktivasi pendaftaran Member";
	$mail->Body = "Selemat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini. <br> <a href='http://localhost/activation.php?t=" . $token . "'>http://localhost/activation.php?t=" . $token . "</a>  ";
}
