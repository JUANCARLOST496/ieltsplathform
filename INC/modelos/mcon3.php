<?php
if($_GET['accion'] =='sumar'){
  
     require_once('../funciones/bd.php');
   
     filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
      $co = filter_var($_GET['id'],FILTER_SANITIZE_STRING);
     


      $consulta="SELECT SUM(precio_total) as suma from ventas where codigo_factura='$co'";
      
      $query=mysqli_query($conn,$consulta);
      
      $datos=mysqli_fetch_array($query);
    

      $suma=$datos['suma'];

     
      $respuesta=array(
          'respuesta'=>'correcto',
          'suma'=>$suma,
          'co'=>$co
     );

        echo json_encode($respuesta);
}