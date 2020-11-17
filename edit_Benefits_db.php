<?php
	include_once 'config/database.php';
	include_once "model/db.php";


    $benefits=$_POST['benefits'];
    $emp_id=$_POST['emp_id'];
    $enroll_date=$_POST['enroll_date'];  
    $Withdrawal_Date=$_POST['withdraw_date'];
    $Employee_Contribution_1=$_POST['Employee_Contribution_1'];
    $Employee_Contribution_2=$_POST['Employee_Contribution_2'];
    $dependents=$_POST['dependents'];
    $note=$_POST['note'];
    $flag=$_POST['flag'];
     echo "flag".$flag;
    
        if($flag=="edit"){
        $query1 = "UPDATE tblbenefitslist SET Benefit='$benefits',Enrollment_Date='$enroll_date',Withdrawal_Date='$Withdrawal_Date',Employee_Contribution_1='$Employee_Contribution_1',Employee_Contribution_2='$Employee_Contribution_2',Dependents='$dependents',Note='$note' where Employee=$emp_id";
       
				$stmt1 = $conn->prepare($query1);
				
				if($stmt1->execute()){
                    echo "inserted".$flag;
                    header("location:edit_benefits.php?emp_id=$emp_id");
                }
                else{
                    echo "Not inserted".$flag;
                    header("location:edit_benefits.php?emp_id=$emp_id");
                }
            }
            elseif($flag=="add"){
                $query1 = "INSERT INTO tblbenefitslist (Benefit,Enrollment_Date,Withdrawal_Date,Employee_Contribution_1,Employee_Contribution_2,Dependents,Note,Employee)
                
                 VALUES('$benefits','$enroll_date','$Withdrawal_Date','$Employee_Contribution_1','$Employee_Contribution_2','$dependents','$note','$emp_id')";
       
				$stmt1 = $conn->prepare($query1);
				
				if($stmt1->execute()){
                    echo "inserted".$flag;
                    header("location:edit_benefits.php?emp_id=$emp_id");
                }
                else{
                    echo "Not inserted".$flag;
                   header("location:edit_benefits.php?emp_id=$emp_id");
                }
            }     


        
    







?>
