<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Niño Mensajero</title>
</head>
<body>

	<?php include "includes/header.php"; ?>
	<?php include "anadirPalabrasEnCarta.php"; ?>
	<iframe id="iframe" > </iframe>
	<?php include "includes/footer.php"; ?>
</body>

</html>