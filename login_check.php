<?php
	include_once 'config/database.php';
	include_once 'objects/user.php';
	 
	// get database connection
	$database = new Database();
	$db = $database->getConnection();
	 
	// instantiate user object
	$user = new User($db);

	$user->email = $_POST['username'];
	$password = $_POST['password'];
	$user_exists = $user->login();

		if($user_exists && password_verify($password, $user->password)){
		session_start();
		$_SESSION["user_id"] = $user_exists['id'];
		$_SESSION["user_name"] = $user_exists['name'];
		$_SESSION["logged_in"] = 1;
		$_SESSION["type"] = $user_exists['type'];
		$_SESSION["category"] = $user_exists['category'];
		if($user_exists['type']=="superadmin" || $user_exists['type']=="manager"||$user_exists['type']=="user"||$user_exists['type']=="hr"){
			header("Location:/amiti_migration/admin_dashboard.php");
		}
		elseif($user_exists['type']=="accounts"){
			header("Location:/amiti_migration/accounts_dashboard.php");
		}
	}
	else{
		echo "<script>alert('Invalid Credentials!')</script>";
		header("Location:/amiti_migration/index.php");
		exit();
	}

?>