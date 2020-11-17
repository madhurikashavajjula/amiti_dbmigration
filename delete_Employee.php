<?php
	include_once 'config/database.php';
	include_once "model/db.php";

$id = $_POST['id'];

	$query ="DELETE FROM tblemployees WHERE EmployeeID=$id";
	$stmt = $conn->prepare($query);
	$result = $stmt->execute();

	if($result){
		$data = array(
					"result" => "success"
					);
		echo json_encode($data);
	}


?>