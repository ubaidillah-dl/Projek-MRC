<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "event_mrc");

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

function tambah($data)
{
    global $conn;

    $nama_tim = htmlspecialchars($data["nama_tim"]);
    $nama_instansi = htmlspecialchars($data["nama_instansi"]);
    $nama_pembina = htmlspecialchars($data["nama_pembina"]);
    $nama_ketua = htmlspecialchars($data["nama_ketua"]);
    $email_ketua = htmlspecialchars($data["email_ketua"]);
    $nomor_whatsapp_ketua = htmlspecialchars($data["nomor_whatsapp_ketua"]);
    $nama_anggota = htmlspecialchars($data["nama_anggota"]);

    //upload gambar 
    $bukti_pembayaran = up_bukti_pembayaran();
    $ktm_ketua = up_ktm_ketua();
    $bukti_up_twibbon_ketua = up_bukti_up_twibbon_ketua();
    $ktm_anggota = up_ktm_anggota();
    $bukti_up_twibbon_anggota = up_bukti_up_twibbon_anggota();

    if ($bukti_pembayaran === false || $ktm_ketua === false || $bukti_up_twibbon_ketua === false || $ktm_anggota === false || $bukti_up_twibbon_anggota === false) {
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


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// upload file start

function up_bukti_pembayaran()
{
    // bukti pembayaran
    $nama_bukti_pembayaran = $_FILES["bukti_pembayaran"]["name"];
    $ukuran_bukti_pembayaran = $_FILES["bukti_pembayaran"]["size"];
    $error_bukti_pembayaran = $_FILES["bukti_pembayaran"]["error"];
    $tmp_bukti_pembayaran = $_FILES["bukti_pembayaran"]["tmp_name"];

    if ($error_bukti_pembayaran === 4) {
        echo "  <script>
                    alert('Unggah bukti pembayaran !');
                </script>";

        return false;
    }

    // cek ekstensi
    $ekstensi = ['jpg', 'jpeg', 'png'];
    $eks_bukti_pembayaran = explode('.', $nama_bukti_pembayaran);
    $eks_bukti_pembayaran = strtolower(end($eks_bukti_pembayaran));

    if (in_array($eks_bukti_pembayaran, $ekstensi) === false) {
        echo "  <script>
                    alert('Ekstensi bukti pembayaran tidak sesuai (jpg, jpeg, png) !');
                </script>";

        return false;
    }

    // cek ukuran file
    if ($ukuran_bukti_pembayaran > 1000000) {
        echo "  <script>
                    alert('Ukuran bukti pembayaran lebih dari 1MB !');
                </script>";

        return false;
    }

    // upload gambar
    // buat nama baru random
    $nama_bukti_pembayaran_baru = uniqid('', true);
    $nama_bukti_pembayaran_baru .= '.';
    $nama_bukti_pembayaran_baru .= $eks_bukti_pembayaran;

    move_uploaded_file($tmp_bukti_pembayaran, 'assets/unggah/bukti_pembayaran/' . $nama_bukti_pembayaran_baru);

    return $nama_bukti_pembayaran_baru;
}

function up_ktm_ketua()
{
    // ktm ketua
    $nama_ktm_ketua = $_FILES["ktm_ketua"]["name"];
    $ukuran_ktm_ketua = $_FILES["ktm_ketua"]["size"];
    $error_ktm_ketua = $_FILES["ktm_ketua"]["error"];
    $tmp_ktm_ketua = $_FILES["ktm_ketua"]["tmp_name"];

    if ($error_ktm_ketua === 4) {
        echo "  <script>
                    alert('Unggah ktm ketua !');
                </script>";

        return false;
    }

    // cek ekstensi
    $ekstensi = ['jpg', 'jpeg', 'png'];
    $eks_ktm_ketua = explode('.', $nama_ktm_ketua);
    $eks_ktm_ketua = strtolower(end($eks_ktm_ketua));

    if (in_array($eks_ktm_ketua, $ekstensi) === false) {
        echo "  <script>
                    alert('Ekstensi ktm ketua tidak sesuai (jpg, jpeg, png) !');
                </script>";

        return false;
    }

    // cek ukuran file
    if ($ukuran_ktm_ketua > 1000000) {
        echo "  <script>
                    alert('Ukuran ktm ketua lebih dari 1MB !');
                </script>";

        return false;
    }

    // upload gambar
    // buat nama baru random
    $nama_ktm_ketua_baru = uniqid('', true);
    $nama_ktm_ketua_baru .= '.';
    $nama_ktm_ketua_baru .= $eks_ktm_ketua;


    move_uploaded_file($tmp_ktm_ketua, 'assets/unggah/ktm_ketua/' . $nama_ktm_ketua_baru);

    return $nama_ktm_ketua_baru;
}

function up_bukti_up_twibbon_ketua()
{
    // bukti up wibbon ketua
    $nama_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["name"];
    $ukuran_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["size"];
    $error_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["error"];
    $tmp_bukti_up_twibbon_ketua = $_FILES["bukti_up_twibbon_ketua"]["tmp_name"];

    if ($error_bukti_up_twibbon_ketua === 4) {
        echo "  <script>
                    alert('Unggah bukti up twibbon ketua !');
                </script>";

        return false;
    }

    // cek ekstensi
    $ekstensi = ['jpg', 'jpeg', 'png'];
    $eks_bukti_up_twibbon_ketua = explode('.', $nama_bukti_up_twibbon_ketua);
    $eks_bukti_up_twibbon_ketua = strtolower(end($eks_bukti_up_twibbon_ketua));

    if (in_array($eks_bukti_up_twibbon_ketua, $ekstensi) === false) {
        echo "  <script>
                    alert('Ekstensi bukti up twibbon ketua tidak sesuai (jpg, jpeg, png) !');
                </script>";

        return false;
    }

    // cek ukuran file
    if ($ukuran_bukti_up_twibbon_ketua > 1000000) {
        echo "  <script>
                    alert('Ukuran bukti up twibbon ketua lebih dari 1MB !');
                </script>";

        return false;
    }

    // upload gambar
    // buat nama baru random
    $nama_bukti_up_twibbon_ketua_baru = uniqid('', true);
    $nama_bukti_up_twibbon_ketua_baru .= '.';
    $nama_bukti_up_twibbon_ketua_baru .= $eks_bukti_up_twibbon_ketua;

    move_uploaded_file($tmp_bukti_up_twibbon_ketua, 'assets/unggah/bukti_up_twibbon_ketua/' . $nama_bukti_up_twibbon_ketua_baru);

    return $nama_bukti_up_twibbon_ketua_baru;
}

function up_ktm_anggota()
{
    // ktm ketua
    $nama_ktm_anggota = $_FILES["ktm_anggota"]["name"];
    $ukuran_ktm_anggota = $_FILES["ktm_anggota"]["size"];
    $error_ktm_anggota = $_FILES["ktm_anggota"]["error"];
    $tmp_ktm_anggota = $_FILES["ktm_anggota"]["tmp_name"];

    if ($error_ktm_anggota === 4) {
        echo "  <script>
                    alert('Unggah ktm anggota !');
                </script>";

        return false;
    }

    // cek ekstensi
    $ekstensi = ['jpg', 'jpeg', 'png'];
    $eks_ktm_anggota = explode('.', $nama_ktm_anggota);
    $eks_ktm_anggota = strtolower(end($eks_ktm_anggota));

    if (in_array($eks_ktm_anggota, $ekstensi) === false) {
        echo "  <script>
                    alert('Ekstensi ktm anggota tidak sesuai (jpg, jpeg, png) !');
                </script>";

        return false;
    }

    // cek ukuran file 
    if ($ukuran_ktm_anggota > 1000000) {
        echo "  <script>
                    alert('Ukuran ktm anggota lebih dari 1MB !');
                </script>";

        return false;
    }

    // upload gambar
    // buat nama baru random
    $nama_ktm_anggota_baru = uniqid('', true);
    $nama_ktm_anggota_baru .= '.';
    $nama_ktm_anggota_baru .= $eks_ktm_anggota;
    move_uploaded_file($tmp_ktm_anggota, 'assets/unggah/ktm_anggota/' . $nama_ktm_anggota_baru);

    return $nama_ktm_anggota_baru;
}

function up_bukti_up_twibbon_anggota()
{
    // bukti up wibbon anggota
    $nama_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["name"];
    $ukuran_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["size"];
    $error_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["error"];
    $tmp_bukti_up_twibbon_anggota = $_FILES["bukti_up_twibbon_anggota"]["tmp_name"];

    if ($error_bukti_up_twibbon_anggota === 4) {
        echo "  <script>
                    alert('Unggah bukti up twibbon anggota !');
                </script>";

        return false;
    }

    // cek ekstensi
    $ekstensi = ['jpg', 'jpeg', 'png'];
    $eks_bukti_up_twibbon_anggota = explode('.', $nama_bukti_up_twibbon_anggota);
    $eks_bukti_up_twibbon_anggota = strtolower(end($eks_bukti_up_twibbon_anggota));

    if (in_array($eks_bukti_up_twibbon_anggota, $ekstensi) === false) {
        echo "  <script>
                    alert('Ekstensi bukti up twibbon ketua tidak sesuai (jpg, jpeg, png) !');
                </script>";

        return false;
    }

    // cek ukuran file
    if ($ukuran_bukti_up_twibbon_anggota > 1000000) {
        echo "  <script>
                    alert('Ukuran bukti up twibbon anggota lebih dari 1MB !');
                </script>";

        return false;
    }

    // upload gambar
    // buat nama baru random
    $nama_bukti_up_twibbon_anggota_baru = uniqid('', true);
    $nama_bukti_up_twibbon_anggota_baru .= '.';
    $nama_bukti_up_twibbon_anggota_baru .= $eks_bukti_up_twibbon_anggota;
    move_uploaded_file($tmp_bukti_up_twibbon_anggota, 'assets/unggah/bukti_up_twibbon_anggota/' . $nama_bukti_up_twibbon_anggota_baru);

    return $nama_bukti_up_twibbon_anggota_baru;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// upload file end

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
    $bukti_pembayaran = htmlspecialchars($data["bukti_pembayaran"]);
    $nama_ketua = htmlspecialchars($data["nama_ketua"]);
    $email_ketua = htmlspecialchars($data["email_ketua"]);
    $nomor_whatsapp_ketua = htmlspecialchars($data["nomor_whatsapp_ketua"]);
    $ktm_ketua = htmlspecialchars($data["ktm_ketua"]);
    $bukti_up_twibbon_ketua = htmlspecialchars($data["bukti_up_twibbon_ketua"]);
    $nama_anggota = htmlspecialchars($data["nama_anggota"]);
    $ktm_anggota = htmlspecialchars($data["ktm_anggota"]);
    $bukti_up_twibbon_anggota = htmlspecialchars($data["bukti_up_twibbon_anggota"]);

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
