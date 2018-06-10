<?php 

include('Connection.php');

	/**
	 * 
	 */
	class Security
	{
		
		function __construct()
		{
			# code...
		}

		function random(){
			$caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
			$nueva_clave = "";
			for ($i = 5; $i < 35; $i++) {
				$nueva_clave .= $caracteres[rand(5,35)];
			};
			return $nueva_clave;
		}


		function passwordSalt($password){
			$aleatorio = aleatoriedad();
			$valor = "07";
			$salt = "$2y$".$valor."$".$aleatorio."$";
			return $passwordConSalt = crypt($password, $salt);
		}

		function antiXxs($str){
			return htmlspecialchars(mysqli_real_escape_string($connection, $str));
		}
	}
 ?>