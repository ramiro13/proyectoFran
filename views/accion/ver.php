<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Acción</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Consulta Acción</h6>
    </div>
    <div class="card-body">
        <input type="hidden" name="id" id="id" value="<?= isset($acciones) && is_object($acciones) ? $acciones->id : ''; ?>">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nombre">Nombre</label>
                <input disabled type="text" class="form-control " id="nombre" name="nombre" placeholder="Nombres" required value="<?= isset($acciones) && is_object($acciones) ? $acciones->nombre : ''; ?>">
            </div>
        </div>
        <a class="btn btn-danger btn-user" href="<?= base_url ?>accion/index">Cancelar</a>
        </a>
    </div>
</div>