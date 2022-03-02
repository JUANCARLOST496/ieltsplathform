const formulariocontac=document.querySelector('#contacto');
const listadoContactos = document.querySelector('#listado-contactos tbody')




         

eventlisteners();

function eventlisteners(){
    //creA4ar o editar
     formulariocontac.addEventListener('submit',leerform);

     //eliminar
     listadoContactos.addEventListener('click',eliminarproducto);

    
     
}

function cambioOpciones()

        {
           let corte=document.getElementById('nombre').value,
            
           cortee=corte.split('=')[1]
           corteee=corte.split('=')[2]
         
        document.getElementById('medida').value=cortee;
          

        }






        

     


        
        

        

        

function leerform(e){
    e.preventDefault();
   const nombres=document.querySelector('#nombre').value,
        nombre=nombres.split('=')[0],
        medida=document.querySelector('#medida').value,
         preciou=document.querySelector('#preciou').value,
         preciofac=document.querySelector('#preciofac').value,
         cantidad=document.querySelector('#cantidad').value,
         existencias=document.querySelector('#existencias').value,
         accion=document.querySelector('#accion').value,
         idpro=nombres.split('=')[2],
         mult=(preciou*cantidad);

         console.log(idpro)

    
        
console.log(idpro)

   if(nombre==='' || cantidad===''){
    mostrarnotificacion('Todos los campos son obligatorios','error');

         }else{
     //crear llamado a ajax


     const infocontacto=new FormData();
    infocontacto.append('nombre',nombre);
    infocontacto.append('preciou',preciou);
    infocontacto.append('preciofac',preciofac);
    infocontacto.append('cantidad',cantidad);
    infocontacto.append('accion',accion);
    infocontacto.append('idpro',idpro);
    infocontacto.append('mult',mult);
    infocontacto.append('medida',medida);
    infocontacto.append('existencias',existencias);
    console.log(...infocontacto)


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
     xhr.open('POST','inc/modelos/mcon7.php',true)
    //pasar los datos
    xhr.onload=function(){
        if(this.status===200){
            console.log(JSON.parse( xhr.responseText )) ;
            const respuesta= JSON.parse(xhr.responseText);
            //obtener un dato
            console.log(respuesta);
          

            //crear en el dom
            const textonuevo=document.createElement('tr');
            textonuevo.innerHTML=`
           <td>${respuesta.datos.idpro}</td>
              <td>${respuesta.datos.nombre}</td>
              <td>${respuesta.datos.cantidad}</td>
              <td>${respuesta.datos.medida}</td>
              <td>${respuesta.datos.preciou}</td>
              <td>${respuesta.datos.mult}</td>
              <td>${respuesta.datos.preciofac}</td>
              <td>${respuesta.datos.existencias}</td>
              <td>${respuesta.datos.fecha}</td>
              <td>${respuesta.datos.hora}</td>
              </tr>
              
            `;
          
           


            

 
             document.querySelector('form').reset();
              
            
            mostrarnotificacion('Articulo sumado','correcto')
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
            }, 100);
        }, 1000);
    }, 100);

}


function obtenerfecha(){
    const d= new Date();
    const year=d.getFullYear();
   console.log(year) 
}





