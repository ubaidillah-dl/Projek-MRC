<?php

// session
session_start();

if (!isset($_SESSION["masuk"])) {
  header("Location:masuk_admin.php");
  exit;
}

// koneksi database
include "../fungsi.php";

// pagination
$jumlah_data_perhalaman = 13;
$jumlah_data = count(query("SELECT * FROM peserta_mrc"));
$jumlah_halaman = ceil($jumlah_data / $jumlah_data_perhalaman);
$halaman_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awal_data = ($jumlah_data_perhalaman * $halaman_aktif) - $jumlah_data_perhalaman;

// ini untuk membatasi nomer halaman yang tampil pada pagination
$jumlah_no_halaman = 1;
$nomer_awal = ($halaman_aktif > $jumlah_no_halaman) ? $halaman_aktif - $jumlah_no_halaman : 1;
$nomer_akhir = ($halaman_aktif < ($jumlah_halaman - $jumlah_no_halaman)) ? $halaman_aktif + $jumlah_no_halaman : $jumlah_halaman;

// ambil data daru tabel peserta_mrc
$mrc = query("SELECT * FROM peserta_mrc LIMIT $awal_data, $jumlah_data_perhalaman");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Prompt:wght@100;300;400;700&display=swap"
        rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="../css/halaman_admin.css" />

    <!-- Feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Favicon -->
    <link rel="shorcut icon" href="../assets/LogoMRC.png" type="image/png" />
</head>

<body>
    <div class="hero">
        <main class="content">
            <div class="row">
                <!-- heading start -->
                <div class="heading">
                    <h1>Daftar <span>Peserta</span> MRC</h1>
                </div>
                <!-- heading end -->

                <!-- tabel start -->
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr class="head">
                        <th class="no">No.</th>
                        <th class="detail">Detail</th>
                        <th class="nama_tim">Nama Tim</th>
                        <th class="hilang nama_instansi">Nama Instansi</th>
                        <th class="hilang nama_pembina">Nama Pembina</th>
                        <th class="nama_ketua">Nama Ketua</th>
                        <th class="nama_anggota hilang">Nama Anggota</th>
                    </tr>

                    <!-- data dari database start -->
                    <?php $i = 1; ?>
                    <?php foreach ($mrc as $row) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td>
                            <a target="_blank" href="detail.php?id=<?= $row["id"]; ?>"><i data-feather="eye"></i></a>
                        </td>

                        <td><?= $row["nama_tim"]; ?></td>
                        <td class="hilang"><?= $row["nama_instansi"]; ?></td>
                        <td class="hilang"><?= $row["nama_pembina"]; ?></td>
                        <td><?= $row["nama_ketua"]; ?></td>
                        <td class="hilang"><?= $row["nama_anggota"]; ?></td>

                        </td>
                    </tr>
                    <?php $i++;  ?>
                    <?php endforeach; ?>
                    <!-- data dari database end -->
                </table>
                <!-- tabel end -->

                <!-- bawah start -->
                <div class="bawah">
                    <div class="keluar">
                        <a class="keluar" href="keluar_admin.php"><i data-feather="log-out"></i></a>
                    </div>

                    <div class="pagination">
                        <?php if ($halaman_aktif > 1) : ?>
                        <a href="?halaman=<?= $halaman_aktif - 1; ?>">&laquo;</a>
                        <?php endif; ?>

                        <?php for ($i = $nomer_awal; $i <= $nomer_akhir; $i++) : ?>

                        <?php if ($i == $halaman_aktif) : ?>
                        <a class="halaman_aktif" href="?halaman=<?= $i; ?>"><?= $i ?></a>
                        <?php else : ?>
                        <a class="halaman_nonaktif" href="?halaman=<?= $i; ?>"><?= $i ?></a>
                        <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($halaman_aktif < $jumlah_halaman) : ?>
                        <a href="?halaman=<?= $halaman_aktif + 1; ?>">&raquo;</a>
                        <?php endif; ?>
                    </div>



                    <div class="unduh">
                        <a class="unduh" href=""><i data-feather="download"></i></a>
                    </div>
                </div>
                <!-- bawah end -->
            </div>
        </main>
    </div>

    <script>
    feather.replace();
    </script>
</body>

</html>