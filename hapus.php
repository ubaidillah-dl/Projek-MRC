<?php

require "functions.php";

$id = $_GET["id"];

if (hapus($id) > 0) {
    echo
    "
      <script>
        alert('Peserta Berhasil Dihapus');
        document.location.href = 'admin.php'; 
      </script>
    ";
} else {
    "
      <script>
        alert('Peserta Gagal Dihapus');
        document.location.href = 'admin.php'; 
      </script>
    ";
}
