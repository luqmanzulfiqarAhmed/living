<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    private $adminFirstName,$adminLastName ,$adminPassword,$adminCnic,$adminEmail,$adminPhoneNo,$admindateofBirth,$HousingSocietyID;    
    
    public function setFirstName($FirstName){
        $this->adminFirstName = $FirstName;
    }
    public function setLastName($LastName){
        $this->adminLastName = $LastName;
    }
    public function setPassword($Password){
        $this->adminPassword = $Password;
    }
    public function setCnic($Cnic){
        $this->adminCnic = $Cnic;
    }
    public function setEmail($Email){
        $this->adminEmail = $Email;
    }
    public function setPhoneNo($PhoneNo){
        $this->adminPhoneNo = $PhoneNo;
    }
    public function setdateofBirth($dateofBirth){
        $this->admindateofBirth = $dateofBirth;
    }
    public function setHousingSocietyID($HousingSocietyID){
        $this->$HousingSocietyID = $HousingSocietyID;
    }
    
    public function getFirstName(){
        return $this->adminFirstName;
    }
    public function getLastName(){
        return $this->adminLastName;
    }
    public function getPassword(){
        return $this->adminPassword;
    }
    public function getCnic(){
        return $this->adminCnic;
    }
    public function getEmail(){
        return $this->adminEmail;
    }
    public function getPhoneNo(){
        return $this->adminPhoneNo;
    }
    public function getdateofBirth(){
        return $this->admindateofBirth;
    }  
    public function getHousingSocietyID(){
        return $this->HousingSocietyID;
    } 
}
