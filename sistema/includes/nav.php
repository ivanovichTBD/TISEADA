	
<div class="menu_bar">
	  <a href="#" class="bt-menu"><span class="icon-view-list"></span>Menu</a>
</div>
		<div class="topnav" id="myTopnav">
		<nav class="navbar-expand-lg  scrolling-navbar">
			<ul>
				<li><a href="index.php">Inicio</a></li>
			<?php 
				if($_SESSION['tipo_usuario'] == 1){
			 ?>
				<li class="principal">
					<a href="#">Usuarios</a>
					<ul class="children">
						<li><a href="#" onclick="return form()">Nuevo Usuario</a></li>
						<li><a href="lista_usuarios.php">Lista de Usuarios</a></li>
					</ul>
				</li>
			<?php } ?>

			<?php if($_SESSION['tipo_usuario'] == 4){
			  ?>
				<li class="principal">
					<a href="#" class="letraNiño">Escribir Carta</a>
					<ul class="children">
						<li><a href="crear_carta.php" class="letraNiño">Nueva Carta</a></li>
						<li><a href="mostrar_plantilla.php" class="letraNiño">Plantillas</a></li>
					</ul>

				</li>
			<?php } ?>

			
			<?php if( $_SESSION['tipo_usuario'] == 4){ ?>
				<li class="principal">
					<a href="#" class="letraNiño">Cartas</a>
					<ul class="children">
					
						<li><a href="lista_cartas.php" class="letraNiño">Lista de Cartas</a></li>
				<!--		<li><a href="#">Historial de Publicaciones</a></li>		-->
					</ul>
				</li>
				<li class="principal">
					<a href="ayuda.php" class="letraNiño">Ayuda</a>
				</li>
				<?php } ?>	
				
			<?php if($_SESSION['tipo_usuario'] == 3){ ?>
				<li class="principal">
					<a href="#">Sobre las Cartas</a>
					<ul class="children">
					
						<li><a href="lista_cartas.php">Lista de Cartas</a></li>
						<li><a href="#anadirPalabrasEnCarta.php" onclick="ViewAnadirPalabra()">Informacion sobre las Cartas</a></li>		
					</ul>
				</li>
				<li class="principal">
					<a href="#">Redactar</a>
					<ul class="children">
						<li><a href="redactar_carta.php">CREAR REDACCION</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Colaborar </a>
					<ul class="children">
					
					<li><a href="chat_con_websocket/index.php">Colaboración entre redactores</a></li>
						
					</ul>
				</li>
			<?php } ?>

			<?php if($_SESSION['tipo_usuario'] == 2){ ?>
				<li class="principal">
					<a href="#">Publicaciones </a>
					<ul>
					
					<li><a href="publicar_boletin.php">Publicar Boletin</a></li>
						
					</ul>
				</li>
			<?php } ?>

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