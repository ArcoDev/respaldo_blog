<?php
/* Agregabdo los templates de la plantilla */
  include_once "functions/sesiones.php";
  include_once "functions/funciones.php";
  include_once "templates/header.php";
  include_once "templates/barra.php";
  include_once "templates/navegacionLateral.php"; 
  
?>

<style>
  .img-inedito {
    width: 500px;
    height: 500px;
  }

  @media screen and (max-width: 767px) {
    .img-inedito {
      width: 250px;
      height: 250px;
    }
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      INEDITO
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Administración del blog y multimedia del sitio web inédito</h3>
      </div>
      <center>
        <img class="img-inedito" src="../images/inedito fondo.jpg" alt="Logo Inedito">
        <div class="box-body">
          En el menú lateral, tienes las diferentes opciones para administrar el sitio web.
        </div>
      </center>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
/* Agregabdo los templates de la plantilla */
  include_once "templates/footer.php";
?>