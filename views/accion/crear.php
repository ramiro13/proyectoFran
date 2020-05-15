<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Acciones</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Consulta Acciones</h6>
    </div>
    <div class="card-body">
        <form class="user" action="<?= base_url ?>accion/save" method="post">
            <input type="hidden" name="id" id="id" value="<?= isset($acciones) && is_object($acciones) ? $acciones->id : ''; ?>">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="nombre">Nombres</label>
                    <input type="text" class="form-control " id="nombre" name="nombre" placeholder="Nombres" required value="<?= isset($acciones) && is_object($acciones) && isset($acciones->nombre)? $acciones->nombre : ''; ?>">
                </div>
            </div>
            <?php if (isset($respuesta['mensaje']) && $respuesta['mensaje'] == 'complete') : ?>
                <strong class="alert_green">Registro completado correctamente</strong>
            <?php elseif (isset($respuesta['mensaje'])) : ?>
                <strong class="alert_red">Registro fallido, introduce bien los datos, <?= $respuesta['mensaje'] ?></strong>
            <?php endif; ?>
            <?php $respuesta = null; ?>

            <input type="submit" value="Guardar" class="btn btn-primary btn-user " />
            <a class="btn btn-danger btn-user" href="<?= base_url ?>accion/index">Cancelar</a>

            </a>
        </form>
    </div>
</div>