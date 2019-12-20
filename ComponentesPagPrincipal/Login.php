<a href="#" name="Login"></a>
<div class="IngresoUser"  id="IngresoUser" style="display:none">
    
    <div class=" w3l-login-form" name="hola">
        <h2>INICIAR SESION</h2>
        <form action="#" method="POST">

            <div class=" w3l-form-group">
                <label>USUARIO:</label>
                <div class="group">
                    <i class="fas fa-user"></i>

                    <input name="usuario" type="text" class="form-control" placeholder="Nombre de usuario o apodo" required  
                           title="Tu nombre de usuario debe ser letras o numeros, minimo 5, maximo 20"/>

                </div>
            </div>
            <div class="w3l-form-group">
                <label>CONTRASEÑA:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input name="clave" type="password" class="form-control inputTextPass " placeholder="Contraseña" required 
                           />
                </div>
            </div>
            <button class="botoningreso"type="submit">INGRESAR</button>
        </form>
        <p class=" w3l-register-p">No tienes cuenta?<a href="./sistema/registro_usuario.php" class="register"> Registrate</a></p>
    </div>
</div>
<style>
h2{
    color:white;
}
</style>

