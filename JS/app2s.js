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

function cambioOpciones()

        {
           let corte=document.getElementById('producto').value,
            
           cortee=corte.split('=')[1]
         
         
        document.getElementById('medida').value=cortee;
          

        }



function leerform(e){
    e.preventDefault();
   const productox=document.querySelector('#producto').value,
         producto=productox.split('=')[0],
         medida=document.querySelector('#medida').value,
         id_producto=productox.split('=')[2],
         precio=document.querySelector('#precio').value,
         preciof=document.querySelector('#preciof').value,
        cantidad=document.querySelector('#cantidad').value,
         accion=document.querySelector('#accion').value,
         existencias=document.querySelector('#existencias').value,
         pt=precio*cantidad;

         console.log(medida)
   if(producto==='' || id_producto==='' || precio===''){
    mostrarnotificacion('Todos los campos son obligatorios','error');

         }else{
     //crear llamado a ajax


     const infocontacto=new FormData();
    infocontacto.append('producto',producto);
    infocontacto.append('id_producto',id_producto);
    infocontacto.append('precio',precio);
    infocontacto.append('cantidad',cantidad);
    infocontacto.append('medida',medida);
    infocontacto.append('accion',accion);
    infocontacto.append('preciot',pt);
    infocontacto.append('preciof',preciof);
    infocontacto.append('existencias',existencias);
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
     xhr.open('POST','inc/modelos/mconaddproduci.php',true)
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
               <td>${respuesta.datos.cantidad}</td>
               <td>${respuesta.datos.medida}</td>
               <td>${respuesta.datos.precio}</td>
               <td>${respuesta.datos.preciot}</td>
               <td>${respuesta.datos.preciof}</td>
               <td>${respuesta.datos.existencias}</td>
               <td>${respuesta.datos.fecha}</td>
               <td>${respuesta.datos.hora}</td>
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
             xhr.open('GET',`inc/modelos/mcon4i.php?id=${id}&accion=borrar`, true);
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





