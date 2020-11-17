<?php
include_once "db.php";
include_once "../config/config.php";

$happyclient_image_id = $_POST['id'];
$query1 = "SELECT img_name from happyclients_images WHERE id = '$happyclient_image_id'";
$stmt1 = $conn->prepare($query1);
$stmt1->execute();
$image_name = $stmt1->fetchColumn();
$file_path = "../../images/happyclients_images/".$image_name;
if(file_exists($file_path)){
	unlink($file_path);
}

$query = "DELETE FROM happyclients_images where id = '$happyclient_image_id'";
$stmt = $conn->prepare($query);
if($stmt->execute()){

	$data = array(
					"result" => "success"
					);
		echo json_encode($data);
}



?>