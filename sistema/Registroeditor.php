<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap-4.3.1/dist/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <form class="formulario">
        <h1>Registrarse</h1>
          <div class="contenedor">

            <div class="input-contenedor">
                  <input type="text" placeholder="Nombre Completo">
              </div>

              <div class="input-contenedor">
                  <input type="text" placeholder="Correo Electronico">
                 </div>

                 <label class="erwi" for="option">Area de Interes:</label>
                     <select class="ole" name="nomRol">
                     <option value="Docente">Ciencia</option>
                     <option value="Literatura">Literatura</option>
                     <option value="Psicología">Psicología</option>
                     <option value="Ciencias Sociales">Ciencias Sociales</option>
                    <option value="Biología">Biología</option>
                     <option value="Arte">Arte</option>
                </select>

            <div class="input-contenedor">
                  <input type="text" placeholder="Nombre de Usuario">
            </div>

            <div class="input-contenedor">
                  <input type="password" placeholder="Contraseña">
            </div>

            <div class="input-contenedor">
                  <input type="password" placeholder="Confirmar Contraseña">
            </div>              
                <input type="submit" value="Crear Cuenta" class="button">
                <p>Ya tienes cuenta?<a class="link" href="loginvista.html">Iniciar Secion </a> </p>
        </div>
            
</form>

</body>
</html>