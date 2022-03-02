<?php


if($_POST['accion']=='crear'){
     require_once('../funciones/bd.php');
    
    //validar entradas
    $id_producto=filter_var($_POST['id_producto'],FILTER_SANITIZE_STRING);
   $producto=filter_var($_POST['producto'],FILTER_SANITIZE_STRING);
   $cantidad=filter_var($_POST['cantidad'],FILTER_SANITIZE_STRING);
   $medida=filter_var($_POST['medida'],FILTER_SANITIZE_STRING);
   $precio=filter_var($_POST['precio'],FILTER_SANITIZE_STRING);
   $preciot=filter_var($_POST['preciot'],FILTER_SANITIZE_STRING);
   $preciof=filter_var($_POST['preciof'],FILTER_SANITIZE_STRING);
   $existencias=filter_var($_POST['existencias'],FILTER_SANITIZE_STRING);
   date_default_timezone_set('America/bogota');
   $fecha=date("Y-m-d");
   $hora=date('H:i:s');
 

   try{
    $statement =$conn->prepare("INSERT INTO inventario (id_producto,elemento,cantidad,medida,precio_unitario,precio_total,precio_factura,existencias,fecha,hora) VALUES (?,?,?,?,?,?,?,?,?,?)");
    
    $statement->bind_param("ssssssssss",$id_producto,$producto,$cantidad,$medida,$precio,$preciot,$preciof,$existencias,$fecha,$hora);
    $statement->execute();

    

    if($statement->affected_rows==1){
     $respuesta = array(
          'respuesta'=>'correcto',
          'datos'=>array(
               'producto'=>$producto,
                'id_producto'=>$id_producto,
                'cantidad'=>$cantidad,
                'precio'=>$precio,
                'medida'=>$medida,
                'preciot'=>$preciot,
                'preciof'=>$preciof,
                'existencias'=>$existencias,
                'fecha'=>$fecha,
                'hora'=>$hora,
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