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
    <script src="<?= base_url ?>vendor/components/jquery/jquery.min.js"></script>

</head>

<body id="page-top" <?= !isset($_SESSION['identity']) ? "class='bg-gradient-primary'" : ""; ?>>
    <?php

    function show_error()
    {
        $error = new errorController();
        $error->index();
    }

    if (isset($_SESSION['identity'])) {

    ?>
        <!-- Page Wrapper -->

        <div id="wrapper">
            <?php require_once 'views/layout/sidebar.php'; ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <?php
                    require_once 'views/layout/topbar.php';
                    ?>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <?php
                        if (isset($_GET['controller'])) {
                            $nombre_controlador = $_GET['controller'] . 'Controller';
                        } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
                            $nombre_controlador = controller_default;
                        } else {
                            show_error();
                            exit();
                        }

                        if (class_exists($nombre_controlador)) {
                            $controlador = new $nombre_controlador();

                            if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
                                $action = $_GET['action'];
                                $controlador->$action();
                            } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
                                $action_default = action_default;
                                $controlador->$action_default();
                            } else {
                                show_error();
                            }
                        } else {
                            show_error();
                        }

                        ?>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <?php
                require_once 'views/layout/footer.php';
                ?>

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url ?>logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
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
    <script src="<?= base_url ?>assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url ?>assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url ?>assets/js/sb-admin-2.min.js"></script>
</body>

</html>