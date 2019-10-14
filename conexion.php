<?php 
	
	$host = 'localhost';
	$usuario = 'root';
	$contraseña = '';
	$db = 'tis';
	$conection = @mysqli_connect($host,$usuario,$contraseña,$db);
	
	//mysqli_close($conection);

	if(!$conection){
		echo "Error en la conexión";
	}
    //comentarios
?>