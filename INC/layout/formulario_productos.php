<link rel="stylesheet" href="css/stylel.css">
<?php 
include_once 'inc/funciones/bd.php';
$query=mysqli_query($conn, 'SELECT id_producto , producto, precio from productos ORDER BY producto ASC');
if(isset($_POST['este'])){
  $este=$datos['precio'];
  echo $este;
}


?>

<div class="campos" method="post">
                
                
                
                        <div class="campo center">
                        <label for='nombre'>Producto</label>
                   <input type='text' class="card-panel grey lighten-4" id="producto">
                        
                      
                          </div>

                          
                        <div class="campo center">
                        <label for='precio'>id_producto</label>

                        <input class="center col s12 m6 l3 card-panel grey lighten-4" type="text"  id="id_producto" value=''>
                                                    
                      

                        </div>
                      
                        
                        <div class="campo center">
                        <label for='telefono'>Precio</label>
                        <input class="center col s12 m6 l3 card-panel grey lighten-4" type="text"  id="precio" value=''>
                        
                        </div>
                        
                        

                       
                </div>
                
                <div class="campo enviar">
                        <button  id="accion" value="crear" class="btn-floating btn-large waves-effect  blue-grey darken-3"> <i class="material-icons">add</i></button>
                        </div>

                        <input type="hidden"  id="idpro" name="prodId" value="">
                   