<?php
	include_once 'config/database.php';
	include_once "model/db.php";

    $user_id=$_POST['user_id'];
    $old_pwd=$_POST['old_pwd'];
    $new_pwd=$_POST['new_pwd'];
    $db_pwd;
    $query = "SELECT password FROM admin WHERE id  = $user_id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
   
//if	($stmt->fetch(PDOStatement::rowCount()) > 0){
	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "inside while";
        $db_pwd=$result['password'];
        echo "pwd fromm db".$db_pwd;
        echo "old_pwd".$old_pwd;
        $updatedPwd1= password_hash($new_pwd, PASSWORD_BCRYPT);
        echo "updatedPwd1".$updatedPwd1;
        if (password_verify($old_pwd, $db_pwd)) {
            echo "pwd matched";
           $updatedPwd= password_hash($new_pwd, PASSWORD_BCRYPT);
           echo 'Password is valid!'.$updatedPwd;
            $query1 = "UPDATE admin SET password='$updatedPwd' where id=$user_id";
               
            $stmt1 = $conn->prepare($query1);
            
            if($stmt1->execute()){
                echo "inserted";
               header("location:myProfile.php?rp=1003");
            }
            else{
                echo "Not inserted";
               header("location:client_resetpwd.php?rp=1002");
            }
        
        } else {
            echo 'Invalid password.';
           header("location:client_resetpwd.php?rp=1002");

        }
        echo 'end of while';
    }
    echo 'after while';


        

?>
