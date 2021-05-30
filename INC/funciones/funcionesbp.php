<?php
function obtenercontactos(){
    define('DB_U','root');
    define('DB_P','work55.55T');
    define('DB_H','localhost');
    define('DB_N','negocio');
    
    $conne =new mysqli(DB_H,DB_U,DB_P,DB_N);
    try{
        return $conne->query("select * from productos_ibodega");
    }catch(Exception $e){
  echo "error!!".$e->getMessage()."<br>";
        return false;
    }
}