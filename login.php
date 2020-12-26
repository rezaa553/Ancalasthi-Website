<?php
session_start();

if (isset($_SESSION["login"])) {
  header("location: tentang_kami.php");
  exit;
}

require 'db/functions.php';

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      if ($row['is_activated'] == 1) {
        $_SESSION["login"] = $email;
        header("location: tentang_kami2.php");
        exit;
      } else {
        $msg = "not_activated";
      }
    } else {
      $msg = "wrong_pass";
    }
  }
  $error = true;
}

?>


<!DOCTYPE html>
<html>

<head>
  <title>Masuk - Ancalasthi</title>
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
  </style>
</head>

<body class="text-center">
  <form class="form-signin" action="" method="post">
    <img class="mb-4" src="img/ans-logo.png" alt="" width="150" height="150">
    <?php if ($msg == "wrong_pass") : ?>
      <div class="alert alert-danger" role="alert">Email atau Password salah!</div>
    <?php endif; ?>
    <?php if ($msg == "not_activated") : ?>
      <div class="alert alert-danger" role="alert">Akun belum diaktivasi. Silahkan cek email anda!</div>
    <?php endif; ?>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control lbl" placeholder="Password" name="password" required>
    <div class="checkbox mb-3">
      <label>
        <p>Belum mendaftar? <a href="signup.php" class="btn btn-sm btn-secondary">Daftar</a></p>
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Masuk</button>
    <a class="btn btn-cst lbl" href="index.php">Beranda</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
  </form>
</body>

</html>