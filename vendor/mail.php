<?php
require_once "db/koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

$conn = $koneksi;
$msg = "";

function registrasi($data)
{
    global $conn;
    global $msg;

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $token = hash('sha256', md5($email));

    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        $msg = "email_duplicate";
        return false;
        $ret = 0;
    }

    if ($password !== $password2) {
        $msg = "pass_missmatch";
        return false;
        $ret = 0;
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO users VALUES('', '$email', '$password', '', 0, 0) ");

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ancalasthi@gmail.com';
        $mail->Password = 'ydyshrekkonqfjvn';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('ancalasthi@gmail.com', 'ANCALASTHI');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Aktivasi pendaftaran Member";
        $mail->Body = "Selemat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini. <br> 
        <a href='http://localhost:8080/ancalasthi/validation.php?t=" . $token . "'>Klik Disini</a> <br>
        <p>Tim Ancalasthi</p>
        <p>Salam Lestari, Salam Ancalasthi</p> ";

        $mail->send();

        mysqli_query($conn, "UPDATE users SET token = '$token' WHERE users.email = '$email'");
        return mysqli_affected_rows($conn);
    }
}
