<?php
	include_once 'config/database.php';
	include_once "model/db.php";



$first_name=$_POST['first_name'];
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



    
        $query = "INSERT INTO tblemployees (First_Name,MI,Last_Name,Birthdate,SSN,Address1,City,State,Zip,Country,
        Cell_Phone,Home_phone,Email,Status,Hire_Date,I9_Renewal_Date,Immigration_Status,Current_Receipt_No,
        In_Process_Receipt_No,H1_OPT_CPT_EAC_Expiry_Date,H1B_Attorney,GC_Status,GC_Attorney,Client_Name,
        Client_Address,Vendor_Name,Job_Title,Client_Supervisor,Client_Supervisor_Phone,Client_Supervisor_Email,Manager,
        W4_Status,Exemptions,Gender,EEO_Code,EEO_category,Notes,Dept_Id,Employee_Photo,Vendor_ContactName,Vendor_ContactPhone,
        Vendor_ContactEmail,Vendor_Address)
         VALUES('$first_name','$mi','$last_name','$dob','$ssn','$address','$city','$state','$zipcode','$country',
         '$mobile_phone','$home_phone','$email','$status','$hire_date','$renewal_date','$immigration_status','$current_receipt_num','$inprocess_receipt_num','$immi_date','$h1b_attorney','$gc_status','$gc_attorney',
         '$client_name','$client_address','$vendor_name','$job_title','$client_supervisor','$client_supervisor_phone','$client_supervisor_email','$manager_name',
         '$w4_status','$exemption','$gender','$eeo_code','$eeo_category','$notes','$department','$new_filename','$vendor_name','$vendor_supervisor_phone','$vendor_supervisor_email','$vendor_address')";
				$stmt1 = $conn->prepare($query);
				//Bind Parameters
				//$stmt1->bindParam(1, $file_name);
				if($stmt1->execute()){
                    echo "inserted";
                    header("location:general.php?rp=1003");
                }
                else{
                    echo "Not inserted";
                    header("location:addEmployee.php?rp=1002");
                }


        

        
    







?>
