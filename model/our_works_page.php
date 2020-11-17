<?php
include_once "db.php";

$page_no = isset($_POST['page']) ? $_POST['page'] : 1;
/*************************** Total Properties Count Starts *******************************/
	//select all properties
	$query ="SELECT * FROM projects where status = 'active'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	//Total properties count
	$total_projects = $stmt->rowCount();
/*************************** Total Properties Count Ends *******************************/
	//No. of properties to display per page
	$limit = 3;
	//Total no. of pages
	$total_pages = ceil($total_projects / $limit);
	// What page are we currently on?
	$page = min($total_pages, $page_no);
	// Calculate the offset for the query
    $offset = ($page_no - 1)  * $limit;

    //Properties to display to user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total_projects);

    //Back link
if($page_no == 1){
	$previous_link = '';
}else{
/*    $previous_link = '<li><a href="javascript:;" class="button small grey pgn" data-value="1"><i class="fa fa-angle-double-left"> </i></a></li>
					<li><a href="javascript:;" class="button small grey pgn" data-value="'.($page_no-1).'"><i class="fa fa-angle-left"></i></a></li>';*/
	$previous_link = '<li><a href="javascript:;" data-value="1"><i class="fa fa-angle-double-left"> </i></a></li><li><a href="javascript:;" data-value="'.($page_no-1).'"><i class="fa fa-angle-left"></i></a></li>';
	}

if($page_no == $total_pages){
	$forward_link = '';
}else{
	//Forward link
/*	$forward_link = '<li><a href="javascript:;" class="button small grey pgn" data-value="'.($page_no+1).'"><i class="fa fa-angle-right"></i></a></li>
					  <li><a href="javascript:;" class="button small grey pgn" data-value="'.$total_pages.'"><i class="fa fa-angle-double-right "></i></a></li>';*/
	$forward_link = '    <li><a href="javascript:;" data-value="'.($page_no+1).'"><i class="fa fa-angle-right"></i></a></li><li><a href="javascript:;" data-value="'.$total_pages.'"><i class="fa fa-angle-double-right "></i></a></li>';
	}

$one ='';
$two ='';
$last_1 = '';
$last = '';
/*	if($page_no-2 >0){
		$one = '<li class="current"><a href="javascript:;" class="button small grey pgn" data-value="'.($page_no-2).'">'.($page_no-2).'</a></li>';
	}
	if($page_no-1 >0){
		$two = '<li><a href="javascript:;" class="button small grey pgn" data-value="'.($page_no-1).'">'.($page_no-1).'</a></li>';
	}
	if($page_no+1 <= $total_pages){
		$last_1 = '<li><a href="javascript:;" class="button small grey pgn" data-value="'.($page_no+1).'">'.($page_no+1).'</a></li>';
	}
	if($page_no+2 <= $total_pages){
		$last = '<li><a href="javascript:;" class="button small grey pgn" data-value="'.($page_no+2).'">'.($page_no+2).'</a></li>';
	}*/    
	if($page_no-2 >0){
		$one = '<li class="active"><a href="javascript:;" data-value="'.($page_no-2).'">'.($page_no-2).'</a></li>';
	}
	if($page_no-1 >0){
		$two = '<li><a href="javascript:;" data-value="'.($page_no-1).'">'.($page_no-1).'</a></li>';
	}
	if($page_no+1 <= $total_pages){
		$last_1 = '<li><a href="javascript:;" data-value="'.($page_no+1).'">'.($page_no+1).'</a></li>';
	}
	if($page_no+2 <= $total_pages){
		$last = '<li><a href="javascript:;" data-value="'.($page_no+2).'">'.($page_no+2).'</a></li>';
	}

    $pagination = '<ul>'
					  .$previous_link
					  .$one
					  .$two.
					  '<li><a href="javascript:;" data-value="'.$page_no.'">'.$page_no.'</a></li>'
					  .$last_1
					  .$last
					  .$forward_link.
					'</ul>';




	// Prepare the paged query
	$query1 ="SELECT * FROM projects where status = 'active' ORDER BY id DESC LIMIT ".$limit." OFFSET ".$offset;
    $projects_stmt = $conn->prepare($query1);

    // Bind the query params
//    $properties_stmt->bindParam(':limit', $limit);
//    $properties_stmt->bindParam(':offset', $offset);
    $projects_stmt->execute();



	$data = array();
	while($row = $projects_stmt->fetch(PDO::FETCH_ASSOC)){
		$data[] = array(
					"id" => $row['id'],
					"project_name" => $row['projectName'],
					"category" => $row['cat'],
					"desc" => $row['description'],
					"area" => $row['area']
					);
	}

	$total_data['pagination'] = array(
					"pagination_data" => $pagination
					);
	$total_data['projects'] = $data;

	$total_count_projects[] = array(
									"total" => $total_projects
									);
	$total_data['total_projects'] = $total_count_projects;
	
	echo json_encode($total_data);



/*	array($total_properties, $limit, $total_pages)
	$data = array();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$data[] = array(
					"id" => $row['id'],
					"region_id" => $row['region_id'],
					"property_title" => $row['title'],
					"location_name" => $row['locationName'],
					"area" => $row['area'],
					"notation" => $row['notation'],
					"price" => $row['price'],
					"description" => $row['description']
					);
	}
	echo json_encode($data);

*/

/*$data111 = array(
					"result" => "success"
					);
	
	echo json_encode($data111);*/
?>


