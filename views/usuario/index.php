<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Usuarios</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Consulta Usuarios
            <a href="<?= base_url ?>usuario/editar" class="btn btn-warning btn-circle btn-sm" title="Crear Nuevo">
                <i class="fas fa-plus"></i>
            </a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php while ($usu = $usuarios->fetch_object()) : ?>
                        <tr>
                            <td><?= $usu->nombre; ?></td>
                            <td><?= $usu->apellidos; ?></td>
                            <td><?= $usu->email; ?></td>
                            <td><?= $usu->rol; ?></td>
                            <td>
                                <a href="<?= base_url ?>usuario/ver&id=<?= $usu->id ?>" class="btn btn-info btn-circle btn-sm" title="Ver">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                <a href="<?= base_url ?>usuario/editar&id=<?= $usu->id ?>" class="btn btn-success btn-circle btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Custom styles for this page -->
<link href="<?= base_url ?>vendor/datatables/datatables/media/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<style type="text/css" class="init">

</style>
<script type="text/javascript" language="javascript" src="<?= base_url ?>vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url ?>vendor/datatables/datatables/media/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No hay registros disponibles",
                "info": "Mostrando página _PAGE_ of _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtered from _MAX_ total records)"
            }
        });
    });
</script>