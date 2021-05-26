<?php

if($_POST['enviarf']=='facturar'){

     require_once('../funciones/bd.php');
     $codigoc=filter_var($_POST['codigoc'],FILTER_SANITIZE_STRING);
     $valorv=filter_var($_POST['valorv'],FILTER_SANITIZE_STRING);
     $cantidadp=filter_var($_POST['cantidadp'],FILTER_SANITIZE_STRING);
     $date=date("h:i:s");
     

     try{
          $statement =$conn->prepare("INSERT INTO facturacion(numero_productos,numero_facturacion,valor_venta,fecha,hora)  VALUES (?,?,?,NOW(),CURRENT_TIME())");
          
          $statement->bind_param("sss",$cantidadp,$codigoc,$valorv);
          $statement->execute();


          

     }catch(Exception $e){
          $respuesta = array (
               'error'=> $e->getMessage()
           );
          }

     echo "funciona bn";
}



