<?php
	include_once 'config/database.php';
	include_once "model/db.php";



$Wage_Type=$_POST['wageType'];



    
        $query = "INSERT INTO tblwagetype (Wage_Type)
         VALUES('$Wage_Type')";
				$stmt1 = $conn->prepare($query);
				//Bind Parameters
				//$stmt1->bindParam(1, $file_name);
				if($stmt1->execute()){
                    echo "inserted";
                    header("location:Wages.php?rp=1003");
                }
                else{
                    echo "Not inserted";
                    header("location:Wages.php?rp=1002");
                }


        

        
    







?>
