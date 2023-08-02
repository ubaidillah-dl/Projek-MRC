<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "event_mrc");

// ambil data daru tabel peserta_mrc
$result = mysqli_query($conn, "SELECT * FROM peserta_mrc");

// ambil data peserta mrc
// while ($mrc = mysqli_fetch_assoc($result)) {
//     var_dump($mrc["nama_ketua"]);
// }


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

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
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
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="">Ubah</a>
                    <a href="">Hapus</a>
                </td>
                <td><?= $row["nama_instansi"]; ?>
                <td><?= $row["nama_pembina"]; ?></td>
                </td>
                <td><img src="assets/unggah/bukti_pembayaran/<?= $row["bukti_pembayaran"]; ?>" alt=""></td>
                <td><?= $row["nama_ketua"]; ?></td>
                <td><?= $row["email_ketua"]; ?></td>
                <td><?= $row["nomor_whatsapp_ketua"]; ?></td>
                <td><img src="assets/unggah/ktm_ketua/<?= $row["ktm_ketua"]; ?>" alt=""></td>
                <td><img src="assets/unggah/bukti_up_twibbon_ketua/<?= $row["bukti_up_twibbon_ketua"]; ?>" alt=""></td>
                <td><?= $row["nama_anggota"]; ?></td>
                <td><img src="assets/unggah/ktm_anggota/<?= $row["ktm_anggota"]; ?>" alt=""></td>
                <td><img src="assets/unggah/bukti_up_twibbon_anggota/<?= $row["bukti_up_twibbon_anggota"]; ?>" alt=""></td>
            </tr>
            <?php $i++;  ?>
        <?php endwhile; ?>
    </table>
</body>

</html>