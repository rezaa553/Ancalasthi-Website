<?php

require 'vendor/mail.php';


if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    // include("vendor/mail.php");
    $msg = "registration_success";
  }
}


?>

<!DOCTYPE html>
<html>

<head>
  <title>Daftar - Ancalasthi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="rep/bootstrap-4.5.3-dist/css/bootstrap.min.css">
  <link rel="icon" href="img/ans-logo-nt.png">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: rgb(145, 131, 80);
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .lbl {
      margin: 5px 0;
    }

    .btn-cst:hover {
      opacity: 0.5;
    }
  </style>

</head>

<body class="text-center">
  <form class="form-signin needs-validation" action="" method="post" novalidate>
    <img class="mb-4" src="img/ans-logo.png" alt="" width="150" height="150">
    <?php if ($msg == "pass_missmatch") : ?>
      <div class="alert alert-danger" role="alert">Password Tidak Sama!</div>
    <?php endif; ?>
    <?php if ($msg == "email_duplicate") : ?>
      <div class="alert alert-danger" role="alert">Email Sudah Terdaftar!</div>
    <?php endif; ?>
    <?php if ($msg == "registration_success") : ?>
      <div class="alert alert-success" role="alert">Akun berhasil didaftarkan, Silahkan buka email anda untuk verifikasi!</div>
    <?php endif; ?>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus>

    <input type="password" id="inputPassword" class="form-control lbl" placeholder="Password" name="password" required>

    <input type="password" id="inputPassword2" class="form-control" placeholder="Re-type Password" name="password2" required>
    <div class="checkbox mb-3">
      <label class="lbl">
        <p>Sudah memiliki akun? <a href="login.php" class="btn btn-sm btn-secondary">Masuk</a></p>
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Daftar</button>
    <a class="btn btn-cst lbl" href="index.php">Beranda</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
  </form>
</body>
<script src="rep/form-validation.js"></script>

</html>