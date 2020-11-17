<?php
	include_once 'config/database.php';
	include_once "model/db.php";


    $title=$_POST['title'];
    $emp_id=$_POST['emp_id'];
    $category=$_POST['category'];  
    $type=$_POST['type'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $hours=$_POST['hours'];
    $cost=$_POST['cost'];
    $flag=$_POST['flag'];
    $Notes=$_POST['note'];
    $agency=$_POST['agency'];
    $location=$_POST['location'];
     echo "flag".$flag;
    
        if($flag=="edit"){
        $query1 = "UPDATE tbltraining SET Title='$title',Category='$category',Type='$type',Start_Effective='$start',End_Expiration='$end',Hours='$hours',Cost='$cost',Notes='$Notes',Agency='$agency',Location='$location' where Employee=$emp_id";
       
				$stmt1 = $conn->prepare($query1);
				
				if($stmt1->execute()){
                    echo "inserted".$flag;
                    header("location:edit_training.php?emp_id=$emp_id");
                }
                else{
                    echo "Not inserted".$flag;
                    header("location:edit_training.php?emp_id=$emp_id");
                }
            }
            elseif($flag=="add"){
                $query1 = "INSERT INTO tbltraining (Title,Category,Type,Start_Effective,End_Expiration,Hours,Cost,Notes,Agency,Location,Employee)
                
                 VALUES('$title','$category','$type','$start','$end','$hours','$cost','$Notes','$agency','$location','$emp_id')";
       
				$stmt1 = $conn->prepare($query1);
				
				if($stmt1->execute()){
                    echo "inserted".$flag;
                    header("location:edit_training.php?emp_id=$emp_id");
                }
                else{
                    echo "Not inserted".$flag;
                    header("location:edit_training.php?emp_id=$emp_id");
                }
            }     


        
    







?>
