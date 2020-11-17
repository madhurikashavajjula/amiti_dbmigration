<?php
include_once "db.php";
include_once "../config/config.php";

$name = $_POST['project_name_add'];
$date = date("d-m-Y",strtotime($_POST['project_date_add']));
$location = $_POST['project_location_add'];
$description = $_POST['project_desc_add'];
$category = $_POST['category'];
//if(array_filter($_FILES["project_img_add"]["tmp_name"])){echo "success";}else{echo "Failure";}
//echo sizeof($_FILES["project_img_add"]["tmp_name"]);
if(!empty(array_filter($_FILES["project_img_add"]["tmp_name"]))){
	foreach($_FILES["project_img_add"]["tmp_name"] as $key=>$val){
		//Check image type
		$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
		$detectedType = exif_imagetype($_FILES['project_img_add']['tmp_name'][$key]);
		if(!in_array($detectedType, $allowedTypes)){
				echo "Please Select a valid image with type PNG or JPG";
				echo "<br>";
				echo "<a href='../projects_list.php'>Back to Project list page</a>";
				exit;
			}
	}
}
/****************** Projects Details Insert Starts **************************/
$query ="INSERT INTO projects (projectName, project_date, cat, area, description, status) VALUES('$name', '$date', '$category', '$location', '$description', 'active')";
	$stmt = $conn->prepare($query);
	if($stmt->execute()){
		$project_insert_id = $conn->lastInsertId();
	}
/****************** Projects Details Insert Ends **************************/
/****************** Images Insert Starts *****************************/
if(!empty($project_insert_id)){
	if(!empty(array_filter($_FILES["project_img_add"]["tmp_name"]))){
		
		//$ext = pathinfo($_FILES['project_img_add']['name'], PATHINFO_EXTENSION);
		
			foreach($_FILES["project_img_add"]["tmp_name"] as $key=>$val){

				//Upload file path
				$file_name = $project_insert_id.'_'.basename($_FILES["project_img_add"]["name"][$key]);
				move_uploaded_file($_FILES["project_img_add"]["tmp_name"][$key],"../../images/project_images/".$file_name);
				//Insert images into project_images table
				$query1 = "INSERT INTO project_images (image_name, project_id) VALUES(?, '$project_insert_id')";
				$stmt1 = $conn->prepare($query1);
				//Bind Parameters
				$stmt1->bindParam(1, $file_name);
				$stmt1->execute();
			}
			
		
		
	}
}

	//$img_count = sizeof($_FILES["project_img_add"]["tmp_name"]);




/****************** Images Insert Ends *****************************/
header("Location: ".$base_url."backend/projects_list.php");


?>