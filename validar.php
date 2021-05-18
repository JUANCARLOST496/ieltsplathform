<?php

$usuario=$_POST['usuario'];
$contrasena=$_POST['passwordx'];
session_start();
$_SESSION['usuario']=$usuario;

define('DB_USUARIO','root');
define('DB_PASSWORD','work55.55T');
define('DB_HOST','localhost');
define('DB_NOMBRE','negocio');

$conn =new mysqli(DB_HOST,DB_USUARIO,DB_PASSWORD,DB_NOMBRE);


$consulta="SELECT*FROM usuarios where usuario='$usuario'and passwordE='$contrasena'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    
    header("location:editar.php");
    header("location:registradora.php");
}else{
    ?>
    <?php
    include("index.php");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conn);