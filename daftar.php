<?php

require "fungsi.php";

if (isset($_POST["kirim"])) {

    if (daftar($_POST) > 0) {
        echo    '
                        <script>
                            alert("Berhasil mendaftar di MRC 2023 !");
                            document.location.href = "https://chat.whatsapp.com/BcvSS6QzrZFHr2PKZRVj41"; 
                        </script>
                    ';
    } else {
        echo    '
                    <script>
                        alert("Gagal mendaftar di MRC 2023 \n\nPastikan ekstensi file jpg, jpeg, png atau pdf maksimal 1MB !");
                        document.location.href = "daftar.php"; 
                    </script>
                ';
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
                    <div class="nama-tim input"><label for="nama-tim">Nama Tim</label><input required autofocus autocomplete="off" type="text" placeholder="Masukkan Nama Tim" id="nama-tim" name="nama_tim" /></div>
                    <!-- Nama tim end -->

                    <!-- Nama instansi start -->
                    <div class="nama-instansi input"><label for="nama-instansi">Nama Instansi</label><input required autocomplete="off" type="text" id="nama-instansi" placeholder="Masukkan Nama Instansi" name="nama_instansi" /></div>
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
                        <input required type="file" id="bukti-pembayaran" name="bukti_pembayaran" />
                    </div>
                    <!-- Bukti pembayaran end -->

                    <!-- Nama ketua start -->
                    <div class="nama-ketua input"><label for="nama-ketua">Nama Ketua</label><input required autocomplete="off" name="nama_ketua" type="text" id="nama-ketua" placeholder="Masukkan Nama Ketua" /></div>
                    <!-- Nama ketua start -->

                    <!-- Email ketua start -->
                    <div class="email-ketua input"><label for="email-ketua">Email Ketua</label><input required autocomplete="off" name="email_ketua" type="email" id="email-ketua" placeholder="Masukkan Email Ketua" /></div>
                    <!-- Email ketua end -->

                    <!-- Nomor whatsapp ketua start -->
                    <div class="wa-ketua input"><label for="wa-ketua">Nomor Whatsapp Ketua</label><input required autocomplete="off" name="nomor_whatsapp_ketua" type="tel" id="wa-ketua" placeholder="Masukkan Nomor Whatsapp Ketua" /></div>
                    <!-- Nomor whatsapp ketua ened -->

                    <!-- Ktm ketua start -->
                    <div class="ktm-ketua input"><label for="ktm-ketua">KTM Ketua</label><input required autocomplete="off" class="unggah" name="ktm_ketua" type="file" id="ktm-ketua" /></div>
                    <!-- Ktm ketua start -->

                    <!-- Bukti up twibbon ketua start -->
                    <div class="bukti-uptwibbon-ketua input"><label for="bukti-uptwibbon-ketua">Bukti Up Twibbon
                            Ketua</label><input required autocomplete="off" class="unggah" type="file" name="bukti_up_twibbon_ketua" id="bukti-uptwibbon-ketua" /></div>
                    <!-- Bukti up twibbon ketua end -->

                    <!-- Nama anggota start -->
                    <div class="nama-anggota input"><label for="nama-anggota">Nama Anggota</label><input required autocomplete="off" name="nama_anggota" type="text" id="nama-anggota" placeholder="Masukkan Nama Anggota" /></div>
                    <!-- Nama anggota start -->

                    <!-- Ktm anggota start -->
                    <div class="ktm-anggota input"><label for="ktm-anggota">KTM Anggota</label><input required autocomplete="off" class="unggah" name="ktm_anggota" type="file" id="ktm-anggota" /></div>
                    <!-- Ktm anggota end -->

                    <!-- Bukti up twibbon anggota start -->
                    <div class="bukti-uptwibbon-anggota input">
                        <label for="bukti-uptwibbon-anggota">Bukti Up Twibbon Anggota</label><input required autocomplete="off" class="unggah" type="file" id="bukti-uptwibbon-anggota" name="bukti_up_twibbon_anggota" />
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