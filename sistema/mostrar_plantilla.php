<?php 
	session_start();
	if($_SESSION['tipo_usuario'] != 2)
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

	<?php // include "includes/header.php"; ?>
    <br>
    <h1><center>ESCOGE UNA PLANTILLA</center></h1>
       <center><h4>"Click en una imagen para descargar"</h4></center>
    <div class="m-4">
    <div class="card-deck">
            <div class="card" >
                <a href="repo_plantillas/Boletin1.pub"><img src="repo_plantillas/Boletin1.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin2.pub"><img src="repo_plantillas/Boletin2.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin3.pub"><img src="repo_plantillas/Boletin3.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin4.pub"><img src="repo_plantillas/Boletin4.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin5.pub"><img src="repo_plantillas/Boletin5.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
    </div>
<br>
<hr>
<br>

    <div class="card-deck">
            <div class="card">
                <a href="repo_plantillas/Boletin6.pub"><img src="repo_plantillas/Boletin6.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin7.pub"><img src="repo_plantillas/Boletin7.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin8.pub"><img src="repo_plantillas/Boletin8.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin9.pub"><img src="repo_plantillas/Boletin9.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin10.pub"><img src="repo_plantillas/Boletin10.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
    </div>

<br>
<hr>
<br>  

    <div class="card-deck">
            <div class="card">
                <a href="repo_plantillas/Boletin11.pub"><img src="repo_plantillas/Boletin11.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin12.pub"><img src="repo_plantillas/Boletin12.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin13.pub"><img src="repo_plantillas/Boletin13.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin14.pub"><img src="repo_plantillas/Boletin14.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
            <div class="card">
            <a href="repo_plantillas/Boletin15.pub"><img src="repo_plantillas/Boletin15.jpg" class="card-img-top" alt="..."></a>
                <div class="card-body">
                </div>
            </div>
    </div>
    </div>                  
                




</body>
</html>
<style>
h1,h4{
    color:white;
}
body{
    background:rgb(33, 177, 175);
}
</style>

