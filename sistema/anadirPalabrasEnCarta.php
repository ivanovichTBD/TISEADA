<?php
//session_start();
include "../conexion.php";

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
<div id="FormularioPalabras" style="display:none" class="FormularioPalabras">
<div class="w3l-login-form" >
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
<h2 class="subtitulo">
Palabras del Area por Defecto
</h2>
<div id="listaPalabras">
<?php
$mostrarLista=count(vistaCarta($resultadoConsulta[0],$data));
for ($i=0; $i < $mostrarLista ; $i++) { 
    echo "<p class='ListPal'>".vistaCarta($resultadoConsulta[0],$data)[$i]."</p>";
}

?>

</div>

</div>


<style>
.FormularioPalabras{
    
    margin: 0;
    padding: 0;
    /*background: url(../images/) no-repeat 0px 0px;*/
    min-height: 100vh;
    background-size: cover;
    font-family: 'Raleway', sans-serif;


}
.subtitulo{
    Margin-top:20px;
    color:black;

}
.ListPal{
    /*width:121px;*/
    display:inline-block;
    margin-left:15px;

}

h2 {
    margin: 0;
    color: rgb(248, 252, 249);
    font-size: 25px;
    font-weight: 400;
    text-align: center;
    letter-spacing: 1px;
    padding-bottom: 30px;
}

.w3l-login-form {
    background: rgba(20, 30, 34, 0.412);
    max-width: 500px;
    margin: 0 auto;
    padding: 3em;
    border-radius: 10px;
    box-sizing: border-box;
    margin-top: 90px;

}

.group {
    display: flex;
    padding: 15px 5px;
    background-color: #ffffff;
}

.group i {
    color: #00BCD4;
    font-size: 20px;
    padding: 0 10px;
}

.w3l-form-group {
    margin: 20px 0;
}

.w3l-form-group label {
    display: block;
    text-transform: uppercase;
    font-size: 13px;
    color: #d2d2d2;
    letter-spacing: 2px;
    margin-bottom: 10px;
    font-style: italic;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    border: none;
    box-sizing: border-box;
    background: transparent;
    color: #000;
}

input[type="text"]:focus,
input[type="password"]:focus {
    outline: none;
}

.botoningreso {
    background: #00BCD4;
    color: #ffffff;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
    padding: 12px 60px;
    cursor: pointer;
    width: 100%;
    border-radius: 6px;
}

.botoningreso:hover {
    background-color: #00BCD4;
    transition-duration: 5s;
}



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