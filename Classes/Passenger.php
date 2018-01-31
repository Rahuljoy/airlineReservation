<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Passenger
 *
 * @author Rahul
 */
class Passenger {
    private $name;
    private $address;
    private $email;
    private $contactNo;
    private $passportNo;
    
    public function __construct($name, $address, $email, $contactNo, $passportNo) {
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
        $this->contactNo = $contactNo;
        $this->passportNo = $passportNo;
    }
    function getName() {
        return $this->name;
    }

    function getAddress() {
        return $this->address;
    }

    function getEmail() {
        return $this->email;
    }

    function getContactNo() {
        return $this->contactNo;
    }

    function getPassportNo() {
        return $this->passportNo;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setContactNo($contactNo) {
        $this->contactNo = $contactNo;
    }

    function setPassportNo($passportNo) {
        $this->passportNo = $passportNo;
    }
}
