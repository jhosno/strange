<?php 
// Carga la configuración 
$config = parse_ini_file('../config.ini');


$connection = new mysqli($config['host'],$config['username'], $config['password'], $config['dbname']);

if ($connection->connect_error) {
    die("Fallo de conexión: " . $conn->connect_error);
}else{
	return $connection;
}

 ?>