<?php 

	if(empty($_SESSION['active'])) //inicio sesión
	{
		header('location: ../');  //Direcciona a la pagina principal
	}
 ?>
<header>
	<div class="row">
		<div class=" navbar navbar-dark justify-content-between header">
			<div class="col-xs-12 col-md-10">
				<h1 class="Titulo " >MENSAJERO</h1>
			</div>
			<div class="col-xs-12 col-md-2">
				<form class="form-inline my-1 avatarUsu">
					<div class="md-form form-sm my-0 optionsBar c">
						
						<span class="user"><?php echo $_SESSION['user'].'-'.$_SESSION['nombre']; ?></span>
						<img class="photouser" src="img/user.png" alt="Usuario">
						<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
					</div>
				</form>	
			</div>
		</div></div>
	
	
		<!-- navegador -->
		
			<?php include "nav.php"; ?>
		
		<!-- FIN navegador -->
		<p class="fecha">Bolivia, <?php echo fechaC(); ?></p>
</header>
	