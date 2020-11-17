<?php
	include_once 'config/database.php';
	include_once "model/db.php";


$user_id=$_POST['user_id'];
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



    
        $query1 = "UPDATE admin SET name='$name' ,mobile='$mobile' ,email='$email' ,qualification='$qualification' ,designation='$designation' ,building='$building' ,street='$street', area='$area',
        city='$city',pin='$pin',state='$state',category='$category' where id=$user_id";
       
				$stmt1 = $conn->prepare($query1);
				
				if($stmt1->execute()){
                    echo "inserted";
                    header("location:client_list.php?rp=1003");
                }
                else{
                    echo "Not inserted";
                    header("location:client_list.php?rp=1002");
                }


        
    







?>
