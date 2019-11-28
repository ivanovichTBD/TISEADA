<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
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
	
	<main style="height: 100vh;">
		<?php include "anadirPalabrasEnCarta.php"; ?>
	
	</main

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