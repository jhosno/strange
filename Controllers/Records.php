<?php 
include('Connection.php');
/**
 * 
 */
class Records
{
	private $_id = "";
	private $_user_id = "";
	private $_action = "";
	private $_create_at = "";
	private $_time = "";

	
	function __construct($request)
	{
		$stmt = $connection->prepare("INSERT INTO `records`(`user_id`, `action`, `create_at`, `time`) VALUES (?,?,CURRENT_DATE,CURRENT_TIME");

		$stmt->bind_param("ss", $request['user_id'], $request['action']);

		$stmt->execute();


	}
}

 ?>