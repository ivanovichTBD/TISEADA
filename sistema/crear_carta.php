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
			$contenido   = $_POST['contenido'];		https://github.com/ivanovichTBD/TISEADA/pull/11/conflict?name=sistema%252Fcrear_carta.php&ancestor_oid=e4475aff10c78ea6a032dcfb577146ba240044a1&base_oid=8be4400ee8bb1f5c9db4035684effbb2de061389&head_oid=e022e0db02fb60304137412b957febbcbae69089
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
      /* Variables para distribuir carta  */
      $carta=$result['ID_CARTA'];
      $tipoUsuario=3;
     
      //echo $carta;
			$query_insert1 = mysqli_query($conection,"INSERT INTO usuario_carta(ID_CARTA,IDUSUARIO) VALUES('$carta','$user')"); 
      /*-------------------------------------------DISTRIBUIR---------------------------- */
     
           
           include "EnviarCartaParaRedactor.php";
			$solucion=	Distruibuir($carta,$tipoUsuario,$conection);
				if($query_insert){
					$alert="<p class='msg_save'>$solucion</p>";
					
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

    <div id="fondocar">
      <!--mensaje de envio-->
			<div class="alerta"><?php echo isset($alert) ? $alert : ''; ?></div>

          <form action="" method="POST" enctype="multipart/form-data" >
              <div>
                <div class="derecha">
                  <h1>Escribe tu carta</h1>

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
                </div>
              <div class="izquierda">
                  <div id="message">
                      <label for="msg">Contenido de tu carta</label>
                      <textarea required id="msg" name="contenido"></textarea>
                  </div>
              </div>
                <div class="button derecha">
                    <button type="submit">Envia tu carta</button>

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

#fondocar{
  font  : 21px sans-serif;
  padding : 2em;
  margin  : 0;
  background:linear-gradient(90deg, rgba(8,203,218,1) 0%, rgba(209,213,213,1) 53%, rgba(8,203,218,1) 100%);
}

#fondocar form {
  width  : 80%;
  height : 555px;
  margin : 0 auto;
  background: #FFF url(img/fondodecrearcarta2.jpg);
  border-radius:10px;
  border:2px solid white;
}
#fondocar .izquierda{
  width  : 50%;
  float:left;
  margin:10px;
}
#fondocar .derecha{
  width  : 45%;
  float:right;
  margin:10px;
}

#fondocar h1 {
  left : 415px;
  top  : 45px;
  font : 3em "typewriter", sans-serif;
  margin:30px 5px 15px 5px;
  text-align: center;
}

}

#from {
  left : 398px;
  top  : 245px;
  margin-top:10px;
}

#reply {
  left : 390px;
  top  : 295px;
}
#reply2 {
  left : 380px;
  top  : 345px;
  margin-top: 5%;
}
#reply3 {
  left : 390px;
  top  : 425px;
  right: 200px;
  
  
}

#message {
  left : 20px;
  top  : 70px;
}


label {
  font : .9em "typewriter", sans-serif;
  background: #ffffff87;
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
    margin: 5px;
  }

textarea {
  display : block;
  font:1.9em/1.5em "handwriting", sans-serif;
  padding : 10px;
  margin  : 10px 0 0 -10px;
  width   : 90%;
  height  : 445px;
  margin: 10px;

  resize  : none;
  overflow: auto;
}

button {
  left         : 440px;
  top          : 520px;
  padding      : 5px;
  font : 1.3em "typewriter", sans-serif;
  border       : 2px solid #333;
  border-radius: 5px;
  background   : none;
  cursor       : pointer;
  transform    : rotate(-1.5deg);
  height:      50px;
  margin: 10px 0px 0px 50px;
  background: wheat;
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

#fondocar .alerta{
  margin : 15px auto;
  background   : rgba(0,0,0,.1);
  border:2px solid rgba(0,0,0,.1);
  border-radius: 5px;
  width  : 80%;
  height:35px;
}

/*****************************RESPONSIVE**************************/

@media screen and (max-width:768px ) {
    /*cartaEstilo*/
    #fondocar{
      font  : 20px sans-serif;
      padding : 3em;
      margin  : 0;
      background:linear-gradient(90deg, rgba(8,203,218,1) 0%, rgba(209,213,213,1) 53%, rgba(8,203,218,1) 100%);
    }

    #fondocar form {
      width  : 100%;
      height : 580px;
      margin : 0 auto;
      background: #FFF url(img/fondodecrearcarta2.jpg);
      border-radius:10px;
      border:2px solid white;
    }
    #fondocar h1 {
      left: 415px;
    top: 45px;
      font: 2em "typewriter", sans-serif;
      margin: 5px 5px 15px 5px;
    }

    #fondocar .izquierda{
      width: 95%;
      float: left;
    }
    #fondocar .derecha{
      width: 95%;
      float:left;
    }
    textarea {
    display: block;
    font: .9em/.5em "handwriting", sans-serif;
    padding: 10px;
    margin: 10px 0 0 -10px;
    width: 90%;
    height: 100px;
    margin: auto;
    resize: none;
    overflow: auto;
}

}

</style>