<?php
include_once "db.php";
include_once "../config/config.php";

$project_image_id = $_POST['id'];
$query1 = "SELECT image_name from project_images WHERE id = '$project_image_id'";
$stmt1 = $conn->prepare($query1);
$stmt1->execute();
$image_name = $stmt1->fetchColumn();
$file_path = "../../images/project_images/".$image_name;
if(file_exists($file_path)){
	unlink($file_path);
}

$query = "DELETE FROM project_images where id = '$project_image_id'";
$stmt = $conn->prepare($query);
if($stmt->execute()){

	$data = array(
					"result" => "success"
					);
		echo json_encode($data);
}



?>