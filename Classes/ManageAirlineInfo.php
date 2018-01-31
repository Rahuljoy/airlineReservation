<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManageAirlineInfo
 *
 * @author Rahul
 */
class ManageAirlineInfo {
    //put your code here
     private $name;
     private $address;
     private $contactNo;
     private $email;
     public function __construct($name,$address,$contactNo,$serviceName,$email) {
         $this->name = $name;
         $this->address =$address;
         $this->contactNo =$contactNo;
         $this->serviceName =$serviceName;
         $this->email = $email;
     }
     function getName(){
         return $this->name;
     }
     function getAddress(){
         return $this->address;
     }
     function getContactNo(){
         return $this->contactNo;
     }
     function getServiceName(){
         return $this->serviceName;
     }
     
     function getEmail(){
         return $this->email;
     }
     
     function setName(){
         return $this->name;
     }
     function setAdress(){
         return $this->address;
     }
     function setContactNo(){
         return $this->contactNo;
     }
     function setServiceName(){
         return $this->serviceName;
     }
     
     function setEmail(){
         return $this->email;
     }
     
}
