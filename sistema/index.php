<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php include "includes/scripts.php"; ?>
	<title>	MENSAJERO</title>
</head>

<body>

	<!-- cambio de estilo cabecera segun tipo de usuario-->	
	<?php if($_SESSION['tipo_usuario'] !=4){?>
		<div class="fixed-top trabajadores">
			<?php include "includes/header.php"; ?>
		</div>
	<?php } ?>

	<?php if($_SESSION['tipo_usuario'] == 4){?>
		<div class="fixed-top usuarioNiño">
			<?php include "includes/header.php"; ?>
		</div>
	<?php } ?>
	<!-- FIN cambio de estilo cabecera segun tipo de usuario-->	

	<?php 
		include "crear_carta.php";
		?>
	<main style="height: 100vh;">
		<div class="contenido" id="contenido">
			<?php include "anadirPalabrasEnCarta.php"; ?>
		</div>

	</main
		<?php ?>
	<iframe id="iframe" > </iframe>
		
	<footer>
		<!-- cambio de estilo cabecera segun tipo de usuario-->	
		<?php if($_SESSION['tipo_usuario'] !=4){?>
				<div class="Footertrabajadores">
					<?php include "../ComponentesPagPrincipal/Footer.php"; ?>
				</div>
			<?php } ?>

			<?php if($_SESSION['tipo_usuario'] == 4){?>
				<div class="FooterNiño">
					<?php include "../ComponentesPagPrincipal/Footer.php"; ?>
				</div>
			<?php } ?>
			<!-- FIN cambio de estilo cabecera segun tipo de usuario-->	
	</footer>

</body>

</html>