<?php
function obtenercontactos(){
    define('DB_U','u173196446_barracafe');
    define('DB_P','work55.55T');
    define('DB_H','localhost');
    define('DB_N','u173196446_master');
    
    $conne =new mysqli(DB_H,DB_U,DB_P,DB_N);
    try{
        return $conne->query("select * from facturacion where fecha= (SELECT MAX(fecha) FROM ventas) ORDER BY hora DESC");
    }catch(Exception $e){
  echo "error!!".$e->getMessage()."<br>";
        return false;
    }
}