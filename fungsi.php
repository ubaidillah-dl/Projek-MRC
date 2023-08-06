<?php

// konek database
$conn = mysqli_connect("localhost", "root", "", "event_mrc");
// $conn = mysqli_connect("localhost", "event_mrc", "MRC@CY!WSVQuNuzlWkVzXP5g", "event_mrc");

// variabel
$ekstensi = ['jpg', 'jpeg', 'png', 'pdf'];
$maksimal = 1000000;

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

    if (
        !$bukti_pembayaran ||
        !$ktm_ketua ||
        !$bukti_up_twibbon_ketua ||
        !$ktm_anggota ||
        !$bukti_up_twibbon_anggota
    ) {
        return false;
    }

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
    global $ekstensi, $maksimal;

    $nama_bukti_pembayaran = $_FILES["bukti_pembayaran"]["name"];
    $tmp_bukti_pembayaran = $_FILES["bukti_pembayaran"]["tmp_name"];
    $sze_bukti_pembayaran = $_FILES["bukti_pembayaran"]["size"];

    // cek ekstensi 
    $eks_bukti_pembayaran = explode('.', $nama_bukti_pembayaran);
    $eks_bukti_pembayaran = strtolower(end($eks_bukti_pembayaran));

    if (!in_array($eks_bukti_pembayaran, $ekstensi) || $sze_bukti_pembayaran > $maksimal) {
        return false;
    }

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
    global $ekstensi, $maksimal;

    $nama_ktm_ketua = $_FILES["ktm_ketua"]["name"];
    $tmp_ktm_ketua = $_FILES["ktm_ketua"]["tmp_name"];
    $sze_ktm_ketua = $_FILES["ktm_ketua"]["size"];

    // cek ekstensi
    $eks_ktm_ketua = explode('.', $nama_ktm_ketua);
    $eks_ktm_ketua = strtolower(end($eks_ktm_ketua));

    if (!in_array($eks_ktm_ketua, $ekstensi) || $sze_ktm_ketua > $maksimal) {
        return false;
    }

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
    global $ekstensi, $maksimal;

    $nama_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["name"];
    $tmp_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["tmp_name"];
    $sze_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["size"];

    // cek ekstensi
    $eks_bukti_up_twibbon_ketua = explode('.', $nama_bukti_up_twibbon_ketua);
    $eks_bukti_up_twibbon_ketua = strtolower(end($eks_bukti_up_twibbon_ketua));

    if (!in_array($eks_bukti_up_twibbon_ketua, $ekstensi) || $sze_bukti_up_twibbon_ketua > $maksimal) {
        return false;
    }

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
    global $ekstensi, $maksimal;

    $nama_ktm_anggota = $_FILES["ktm_anggota"]["name"];
    $tmp_ktm_anggota = $_FILES["ktm_anggota"]["tmp_name"];
    $sze_ktm_anggota = $_FILES["ktm_anggota"]["size"];

    // cek ekstensi
    $eks_ktm_anggota = explode('.', $nama_ktm_anggota);
    $eks_ktm_anggota = strtolower(end($eks_ktm_anggota));

    if (!in_array($eks_ktm_anggota, $ekstensi) || $sze_ktm_anggota > $maksimal) {
        return false;
    }

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
    global $ekstensi, $maksimal;

    $nama_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["name"];
    $tmp_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["tmp_name"];
    $sze_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["size"];

    // cek ekstensi
    $eks_bukti_up_twibbon_anggota = explode('.', $nama_bukti_up_twibbon_anggota);
    $eks_bukti_up_twibbon_anggota = strtolower(end($eks_bukti_up_twibbon_anggota));

    if (!in_array($eks_bukti_up_twibbon_anggota, $ekstensi) || $sze_bukti_up_twibbon_anggota > $maksimal) {
        return false;
    }

    // buat nama baru random
    $nama_bukti_up_twibbon_anggota_baru = uniqid('', true);
    $nama_bukti_up_twibbon_anggota_baru .= '.';
    $nama_bukti_up_twibbon_anggota_baru .= $eks_bukti_up_twibbon_anggota;

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

function daftar_admin($data)
{
    global $conn;

    $nama = $data["nama"];
    $nim = $data["nim"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfirmasi_password = mysqli_real_escape_string($conn, $data["konfirmasi_password"]);
    $error = "";
    // cek nim apa sudah terdaftar
    $result = mysqli_query($conn, "SELECT nim FROM admin_mrc WHERE nim = '$nim'");
    if (mysqli_fetch_assoc($result)) {
        $error = "NIM sudah terdaftar di admin MRC 2023 !";
        return $error;
        die;
    }

    // cek password dan konfirmasinya
    if ($password !== $konfirmasi_password) {
        $error = "Konfirmasi password tidak sama !";
        return $error;
        die;
    }

    // ekripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO admin_mrc VALUES ('', '$nama', '$nim', '$password')");

    return mysqli_affected_rows($conn);
}

function masuk_admin($data)
{

    global $conn;

    $nim = $data["nim"];
    $password = $data["password"];

    // cek nim
    $result = mysqli_query($conn, "SELECT * FROM admin_mrc WHERE nim = '$nim'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            $_SESSION["masuk"] = true;

            header("Location:halaman_admin.php");
        } else {
            $error = "Password salah !";
        }
    } else {
        $error = "NIM belum terdaftar sebagai admin MRC 2023 !";
    }

    return $error;
}
