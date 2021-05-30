<?php


if($_POST['accion']=='crear'){
     require_once('../funciones/bd.php');
    
    //validar entradas
   $nombre=filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
   $precio=filter_var($_POST['preciou'],FILTER_SANITIZE_STRING);
   $preciofac=filter_var($_POST['preciofac'],FILTER_SANITIZE_STRING);
   $cantidad=filter_var($_POST['cantidad'],FILTER_SANITIZE_STRING);
   $mult=filter_var($_POST['mult'],FILTER_SANITIZE_STRING);
   
   $medida=filter_var($_POST['medida'],FILTER_SANITIZE_STRING);
   $existencias=filter_var($_POST['existencias'],FILTER_SANITIZE_STRING);
   date_default_timezone_set('America/bogota');
    $fecha=date("Y-m-d");
    $hora=date('H:i:s');


   try{
    $statement =$conn->prepare("INSERT INTO inventario (elemento,cantidad,medida,precio_unitario,precio_total,precio_factura,existencias,fecha,hora) VALUES (?,?,?,?,?,?,?,?,?)");
    
    $statement->bind_param("sssssssss",$nombre,$cantidad,$medida,$precio,$mult,$preciofac,$existencias,$fecha,$hora);
    
    $statement->execute();

    
      
    
    

    if($statement->affected_rows==1){
     $respuesta = array(
          'respuesta'=>'correcto',
         
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


