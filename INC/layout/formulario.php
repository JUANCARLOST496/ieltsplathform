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
                        <select id="nombre" name='este' onchange='cambioOpciones();'>
                          <option  value='' class="center col s12 m6 l3"></option>
                          <?php
                          while ($datos=mysqli_fetch_array($query))
                            {
                           ?>
                                  
                                  <option  value='<?php echo $datos['producto'].'='.$datos['precio'].'='.$datos['id_producto']?>'><?php echo $datos['producto']?></option>
                                  <?php
                            }
                                  ?>
                                  
                        </select>
                        
                      
                          </div>

                          
                        <div class="campo center">
                        <label for='precio'>Precio</label>

                        <input class="center col s12 m6 l3" type="text" placeholder="$" id="precio" value=''>
                                                    
                      

                        </div>
                        <div class="campo center">
                          
                        <label for='cantidad'>Cantidad</label>
                        <select id="cantidad" name='este' onchange='cambioOpciones();' >
                                  <option  value='' class="center col s12 m6 l3"></option>
                                      <?php
                                      for ($i = 1; $i <= 50; $i++) 
                                              {
                                      ?>
        
                                        <option  value='<?php echo $i?>'><?php echo $i?></option>
                                        <?php
  }
                                                ?>
        
                                        </select>
                        </div>
                        
                        <div class="campo center">
                        <label for='telefono'>Codigo Compra</label>
                        <input disabled type="text" id="codigoc" value="<?php
                                            $caracteres = '123456789ABC';
                                                $aleatoria = substr(str_shuffle($caracteres), 0, 9);
                                                echo $aleatoria ; ?>">
                        
                        </div>
                        
                        

                       
                </div>
                
                <div class="campo enviar">
                        <button  id="accion" value="crear" class="btn-floating btn-large waves-effect  blue-grey darken-3"> <i class="material-icons">add</i></button>
                        </div>

                        <input type="hidden"  id="idpro" name="prodId" value="">
                        
                        