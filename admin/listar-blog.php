<?php
/* AGregado los tempaltes de la plantilla */
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
      Lista de proyectos
      <small>registrados en la base de datos de VSI</small>
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
                  <th>Autor</th>
                  <th>Imagen Autor</th>
                  <th>Fecha de creacion</th>
                  <th>Titulo del blog</th>
                  <th>Contenido</th>
                  <th>Categoría</th>
                  <th>Imagen del blog</th>
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
                        <td><?php echo $blog['autor'] ?></td>
                        <td>
                          <center>
                            <img loading = "lazy" src="../images/autor/<?php echo $blog['img_autor']; ?>" 
                                 alt="Autor del blog" style="width:100px; height:100px; border-radius: 50%">
                          </center>
                        </td>
                        <td><?php echo $blog['fecha'] ?></td>
                        <td><?php echo $blog['titulo'] ?></td>
                        <td><?php echo $blog['contenido'] ?></td>
                        <td><?php echo $blog['nombre'] ?></td>
                        <td>
                          <center>
                            <img loading = "lazy" src="../images/blog/<?php echo $blog['img_blog']; ?>" 
                                 alt="blogs de inedito" width="200" height ="100">
                          </center>
                        </td>
                        <td>
                          <a href="editar-blog.php?id=<?php echo $blog['id']?>"
                            class="btn btn-warning btn-flat margin" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a href="#" data-id="<?php echo $blog['id']?>" data-tipo="blog"
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
                  <th>Fecha de creacion</th>
                  <th>Titulo del blog</th>
                  <th>Contenido</th>
                  <th>Categoría</th>
                  <th>Imagen del blog</th>
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
/* AGregado los tempaltes de la plantilla */
  include_once "templates/footer.php";

?>