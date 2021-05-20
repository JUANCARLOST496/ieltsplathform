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


   <nav>
    <div class="nav-wrapper blue-grey darken-3">
      <a href="#" class="brand-logo">RetroCafe</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down ">
        <li><a href="Registradora.php">Registradora</a></li>
        <li><a href="badges.html">Bodega</a></li>
        <li><a href="logout.php?logoat" class="navega">Cerrar sesion</a></li>
        
      </ul>
    </div>
  </nav>




<?php 
session_start();

if(isset($_SESSION['usuario'])){

include 'inc/layout/header.php';?>



                       <div class="campo enviar ref " >

                    
                        </div>
<div class="bg-blanco contenedor sombra">
         <form id="contacto" action="#">
           <div class="anex">CAJA REGISTRADORA</br><span> </span></div>
          
           <?php include 'inc/layout/formulario.php';?>
         </form>
        
</div>

<div class="bg-blanco contenedor sombra contactos">
        <div class="contenedor contactos">
          

          
                   <table class="centered listado highlight " id="listado-contactos" >
                           <thead>
                                   <tr>
                                   <th>Producto</th>
                                   <th>Precio Unitario</th>
                                   <th>Cantidad</th>
                                   <th>precio total</th>
                                   <th>codigo compra</th>
                                   <th>eliminar</th>
                                   </tr>
                           </thead>
                         
                           <tbody>
                           <tr>
                           <td>mantqeuilla</td>
                           <td>5000</td>
                           <td>3</td>
                           <td>15000</td>
                           <td>qresf454</td>
                           <td><button data-id="50" class="btn btn-borrar waves-effect waves-teal btn-flat"><i class="fas fa-trash-alt" aria-hidden="true"></i></button></td>
                           </tr>
                        </tbody>
                                
                   
                   
                        </table>
       

        <div class="campo enviar">
                        <input type="submit" id="accion" value="facturar" onclick="suma();">
                        </div>
       </div>

       </div>

<?php include 'inc/layout/footer.php';

}else{
        header('location:login.php');
}  ?>

</html>