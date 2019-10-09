<?php
        include '../conexion.php';
			$query = mysqli_query($conection,"SELECT * FROM carta ");
			
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Cartas</title>
</head>
<body>
        <h2>Lista de Cartas</h2>
        <table>
			<tr>
				<th>Numero</th>
				<th>Titulo</th>
				<th>Categoria</th>
				<th>Contenido</th>
				<th>Nombre de la Foto</th>
				<th>Foto</th>
			</tr>
		<?php 

				while ($result = mysqli_fetch_array($query)) {
					
			?>
                <div>
				<tr>
					<td><?php echo $result["id_carta"]; ?></td>
					<td><?php echo $result["titulo"]; ?></td>
					<td><?php echo $result["categoria"]; ?></td>
					<td><?php echo $result["contenido"]; ?></td>
					<td><?php echo $result["nombre_imagen"] ?></td>
                   <td><img src="  <?php echo $result["imagen"] ?> "  width="200" height="200"> </td>
				</tr>
			
                </div>
		<?php 
				}


		 ?>


		</table>
    
    

</body>
</html>
