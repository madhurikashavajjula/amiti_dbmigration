<?php
	include_once 'config/database.php';
	include_once "model/db.php";


    $first_name=$_POST['first_name'];
    $emp_id=$_POST['emp_id'];
    $mi=$_POST['mi'];  
    $last_name=$_POST['last_name'];
    $dob=$_POST['dob'];
    $ssn=$_POST['ssn'];
    $address=$_POST['address'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $home_phone=$_POST['home_phone'];
    $mobile_phone=$_POST['mobile_phone'];
    $email=$_POST['email'];
    $status=$_POSt['status'];
    $hire_date=$_POST['hire_date'];
    $immigration_status=$_POST['immigration_status'];
    $current_receipt_num=$_POST['current_receipt_num'];
    $inprocess_receipt_num=$_POST['inprocess_receipt_num'];
    $renewal_date=$_POST['renewal_date'];
    $immi_date=$_POST['immi_date'];
    $notes=$_POST['notes'];
    $client_name=$_POST['client_name'];
    $client_address=$_POST['client_address'];
    $client_supervisor=$_POST['client_supervisor'];
    $client_supervisor_phone=$_POST['client_supervisor_phone'];
    $client_supervisor_email=$_POST['client_supervisor_email'];
    $vendor_name=$_POST['vendor_name'];
    $vendor_address=$_POST['vendor_address'];
    $vendor_supervisor=$_POST['vendor_supervisor'];
    $vendor_supervisor_phone=$_POST['vendor_supervisor_phone'];
    $vendor_supervisor_email=$_POST['vendor_supervisor_email'];
    $job_title=$_POST['job_title'];
    $soc_code=$_POST['soc_code'];
    $h1b_attorney=$_POST['h1b_attorney'];
    $gc_attorney=$_POST['gc_attorney'];
    $gc_status=$_POST['gc_status'];
    $manager_name=$_POST['manager_name'];
    $w4_status=$_POST['w4_status'];
    $exemption=$_POST['exemption'];
    $gender=$_POST['gender'];
    $eeo_code=$_POST['eeo_code'];
    $eeo_category=$_POST['eeo_category'];
    $department=$_POST['department'];
    
    $filename = $_FILES['image']['name'];
    $new_filename="";
    if(!empty($filename)){
        // echo "inside if";
         $ext = pathinfo($filename, PATHINFO_EXTENSION);
         $new_filename = $first_name.$last_name.'_'.time().'.'.$ext;
         move_uploaded_file($_FILES['image']['tmp_name'], 'EmployeePicture/'.$new_filename);	
     }

        $query1 = "UPDATE tblemployees SET First_Name='$first_name',MI='$mi',Last_Name='$last_name',Birthdate='$dob',SSN='$ssn',Address1='$address',City='$city',State='$state',Zip='$zipcode',Country='$country',
        Cell_Phone='$mobile_phone',Home_phone='$home_phone',Email='$email',Status='$status',Hire_Date='$hire_date',I9_Renewal_Date='$renewal_date',Immigration_Status='$immigration_status',Current_Receipt_No='$current_receipt_num',In_Process_Receipt_No='$inprocess_receipt_num',
        H1_OPT_CPT_EAC_Expiry_Date='$immi_date',H1B_Attorney='$h1b_attorney',GC_Status='$gc_status',GC_Attorney='$gc_attorney',
        Client_Name='$client_name',Client_Address='$client_address',Vendor_Name='$vendor_name',Job_Title='$job_title',Client_Supervisor='$client_supervisor',Client_Supervisor_Phone='$client_supervisor_phone',Client_Supervisor_Email='$client_supervisor_email',Manager='$manager_name',
        W4_Status='$w4_status',Exemptions='$exemption',Gender='$gender',EEO_Code=
        '$eeo_code',EEO_category='$eeo_category',Notes='$notes',Dept_Id='$department',Employee_Photo='$new_filename',Vendor_ContactName='$vendor_name',Vendor_ContactPhone='$vendor_supervisor_phone',Vendor_ContactEmail='$vendor_supervisor_email',Vendor_Address='$vendor_address' where EmployeeID=$emp_id";
       
				$stmt1 = $conn->prepare($query1);
				
				if($stmt1->execute()){
                    echo "inserted";
                    header("location:editEmployee.php?emp_id=$emp_id");
                }
                else{
                    echo "Not inserted";
                    header("location:editEmployee.php?emp_id=$emp_id");
                }


        
    







?>
