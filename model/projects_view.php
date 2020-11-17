<?php
include_once "db.php";
include_once "../config/config.php";

$project_id = $_POST['id'];

$query ="SELECT id, projectName, project_date, cat, description, area FROM projects where id = '$project_id'";
$stmt = $conn->prepare($query);
$stmt->execute();
	if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$project_details = array(
					"id" => $row['id'],
					"date" => date("m/d/Y",strtotime($row['project_date'])),
					"name" => $row['projectName'],
					"category" => $row['cat'],
					"description" => $row['description'],
					"area" => $row['area']
					);
	}

$query1 = "SELECT id, image_name, project_id FROM project_images where project_id = '$project_id'";
$stmt1 = $conn->prepare($query1);
$stmt1->execute();
	$project_images = array();
	while($result = $stmt1->fetch(PDO::FETCH_ASSOC)){
		$single_project_detail = array(
									"img_id" => $result['id'],
									"img_name" => $result['image_name'],
									"project_id" => $result['project_id']
									);
		array_push($project_images, $single_project_detail);
		//$project_images[] = $single_project_detail;
	}




	$data = array(
				"project_details" => $project_details,
				"image_details" => $project_images
				);
	





echo json_encode($data);


?>