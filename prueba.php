<?php
session_start();
  
if(isset($_SESSION['usuario'])){
    echo 'weel come '.$_SESSION['usuario'].'<br>';
    echo '<a href="logout.php?logoat">logout</a>';
}else{
    header("location:login.php");

}

  