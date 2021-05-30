<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/stylel.css">
    <title>Document</title>

</head>
<body>

<?php include 'inc/layout/header.php';?>
<div class="row ">
<div class="col s12 m6 offset-10 ">
             <form class="card col s12 m6 " action="supervalidar.php" method="POST">
                        <div class="card-action blue-grey darken-3 white-text center-align">
                              <h3>Administracion</h3>
                        </div>
                        <div class="card-content">
                          <div class="form-field">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="usuario">
                          </div><br>
                          <div class="form-field">
                                <label for="username">Password</label>
                                <input type="password" id="password" name="passwordx">
                          </div><br>
                          <div class="form-field">
                                <input type="submit" class="btn-large blue-grey darken-3" id="login" value="entrar" >
                          </div><br>
                        </div>
                        
                        </div>


             </div>

</div>


</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
