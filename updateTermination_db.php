<?php
	include_once 'config/database.php';
	include_once "model/db.php";


    $date=$_POST['date'];
    $emp_id=$_POST['emp_id'];
    $hire=$_POST['hire'];  
    $reason=$_POST['reason'];
    $comments=$_POST['comments'];
    $enroll_date=$_POST['enroll_date'];
    $Declined_date=$_POST['Declined_date'];
    $pay_amount=$_POST['pay_amount'];
    $end_date=$_POST['end_date'];
    $notes=$_POST['notes'];
   
    echo "hire".$hire;

        $query1 = "UPDATE tblemployees SET Termination_Date='$date',Rehire='$hire',Reason='$reason',Comments='$comments',Enrollment_Date='$enroll_date',
        Decliend_Date='$Declined_date',Termination_EndDate='$end_date',Payment_Amout='$pay_amount', Termiation_Notes='$notes' where EmployeeID=$emp_id";
       
				$stmt1 = $conn->prepare($query1);
				
				if($stmt1->execute()){
                    echo "inserted";
                    header("location:add_termination.php?emp_id=$emp_id");
                }
                else{
                    echo "Not inserted";
                    header("location:add_termination.php?emp_id=$emp_id");
                }


?>
