<?php
	/*if($_SESSION['tipo_usuario'] != 2)
	{
		header("location: ./");
	}*/

        include '../conexion.php';
			$query = mysqli_query($conection,"SELECT * 
											FROM carta") ;
			
    ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Lista de Cartas</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
       

<h1><center>Fotos y lista de cartas</center></h1>
<table  class="table table-hover ">
		<thead class="table-dark">
			<tr class="bg-dark">
			<th scope="col">Numero</th>
			<th scope="col">Titulo</th>
			<th scope="col">Categoria</th>
			<th scope="col">Contenido</th>
			<th scope="col">Titulo de la foto</th>
			</tr>
		</thead>
		<tbody>
			<tr class="table-light">
			<?php while ($result = mysqli_fetch_array($query)) {?>

			<td class="table-light"><strong><?php echo $result["ID_CARTA"]; ?></strong></td>
			<td class="table-light"><?php echo $result["TITULO"]; ?></td>
			<td class="table-light"><?php echo $result["ID_CATEGORIA"]; ?></td>
			<td class="table-light"><?php echo $result["CONTENIDO"]; ?></td>
			<td class="table-light"><?php echo $result["NOMBRE_IMAGEN"] ?></td>
		
	
			<?php echo $result["NOMBRE_IMAGEN"] ?>
			<img src=" <?php echo $result["IMAGEN"] ?> "  >	
				
			</tr>
				

			<?php  } ?>
		</tbody>
</table>

<!--para las fotos-->
<?php while ($result = mysqli_fetch_array($query)) {?>

<?php  } ?>


    
    

</body>
</html>


<style>
body{
	
	background: linear-gradient(90deg, rgba(8,203,218,1) 0%, rgba(209,213,213,1) 53%, rgba(8,203,218,1) 100%);;
	padding:10px;
}
img{
	border-radius:4px;
	width:100%;
    max-width:400px;
}
</style>