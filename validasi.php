<?php

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
// $cek = "s";

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

if (isset($_POST["ubah"])) {

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
        $error_bukti_pembayaran = "";
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
        $error_ktm_ketua = "";
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
        $error_bukti_up_twibbon_ketua = "";
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
        $error_ktm_anggota = "";
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
        $error_bukti_up_twibbon_anggota = "";
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

        if (ubah($_POST) > 0) {
            echo    "
                        <script>
                            alert('Data berhasil diubah !');
                            document.location.href = 'admin.php'; 
                        </script>
                    ";
        }
    }
}
