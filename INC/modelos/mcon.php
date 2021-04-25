<?php


if($_POST['accion']=='crear'){
     require_once('../funciones/bd.php');

    //validar entradas
   $nombre=filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
   $nombre=filter_var($_POST['empresa'],FILTER_SANITIZE_STRING);
   $nombre=filter_var($_POST['telefono'],FILTER_SANITIZE_STRING);

   try{
    $statement =$conn->prepare("INSERT INTO negocio VALUES (?,?,?)");
   }catch(Exception $e){
    $respuesta = array (
         'error'=> $e->getMessage()
     );
    }
   

     echo json_encode($_POST);
   
}
