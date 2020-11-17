<?php
	include "db.php";
	include "../config/config.php";

	$uname = $_POST['username'];
	$pass = $_POST['password'];

	$query = "SELECT * from users where username = ? and password = ? ";
	//prepare the query
	$stmt = $conn->prepare($query);
	//sanitize 
	$uname = htmlspecialchars(strip_tags($uname));
	$pass = htmlspecialchars(strip_tags($pass));
	//bind parameters
	$stmt->bindParam(1, $uname);
	$stmt->bindParam(2, $pass);

	$stmt->execute();
	if($stmt->rowCount() > 0){
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// Start the session
		session_start();
		$_SESSION["user_id"] = $row['id'];
		$_SESSION["user_name"] = $row['username'];
		$_SESSION["logged_in"] = 1;
		
		header("Location: ../dashboard.php");
	}
	else{
		echo "<script>alert('Invalid Credentials!')</script>";
		header("Location:".$base_url);
		exit();
	}

?>