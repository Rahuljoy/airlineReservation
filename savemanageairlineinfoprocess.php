<?php
require 'DBConnection/connection.php';
require 'Classes/ManageAirlineInfo.php';
session_start();

$name = $_POST['name'];
$address = $_POST['address'];
$contactNo = $_POST['contactNo'];
$serviceName = $_POST['serviceName'];
$email = $_POST['email'];

$manageairlineinfo = new ManageAirlineInfo($name, $address, $contactNo, $serviceName,$email);
var_dump($manageairlineinfo);
$companyId = null;
try{
    // $companyId = null;
    $manageairlineinfoCompanyName = $manageairlineinfo->getName();
    $manageairlineinfoCompanyAddress = $manageairlineinfo->getAddress();
    $manageairlineinfoCompanyContactNo = $manageairlineinfo->getContactNo();
    $manageairlineinfoCompanyServiceName = $manageairlineinfo->getServiceName();
    $manageairlineinfoCompanyEmail = $manageairlineinfo->getEmail();
    $stmtPI = $conn->prepare('insert into airline_comp (`Com_name`, `Com_cont`, `Email`, `Com_address`,  `Service_name`) values (:name, :contactNo, :email, :address, :serviceName);');
   // $stmtPI->bindParam(':companyId', $companyId);
   // $stmtPI->bindParam(':com_id', null);
    $stmtPI->bindParam(':name', $manageairlineinfoCompanyName );
     $stmtPI->bindParam(':contactNo', $manageairlineinfoCompanyContactNo);
     $stmtPI->bindParam(':email', $manageairlineinfoCompanyEmail);
    $stmtPI->bindParam(':address', $manageairlineinfoCompanyAddress);
    $stmtPI->bindParam(':serviceName', $manageairlineinfoCompanyServiceName);
   
    
    
   $airline_compInsert = $stmtPI->execute();
    
    //if($stmtPI->execute()){
      //  echo 'Inserted';
    //}
    
    
} catch(Exception $ex){
    echo $ex->getMessage();
}
