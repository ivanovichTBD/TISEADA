<?php
	/*if($_SESSION['tipo_usuario'] != 2)
	{
		header("location: ./");
	}*/
	session_start();
		$idusuario=$_SESSION['idUser'];
		
		include '../conexion.php';
			$query = mysqli_query($conection,"select C.* from carta C, usuario_carta UC ,usuario U WHERE UC.IDUSUARIO=U.IDUSUARIO and UC.ID_CARTA=C.ID_CARTA and UC.IDUSUARIO='$idusuario'") ;
			
    ?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php include "includes/scripts.php"; ?>   
    <title>Lista de Cartas</title>
</head>
<body>

	<section id="containerU container">
		
		<div class= "listaUS">
			<h1 class="letraNiño">Fotos y lista de cartas</h1>
		</div>
			<div class="row conCarTab">
			 <div class=" table-responsive col-xs-12 col-md-6">
				<table  class="table letraNiño">
					<tr>
						<th scope="col">Nº</th>
						<th scope="col">Titulo</th>
						<th scope="col">Categoria</th>
						<th scope="col">Contenido</th>
						<th scope="col">Respuesta</th>
						<th scope="col">OPCIONES</th>
					</tr>
				
					<tbody>

						<?php $cont=1;
						while ($result = mysqli_fetch_array($query)) {
							
							$IDcarta=$result["ASUNTO"];
							$TITULO1=$result["TITULO"];
							$CONTENIDO1=$result["CONTENIDO"];
							$NOMBREIMAGEN1=$result["NOMBRE_IMAGEN"];
							$IMAGEN1=$result["IMAGEN"];
							$COMENTARIO1=$result["COMENTARIO"];

							$CARTA_ID= "'$IDcarta'";
							$TITULO="'$TITULO1'";
							$CONTENIDO    ="'$CONTENIDO1'";
							$NOMBREIMAGEN="'$NOMBREIMAGEN1'";
							$IMAGEN      ="'$IMAGEN1'";
							$COMENTARIO    ="'$COMENTARIO1'";
						?>
				
						<tr scope="row">
							<td><strong>
								<?php 
								echo $cont++;
								//echo $result["ID_CARTA"]; 
								?></strong></td>
								<td><?php echo $result["TITULO"];
								
								?></td>
								<td><?php echo $result["ID_CATEGORIA"]; ?></td>
								<td><?php echo $result["CONTENIDO"]; ?></td>
								<td ><?php echo $result["COMENTARIO"]; ?></td>
								<td><button onclick="VerCarta(<?php echo $CARTA_ID.','.$TITULO.','.$CONTENIDO.','.$NOMBREIMAGEN.','.$IMAGEN.','.$cont; ?>)">Ver Carta</button> 
								<input type="hidden" class="idCarta" name="idCarta" value="<?php echo $result["ID_CARTA"]?>">
								
							</td>
				
						</tr>	
						<?php //echo $result["NOMBRE_IMAGEN"] ?>
						<img src=" <?php //echo $result["IMAGEN"] ?> "  >	
						<?php  } ?>
					</tbody>
				</table>
			</div>


			<div class="col-xs-12 col-md-6" >
				<center><div class="titulos" id="titulo">TITULO DE LA CARTA</div><div id="cajaex">
					
					<table class="contenidoC">
						<td>
							<div class="fondoCont">
								<div class="titulos" style="font-size:15px;"> COMENTARIOS:</div>
								<div class="contenidoCar"></div>
								
								<?php if($_SESSION['tipo_usuario'] == 3){?>
								<div class="titulos"   style="width:170px ; font-size:16px; height:auto;"> COMENTARIOS:</div>
	
								<div style="z-index:5;width:170px;height:83px;padding:5px;background:#FAFAFA;overflow:auto;font-size:13px;font-family:calibri;">
									<form action="" method="post">
											<textarea name="comentario" id="comentario" class="comentario"></textarea>
											<button onclick="comentar()" type="submit">dar Comentario</button>
									</form>
								</div>
								<?php }?>
						</td>
						
						<td> 					
							<div class="contenidoImagen" style="-moz-transform: rotate(-350deg)";">
								<div id="imagen">
									<p class="nameImg" id="nombreImagen" > IMAGEN</p>
								</div>
							</div>
						</td>
					</table>

					<div class="fondoCont">
						<div  id="asunto" class="titulos" style="width:auto;font-size:14px;height:30px auto;-moz-transform: rotate(350deg);float:left;">CONTENIDO: </div>
						<div id="contenido" class="contenidoCar">
							<br></div>¡Que la magia empieze!</div>
						</div></div>
				</center>
			</div>
		</div>
	</section>
</body>
</html>
<script src="js/functions.js"></script>
