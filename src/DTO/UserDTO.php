<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 12:11 PM
 */
class UserDTO{
    private $userID;
    private $Username;
    private $password;
    private $age;
    private $gender;
    private $usertype;
    private $phonenumber;

    function __construct(array $data)
    {
        $this->Username=$data['Username'];
        $this->password=$data['Password'];
        $this->age=$data['age'];
        $this->gender=$data['gender'];
        $this->usertype=$data['UserType'];
        $this->phonenumber=$data['phonenumber'];
    }

    public function setUsername($Username)
    {
        $this->Username = $Username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->Username;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function getAge()
    {
        return $this->age;
    }


    public function getGender()
    {
        return $this->gender;
    }


    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    public function getUserID()
    {
        return $this->userID;
    }


    public function getUsertype()
    {
        return $this->usertype;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }


    public function setGender($gender)
    {
        $this->gender = $gender;
    }


    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }


    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function setUsertype($usertype)
    {
        $this->usertype = $usertype;
    }
}