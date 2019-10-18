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

<header>
<div>
        <!--AÑADIDO RESPONSIVE-->
        <div class="menu_bar">
                  <a href="#" class="bt-menu"><span class="icon-view-list"></span>Menu</a>
        </div>
        <!--FIN-->
        
        <nav>
            <div>
              <ul>
                <li class="botonNav"> <a href="./"><span class="icon-home"></span>Inicio</a></li>
                <li class="botonNav"> <a href="#"><span class="icon-newspaper"></span>Ultimos Boletines</a></li>
                <li class="botonNav"> <a href="#cuerpo" onclick="MostrarMisionVision()"><span class="icon-book"></span>Mision y Vision</a> </li>
               
                <li class="botonNav"> <a href="sistema/registro_usuario.php"><span class="icon-pencil"></span>Suscribirse</a></li>
                <li class="botonNav"> <a href="#Login" onclick="MostrarLogin()"><span class="icon-user"></span>Ingresar</a></li>
              </ul>
            </div>
        </nav>
  </div>    
</header>
<p class="fecha">Bolivia, <?php echo fechaC(); ?></p>

				
        