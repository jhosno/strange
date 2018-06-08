	<?php 
//Conectamos a la base de datos
require('connection.php');

//Obtenemos los datos del formulario de acceso
$user = $_POST["user"]; 
$password = $_POST["password"];

//Filtro anti-XSS
$user = htmlspecialchars(mysqli_real_escape_string($connection, $user));
$password = htmlspecialchars(mysqli_real_escape_string($connection, $password));


//Pasamos el input del usuario a minúsculas para compararlo después con
//el campo "usernamelowercase" de la base de datos
$userMinusculas = strtolower($user);

//Escribimos la consulta necesaria
$consulta = "SELECT * FROM `users` WHERE user='".$user."' OR email='".$user."'";

//Obtenemos los resultados
//$resultado = $connection->$consulta;
$datos = $connection->query($consulta)->fetch_array();
$privilegios = $connection->query("SELECT * FROM privileges WHERE user_id=".$datos['id']."")->fetch_assoc();

//Guardamos los resultados del nombre de usuario en minúsculas
//y de la contraseña de la base de datos
$userBD = $datos['user'];
$passwordBD = $datos['password'];

//Comprobamos si los datos son correctos
if($userBD == $user or $datos['email'] == $user and password_verify($password, $passwordBD)){
	//die(var_dump($datos['id']));
	$action = "El usuario ha iniciado sesión";
	$record = "INSERT INTO `records`(`user_id`, `action`, `create_at`, `time`) VALUES (".$datos['id'].", '".$action."',CURRENT_DATE,CURRENT_TIME)";

	$connection->query($record);
	session_start();
	$_SESSION['id'] = $datos['id'];
	$_SESSION['usuario'] = $datos['name'];
	$_SESSION['estado'] = 'Autenticado';
	$_SESSION['bitacora'] = $privilegios['edit'];
	$_SESSION['usuarios'] = $privilegios['records'];
	$_SESSION['perfil	'] = $privilegios['level_user'];
	die(print_r($_SESSION));
	header("Location:../index.php") ;
	/* Sesión iniciada, si se desea, se puede redireccionar desde el servidor */

//Si los datos no son correctos, o están vacíos, muestra un error
//Además, hay un script que vacía los campos con la clase "acceso" (formulario)
} else if ( $userBD != $user || $user == "" || $password == "" || !password_verify($password, $passwordBD) ) {
	die ('<script>$(".acceso").val("");</script>
Los datos de acceso son incorrectos');
} else {
	die('Error');
};
?>