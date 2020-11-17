<?php
include_once "db.php";
include_once "../config/config.php";

$name = $_POST['happyclients_name_add'];
$location = $_POST['happyclients_location_add'];
$duration = $_POST['happyclients_duration_add'];
$area = $_POST['happyclients_area_add'];
$description = $_POST['happyclients_desc_add'];
$blockquote = $_POST['happyclients_bq_add'];
//if(array_filter($_FILES["happyclients_img_add"]["tmp_name"])){echo "success";}else{echo "Failure";}
//echo sizeof($_FILES["happyclients_img_add"]["tmp_name"]);
if(!empty(array_filter($_FILES["happyclients_img_add"]["tmp_name"]))){
	foreach($_FILES["happyclients_img_add"]["tmp_name"] as $key=>$val){
		//Check image type
		$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
		$detectedType = exif_imagetype($_FILES['happyclients_img_add']['tmp_name'][$key]);
		if(!in_array($detectedType, $allowedTypes)){
				echo "Please Select a valid image with type PNG or JPG";
				echo "<br>";
				echo "<a href='../happy_clients_list.php'>Back to Project list page</a>";
				exit;
			}
	}
}
/****************** Happy Clients Details Insert Starts **************************/
$query ="INSERT INTO happyclients (clientName, location, duration, area, description, blockquote, status) VALUES('$name', '$location', '$duration', '$area', '$description', '$blockquote', 'active')";
	$stmt = $conn->prepare($query);
	if($stmt->execute()){
		$happyclients_insert_id = $conn->lastInsertId();
	}
/****************** Happy Clients Details Insert Ends **************************/
/****************** Images Insert Starts *****************************/
if(!empty($happyclients_insert_id)){
	if(!empty(array_filter($_FILES["happyclients_img_add"]["tmp_name"]))){
		
		//$ext = pathinfo($_FILES['happyclients_img_add']['name'], PATHINFO_EXTENSION);
		
			foreach($_FILES["happyclients_img_add"]["tmp_name"] as $key=>$val){

				//Upload file path
				$file_name = $happyclients_insert_id.'_'.basename($_FILES["happyclients_img_add"]["name"][$key]);
				move_uploaded_file($_FILES["happyclients_img_add"]["tmp_name"][$key],"../../images/happyclients_images/".$file_name);
				//Insert images into happyclients_images table
				$query1 = "INSERT INTO happyclients_images (img_name, happyclient_id) VALUES(?, '$happyclients_insert_id')";
				$stmt1 = $conn->prepare($query1);
				//Bind Parameters
				$stmt1->bindParam(1, $file_name);
				$stmt1->execute();
			}
			
		
		
	}
}

	//$img_count = sizeof($_FILES["project_img_add"]["tmp_name"]);




/****************** Images Insert Ends *****************************/
header("Location: ".$base_url."backend/happy_clients_list.php");


?>