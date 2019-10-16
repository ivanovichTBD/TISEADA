<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Material Login Form a Responsive Widget Template :: w3layouts</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, 
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="css/fontawesome-all.css" rel="stylesheet" />
	<link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/fontawesome-all.css">
	<?php 
	
    $alert = '';
    session_start();
    /*if(!empty($_SESSION['active']))
    {
        header('location: sistema/');
	 }else{*/
    
        if(!empty($_POST))
        {
            if(empty($_POST['usuario']) || empty($_POST['clave']))
            {
                $alert = 'Ingrese su usuario y su clave';
            }else{
    
                require_once "../conexion.php";
                
    
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
    
                    header('location: ../sistema/index.php');
                }else{
                    $alert = 'El usuario o la clave son incorrectos';
                    session_destroy();
                }
    
    
            }
    
        }
    
     ?>   
</head>


<body>
    
    <div class=" w3l-login-form">
        <h2>MENSAJERO</h2>
        <form action="#" method="POST">

            <div class=" w3l-form-group">
                <label>APODO:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input name="usuario" type="text" class="form-control" placeholder="Apodo" required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>CONTRASEÑA:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input name="clave" type="password" class="form-control" placeholder="Contraseña" required="required" />
                </div>
            </div>
            <div class="forgot">
           
                <p><input type="checkbox">Recuérdame</p>
            </div>
            <button class="botoningreso"type="submit">INGRESAR</button>
        </form>
        <p class=" w3l-register-p">Ya tienes cuenta?<a href="#" class="register"> Registrarse</a></p>
    </div>
    

</body>

</html>
    

<Style>

body {
    margin: 0;
    padding: 0;
    background: url(../sistema/img/cover4.jpg) no-repeat 0px 0px;
    min-height: 100vh;
    background-size: cover;
    font-family: 'Raleway', sans-serif;
}
h1 {
    margin: 0;
    color: #ffffff;
    text-align: center;
    font-size: 50px;
    font-weight: 500;
    letter-spacing: 2px;
    padding: 50px 0;
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

p.w3l-register-p {
    color: #eee;
    font-size: 13px;
    text-align: center;
    margin-top: 2em;
}

.w3l-login-form {
    background: rgba(0, 0, 0, 0.4117647058823529);
    //background: #6EB5FF;
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
    background-color: #00BCD4;
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

.forgot {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
    }

.letras {
    color: #ffffff;
    font-size: 14px;
    text-decoration: none;
}

.forgot p {
    color: #ffffff;
    text-align: center;
    margin: 0px;
	font-size: 13px;
}

.register {
    color: #00BCD4;
    text-decoration: none;
}


</Style>