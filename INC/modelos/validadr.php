<?php

$usuario=$_POST['login'];
$password=$_POST['password'];
session_start();
$_SESSION['usuario']=$usuario;

include('../funciones/bd.php');

$consulta ="SELECT * FROM loginE where usuario='$usuario' and passwordE='$password'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
      header("location:home.php");
}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}

mysqli_free_result($resultado);
mysqli_close($conn);








