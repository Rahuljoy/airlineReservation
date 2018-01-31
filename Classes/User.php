<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Rahul
 */
class User {
    //put your code here
    private $name; 
    private $user_id;
    private $type;
    private $password;
    private $blocked;
    private $emp_id; 
    
    public function __construct($name,$user_id,$type,$password,$blocked,$emp_id) {
        $this->name = $name;
        $this->user_id = $user_id;
        $this->type = $type;
        $this->password = $password;
        $this->blocked = $blocked;
        $this->emp_id =$emp_id;
    }
    function getName (){
        return $this->name;
    }
    function getUser_id(){
        return$this->user_id;
    }
    function getType(){
        return $this->type;
    }
    function getPassword(){
        return $this->password;
    }
    function getBlocked(){
        return $this->blocked;
    }
    function getEmp_id(){
        return $this->emp_id;
    }
    
    function setName (){
        return $this->name;
    }
    function setUser_id(){
        return$this->user_id;
    }
    function setType(){
        return $this->type;
    }
    function setPassword(){
        return $this->password;
    }
    function setBlocked(){
        return $this->blocked;
    }
    function setEmp_id(){
        return $this->emp_id;
    }
}
