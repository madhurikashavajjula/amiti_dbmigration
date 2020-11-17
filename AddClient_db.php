<?php
	include_once 'config/database.php';
	include_once "model/db.php";



$name=$_POST['name'];
$mobile=$_POST['mobile'];  
$email=$_POST['email'];
$qualification=$_POST['qualification'];
$designation=$_POST['designation'];
$building=$_POST['building'];
$street=$_POST['street'];
$area=$_POST['area'];
$city=$_POST['city'];
$pin=$_POST['pin'];
$state=$_POST['state'];
$category=$_POST['category'];


    
        $query = "INSERT INTO admin (name,mobile,email,qualification,designation,building,street,area,city,pin,state,category)
         VALUES('$name','$mobile','$email','$qualification','$designation','$building','$street','$area','$city','$pin','$state','$category')";
				$stmt1 = $conn->prepare($query);
				//Bind Parameters
				//$stmt1->bindParam(1, $file_name);
				if($stmt1->execute()){
                    echo "inserted";
                    header("location:client_list.php?rp=1003");
                }
                else{
                    echo "Not inserted";
                    header("location:client_list.php?rp=1002");
                }


        

        
    







?>
