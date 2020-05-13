<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Usuarios</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Consulta Usuarios</h6>
    </div>
    <div class="card-body">
        <input type="hidden" name="id" id="id" value="<?= isset($usuarios) && is_object($usuarios) ? $usuarios->id : ''; ?>">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nombre">Nombres</label>
                <input disabled type="text" class="form-control " id="nombre" name="nombre" placeholder="Nombres" required value="<?= isset($usuarios) && is_object($usuarios) ? $usuarios->nombre : ''; ?>">
            </div>
            <div class="col-sm-6">
                <label for="apellidos">Apellidos</label>
                <input disabled type="text" class="form-control " id="apellidos" name="apellidos" placeholder="Apellidos" required value="<?= isset($usuarios) && is_object($usuarios) ? $usuarios->apellidos : ''; ?>">
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="email">Email</label>
                <input disabled type="email" class="form-control " id="email" name="email" placeholder="Correo Eletrónico" required value="<?= isset($usuarios) && is_object($usuarios) ? $usuarios->email : ''; ?>">
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="rol">Rol</label>
                <select disabled id="rol" name="rol" class="form-control" require>
                    <option value="" <?= isset($usuarios) && is_object($usuarios) ? '' : 'selected'; ?>>Seleccione</option>
                    <option value="admin" <?= isset($usuarios) && is_object($usuarios) && $usuarios->rol == "admin" ? 'selected' : ''; ?>>Administrador</option>
                    <option value="user" <?= isset($usuarios) && is_object($usuarios) && $usuarios->rol == "user" ? 'selected' : ''; ?>>Usuario</option>
                </select>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="password">Password</label>
                <input disabled type="password" class="form-control " id="password" name="password" placeholder="Password" required value="">
            </div>
        </div>
        <a class="btn btn-danger btn-user" href="<?= base_url ?>usuario/index">Cancelar</a>
        </a>
    </div>
</div>