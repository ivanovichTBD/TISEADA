<?php 
session_start();
include "../conexion.php";

$usuario=$_SESSION['idUser'];
//echo $usuario;
$ConsultaUser=mysqli_query($conection,"SELECT ID_AREA FROM usuario WHERE IDUSUARIO='$usuario'");
$resultadoConsulta=mysqli_fetch_array($ConsultaUser);



/* Distribucion de la lista de CARTAS ----------------------------------------------------------- */



if(!empty($_POST['NuevaPalabra'])){
    $jsonString = file_get_contents('js/PalabrasTipo.json'); 
$data = json_decode($jsonString, true);
$PalabraNueva=strtoupper($_POST['NuevaPalabra']);

//echo $PalabraNueva;

if($resultadoConsulta[0]==3){
    
array_push($data[0]['Palabras'][1],"$PalabraNueva");
}elseif ($resultadoConsulta[0]==2) {
    array_push($data[0]['Palabras'][2],"$PalabraNueva");
}
else{
    array_push($data[0]['Palabras'][$resultadoConsulta[0]-1],"$PalabraNueva");  
}

$newJsonString = json_encode($data); 
//MODIFICAR EL ARCHIVO JSON PARA QUE OTROS LO USEN 
file_put_contents('js/PalabrasTipo.json', $newJsonString);
$lista = file_get_contents('js/PalabrasTipo.json'); 
$data1 = json_decode($lista, true);
$data=$data1;

function vistaCarta($resultadoConsulta,$data){
    $resultado=array();
    if($resultadoConsulta==3){
       $resultado = array_merge( $data[0]['Palabras'][0],$data[0]['Palabras'][1]);
        return $resultado;
    }elseif ($resultadoConsulta==2){
        $resultado=$data[0]['Palabras'][2];
        return $resultado;    
    }else{
        $resultado=$data[0]['Palabras'][$resultadoConsulta-1];
        return $resultado;
    }
}

}

$mostrarLista=count(vistaCarta($resultadoConsulta[0],$data));
for ($i=0; $i < $mostrarLista ; $i++) { 
    echo "<p class='ListPal'>".vistaCarta($resultadoConsulta[0],$data)[$i]."</p>";
}

?>