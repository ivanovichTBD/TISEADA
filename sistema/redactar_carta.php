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

            $query_insert = mysqli_query($conection,"INSERT INTO articulo(titulo,contenido,nombre_imagen,imagen)
                                                                VALUES('$titulo','$contenido','$nombre_imagen','$destino')");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<h1><center>Redacción y envio de articulos</center></h1>
<div class="alerta"><?php echo isset($alert) ? $alert : ''; ?></div>
          
<form action="" method="POST" enctype="multipart/form-data">
                
                <div id="reply">
                    <label for="titulo">Titulo de la carta</label>
                    <input required type="text" id="titulo" name="titulo" placeholder="Titulo">
                <div id="message">
                    <label for="contenido"><strong>Contenido de la carta</strong></label>
                    <textarea height="500px" widht="600" required id="contenido" name="contenido"></textarea>
                </div>
                </div>
                <div id="reply2">
                    <label for="nombre_imagen">Titulo de la foto</label>
                    <input required type="text" id="nombre_imagen" name="nombre_imagen" placeholder="Titulo de la foto o imágen">
                </div>
                <div id="reply3">
                    <label for="imagen">Adjuntar un foto</label>
                    <input required type="file" id="imagen" name="imagen">
                </div>

                <button type="submit">Enviar articulo al editor</button>
                
</form>

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
			<?php while ($result = mysqli_fetch_array($queryCarta)) {?>

                <td class="table-light"><strong><?php echo $result["ID_CARTA"]; ?></strong></td>
                <td class="table-light"><?php echo $result["TITULO"]; ?></td>
                <td class="table-light"><?php echo $result["ID_CATEGORIA"]; ?></td>
                <td class="table-light">
                    <textarea><?php echo $result["CONTENIDO"]; ?></textarea>
                    
                </td>
                <td class="table-light"><?php echo $result["NOMBRE_IMAGEN"] ?></td>	
                </tr>
			<?php  } ?>

            <!--paginador-->


            
				

		</tbody>
</table>







</body>
</html>



<style>
input {
  width: 400px;
}
</style>