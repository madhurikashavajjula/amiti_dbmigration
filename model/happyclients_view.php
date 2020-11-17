<?php
include_once "db.php";
include_once "../config/config.php";

$happyclient_id = $_POST['id'];

$query ="SELECT id, clientName, location, duration, area, description, blockquote FROM happyclients where id = '$happyclient_id'";
$stmt = $conn->prepare($query);
$stmt->execute();
	if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$happyclient_details = array(
					"id" => $row['id'],
					"name" => $row['clientName'],
					"location" => $row['location'],
					"duration" => $row['duration'],
					"area" => $row['area'],
					"description" => $row['description'],
					"blockquote" => $row['blockquote']
					);
	}

$query1 = "SELECT id, img_name, happyclient_id FROM happyclients_images where happyclient_id = '$happyclient_id'";
$stmt1 = $conn->prepare($query1);
$stmt1->execute();
	$happyclient_images = array();
	while($result = $stmt1->fetch(PDO::FETCH_ASSOC)){
		$single_happyclient_detail = array(
									"img_id" => $result['id'],
									"img_name" => $result['img_name'],
									"happyclient_id" => $result['happyclient_id']
									);
		array_push($happyclient_images, $single_happyclient_detail);
		//$happyclient_images[] = $single_project_detail;
	}




	$data = array(
				"happyclient_details" => $happyclient_details,
				"happyclient_images" => $happyclient_images
				);
	





echo json_encode($data);


?>