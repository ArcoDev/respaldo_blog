<?php
/* Agregando los templates de la plantilla */
  include_once "functions/sesiones.php";
  include_once "functions/funciones.php";
  include_once "templates/header.php";
  include_once "templates/barra.php";
  include_once "templates/navegacionLateral.php"; 

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blog inédito
    </h1>
  </section>

  <div class="row">
    <div class="col-md-10">
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Guardar Url de la multimedia</h3>
          </div>
          <div class="box-body">
            <!-- form start -->
            <form role="form" name="guardar-multimedia" id="guardar-multimedia-archivo" method="post"
              action="modelo-multimedia.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="url">URL del video</label>
                  <input type="text" class="form-control" id="url" name="url"
                    placeholder="Ingresa la url de la multimedia">
                </div>
                <div id="loader" class="form-group" style="display: none;">
                  <img src="../images/loading.gif" alt="Cargando" style="margin: 10px 0 10px 20px;">
                  <p>Espere un momento porfavor, se esta cargando la imagen...</p>
                </div>
                <div class="box-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

<script src="js/jquery.min.js"></script>
<script src="js/multimedia-ajax.js"></script>

<?php
/* Agregando los templates de la plantilla */
  include_once "templates/footer.php";

?>