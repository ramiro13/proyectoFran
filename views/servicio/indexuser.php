<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Servicio: <?= $categoriaModal ?></h1>
  <h4 class="h4 mb-0 text-gray-800">Inicio: <?= $horaInicio->format('Y-m-d H:i:s'); ?></h1>
</div>

<!-- Content Row -->
<div class="row">
  <?php while ($ser = $servicios->fetch_object()) : ?>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-2" style="float:left">
      <div class="card mb-2">
        <img class="card-img-top" src="<?= isset($ser->imagen) && !empty($ser->imagen) ? base_url . "uploads/servicios/" . $ser->imagen : "..." ?>" alt="Card image cap">
        <div class="card-body" style="min-height: 200px; height: 100%">
          <h5 class="card-title"><?= $ser->nombre ?></h5>
          <p class="card-text"><?= strlen($ser->descripcion) <= 100 ? $ser->descripcion : substr($ser->descripcion, 0, 97) . "..." ?></p>
          <a href="#" style="min-width: 100%; max-width: 80%" data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-info btn-icon-split">
            Ver
          </a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<div class="row ">
  <form action="">
    <a href="#" style="min-width: 100%; max-width: 80%" data-toggle="modal" data-target="#exampleModalScrollable2" class="btn btn-primary btn-user">
      Continuar
    </a>
  </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <form method="post" action="<?= base_url ?>servicio/index">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
              <!--Carousel Wrapper-->
              <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Controls-->
                <div class="text-center">
                  <a class="btn btn-success btn-circle btn-sm" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                  <a class="btn btn-success btn-circle btn-sm" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                </div>
                <!--/.Controls-->

                <!--Indicators-->
                <ol class="carousel-indicators">
                  <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                  <li data-target="#multi-item-example" data-slide-to="1"></li>

                </ol>
                <!--/.Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                  <!--First slide-->
                  <div class="carousel-item active">

                    <div class="col mb-2" style="float:left">
                      <div class="card mb-2">
                        <img class="imgMOdal" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Card title</h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/.First slide-->

                  <!--Second slide-->
                  <div class="carousel-item">

                    <div class="col mb-2" style="float:left">
                      <div class="card mb-2">
                        <img class="imgMOdal" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Card title</h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/.Second slide-->
                </div>
                <!--/.Slides-->
              </div>
              <!--/.Carousel Wrapper-->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-user" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- Modal 2-->
<div class="modal fade" id="exampleModalScrollable2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle2" aria-hidden="true">
  <form method="post" action="<?= base_url ?>servicio/saveActions">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle2">Acciones</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <input type="hidden" name="idCategoria" id="idCategoria" value="<?= isset($idCategoria) && $idCategoria > 0 ? $idCategoria : 0 ?>">
            <input type="hidden" name="categoriaModal" id="categoriaModal" value="<?= isset($categoriaModal) && !empty($categoriaModal) ? $categoriaModal : "" ?>">
            <input type="hidden" name="cliente" id="cliente" value="<?= isset($cliente) && !empty($cliente) ? $cliente : "" ?>">
            <input type="hidden" name="inicio" id="inicio" value="<?= isset($horaInicio)? date_format($horaInicio, 'Y-m-d H:i:s') : "" ?>">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Acción</th>
                  <th>Seleccionar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Acción</th>
                  <th>Seleccionar</th>
                </tr>
              </tfoot>
              <tbody>
                <?php while ($cat = $acciones->fetch_object()) : ?>
                  <tr>
                    <td>
                      <input type="hidden" name="accionModal[]" value="<?= $cat->id ?>">
                      <?= $cat->nombre; ?>
                    </td>
                    <td>
                      <input type="checkbox" name="accionSelected<?= $cat->id ?>">
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
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
<style>
  .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
  }

  .imgMOdal {
    width: 20vw;
    height: 20vw;

    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
  }
</style>