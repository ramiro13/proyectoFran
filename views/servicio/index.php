<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Categorías</h1>
</div>

<!-- Content Row -->
<div class="row">
  <?php while ($cat = $categorias->fetch_object()) : ?>
    <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-2"> -->
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    <!-- </div> -->
  <?php endwhile; ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <form method="post" action="<?= base_url ?>servicio/index">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="mb-2">
              <label for="categoria">Categoría</label>
              <input type="text" class="form-control " id="categoriaModal" name="categoriaModal" value="" disabled>
              <input type="hidden" class="form-control " id="id" name="id" value="">
            </div>
            <div class="mb-2">
              <label for="cliente">Nombre Cliente</label>
              <input type="text" class="form-control " id="cliente" name="cliente" placeholder="Nombre Cliente" required value="<?= isset($usuarios) && is_object($usuarios) && isset($usuarios->nombre) ? $usuarios->nombre : ''; ?>">
            </div>

            <div class="mb-2">
              <label for="target">Target</label>
              <input type="text" class="form-control " id="target" name="target" placeholder="Target" required value="<?= isset($usuarios) && is_object($usuarios) && isset($usuarios->nombre) ? $usuarios->nombre : ''; ?>">
            </div>

            <div class="mb-2">
              <label for="telefono">Teléfono</label>
              <input type="tel" class="form-control phone" id="telefono" name="telefono" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
            </div>

            <div class="mb-2">
              <label for="edad">Edad</label>
              <input type="number" class="form-control phone" id="edad" name="edad" placeholder="12" pattern="[0-9]{2}" min="1" max="99" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" value="Continuar" class="btn btn-primary btn-user" />
          <button type="button" class="btn btn-danger btn-user" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>