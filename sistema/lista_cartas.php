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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
    <title>Lista de Cartas</title>
</head>
<body>
 

<h1><center>Fotos y lista de cartas</center></h1>
<center><div class="row">

<table  class="table table-hover col-6 ">
		<thead class="table-dark">
			<tr class="bg-dark">
			<th scope="col">Numero</th>
			<th scope="col">Titulo</th>
			<th scope="col">Categoria</th>
			<th scope="col">Contenido</th>
			<th scope="col">Respuesta</th>

			<th>OPCIONES</th>
			</tr>
		</thead>
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
	<tr class="pos-fila table-light">
			<td class="pos-col table-light"><strong>
			<?php 
			echo $cont++;
			//echo $result["ID_CARTA"]; 
			?></strong></td>
			<td class="pos-col table-light"><?php echo $result["TITULO"];
			
			?></td>
			<td class="pos-col table-light"><?php echo $result["ID_CATEGORIA"]; ?></td>
			<td class="pos-col table-light"><?php echo $result["CONTENIDO"]; ?></td>
			<td class="pos-col table-light"><?php echo $result["COMENTARIO"]; ?></td>
			<td class="pos-col table-light"><button onclick="VerCarta(<?php echo $CARTA_ID.','.$TITULO.','.$CONTENIDO.','.$NOMBREIMAGEN.','.$IMAGEN.','.$cont; ?>)">Ver Carta</button> 
			<input type="hidden" class="idCarta" name="idCarta" value="<?php echo $result["ID_CARTA"]?>">
			
			</td>
			
			</tr>	
			<?php //echo $result["NOMBRE_IMAGEN"] ?>
			<img src=" <?php //echo $result["IMAGEN"] ?> "  >	
				
			
				

			<?php  } ?>
		</tbody>
</table>

<div class="col-6">
<center><div class="titulos" id="titulo">NOMBRE PERSONAJE</div><div id="cajaex">
<table>
<td>
<div style="z-index:5;width:183px;height:200px;padding:5px;background:#FAFAFA;margin-left:15px;margin-top:15px;">
  <div class="titulos"   style="width:170px ; font-size:16px; height:auto;"> COMENTARIOS :</div>
  
  <div style="z-index:5;width:170px;height:58px;padding:5px;background:#FAFAFA;overflow:auto;font-size:13px;font-family:calibri;">
  
  
  </div>
  <?php if($_SESSION['tipo_usuario'] == 3){?>
  <div class="titulos"   style="width:170px ; font-size:16px; height:auto;"> COMENTARIOS :</div>
  
  <div style="z-index:5;width:170px;height:83px;padding:5px;background:#FAFAFA;overflow:auto;font-size:13px;font-family:calibri;">
  <form action="" method="post">
  <textarea name="comentario" id="comentario" class="comentario"></textarea>
  <button onclick="comentar()" type="submit">dar Comentario</button>
  </form>
  </div>
  <?php }?>
  </td>
  <td>
  <div style="width:180px;height:230px;background:#000;border: 5px solid #0d0d0d;float:left;margin-top:15px;-moz-transform: rotate(-350deg);">
  
 
  <div id="imagen">
  <p class="nameImg" id="nombreImagen" ></p>
 </div>
  </div>
  </td></table>
  <div style="z-index:5;width:400px;height:200px;padding:5px;background:#2d2d2d;margin-left:0px;margin-top:15px;">
  <div  id="asunto" class="titulos" style="width:auto;font-size:14px;height:30px auto;-moz-transform: rotate(350deg);float:left;">¿Qué más hay de tí?</div>
  <div id="contenido" style="z-index:5;width:370px;height:150px;padding:5px;background:#FAFAFA;overflow:auto;font-size:13px;font-family:calibri;text-align:justify;">
  <br></div>¡Que la magia empieze!</div>
</div></center>

</div>

</div>
</center>

</body>
</html>
<script src="js/functions.js"></script>
<style>
#numero{
	display:inline;
	width:10px;
}
.comentario{
	width:100%;
	height:60%;
}
.titulos{
  width:450px;
  height:30px;
  padding:5px;
  background:#1d1d1d;
  color:#eee;
  text-align:center;
  text-transform:uppercase;
  letter-spacing:3px;
  font-family:'Oswald';
  font-size:20px;
}

#cajaex{
  background:url('https://s-media-cache-ak0.pinimg.com/564x/42/55/ae/4255aee0b6604c1431e91e7102765dea.jpg') center;
  font-family:Calibri;
  font-size:10px;
  width:457px;
  height:500px;
  border: solid 1px #000;
}
body{
	
	background: linear-gradient(90deg, rgba(8,203,218,1) 0%, rgba(209,213,213,1) 53%, rgba(8,203,218,1) 100%);;
	padding:10px;
}
#imagen{
	background-size:100% 100%;
	width:100%;
	height:100%;
	}
 .nameImg{
	color:white;
	font-size:15px;
	text-align: center;
	font-weight:bold;
 
 }
</style>