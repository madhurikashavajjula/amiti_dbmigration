<?php
	//DB Params
	$host = "localhost";
	$db_name = "amiti";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO('mysql:host='.$host.';dbname='.$db_name, $username, $password);
	}
	catch(PDOException $e){
		echo 'Connection Error: ' . $e->getMessage();
	}

?>