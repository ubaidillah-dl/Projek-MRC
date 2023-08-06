<?php

// session
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location:masuk_admin.php");
    exit;
}

// konek database
require '../fungsi.php';

$error = "";
$notif = "";

// cek tombol kirim
if (isset($_POST["daftar_admin"])) {

    if (daftar_admin($_POST) === 1) {
        $notif = "Berhasil mendaftar sebagai admin MRC 2023";
    } else {
        $error = daftar_admin($_POST);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Prompt:wght@100;300;400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="../css/daftar.css" />

    <!-- Favicon -->
    <link rel="shorcut icon" href="../assets/LogoMRC.png" type="image/png" />
</head>

<body>
    <!-- Daftar lomba start -->
    <section class="daftar-lomba" id="Daftar-Lomba">

        <!-- Logo start -->
        <div class="logo">
            <h2>Daftar <span>Admin</span></h2>
            <img src="../assets/LogoMRC.png" alt="" />
        </div>
        <!-- Logo end -->

        <div class="row">
            <!-- Kontent start -->
            <div class="content">
                <form action="" method="post" enctype="multipart/form-data">

                    <!-- Error start -->
                    <div style="text-align: end; color: red; font-size: 0.7rem">
                        <?php echo  $error = (isset($error)) ? $error : ''; ?></div>
                    <div style="text-align: end; color: green; font-size: 0.7rem">
                        <?php echo  $notif = (isset($notif)) ? $notif : ''; ?></div>
                    <!-- Error end -->

                    <!-- Nama start -->
                    <div class="nama-tim input"><label for="nama">Nama</label><input autofocus autocomplete="off" id="nama" required type="text" placeholder="Masukkan Nama" name="nama" /></div>
                    <!-- Nama end -->

                    <!-- Nim start -->
                    <div class="nama-tim input"><label for="nim">NIM</label><input id="nim" autofocus autocomplete="off" required type="text" placeholder="Masukkan NIM" name="nim" /></div>
                    <!-- Nim tim end -->

                    <!-- Password start -->
                    <div class="nama-instansi input"><label for="password">Password</label><input id="password" autocomplete="off" required type="password" placeholder="Masukkan Password" name="password" /></div>
                    <!-- Password start -->

                    <!-- Konfirmasi password start -->
                    <div class="nama-instansi input"><label for="konfirmasi_password">Password</label><input id="konfirmasi_password" autocomplete="off" required type="password" placeholder="Konfirmasi Password" name="konfirmasi_password" /></div>
                    <!-- Konfirmasi password end -->

                    <button type="submit" name="daftar_admin">Daftar</button>
                </form>
            </div>
            <!-- Kontent end -->
        </div>
    </section>
    <!-- Daftar lomba end -->
</body>

</html>