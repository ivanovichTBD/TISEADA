<?php
if(!empty($_POST['NuevaPalabra'])){
$PalabraNueva=$_POST['NuevaPalabra'];
session_start();
echo "el usuario :  ".$_SESSION['idUser']."<BR>";
echo $PalabraNueva."<BR>";

$jsonString = file_get_contents('js/PalabrasTipo.json'); 
$data = json_decode($jsonString, true);

//array_push($data[0]['Palabras'][1],"HERMOSO");

$CantPal=count($data[0]['Palabras'][1]);
array_push($data[0]['Palabras'][1],$PalabraNueva);
$newJsonString = json_encode($data); 

file_put_contents('js/PalabrasTipo.json', $newJsonString);



for ($i=0; $i <$CantPal ; $i++) { 
   echo $data[0]['Palabras'][1][$i]."<br>";
}

//var_dump($data[0]['Palabras'][1]);
}
?>


<div id="FormularioPalabras" >

<form action="#" method="POST">

<label for=""> Ingresa nuevas Palabras </label>
<input type="text" placeholder="ingresa usuario" name="NuevaPalabra">
<button type="submit">Enviar Palabra</button>

</form>


</div>