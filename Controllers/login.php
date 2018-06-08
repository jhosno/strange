<?php
//Iniciamos la sesión
session_start();

//Pedimos el archivo que controla la duración de las sesiones
//require('recursos/sesiones.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Acceso o registro</title>
<script src="js/jquery-1.9.1.min.js"></script>
</head>
<body>

<div id="mensaje" style="border:1px solid #CCC; padding:10px;"></div>

<h2>Accede a tu cuenta</h2>

<div class="formulario-acceso">
<form method="POST" id="acceso" action="" accept-charset="utf-8">
	<input type="text" name="userAcceso" class="acceso" id="userAcceso" placeholder="Usuario" autocomplete="off" maxlength="20">
	<input type="password" name="passAcceso" class="acceso" id="passAcceso" placeholder="Contraseña" autocomplete="off" maxlength="60">
	<input type="submit" name="acceso" class="boton-principal" value="Acceder">
</form>
</div>

<hr>

<h2>Crea una cuenta</h2>

<div class="formulario-registro">
<form method="POST" id="registro" action="" accept-charset="utf-8">
	<input type="text" name="userRegistro" class="registro" id="userRegistro" placeholder="Usuario" autocomplete="off" maxlength="20">
	<input type="password" name="passRegistro" class="registro" id="passRegistro" placeholder="Contraseña" autocomplete="off" maxlength="60">
	<input type="submit" name="registro" class="boton-principal" value="Registrarse">
</form>
</div>

<script>
//Guardamos el controlador del div con ID mensaje en una variable
var mensaje = $("#mensaje");
//Ocultamos el contenedor
mensaje.hide();

//Cuando el formulario con ID acceso se envíe...
$("#acceso").on("submit", function(e){
	//Evitamos que se envíe por defecto
	e.preventDefault();
	//Creamos un FormData con los datos del mismo formulario
	var formData = new FormData(document.getElementById("acceso"));

	//Llamamos a la función AJAX de jQuery
	$.ajax({
		//Definimos la URL del archivo al cual vamos a enviar los datos
		url: "recursos/acceder.php",
		//Definimos el tipo de método de envío
		type: "POST",
		//Definimos el tipo de datos que vamos a enviar y recibir
		dataType: "HTML",
		//Definimos la información que vamos a enviar
		data: formData,
		//Deshabilitamos el caché
		cache: false,
		//No especificamos el contentType
		contentType: false,
		//No permitimos que los datos pasen como un objeto
		processData: false
	}).done(function(echo){
		//Una vez que recibimos respuesta
		//comprobamos si la respuesta no es vacía
		if (echo !== "") {
			//Si hay respuesta (error), mostramos el mensaje
			mensaje.html(echo);
			mensaje.slideDown(500);
		} else {
			//Si no hay respuesta, redirecionamos a donde sea necesario
			//Si está vacío, recarga la página
			window.location.replace("");
		}
	});
});

//Cuando el formulario con ID acceso se envíe...
$("#registro").on("submit", function(e){
	//Evitamos que se envíe por defecto
	e.preventDefault();
	//Creamos un FormData con los datos del mismo formulario
	var formData = new FormData(document.getElementById("registro"));

	//Llamamos a la función AJAX de jQuery
	$.ajax({
		//Definimos la URL del archivo al cual vamos a enviar los datos
		url: "recursos/registro.php",
		//Definimos el tipo de método de envío
		type: "POST",
		//Definimos el tipo de datos que vamos a enviar y recibir
		dataType: "HTML",
		//Definimos la información que vamos a enviar
		data: formData,
		//Deshabilitamos el caché
		cache: false,
		//No especificamos el contentType
		contentType: false,
		//No permitimos que los datos pasen como un objeto
		processData: false
	}).done(function(echo){
		//Cuando recibamos respuesta, la mostramos
		mensaje.html(echo);
		mensaje.slideDown(500);
	});
});
</script>
</body>
</html>