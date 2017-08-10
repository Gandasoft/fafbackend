<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 12:52 PM
 */
class UsertypeDTO{
    private $usertypeID;
    private $statustype;

    /**
     * @return mixed
     */
    public function getStatustype()
    {
        return $this->statustype;
    }

    /**
     * @return mixed
     */
    public function getUsertypeID()
    {
        return $this->usertypeID;
    }

    /**
     * @param mixed $statustype
     */
    public function setStatustype($statustype)
    {
        $this->statustype = $statustype;
    }

    /**
     * @param mixed $usertypeID
     */
    public function setUsertypeID($usertypeID)
    {
        $this->usertypeID = $usertypeID;
    }
}