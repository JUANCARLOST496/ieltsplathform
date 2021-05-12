const formulariocontac=document.querySelector('#contacto');
const listadoContactos = document.querySelector('#listado-contactos tbody')

eventlisteners();

function eventlisteners(){
     formulariocontac.addEventListener('submit',leerform);
}

function cambioOpciones()

        {
           let corte=document.getElementById('nombre').value,
           cortee=corte.split('=')[1]

            document.getElementById('empresa').value=cortee;
            

        }

        function suma(){
            let total=0;
        let celdaselects= document.querySelectorAll('td+td+td+td')
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
         empresa=document.querySelector('#empresa').value,
         tel=document.querySelector('#telefono').value,
         accion=document.querySelector('#accion').value,
         mult=(empresa*tel);

        console.log(mult);
        console.log(accion);


   if(nombre==='' || empresa==='' || tel===''){
    mostrarnotificacion('Todos los campos son obligatorios','error');

         }else{
     //crear llamado a ajax


     const infocontacto=new FormData();
    infocontacto.append('nombre',nombre);
    infocontacto.append('empresa',empresa);
    infocontacto.append('telefono',tel);
    infocontacto.append('accion',accion);
    infocontacto.append('mult',mult);
    
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
              <td>${respuesta.datos.mult}</td>
            `;
             //add
             listadoContactos.appendChild(textonuevo);
              
            document.querySelector('form').reset();
            mostrarnotificacion('Contacto creado','correcto')
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


function ShowSelected() { /* Para obtener el valor */
    var cod = document.getElementById("nombre").value;
    var txt = document.getElementById("prue").value;  
    /* Para obtener el texto */
    var combo = document.getElementById("nombre");
    var selected = combo.options[combo.selectedIndex].value;  
    if (selected == "kumis") {
      document.getElementById('lbl').innerText = '10000';
    } else {
      document.getElementById('lbl').innerText = '';
    }
  }


  