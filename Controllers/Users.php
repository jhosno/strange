<?php 

include_once('DBStartup.php');
include('Security.php');
include('Privileges.php');
include('Records.php');
/**
 * 
 */

	class Users extends DBStartup
	{	
		private $_id = "";
		private $_name = "";
		private $_email = "";
		private $_user = "";
		private $_password = "";
		
		function __construct()
		{
			parent::__construct();
		}

		function login($request){

		}

		function create($request){

		}

		function store($request){
			$validate = usernameUnique($request['user'], $request['email']);
			$password = Security::passwordSalt($request['password']);
			$stmt = $this->DBConnection->prepare("INSERT INTO `users` (email, user, password, name) 
					VALUES (?,?,?,?)");
			$stmt->bind_param("ssss", $request['email'], $request['user'], $password, $request['name'] );
			header("Location:../index.php") ;
		}

		function delete($request){

		}
		function logout($request){

		}

		function recovery($request){

		}

		function edit($request){

		}

		function update($request){

		}

		function index($request){

		}

		function usernameUnique($user, $email){
			
			$stmt = $this->connection->prepare("SELECT user, email FROM `users` WHERE user = ? AND email = ?");
			$stmt->bind_param("ss", strtolower($user), $email);
			$result = $stmt->execute()->fecth_array();
			if ($result) {
				$cadena = "Usuario/ Email ya registrado";
				return $cadena;
			}else{
				echo "hola ".$user."!";

			}
		}

	}




$email= "jhosnoirlit@gmail.com";
$user= "jhosno";

Users::usernameUnique($user, $email);




 ?>



