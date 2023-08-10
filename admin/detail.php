<?php

require "../fungsi.php";

$id = $_GET["id"];
$mrc = query("SELECT * FROM peserta_mrc WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail <?= $mrc["nama_tim"]; ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Prompt:wght@100;300;400;700&display=swap"
        rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="../css/detail.css" />

    <!-- Feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Favicon -->
    <link rel="shorcut icon" href="../assets/LogoMRC.png" type="image/png" />
</head>

<body>
    <div class="hero">
        <main class="content">
            <!-- heading start -->
            <div class="heading">
                <h1>Detail <span><?= $mrc["nama_tim"]; ?></span></h1>
            </div>
            <!-- heading end -->
            <div class="row">
                <!-- tabel start -->
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Nama Tim</th>
                        <td>: <?= $mrc["nama_tim"]; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Instansi</th>
                        <td>: <?= $mrc["nama_instansi"]; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Pembina</th>
                        <td>: <?= $mrc["nama_pembina"]; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Ketua</th>
                        <td>: <?= $mrc["nama_ketua"]; ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Whatsapp Ketua</th>
                        <td>: <?= $mrc["nomor_whatsapp_ketua"]; ?></td>
                    </tr>
                    <tr>
                        <th>Email Ketua</th>
                        <td>: <?= $mrc["email_ketua"]; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Anggota</th>
                        <td>: <?= $mrc["nama_anggota"]; ?></td>
                    </tr>
                </table>
                <!-- tabel end -->

                <!-- ktm ketua start -->
                <div class="ktm_ketua">
                    KTM Ketua
                    <img src="../assets/unggah/ktm_ketua/<?= $mrc["ktm_ketua"]; ?>" alt="" />
                </div>
                <!-- ktm ketua start -->

                <!-- ktm anggota start -->
                <div class="ktm_anggota">
                    KTM Anggota :
                    <img src="../assets/unggah/ktm_anggota/<?= $mrc["ktm_anggota"]; ?>" alt="" />
                </div>
                <!-- ktm anggota start -->

                <!-- bukti pembayaran start -->
                <div class="bukti_pembayaran">
                    Bukti Pembayaran :
                    <img src="../assets/unggah/bukti_pembayaran/<?= $mrc["bukti_pembayaran"]; ?>" alt="" />
                </div>
                <!-- bukti pembayaran start -->

                <!-- bukti up twibbon ketua start -->
                <div class="bukti_up_twibbon_ketua">
                    Bukti Up Twibbon Ketua :
                    <img src="../assets/unggah/bukti_up_twibbon_ketua/<?= $mrc["bukti_up_twibbon_ketua"]; ?>" alt="" />
                </div>
                <!-- bukti up twibbon ketua start -->

                <!-- bukti up twibbon anggota start -->
                <div class="bukti_up_twibbon_anggota">
                    Bukti Up Twibbon Anggota :
                    <img src="../assets/unggah/bukti_up_twibbon_anggota/<?= $mrc["bukti_up_twibbon_anggota"]; ?>"
                        alt="" />
                </div>
                <!-- bukti up twibbon anggota start -->
            </div>
        </main>
    </div>

    <script>
    feather.replace();
    </script>
</body>

</html>