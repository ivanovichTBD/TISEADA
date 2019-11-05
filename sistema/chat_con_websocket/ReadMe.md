
//**CHAT CON SOCKETS**//

1. habilitar sockets en php
2. si no se tiene habilitado, descargar el archivo ( php_sockets.dll ) y pegarlo en la ruta 
   de los archivos de php
3. cambiar el archivo de configuracion (php.ini) y borrar la linea 
   ;extension=php_sockets.dll 
   o simplemente borrar el ;
4. cambiar la direccion del host en index.php y server.php ([localhost o la direccion IP] y el puerto 9000)
5. ir a alguna terminal y ejecutar php -q server.php (en la ruta donde se encuentra dicho archivo server.php)
