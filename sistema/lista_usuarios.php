<?php 
	session_start();
	if($_SESSION['tipo_usuario'] != 1)
	{
		header("location: ./");  //Direcciona a la pagina principal
	}
	
	include "../conexion.php";	

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php include "includes/scripts.php"; ?>
	<title>Lista de usuarios</title>
</head>
<body>
	<section id="containerU">
		
		<div class= "listaUS">
			<h1>Lista de usuarios</h1>
			<a href="registro_usuario.php" class="btn_new">Crear usuario</a>
			
			<form action="buscar_usuario.php" method="get" class="form_search">
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
				<input type="submit" value="Buscar" class="btn_search">
			</form>
		</div>

		<table>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Usuario</th>
				<th>Tipo de Usuario</th>
				<th>Acciones</th>
			</tr>
		<?php 
			//Paginador
			$sql_codificacion=mysqli_query($conection, "SET nombre utf8");
			//$sql_codificacion=mysqli_query($conection, "SET tipo_usuario utf8");
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM usuario WHERE ESTATUS = 1");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 5;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT u.IDUSUARIO, u.NOMBRE, u.CORREO, u.USUARIO, r.ID_TIPOUSUARIO FROM usuario u INNER JOIN tipo_usuario r ON u.ID_TIPOUSUARIO = r.ID_TIPOUSUARIO WHERE ESTATUS = 1 ORDER BY u.IDUSUARIO DESC LIMIT $desde,$por_pagina 
				");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					<td><?php echo $data["IDUSUARIO"]; ?></td>
					<td><?php echo $data["NOMBRE"]; ?></td>
					<td><?php echo $data["CORREO"]; ?></td>
					<td><?php echo $data["USUARIO"]; ?></td>
					<td><?php echo $data['ID_TIPOUSUARIO'] ?></td>
					<td>
						<a class="link_edit" href="editar_usuario.php?id=<?php echo $data["IDUSUARIO"]; ?>">Editar</a>

					<?php if($data["IDUSUARIO"] != 1){ ?>
						|
						<a class="link_delete" href="eliminar_confirmar_usuario.php?id=<?php echo $data["IDUSUARIO"]; ?>">Eliminar</a>
					<?php } ?>
						
					</td>
				</tr>
			
		<?php 
				}

			}
		 ?>


		</table>
		<div class="paginador">
			<ul>
			<?php 
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
			<?php } ?>
			</ul>
		</div>
	</section>
</body>
</html>