
<?php 
include_once 'inc/funciones/bd.php';

if(isset($_POST['este'])){
  $este=$datos['precio'];
  echo $este;
}


?>

<div class="campos" method="post">
                
                
                
                        <div class="campo center">
                        <label for='productobodega'>Nuevo producto</label>
                   <input type='text' class="card-panel grey lighten-4" id="producto">
                        
                      
                          </div>

                          
                        <div class="campo center">
                        <label for='id_producto'>id</label>

                        <input class="center col s12 m6 l3 card-panel grey lighten-4" type="text"  id="id_producto" value=''>
                                                    
                      

                        </div>
                      
                        
                        <div class="campo center">
                          
                          <label for='cantidad'>Unidades de medida</label>
                          <select id="unidades" name='este' onchange='cambioOpciones();' >
                                    <option  value='' class="center col s12 m6 l3"></option>
                                           <option value="Unidades"> Unidades </option>
                                          <option value="Mililitros"> Mililitros </option>
                                          <option value="Litros"> Litros </option>
                                          <option value="Gramos"> Gramos </option>
                                         
                                          </select>
                          </div>
                        
                        

                       
                </div>
                
                <div class="campo enviar">
                        <button  id="accion" value="crear" class="btn-floating btn-large waves-effect  blue-grey darken-3"> <i class="material-icons">add</i></button>
                        </div>

                        <input type="hidden"  id="idpro" name="prodId" value="">
                   