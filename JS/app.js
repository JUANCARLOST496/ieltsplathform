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
    mostrarnotificacion('Todos los campos son obligatorios','error');
   }else{
       console.log("no problem");
   }
}

function mostrarnotificacion(){
    const notificacion=document.createElement('div');
  
    notificacion.classList.add('notificacion');
    notificacion.textContent='hubo un error';
    formulariocontac.insertBefore(notificacion,document.querySelector("form div"));

    setTimeout(() => {
        notificacion.classList.add('visible');
        setTimeout(() => {
            notificacion.classList.remove('visible');
            notificacion.remove()
        }, 3000);
    }, 100);

}
