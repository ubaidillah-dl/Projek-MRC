<?php

// koneksi database
include "fungsi.php";

// ambil data daru tabel peserta_mrc
$mrc = query("SELECT * FROM peserta_mrc");

if (isset($_POST["cari"])) {
    $mrc = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        img {
            height: 50px;
        }
    </style>
</head>

<body>
    <H1>Daftar Peserta MRC</H1>
    <form action="" method="post">
        <input type="text" name="keyword" autofocus autocomplete="off" placeholder="Cari Peserta"> <button type="submit" name="cari">cari</button>
        <br><br>
    </form>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama Tim</th>
            <th>Nama Instansi</th>
            <th>Nama Pembina</th>
            <th>Bukti Pembayaran</th>
            <th>Nama Ketua</th>
            <th>Email Ketua</th>
            <th>Nomor Whatsapp Ketua</th>
            <th>KTM Ketua</th>
            <th>Bukti Up Twibbon Ketua</th>
            <th>Nama Anggota</th>
            <th>KTM Anggota</th>
            <th>Bukti Up Twibbon Anggota</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mrc as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <!-- <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus Peserta ?');">Hapus</a>
                </td> -->

                <td><?= $row["nama_tim"]; ?></td>
                <td><?= $row["nama_instansi"]; ?></td>
                <td><?= $row["nama_pembina"]; ?></td>
                <td><a href="detail.php?id=<?= $row["id"]; ?>"><img src="assets/unggah/bukti_pembayaran/<?= $row["bukti_pembayaran"]; ?>" alt=""></a></td>
                <td><?= $row["nama_ketua"]; ?></td>
                <td><?= $row["email_ketua"]; ?></td>
                <td><?= $row["nomor_whatsapp_ketua"]; ?></td>
                <td><a href="detail.php?id=<?= $row["id"]; ?>"><img src="assets/unggah/ktm_ketua/<?= $row["ktm_ketua"]; ?>" alt=""></a></td>
                <td><a href="detail.php?id=<?= $row["id"]; ?>"><img src="assets/unggah/bukti_up_twibbon_ketua/<?= $row["bukti_up_twibbon_ketua"]; ?>" alt=""></a>
                </td>
                <td><?= $row["nama_anggota"]; ?></td>
                <td><a href="detail.php?id=<?= $row["id"]; ?>"><img src="assets/unggah/ktm_anggota/<?= $row["ktm_anggota"]; ?>" alt=""></a></td>
                <td><a href="detail.php?id=<?= $row["id"]; ?>"><img src="assets/unggah/bukti_up_twibbon_anggota/<?= $row["bukti_up_twibbon_anggota"]; ?>" alt="">
                    </a>
                </td>
            </tr>
            <?php $i++;  ?>
        <?php endforeach; ?>
    </table>
</body>

</html>