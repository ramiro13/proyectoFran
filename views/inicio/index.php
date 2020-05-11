<!-- Page Wrapper -->

<div id="wrapper">
<?php require_once 'views/layout/sidebar.php';?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

<?php
            require_once 'views/layout/topbar.php';
?>


            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row">
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