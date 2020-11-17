<?php
include_once "db.php";

$id = $_POST['id'];

	$query ="UPDATE happyclients SET 
								status = 'deleted'
								WHERE id = '$id'
									";
	$stmt = $conn->prepare($query);
	$result = $stmt->execute();

	if($result){
		$data = array(
					"result" => "success"
					);
		echo json_encode($data);
	}


?>