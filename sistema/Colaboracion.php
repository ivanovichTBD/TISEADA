<?php 
session_start();
include "../conexion.php";

if(!empty($_POST['asunto']) && !empty($_POST['mensaje'])  )
{   
    $asunto=$_POST['asunto'];
    $mensaje=$_POST['mensaje'];
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $user=$_SESSION['idUser'];
    $receptor=$_GET['usuario'];
    date_default_timezone_set('America/La_Paz'); 
    $time = time();
    $hora=date("Y-m-d H:i:s", $time);
  
        
        $selectUser=mysqli_query($conection,"SELECT NOMBRE FROM usuario WHERE IDUSUARIO=$user");
        $nombre=mysqli_fetch_array($selectUser);
        $emisor=$nombre['NOMBRE'];
        $selectU=mysqli_query($conection,"SELECT NOMBRE FROM usuario WHERE IDUSUARIO=$receptor");
        $nom=mysqli_fetch_array($selectU);
        $para=$nom['NOMBRE'];
    
    //$emisor=nombreUsuario($user);
    //$para=nombreUsuario($receptor);
    
    //echo $emisor;
        $query_insert = mysqli_query($conection,"INSERT INTO carta(TITULO,ASUNTO, CONTENIDO,ID_TIPO_CARTA,ESTADO_NOTIFICACION,IP_NOTIFICACION,HORA_MENSAJE)
                                                VALUES('de $emisor para : $para','$asunto','$mensaje','3','0','$ipAddress','$hora')");
        $query = mysqli_query($conection,"SELECT ID_CARTA FROM carta WHERE ASUNTO= '$asunto' And CONTENIDO = '$mensaje' ");
        $result = mysqli_fetch_array($query);
  /* Variables para enviar carta  */
    $carta=$result['ID_CARTA'];
        $query_insert1 = mysqli_query($conection,"INSERT INTO usuario_carta(ID_CARTA,IDUSUARIO) VALUES('$carta','$user')"); 
        $query_insert1 = mysqli_query($conection,"INSERT INTO usuario_carta(ID_CARTA,IDUSUARIO) VALUES('$carta','$receptor')"); 
        header("Location:EnviarMensajeARedactor.php?receptor=$receptor&&res='true'");
    }

?>