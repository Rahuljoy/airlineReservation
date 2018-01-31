<?php
require 'DBConnection/connection.php';
require 'Classes/Reservation.php';
require 'Classes/Passenger.php';
require 'Classes/SeatSelection.php';
session_start();

$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$contactNo = $_POST['contactNo'];
$passportNo = $_POST['passportNo'];

$passenger = new Passenger($name, $address, $email, $contactNo, $passportNo);
var_dump($passenger);
$passengerId = null;
try{
   // $passengerId = null;
    $passengerName = $passenger->getName();
    $passengerPassportNo = $passenger->getPassportNo();
    $passengerAddress = $passenger->getAddress();
    $passengerContactNo = $passenger->getContactNo();
    $passengerEmail = $passenger->getEmail();
    $stmtPI = $conn->prepare('insert into passenger (`passenger_name`, `passport_no`, `Address`, `contact_no`, `email`) values (:name, :passportNo, :address, :contactNo, :email);');
   // $stmtPI->bindParam(':passengerId', $passengerId);
    $stmtPI->bindParam(':name', $passengerName);
    $stmtPI->bindParam(':passportNo', $passengerPassportNo);
    $stmtPI->bindParam(':address', $passengerAddress);
    $stmtPI->bindParam(':contactNo', $passengerContactNo);
    $stmtPI->bindParam(':email', $passengerEmail);
    echo '<pre>';
    echo $passengerName.'<br/>';
    echo $passengerPassportNo.'<br/>';
    echo $passengerAddress.'<br/>';
    echo $passengerContactNo.'<br/>';
    echo $passengerEmail.'<br/>';
    echo '</pre>';
    
    $passengerInsert = $stmtPI->execute();
    
    $stmtPR = $conn->prepare('select * from passenger where `passport_no`=:passport_no;');
    $stmtPR->bindParam(':passport_no', $passengerPassportNo);
    $passengerRead = $stmtPR->execute();
    $passengers = $stmtPR->fetchAll(PDO::FETCH_ASSOC);
    
    var_dump($passengers);
    
    $passengerId = $passengers[0]['passenger_id'];
}catch(Exception $ex){
    echo $ex->getMessage();
}

var_dump($_SESSION['seatSelection']);
$seatSelection = $_SESSION['seatSelection'];
var_dump($seatSelection);
$flightNo = $_SESSION['flightNo'];

//unset($_SESSION['seatSelection']);
//unset($_SESSION['flightNo']);

$seats = $seatSelection->getSeat();
$splitSeats = explode(",", $seats);
$noOfSeats = sizeof($splitSeats);

$reservation = new Reservation($noOfSeats, $seats, $passengerId, $flightNo);

try{
    $resPassenger = $reservation->getPassengerId();
    $resFlight = $reservation->getFlightNo();
    $stmtRI = $conn->prepare('insert into reservation (`NO_OF_TKT`, `SEAT`, `passenger_id`, `FLIGHT_NO`) values(:noOfTkt, :seat, :passengerId, :flightNo);');
    //$stmtRI->bindParam(':reservationId', null);
    $stmtRI->bindParam(':noOfTkt', $noOfSeats);
    $stmtRI->bindParam(':seat', $seats);
    $stmtRI->bindParam(':passengerId', $resPassenger);
    $stmtRI->bindParam(':flightNo', $resFlight);
    
    $stmtRI->execute();
    
    $stmtRR = $conn->prepare('select * from reservation where `SEAT`=:seat and `FLIGHT_NO`=:flightNo;');
    $stmtRR->bindParam(':seat', $seats);
    $stmtRR->bindParam(':flightNo', $flightNo);
    
    $reservationRead = $stmtRR->execute();
    $reservations = $stmtRR->fetchAll(PDO::FETCH_ASSOC);
    
    $reservationId = $reservations[0]['RESERV_ID'];
    
    $_SESSION['reservationId'] = $reservationId;
} catch (Exception $ex) {
    echo $ex->getMessage();
}

header('location: reservationConfirmation.php');