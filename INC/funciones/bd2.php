<?php
$connect =mysqli_connect('localhost','root','work55.55T','negocio');

$query=mysqli_query($connect, 'SELECT idproducto , producto, precio from ventas');



?>

    <form action='bd2.php' method="post">
                        <label for='nombre'>PRODUCTO</label>
                        <select name='este'>
                          <?php
                          while ($datos=mysqli_fetch_array($query))
                            {
                           ?>
                                  <option id='<?php echo $datos['idproducto']?>' ><?php echo $datos['producto'].' = '.$datos['precio']?></option>
                                 
                                 
                                  <?php
                            }
                                  ?>
                            
                        </select>
                        <input type="submit" value="contestar">
                        <label> 
                          
                          <?php
                        if(isset($_POST['este'])){
                          echo $datos['precio'];
 }
   ?></label>
                       
                        </form>  