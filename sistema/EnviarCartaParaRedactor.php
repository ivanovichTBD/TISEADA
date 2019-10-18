<?php


function Distruibuir($carta,$tipoUsuario,$conection){


$query = mysqli_query($conection,"SELECT ID_CATEGORIA FROM carta WHERE ID_CARTA='$carta' ");
$result = mysqli_fetch_array($query);
$categoriaCarta=$result['ID_CATEGORIA'];

       /*Funcion para distinguir Area de Usuario */   
       function CategoriaUser($categoriaCarta){

           if($categoriaCarta==1){
                   return 2;
             }
            else{
                return $categoriaCarta;
               }
            }
$idCategoria=CategoriaUser($categoriaCarta);

$consultaTipo = mysqli_query($conection,"SELECT IDUSUARIO FROM usuario WHERE ID_TIPOUSUARIO='3' and DISTRIBUCION='0' and ID_AREA='$idCategoria'");
$tam=mysqli_num_rows($consultaTipo);
$listaTam=array();
if($tam>0){     
while($result = mysqli_fetch_array($consultaTipo)){
$RedactoresSinCartas=$result['IDUSUARIO'];
array_push($listaTam,$RedactoresSinCartas);  
}
$tamano=array_rand($listaTam,1);

$Id_Aleatorio=$listaTam[$tamano];
$query_insert1 = mysqli_query($conection,"INSERT INTO usuario_carta(ID_CARTA,IDUSUARIO) VALUES('$carta','$Id_Aleatorio')");
$actualizacionalDistribuir=mysqli_query($conection,"UPDATE usuario SET DISTRIBUCION = 1 WHERE IDUSUARIO='$Id_Aleatorio'");
return "enviado correctamente";
}else{
$actualizacion=mysqli_query($conection,"UPDATE usuario SET DISTRIBUCION = 0 WHERE ID_AREA='$idCategoria' AND ID_TIPOUSUARIO='$tipoUsuario' AND DISTRIBUCION='1'");
//Distribuir($carta,$tipoUsuario);
$consultaTipo = mysqli_query($conection,"SELECT IDUSUARIO FROM usuario WHERE ID_TIPOUSUARIO='3' and DISTRIBUCION='0' and ID_AREA='$idCategoria'");
$tam=mysqli_num_rows($consultaTipo);
$listaTam=array();
if($tam>0){     
while($result = mysqli_fetch_array($consultaTipo)){
$RedactoresSinCartas=$result['IDUSUARIO'];
array_push($listaTam,$RedactoresSinCartas);  
}
$tamano=array_rand($listaTam,1);

$Id_Aleatorio=$listaTam[$tamano];
$query_insert1 = mysqli_query($conection,"INSERT INTO usuario_carta(ID_CARTA,IDUSUARIO) VALUES('$carta','$Id_Aleatorio')");
$actualizacionalDistribuir=mysqli_query($conection,"UPDATE usuario SET DISTRIBUCION = 1 WHERE IDUSUARIO='$Id_Aleatorio'");
return "enviado correctamente";
}
else{
  return "no hay nadie del area";
 
}
}

}