<?php
session_start();
if($_SESSION['tipo_usuario']==4){
include "../conexion.php";

$ipAddress = $_SERVER['REMOTE_ADDR'];
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
            $query_insert = mysqli_query($conection,"INSERT INTO carta(TITULO, ASUNTO, CONTENIDO, NOMBRE_IMAGEN, IMAGEN,ID_CATEGORIA,ID_PRIORIDAD,ID_TIPO_CARTA,ESTADO_NOTIFICACION,IP_NOTIFICACION)
                                                VALUES('$titulo','$asunto','$contenido', '$nombre_imagen','$destino','$categoria','$prioridad','1','0','$ipAddress')");
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
              //  $alert="<p class='msg_save'>$solucion</p>";
              $alert='<p class="msg_save">Tu carta see mandó correctamente</p>'; 
              echo $alert;
               // header("Location:index.php?sol=$alert");
            }
            else{
                    $alert='<p class="msg_error">Error al mandar la carta</p>';
                    echo $alert;
                  //  header("Location:index.php?sol=$alert");
            }
        }
            else{
                $alert='<p class="msg_save">Tu carta see mandó correctamente</p>';
                echo $alert;
                //header("Location:index.php?sol=$alert");
            }
            }
        
        
        
        
        
        }
        
    }
}



?>