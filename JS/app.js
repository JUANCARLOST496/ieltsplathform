const formulariocontac=document.querySelector('#contacto');
const listadoContactos = document.querySelector('#listado-contactos tbody')

eventlisteners();

function eventlisteners(){
     formulariocontac.addEventListener('submit',leerform);
}

function leerform(e){
    e.preventDefault();
   const nombre=document.querySelector('#nombre').value,
         empresa=document.querySelector('#empresa').value,
         tel=document.querySelector('#telefono').value,
         accion=document.querySelector('#accion').value;


   if(nombre==='' || empresa==='' || tel===''){
    mostrarnotificacion('Todos los campos son obligatorios','error');

         }else{
     //crear llamado a ajax

     const infocontacto=new FormData();
    infocontacto.append('nombre',nombre);
    infocontacto.append('empresa',empresa);
    infocontacto.append('telefono',tel);
    infocontacto.append('accion',accion);
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
              <td>${respuesta.datos.empresa}</td>
              <td>${respuesta.datos.telefono}</td>
            `;
             //add
             listadoContactos.appendChild(textonuevo);

        }
    }
    //enviar los datos
    xhr.send(datos)
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
            }, 300);
        }, 3000);
    }, 100);

}
