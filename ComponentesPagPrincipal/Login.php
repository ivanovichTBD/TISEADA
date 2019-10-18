 


<a href="#" name="Login"></a>
<div class="IngresoUser"  id="IngresoUser" style="display:none">
    
    <div class=" w3l-login-form" name="hola">
        <h2>MENSAJERO</h2>
        <form action="#" method="POST">

            <div class=" w3l-form-group">
                <label>APODO:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input name="usuario" type="text" class="form-control inputTextPass" placeholder="Apodo" required="required" />
                </div>
            </div>
            <div class="w3l-form-group">
                <label>CONTRASEÑA:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input name="clave" type="password" class="form-control inputTextPass " placeholder="Contraseña" required="required" />
                </div>
            </div>
            <div class="forgot">
           
                <p><input type="checkbox">Recuérdame</p>
            </div>
            <button class="botoningreso"type="submit">INGRESAR</button>
        </form>
        <p class=" w3l-register-p">Ya tienes cuenta?<a href="#" class="register"> Registrarse</a></p>
    </div>
    </div>

<Style>

.IngresoUser {
    margin: 0;
    padding: 0;
    background: url(../sistema/img/cover4.jpg) no-repeat 0px 0px;
    min-height: 100vh;
    background-size: cover;
    font-family: 'Raleway', sans-serif;
}

h2 {
    margin: 0;
    color: rgb(248, 252, 249);
    font-size: 25px;
    font-weight: 400;
    text-align: center;
    letter-spacing: 1px;
    padding-bottom: 30px;
}

p.w3l-register-p {
    color: #eee;
    font-size: 13px;
    text-align: center;
    margin-top: 2em;
}

.w3l-login-form {
    background: rgba(0, 0, 0, 0.4117647058823529);
    //background: #6EB5FF;
    max-width: 500px;
    margin: 0 auto;
    padding: 3em;
    border-radius: 10px;
    box-sizing: border-box;
    margin-top: 90px;

}

.group {
    display: flex;
    padding: 15px 5px;
    background-color: #ffffff;
}

.group i {
    color: #00BCD4;
    font-size: 20px;
    padding: 0 10px;
}

.w3l-form-group {
    margin: 20px 0;
}

.w3l-form-group label {
    display: block;
    text-transform: uppercase;
    font-size: 13px;
    color: #d2d2d2;
    letter-spacing: 2px;
    margin-bottom: 10px;
    font-style: italic;
}

.inputTextPass {
    width: 100%;
    border: none;
    box-sizing: border-box;
    background: transparent;
    color: #000;
}

.inputTextPass:focus {
    outline: none;
}

.botoningreso {
    background-color: #00BCD4;
    color: #ffffff;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
    padding: 12px 60px;
    cursor: pointer;
    width: 100%;
    border-radius: 6px;
}

.botoningreso:hover {
    background-color: #00BCD4;
    transition-duration: 5s;
}

.forgot {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
    }

.letras {
    color: #ffffff;
    font-size: 14px;
    text-decoration: none;
}

.forgot p {
    color: #ffffff;
    text-align: center;
    margin: 0px;
	font-size: 13px;
}

.register {
    color: #00BCD4;
    text-decoration: none;
}


</Style>