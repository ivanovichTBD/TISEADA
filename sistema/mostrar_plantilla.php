<?php 
	session_start();
	if($_SESSION['tipo_usuario'] != 4)
	{
		header("location: ./");
	}
?>




<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php include "includes/scripts.php"; ?>
	<title>Mostrar Plantillas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	
</head>
<body>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">   
    
<!--
    instagram: www.instagram.com/programmingtutorial
    site: programlamadersleri.net
-->

	<?php include "includes/header.php"; ?>
    <br><br><br><br><br><br><br><br>
    <h1><center>ESCOGE UNA PLANTILLA</center></h1>

    <div class="m-4">
    <div class="card-deck">
            <div class="card" >
                <a href="repo_plantillas/Publicación1.jpg"><img src="repo_plantillas/Publicación1.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">COLORES</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación2.jpg"><img src="repo_plantillas/Publicación2.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">NATURALEZA</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación3.jpg"><img src="repo_plantillas/Publicación3.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">UNIVERSO</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación4.jpg"><img src="repo_plantillas/Publicación4.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación5.jpg"><img src="repo_plantillas/Publicación5.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
    </div>
<br>
<hr>
<br>

    <div class="card-deck">
            <div class="card">
                <a href="repo_plantillas/Publicación6.jpg"><img src="repo_plantillas/Publicación6.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación7.jpg"><img src="repo_plantillas/Publicación7.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación8.png"><img src="repo_plantillas/Publicación8.png" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación9.jpg"><img src="repo_plantillas/Publicación9.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación10.jpg"><img src="repo_plantillas/Publicación10.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
    </div>

<br>
<hr>
<br>  

    <div class="card-deck">
            <div class="card">
                <a href="repo_plantillas/Publicación11.jpg"><img src="repo_plantillas/Publicación11.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación12.jpg"><img src="repo_plantillas/Publicación12.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación13.jpg"><img src="repo_plantillas/Publicación13.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación14.jpg"><img src="repo_plantillas/Publicación14.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Publicación15.jpg"><img src="repo_plantillas/Publicación15.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                </div>
            </div>
    </div>
    </div>                  
                




	<?php include "includes/footer.php"; ?>
</body>
</html>

