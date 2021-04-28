<?php include 'inc/layout/header.php';?>

<div class="contenedor-barra">
        <h1>Agenda de contactos
        </h1>
        </div>
<div class="bg-amarillo contenedor sombra">
         <form id="contacto" action="#">
           <div class="anex">Add un campo</br><span> todo los campos son obligatorios</span></div>
           
           <?php include 'inc/layout/formulario.php';?>
         </form>
        
</div>

<div class="bg-blanco contenedor sombra contactos">
        <div class="contenedor contactos">
           <h2>contactos</h2>
           <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar contactos...">
           <p class="total-contactos"><span>2</span>Contactos<p>

           <div >
                   <table class="listado" id="listado-contactos" >
                           <thead>
                                   <tr>
                                   <th>Nombre</th>
                                   <th>Empresa</th>
                                   <th>Telefono</th>
                                   <th>Acciones</th>
                                   </tr>
                           </thead>
                        <tbody>
                             <tr>


                                <td>Juan</td>
                                <td>Udemy</td>
                                <td>05123 </td>
                                <td>
                                        <a class="boton-editar btn" href="Editar.php?id=1">
                                        <i class="fas fa-pen-square"></i>
                                        </a>
                                        <button data-id="1" type="button" class="btn-borrar btn">
                                        <i class="fas fa-trash-alt"></i>
                                        </button>

                                </td>



                             </tr>


                        </tbody>
                    
                   
                   
                        </table>
        </div>

        <div class="campo enviar">
                        <input type="submit" id="accion" value="Facturar">
                        </div>
</div>


<?php include 'inc/layout/footer.php';?>