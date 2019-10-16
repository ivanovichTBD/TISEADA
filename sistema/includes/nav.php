	
		<div class="topnav" id="myTopnav">
		<nav>
			<ul>
				<li><a href="index.php">Inicio</a></li>
			<?php 
				if($_SESSION['tipo_usuario'] == 1){
			 ?>
				<li class="principal">

					<a href="#">Usuarios</a>
					<ul>
						<li><a href="#" onclick="return form()">Nuevo Usuario</a></li>
						<li><a href="lista_usuarios.php">Lista de Usuarios</a></li>
					</ul>
				</li>
			<?php } ?>

			<?php if($_SESSION['tipo_usuario'] == 4){
			  ?>
				<li class="principal">
					<a href="#">Escribir Carta</a>
					<ul>
						<li><a href="crear_carta.php">Nueva Carta</a></li>
						<li><a href="mostrar_plantilla.php">Plantillas</a></li>
					</ul>

				</li>
			<?php } ?>

			
			<?php if($_SESSION['tipo_usuario'] == 3 || $_SESSION['tipo_usuario'] == 4){
			  ?>
				<li class="principal">
					<a href="#">Cartas y Publicaciones</a>
					<ul>
						<li><a href="lista_cartas.php">Lista de Cartas</a></li>
						<li><a href="#">Historial de Publicaciones</a></li>
					</ul>
				</li>
				<?php } ?>	
				
				</li>
				<li class="principal">
					<a href="#">Ayuda</a>
				</li>
				
			</ul>
		</nav>
		</div>
		<script>
		function form(){
			document.getElementById('iframe').src="registro_usuario.php";
        return false;
}
		</script>