<?php
	include_once 'config/database.php';
	include_once "model/db.php";
    $category=$_POST['category'];

if(isset($_POST['submit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($data = fgetcsv($csvFile)) !== FALSE){
                // Get row data
              
              
                $item1 = $data[0];
                $item2 = $data[1];
                $item3 = $data[2];
              
               if( $item1!="" && $item2!="" && $item3!=""){

                $query = "INSERT INTO medicine (name,combination,type,category)
                VALUES(' $item1','$item2','$item3','$category')";
                       $stmt1 = $conn->prepare($query);
                       //Bind Parameters
                       //$stmt1->bindParam(1, $file_name);
                       if($stmt1->execute()){
                           echo "inserted";
                           header("location:medicine_list_superadmin.php?rp=1003");
                       }
                       else{
                           echo "Not inserted";
                           header("location:medicine_list_superadmin.php?rp=1002");
                       }
            }
        }
            // Close opened CSV file
            fclose($csvFile);
            
            
        }else{
            echo "inside else 11111111 ";
        }
    }else{
        echo "inside else 22222222222";
    }
}

?>