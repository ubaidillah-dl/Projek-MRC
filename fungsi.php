<?php

// konek database
// $conn = mysqli_connect("localhost", "root", "", "event_mrc");
$conn = mysqli_connect("localhost", "event_mrc", "MRC@CY!WSVQuNuzlWkVzXP5g", "event_mrc");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function daftar($data)
{
    global $conn;

    $nama_tim = htmlspecialchars($data["nama_tim"]);
    $nama_instansi = htmlspecialchars($data["nama_instansi"]);
    $nama_pembina = htmlspecialchars($data["nama_pembina"]);
    $nama_ketua = htmlspecialchars($data["nama_ketua"]);
    $email_ketua = htmlspecialchars($data["email_ketua"]);
    $nomor_whatsapp_ketua = htmlspecialchars($data["nomor_whatsapp_ketua"]);
    $nama_anggota = htmlspecialchars($data["nama_anggota"]);

    $bukti_pembayaran = up_bukti_pembayaran();
    $ktm_ketua = up_ktm_ketua();
    $bukti_up_twibbon_ketua = up_bukti_up_twibbon_ketua();
    $ktm_anggota = up_ktm_anggota();
    $bukti_up_twibbon_anggota = up_bukti_up_twibbon_anggota();

    $query = "INSERT INTO peserta_mrc VALUES ('',
              '$nama_tim',
              '$nama_instansi', 
              '$nama_pembina', 
              '$bukti_pembayaran',
              '$nama_ketua', 
              '$email_ketua', 
              '$nomor_whatsapp_ketua', 
              '$ktm_ketua',
              '$bukti_up_twibbon_ketua', 
              '$nama_anggota', 
              '$ktm_anggota', 
              '$bukti_up_twibbon_anggota'
            )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function up_bukti_pembayaran()
{
    $nama_bukti_pembayaran = $_FILES["bukti_pembayaran"]["name"];
    $tmp_bukti_pembayaran = $_FILES["bukti_pembayaran"]["tmp_name"];

    // cek ekstensi
    $eks_bukti_pembayaran = explode('.', $nama_bukti_pembayaran);
    $eks_bukti_pembayaran = strtolower(end($eks_bukti_pembayaran));

    // buat nama baru random
    $nama_bukti_pembayaran_baru = uniqid('', true);
    $nama_bukti_pembayaran_baru .= '.';
    $nama_bukti_pembayaran_baru .= $eks_bukti_pembayaran;

    if (isset($_POST["ubah"])) {
        $bukti_pembayaran_lama = $_POST["bukti_pembayaran_lama"];
        $nama_bukti_pembayaran_baru = ($_FILES["bukti_pembayaran"]["error"] === 4) ? $nama_bukti_pembayaran_baru = $bukti_pembayaran_lama : $nama_bukti_pembayaran_baru = $nama_bukti_pembayaran_baru;
    }

    // upload gambar
    move_uploaded_file($tmp_bukti_pembayaran, 'assets/unggah/bukti_pembayaran/' . $nama_bukti_pembayaran_baru);

    return $nama_bukti_pembayaran_baru;
}

function up_ktm_ketua()
{
    $nama_ktm_ketua = $_FILES["ktm_ketua"]["name"];
    $tmp_ktm_ketua = $_FILES["ktm_ketua"]["tmp_name"];

    // cek ekstensi
    $eks_ktm_ketua = explode('.', $nama_ktm_ketua);
    $eks_ktm_ketua = strtolower(end($eks_ktm_ketua));

    // buat nama baru random
    $nama_ktm_ketua_baru = uniqid('', true);
    $nama_ktm_ketua_baru .= '.';
    $nama_ktm_ketua_baru .= $eks_ktm_ketua;

    if (isset($_POST["ubah"])) {
        $ktm_ketua_lama = $_POST["ktm_ketua_lama"];
        $nama_ktm_ketua_baru = ($_FILES["ktm_ketua"]["error"] === 4) ? $nama_ktm_ketua_baru = $ktm_ketua_lama : $nama_ktm_ketua_baru = $nama_ktm_ketua_baru;
    }

    // upload gambar
    move_uploaded_file($tmp_ktm_ketua, 'assets/unggah/ktm_ketua/' . $nama_ktm_ketua_baru);

    return $nama_ktm_ketua_baru;
}

function up_bukti_up_twibbon_ketua()
{
    $nama_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["name"];
    $tmp_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["tmp_name"];

    // cek ekstensi
    $eks_bukti_up_twibbon_ketua = explode('.', $nama_bukti_up_twibbon_ketua);
    $eks_bukti_up_twibbon_ketua = strtolower(end($eks_bukti_up_twibbon_ketua));

    // buat nama baru random
    $nama_bukti_up_twibbon_ketua_baru = uniqid('', true);
    $nama_bukti_up_twibbon_ketua_baru .= '.';
    $nama_bukti_up_twibbon_ketua_baru .= $eks_bukti_up_twibbon_ketua;

    if (isset($_POST["ubah"])) {
        $bukti_up_twibbon_ketua_lama = $_POST["bukti_up_twibbon_ketua_lama"];
        $nama_bukti_up_twibbon_ketua_baru = ($_FILES["bukti_up_twibbon_ketua"]["error"] === 4) ? $nama_bukti_up_twibbon_ketua_baru = $bukti_up_twibbon_ketua_lama : $nama_bukti_up_twibbon_ketua_baru = $nama_bukti_up_twibbon_ketua_baru;
    }

    // upload gambar
    move_uploaded_file($tmp_bukti_up_twibbon_ketua, 'assets/unggah/bukti_up_twibbon_ketua/' . $nama_bukti_up_twibbon_ketua_baru);

    return $nama_bukti_up_twibbon_ketua_baru;
}

function up_ktm_anggota()
{
    $nama_ktm_anggota = $_FILES["ktm_anggota"]["name"];
    $tmp_ktm_anggota = $_FILES["ktm_anggota"]["tmp_name"];

    // cek ekstensi
    $eks_ktm_anggota = explode('.', $nama_ktm_anggota);
    $eks_ktm_anggota = strtolower(end($eks_ktm_anggota));

    // buat nama baru random
    $nama_ktm_anggota_baru = uniqid('', true);
    $nama_ktm_anggota_baru .= '.';
    $nama_ktm_anggota_baru .= $eks_ktm_anggota;

    if (isset($_POST["ubah"])) {
        $ktm_anggota_lama = $_POST["ktm_anggota_lama"];
        $nama_ktm_anggota_baru = ($_FILES["ktm_anggota"]["error"] === 4) ? $nama_ktm_anggota_baru = $ktm_anggota_lama : $nama_ktm_anggota_baru = $nama_ktm_anggota_baru;
    }

    // upload gambar
    move_uploaded_file($tmp_ktm_anggota, 'assets/unggah/ktm_anggota/' . $nama_ktm_anggota_baru);

    return $nama_ktm_anggota_baru;
}

function up_bukti_up_twibbon_anggota()
{
    $nama_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["name"];
    $tmp_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["tmp_name"];


    // cek ekstensi
    $eks_bukti_up_twibbon_anggota = explode('.', $nama_bukti_up_twibbon_anggota);
    $eks_bukti_up_twibbon_anggota = strtolower(end($eks_bukti_up_twibbon_anggota));

    // buat nama baru random
    $nama_bukti_up_twibbon_anggota_baru = uniqid('', true);
    $nama_bukti_up_twibbon_anggota_baru .= '.';
    $nama_bukti_up_twibbon_anggota_baru .= $eks_bukti_up_twibbon_anggota;

    if (isset($_POST["ubah"])) {
        $bukti_up_twibbon_anggota_lama = $_POST["bukti_up_twibbon_anggota_lama"];
        $nama_bukti_up_twibbon_anggota_baru = ($_FILES["bukti_up_twibbon_anggota"]["error"] === 4) ? $nama_bukti_up_twibbon_anggota_baru = $bukti_up_twibbon_anggota_lama : $nama_bukti_up_twibbon_anggota_baru = $nama_bukti_up_twibbon_anggota_baru;
    }

    // upload gambar
    move_uploaded_file($tmp_bukti_up_twibbon_anggota, 'assets/unggah/bukti_up_twibbon_anggota/' . $nama_bukti_up_twibbon_anggota_baru);

    return $nama_bukti_up_twibbon_anggota_baru;
}

function cari($keyword)
{
    $query = "SELECT * FROM peserta_mrc WHERE 
            nama_tim LIKE '%$keyword%' OR 
            nama_instansi LIKE '%$keyword%' OR
            nama_pembina LIKE '%$keyword%' OR
            nama_ketua LIKE '%$keyword%' OR
            email_ketua LIKE '%$keyword%' OR
            nomor_whatsapp_ketua LIKE '%$keyword%' OR
            nama_anggota LIKE '%$keyword%'
            ";
    return query($query);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM peserta_mrc WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nama_tim = htmlspecialchars($data["nama_tim"]);
    $nama_instansi = htmlspecialchars($data["nama_instansi"]);
    $nama_pembina = htmlspecialchars($data["nama_pembina"]);
    $nama_ketua = htmlspecialchars($data["nama_ketua"]);
    $email_ketua = htmlspecialchars($data["email_ketua"]);
    $nomor_whatsapp_ketua = htmlspecialchars($data["nomor_whatsapp_ketua"]);
    $nama_anggota = htmlspecialchars($data["nama_anggota"]);

    $bukti_pembayaran = up_bukti_pembayaran();
    $ktm_ketua = up_ktm_ketua();
    $bukti_up_twibbon_ketua = up_bukti_up_twibbon_ketua();
    $ktm_anggota = up_ktm_anggota();
    $bukti_up_twibbon_anggota = up_bukti_up_twibbon_anggota();

    $query = "UPDATE peserta_mrc SET 
              nama_tim = '$nama_tim',
              nama_instansi = '$nama_instansi',
              nama_pembina = '$nama_pembina',
              bukti_pembayaran = '$bukti_pembayaran',
              nama_ketua = '$nama_ketua',
              email_ketua = '$email_ketua', 
              nomor_whatsapp_ketua = '$nomor_whatsapp_ketua', 
              ktm_ketua = '$ktm_ketua',
              bukti_up_twibbon_ketua = '$bukti_up_twibbon_ketua', 
              nama_anggota = '$nama_anggota',
              ktm_anggota = '$ktm_anggota',
              bukti_up_twibbon_anggota = '$bukti_up_twibbon_anggota'
              WHERE id = '$id'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
