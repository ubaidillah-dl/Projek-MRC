<?php

// session
session_start();

$_SESSION = [];
session_unset();
session_destroy();

header("Location:masuk_admin.php");