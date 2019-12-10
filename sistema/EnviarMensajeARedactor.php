<?php 
session_start();
include "includes/scripts.php"; 
include "../conexion.php";
            $usuario=$_GET['receptor'];
            $user=mysqli_query($conection,"SELECT NOMBRE FROM usuario WHERE IDUSUARIO='$usuario'");
            $result=mysqli_fetch_array($user);
        $mensajero=$_SESSION['idUser'];
        
                 
?>
				
<h2>Chat Messages</h2>
<?php 
$listaMensaje=mysqli_query($conection,"SELECT S.ID_CARTA ,S.ASUNTO,S.TITULO,S.CONTENIDO,S.HORA_MENSAJE, U.IDUSUARIO 
FROM carta S,usuario_carta U 
WHERE ID_TIPO_CARTA=3 AND S.ID_CARTA=U.ID_CARTA AND IDUSUARIO=$mensajero AND S.ID_CARTA IN(
SELECT c.ID_CARTA
FROM carta c,usuario_carta us 
WHERE c.ID_TIPO_CARTA=3 AND c.ID_CARTA=us.ID_CARTA AND us.IDUSUARIO='$usuario')");
while ($sms = mysqli_fetch_array($listaMensaje)) {
    


						?>

<div class="mensajes">
  <img src="./img/cover4.jpg" alt="Avatar" style="width:100%;">
  <strong><?php echo $sms['TITULO']; ?></strong>
  <p class="sms">ASUNTO : <?php echo $sms['ASUNTO']; ?></p>
  <P class="sms"><?php echo $sms['CONTENIDO']; ?></P>
  <span class="time-right"><?php 
    echo $sms['HORA_MENSAJE'];
  ?></span>
</div>
<?php }?>
<form action="Colaboracion.php?usuario=<?php echo $usuario; ?>" method="post" class="formulario">
  <h3><?php 
     if(isset($_GET['res'])){
        $alert=$_GET['res'];
        echo "Mensaje enviado";

}else{
echo "Redactando";
}
  ?></h3>
  <h1 class="formulario__titulo">Enviar Mensaje a :
   <?php 
            
            echo $result['NOMBRE'];
            
   ?>
   </h1>
  <input type="text" class="formulario__input" name="asunto" placeholder="Asunto">
  <label for="" class="formulario__label" >Asunto</label>
  <input type="text" class="formulario__input" name="mensaje" placeholder="Escribe tu mensaje aqui...">
  <label for="" class="formulario__label" >Mensaje</label>
  <input type="submit" class="formulario__submit">
</form>

<script>
var inputs = document.getElementsByClassName('formulario__input');
for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('keyup', function(){
    if(this.value.length>=1) {
      this.nextElementSibling.classList.add('fijar');
    } else {
      this.nextElementSibling.classList.remove('fijar');
    }
  });
}
</script>
<style>

* {
  box-sizing: border-box;
}
body {
  margin: 0;
  font-family: sans-serif;
}
/*-------------------------------mensaje-------------------------------------- */
.sms{
    width:60%;
    margin-left:10%;
}

.mensajes{
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}
.time-right {
  float: right;
  color: #aaa;
}
.mensajes::after {
  content: "";
  clear: both;
  display: table;
}

.mensajes img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}
/*-------------------------------------form mensaje---------------------- */
.formulario {
  width:80%;
  max-width: 100%;
  margin: auto;
  margin-top: 30px;
  padding: 20px;
  box-shadow: 0 0 20px 1px rgba(0,0,0,0.3);
  position: relative;
}
.formulario__titulo {
  text-align: center;
  margin-top: 0;
  color: rgba(0,0,0,0.7);
}
.formulario__input, .formulario__label, .formulario__submit {
  display: block;
  width: 100%;
  font-size: 1.3em;
}
.formulario__input {
  padding: 20px;
  background: rgba(0,0,0,0.1);
  border: 1px solid rgba(0,0,0,0.3);
  margin-bottom: 40px;
}
.formulario__input:focus {
  outline: 1px solid rgba(0,0,0,0.7);
}
.formulario__input:focus + .formulario__label{
  margin-top: -135px;
}
.formulario__label {
  padding-left: 15px;
  position: absolute;
  margin-top: -85px;
  z-index: -20;
  color: rgba(0,0,0,0.5);
  transition: all 0.2s;
}
.formulario__submit {
  background: rgba(0,0,0,0.7);
  color: white;
  padding: 10px 20px;
  cursor: pointer;
  border: none;
}
.fijar {
  margin-top: -135px;
}

</style>