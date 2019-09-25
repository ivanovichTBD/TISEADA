<?php 
	
	session_start();
	if($_SESSION['tipo_usuario'] != 1)
	{
		header("location: ./");
	}

	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario'])  || empty($_POST['tipo_usuario']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$idUsuario = $_POST['idUsuario'];
			$nombre = $_POST['nombre'];
			$email  = $_POST['correo'];
			$user   = $_POST['usuario'];
			$clave  = md5($_POST['clave']);
			$tipo_usuario    = $_POST['tipo_usuario'];


			$query = mysqli_query($conection,"SELECT * FROM usuario 
													   WHERE (usuario = '$user' AND idusuario != $idUsuario)
													   OR (correo = '$email' AND idusuario != $idUsuario) ");

			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El correo o el usuario ya existe.</p>';
			}else{

				if(empty($_POST['clave']))
				{

					$sql_update = mysqli_query($conection,"UPDATE usuario
															SET nombre = '$nombre', correo='$email',usuario='$user',tipo_usuario='$tipo_usuario'
															WHERE idusuario= $idUsuario ");
				}else{
					$sql_update = mysqli_query($conection,"UPDATE usuario
															SET nombre = '$nombre', correo='$email',usuario='$user',clave='$clave', tipo_usuario='$tipo_usuario'
															WHERE idusuario= $idUsuario ");

				}

				if($sql_update){
					$alert='<p class="msg_save">Usuario actualizado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al actualizar el usuario.</p>';
				}

			}


		}

	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_usuarios.php');
		mysqli_close($conection);
	}
	$iduser = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT u.idusuario, u.nombre,u.correo,u.usuario, (u.tipo_usuario) as id_tipousuario, (r.tipo_usuario) as tipo_usuario
									FROM usuario u
									INNER JOIN tipo_usuario r
									on u.tipo_usuario = r.id_tipousuario
									WHERE idusuario= $iduser ");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_usuarios.php');
	}else{
		$option = '';
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$iduser  = $data['idusuario'];
			$nombre  = $data['nombre'];
			$correo  = $data['correo'];
			$usuario = $data['usuario'];
			$id_tipousuario   = $data['id_tipousuario'];
			$tipo_usuario     = $data['tipo_usuario'];

			if($id_tipousuario == 1){  /*seria el Admin*/
				$option = '<option value="'.$id_tipousuario.'" select>'.$tipo_usuario.'</option>';
			}else if($id_tipousuario == 2){  /*seria el editor*/
				$option = '<option value="'.$id_tipousuario.'" select>'.$tipo_usuario.'</option>';	
			}else if($id_tipousuario == 3){  /*seria el especialista*/
				$option = '<option value="'.$id_tipousuario.'" select>'.$tipo_usuario.'</option>';
			}elseif ($id_tipousuario == 4) /*seria el niño*/ {
				$option = '<option value="'.$id_tipousuario.'" select>'.$tipo_usuario.'</option>';
			}



		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Usuario</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1>Actualizar usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="idUsuario" value="<?php echo $iduser; ?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?php echo $nombre; ?>">
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico" value="<?php echo $correo; ?>">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso">
				<label for="tipo_usuario">Tipo Usuario</label>

				<?php 
					include "../conexion.php";
					$query_tipo_usuario = mysqli_query($conection,"SELECT * FROM tipo_usuario");
					mysqli_close($conection);
					$result_tipo_usuario = mysqli_num_rows($query_tipo_usuario);

				 ?>

				<select name="tipo_usuario" id="tipo_usuario" class="notItemOne">
					<?php
						echo $option; 
						if($result_tipo_usuario > 0)
						{
							while ($tipo_usuario = mysqli_fetch_array($query_tipo_usuario)) {
					?> <!--option desabilitado -- no puede cambiar de tipo de usuario -->
							<option disabled value="<?php echo $tipo_usuario["id_tipousuario"]; ?>"><?php echo $tipo_usuario["tipo_usuario"] ?></option>
					<?php 
								# code...
							}
							
						}
					 ?>
				</select>
				<input type="submit" value="Actualizar usuario" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>