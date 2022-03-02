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
           <div class="anex">CAJA REGISTRADORA</br><span> </span></div>
          
           <?php include 'inc/layout/formulario.php';?>
         </form>
        
</div>

<div class="bg-blanco contenedor sombra contactos" >
<form id="blank" style="margin: 0px 0px 0px 0px;;">
        <div class="contenedor contactos" id="blank">
          

         
                   <table class="centered listado highlight responsive-table " id="listado-contactos" >
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
        
       <input type="text" id="prueba" value="0" disabled>  

       
</div>
                        <div>
                        <input type="submit" id="enviarf" value="facturar" class="sumar">
                        <script src="js/app3.js"></script>
<div>
                        </div>
       </div>
       
     
       
       </form>
       </div>
    
<?php include 'inc/layout/footer.php';

}else{
        header('location:index.php');
}  ?>

</html>