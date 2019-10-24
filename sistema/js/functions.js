function ViewAnadirPalabra(){

   // var ContenidoPrincipal= document.getElementById("contenido");
    var ContenidoLogin= document.getElementById("FormularioPalabras");
    var estiloLogin=ContenidoLogin.getAttribute("style");
    if(estiloLogin=="display:none"){
        ContenidoLogin.removeAttribute('style');
        ContenidoLogin.style.display='flow-root';
       // ContenidoPrincipal.style.display='none';
    }
}
function VerCarta(asunto,titulo,contenido,nombreimagen,imagen,cont){
    var titulo= document.getElementById("titulo").innerHTML=titulo+"  #<p id='numero'>"+(cont-1)+"</p>";
    var asunto= document.getElementById("asunto").innerHTML="ASUNTO :  "+asunto;
    var contenido= document.getElementById("contenido").innerHTML=contenido;
    var im= document.getElementById("nombreImagen").innerHTML=nombreimagen;
    
    var imag= document.getElementById("imagen");
    var imagen=imag.style.backgroundImage = "url('"+imagen+"')";
    
}


function listaTiempoReal(){
   
    var palabra=$('#palabra').val();
   // $('#FormularioPalabras').on('submit', function(event){
        event.preventDefault();
        //console.log($('#palabra').val());
        //event.stopPropagation();
          $.ajax({
              url:"nuevaPalabra.php",
              method:"POST",
            data:{NuevaPalabra:palabra},
            success:function(data){
               console.log(data);
               $('#listaPalabras').html(data);     
            }
          })      
   // })
}
function comentar(){
    
    
    var comentario=$('#comentario').val();
    var num=document.getElementById('numero').innerHTML;
    
    
    event.preventDefault();
    
    var idCarta=$('.idCarta')[num-1].getAttribute('value');
    $.ajax({
        url:"comentario.php",
        method:"post",
      data:{comentario:comentario,idCarta:idCarta},
      success:function(data){
        var ubicacion=document.getElementsByClassName('pos-fila')[num-1].getElementsByClassName('pos-col')[4].innerHTML=data; 
      }
    })  
}