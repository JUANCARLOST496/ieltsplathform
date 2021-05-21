<?php
if($_GET['accion'] =='borrar'){
     require_once('../funciones/bd.php');


     $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

       try{

          $consulta="SELECT SUM(precio_total) as suma from ventas where codigo_factura='$id'";
            
          $query=mysqli_query($conn,$consulta);
          
          $datos=mysqli_fetch_array($query);
        
    
          $suma=$datos['suma'];

            $stmt=$conn->prepare("DELETE FROM ventas WHERE id = ? ");
            $stmt->bind_param("i",$id);
            $stmt->execute();
           
            
           
     


           
      



            if($stmt->affected_rows==1){
                 $respuesta=array(
                      'respuesta'=>'correcto',
                       'suma'=>$suma
                 );
            }



            $stmt->close();
            $conn->close();

       }catch(Exception $e){
            $respuesta=array(
                 'error'=>$e->getMessage()
            );
       }
       echo json_encode($respuesta);
}