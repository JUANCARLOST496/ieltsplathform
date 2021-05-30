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

if(isset($_SESSION['usuarioa'])){
  

include_once 'inc/layout/header.php';

?>


<div class="bg-blanco contenedor sombra">
         <form id="contacto" action="#">
           <div class="anex">MENU ADMINISTRACION</br><span> </span></div>
         
           
         </form>
        
</div>

                      
<div class="bg-blanco contenedor sombra contactos">
        <div class="contenedor contactos" id="blank">
         
<div class="row">
<button onclick="location.href='productosb.php'" class="waves-effect waves-light btn-large col s12 m4 l8  pink lighten-2 ">crear producto bodega</button>

</div>
       
<div class="row">
<button onclick="location.href='productos.php'" class="waves-effect waves-light btn-large col s1 pink lighten-2">crear producto venta</button>   
</div>

<div class="row">
<button onclick="location.href='inventario.php.php'" class="waves-effect waves-light btn-large col s1 pink lighten-2">Inventario estatico</button>   
</div>




<div class="row">
        <button onclick="location.href=''" class="waves-effect waves-light btn-large col s1 pink lighten-2">bodega</button>      
       
        </div>
        <div class="row">
        <button onclick="location.href=''" class="waves-effect waves-light btn-large col s1 pink lighten-2">ventas</button>      
       
        </div>
      
      
       

   

<?php include 'inc/layout/footerp.php';

}else{
        header('location:login.php');
}  ?>

</html>