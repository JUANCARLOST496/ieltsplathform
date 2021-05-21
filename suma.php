
<?php

include 'inc/funciones/bd.php';
$co = "913A67582";

$consulta="SELECT SUM(precio_total) as suma from ventas where codigo_factura='$co'";

$query=mysqli_query($conn,$consulta);

$datos=mysqli_fetch_array($query);
echo $datos['suma'];

