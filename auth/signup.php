<?php

include '../connect.php';

$table = 'users';

$username =  filterRequest("username");
$email = filterRequest("email");
$phone =  filterRequest("phone");
$password=sha1("password");
$verifycode="0";


$stmt = $con->prepare("SELECT * FROM users WHERE user_email = ? OR user_phone = ?");

$stmt->execute(array($email,$phone));
$count = $stmt->rowCount();
if($count > 0){
    printFaliure();

}
else {
    $data = array("user_name"=>$username,
    "user_email"=>$email,
    "user_phone"=>$phone,
    "user_password"=>$password,

    "user_verify_code"=>"0",
     );
     insertData($table,$data);
}
