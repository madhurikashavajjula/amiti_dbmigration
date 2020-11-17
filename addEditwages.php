<?php
	include_once 'config/database.php';
    include_once "model/db.php";
    
$emp_id=$_POST['emp_id'];
$position=$_POST['position_wage'];
$note=$_POST['note'];  
$type=$_POST['WageType'];
$pay_rate=$_POST['pay_rate'];
$bill_rate=$_POST['bill_rate'];
$lca_amount=$_POST['lca_amount'];
$date=$_POST['date'];
$po_endDate=$_POST['po_endDate'];
$flag=$_POST['flag'];
echo "flag".$flag;
//echo "position".$position;
//echo "note".$note;
//echo "pay_rate".$pay_rate;
//echo "type".$type;
//echo "bill_rate".$bill_rate;
//echo "lca_amount".$lca_amount;
//echo "date".$date;
//echo "po_endDate".$po_endDate;

if($flag=="edit"){
    $query = "UPDATE  tblemployees set Date='$date',Position='$position',PO_EndDate='$po_endDate',Notes='$note',Rate='$pay_rate',
    Type='$type',Client_Rate='$bill_rate',LCA_Amount='$lca_amount' where Employee=$emp_id";
     $stmt1 = $conn->prepare($query);
     //Bind Parameters
     //$stmt1->bindParam(1, $file_name);
     if($stmt1->execute()){
         echo "inserted".$flag;
        //header("location:edit_wages.php?emp_id=$emp_id");
     }
     else{
         echo "Not inserted".$emp_id.$flag;
       // header("location:edit_wages.php?emp_id=$emp_id");
     }
}
elseif($flag=="add"){
    $query = "INSERT INTO tblemployees (Date,Position,PO_EndDate,Notes,Rate,Type,Client_Rate,LCA_Amount)
         VALUES('$date','$position','$po_endDate','$note','$pay_rate','$type','$bill_rate','$lca_amount')";
          $stmt1 = $conn->prepare($query);
          //Bind Parameters
          //$stmt1->bindParam(1, $file_name);
          if($stmt1->execute()){
              echo "inserted".$flag;
            // header("location:edit_wages.php?emp_id=$emp_id");
          }
          else{
              echo "Not inserted".$emp_id.$flag;
             //header("location:edit_wages.php?emp_id=$emp_id");
          }
}

      

           

?>
