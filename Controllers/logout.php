<?php
//Reanudamos la sesión
session_start();

//Requerimos los datos de la conexión a la BBDD
require('connection.php');
	
	$action = "El usuario ha cerrado sesión";
	$record = "INSERT INTO `records`(`user_id`, `action`, `create_at`, `time`) VALUES (".$_SESSION['id'].", '".$action."',CURRENT_DATE,CURRENT_TIME)";

	$connection->query($record);
//Des-establecemos todas las sesiones
unset($_SESSION);

//Destruimos las sesiones
session_destroy();

//Cerramos la conexión con la base de datos
mysqli_close($connection);

//Redireccionamos a el index
header("Location: ../");
die();
?>
