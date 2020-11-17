<?php
	include_once 'config/database.php';
	include_once "model/db.php";

    $date=$_POST['date'];
    $memo=$_POST['memo'];

if($_POST['emp_id']!=""){
    $emp_id=$_POST['emp_id'];
    $query = "INSERT INTO tblreminders (ReminderText,Date,Employee)
    VALUES('$memo','$date','$emp_id')";
           $stmt1 = $conn->prepare($query);
           //Bind Parameters
           //$stmt1->bindParam(1, $file_name);
           if($stmt1->execute()){
               echo "inserted";
               header("location:reminders.php?rp=1003");
           }
           else{
               echo "Not inserted";
               header("location:reminders.php?rp=1002");
           }
}
else{
    $query = "select * from tblemployees";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$i = 1;
	while($result = $stmt->fetch(PDO::FETCH_ASSOC))
	{
        $emp_id=$result['EmployeeID'];
        $query = "INSERT INTO tblreminders (ReminderText,Date,Employee)
        VALUES('$memo','$date','$emp_id')";
               $stmt1 = $conn->prepare($query);
               //Bind Parameters
               //$stmt1->bindParam(1, $file_name);
               if($stmt1->execute()){
                   echo "inserted";
                   header("location:reminders.php?rp=1003");
               }
               else{
                   echo "Not inserted";
                   header("location:reminders.php?rp=1002");
               }

    }
}





    
       


        

        
    







?>
