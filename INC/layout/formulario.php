<?php 
include 'inc/funciones/bd.php';
$query=mysqli_query($conn, 'SELECT idproducto , producto, precio from ventas');

?>

<div class="campos">
                
                
                
                        <div class="campo">
                        <label for='nombre'>PRODUCTO</label>
                        <select id="nombre">
                          <?php
                          while ($datos=mysqli_fetch_array($query))
                            {
                           ?>
                                  <option id='<?php echo $datos['idproducto']?>'><?php echo $datos['producto']?></option>
                                 
                                  <?php
                            }
                                  ?>
                                  
                        </select>
                        
                        

                      
                        </div>
                        <div class="campo">
                        <label for='Empresa'>CANTIDAD</label>
                        <input type="text" placeholder="" id="empresa">
                        </div>
                        <div class="campo">
                        <label for='telefono'>PRECIO</label>
                        <input type="text" placeholder="precio" id="telefono">
                        </div>

                       
                </div>

              <div class="campo enviar">
                        <input type="submit" id="accion" value="crear">
                        </div>