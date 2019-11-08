<!-- HEADER-PRINCIPAL -->
<header >
  <div class="fixed-top">
		<div class="navbar navbar-light justify-content-between header"> 
        <h1 class="Titulo">MENSAJERO</h1>
          <!--buscador-->
          <form action="#" method="get" class="form_search">
            <div class="wrap">
              <div class="search">
                <input type="text" class="searchTerm" placeholder="Buscar Boletin">
                <button type="submit" class="searchButton icon-search" value="Buscar">
                </button>
              </div>
            </div>
          </form>
          <!--fin buscador-->
      </div>
    <div>
  
    <div class="menu_bar">
      <a href="#" class="bt-menu"><span class="icon-view-list"></span>Menu</a>
    </div>

    <nav class="navbar-expand-lg  scrolling-navbar" >
      <div class="navbar-collapse" >
        <ul class="navbar-nav mr-auto">
          <li class="botonNav"> <a href="./"><span class="icon-home"></span>Inicio</a></li>
          <li class="submenum botonNav"> <a href="#"><span class="icon-newspaper"></span>Boletines<span class="caret icon-arrow-down6"></span></a>
              <ul class="children">
                  <li><a href="#">Categoria</a></li>
                  <li><a href="#">Destacados</a></li>
                  <li><a href="#">Tendemcia</a></li>
                  <li><a href="#">Ultimos Boletines</a></li>
              </ul>         
          </li>
          <li class="botonNav"> <a href="#" onclick="MostrarMisionVision()"><span class="icon-book"></span>Mision y Vision</a> </li>
        </ul>
        
        <ul class="navbar-nav mr-3">
          <li class="botonNav"> <a href="sistema/registro_usuario.php"><span class="icon-compose"></span>Suscribirse</a></li>
          <li class="botonNav"> <a href="#" onclick="MostrarLogin()"><span class="icon-user"></span>Ingresar</a></li>
        </ul>
      </div>  
    </nav>
  </div>   
  <p class="fecha">Bolivia, <?php echo fechaC(); ?></p>
</header>

       