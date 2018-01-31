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
class SeatSelection {
    //put your code here
    private $from;
    private $to;
    private $date;
    private $airline;
    private $time;
    private $seat;
    
    public function __construct($from, $to, $date, $airline, $time, $seat){
        $this->from = $from;
        $this->to = $to;
        $this->date = $date;
        $this->airline = $airline;
        $this->time = $time;
        $this->seat = $seat;
    }
    
    function getFrom() {
        return $this->from;
    }

    function getTo() {
        return $this->to;
    }

    function getDate() {
        return $this->date;
    }

    function getAirline() {
        return $this->airline;
    }

    function getTime() {
        return $this->time;
    }

    function getSeat() {
        return $this->seat;
    }

    function setFrom($from) {
        $this->from = $from;
    }

    function setTo($to) {
        $this->to = $to;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setAirline($airline) {
        $this->airline = $airline;
    }

    function setTime($time) {
        $this->time = $time;
    }

    function setSeat($seat) {
        $this->seat = $seat;
    }
}
