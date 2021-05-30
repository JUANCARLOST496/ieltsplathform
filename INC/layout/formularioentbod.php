<link rel="stylesheet" href="css/stylel.css">
<?php 
include_once 'inc/funciones/bd.php';
$query=mysqli_query($conn, 'SELECT id_producto , producto_b, unidades_de_medida from productos_ibodega ORDER BY producto_b ASC');
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
                                  
                                  <option  value='<?php echo $datos['producto_b'].'='.$datos['unidades_de_medida'].'='.$datos['id_producto']?>'>  <?php echo $datos['producto_b']  ?> </option>
                                  <?php
                            }
                                  ?>
                                  
                        </select>
                      
                          </div>


                        <div class="campo center">
                        <label for='precio'>Cantidad</label>

                        <input class="center col s12 m6 l3" type="text"  id="cantidad" value=''>
                                                  

                        </div>
                          
                        
          
                        <div class="campo center">
                          
                        <label for='cantidad'>Medida</label>
                        <input class="center col s12 m6 l3" type="text"  id="medida" value='' disabled>
                        
                        </div>

                    



                        <div class="campo center">
                        <label for='precio'>Precio Uni</label>
                        

<input class="center col s12 m6 l3" type="text" placeholder="$" id="preciou" value=''>
                          

</div>


<div class="campo center">
                        <label for='precio'>Precio Fac</label>
                        

<input class="center col s12 m6 l3" type="text" placeholder="$" id="preciofac" value=''>
                          

</div>

                        
                    
                        <div class="campo center">
                        <label for='precio'>Existencias</label>

                       
                        <select id="existencias" name='este' onchange='cambioOpciones();' >
                                  <option  value='' class="center col s12 m6 l3"></option>
                                      <?php
                                      for ($i = 0; $i <= 500; $i++) 
                                              {
                                      ?>
        
                                        <option  value='<?php echo $i?>'><?php echo $i?></option>
                                        <?php
  }
                                                ?>
        
                                        </select>        
                      

                        </div>

                        


                       
                </div>
                
                <div class="campo enviar">
                        <button  id="accion" value="crear" class="btn-floating btn-large waves-effect  blue-grey darken-3"> <i class="material-icons">add</i></button>
                        </div>

                        <input type="hidden"  id="idpro" name="prodId" value="">
                        
                        