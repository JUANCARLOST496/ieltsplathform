<?php

 session_start();

 if(isset($_GET['logoat'])){

    session_destroy();
    header("location:login.php");
 }