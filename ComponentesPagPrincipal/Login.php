

<section id="container">
		
		<form action="" method="post">
			
			<h3>Iniciar Sesión</h3>
			<img src="img/login.png" alt="Login">

			<input type="text" name="usuario" placeholder="Usuario">
			<input type="password" name="clave" placeholder="Contraseña">
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
			<input type="submit" value="INGRESAR">

		</form>
</section>


<Style>
*{	
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
h3{
	font-family: 'Arial';
	font-size: 25pt;
	letter-spacing: 1px;
	width: 100%;
	background: rgb(33, 177, 162);
	padding: 15px;
	color: #FFF;
	text-align: center;
	text-transform: uppercase;

}
#container{
	background: #5d6d7e;
	width: 100%;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: center;
	align-items: center;
}
#container form{
	background: #FFF;
	width: 400px;
	padding: 10px;
}

#container form img{
	margin: 15px auto;
	text-align: center;
	display: block;
}
#container form input{
	width: 90%;
	padding: 5px;
	font-size: 16pt;
	display: block;
	margin: 25px auto;
	border-radius: 5px;
	border: 1px solid  #85929e;
	text-align: center;
	background: rgb(246, 253, 253);
}

#container form input[type="submit"]{
	background:rgb(33, 177, 162) ;
	padding: 10px;
	color: #FFF;
	letter-spacing: 1px;
	border: 0;
	cursor: pointer;
}
.alert{
	font-family: 'Arial';
	font-size: 16px;
	text-align: center;
}

</Style>