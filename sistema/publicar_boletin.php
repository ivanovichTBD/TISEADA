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
	<?php include "includes/scripts.php"; ?> 
	<title>Publicar boletin</title>
</head>
<body>

	<section id="container containerU">
		<div class= "listaUS">
			<h1>Publicar Boletin</h1>
		</div>

		<!--formulario para redactar y enviar-->		
			<img src="img/portada_publicar_boletin.jpg" class=" img-thum bnail rounded mx-auto d-block" alt=""><br>
          
			<form action="" method="POST" enctype="multipart/form-data">
                
                <div class="col-xs-12 col-md-12" id="reply">
                    <label for="titulo">Titulo del Boletin</label>
                    <input class="form-control" required type="text" id="titulo" name="titulo" placeholder="Titulo">
                <!--<div id="message">
                    <label for="contenido">Contenido de la carta</label>
                    <textarea  class="texto_area" required id="contenido" name="contenido"></textarea>
                </div> -->
                </div>
				<br>
                <div class="col-xs-12 col-md-12" id="reply3">
                    <label for="imagen">Subir Boletin</label>
                    <input class="col-md-4" required type="file" id="imagen" name="imagen">
                </div>
					<br>
				<button class="btn btn-primary btn-lg active" type="submit" style="margin:15px;">Publicar Boletin</button>
				<div  class="alerta"><?php echo isset($alert) ? $alert : ''; ?></div>
                
			</form>
			
		<!--fin formulario para redactar y enviar-->

	



		<hr>
        <!--Lista de los articulos-->
		<div class= "listaUS">
			<h1>Articulos de los redactores</h1>
		</div>
		<div class="row">
			<div class=" table-responsive col-xs-12 col-md-12">
				<table class="table table-hover ">
					
					<tr>
						<th  scope="col">Numero</th>
						<th  scope="col">Titulo</th>
						<th  scope="col">Contenido del articulo</th>
						<th  scope="col">Nombre imagen</th>
					</tr>
					</thead>
				<?php 
					//Paginador
					$sql_codificacion=mysqli_query($conection, "SET nombre utf8");
					//$sql_codificacion=mysqli_query($conection, "SET tipo_usuario utf8");
					$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM carta WHERE ID_TIPO_CARTA=2");
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

					$queryP = mysqli_query($conection,"SELECT ID_CARTA, TITULO, CONTENIDO, NOMBRE_IMAGEN FROM carta  WHERE   ID_CARTA >0 AND ID_TIPO_CARTA=2 ORDER BY ID_CARTA DESC LIMIT $desde,$por_pagina 
						");

					mysqli_close($conection);

					$result = mysqli_num_rows($queryP);
					if($result > 0){

						while ($data = mysqli_fetch_array($queryP)) {
							
					?>
						<tr scope="row">
							<td><?php echo $data["ID_CARTA"]; ?></td>
							<td><?php echo $data["TITULO"]; ?></td>  
							</div>

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
			</div>
			</div>
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
	h2{
		font-family:Verdana;
		color:white;
		font-size:45px;
		
	}
body{
	background:rgb(33, 177, 175);
	font-family:Helvetica;
}
h1 {
    font-size: 30px;
    color: rgb(70, 92, 123);
    font-style: italic;
    display: inline-block;
    letter-spacing: normal;
    margin-right: 10px;
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
img{
	width: 100%;
  height: auto;
  opacity: 0.92;
  margin:20px auto;
  border-radius:10px;
	
}

</style>