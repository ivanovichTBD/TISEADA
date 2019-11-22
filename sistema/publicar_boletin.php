<?php
/*if($_SESSION['tipo_usuario'] != 2)
	{
		header("location: ./");
    }*/
    session_start();
    include "../conexion.php"; //nos conectamos a la bd
    $queryArticulo = mysqli_query($conection,"SELECT * FROM articulo") ; //extraemos toda la info del articulo

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['titulo']) )
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{

        $titulo = $_POST['titulo'];
        
        $imagen = $_FILES['imagen']['name'];
        $ruta   = $_FILES['imagen']['tmp_name'];
        $destino = "sistema/repo_imagenes_boletin/".$imagen;
        copy($ruta, $destino);
    
        
        $query = mysqli_query($conection,"SELECT * FROM boletin WHERE titulo = '$titulo' ");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">El boletin ya existe</p>';
        }else{

            $query_insert = mysqli_query($conection,"INSERT INTO boletin(titulo,imagen)
                                                                VALUES('$titulo','$destino')");
            if($query_insert){
                $alert='<p class="msg_save">El boletin se publico correctamente.</p>';
            }else{
                $alert='<p class="msg_error">Error al publicar el boletin.<br>
                                  Ingresa todos los campos y valores correctos</p>';
            }

        }


    }

}

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Publicar boletin</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	
	<section id="container">
		
		<center><h1>Publicar Boletin</h1></center><br>
		<!--formulario para redactar y enviar-->		
		
          
			<center><form action="" method="POST" enctype="multipart/form-data">
                
                <div class="col-md-6" id="reply">
                    <label for="titulo">Titulo del Boletin</label>
                    <input class="form-control" required type="text" id="titulo" name="titulo" placeholder="Titulo">
                <!--<div id="message">
                    <label for="contenido">Contenido de la carta</label>
                    <textarea  class="texto_area" required id="contenido" name="contenido"></textarea>
                </div> -->
                </div>
				<br>
                <div class="col-md-6" id="reply3">
                    <label for="imagen">Subir Boletin</label>
                    <input class="col-md-4" required type="file" id="imagen" name="imagen">
                </div>
					<br>
				<button class="btn btn-primary btn-lg active" type="submit">Publicar Boletin</button>
				<div  class="alerta"><?php echo isset($alert) ? $alert : ''; ?></div>
                
			</form>	</center>
			
		<!--fin formulario para redactar y enviar-->






        <!--Lista de los articulos-->

		<table class="table table-hover ">
            
			<thead class="table-dark">
			  <tr class="bg-dark">
            	<th>Numero</th>
				<th>Titulo</th>
				<th>Contenido del articulo</th>
                <th>Nombre imagen</th>
			  </tr>
			</thead>
		<?php 
			//Paginador
			$sql_codificacion=mysqli_query($conection, "SET nombre utf8");
			//$sql_codificacion=mysqli_query($conection, "SET tipo_usuario utf8");
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM articulo");
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

			$queryP = mysqli_query($conection,"SELECT id_articulo, titulo, contenido, nombre_imagen FROM articulo  WHERE   id_articulo >0 ORDER BY id_articulo DESC LIMIT $desde,$por_pagina 
				");

			mysqli_close($conection);

			$result = mysqli_num_rows($queryP);
			if($result > 0){

				while ($data = mysqli_fetch_array($queryP)) {
					
			?>
				<tr>
					<td><?php echo $data["id_articulo"]; ?></td>
					<td><?php echo $data["titulo"]; ?></td>  
					</div>

					<div class="col-lg-6">
					  <div class="form-group">
						<td>
						<textarea class="form-control"><?php echo $data["contenido"]; ?></textarea>
						</td>
						<td><?php echo $data['nombre_imagen'] ?></td>
					  </div>
					</div>
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
				
				<li><a href="?pagina=<?php echo $pagina-1; ?>">Anterior</a></li>
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
				<li><a href="?pagina=<?php echo $pagina + 1; ?>">Siguiente</a></li>
				
			<?php } ?>
			</ul>
		</div>
		<br>
		<br>
		<br>


	</section>
	
</body>
</html>

<style>
	h1{
		font-family:Verdana;
		color:white;
		font-size:45px;
		
	}
body{
	background:rgb(33, 177, 175);
	font-family:Helvetica;
}
.texto_area{
  display : block;
  padding : 10px;
  margin  : 10px 0 0 -10px;
  width   : 530px;
  height  : 245px;
  border-radius:4px;
  resize  : none;
  overflow: auto;
}
/* paginador */
.paginador ul{
	padding: 15px;
	list-style: none;
	background: #FFF;
	margin-top: 15px;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: flex-end;
}
.paginador a, .pageSelected{
	color: #428bca;
	border: 1px solid #ddd;
	border-radius:3px;
	padding: 1px;
	display: inline-block;
	font-size: 12px;
	text-align: center;
	width: 52px;
	height:27px;
}

.paginador a:hover{
	background: #ddd;
}
.pageSelected{
	color: #FFF;
	background: #428bca;
	border: 1px solid #428bca;
}
.alerta{
	text-align:center;
	font-size:20px;
	background-color:red;

	background   : rgba(0,0,0,.1);
  border-radius: 5px;
  width  : auto;
  height:35px;
}
</style>