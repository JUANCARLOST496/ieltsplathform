<html>
   <head>
      <title>BarraCafe</title>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
      <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

         
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script> 

      
      
   </head>






<?php 
session_start();

if(isset($_SESSION['usuario'])){
  

include_once 'inc/layout/header.php';

?>

<div class="row">
  <div class="col-12"></br></div>
  
</div>

<?php include 'forms/form1.php';?>
<?php include 'forms/form2.php';?>



<div>  <button type="button" class="btn btn-dark" id="change1">Page 1</button>  <button type="button" class="btn btn-dark" id="change2">Page 2</button></div>


                      


<?php include 'inc/layout/footerp.php';

}else{
        header('location:login.php');
}  ?>

</html>