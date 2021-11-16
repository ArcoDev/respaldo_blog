<?php
error_reporting(E_ALL ^ E_NOTICE);
/* Crear blog y mandar ifo a la BD */
include_once "functions/funciones.php";
$autor = $_POST['autor'];
$url_autor = $_POST['autor_imagen'];
$fecha = $_POST['fecha'];
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$blog_cat = $_POST['blog_cat'];
$url_blog = $_POST['blog_imagen'];
$id_registroEditar = $_POST["id_registro"];

if($_POST['registro'] == 'nuevo') {
    //Directorios
    $dirAutor = "../images/autor/";
    
    // Imagen del autor
    if(!is_dir($dirAutor)) {
        mkdir($dirAutor, 0755, true);
    }
    if(move_uploaded_file($_FILES['autor_imagen']['tmp_name'], $dirAutor . $_FILES['autor_imagen']['name'])) {
        
        $imagen_autor = $_FILES['autor_imagen']['name'];
        $autor_resultado = "Se cargo correctamente";
        
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    
    //Imagen del blog
    $dirBlog = "../images/blog/";
    if(!is_dir($dirBlog)) {
        mkdir($dirBlog, 0755, true);
    }
    if(move_uploaded_file($_FILES['blog_imagen']['tmp_name'], $dirBlog . $_FILES['blog_imagen']['name'])) {
        
        $imagen_blog = $_FILES['blog_imagen']['name'];
        $blog_resultado = "Se cargo correctamente";

    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    //Consulta SQL
    try {
        include_once "functions/funciones.php";
        $stmt = $con->prepare("INSERT INTO blog (autor, img_autor, fecha, titulo, contenido, categoria, img_blog)
                               VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssis", $autor, $imagen_autor, $fecha, $titulo, $contenido, $blog_cat, $imagen_blog);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if ($stmt->affected_rows){
            $respuesta=array(
                'respuesta'=>'exito',
                'id_proyecto'=>$id_insertado,
                'autor_resultado' => $autor_resultado,
                'blog_resultado' => $blog_resultado

            );
        }else{
            $respuesta=array(
                'respuesta'=>'Error'
            );
        }
        $stmt->close();
        $con->close();
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
    die(json_encode($respuesta));
}

/*Actualizar Registro */
if($_POST['registro'] == 'actualizar') {

     //Directorios
     $dirAutor = "../images/autor/";
    
     // Imagen del autor
     if(!is_dir($dirAutor)) {
         mkdir($dirAutor, 0755, true);
     }
     if(move_uploaded_file($_FILES['autor_imagen']['tmp_name'], $dirAutor . $_FILES['autor_imagen']['name'])) {
         
         $imagen_autor = $_FILES['autor_imagen']['name'];
         $autor_resultado = "Se cargo correctamente";
         
     } else {
         $respuesta = array(
             'respuesta' => error_get_last()
         );
     }
     
     //Imagen del blog
     $dirBlog = "../images/blog/";
     if(!is_dir($dirBlog)) {
         mkdir($dirBlog, 0755, true);
     }
     if(move_uploaded_file($_FILES['blog_imagen']['tmp_name'], $dirBlog . $_FILES['blog_imagen']['name'])) {
         
         $imagen_blog = $_FILES['blog_imagen']['name'];
         $blog_resultado = "Se cargo correctamente";
 
     } else {
         $respuesta = array(
             'respuesta' => error_get_last()
         );
     }
     //Consulta SQL
     try {
         if($_FILES['autor_imagen']['size'] > 0 and $_FILES['blog_imagen']['size'] > 0) {
             //Edicion con imagenes
             $stmt = $con->prepare("UPDATE blog SET autor = ?, img_autor = ?, fecha = ?, titulo = ?, contenido = ?, categoria = ?, img_blog = ? WHERE  id = ?");
             $stmt->bind_param("sssssisi", $autor, $imagen_autor, $fecha, $titulo, $contenido, $blog_cat, $imagen_blog, $id_registroEditar);
         } else {
             //Edicion sin imagenes
             $stmt = $con->prepare("UPDATE blog SET autor = ?, fecha = ?, titulo = ?, contenido = ?, categoria = ? WHERE id = ?");
             $date= date("d/m/y");
             $stmt->bind_param("ssssii", $autor, $fecha, $titulo, $contenido, $blog_cat, $id_registroEditar);
         }
         $estado = $stmt->execute();
         if($estado == true) {
             $respuesta = array(
                 'respuesta' => 'actualizar',
                 'actualizar' => $id_registroEditar
             );
         } else {
             $respuesta + array(
                 'respuesta' => 'error'
             );
         }
         $stmt->close();
         $con->close();
     } catch (Exception $e) {
         $respuesta = array(
             'respuesta' => $e->getMessage()
         );
     }
     die(json_encode($respuesta));
 }

/* Eliminar */
if($_POST['registro'] == 'eliminar') { 
    $id_borrar = $_POST['id'];
    try {
        $stmt = $con->prepare("DELETE FROM blog WHERE id = ?");
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error blog'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}