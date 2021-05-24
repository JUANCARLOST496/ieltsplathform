<?php


if($_POST['accion']=='crear'){
     require_once('../funciones/bd.php');
    
    //validar entradas
    $id_producto=filter_var($_POST['id_producto'],FILTER_SANITIZE_STRING);
   $producto=filter_var($_POST['producto'],FILTER_SANITIZE_STRING);
  
   $precio=filter_var($_POST['precio'],FILTER_SANITIZE_STRING);
 

   try{
    $statement =$conn->prepare("INSERT INTO productos(id_producto,producto,precio) VALUES (?,?,?)");
    
    $statement->bind_param("sss",$id_producto,$producto,$precio);
    $statement->execute();

    

    if($statement->affected_rows==1){
     $respuesta = array(
          'respuesta'=>'correcto',
          'datos'=>array(
               'producto'=>$producto,
                'id_producto'=>$id_producto,
                'precio'=>$precio,
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