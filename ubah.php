<?php
// konek database
require "functions.php";

// ambil id url
$id = $_GET["id"];

$mrc = query("SELECT * FROM peserta_mrc WHERE id = $id")[0];

// cek tombol kirim sudah ditekan atau belum
if (isset($_POST["kirim"])) {

        if (ubah($_POST) > 0) {
                echo
                "
      <script>
        alert('Data Berhasil Diubah');
        document.location.href = 'admin.php'; 
      </script>
    ";
        } else {
                echo "
      <script>
        alert('Data Gagal Diubah');
        document.location.href = 'admin.ph'; 
      </script>
    ";
        }
}

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
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Prompt:wght@100;300;400;700&display=swap"
        rel="stylesheet" />

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
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $mrc["id"] ?>">
                    <div class="nama-tim input"><label for="nama-tim">Nama Tim</label><input
                            value="<?= $mrc["nama_tim"] ?>" required autofocus autocomplete="off" type="text"
                            placeholder="Masukkan Nama Tim" id="nama-tim" name="nama_tim" /></div>
                    <div class="nama-instansi input"><label for="nama-instansi">Nama Instansi</label><input
                            value="<?= $mrc["nama_instansi"] ?>" required type="text" id="nama-instansi"
                            placeholder="Masukkan Nama Instansi" name="nama_instansi" />
                    </div>
                    <div class="nama-pembina input"><label for="nama-pembina">Nama Pembina (tidak wajib)</label><input
                            value="<?= $mrc["nama_pembina"] ?>" name="nama_pembina" type="text" id="nama-pembina"
                            placeholder="Masukkan Nama Pembina" />
                    </div>
                    <div class="bukti-pembayaran input">
                        <label for="bukti-pembayaran">Bukti Pembayaran</label>
                        <input value="<?= $mrc["bukti_pembayaran"] ?>" type="text" id="bukti-pembayaran" required
                            name="bukti_pembayaran" />
                    </div>

                    <div class="nama-ketua input"><label for="nama-ketua">Nama Ketua</label><input
                            value="<?= $mrc["nama_ketua"] ?>" required name="nama_ketua" type="text" id="nama-ketua"
                            placeholder="Masukkan Nama Ketua" /></div>
                    <div class="email-ketua input"><label for="email-ketua">Email Ketua</label><input
                            value="<?= $mrc["email_ketua"] ?>" required name="email_ketua" type="email" id="email-ketua"
                            placeholder="Masukkan Email Ketua" /></div>
                    <div class="wa-ketua input"><label for="wa-ketua">Nomor Whatsapp Ketua</label><input
                            value="<?= $mrc["nomor_whatsapp_ketua"] ?>" required name="nomor_whatsapp_ketua" type="tel"
                            id="wa-ketua" placeholder="Masukkan Nomor Whatsapp Ketua" /></div>
                    <div class="ktm-ketua input"><label for="ktm-ketua">KTM Ketua</label><input
                            value="<?= $mrc["ktm_ketua"] ?>" required class="unggah" name="ktm_ketua" type="text"
                            id="ktm-ketua" /></div>
                    <div class="bukti-uptwibbon-ketua input"><label for="bukti-uptwibbon-ketua">Bukti Up Twibbon
                            Ketua</label><input value="<?= $mrc["bukti_up_twibbon_ketua"] ?>" required class="unggah"
                            type="text" name="bukti_up_twibbon_ketua" id="bukti-uptwibbon-ketua" /></div>

                    <div class="nama-anggota input"><label for="nama-anggota">Nama Anggota</label><input
                            value="<?= $mrc["nama_anggota"] ?>" required name="nama_anggota" type="text"
                            id="nama-anggota" placeholder="Masukkan Nama Anggota" />
                    </div>
                    <div class="ktm-anggota input"><label for="ktm-anggota">KTM Anggota</label><input
                            value="<?= $mrc["ktm_anggota"] ?>" required class="unggah" name="ktm_anggota" type="text"
                            id="ktm-anggota" /></div>
                    <div class="bukti-uptwibbon-anggota input"><label for="bukti-uptwibbon-anggota">Bukti Up Twibbon
                            Anggota</label><input value="<?= $mrc["bukti_up_twibbon_anggota"] ?>" required
                            class="unggah" type="text" id="bukti-uptwibbon-anggota" name="bukti_up_twibbon_anggota" />
                    </div>

                    <button type="submit" name="kirim">Ubah</button>
                </form>
            </div>
            <!-- Kontent end -->
        </div>
    </section>
    <!-- Daftar lomba end -->
</body>

</html>