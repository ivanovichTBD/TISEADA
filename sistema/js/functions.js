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