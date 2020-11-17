<?php
	include_once 'config/database.php';
	include_once "model/db.php";




$benefit=$_POST['benefit'];




    
        $query = "INSERT INTO tblbenefits (Benefit)
         VALUES('$benefit')";
				$stmt1 = $conn->prepare($query);
				//Bind Parameters
				//$stmt1->bindParam(1, $file_name);
				if($stmt1->execute()){
                    echo "inserted";
                    header("location:benefits.php?rp=1003");
                }
                else{
                    echo "Not inserted";
                    header("location:addBenefits.php?rp=1002");
                }


        

        
    







?>
