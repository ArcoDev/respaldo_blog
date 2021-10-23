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
                                    <th>Nombre de la categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    try {
                                     $sql = "SELECT * FROM categorias";
                                     $resultado = $con->query($sql);
                                    } catch (Exception $e) {
                                    $error = $e->getMessage();
                                    echo $error;
                                    }
                                    while ($cat = $resultado->fetch_assoc()) {?>
                                        <tr>
                                            <td><?= $cat['nombre'] ?></td>
                                            <td>
                                                <a href="editar-categorias.php?id=<?= $cat['id_cat']?>"
                                                    class="btn btn-warning btn-flat margin" title="Editar">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" data-id="<?= $cat['id_cat']?>" data-tipo="categoria"
                                                    class="btn btn-danger btn-flat margin borrar_registro" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre de la categoría</th>
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