<?php 
	session_start();
	if($_SESSION['tipo_usuario'] != 4)
	{
		header("location: ./");
	}
	
	include "../conexion.php";
				
			
	if(!empty($_POST))
	{	
		$alert='';
		if(empty($_POST['titulo']) || empty($_POST['asunto']) || empty($_POST['contenido']) )
		{
			$alert='<p class="msg_error">Escribe tu carta, No dejes los campos vacios</p>';
		}else{
			$user=$_SESSION['idUser'];
			//echo $user;				
			$titulo = $_POST['titulo'];
			$asunto  = $_POST['asunto'];
			$contenido   = $_POST['contenido'];		
			$nombre_imagen = $_REQUEST['nombre_imagen'];
			$imagen = $_FILES['imagen']['name'];
			$ruta   = $_FILES['imagen']['tmp_name']; //ruta 
			$destino = "repo_imagenes/".$imagen;  //destino donde se almacenara y le adjuntamos el nombre de la imagen
			copy($ruta, $destino);   //para copiar el archivo al repositorio
			$query = mysqli_query($conection,"SELECT * FROM carta WHERE titulo = '$titulo' OR contenido = '$contenido' ");
			$result = mysqli_fetch_array($query);
			
			include "CategoriaCarta.php";
				
			$categoria=Categoria($contenido);
			function prioridad($categoria){
				if($categoria==1){
					return 1;
				}
				elseif ($categoria==0) {
					return 3;
				}
				else{
					return 2;
				}
			}
			$prioridad=prioridad($categoria);
				
			if($result > 0){
				$alert='<p class="msg_error">El titulo o contenido ya existen, prueba escribiendo otro</p>';
			}else{
				if($prioridad==2 || $prioridad==1){
				$query_insert = mysqli_query($conection,"INSERT INTO carta(TITULO, ASUNTO, CONTENIDO, NOMBRE_IMAGEN, IMAGEN,ID_CATEGORIA,ID_PRIORIDAD,ID_TIPO_CARTA)
																	VALUES('$titulo','$asunto','$contenido', '$nombre_imagen','$destino','$categoria','$prioridad','1')");
			$query = mysqli_query($conection,"SELECT ID_CARTA FROM carta WHERE titulo = '$titulo' And contenido = '$contenido' ");
			$result = mysqli_fetch_array($query);
			$carta=$result['ID_CARTA'];				
			$query_insert1 = mysqli_query($conection,"INSERT INTO usuario_carta(ID_CARTA,IDUSUARIO) VALUES('$carta','$user')");
			$query_insert2 = mysqli_query($conection,"INSERT INTO usuario_carta(ID_CARTA,IDUSUARIO) VALUES('$carta','3')");
					
				
				if($query_insert){
					$alert='<p class="msg_save">Tu carta see mandó correctamente</p>';
					
				}
				else{
						$alert='<p class="msg_error">Error al mandar la carta</p>';
					
				}
			}
				else{
					$alert='<p class="msg_save">Tu carta see mandó correctamente</p>';
				}
				}
			
			
			
			
			
			}
			
		}

	



 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title>Crear carta</title>
	
</head>
<body>

      <div align="center">
		
			    <div class="alerta"><?php echo isset($alert) ? $alert : ''; ?></div>
                    
                <form action="" method="POST" enctype="multipart/form-data" >
                <h1><center>Escribe tu carta</center></h1>

                <div id="from">
                    <label for="titulo">Titulo</label>
                    <input required type="text" id="titulo" name="titulo" placeholder="Titulo de la carta">
                </div>

                <div id="reply">
                    <label for="categoria">Asunto</label>
                    <input required type="text" id="categoria" name="asunto" placeholder="Categoria de la carta">
                </div>
                <div id="reply2">
                    <label for="nombre_imagen">Titulo para tu foto</label>
                    <input required type="text" id="nombre_imagen" name="nombre_imagen" placeholder="Nombre para tu foto">
                </div>
                <div id="reply3">
                    <label for="imagen">Selecciona una foto</label>
                    <input required type="file" id="imagen" name="imagen">
                </div>
                <div id="message">
                    <label for="msg"><strong>Contenido de tu carta</strong></label>
                    <textarea required id="msg" name="contenido"></textarea>
                </div>
                
                <div class="button">
                    <button type="submit">Envia tu carta</button>
                    </div>
                </form>

	
      </div>
	
</body>
</html>

<style>
@font-face {
    font-family: 'handwriting';
    src: url('img/fuentes/journal-webfont.woff2') format('woff2'),
         url('img/fuentes/journal-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'typewriter';
    src: url('img/fuentes/veteran_typewriter-webfont.woff2') format('woff2'),
         url('img/fuentes/veteran_typewriter-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}

body {
  font  : 21px sans-serif;
  padding : 2em;
  margin  : 0;
  background:linear-gradient(90deg, rgba(8,203,218,1) 0%, rgba(209,213,213,1) 53%, rgba(8,203,218,1) 100%);
}

form {
  position: relative;
  width  : 770px;
  height : 620px;
  margin : 0 auto;
  border-radius:3px;
  background: #FFF url(img/fondodecrearcarta2.jpg);
}

h1 {
  position : absolute;
  left : 415px;
  top  : 45px;
  font : 3em "typewriter", sans-serif;

}

#from {
  position: absolute;
  left : 398px;
  top  : 245px;
}

#reply {
  position: absolute;
  left : 390px;
  top  : 295px;
}
#reply2 {
  position: absolute;
  left : 380px;
  top  : 345px;
}
#reply3 {
  position: absolute;
  left : 390px;
  top  : 425px;
  right: 200px;
  
  
}

#message {
  position: absolute;
  left : 20px;
  top  : 70px;
}


label {
  font : .8em "typewriter", sans-serif;
}


input, textarea {
  font    : 1em "handwriting", sans-serif;
  border  : none;
  padding : 0 10px;
  margin  : 0;
  width   : 240px;
  background: none;
}

input, textarea {
  background   : rgba(0,0,0,.1);
  border-radius: 5px;
  outline      : none;
}


input {
    height: 2em; /* for IE */
    vertical-align: middle; /* This is optional but it makes legacy IEs look better */
    font : 0.9em "typewriter", sans-serif;
  }

textarea {
  display : block;
  font:1.9em/1.5em "handwriting", sans-serif;
  padding : 10px;
  margin  : 10px 0 0 -10px;
  width   : 340px;
  height  : 445px;

  resize  : none;
  overflow: auto;
}

button {
  position     : absolute;
  left         : 440px;
  top          : 520px;
  padding      : 5px;
  font : 1.3em "typewriter", sans-serif;
  border       : 2px solid #333;
  border-radius: 5px;
  background   : none;
  cursor       : pointer;
  transform    : rotate(-1.5deg);
  height:      40px;
}

button:after {
  content      : " >>>";
}

button:hover,
button:focus {
  outline     : none;
  background  : #001;
  color       : #FFF;
}

.alerta{
  background   : rgba(0,0,0,.1);
  border-radius: 5px;
  width  : 770px;
  height:35px;
  
}

</style>