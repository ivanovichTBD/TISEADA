<!DOCTYPE html>
<?php
include_once 'config.inc.php';
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "archivos/" . $nombre;
    if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $titulo= $_POST['titulo'];
            $descri= $_POST['descripcion'];
            $db=new Conect_MySql();
            $sql = "INSERT INTO tbl_documentos(titulo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$titulo','$descri','$tamanio','$tipo','$nombre')";
            $query = $db->execute($sql);
            if($query){
                echo "Se guardo correctamente";
            }
        } else {
            echo "Error";
        }
    }
}
?>

<html lang="es">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <?php include "../includes/scripts.php"; ?>   
        <title>MENSAJERO</title>
       
    </head>
    <body>
    
    <section id="containerU">
        
            <div class= "listaUS row">   
               
                    <h1>Publicar Boletin</h1>
                    
            </div>
            <center><img src="portada_publicar_boletin.jpg" alt=""></center><br>
            
            <form method="post" action="" enctype="multipart/form-data">
                <div class="w3l-login-form  row" id= "boletinPDF" >
                    <div class="col-xs-12 col-md-1">
                         <label>Titulo</label>
                    </div>
                    <div class="col-xs-12 col-md-11">
                         <input type="text" name="titulo">
                    </div>
                   
                    <div class="col-xs-12 col-md-1">
                        <label>Descripcion</label>
                    </div>
                    <div class="col-xs-12 col-md-11">
                        <td><textarea name="descripcion"></textarea></td>
                    </div>

                    <div class="col-xs-12 col-md-12">
                         <input type="file" name="archivo">
                    </div>
                    <center><button class="btn btn-lg " type="submit" value="Publicar boletin" name="subir">Publicar boletin</button></center>
                   <hr> <a  href="lista.php">Lista de publicaciones</a>
                
                </div>
            </form>            
    </section>
    </body>
</html>

<style>
h2{
    color:white;
}
body{
    background:rgb(33, 177, 175);

}

#containerU{
    padding:15px;
}


.w3l-login-form {
    background: rgba(20, 30, 34, 0.412);
    /*width: 55%;*/
    margin: 0 auto;
    padding: 3em;
    border-radius: 10px;
    box-sizing: border-box;
}
label{
    margin-top:10px;
    color: rgb(248, 252, 249);
    font-size: 15px;
    font-weight: 400;
}

input{
    width: 100%;
    border-radius: 10px;
    resize: none;
    overflow: auto;
    margin-top: 10px;
    background: white;

}

textarea{
    padding: 15px;
    margin: 15px 0px 0px 0px;
    width: 100%;
    height: 215px;
    border-radius: 10px;
    resize: none;
    overflow: auto;
}

img{
	border-radius:4px;
	width:auto;
	height:165px;
	
}

button{
    background: #00BCD4;
    color: #ffffff;
    font-size: 15px;
    cursor: pointer;
    margin-top:10px;
    border:1px solid #ffffff;
}

input[type=submit]:hover {
  background-color: #45a049;

}
a{
    color:white;
}
</style>