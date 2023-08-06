<?php

// konek database
// $conn = mysqli_connect("localhost", "root", "", "event_mrc");
$conn = mysqli_connect("localhost", "event_mrc", "MRC@CY!WSVQuNuzlWkVzXP5g", "event_mrc");

function validasi()
{

    $ekstensi = ['jpg', 'jpeg', 'png', 'pdf'];
    $maksimal = 1000000;

    // Cek bukti pembayaran start
    $nm_bukti_pembayaran = $_FILES["bukti_pembayaran"]["name"];
    $sze_bukti_pembayaran = $_FILES["bukti_pembayaran"]["size"];
    $eks_bukti_pembayaran = explode('.', $nm_bukti_pembayaran);
    $eks_bukti_pembayaran = strtolower(end($eks_bukti_pembayaran));
    // Cek bukti pembayaran end

    // Cek ktm ketua start
    $nm_ktm_ketua = $_FILES["ktm_ketua"]["name"];
    $sze_ktm_ketua = $_FILES["ktm_ketua"]["size"];
    $eks_ktm_ketua = explode('.', $nm_ktm_ketua);
    $eks_ktm_ketua = strtolower(end($eks_ktm_ketua));
    // Cek ktm ketua end

    // Cek bukti up twibon ketua start
    $nm_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["name"];
    $sze_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["size"];
    $eks_bukti_up_twibbon_ketua = explode('.', $nm_bukti_up_twibbon_ketua);
    $eks_bukti_up_twibbon_ketua = strtolower(end($eks_bukti_up_twibbon_ketua));
    // Cek bukti up twibon ketua end

    // Cek ktm anggota start
    $nm_ktm_anggota = $_FILES["ktm_anggota"]["name"];
    $sze_ktm_anggota = $_FILES["ktm_anggota"]["size"];
    $eks_ktm_anggota = explode('.', $nm_ktm_anggota);
    $eks_ktm_anggota = strtolower(end($eks_ktm_anggota));
    // Cek ktm anggota end

    // Cek bukti up twibon anggota start
    $nm_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["name"];
    $sze_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["size"];
    $eks_bukti_up_twibbon_anggota = explode('.', $nm_bukti_up_twibbon_anggota);
    $eks_bukti_up_twibbon_anggota = strtolower(end($eks_bukti_up_twibbon_anggota));
    // Cek bukti up twibon anggota end

    $error = (!in_array($eks_bukti_pembayaran, $ekstensi) ||
        !in_array(
            $eks_ktm_ketua,
            $ekstensi
        ) ||
        !in_array($eks_bukti_up_twibbon_ketua, $ekstensi) ||
        !in_array(
            $eks_ktm_anggota,
            $ekstensi
        ) ||
        !in_array($eks_bukti_up_twibbon_anggota, $ekstensi) ||
        ($sze_bukti_pembayaran > $maksimal) ||
        ($sze_ktm_ketua > $maksimal) ||
        ($sze_bukti_up_twibbon_ketua > $maksimal) ||
        ($sze_ktm_anggota > $maksimal) ||
        ($sze_bukti_up_twibbon_anggota > $maksimal)
    );

    if ($error) {
        return false;
    } else {
        return true;
    }
}

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

    // upload gambar
    move_uploaded_file($tmp_bukti_up_twibbon_anggota, 'assets/unggah/bukti_up_twibbon_anggota/' . $nama_bukti_up_twibbon_anggota_baru);

    return $nama_bukti_up_twibbon_anggota_baru;
}
