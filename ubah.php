<?php

// konek database
require "validasi.php";
require "fungsi.php";

// ambil id url
$id = $_GET["id"];
$mrc = query("SELECT * FROM peserta_mrc WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Ubah Data</title>

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
                        <h2>Ubah <span>Data</span> Peserta MRC</h2>
                        <img src="assets/LogoMRC.png" alt="" />
                </div>
                <!-- Logo end -->

                <div class="row">
                        <!-- Kontent start -->
                        <div class="content">
                                <form action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $mrc["id"] ?>">
                                        <input type="hidden" name="bukti_pembayaran_lama" value="<?= $mrc["bukti_pembayaran"] ?>">
                                        <input type="hidden" name="ktm_ketua_lama" value="<?= $mrc["ktm_ketua"] ?>">
                                        <input type="hidden" name="bukti_up_twibbon_ketua_lama" value="<?= $mrc["bukti_up_twibbon_ketua"] ?>">
                                        <input type="hidden" name="ktm_anggota_lama" value="<?= $mrc["ktm_anggota"] ?>">
                                        <input type="hidden" name="bukti_up_twibbon_anggota_lama" value="<?= $mrc["bukti_up_twibbon_anggota"] ?>">

                                        <!-- Nama tim start -->
                                        <div class="nama-tim input"><label for="nama-tim">Nama Tim</label><input value="<?= $mrc["nama_tim"] ?>" autofocus autocomplete="off" type="text" placeholder="Masukkan Nama Tim" id="nama-tim" name="nama_tim" /></div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem"><?php echo $error_nama_tim; ?></div>
                                        <!-- Nama tim end -->

                                        <!-- Nama instansi start -->
                                        <div class="nama-instansi input"><label for="nama-instansi">Nama Instansi</label><input value="<?= $mrc["nama_instansi"] ?>" type="text" id="nama-instansi" placeholder="Masukkan Nama Instansi" name="nama_instansi" />
                                        </div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem"><?php echo $error_nama_instansi; ?>
                                        </div>
                                        <!-- Nama instansi end -->

                                        <!-- Nama pembina start -->
                                        <div class="nama-pembina input"><label for="nama-pembina">Nama Pembina (tidak wajib)</label><input value="<?= $mrc["nama_pembina"] ?>" name="nama_pembina" type="text" id="nama-pembina" placeholder="Masukkan Nama Pembina" />
                                        </div>
                                        <!-- Nama pembina end -->

                                        <!-- Bukti pembayaran start -->
                                        <div class="bukti-pembayaran input">
                                                <label for="bukti-pembayaran">Bukti Pembayaran</label>
                                                <input type="file" id="bukti-pembayaran" name="bukti_pembayaran" />
                                        </div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem"><?php echo $error_bukti_pembayaran; ?>
                                        </div>
                                        <!-- Bukti pembayaran end -->

                                        <!-- Nama ketua start -->
                                        <div class="nama-ketua input"><label for="nama-ketua">Nama Ketua</label><input value="<?= $mrc["nama_ketua"] ?>" name="nama_ketua" type="text" id="nama-ketua" placeholder="Masukkan Nama Ketua" /></div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem"><?php echo $error_nama_ketua; ?>
                                        </div>
                                        <!-- Nama ketua end -->

                                        <!-- Email ketua start -->
                                        <div class="email-ketua input"><label for="email-ketua">Email Ketua</label><input value="<?= $mrc["email_ketua"] ?>" name="email_ketua" type="email" id="email-ketua" placeholder="Masukkan Email Ketua" /></div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem"><?php echo $error_email_ketua; ?>
                                        </div>
                                        <!-- Email ketua start -->

                                        <!-- Nomor whatsapp ketua start -->
                                        <div class="wa-ketua input"><label for="wa-ketua">Nomor Whatsapp Ketua</label><input value="<?= $mrc["nomor_whatsapp_ketua"] ?>" name="nomor_whatsapp_ketua" type="tel" id="wa-ketua" placeholder="Masukkan Nomor Whatsapp Ketua" /></div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem">
                                                <?php echo $error_nomor_whatsapp_ketua; ?>
                                        </div>
                                        <!-- Nomor whatsapp ketua start -->

                                        <!-- Ktm ketua start -->
                                        <div class="ktm-ketua input"><label for="ktm-ketua">KTM Ketua</label><input value="<?= $mrc["ktm_ketua"] ?>" class="unggah" name="ktm_ketua" type="file" id="ktm-ketua" /></div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem">
                                                <?php echo $error_ktm_ketua; ?>
                                        </div>
                                        <!-- Ktm ketua end -->

                                        <!-- Bukti up twibbon ketua start -->
                                        <div class="bukti-uptwibbon-ketua input"><label for="bukti-uptwibbon-ketua">Bukti Up Twibbon
                                                        Ketua</label><input value="<?= $mrc["bukti_up_twibbon_ketua"] ?>" class="unggah" type="file" name="bukti_up_twibbon_ketua" id="bukti-uptwibbon-ketua" /></div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem">
                                                <?php echo $error_bukti_up_twibbon_ketua; ?>
                                        </div>
                                        <!-- Bukti up twibbon ketua start -->

                                        <!-- Nama anggota start -->
                                        <div class="nama-anggota input"><label for="nama-anggota">Nama Anggota</label><input value="<?= $mrc["nama_anggota"] ?>" name="nama_anggota" type="text" id="nama-anggota" placeholder="Masukkan Nama Anggota" />
                                        </div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem">
                                                <?php echo $error_nama_anggota; ?>
                                        </div>
                                        <!-- Nama anggota end -->

                                        <!-- Ktm anggota start -->
                                        <div class="ktm-anggota input"><label for="ktm-anggota">KTM Anggota</label><input value="<?= $mrc["ktm_anggota"] ?>" class="unggah" name="ktm_anggota" type="file" id="ktm-anggota" /></div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem">
                                                <?php echo $error_ktm_anggota; ?>
                                        </div>
                                        <!-- Ktm anggota end -->

                                        <!-- Bukti up twibbon anggota start -->
                                        <div class="bukti-uptwibbon-anggota input"><label for="bukti-uptwibbon-anggota">Bukti Up Twibbon
                                                        Anggota</label><input value="<?= $mrc["bukti_up_twibbon_anggota"] ?>" class="unggah" type="file" id="bukti-uptwibbon-anggota" name="bukti_up_twibbon_anggota" />
                                        </div>
                                        <div style="text-align: end; color: red; font-size: 0.7rem">
                                                <?php echo $error_bukti_up_twibbon_anggota; ?>
                                        </div>
                                        <!-- Bukti up twibbon anggota start -->

                                        <button type="submit" name="ubah">Ubah</button>
                                </form>
                        </div>
                        <!-- Kontent end -->
                </div>
        </section>
        <!-- Daftar lomba end -->
</body>

</html>