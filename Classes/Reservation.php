<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reservation
 *
 * @author Rahul
 */
class Reservation {
    private $noOfTkts;
    private $seat;
    private $passengerId;
    private $flightNo;
    
    public function __construct($noOfTkts, $seat, $passengerId, $flightNo) {
        $this->noOfTkts = $noOfTkts;
        $this->seat = $seat;
        $this->passengerId = $passengerId;
        $this->flightNo = $flightNo;
    }
    function getNoOfTkts() {
        return $this->noOfTkts;
    }

    function getSeat() {
        return $this->seat;
    }

    function getPassengerId() {
        return $this->passengerId;
    }

    function getFlightNo() {
        return $this->flightNo;
    }

    function setNoOfTkts($noOfTkts) {
        $this->noOfTkts = $noOfTkts;
    }

    function setSeat($seat) {
        $this->seat = $seat;
    }

    function setPassengerId($passengerId) {
        $this->passengerId = $passengerId;
    }

    function setFlightNo($flightNo) {
        $this->flightNo = $flightNo;
    }
}
