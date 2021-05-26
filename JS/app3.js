const envia=document.querySelector('#blank');

eventlisteners();

function eventlisteners(){
    //creA4ar o editar
     envia.addEventListener('submit',leerforma);
}


function redirect()
{
    setTimeout(() => {
        window.location.href = 'facturas.php';
    }, 1000);
        
   
}



function leerforma(e){
    e.preventDefault();
    let num_pro = document.getElementById("listado-contactos").rows.length-2;
    
   const enviarf=document.querySelector('#enviarf').value,
   codigoc=document.querySelector('#codigoc').value,
   valorv=document.querySelector('#prueba').value,
   cantidadp=num_pro

   console.log(valorv)

   const infoenv=new FormData();
   infoenv.append('enviarf',enviarf);
   infoenv.append('codigoc',codigoc);
   infoenv.append('valorv',valorv);
   infoenv.append('cantidadp',cantidadp);


   if(enviarf==='facturar'){
    insertBD(infoenv);
    console.log("sies")
    

   
}else{
   console.log("nada")
}


function insertBD(dato){
//llamado a ajax
 

//crear el objeto
const xhr= new XMLHttpRequest();
//abrir la conexion
xhr.open('POST','inc/modelos/mcon5.php',true)
//pasar los datos
xhr.onload=function(){
   if(this.status===200){
       console.log( xhr.responseText) ;


       


   }


}

xhr.send(dato);
redirect()
}
}