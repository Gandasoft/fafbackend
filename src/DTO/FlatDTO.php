<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 12:10 PM
 */
class FlatDTO{
    private $flatID;
    private $flatName;
    private $roomNUmber;

    /**
     * @return mixed
     */
    public function getFlatID()
    {
        return $this->flatID;
    }

    /**
     * @return mixed
     */
    public function getFlatName()
    {
        return $this->flatName;
    }

    /**
     * @return mixed
     */
    public function getRoomNUmber()
    {
        return $this->roomNUmber;
    }

    /**
     * @param mixed $flatID
     */
    public function setFlatID($flatID)
    {
        $this->flatID = $flatID;
    }

    /**
     * @param mixed $flatName
     */
    public function setFlatName($flatName)
    {
        $this->flatName = $flatName;
    }

    /**
     * @param mixed $roomNUmber
     */
    public function setRoomNUmber($roomNUmber)
    {
        $this->roomNUmber = $roomNUmber;
    }
}