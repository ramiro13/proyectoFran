<?php
session_start();
require_once 'config/parameters.php';
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'helpers/utils.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url ?>vendor/fortawesome/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" <?= !isset($_SESSION['identity']) ? "class='bg-gradient-primary'" : ""; ?>>
    <?php

    function show_error()
    {
        $error = new errorController();
        $error->index();
    }

    if (isset($_SESSION['identity'])) {
        require_once 'views/inicio/index.php';
    } else {
        
        $mostrarInicio = true;

        if (isset($_GET['controller'])) {
            $nombre_controlador = $_GET['controller'] . 'Controller';
        } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
            $nombre_controlador = controller_default;
        }

        if (class_exists($nombre_controlador)) {
            $controlador = new $nombre_controlador();

            if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
                $action = $_GET['action'];
                $controlador->$action();

                $mostrarInicio = false;
            }
        }

        if ($mostrarInicio) {
            require_once 'views/usuario/login.php';
        }
    }
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url ?>vendor/components/jquery/jquery.min.js"></script>
    <script src="<?= base_url ?>assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url ?>assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url ?>assets/js/sb-admin-2.min.js"></script>
</body>

</html>