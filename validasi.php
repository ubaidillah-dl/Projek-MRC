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
$maksimal = 1000000;

if (isset($_POST["kirim"])) {

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
        !in_array($eks_ktm_ketua, $ekstensi) ||
        !in_array($eks_bukti_up_twibbon_ketua, $ekstensi) ||
        !in_array($eks_ktm_anggota, $ekstensi) ||
        !in_array($eks_bukti_up_twibbon_anggota, $ekstensi) ||
        ($sze_bukti_pembayaran > $maksimal) ||
        ($sze_ktm_ketua > $maksimal) ||
        ($sze_bukti_up_twibbon_ketua > $maksimal) ||
        ($sze_ktm_anggota > $maksimal) ||
        ($sze_bukti_up_twibbon_anggota > $maksimal)
    );

    if (!$error) {
        require "fungsi.php";

        if (daftar($_POST) > 0) {
            echo    '
                        <script>
                            alert("Berhasil mendaftar di MRC 2023 !");
                            document.location.href = "https://chat.whatsapp.com/BcvSS6QzrZFHr2PKZRVj41"; 
                        </script>
                    ';
        }
    } else {
        echo    '
                    <script>
                            alert("Gagal mendaftar di MRC 2023 ! \n\nPastikan ekstensi file jpg, jpeg, png atau pdf maksimal 1MB.");
                            document.location.href = "daftar.php"; 
                        </script>
                    ';
    }
}
