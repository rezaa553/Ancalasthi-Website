<?php

require 'db/koneksi.php';

$conn = $koneksi;

$token = $_GET['t'];
$dbCheck = mysqli_query($conn, "SELECT * FROM users WHERE token = '$token' AND is_activated='0'");
$result = mysqli_num_rows($dbCheck);

if ($result > 0) {
    mysqli_query($conn, "UPDATE users SET is_activated='1' WHERE token = '$token' AND is_activated='0'");
    $msg = "activated";
} else {
    $msg = "invalid token";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivasi Akun - Ancalasthi</title>
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
        <?php if ($msg == "activated") : ?>
            <div class="alert alert-success" role="alert">Akun anda telah aktif. Silahkan login untuk melanjutkan.</div>
            <a class="btn btn-sm btn-secondary" href="login.php">Login</a>
        <?php endif; ?>
        <?php if ($msg == "invalid token") : ?>
            <div class="alert alert-warning" role="alert">Link yang anda masukkan salah atau akun sudah aktif.</div>
        <?php endif; ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
</body>

</html>