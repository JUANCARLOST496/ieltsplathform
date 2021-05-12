<?php


if($_POST['accion']=='crear'){
     require_once('../funciones/bd.php');
    
    //validar entradas
   $nombre=filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
   $empresa=filter_var($_POST['empresa'],FILTER_SANITIZE_STRING);
   $telefono=filter_var($_POST['telefono'],FILTER_SANITIZE_STRING);
   $mult=filter_var($_POST['mult'],FILTER_SANITIZE_STRING);

   try{
    $statement =$conn->prepare("INSERT INTO agenda (nombre,empresa,telefono,total_productos) VALUES (?,?,?,?)");
    
    $statement->bind_param("ssss",$nombre,$empresa,$telefono,$mult);
    $statement->execute();

    if($statement->affected_rows==1){
     $respuesta = array(
          'respuesta'=>'correcto',
          'datos'=> array(
               'nombre'=>$nombre,
               'empresa'=>$empresa,
               'telefono'=>$telefono,
               'mult'=>$mult,
               'id'=>$statement->insert_id
          )
          );
    }
     

          $statement->close();
          $conn->close();
   

   }catch(Exception $e){
    $respuesta = array (
         'error'=> $e->getMessage()
     );
    }
   

     echo json_encode($respuesta);
   
}
