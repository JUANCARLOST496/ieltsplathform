<?php

if($_POST['enviarf']=='facturar'){

     require_once('../funciones/bd.php');
     $codigoc=filter_var($_POST['codigoc'],FILTER_SANITIZE_STRING);
     $valorv=filter_var($_POST['valorv'],FILTER_SANITIZE_STRING);
     $cantidadp=filter_var($_POST['cantidadp'],FILTER_SANITIZE_STRING);
     date_default_timezone_set('America/bogota');
    $fecha=date("Y-m-d");
    $hora=date('H:i:s');
     

     try{
          $statement =$conn->prepare("INSERT INTO facturacion(numero_productos,numero_facturacion,valor_venta,fecha,hora)  VALUES (?,?,?,?,?)");
          
          $statement->bind_param("sssss",$cantidadp,$codigoc,$valorv,$fecha,$hora);
          $statement->execute();


          

     }catch(Exception $e){
          $respuesta = array (
               'error'=> $e->getMessage()
           );
          }

     echo "funciona bn";
}



