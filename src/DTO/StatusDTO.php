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

    /**
     * @return mixed
     */
    public function getStatusID()
    {
        return $this->statusID;
    }

    /**
     * @return mixed
     */
    public function getStatusType()
    {
        return $this->statusType;
    }

    /**
     * @param mixed $statusID
     */
    public function setStatusID($statusID)
    {
        $this->statusID = $statusID;
    }

    /**
     * @param mixed $statusType
     */
    public function setStatusType($statusType)
    {
        $this->statusType = $statusType;
    }
}