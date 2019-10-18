<?php
if(!empty($_POST['NuevaPalabra'])){
$PalabraNueva=strtoupper($_POST['NuevaPalabra']);

session_start();
include "../conexion.php";

$usuario=$_SESSION['idUser'];
$ConsultaUser=mysqli_query($conection,"SELECT ID_AREA FROM usuario WHERE IDUSUARIO='$usuario'");
$resultadoConsulta=mysqli_fetch_array($ConsultaUser);
$jsonString = file_get_contents('js/PalabrasTipo.json'); 
$data = json_decode($jsonString, true);
/* Distribucion de la lista de CARTAS ----------------------------------------------------------- */
function vistaCarta($resultadoConsulta,$data){
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

$mostrarLista=count(vistaCarta($resultadoConsulta[0],$data));
for ($i=0; $i < $mostrarLista ; $i++) { 
    echo "<p>".vistaCarta($resultadoConsulta[0],$data)[$i]."</p>";
}

//array_push($data[0]['Palabras'][1],"HERMOSO");

$CantPal=count($data[0]['Palabras'][1]);
array_push($data[0]['Palabras'][$resultadoConsulta-1],$PalabraNueva);
$newJsonString = json_encode($data); 

//file_put_contents('js/PalabrasTipo.json', $newJsonString);



//for ($i=0; $i <$CantPal ; $i++){ 
 //  echo $data[0]['Palabras'][1][$i]."<br>";
//}

//var_dump($data[0]['Palabras'][1]);
//}
}
?>


<div id="FormularioPalabras" >

<form action="#" method="POST">

<label for=""> Ingresa nuevas Palabras </label>
<input type="text" placeholder="ingresa usuario" name="NuevaPalabra">
<button type="submit">Enviar Palabra</button>

</form>


</div>