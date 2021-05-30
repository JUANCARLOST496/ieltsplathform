<?php


if($_POST['accion']=='crear'){
     require_once('../funciones/bd.php');
    
    //validar entradas
    $id_producto=filter_var($_POST['id_producto'],FILTER_SANITIZE_STRING);
   $producto=filter_var($_POST['producto'],FILTER_SANITIZE_STRING);
  
   $unidades=filter_var($_POST['unidades'],FILTER_SANITIZE_STRING);
 

   try{
    $statement =$conn->prepare("INSERT INTO productos_ibodega(id_producto,producto_b,unidades_de_medida) VALUES (?,?,?)");
    
    $statement->bind_param("sss",$id_producto,$producto, $unidades);
    $statement->execute();

    

    if($statement->affected_rows==1){
     $respuesta = array(
          'respuesta'=>'correcto',
          'datos'=>array(
               'producto'=>$producto,
                'id_producto'=>$id_producto,
               'unidades'=>$unidades,
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