<?php
include "../conexion.php";
if(!empty($_POST['comentario'])){
    $comentario=$_POST['comentario'];
    $idCarta=$_POST['idCarta'];
 $query=mysqli_query($conection,"UPDATE carta
 SET COMENTARIO='$comentario' WHERE ID_CARTA=$idCarta");

    echo $_POST['comentario'];
}
?>