<header>
		<div class="header">
			
			<h1 class="Titulo">MENSAJERO</h1>
			<form action="#" method="get" class="form_search">
                <div class="wrap">
            <div class="search">
      <input type="text" class="searchTerm" placeholder="Escriba en nombre del Boletin">
      <button type="submit" class="searchButton" value="Buscar">
        <img src="fontawesome-free-5.11.2-web/svgs/solid/search.svg" alt="" class="posBus">
     </button>
   </div>
</div></form>
            
        </div>
        </header>
        <nav>
                <div class="mid"><button class="botonNav">Inicio</button>
                <button class="botonNav">Ultimos Boletines</button>
                 <button onclick="MostrarMisionVision()" class="botonNav">Mision y Vision</button>  
</div>
               <div class="derecha">
               <button class="botonNav">Suscribirse</button>
               <a href="ComponentesPagPrincipal/Login.php"> <button class="botonNav">Ingresar</button></a>
               <!--Boton que va a la pagina registrar usuario-->
               <a href="sistema/registro_usuario.php"> <button class="botonNav">Registrarse</button> </a>
               </div>

                
        </nav>
        <p class="fecha">Bolivia, <?php echo fechaC(); ?></p>
				
        