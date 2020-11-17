<?php
// 'user' object
class User{
 
    // database connection and table name
    private $conn;
  
 
    // object properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 

    function login(){
        $query = "SELECT * FROM  admin WHERE email = ?  LIMIT 0,1";
$stmt = $this->conn->prepare( $query );
 $this->email=htmlspecialchars(strip_tags($this->email));
    $stmt->bindParam(1, $this->email);
   $stmt->execute();
   $num = $stmt->rowCount(); 
   if($num>0){

        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // assign values to object properties
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->password = $row['password'];
        $this->mobile = $row['mobile'];
        $this->email = $row['email'];
        $this->type = $row['type'];
        $this->category = $row['category'];
       // $this->status = $row['status'];
     return $row;
    }
        // return false if email does not exist in the database
    return false;
    }



// create new user record
function createAdmin(){
  
    $queryIns = "INSERT INTO admin
            SET id = :id, name = :name, email = :email,type = :type
                password = :password, mobile = :mobile, landline = :landline";
 
    $stmt1 = $this->conn->prepare($queryIns);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->mobile=htmlspecialchars(strip_tags($this->mobile));
    $this->landline=htmlspecialchars(strip_tags($this->landline));
    $this->type=htmlspecialchars(strip_tags($this->type));
 
    
    // bind the values
    
    $stmt1->bindParam(':name', $this->name);
    $stmt1->bindParam(':email', $this->email);
    $stmt1->bindParam(':mobile', $this->mobile);
    $stmt1->bindParam(':landline', $this->landline);
    $stmt1->bindParam(':type', $this->type);

    // hash the password before saving to database
    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    $stmt1->bindParam(':password', $password_hash);
 
    // execute the query, also check if query was successful
    if($stmt1->execute()){
        return true;
    }
 
    return false;
}
 

function createPatient(){
    $queryIns = "INSERT INTO patient
            SET name = :name, mobile = :mobile, age = :age, sex = :sex,
                weight = :wieght, height = :height, temp = :temp";
 
    $stmt1 = $this->conn->prepare($queryIns);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->mobile=htmlspecialchars(strip_tags($this->mobile));
    $this->age=htmlspecialchars(strip_tags($this->age));
    $this->sex=htmlspecialchars(strip_tags($this->sex));
    $this->weight=htmlspecialchars(strip_tags($this->weight));
    $this->height=htmlspecialchars(strip_tags($this->height));
    $this->temp=htmlspecialchars(strip_tags($this->temp));
    // bind the values
    $stmt1->bindParam(':name', $this->name);
    $stmt1->bindParam(':mobile', $this->mobile);
    $stmt1->bindParam(':age', $this->age);
    $stmt1->bindParam(':sex', $this->sex);
    $stmt1->bindParam(':weight', $this->weight);
    $stmt1->bindParam(':height', $this->height);
    $stmt1->bindParam(':temp', $this->temp);

    // execute the query, also check if query was successful
    if($stmt1->execute()){
        return true;
    }
 
    return false;
}



function addMedicine(){
  
    $queryIns = "INSERT INTO medicine
            SET name = :name, combination = :combination, type = :type";
 
    $stmt1 = $this->conn->prepare($queryIns);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->combination=htmlspecialchars(strip_tags($this->combination));
    $this->type=htmlspecialchars(strip_tags($this->type));
    
    // bind the values
    $stmt1->bindParam(':name', $this->name);
    $stmt1->bindParam(':combination', $this->combination);
    $stmt1->bindParam(':type', $this->type);
    
    // execute the query, also check if query was successful
    if($stmt1->execute()){
        return true;
    }
 
    return false;
}


function updateAddrs(){
    
    $queryIns = "UPDATE admin SET
        building = :building,
        street = :street,
        area = :area,
        city = :city,
        pin = :pin,
        state = :state
    WHERE id = :id";
 
    $stmt1 = $this->conn->prepare($queryIns);
 
    // sanitize
    $this->building=htmlspecialchars(strip_tags($this->building));
    $this->street=htmlspecialchars(strip_tags($this->street));
    $this->area=htmlspecialchars(strip_tags($this->area));
    $this->city=htmlspecialchars(strip_tags($this->city));
    $this->pin=htmlspecialchars(strip_tags($this->pin));
    $this->state=htmlspecialchars(strip_tags($this->state));
   
    // bind the values
    $stmt1->bindParam(':building', $this->building);
    $stmt1->bindParam(':street', $this->street);
    $stmt1->bindParam(':area', $this->area);
    $stmt1->bindParam(':city', $this->city);
    $stmt1->bindParam(':pin', $this->pin);
    $stmt1->bindParam(':state', $this->state);
    
    // execute the query, also check if query was successful
    if($stmt1->execute()){
        return true;
    }
 
    return false;
}

// emailExists() method will be here
// check if given email exist in the database
function noupdatePassword(){
 
    // query to check if email exists
    $query = "SELECT id, firstname, lastname, password
            FROM " . $this->table_name . "
            WHERE email = ?
            LIMIT 0,1";+
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
 
    // sanitize
    $this->email=htmlspecialchars(strip_tags($this->email));
 
    // bind given email value
    $stmt->bindParam(1, $this->email);
 
    // execute the query
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    // if email exists, assign values to object properties for easy access and use for php sessions
    if($num>0){
 
        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // assign values to object properties
        $this->id = $row['id'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->password = $row['password'];
 
        // return true because email exists in the database
        return true;
    }
 
    // return false if email does not exist in the database
    return false;
}
 
public function updatePassword(){
 
    // if password needs to be updated
    $password_set=!empty($this->password) ? " password = :password" : "";
 
    // if no posted password, do not update the password
    $query = "UPDATE admin
            SET {$password_set}
            WHERE id = :id";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // hash the password before saving to database
    if(!empty($this->password)){
        $this->password=htmlspecialchars(strip_tags($this->password));
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);
    }
     // unique ID of record to be edited
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
}
?>