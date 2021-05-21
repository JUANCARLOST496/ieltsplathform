const formulariocontac=document.querySelector('#contacto');
const listadoContactos = document.querySelector('#listado-contactos tbody')
const espaciosuma=document.querySelector('#blank')




eventlisteners();

function eventlisteners(){
    //creA4ar o editar
     formulariocontac.addEventListener('submit',leerform);

     //eliminar
     listadoContactos.addEventListener('click',eliminarproducto);

     espaciosuma.addEventListener('click',sumar)
     
}

function cambioOpciones()

        {
           let corte=document.getElementById('nombre').value,
            
           cortee=corte.split('=')[1]
           corteee=corte.split('=')[2]

            document.getElementById('precio').value=cortee;
            document.getElementById('idpro').value=corteee;
            

        }






        function suma(){
            let total=0;
        let celdaselects= document.querySelectorAll('td+td+td')
        for(let i=0;i<celdaselects.length; i++){
            total +=parseInt(celdaselects[i].firstChild.data);
        }

        let nuevafila=document.createElement('tr')

        let celdatotal=document.createElement('td');
        let textecelda=document.createTextNode('total');
        celdatotal.appendChild(textecelda);
        nuevafila.appendChild(celdatotal);


   
        let celdatotalnum=document.createElement('td');
        let texteceldavalor=document.createTextNode(total);
        celdatotalnum.appendChild(texteceldavalor);
        nuevafila.appendChild(celdatotalnum);


        document.getElementById('listado-contactos').appendChild(nuevafila)
          }


        
        

        

        

function leerform(e){
    e.preventDefault();
   const nombres=document.querySelector('#nombre').value,
        nombre=nombres.split('=')[0],
         precio=document.querySelector('#precio').value,
         cantidad=document.querySelector('#cantidad').value,
         codigoc=document.querySelector('#codigoc').value,
         accion=document.querySelector('#accion').value,
         idpro=document.querySelector('#idpro').value,
         mult=(precio*cantidad);

         var d = new Date();
         let year=d.getFullYear();
         let mes=d.getMonth()+1;
         let dia=d.getDate();

     
        console.log(dia+"-"+mes+"-"+year);
        


   if(nombre==='' || precio==='' || cantidad===''){
    mostrarnotificacion('Todos los campos son obligatorios','error');

         }else{
     //crear llamado a ajax


     const infocontacto=new FormData();
    infocontacto.append('nombre',nombre);
    infocontacto.append('preciox',precio);
    infocontacto.append('cantidad',cantidad);
    infocontacto.append('accion',accion);
    infocontacto.append('idpro',idpro);
    infocontacto.append('mult',mult);
    infocontacto.append('codigoc',codigoc);
   
    //console.log(...infocontacto)


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
     xhr.open('POST','inc/modelos/mcon.php',true)
    //pasar los datos
    xhr.onload=function(){
        if(this.status===200){
            console.log(JSON.parse( xhr.responseText )) ;
            const respuesta= JSON.parse(xhr.responseText);
            //obtener un dato
            console.log(respuesta.nombre);
          

            //crear en el dom
            const textonuevo=document.createElement('tr');
            textonuevo.innerHTML=`
              <td>${respuesta.datos.nombre}</td>
              <td>${respuesta.datos.precio}</td>
              <td>${respuesta.datos.cantidad}</td>
              <td>${respuesta.datos.mult}</td>
              <td>${respuesta.datos.codc}</td>
              </tr>
            `;

 // crear contenedor para los botones
 const contenedorAcciones = document.createElement('td');



             //add
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
            mostrarnotificacion('Contacto creado','correcto')
        }
    }
    //enviar los datos
    xhr.send(datos)
 
}

   }
}


function sumar(e){
   if(e.target.parentElement.classList.contains('btn-borrar')){
   let codigoc=document.querySelector('#codigoc').value
   
    console.log(codigoc)
   
    let a=1
             
    if(a=1) {
    //ABRIR CONEXION
    const xhr=new XMLHttpRequest();
    xhr.open('GET',`inc/modelos/mcon3.php?id=${codigoc}&accion=sumar`, true);
    xhr.onload=function(){
        if(this.status === 200){
            const resultados=JSON.parse(xhr.responseText);
               console.log(resultados);

         
        }
    }

    xhr.send();
}




   };
   
}


function eliminarproducto(e){
         if(e.target.parentElement.classList.contains('btn-borrar')){
             //tomar id
             const id=e.target.parentElement.getAttribute('data-id');
           console.log(id)

            let a=1
             
             if(a=1) {
             //ABRIR CONEXION
             const xhr=new XMLHttpRequest();
             xhr.open('GET',`inc/modelos/mcon2.php?id=${id}&accion=borrar`, true);
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




  const  generateRandomString = (num) => {
    const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let result1= Math.random().toString(36).substring(0,num);       

    return result1;
}

