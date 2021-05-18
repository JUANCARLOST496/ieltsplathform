<?php 
// Credenciales
define('DB_USUARIO','root');
define('DB_PASSWORD','work55.55T');
define('DB_HOST','localhost');
define('DB_NOMBRE','negocio');

$conn =new mysqli(DB_HOST,DB_USUARIO,DB_PASSWORD,DB_NOMBRE);

$connect =mysqli_connect('localhost','root','work55.55T','negocio');
$query=mysqli_query($conn, 'SELECT id_producto , producto, precio from productos ORDER BY producto ASC');

