<?php
require 'DBConnection/connection.php';
require 'Classes/SeatSelection.php';
session_start();

$getFrom = $_POST['from'];
$fromSplit = explode(" ", $getFrom);
$from = $fromSplit[sizeof($fromSplit) - 1];
$getTo = $_POST['to'];
$toSplit = explode(" ", $getTo);
$to = $toSplit[sizeof($toSplit) - 1];
$date = $_POST['date'];
$airline = $_POST['airline'];
$time = $_POST['time'];
$seat = $_POST['seat'];

$seatSelection = new SeatSelection($from, $to, $date, $airline, $time, $seat);

try {
    $resFrom = $seatSelection->getFrom();
    $resTo = $seatSelection->getTo();
    $resTime = $seatSelection->getTime();
    $resDate = $seatSelection->getDate();
    
    $stmt = $conn->prepare('select * from flight where `From`=:from and `To`=:to and `DEPART_TIME`=:departTime and `DOJ`=:doj;');
    $stmt->bindParam(':from', $resFrom);
    $stmt->bindParam(':to', $resTo);
    $stmt->bindParam(':departTime', $resTime);
    $stmt->bindParam(':doj', $resDate);
    
    $read = $stmt->execute();
    $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $resAirline = $seatSelection->getAirline();
    
    $stmtAC = $conn->prepare('select * from airline_comp where `Service_name`=:service;');
    $stmtAC->bindParam(':service', $resAirline);
    $readAC = $stmtAC->execute();
    
    $airlines = $stmtAC->fetchAll(PDO::FETCH_ASSOC);
    
    $airlineCompId = $airlines[0]['Com_id'];
    $flightNo = null;
    
    foreach ($flights as $flight){
        $companyId = $flight['Com_id'];
        if($companyId == $airlineCompId){
            $flightNo = $flight['FLIGHT_NO'];
        }
    }
    
    $_SESSION['flightNo'] = $flightNo;
    $_SESSION['seatSelection'] = $seatSelection;
//    print_r($_SESSION['flightNo']);
//    echo '<br/>';
//    print_r($_SESSION['seatSelection']);
} catch (Exception $ex) {
    echo $ex->getMessage();
}


header('location: passenger.php');

