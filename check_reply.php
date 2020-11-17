<?php
include_once 'config/database.php';
include_once "model/db.php";
if (isset($_GET['rp'])) {
$error_code = $_GET['rp'];
$ms=0;
$query = "SELECT * FROM tbl_alerts WHERE code = '$error_code'";
$stmt = $conn->prepare($query);
    $stmt->execute();
   


//if	($stmt->fetch(PDOStatement::rowCount()) > 0){
	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	 $ms = 1;
     $description = $result['description'];
    }



}

?>