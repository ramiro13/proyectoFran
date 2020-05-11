<?php

session_start();

require_once '../config/parameters.php';

if (isset($_SESSION['identity'])) {
    unset($_SESSION['identity']);
}

if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
}
// http://localhost/proyectofran/inicio
header("Location: " . base_url );

exit;
