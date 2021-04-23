<?php 
// Credenciales
define('BD_USUARIO','root');
define('DB_PASSWORD','work55.55T');
define('DB_HOST','localhost');
define('DB_NOMBRE','agendaphp');

$conn =new mysqli(DB_HOST,DB_USUARIO,DB_PASSWORD,DB_NOMBRE);

echo $conn->ping();