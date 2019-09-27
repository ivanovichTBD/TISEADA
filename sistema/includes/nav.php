	
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
						<li><a href="registro_usuario.php">Nuevo Usuario</a></li>
						<li><a href="lista_usuarios.php">Lista de Usuarios</a></li>
					</ul>
				</li>
			<?php } ?>
				<li class="principal">
					<a href="#">Escribir Carta</a>
					<ul>
						<li><a href="crear_carta.php">Nueva Carta</a></li>
						<li><a href="#">Lista e Historial de Cartas</a></li>
						<li><a href="mostrar_plantilla.php">Plantillas</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Publicaciones</a>
					<ul>
						<li><a href="#">Nuevo Publicación</a></li>
						<li><a href="#">Lista e Historial de Publicaciones</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Destacados???</a>
					<ul>
						<li><a href="#">Nuevo Producto</a></li>
						<li><a href="#">Lista de Productos</a></li>
				</ul>
				</li>
				</li>
				<li class="principal">
					<a href="#">Ayuda</a>
				</li>
				
			</ul>
		</nav>
		</div>