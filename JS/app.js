const formulariocontac=document.querySelector('#contacto');

eventlisteners();

function eventlisteners(){
     formulariocontac.addEventListener('submit',leerform);
}

function leerform(e){
    e.preventDefault();
   const nombre=document.querySelector('#nombre').value,
         empresa=document.querySelector('#empresa').value,
         tel=document.querySelector('#telefono').value;
   console.log(nombre);
   console.log(empresa);
   console.log(tel);
   if(nombre==='' || empresa==='' || tel===''){
    console.log('Esta vacio');
   }else{
       console.log("no problem");
   }
}

function mostrarnotificacion(){
    const notificacion=document.createElement('div');
    notificacion.textContent='hubo un error';
}
