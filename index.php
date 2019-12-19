<?php 	session_start();
$alert = '';
    
    require_once "./conexion.php";
    
    $_SESSION['active']='false';
    if($_SESSION['active']=='true')
   //if(!empty($_SESSION['active']))
    {
        echo $_SESSION['active'];
   
       header('location: sistema/');
    }else{
        if(isset($_GET['usuario']) && isset($_GET['clave'])){
           // $us=@mysqli_real_escape_string($conection, $_GET['usuario']);
           require_once "conexion.php";
//$pas=md5(@mysqli_real_escape_string($conection, $_GET['clave']));
           $us=$_GET['usuario'];
            $pas=$_GET['clave'];
            $query = @mysqli_query($conection,"SELECT * FROM usuario WHERE USUARIO= $us AND CLAVE= $pas")or die(mysqli_error($conection));
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = 'true';
                $_SESSION['idUser'] = $data['IDUSUARIO'];
                $_SESSION['nombre'] = $data['NOMBRE'];
                $_SESSION['email']  = $data['CORREO'];
                $_SESSION['user']   = $data['USUARIO'];
                $_SESSION['tipo_usuario']    = $data['ID_TIPOUSUARIO'];
                
              header('location: sistema/');
              
        }
    
        if(!empty($_POST))
        {
            if(empty($_POST['usuario']) || empty($_POST['clave']))
            {
                $alert = 'Ingrese su usuario y su clave';
            }else{
    
                require_once "conexion.php";
                
    
                $user = @mysqli_real_escape_string($conection, $_POST['usuario']);
                $pass = md5(@mysqli_real_escape_string($conection, $_POST['clave']));
    
                $query = @mysqli_query($conection,"SELECT * FROM usuario WHERE usuario= '$user' AND clave = '$pass'")or die(mysqli_error($conection));
                @mysqli_close($conection);
                $result = @mysqli_num_rows($query);
    
                if($result > 0)
                {
                    $data = mysqli_fetch_array($query);
                    $_SESSION['active'] = 'true';
                    $_SESSION['idUser'] = $data['IDUSUARIO'];
                    $_SESSION['nombre'] = $data['NOMBRE'];
                    $_SESSION['email']  = $data['CORREO'];
                    $_SESSION['user']   = $data['USUARIO'];
                    $_SESSION['tipo_usuario']    = $data['ID_TIPOUSUARIO'];
    
                    header('location: sistema/');
                }else{
                    $alert = 'El usuario o la clave son incorrectos';
                    session_destroy();
                }
    
    
            }
    
        }
    }
     ?>   
   

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MENSAJERO</title>
    <link rel="stylesheet" href="css/PartesPag.css"> 
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/fontawesome.min.css"> <!--Ruta para las fuentes del login-->
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css"> <!--Ruta para los iconos del login-->
    <link rel="stylesheet" href="bootstrap-4.3.1/dist/css/bootstrap.min.css">
    </head>
    
<body class="fondoP">
    <?php include "sistema/includes/functions.php"?>
    <?php include "ComponentesPagPrincipal/HeaderPrincipal.php"?>
    
    <main>
    <div class="contenido" id="contenido">
    <?php //include "sistema/registro_usuario.php"; 
    //include "sistema/registro_niño.php"?>
        
        <?php // include "ComponentesPagPrincipal/subMenus.php"?>
        <div>
        <?php include "ComponentesPagPrincipal/cuerpo.php"?>
       </div>
        <?php include "sistema/mostrar_boletin.php";?>

        <?php include "ComponentesPagPrincipal/anexo.php"?>
        <?php //include "sistema/registro_usuario.php"; ?>
    
    </div>
    
    <?php include "ComponentesPagPrincipal/Login.php"; ?>
    </main>

    <footer>
        <?php include "ComponentesPagPrincipal/Footer.php"?>
    </footer>

<script src="https://code.jquery.com/jquery-latest.js" ></script>
<script src="js/menu.js"></script>

<script src="bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="fontawesome-free-5.11.2-web/js/fontawesome.min.js"></script>
<script src="js/Mostrar.js"></script>

</body>

</html>