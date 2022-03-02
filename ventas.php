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


<div class="bg-blanco contenedor sombra contactos">
        <div class="contenedor contactos" id="blank">
        
<div class="row">
<button onclick="location.href='productosb.php'" class="waves-effect waves-light btn-large col s12 m4 l8  pink lighten-2 ">crear producto del invetario</button>

</div>
       
<div class="row">
<button onclick="location.href='productos.php'" class="waves-effect waves-light btn-large col s1 pink lighten-2">crear producto venta</button>   
</div>

<div class="row">
<button onclick="location.href='invt.php'" class="waves-effect waves-light btn-large col s1 pink lighten-2">Registrar entrada al Inventario</button>   
</div>




<div class="row">
        <button onclick="location.href='inventario.php'" class="waves-effect waves-light btn-large col s1 pink lighten-2">inventario</button>      
       
        </div>
        <div class="row">
        <button onclick="location.href='ventas.php'" class="waves-effect waves-light btn-large col s1 green lighten-2">ventas</button>      
       
        </div>
      
      
       
</div>
</div>

                      
<div class="bg-blanco contenedor sombra contactos">
        <div class="contenedor contactos" id="blank">
          

          
                   <table class="centered listado highlight responsive-table " id="listado-contactos" >
                           <thead>
                                   <tr>
                                   <tr>
                                   <th>Producto</th>
                                   <th>Precio Unitario</th>
                                   <th>Cantidad</th>
                                   <th>precio total</th>
                                   <th>Codigo Factura</th>
                                   <th>fecha</th>
                                   <th>hora</th>
                                   </tr>
                                   
                                   </tr>
                           </thead>
                         
                           <tbody>
                           <?php include 'inc/funciones/funcionesventas.php';
                           $producto=obtenercontactos();
                          

                           if($producto->num_rows){
                              foreach($producto as $product){?>
                        
                           <tr>
                           <td><?php echo $product['producto']; ?></td>
                           <td><?php echo $product['precio_unitario']; ?></td>
                           <td><?php echo $product['cantidad']; ?></td>
                           <td><?php echo $product['precio_total']; ?></td>
                           <td><?php echo $product['codigo_factura']; ?></td>
                           <td><?php echo $product['fecha']; ?></td>
                           <td><?php echo $product['hora']; ?></td>
                           
                          </tr>
                           <?php }
                           }?>
                        </tbody>

                                
                   
                   
                        </table>
       



       
           

       

       

       </div>

<?php include 'inc/layout/footerpbodeg.php';

}else{
        header('location:login.php');
}  ?>

</html>