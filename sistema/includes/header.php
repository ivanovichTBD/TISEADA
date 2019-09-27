<?php 

	if(empty($_SESSION['active'])) //inicio sesión
	{
		header('location: ../');  //Direcciona a la pagina principal
	}
 ?>
	<header>
		<div class="header">
			
			<h1 class="Titulo" >MENSAJERO</h1>
			<div class="optionsBar">
				</p>
				
				<span class="user"><?php echo $_SESSION['user'].'-'.$_SESSION['nombre']; ?></span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		
		</div>
		<?php include "nav.php"; ?>
		<p class="fecha">Bolivia, <?php echo fechaC(); ?></p>
	</header>