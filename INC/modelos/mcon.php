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
   date_default_timezone_set('America/bogota');
    $fecha=date("Y-m-d");
    $hora=date('H:i:s');


   try{
    $statement =$conn->prepare("INSERT INTO ventas (producto,id_producto,precio_unitario,cantidad,precio_total,codigo_factura,fecha,hora) VALUES (?,?,?,?,?,?,?,?)");
    
    $statement->bind_param("ssssssss",$nombre,$idpro,$precio,$cantidad,$mult,$codigoc,$fecha,$hora);
    $statement->execute();

    $consulta="SELECT SUM(precio_total) as suma from ventas where codigo_factura='$codigoc'";
      
    $query=mysqli_query($conn,$consulta);
    
    $data=mysqli_fetch_array($query);
  

    $suma=$data['suma'];
    

    if($statement->affected_rows==1){
     $respuesta = array(
          'respuesta'=>'correcto',
          'datos'=> array(
               'nombre'=>$nombre,
               'precio'=>$precio,
               'cantidad'=>$cantidad,
               'mult'=>$mult,
               'codc'=>$codigoc,
               'suma'=>$suma,
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


