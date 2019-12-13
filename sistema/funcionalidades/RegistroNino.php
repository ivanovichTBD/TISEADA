<?php include "../../conexion.php";
if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['nombre']) || empty($_POST['edad']) || empty($_POST['contrasena']))
    {
        $alert='<div class="alert alert-warning text-center" role="alert">Le Falto algun campo completelo amiguito</div>';
    }else{

        $usuario = $_POST['nombre'];
        $edad = $_POST['edad'];
        $contrasena= md5($_POST['contrasena']);
        $clave=$_POST['contrasena'];
        $query = mysqli_query($conection,"SELECT * FROM usuario WHERE USUARIO = '$usuario' ");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<div class="alert alert-warning" role="alert"> Existe una Cuenta con el mismo Apodo Intente con uno Nuevo</div>';
        }else{

            $query_insert = mysqli_query($conection,"INSERT INTO usuario(NOMBRE,EDAD,USUARIO,CLAVE,ID_TIPOUSUARIO,ESTATUS,DISTRIBUCION)
                                                                VALUES('$usuario','$edad','$usuario','$contrasena','4','1','0')");

    if($query_insert){
                //$alert=html_entity_decode('<a href="../index.php?usuario=$usuarioamsperdanclave=$clave">folall</a>');
               $alert='<div class="alert alert-success text-center" role="alert">"Felicidades Creaste Tu Cuenta"<a href="../index.php'."?usuario='$usuario'"."00ampclave='$contrasena'".'"><button type="button" class="btn btn-dark">Ingresar a mi cuenta</button></a></div>';
//$alert=$url;
            }else{
                $alert='<div class="alert alert-warning text-center" role="alert"> Se Produjo un Error en el Sevidor Vuelve a intentarlo </div>';
            }

        }

        mysqli_close($conection);
        }
        header("Location: ../registro_niño.php?alerta=$alert");
    
}

?>

