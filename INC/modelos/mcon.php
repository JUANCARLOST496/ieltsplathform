<?php


if($_POST['accion']=='crear'){
     require_once('../funciones/bd.php');
    
    //validar entradas
   $nombre=filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
   $precio=filter_var($_POST['preciox'],FILTER_SANITIZE_STRING);
   $cantidad=filter_var($_POST['cantidad'],FILTER_SANITIZE_STRING);
   $mult=filter_var($_POST['mult'],FILTER_SANITIZE_STRING);
   $idpro=filter_var($_POST['idpro'],FILTER_SANITIZE_STRING);
   $codigoc=filter_var($_POST['codigoc'],FILTER_SANITIZE_STRING);

   try{
    $statement =$conn->prepare("INSERT INTO ventas (producto,id_producto,precio_unitario,cantidad,precio_total,codigo_factura) VALUES (?,?,?,?,?,?)");
    
    $statement->bind_param("ssssss",$nombre,$idpro,$precio,$cantidad,$mult,$codigoc);
    $statement->execute();

    

    if($statement->affected_rows==1){
     $respuesta = array(
          'respuesta'=>'correcto',
          'datos'=> array(
               'nombre'=>$nombre,
               'precio'=>$precio,
               'cantidad'=>$cantidad,
               'mult'=>$mult,
               'codc'=>$codigoc,
               'id_insertado'=>$statement->insert_id
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


