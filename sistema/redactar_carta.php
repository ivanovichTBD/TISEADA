
	<?php
/*if($_SESSION['tipo_usuario'] != 2)
	{
		header("location: ./");
    }*/
    session_start();
    include "../conexion.php"; //nos conectamos a la bd
    $queryCarta = mysqli_query($conection,"SELECT * FROM carta") ; //extraemos toda la info de la carta

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['titulo']) || empty($_POST['contenido']) )
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{
		$ipAdd=$_SERVER['REMOTE_ADDR'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $nombre_imagen = $_REQUEST['nombre_imagen'];
        $imagen = $_FILES['imagen']['name'];
        $ruta   = $_FILES['imagen']['tmp_name'];
        $destino = "repo_imagenes_del_editor/".$imagen;
        copy($ruta, $destino);
    
        
        $query = mysqli_query($conection,"SELECT * FROM articulo WHERE titulo = '$titulo' OR contenido = '$contenido' ");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">El articulo ya existe, prueba redactando otro</p>';
        }else{
			$query_insert = mysqli_query($conection,"INSERT INTO carta(TITULO, ASUNTO, CONTENIDO, NOMBRE_IMAGEN, IMAGEN,ID_TIPO_CARTA,ESTADO_NOTIFICACION,IP_NOTIFICACION)
			VALUES('$titulo','REDACCION','$contenido','$nombre_imagen','$destino','2','0','$ipAdd')");

/*    $query_insert = mysqli_query($conection,"INSERT INTO articulo(titulo,contenido,nombre_imagen,imagen)
                                                                VALUES('$titulo','$contenido','$nombre_imagen','$destino')");
  */
            if($query_insert){
                $alert='<p class="msg_save">El articulo se envio correctamente.</p>';
            }else{
                $alert='<p class="msg_error">Error al enviar articulo.<br>
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
	<?php include "includes/scripts.php"; ?>
	<title>MENSAJERO</title>
</head>
<body>

<div class="fixed-top trabajadores">
			<?php include "includes/header.php"; ?>
		</div>
	
	<section id="container" class="box-ed">
	<div class= "listaUS">
		<h1>Redactar y enviar artículo</h1>
	</div>
		<!--formulario para redactar y enviar-->		
		
			<img class="image-trab" src="img/portada_redactar_carta.jpg" alt="">

			<div  class="alerta"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="POST" enctype="multipart/form-data">
                
                <div  id="reply">
					<div class="col-md-2">
						<label class="margin-text" for="titulo">Titulo del articulo</label>
					</div>
					<div class="col-md-10">
						<input class="form-control margin-text" required type="text" id="titulo" name="titulo" placeholder="Titulo">
					</div>
                <div  class="col-md-12" id="message">
                    <label class="margin-text" for="contenido">Contenido del articulo</label>
                    <textarea  class="texto_area" required id="contenido" name="contenido"></textarea>
                </div>
                </div>
                <div class="col-md-6" id="reply2">
                    <label for="nombre_imagen">Tìtulo de la foto</label>
                    <input class="form-control" required type="text" id="nombre_imagen" name="nombre_imagen" placeholder="Titulo de la foto o imágen">
                </div>
				<br>
                <div class="col-md-6" id="reply3">
                    <label for="imagen">Adjuntar foto</label>
                    <input class="col-md-4" required type="file" id="imagen" name="imagen" value="Selecciona la foto del niño">
                </div>
					<br>
					<br>
				<button class="btn btn-primary btn-lg active margin-text" type="submit">Enviar artìculo al editor</button>
				
			</form>

		
                
		<!--fin formulario para redactar y enviar-->
		<table class="table table-hover ">
			<thead class="table-dark">
			  <tr class="bg-dark" >
				<th>Numero</th>
				<th>Titulo</th>
				<th>Categoria</th>
				<th>Contenido</th>
				<th>Titulo de la foto</th>
			  </tr>
			</thead>
		<?php 
			//Paginador
			$sql_codificacion=mysqli_query($conection, "SET nombre utf8");
			//$sql_codificacion=mysqli_query($conection, "SET tipo_usuario utf8");
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM carta");
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

			$query = mysqli_query($conection,"SELECT ID_CARTA, TITULO, ID_CATEGORIA,CONTENIDO, NOMBRE_IMAGEN FROM carta  WHERE    ID_CARTA>0 ORDER BY ID_CARTA DESC LIMIT $desde,$por_pagina 
				");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					<td><?php echo $data["ID_CARTA"]; ?></td>
					<td><?php echo $data["TITULO"]; ?></td>  
					</div>
					<td><?php echo $data["ID_CATEGORIA"]; ?></td>
					<div class="col-lg-6">
					  <div class="form-group">
						<td>
						<textarea class="form-control"><?php echo $data["CONTENIDO"]; ?></textarea>
						</td>
						<td><?php echo $data['NOMBRE_IMAGEN'] ?></td>
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

	</section>

	<footer>
		<div class="Footertrabajadores">
						<?php include "../ComponentesPagPrincipal/Footer.php"; ?>
		</div>
	</footer>
	
</body>
</html>

<style>

.texto_area{
  display : block;
  padding : 10px;
  margin  : 10px 0 0 -10px;
  width   :100%;
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