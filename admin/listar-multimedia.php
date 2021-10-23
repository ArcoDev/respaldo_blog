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
            Lista de categorias
            <small>registradas en la base de datos de inedito</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <!--<h3 class="box-title">Maneja los usuarios en esta seccion</h3>-->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="registros" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>URL</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    try {
                                     $sql = "SELECT * FROM multimedia";
                                     $resultado = $con->query($sql);
                                    } catch (Exception $e) {
                                    $error = $e->getMessage();
                                    echo $error;
                                    }
                                    while ($multi = $resultado->fetch_assoc()) {?>
                                        <tr>
                                            <td><?= $multi['url'] ?></td>
                                            <td>
                                                <a href="editar-multimedia.php?id=<?= $multi['id']?>"
                                                    class="btn btn-warning btn-flat margin" title="Editar">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" data-id="<?= $multi['id'] ?>" data-tipo="multimedia"
                                                    class="btn btn-danger btn-flat margin borrar_registro" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>URL</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
/* Agregando los templates de la plantilla */
  include_once "templates/footer.php";
?>