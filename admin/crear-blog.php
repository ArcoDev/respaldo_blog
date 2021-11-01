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
      <small>llena el formulario para crear el blog</small>
    </h1>
  </section>

  <div class="row">
    <div class="col-md-10">
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Guardar Blog</h3>
          </div>
          <div class="box-body">
            <!-- form start -->
            <form role="form" name="guardar-blog" id="guardar-blog-archivo" method="post"
              action="modelo-blog.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="autor">Autor</label>
                  <input type="text" class="form-control" id="autor" name="autor"
                    placeholder="Ingresa el nombre del autor">
                </div>
                <div class="form-group">
                  <label for="autor-imagen">Foto del autor</label>
                  <input type="file" id="autor-imagen" name="autor_imagen">
                </div>
                <div class="form-group">
                  <label for="fecha">Fecha de creación</label>
                  <input type="date" class="form-control" id="fecha" name="fecha">
                </div>
                <div class="form-group">
                  <label for="titulo">Titulo del blog</label>
                  <input type="text" class="form-control" id="titulo" name="titulo"
                    placeholder="Ingresa el titulo del blog">
                </div>
                <div class="form-group">
                  <label for="contenido">Contenido</label>
                  <input type="text" class="form-control" id="contenido" name="contenido"
                    placeholder="Ingresa el contenido del blog">
                </div>
                 <!-- select -->
                 <div class="form-group">
                  <label for="precio">Categoría</label>
                  <?php
                    try {
                      $consulta = "SELECT * FROM categorias";
                      $resultado = $con->query($consulta);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                  }?>
                  <select name="blog_cat" class="form-control">
                    <option>Selecciona la categoría a la que pertenecera el proyecto</option>
                    <?php while($infoSelect = mysqli_fetch_array($resultado)) { 
                      echo '<option value="'.$infoSelect['id_cat'].'">'.$infoSelect['nombre'].'</option>';
                     }?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="imagen-blog">Imagen del blog</label>
                  <input type="file" id="imagen-blog" name="blog_imagen">
                  <div
                    style="display: flex; flex-wrap: wrap; justify-content: space-between: text-align: center; margin-top: 10px;">
                    <p style="width: 50%;" class="help-block">• Medida recomendada de la imagen: <strong>1500 x
                        1500</strong> </p>
                    <p style="width: 50%;" class="help-block">• Peso ideal de la imagen, menos de <strong>1
                        MB</strong>
                    </p>
                    <p style="width: 100%;" class="help-block">• Extenciónes permitidas: <strong>jpg, png,
                        svg</strong>
                    </p>
                  </div>
                </div>
                <div id="loader" class="form-group" style="display: none;">
                  <img src="../images/loading.gif" alt="Cargando" width="100" height="100" alt="Cargando" style="margin: 10px 0 10px 20px;">
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
<script src="js/blog-ajax.js"></script>
<?php
/* Agregando los templates de la plantilla */
  include_once "templates/footer.php";
?>