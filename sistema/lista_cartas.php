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
			<th scope="col">Nº</th>
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
<center><div class="titulos" id="titulo">TITULO DE LA CARTA</div><div id="cajaex">
<table>
<td>
<div style="z-index:5;width:183px;height:200px;padding:5px;background:#fafafaa8;margin-left:0px;margin-top:0px;border-radius:5px">
  <div class="titulos"   style="width:170px ; font-size:16px; height:auto;"> COMENTARIOS :</div>
  
  <div style="z-index:5;width:170px;height:58px;padding:5px;background:#FAFAFA;overflow:auto;font-size:13px;font-family:calibri;">
  
  
  </div>
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
  <div style="width:180px;height:230px;border: 5px solid #cecccc;float:left;margin-top:15px;-moz-transform: rotate(-350deg);">
  
 
  <div id="imagen">
  <p class="nameImg" id="nombreImagen" > IMAGEN</p>
 </div>
  </div>
  </td></table>
  <div style="z-index:5;width:400px;height:200px;padding:5px;margin-left:0px;margin-top:15px;border-radius:5px;background: #fafafaa8;">
  <div  id="asunto" class="titulos" style="width:auto;font-size:14px;height:30px auto;-moz-transform: rotate(350deg);float:left;">CONTENIDO: </div>
  <div id="contenido" style="z-index:5;width:380px;height:150px;padding-left:5px;overflow:auto;font-size:15px;font-family:calibri;text-align:justify;border: 1px solid #cbc8c8;border-radius: 5px;margin: 5px 0px 5px 0px;">
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
	width: 457px;
    height: 40px;
    padding: 5px;
    background: white;
    color: #2196F3;
    /* text-align: center; */
    text-transform: uppercase;
    /* letter-spacing: 2px; */
    font-family: 'Oswald';
    font-size: 18px;
    	border: 1px solid #c1c0c0;
		border-radius: 8px;
		margin-bottom: 5px;
}

#cajaex{
  background:url('https://image.freepik.com/foto-gratis/suave-nublado-es-degradado-pastel-fondo-cielo-abstracto-color-dulce_6529-1108.jpg');
  font-family:Calibri;
  font-size:10px;
  width:457px;
  height:500px;
  border: 1px solid #ffffff ;
  	border-radius: 5px;
    background-size: 457px 500px;
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
	color: white;
    background: #949494ba;
    font-size: 15px;
    text-align: center;
    font-weight: bold;
 
 }
</style>