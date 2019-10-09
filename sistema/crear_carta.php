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

			$nombre_imagen = $_REQUEST['nombre_imagen'];
			$imagen = $_FILES['imagen']['name'];
			$ruta   = $_FILES['imagen']['tmp_name']; //ruta 
			$destino = "repo_imagenes/".$imagen;  //destino donde se almacenara y le adjuntamos el nombre de la imagen
			copy($ruta, $destino);   //para copiar el archivo al repositorio
            
			$query = mysqli_query($conection,"SELECT * FROM carta WHERE titulo = '$titulo' OR contenido = '$contenido' ");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El titulo o contenido ya existen, prueba escribiendo otro</p>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO carta(titulo, categoria, contenido, nombre_imagen, imagen)
																	VALUES('$titulo','$categoria','$contenido', '$nombre_imagen','$destino')");
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

			<form action="" method="post" enctype="multipart/form-data">
				<label for="nombre">Titulo de tu Carta</label>
				<input required  type="text" name="titulo" id="titulo" placeholder="Nombre completo">
				<label for="correo">Categoria</label>
				<input required  type="text" name="categoria" id="categoria" placeholder="Categoria">
                <label for="usuario">Contenido</label>
                <textarea required  name="contenido" id="contenido"></textarea>
				
				<label for="nombre_imagen">Ingresa un titulo para tu foto</label>
				<input type="text" name="nombre_imagen" id="nombre_imagen">
				<label for="imagen">Selecciona una foto</label>
				<input type="file" name="imagen" id="imagen">
					
				
						
				<input type="submit" value="Mandar Carta" class="btn_save">

			</form>

		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>
