<?php

require 'DBConnection/connection.php';
require 'Classes/User.php';
session_start();

$name = "";
$user_id = (int)$_POST['user_id'];
$type = $_POST['type'];
$password = $_POST['password'];
$blocked = "";
$emp_id = "";

$user = new user($name,$user_id,$type,$password,$blocked,$emp_id);
$user_id = null;

try {
    
    $userName = $user->getName();
    $user_id = $user->getUser_id();
    $userType = $user->getType();
    $userPassword = $user->getPassword();
    $userBlocked = $user->getBlocked();
    $userEmp_id = $user->getEmp_id();
    
    
    $stmtUI = $conn->prepare('select * from db_user;');
    
    $read = $stmtUI->execute();
    $users = $stmtUI->fetchAll(PDO::FETCH_ASSOC);
     
} catch (Exception $ex) {
    echo $ex->getMessage();
    
}

foreach ($users as $user) {
    $user_id_g = $user ['User_id'];
    $userPassword_g = $user ['PASSWORD'];
    $userType_g = $user ['Type'];
    
    if ($user_id == $user_id_g && $userPassword == $userPassword_g ){
        
       // echo 'user id and password matched<br/>';
        if($userType==$userType_g){
           // echo 'user type matched<br/>';
            if($userType=='admin'){
              //  echo 'user type admin<br/>';
                header('location: admin.php');
            }
            else if ($userType=='super_admin'){
               // echo 'user type super admin<br/>';
                header('location: superadmin.php');
            }
        }
        else {
            header('location: userlogin.php');
        }
    } else {
        header('location: userlogin.php');
    }    
}
