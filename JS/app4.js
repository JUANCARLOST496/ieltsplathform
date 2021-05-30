const formulariocontac=document.querySelector('#contacto');
const listadoContactos = document.querySelector('#listado-contactos tbody')
const espaciosuma=document.querySelector('#blank')




eventlisteners();

function eventlisteners(){
    //creA4ar o editar
     formulariocontac.addEventListener('submit',leerform);

     //eliminar
     listadoContactos.addEventListener('click',eliminarproducto);
       //eliminar
      
   
     
}


function leerform(e){
    e.preventDefault();
   const producto=document.querySelector('#producto').value,
         id_producto=document.querySelector('#id_producto').value,
         unidades=document.querySelector('#unidades').value,
         accion=document.querySelector('#accion').value

         console.log(id_producto)
   if(producto==='' || id_producto==='' || unidades===''){
    mostrarnotificacion('Todos los campos son obligatorios','error');

         }else{
     //crear llamado a ajax


     const infocontacto=new FormData();
    infocontacto.append('producto',producto);
    infocontacto.append('id_producto',id_producto);
    infocontacto.append('unidades',unidades);
    infocontacto.append('accion',accion);
    
   
    console.log(infocontacto)


    if(accion==='crear'){
         insertBD(infocontacto);
        
    }else{
        console.log("nada")
    }
function insertBD(datos){
    //llamado a ajax
      

    //crear el objeto
    const xhr= new XMLHttpRequest();
    //abrir la conexion
     xhr.open('POST','inc/modelos/mconaddproducb.php',true)
    //pasar los datos
    xhr.onload=function(){
        if(this.status===200){
            console.log(JSON.parse( xhr.responseText )) ;
            const respuesta= JSON.parse(xhr.responseText);
            //obtener un dato
            console.log(`${respuesta.datos.id_producto}`);
          
             //crear en el dom
             const textonuevo=document.createElement('tr');
             textonuevo.innerHTML=`
               <td>${respuesta.datos.id_producto}</td>
               <td>${respuesta.datos.producto}</td>
               <td>${respuesta.datos.unidades}</td>
           
               </tr>
               
             `;

             const contenedorAcciones = document.createElement('td');
             listadoContactos.appendChild(textonuevo);


// crear el icono de eliminar
const iconoEliminar = document.createElement('i');
iconoEliminar.classList.add('fas', 'fa-trash-alt');

// crear el boton de eliminar
const btnEliminar = document.createElement('button');
btnEliminar.appendChild(iconoEliminar);
btnEliminar.setAttribute('data-id', respuesta.datos.id_insertado);
btnEliminar.classList.add('btn', 'btn-borrar','waves-effect', 'waves-teal', 'btn-flat');



// agregarlo al padre
contenedorAcciones.appendChild(btnEliminar);

// Agregarlo al tr
textonuevo.appendChild(contenedorAcciones);

             
              
            document.querySelector('form').reset();
            mostrarnotificacion('Producto creado','correcto')



        }
    }
    //enviar los datos
    xhr.send(datos)
 
}

   }
}


function eliminarproducto(e){
         if(e.target.parentElement.classList.contains('btn-borrar')){
             //tomar id
           
             const id=e.target.parentElement.getAttribute('data-id');
           console.log(id)

            const res=confirm("seguro");
             
             if(res) {
             //ABRIR CONEXION
             const xhr=new XMLHttpRequest();
             xhr.open('GET',`inc/modelos/mcon6.php?id=${id}&accion=borrar`, true);
             xhr.onload=function(){
                 if(this.status === 200){
                     const resultados=JSON.parse(xhr.responseText);
                     console.log(resultados);
                        console.log(e.target.parentElement.parentElement.parentElement.remove());

                     if(resultados.respuesta=='correcto'){
                       

                        mostrarnotificacion("contacto eliminado",'correcto')
                     }else{
                         mostrarnotificacion("hubo un error",'error')
                     }
                 }
             }

             xhr.send();
         }
      }
} 





function mostrarnotificacion(mensaje,clase){
    const notificacion=document.createElement('div');
  
    notificacion.classList.add(clase,'notificacion', 'sombra');
    notificacion.textContent=mensaje;
    formulariocontac.insertBefore(notificacion,document.querySelector("form div"));

    setTimeout(() => {
        notificacion.classList.add('visible');
        setTimeout(() => {
            notificacion.classList.remove('visible');
            setTimeout(() => {
                notificacion.remove();
            }, 100);
        }, 1000);
    }, 100);

}


function obtenerfecha(){
    const d= new Date();
    const year=d.getFullYear();
   console.log(year) 
}





