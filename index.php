<?php include 'inc/layout/header.php';?>

<div class="contenedor-barra">
        <h1>Agenda de contactos
        </h1>
        </div>
<div class="bg-amarillo contenedor sombra">
         <form id="contacto" action="#">
           <div class="anex">Add un campo</br><span> todo los campos son obligatorios</span></div>
           
                <div class="campos">
                
                
                
                        <div class="campo">
                        <label for='nombre'>Nombre</label>
                        <input type="text" placeholder="Nombre producto" id="nombre">
                        </div>
                        <div class="campo">
                        <label for='empresa'>Empresa</label>
                        <input type="text" placeholder="Nombre empresa" id="empresa">
                        </div>
                        <div class="campo">
                        <label for='telefono'>tel</label>
                        <input type="tel" placeholder="Nombre contacto" id="telefono">
                        </div>
                        <div class="campo-enviar">
                        <input type="submit" value="añadir">
                        </div>
              </div>
         </form>
        
</div>





<?php include 'inc/layout/footer.php';?>