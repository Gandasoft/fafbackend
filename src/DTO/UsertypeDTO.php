<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 12:52 PM
 */
class UsertypeDTO{
    private $usertypeID;
    private $Usertype;

function __construct(array $data)

{
    $this->usertypeID=$data['id'];
    $this->Usertype=$data['Type'];
}


    public function getUsertypeID()
    {
        return $this->usertypeID;
    }


    public function getUsertype()
    {
        return $this->Usertype;
    }


    public function setUsertype($Usertype)
    {
        $this->Usertype = $Usertype;
    }

    public function setUsertypeID($usertypeID)
    {
        $this->usertypeID = $usertypeID;
    }
}