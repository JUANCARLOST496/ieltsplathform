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
  
include 'inc/layout/header.php';?>



                       <div class="campo enviar ref " >

                    
                        </div>
<div class="bg-blanco contenedor sombra">
         <form id="contacto" action="#">
           <div class="anex">PRODUCTO A LA VENTA</br><span> </span></div>
          
           <?php include 'inc/layout/formulario_productos.php';?>
         </form>
        
</div>

<div class="bg-blanco contenedor sombra contactos">
        <div class="contenedor contactos" id="blank">
          

          
                   <table class="centered listado highlight responsive-table " id="listado-contactos" >
                           <thead>
                                   <tr>
                                   <th>Producto</th>
                                   <th>id_producto</th>
                                   <th>precio</th>
                                   <th>eliminar</th>
                                   </tr>
                           </thead>
                         
                           <tbody>
                              
                           <tr>
                           <td>___</td>
                           <td>___</td>
                           <td>___</td>
                           <td>___</td>
                           <td>___</td>
                           <td>___</td>
                          </tr>
                           
                        </tbody>
                                
                   
                   
                        </table>
       



        <div class="campo enviar">
        <div class="total">
       <label > Total: </label>
       <label for="" id="prueba">  0  </label>
           
</div>

                        <input type="submit" id="40" value="facturar" class="sumar">
                        </div>
       </div>
       

       

       </div>

<?php include 'inc/layout/footer.php';

}else{
        header('location:login.php');
}  ?>

</html>