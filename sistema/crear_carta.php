<?php 
	session_start();
	if($_SESSION['tipo_usuario'] != 4)
	{
		header("location: ./");
	}
	
	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['titulo']) || empty($_POST['categoria']) || empty($_POST['contenido']) )
		{
			$alert='<p class="msg_error">Escribe tu carta, No dejes los campos vacios</p>';
		}else{

			$titulo = $_POST['titulo'];
			$categoria  = $_POST['categoria'];
			$contenido   = $_POST['contenido'];
            
            
			$query = mysqli_query($conection,"SELECT * FROM carta WHERE titulo = '$titulo' OR contenido = '$contenido' ");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El titulo o contenido ya existen, prueba escribiendo otro</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO carta(titulo, categoria, contenido)
																	VALUES('$titulo','$categoria','$contenido')");
				if($query_insert){
					$alert='<p class="msg_save">Tu carta see mandó correctamente</p>';
				}else{
					$alert='<p class="msg_error">Error al mandar la carta</p>';
				}

			}


		}

	}



 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php include "includes/scripts.php"; ?>
	<title>Crear carta</title>
	
</head>
<body>

	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1>Escribe Tu Carta</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="nombre">Titulo</label>
				<input type="text" name="titulo" id="titulo" placeholder="Nombre completo">
				<label for="correo">Categoria</label>
				<input type="text" name="categoria" id="categoria" placeholder="Correo electrónico">
                <label for="usuario">Contenido</label>
                <textarea name="contenido" id="contenido">Contenido</textarea>
				<label for="tipo_usuario">Tipo Usuario</label>

				<?php 

					$query_tipo_usuario = mysqli_query($conection,"SELECT * FROM tipo_usuario");
					mysqli_close($conection);
					$result_tipo_usuario = mysqli_num_rows($query_tipo_usuario);
					

				 ?>

				<select disabled name="tipo_usuario" id="tipo_usuario" > <!--select desabilitado, no podra escoger un tipo de usuario porque es un niño-->
					<?php 
						if($result_tipo_usuario > 0)
						{
							while ($tipo_usuario = mysqli_fetch_array($query_tipo_usuario)) {
					?>
							<option value="<?php echo $tipo_usuario["id_tipousuario"]; ?>"><?php echo $tipo_usuario["tipo_usuario"] ?></option>
					<?php 
								# code...
							}
							
						}
					 ?>
				</select>
				<input type="submit" value="Mandar Carta" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>
