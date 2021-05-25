<html>
   <head>
      <title>Retrocafe</title>
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



                       <div class="campo enviar ref " >

                    
                        </div>
<div class="bg-blanco contenedor sombra">
         <form id="contacto" action="#">
           <div class="anex">Productos</br><span> </span></div>
          
           <?php include_once 'inc/layout/formulario_productos.php';?>
         </form>
        
</div>

<div class="bg-blanco contenedor sombra contactos">
        <div class="contenedor contactos" id="blank">
          

          
                   <table class="centered listado highlight responsive-table " id="listado-contactos" >
                           <thead>
                                   <tr>
                                   <th>id_producto</th>
                                   <th>Producto</th>
                                   <th>Precio </th>
                                   <th>Eliminar </th>
                                   </tr>
                           </thead>
                         
                           <tbody>
                           <?php include 'inc/funciones/funciones.php';
                           $producto=obtenercontactos();
                          

                           if($producto->num_rows){
                              foreach($producto as $product){?>
                        
                           <tr>
                           <td><?php echo $product['id_producto']; ?></td>
                           <td><?php echo $product['producto']; ?></td>
                           <td><?php echo $product['precio']; ?></td>
                            <td><button data-id="<?php echo $product['id']    ?>" class="btn btn-borrar waves-effect waves-teal btn-flat"><i class="fas fa-trash-alt" aria-hidden="true"></i></button></td>
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