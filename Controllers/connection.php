<?php 
// Carga la configuración 
$config = parse_ini_file('../config.ini');

try {
$connection = new PDO("mysql:host=$config['host'];dbname=$config['dbname']",$config['username'], $config['password']);

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
 ?>