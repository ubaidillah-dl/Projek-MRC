<?php

require "fungsi.php";

$id = $_GET["id"];
hapus($id);
header('Location: admin.php');
exit;
