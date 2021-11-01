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
            Lista de Blogs
            <small>registrados en la base de datos de inedito</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="registros" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Autor</th>
                                    <th>Imagen Autor</th>
                                    <th>Fecha de creación</th>
                                    <th>Titulo del blog</th>
                                    <th>Contenido</th>
                                    <th>Categoria</th>
                                    <th>Imagen del blog</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    try {
                                     $sql = "SELECT *
                                             FROM blog bl
                                             INNER JOIN categorias cat
                                             ON bl.categoria = cat.id_cat";
                                     $resultado = $con->query($sql);
                                    } catch (Exception $e) {
                                    $error = $e->getMessage();
                                    echo $error;
                                    }
                                    while ($blog = $resultado->fetch_assoc()) {?>
                                        <tr>
                                            <td><?= $blog['autor'] ?></td>
                                            <td>
                                            <center>
                                              <img loading = "lazy" src="../images/autor/<?php echo $blog['img_autor']; ?>" 
                                                  alt="Autor del blog" style="width:100px; height:100px; border-radius: 50%">
                                            </center>
                                            </td>
                                            <td><?= $blog['fecha'] ?></td>
                                            <td><?= $blog['titulo'] ?></td>
                                            <td><?= $blog['contenido'] ?></td>
                                            <td><?= $blog['nombre'] ?></td>
                                            <td>
                                            <center>
                                              <img loading = "lazy" src="../images/blog/<?php echo $blog['img_blog']; ?>" 
                                                  alt="Autor del blog" width="200" height ="100">
                                            </center>
                                            </td>
                                            <td>
                                                <a href="editar-blog.php?id=<?= $blog['id']?>"
                                                    class="btn btn-warning btn-flat margin" title="Editar">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="#" data-id="<?= $blog['id']?>" data-tipo="blog"
                                                    class="btn btn-danger btn-flat margin borrar_registro" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Autor</th>
                                    <th>Imagen Autor</th>
                                    <th>Fecha de creación</th>
                                    <th>Titulo del blog</th>
                                    <th>Contenido</th>
                                    <th>Categoria</th>
                                    <th>Imagen del blog</th>
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
<script src="js/jquery.min.js"></script>
<script src="js/blog-ajax.js"></script>
<?php 
     include_once 'templates/footer.php';
?>