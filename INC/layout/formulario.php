<link rel="stylesheet" href="css/stylel.css">
<?php 
include 'inc/funciones/bd.php';
$query=mysqli_query($conn, 'SELECT idproducto , producto, precio from ventas');
if(isset($_POST['este'])){
  $este=$datos['precio'];
  echo $este;
}


?>

<div class="campos" method="post">
                
                
                
                        <div class="campo center">
                        <label for='nombre'>Producto</label>
                        <select id="nombre" name='este' onchange='cambioOpciones();'>
                          <?php
                          while ($datos=mysqli_fetch_array($query))
                            {
                           ?>
                                  <option id="nombre" value='<?php echo $datos['producto'].'='.$datos['precio']?>'><?php echo $datos['producto']?></option>
                                
                                  
                             
                                  <?php
                            }
                                  ?>
                                  
                        </select>
                        
                      
                          </div>

                          
                        <div class="campo center">
                        <label for='Empresa'>Precio</label>

                        <input class="center" type="text" placeholder="$" id="empresa" value=''>
                                                    
                      

                        </div>
                        <div class="campo center">
                          
                        <label for='telefono'>Cantidad</label>
                        <input type="text" placeholder="" id="telefono">
                        </div>
                        
                        <div class="campo center">
                        <label for='telefono'>Codigocompra</label>
                        <input type="text" id="showId">
                        </div>
                        
                        

                       
                </div>
                
                <div class="campo enviar">
                        <input type="submit" id="accion" value="crear">
                        </div>