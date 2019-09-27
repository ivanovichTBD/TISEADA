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