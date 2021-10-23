<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once "functions/funciones.php";
$categoria = $_POST['categoria'];
$id_registroEditar = $_POST["id_registro"];

if($_POST['registro'] == 'nuevo') {
    //Consulta SQL
    try {
        include_once "functions/funciones.php";
        $stmt = $con->prepare("INSERT INTO categorias (nombre)
                               VALUES (?)");
        $stmt->bind_param("s", $categoria);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if ($stmt->affected_rows){
            $respuesta=array(
                'respuesta'=>'exito',
                'id_proyecto'=>$id_insertado
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

/*Actualizar Registro de proyecto */
if($_POST['registro'] == 'actualizar') {
     //Consulta SQL
     try {
         $stmt = $con->prepare("UPDATE categorias SET nombre = ? WHERE  id_cat = ?");
         $stmt->bind_param("si", $categoria, $id_registroEditar);
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

/* Eliminar Proyecto */
 if($_POST['registro'] == 'eliminar') { 
     $id_borrar = $_POST['id_cat'];
     try {
         $stmt = $con->prepare("DELETE FROM categorias WHERE id_cat = ?");
         $stmt->bind_param('i', $id_borrar);
         $stmt->execute();
         if($stmt->affected_rows) {
             $respuesta = array(
                 'respuesta' => 'exito',
                 'id_eliminado' => $id_borrar
             );
         } else {
             $respuesta = array(
                 'respuesta' => 'error'
             );
         }
     } catch (Exception $e) {
         $respuesta = array(
             'respuesta' => $e->getMessage()
         );
     }
     die(json_encode($respuesta));
 }