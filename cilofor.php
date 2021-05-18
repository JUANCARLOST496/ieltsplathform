

<select id="nombre" name='este' onchange='cambioOpciones();'>
<option  value=''></option>
<?php
for ($i = 1; $i <= 3; $i++) 
  {
 ?>
        
        <option  value=''><?php echo $i?></option>
        <?php
  }
        ?>
        
</select>
