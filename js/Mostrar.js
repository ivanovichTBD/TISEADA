function MostrarMisionVision(){
    var att= document.getElementById("vision").getAttribute("style");
    if(att==null){
    var vision=document.getElementById("vision");
    vision.style.display="flex";
 }
    else{
        var vis=document.getElementById("vision");
        vis.removeAttribute("style");
    }
}
function MostrarLogin(){

    var ContenidoPrincipal= document.getElementById("contenido");
    var ContenidoLogin= document.getElementById("IngresoUser");
    var estiloLogin=ContenidoLogin.getAttribute("style");
    if(estiloLogin=="display:none"){
        ContenidoLogin.removeAttribute('style');
        ContenidoLogin.style.display='flow-root';
        ContenidoPrincipal.style.display='none';
    }
   
    /*if(att==null){
    var vision=document.getElementById("vision");
    vision.style.display="flex";
 }
    else{
        var vis=document.getElementById("vision");
        vis.removeAttribute("style");
    }*/
}
