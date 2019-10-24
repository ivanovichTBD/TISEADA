<?php 
	session_start();
 ?>


</html>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ayuda</title>
        <link rel="stylesheet" href="css/ayuda.css" />
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php include "includes/scripts.php"; ?>

    </head>
    <body>
    <?php include "includes/header.php"; ?>
	<section id="containerayuda">
       
      
        <h1 class="h1_ayuda" >AYUDA 
         <img src="img/ayuda.png" alt="ayuda" width="50" height="30"/> </h1>
        
            <p>Nos ayudara a enterder la funcionalidad de la pagina para poder usar accesiblemente</p>
       <h2 class="h2_ayuda">PAGINA MENSAJERO</h2>
       <h3 class="h3_ayuda">INICIO</h3>
        <table class="table1" >
            <tr>
                <td><strong>Inicio</strong></td>
                <td>te reenvia a la pagina principal</td>
            </tr>
        </table>
       
        

     
        <h4 class="h4_ayuda">Escribir Carta</h4>
        <table class="table1">
            <tr>
                <td><strong>Nueva carta</strong></td>
                <td>crearas una nueva carta donde podras escribir todos ese campos vacios  </td>
            </tr>
            <tr>
                <td><strong>Lista de cartas</strong></td>
                <td>te mostrara todo lo que se escribio hasta el momento</td>
            </tr>
            <tr>
                <td><strong>Plantillas</strong></td>
                <td>tendras una vista de plantillas para que puedas escribir</td>
            </tr>
        </table>
       
       
        </section>
	<?php include "includes/footer.php"; ?>
    </body>
</html>