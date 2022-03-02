<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>

</head>
<body>

       <div class="row ">
       <div class="col s12 l4 offset-l4">
             <form class="card" action="validar.php" method="POST">
                        <div class="card-action blue-grey darken-3 white-text center-align">
                              <h3>LOGIN</h3>
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

     




<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>




