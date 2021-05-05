<?php
$connect =mysqli_connect('localhost','root','work55.55T','negocio');
if($connect){
    echo "si";
}else{
    echo"no";
}

$query=mysqli_query($connect, 'SELECT idproducto , producto from ventas');


?>
<select>
<?php
while ($datos=mysqli_fetch_array($query)){
?>

       <option id="<?php echo $datos['idproducto']?>"><?php echo $datos['producto']?></option>                            


<?php
};
?>
</select>

<label id="nombre">  probando
                          <?php
                          while ($datos2=mysqli_fetch_array($query))
                            {
                           ?>
                                 <?php echo $datos2['producto']?>
                                 
                                  <?php
                            }
                                  ?>
                                  
                        </label>
                        