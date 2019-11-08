<?php 
$colors = array('#007AFF','#FF7000','#FF7000','#15E25F','#CFC700','#CFC700','#CF1100','#CF00BE','#F00');
$color_pick = array_rand($colors);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<div class="chat-wrapper">
		<center><h4>Conversa con los demas redactores y pídeles consejos</h4></center>
		<hr>
		  <center><img class="chat-image" src="chat.png" alt=""></center>
		  	<div id="message-box"></div>
				<div class="user-panel">
				<input type="text" required name="name" id="name" placeholder="Tu nombre" maxlength="15" />
				<input type="text" required name="message" id="message" placeholder="Escribe tu mensaje aqui..." maxlength="100" />
				<button id="send-message" class="btn btn-primary btn-lg">Enviar</button>
				</div>
		</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript">  
	//create a new WebSocket object.
	var msgBox = $('#message-box');
	//var wsUri = "ws://achex.ca:4010"; 	
	var wsUri = "ws://localhost:88"; 
	//var wsUri = "ws://192.168.100.10:9000/demo/server.php"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev) { // connection is open 
		msgBox.append('<div class="system_msg" style="color:#bbbbbb">Bienvenido al chat de colaboración y cooperación!!</div>'); //notify user
	}
	// Message received from server
	websocket.onmessage = function(ev) {
		var response 		= JSON.parse(ev.data); //PHP sends Json data
		
		var res_type 		= response.type; //message type
		var user_message 	= response.message; //message text
		var user_name 		= response.name; //user name
		var user_color 		= response.color; //color

		switch(res_type){
			case 'usermsg':
				msgBox.append('<div><span class="user_name" style="color:' + user_color + '">' + user_name + '</span> : <span class="user_message">' + user_message + '</span></div>');
				break;
			case 'system':
				msgBox.append('<div style="color:#bbbbbb">' + user_message + '</div>');
				break;
		}
		msgBox[0].scrollTop = msgBox[0].scrollHeight; //scroll message 

	};
	
	websocket.onerror	= function(ev){ msgBox.append('<div class="system_error">Error de conexion - ' + ev.data + '</div>'); }; 
	websocket.onclose 	= function(ev){ msgBox.append('<div class="system_msg">Conexion cerrada</div>'); }; 

	//Message send button
	$('#send-message').click(function(){
		send_message();
	});
	
	//User hits enter key 
	$( "#message" ).on( "keydown", function( event ) {
	  if(event.which==13){
		  send_message();
	  }
	});
	
	//Send message
	function send_message(){
		var message_input = $('#message'); //user message text
		var name_input = $('#name'); //user name
		
		if(message_input.val() == ""){ //empty name?
			alert("Enter your Name please!");
			return;
		}
		if(message_input.val() == ""){ //emtpy message?
			alert("Enter Some message Please!");
			return;
		}

		//prepare json data
		var msg = {
			message: message_input.val(),
			name: name_input.val(),
			color : '<?php echo $colors[$color_pick]; ?>'
		};
		//convert and send data to server
		websocket.send(JSON.stringify(msg));	
		message_input.val(''); //reset message input
	}
</script>
</body>
</html>




<!--Estilos del chat-->
<style type="text/css">
h4{
	color:white;
}
body{
	background: blue;
}
.chat-wrapper {
	font: bold 11px/normal 'lucida grande', tahoma, verdana, arial, sans-serif;
    background-color: #00a6bb;
    padding: 20px;
    margin: 20px auto;
    box-shadow: 2px 2px 2px 0px #00000017;
	max-width:800px;
	min-width:600px;
	border-radius:3px;

	position:absolute;
	right:30px;
	left:30px;
	
}
.chat-image{
	width: 97%;
    display: inline-block;
    box-shadow: inset 0px 0px 2px #00000017;
    overflow: auto;
	margin-right:23px;
}
#message-box {
    width: 97%;
    display: inline-block;
    height: 380px;
    background: #fff;
    box-shadow: inset 0px 0px 2px #00000017;
    overflow: auto;
    padding: 10px;
	
}
.user-panel{
    margin-top: 10px;
}
input[type=text]{
    border: none;
    padding: 5px 5px;
    box-shadow: 2px 2px 2px #0000001c;
	height:33px;
}
input[type=text]#name{
    width:20%;
}
input[type=text]#message{
    width:60%;
}
button#send-message {
    border: 1px;
    padding: 5px 15px;
    box-shadow: 2px 2px 2px #0000001c;
}
</style>