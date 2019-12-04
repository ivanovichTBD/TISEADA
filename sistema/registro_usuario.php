<?php
//session_start();
/*if($_SESSION['tipo_usuario'] >= 1)
{
    header("location: ./");
}
*/

include "../conexion.php";
if(!empty($_POST))
{
//    include "../conexion.php";
    $alert='';
    echo $_POST['area_usuario'];
    if(empty($_POST['nombre']) || empty($_POST['edad']) || empty($_POST['email']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['tipo_usuario']))
    {
        echo "hllj";
        $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{

        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $telefono = $_POST['telefono'];
        $email  = $_POST['email'];
        $user   = $_POST['usuario'];
        $clave  = md5($_POST['clave']);
        $tipo_usuario  = $_POST['tipo_usuario'];
        $area_usuario = $_POST['area_usuario'];
echo $area_usuario;
        $query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario = '$user' OR correo = '$email' ");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">El correo o el usuario ya existe.</p>';
        }else{

            $query_insert = mysqli_query($conection,"INSERT INTO usuario(NOMBRE,EDAD,TELEFONO,CORREO,USUARIO,CLAVE,ID_TIPOUSUARIO,ESTATUS,ID_AREA,DISTRIBUCION)
                                                                VALUES('$nombre','$edad','$telefono','$email','$user','$clave','$tipo_usuario','1','$area_usuario','0')");

    if($query_insert){
                $alert='<p class="msg_save">Usuario creado correctamente.</p>';
            }else{
                $alert='<p class="msg_error">Error al crear el usuario.<br>
                                  Ingresa solo valores válidos</p>';
            }

        }


    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 width=device-width, initial-scale=1.0" name="viewport" content="width=device-width, initial-scale=1"/>
		
	<title>Registro Usuario</title>
	
</head>
<div class="cur">

<h1> <center>Registro de Usuarios</center></h1>
<div class="alert"><center><?php echo isset($alert) ? $alert : ''; ?></center></div>
<br>
<div class="container">
  <form action="#" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="nombre">Nombre Completo</label>
      </div>
      <div class="col-75">
        <input type="name" id="nombre" name="nombre" required placeholder="Nombre Completo" pattern="[a-z,A-Z]{3,40}"/>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="edad">Edad</label>
      </div>
      <div class="col-75">
        <input type="number" id="edad" name="edad" placeholder="Edad" min="8" max="99" pattern="\d+" required>
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="Telefono">Teléfono</label>
      </div>
      <div class="col-75">
        <input type="text" id="telefono" name="telefono" pattern="[0-9]{7,8}" placeholder="Teléfono o Celular">
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="correo">Corréo Electronico</label>
      </div>
      <div class="col-75">
        <input type="email" id="correo" name="email" placeholder="Correo Electronico" required>
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="usuario">Usuario</label>
      </div>
      <div class="col-75">
        <input type="text" id="usuario" name="usuario" placeholder="Usuario o Apodo">
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="clave">Contraseña</label>
      </div>
      <div class="col-75">
        <input type="password" id="clave" name="clave" placeholder="Clave de Acceso" minlength="8" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="tipo_usuario">Area de Investigacion</label>
      </div>
      <div class="col-75">
	  <?php 

					$query_area = mysqli_query($conection,"SELECT * FROM area_usuario");
					//mysqli_close($conection);
					$result_area = mysqli_num_rows($query_area);
					

				 ?>
      
				<select name="area_usuario" id="tipo_usuario">
					<?php 
						if($result_area > 0)
						{
							while ($area = mysqli_fetch_array($query_area)) {
					?>
							<option value="<?php echo $area["ID_AREA"]; ?>"><?php echo $area["NOMBRE_AREA"] ?></option>
					<?php 

							}
							
						}
					 ?>
				</select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="tipo_usuario">Tipo de Usuario</label>
      </div>
      <div class="col-75">
	  <?php 

					$query_tipo_usuario = mysqli_query($conection,"SELECT * FROM tipo_usuario");
mysqli_close($conection);
					$result_tipo_usuario = mysqli_num_rows($query_tipo_usuario);
					

				 ?>
      
				<select name="tipo_usuario" id="tipo_usuario">
					<?php 
						if($result_tipo_usuario > 0)
						{
							while ($tipo_usuario = mysqli_fetch_array($query_tipo_usuario)) {
					?>
							<option value="<?php echo $tipo_usuario["ID_TIPOUSUARIO"]; ?>"><?php echo $tipo_usuario["TIPO_USUARIO"] ?></option>
					<?php 
								# code...
							}
							
						}
					 ?>
				</select>
      </div>
    </div>
	<div class="row">
	<p>¿Eres administrador, quieres crear un nuevo tipo de Usuario? | 
	<a align="center" href="nuevo_tipousuario.php">Click Aquí</a></p>
	</div>
    
    <div class="row">
      <input type="submit" value="Crear Usuario">
    </div>
  </form>
</div>
</html>


	
	<script>
	function salir(){
		var varia=window.location.href;
		var comp="http://localhost:88/TISEADA/sistema/registro_usuario.php";
		console.log(varia);
		if(varia==comp){
			return location.href="./"
		}
	}
	</script>
	
</div>


<style>
	
	.cur{
		background: url(img/cover4.jpg) no-repeat 0px 0px;
		font-family: 'Raleway', sans-serif;
	}
	h1, p, label{
		color:white;
	}
	
	
	a{
		color:#00BCD4;
	}
	/* Style inputs, select elements and textareas */
input[type=text], [type=password], [type=name], [type=email], [type=number], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #00BCD4;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;

}

/* Style the container */
.container {
  border-radius: 5px;
  background: rgba(0, 0, 0, 0.4117647058823529);
  padding: 20px;
  
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

/* alerta */
.alert{
	background-color: #00BCD4;
	margin-top:20px;
	height:30px;
	border-radius:5px;
}
</style>