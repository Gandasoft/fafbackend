<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 12:11 PM
 */
class AdminDTO{
    private $adminID;
    private $Username;
    private $password;
   function __construct(array $data)
   {
       $this->Username=$data['Username'];
       $this->password=$data['Password'];
   }

    public function getAdminID()
    {
        return $this->adminID;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function getUsername()
    {
        return $this->Username;
    }


    public function setAdminID($adminID)
    {
        $this->adminID = $adminID;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function setUsername($Username)
    {
        $this->Username = $Username;
    }
}