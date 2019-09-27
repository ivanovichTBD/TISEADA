<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/PartesPag.css">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <?php 
	
    $alert = '';
    session_start();
    if(!empty($_SESSION['active']))
    {
        header('location: sistema/');
    }else{
    
        if(!empty($_POST))
        {
            if(empty($_POST['usuario']) || empty($_POST['clave']))
            {
                $alert = 'Ingrese su usuario y su clave';
            }else{
    
                require_once "conexion.php";
                
    
                $user = @mysqli_real_escape_string($conection, $_POST['usuario']);
                $pass = md5(@mysqli_real_escape_string($conection, $_POST['clave']));
    
                $query = @mysqli_query($conection,"SELECT * FROM usuario WHERE usuario= '$user' AND clave = '$pass'");
                @mysqli_close($conection);
                $result = @mysqli_num_rows($query);
    
                if($result > 0)
                {
                    $data = mysqli_fetch_array($query);
                    $_SESSION['active'] = true;
                    $_SESSION['idUser'] = $data['idusuario'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['email']  = $data['email'];
                    $_SESSION['user']   = $data['usuario'];
                    $_SESSION['tipo_usuario']    = $data['tipo_usuario'];
    
                    header('location: sistema/');
                }else{
                    $alert = 'El usuario o la clave son incorrectos';
                    session_destroy();
                }
    
    
            }
    
        }
    }
     ?>   
</head>
<body class="fondoP">
<?php include "sistema/includes/functions.php"?>
    <?php include "ComponentesPagPrincipal/HeaderPrincipal.php"?>
    
    <?php include "ComponentesPagPrincipal/Footer.php"?>
    <div class="contenido">
    <?php include "ComponentesPagPrincipal/subMenus.php"?>
    <?php include "ComponentesPagPrincipal/cuerpo.php"?>

    <?php include "ComponentesPagPrincipal/anexo.php"?>
    
</div>
<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
		<?php include "ComponentesPagPrincipal/Login.php"?>

	</section>
</div>
</body>
<script src="bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<script src="fontawesome-free-5.11.2-web/fontawesome.min.js"></script>
<script src="js/Mostrar.js"></script>



</html>