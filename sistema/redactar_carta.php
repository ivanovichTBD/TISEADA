
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
    
        
        $query = mysqli_query($conection,"SELECT * FROM carta WHERE ID_TIPO_CARTA=2 AND titulo = '$titulo' OR contenido = '$contenido' ");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">El articulo ya existe, prueba redactando otro</p>';
        }else{
			$query_insert = mysqli_query($conection,"INSERT INTO carta(TITULO, ASUNTO, CONTENIDO, NOMBRE_IMAGEN, IMAGEN,ID_TIPO_CARTA,ESTADO_NOTIFICACION,IP_NOTIFICACION)
			VALUES('$titulo','REDACCION','$contenido','$nombre_imagen','$destino','2','0','$ipAdd')");
			
			$usuarioActual=$_SESSION["idUser"];
			
			$query = mysqli_query($conection,"SELECT ID_CARTA FROM carta WHERE titulo = '$titulo' And contenido = '$contenido' ");
        	$result = mysqli_fetch_array($query);
  			/* Variables para distribuir carta  */
 			 $carta=$result['ID_CARTA'];
  
			$insertarCarta= mysqli_query($conection,"INSERT INTO `usuario_carta` (`ID_CARTA`, `IDUSUARIO`) VALUES ('$carta', '$usuarioActual')");
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
	<title>Redactar Carta</title>
</head>
<body>

	
	<section id="container">
		
		<div class= "listaUS">
			<h1>Redactar y enviar artículo</h1>
		</div>
		<!--formulario para redactar y enviar-->		
		
		<img src="img/portada_redactar_carta.jpg" class=" img-thum bnail rounded mx-auto d-block" alt="">

			<form  class="row fondoRC" action="" method="POST" enctype="multipart/form-data">
                
                <div class="col-xs-12 col-md-9" id="reply">
                    <label for="titulo">Titulo del articulo</label>
                    <input class="form-control" required type="text" id="titulo" name="titulo" placeholder="Titulo">
					<div id="message">
						<label for="contenido">Contenido del articulo</label>
						<textarea  class="texto_area" required id="contenido" name="contenido"></textarea>
					</div>
                </div>
                <div class="col-xs-12 col-md-3" id="reply2">
                    <label for="nombre_imagen">Tìtulo de la foto</label>
                    <input class="form-control" required type="text" id="nombre_imagen" name="nombre_imagen" placeholder="Titulo de la foto o imágen">
                </div>
                <div class="col-xs-12 col-md-3" id="reply3">
                    <label for="imagen">Adjuntar foto</label>
                    <input class="col-md-3" required type="file" id="imagen" name="imagen" value="Selecciona la foto del niño">
                </div>
					
				<button class="btn btn-primary btn-lg active" type="submit" style="margin:auto;margin-top:20px; ">Enviar artìculo al editor</button>
				
			</form>
			<center><div  class="alerta "><?php echo isset($alert) ? $alert : ''; ?></div></center>
                
		<!--fin formulario para redactar y enviar-->
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

					$idusuario=$_SESSION['idUser'];
					$query = mysqli_query($conection,"SELECT C.* , CC.CATEGORIA from carta C, usuario_carta UC ,usuario U,categoria_carta CC  WHERE UC.IDUSUARIO=U.IDUSUARIO and UC.ID_CARTA=C.ID_CARTA and UC.IDUSUARIO='$idusuario' and ID_TIPO_CARTA=1 and CC.ID_CATEGORIA=C.ID_CATEGORIA ORDER BY ID_CARTA DESC LIMIT $desde,$por_pagina 
						");

					//mysqli_close($conection);

					$result = mysqli_num_rows($query);
					if($result > 0){
						$i=0;
						while ($data = mysqli_fetch_array($query)) {
							
					?>
				<tr scope="row">
					<td><?php 
					$i++;
					echo $i; 
					//$data["ID_CARTA"]; ?></td>
					<td> <h3><?php echo $data["TITULO"]; ?></h3>	</td>  
					</div>
					<td> <?php echo $data["CATEGORIA"]; ?></td>
					<div class="col-lg-6">
					  <div class="form-group">
						<td>
						<textarea class="form-control"><?php echo $data["CONTENIDO"]; ?></textarea>
						</td>
						<td><?php //echo $data['NOMBRE_IMAGEN'] ?></td>
					  </div>
					</div>
				</tr>
			
			<?php 
					}

				}
			?>

		</table>
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
  margin  : 10px 0 0 0px;
  width   : 100%;
  height  : 245px;
  border-radius:10px;
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
.fondoRC{
	width: 90%;
	margin:0px auto;
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