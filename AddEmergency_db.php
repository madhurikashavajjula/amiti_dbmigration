<?php
	include_once 'config/database.php';
    include_once "model/db.php";
    
$emp_id=$_POST['emp_id'];
$p_name=$_POST['p_name'];
$p_relationship=$_POST['p_relationship'];  
$p_address=$_POST['p_address'];
$p_city=$_POST['p_city'];
$p_state=$_POST['p_state'];
$p_zipcode=$_POST['p_zipcode'];
$p_home_ph=$_POST['p_home_ph'];
$p_wrk_phone=$_POST['p_wrk_phone'];
$p_mbl_phone=$_POST['p_mbl_phone'];
$s_name=$_POST['s_name'];
$s_relationship=$_POST['s_relationship'];
$s_address=$_POST['s_address'];
$s_city=$_POST['s_city'];
$s_state=$_POST['s_state'];
$s_zipcode=$_POST['s_zipcode'];
$s_home_ph=$_POST['s_home_ph'];
$s_wrk_phone=$_POST['s_wrk_phone'];
$s_mbl_phone=$_POST['s_mbl_phone'];
$physician_name=$_POST['physician_name'];
$physician_number=$_POST['physician_number'];
$physician_notes=$_POST['physician_notes'];


        $query = "UPDATE  tblemployees set Primary_ContactName='$p_name',Primary_Address1='$p_address',Primary_City='$p_city',Primary_State='$p_state',Primary_Zip='$p_zipcode',Primary_HomePhone='$p_home_ph',Primary_WorkPhone='$p_wrk_phone',Primary_CellPhone='$p_mbl_phone',
         Secondary_ContactName='$s_name',Secondary_Address1='$s_address',Secondary_City='$s_city',Secondary_State='$s_state',Secondary_Zip='$s_zipcode',Secondary_HomePhone='$s_home_ph',Secondary_WorkPhone='$s_wrk_phone',Secondary_CellPhone='$s_mbl_phone',
         Physician_Name='$physician_name',Phone='$physician_number',SpecialNotes='$physician_notes' where EmployeeID=$emp_id";

            $stmt1 = $conn->prepare($query);
				//Bind Parameters
				//$stmt1->bindParam(1, $file_name);
				if($stmt1->execute()){
                    echo "inserted";
                    header("location:addEmergency.php?emp_id=$emp_id");
                }
                else{
                   // echo "Not inserted".$emp_id;
                    header("location:emergency.php");
                }

?>
