<?php
//session_start();
include "../conexion.php";
if($_SESSION['tipo_usuario']==3){
$usuario=$_SESSION['idUser'];

$ConsultaUser=mysqli_query($conection,"SELECT ID_AREA FROM usuario WHERE IDUSUARIO='$usuario'");
$resultadoConsulta=mysqli_fetch_array($ConsultaUser);

$jsonString = file_get_contents('js/PalabrasTipo.json'); 
$data = json_decode($jsonString, true);

/* Distribucion de la lista de CARTAS ----------------------------------------------------------- */

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

?>
<div id="FormularioPalabras"  class="FormularioPalabras">
    <div class="w3l-login-form izquierdaP" >
      <div class="izqierda" >
        <h2>INTRODUCIR UNA NUEVA PALABRA</h2>
        
        <form action="#" method="post">
            <div class="w3l-form-group">
                <div class="group">
                    <input id="palabra" type="text" name="NuevaPalabra" class="form-control" placeholder="Introducir nueva palabra" required="required" />
                </div>
            </div>
            <button onclick="listaTiempoReal()" id="introducioPal" class="botoningreso" type="submit">INTRODUCIR</button>
        </form>
        </div>
    </div>

    <div class="w3l-login-form derechaP" >
        <h2 class="subtitulo">Palabras del Area por Defecto</h2>
        <div id="listaPalabras">
            <?php
            $mostrarLista=count(vistaCarta($resultadoConsulta[0],$data));
            for ($i=0; $i < $mostrarLista ; $i++) { 
                echo "<p class='ListPal'>".vistaCarta($resultadoConsulta[0],$data)[$i]."</p>";
            }
            ?>
        </div>
    </div>
</div>
        <?php }?>

<style>









    












</style>


<!--
<div id="FormularioPalabras" >

<form action="#" method="POST">

<label for=""> Ingresa nuevas Palabras </label>
<input type="text" placeholder="ingresa usuario" name="NuevaPalabra">
<button type="submit">Enviar Palabra</button>

</form>


</div>
-->