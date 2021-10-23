<?php
/* Agregando los templates de la plantilla */
  include_once "functions/sesiones.php";
  include_once "functions/funciones.php";
  $id = $_GET['id'];
  if(!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Error");
  }
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
                        <h3 class="box-title">Guardar Categoría</h3>
                    </div>
                    <div class="box-body">
                        <?php 
                        $sql = "SELECT * FROM  `categorias` WHERE `id_cat` = $id ";
                        $resultado = $con->query($sql); 
                        $categoria = $resultado->fetch_assoc();
                    ?>
                        <!-- form start -->
                        <form role="form" name="guardar-categoria" id="guardar-categoria-archivo" method="post"
                            action="modelo-categoria.php" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="categoria">Categoría</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria"
                                        placeholder="Ingresa el nombre de la categoria"
                                        value="<?= $categoria['nombre'] ?>">
                                </div>
                                <div class="box-footer">
                                    <input type="hidden" name="registro" value="actualizar">
                                    <input type="hidden" name="id_registro" value="<?= $categoria['id_cat']; ?> ">
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

<?php
/* Agregando los templates de la plantilla */
  include_once "templates/footer.php";
?>