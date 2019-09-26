<?php 
	
	$host = 'localhost';
	$usuario = 'root';
	$contraseña = '';
	$db = 'mensajero';

	$conection = @mysqli_connect($host,$usuario,$contraseña,$db);
	
	//mysqli_close($conection);

	if(!$conection){
		echo "Error en la conexión";
	}
//comentarios...
//otros comentarios.......................
// commit.........................
// dddddddddddddd
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
?>