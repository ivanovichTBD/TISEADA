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
function VerCarta(asunto,titulo,contenido,nombreimagen,imagen){
    var titulo= document.getElementById("titulo").innerHTML=titulo;
    var asunto= document.getElementById("asunto").innerHTML="ASUNTO :  "+titulo;
    var contenido= document.getElementById("contenido").innerHTML=contenido;
    var im= document.getElementById("nombreImagen").innerHTML=nombreimagen;
    
    var imag= document.getElementById("imagen");
    var imagen=imag.style.backgroundImage = "url('"+imagen+"')";
}