<html>
   <head>
      <title>BarraCafe</title>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
      <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet"
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script> 


      
      <script>
         $(document).ready(function() {
            $('select').material_select();
         });
      </script>
   </head>






<?php 
session_start();

if(isset($_SESSION['usuario'])){
  

include_once 'inc/layout/header.php';

?>

<div class="bg-blanco contenedor sombra">
         <form id="contacto" action="#">
           <div class="anex">Facturacion</br><span> </span></div>
           <br>
         
        
<br>



         </form>
        
</div>


                      
<div class="bg-blanco contenedor sombra contactos">
        <div class="contenedor contactos" id="blank">
          

          
                   <table class="centered listado highlight responsive-table " id="listado-contactos" >
                           <thead>
                                   <tr>
                                   <th>Numero productos venta </th>
                                   <th>Facturacion</th>
                                   <th>Valor venta</th>
                        
                                  
                                   <th>Fecha </th>
                                   <th>Hora </th>
                                   
                                   </tr>
                           </thead>
                         
                           <tbody>
                           <?php include 'inc/funciones/funciones_factura.php';
                           $producto=obtenercontactos();
                          

                           if($producto->num_rows){
                              foreach($producto as $product){?>
                        
                           <tr>
                           <td><?php echo $product['numero_productos']; ?></td>
                           <td><?php echo $product['numero_facturacion']; ?></td>
                           <td><?php echo $product['valor_venta']; ?></td>
                           <td><?php echo $product['fecha']; ?></td>
                           <td><?php echo $product['hora']; ?></td>
                           
                          </tr>
                           <?php }
                           }?>
                        </tbody>
                                
                   
                   
                        </table>
       



       
           

       

       

       </div>

<?php include 'inc/layout/footerp.php';

}else{
        header('location:login.php');
}  ?>

</html>