<?php 
	
    session_start();
if($_SESSION['tipo_usuario'] == 1)
{
		
        
        include "../conexion.php";
        
        if(!empty($_POST))
        {
            $alert='';
            if(empty($_POST['tipo_usuario']))
            {
                $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
            }else{
                
                $tipo_usuario  = $_POST['tipo_usuario'];
                
                
                $query = mysqli_query($conection,"SELECT * FROM tipo_usuario WHERE tipo_usuario = '$tipo_usuario' ");
                $result = mysqli_fetch_array($query);
                
                if($result > 0){
                    $alert='<p class="msg_error">El tipo de usuario ya existe</p>';
                }else{
                    
                    $query_insert = mysqli_query($conection,"INSERT INTO tipo_usuario(tipo_usuario)
																	VALUES('$tipo_usuario')");
				if($query_insert){
                    $alert='<p class="msg_save">Tipo de usuario creado correctamente</p>';
				}else{
                    $alert='<p class="msg_error">Error al crear el tipo de usuario.</p>';
				}
                
			}
            
            
		}
        
    }
}
else{
    header("location: ./");
}
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php  include "includes/scripts.php";?>
    <title>Document</title>
</head>
<body>

        <div class="form_register">
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
                <form action="" method="POST">
                    <h1 align="center">¿Eres administrador?<br>¿Deseas añadir un nuevo tipo de usuario?</h1>
                    <label for="nombre">Tipo de usuario</label>
                    <input type="text" name="tipo_usuario" id="tipo_usuario" placeholder="Nuevo tipo de usuario">
                    
                    <input type="submit" value="Crear tipo de usuario" class="btn_save">

                </form>

        
        </div>


</body>
</html>