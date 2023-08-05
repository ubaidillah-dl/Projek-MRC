<?php

// include "validasi.php";

$error_nama_tim = "";
$error_nama_instansi = "";
$error_bukti_pembayaran = "";
$error_nama_ketua = "";
$error_email_ketua = "";
$error_nomor_whatsapp_ketua = "";
$error_ktm_ketua = "";
$error_bukti_up_twibbon_ketua = "";
$error_nama_anggota = "";
$error_ktm_anggota = "";
$error_bukti_up_twibbon_anggota = "";
$ekstensi = ['jpg', 'jpeg', 'png', 'pdf'];

if (isset($_POST["kirim"])) {

    $nama_tim = $_POST["nama_tim"];
    $nama_instansi = $_POST["nama_instansi"];
    $nama_ketua = $_POST["nama_ketua"];
    $email_ketua = $_POST["email_ketua"];
    $nomor_whatsapp_ketua = $_POST["nomor_whatsapp_ketua"];
    $nama_anggota = $_POST["nama_anggota"];

    // Cek nama tim start
    $error_nama_tim = (empty($nama_tim) ? "Nama tim tidak boleh kosong !" : "");
    // Cek nama tim end

    // Cek nama instansi start
    $error_nama_instansi = (empty($nama_instansi) ? "Nama instansi tidak boleh kosong !" : "");
    // Cek nama instansi end

    // Cek bukti pembayaran start
    $nm_bukti_pembayaran = $_FILES["bukti_pembayaran"]["name"];
    $sze_bukti_pembayaran = $_FILES["bukti_pembayaran"]["size"];
    $err_bukti_pembayaran = $_FILES["bukti_pembayaran"]["error"];

    $eks_bukti_pembayaran = explode('.', $nm_bukti_pembayaran);
    $eks_bukti_pembayaran = strtolower(end($eks_bukti_pembayaran));

    if ($err_bukti_pembayaran === 4) {
        $error_bukti_pembayaran = "Unggah bukti pembayaran !";
    } elseif (!in_array($eks_bukti_pembayaran, $ekstensi)) {
        $error_bukti_pembayaran = "Ekstensi file harus jpg, jpeg, png dan pdf !";
    } elseif ($sze_bukti_pembayaran > 1000000) {
        $error_bukti_pembayaran = "Ukuran file maksimal 1 MB !";
    }
    // Cek bukti pembayaran end

    // Cek nama ketua start
    $error_nama_ketua = (empty($nama_ketua) ? "Nama ketua tidak boleh kosong !" : "");
    // Cek nama ketua end

    // Cek email ketua start
    if (empty($email_ketua)) {
        $error_email_ketua = "Email ketua tidak boleh kosong !";
    } elseif (!filter_var($email_ketua, FILTER_VALIDATE_EMAIL)) {
        $error_email_ketua = "Email ketua tidak sah !";
    }
    // Cek email ketua end

    // Cek nomer wa start
    $error_nomor_whatsapp_ketua = (empty($nomor_whatsapp_ketua) ? "Nomor whatsapp ketua tidak boleh kosong !" : "");
    // Cek nomer wa end

    // Cek ktm ketua start
    $nm_ktm_ketua = $_FILES["ktm_ketua"]["name"];
    $sze_ktm_ketua = $_FILES["ktm_ketua"]["size"];
    $err_ktm_ketua = $_FILES["ktm_ketua"]["error"];

    $eks_ktm_ketua = explode('.', $nm_ktm_ketua);
    $eks_ktm_ketua = strtolower(end($eks_ktm_ketua));

    if ($err_ktm_ketua === 4) {
        $error_ktm_ketua = "Unggah ktm ketua !";
    } elseif (!in_array($eks_ktm_ketua, $ekstensi)) {
        $error_ktm_ketua = "Ekstensi file harus jpg, jpeg, png dan pdf !";
    } elseif ($sze_ktm_ketua > 1000000) {
        $error_ktm_ketua = "Ukuran file maksimal 1 MB !";
    }
    // Cek ktm ketua end

    // Cek bukti up twibon ketua start
    $nm_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["name"];
    $sze_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["size"];
    $err_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["error"];

    $eks_bukti_up_twibbon_ketua = explode('.', $nm_bukti_up_twibbon_ketua);
    $eks_bukti_up_twibbon_ketua = strtolower(end($eks_bukti_up_twibbon_ketua));

    if ($err_bukti_up_twibbon_ketua === 4) {
        $error_bukti_up_twibbon_ketua = "Unggah bukti up twibbon ketua !";
    } elseif (!in_array($eks_bukti_up_twibbon_ketua, $ekstensi)) {
        $error_bukti_up_twibbon_ketua = "Ekstensi file harus jpg, jpeg, png dan pdf !";
    } elseif ($sze_bukti_up_twibbon_ketua > 1000000) {
        $error_bukti_up_twibbon_ketua = "Ukuran file maksimal 1 MB !";
    }
    // Cek bukti up twibon ketua end

    // Cek nama anggota start
    $error_nama_anggota = (empty($nama_anggota) ? "Nama anggota tidak boleh kosong !" : "");
    // Cek nama anggota end

    // Cek ktm anggota start
    $nm_ktm_anggota = $_FILES["ktm_anggota"]["name"];
    $sze_ktm_anggota = $_FILES["ktm_anggota"]["size"];
    $err_ktm_anggota = $_FILES["ktm_anggota"]["error"];

    $eks_ktm_anggota = explode('.', $nm_ktm_anggota);
    $eks_ktm_anggota = strtolower(end($eks_ktm_anggota));

    if ($err_ktm_anggota === 4) {
        $error_ktm_anggota = "Unggah ktm anggota !";
    } elseif (!in_array($eks_ktm_anggota, $ekstensi)) {
        $error_ktm_anggota = "Ekstensi file harus jpg, jpeg, png dan pdf !";
    } elseif ($sze_ktm_anggota > 1000000) {
        $error_ktm_anggota = "Ukuran file maksimal 1 MB !";
    }
    // Cek ktm anggota end

    // Cek bukti up twibon anggota start
    $nm_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["name"];
    $sze_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["size"];
    $err_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["error"];

    $eks_bukti_up_twibbon_anggota = explode('.', $nm_bukti_up_twibbon_anggota);
    $eks_bukti_up_twibbon_anggota = strtolower(end($eks_bukti_up_twibbon_anggota));

    if ($err_bukti_up_twibbon_anggota === 4) {
        $error_bukti_up_twibbon_anggota = "Unggah bukti up twibbon anggota !";
    } elseif (!in_array($eks_bukti_up_twibbon_anggota, $ekstensi)) {
        $error_bukti_up_twibbon_anggota = "Ekstensi file harus jpg, jpeg, png dan pdf !";
    } elseif ($sze_bukti_up_twibbon_anggota > 1000000) {
        $error_bukti_up_twibbon_anggota = "Ukuran file maksimal 1 MB !";
    }
    // Cek bukti up twibon anggota end

    // Cek masih ada error apa tidak
    $cek_error = (!empty($error_nama_tim) ||
        !empty($error_nama_instansi) ||
        !empty($error_bukti_pembayaran) ||
        !empty($error_nama_ketua) ||
        !empty($error_email_ketua) ||
        !empty($error_nomor_whatsapp_ketua) ||
        !empty($error_ktm_ketua) ||
        !empty($error_bukti_up_twibbon_ketua) ||
        !empty($error_nama_anggota) ||
        !empty($error_ktm_anggota) ||
        !empty($error_bukti_up_twibbon_anggota)
    );

    if (!$cek_error) {
        require "fungsi.php";

        if (daftar($_POST) > 0) {
            echo    "
                        <script>
                            alert('Berhasil mendaftar di MRC 2023 !');
                            document.location.href = 'https://chat.whatsapp.com/BcvSS6QzrZFHr2PKZRVj41'; 
                        </script>
                    ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Lomba</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Prompt:wght@100;300;400;700&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/daftar.css" />

    <!-- Favicon -->
    <link rel="shorcut icon" href="assets/LogoMRC.png" type="image/png" />
</head>

<body>
    <!-- Daftar lomba start -->
    <section class="daftar-lomba" id="Daftar-Lomba">
        <!-- Logo start -->

        <div class="logo">
            <h2>Daftar <span>Sekarang</span> Dan Raih Hadiah <span>Jutaan</span> Rupiah</h2>
            <img src="assets/LogoMRC.png" alt="" />
        </div>
        <!-- Logo end -->

        <div class="row">
            <!-- Kontent start -->
            <div class="content">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Nama tim start -->
                    <div class="nama-tim input"><label for="nama-tim">Nama Tim</label><input autofocus autocomplete="off" type="text" placeholder="Masukkan Nama Tim" id="nama-tim" name="nama_tim" /></div>
                    <div style="text-align: end; color: red; font-size: 0.7rem"><?php echo $error_nama_tim; ?></div>
                    <!-- Nama tim end -->

                    <!-- Nama instansi start -->
                    <div class="nama-instansi input"><label for="nama-instansi">Nama Instansi</label><input autocomplete="off" type="text" id="nama-instansi" placeholder="Masukkan Nama Instansi" name="nama_instansi" /></div>
                    <div style="text-align: end; color: red; font-size: 0.7rem"><?php echo $error_nama_instansi; ?>
                    </div>
                    <!-- Nama instansi start -->

                    <!-- Nama Pembina start -->
                    <div class="nama-pembina input">
                        <label for="nama-pembina">Nama Pembina <span style="color: var(--secondary); font-size: 0.8rem; font-style: italic">(tidak
                                wajib)</span></label><input autocomplete="off" name="nama_pembina" type="text" id="nama-pembina" placeholder="Masukkan Nama Pembina" />
                    </div>
                    <!-- Nama Pembina end -->

                    <!-- Bukti pembayaran start -->
                    <div class="bukti-pembayaran input">
                        <label for="bukti-pembayaran">Bukti Pembayaran</label>
                        <input type="file" id="bukti-pembayaran" name="bukti_pembayaran" />
                    </div>
                    <div style="text-align: end; color: red; font-size: 0.7rem"><?php echo $error_bukti_pembayaran;  ?>
                    </div>
                    <!-- Bukti pembayaran end -->

                    <!-- Nama ketua start -->
                    <div class="nama-ketua input"><label for="nama-ketua">Nama Ketua</label><input autocomplete="off" name="nama_ketua" type="text" id="nama-ketua" placeholder="Masukkan Nama Ketua" /></div>
                    <div style="text-align: end; color: red; font-size: 0.7rem"><?php echo $error_nama_ketua; ?>
                    </div>
                    <!-- Nama ketua start -->

                    <!-- Email ketua start -->
                    <div class="email-ketua input"><label for="email-ketua">Email Ketua</label><input autocomplete="off" name="email_ketua" type="email" id="email-ketua" placeholder="Masukkan Email Ketua" /></div>
                    <div style="text-align: end; color: red; font-size: 0.7rem"><?php echo $error_email_ketua; ?>
                    </div>
                    <!-- Email ketua end -->

                    <!-- Nomor whatsapp ketua start -->
                    <div class="wa-ketua input"><label for="wa-ketua">Nomor Whatsapp Ketua</label><input autocomplete="off" name="nomor_whatsapp_ketua" type="tel" id="wa-ketua" placeholder="Masukkan Nomor Whatsapp Ketua" /></div>
                    <div style="text-align: end; color: red; font-size: 0.7rem">
                        <?php echo $error_nomor_whatsapp_ketua; ?>
                    </div>
                    <!-- Nomor whatsapp ketua ened -->

                    <!-- Ktm ketua start -->
                    <div class="ktm-ketua input"><label for="ktm-ketua">KTM Ketua</label><input autocomplete="off" class="unggah" name="ktm_ketua" type="file" id="ktm-ketua" /></div>
                    <div style="text-align: end; color: red; font-size: 0.7rem">
                        <?php echo $error_ktm_ketua; ?>
                    </div>
                    <!-- Ktm ketua start -->

                    <!-- Bukti up twibbon ketua start -->
                    <div class="bukti-uptwibbon-ketua input"><label for="bukti-uptwibbon-ketua">Bukti Up Twibbon
                            Ketua</label><input autocomplete="off" class="unggah" type="file" name="bukti_up_twibbon_ketua" id="bukti-uptwibbon-ketua" /></div>
                    <div style="text-align: end; color: red; font-size: 0.7rem">
                        <?php echo $error_bukti_up_twibbon_ketua; ?>
                    </div>
                    <!-- Bukti up twibbon ketua end -->

                    <!-- Nama anggota start -->
                    <div class="nama-anggota input"><label for="nama-anggota">Nama Anggota</label><input autocomplete="off" name="nama_anggota" type="text" id="nama-anggota" placeholder="Masukkan Nama Anggota" /></div>
                    <div style="text-align: end; color: red; font-size: 0.7rem">
                        <?php echo $error_nama_anggota; ?>
                    </div>
                    <!-- Nama anggota start -->

                    <!-- Ktm anggota start -->
                    <div class="ktm-anggota input"><label for="ktm-anggota">KTM Anggota</label><input autocomplete="off" class="unggah" name="ktm_anggota" type="file" id="ktm-anggota" /></div>
                    <div style="text-align: end; color: red; font-size: 0.7rem">
                        <?php echo $error_ktm_anggota; ?>
                    </div>
                    <!-- Ktm anggota end -->

                    <!-- Bukti up twibbon anggota start -->
                    <div class="bukti-uptwibbon-anggota input">
                        <label for="bukti-uptwibbon-anggota">Bukti Up Twibbon Anggota</label><input autocomplete="off" class="unggah" type="file" id="bukti-uptwibbon-anggota" name="bukti_up_twibbon_anggota" />
                    </div>
                    <div style="text-align: end; color: red; font-size: 0.7rem">
                        <?php echo $error_bukti_up_twibbon_anggota; ?>
                    </div>
                    <!-- Bukti up twibbon anggota end -->

                    <button type="submit" name="kirim">Kirim</button>
                </form>
            </div>
            <!-- Kontent end -->
        </div>
    </section>
    <!-- Daftar lomba end -->
</body>

</html>