<?php
//Conectamos a la base de datos
require('connection.php');

//Obtenemos los datos del formulario de registro
$email = $_POST['email'];
$name = $_POST['name'];
$user = $_POST["user"]; 
$password = $_POST["password"];

//Filtro anti-XSS
$user = htmlspecialchars(mysqli_real_escape_string($connection, $user));
$password = htmlspecialchars(mysqli_real_escape_string($connection, $password));



//Pasamos el input del usuario a minúsculas para compararlo después con
//el campo "usernamelowercase" de la base de datos
$userMinusculas = strtolower($user);

//Escribimos la consulta necesaria
$consultaUsuarios = "SELECT user FROM `users`";

//Obtenemos los resultados
$resultadoConsultaUsuarios = mysqli_query($connection, $consultaUsuarios) or die(mysql_error());
$datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
$userBD = $datosConsultaUsuarios['user'];

//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if ($user == $userBD) {
	die('Ya existe un usuario con el nombre '.$user.'');
}
else {
//Si no hay errores, procedemos a encriptar la contraseña
//Lectura recomendada: https://mimentevuela.wordpress.com/2015/10/08/establecer-blowfish-como-salt-en-crypt-2/
	
	function aleatoriedad() {
		$caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
		$nueva_clave = "";
		for ($i = 5; $i < 35; $i++) {
			$nueva_clave .= $caracteres[rand(5,35)];
		};
		return $nueva_clave;
	};

	$aleatorio = aleatoriedad();
	$valor = "07";
	$salt = "$2y$".$valor."$".$aleatorio."$";

	$passwordConSalt = crypt($password, $salt);

	//Armamos la consulta para introducir los datos
	$consulta = "INSERT INTO `users` (email, user, password, name) 
	VALUES ('$email', '$user', '$passwordConSalt', '$name')";

	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if($connection->query($consulta)) {

		$user_id = "SELECT MAX(`id`) FROM `users`";
		$id = $connection->query($user_id)->fetch_assoc();
		$action = "El usuario ".$name." se ha registrado";
		
		$record = "INSERT INTO `records`(`user_id`, `action`, `create_at`, `time`) VALUES (".$id["MAX(`id`)"].", '".$action."',CURRENT_DATE,CURRENT_TIME)";

		$privilege = "INSERT INTO `privileges`(`user_id`, `privilege`) 
						VALUES (".$id["MAX(`id`)"].",'USER')";
		$connection->query($privilege);
		$connection->query($record);
		

		header("Location:../index.php") ;
	} else {
		die('Error');
	};
}; 

?>