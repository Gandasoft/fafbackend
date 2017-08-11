<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 12:12 PM
 */
class StatusDTO{
    private $statusID;
    private $statusType;
    function __construct(array $data)
    {
        $this->statusType=$data['status_id'];
    }

    public function getStatusID()
    {
        return $this->statusID;
    }


    public function getStatusType()
    {
        return $this->statusType;
    }


    public function setStatusID($statusID)
    {
        $this->statusID = $statusID;
    }


    public function setStatusType($statusType)
    {
        $this->statusType = $statusType;
    }
}