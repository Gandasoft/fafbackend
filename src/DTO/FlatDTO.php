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

    function __construct(array $data){
        $this->flatName=$data['flat_name'];
        $this->roomNUmber=$data['room_number'];
    }

    public function getFlatID()
    {
        return $this->flatID;
    }


    public function getFlatName()
    {
        return $this->flatName;
    }


    public function getRoomNUmber()
    {
        return $this->roomNUmber;
    }


    public function setFlatID($flatID)
    {
        $this->flatID = $flatID;
    }


    public function setFlatName($flatName)
    {
        $this->flatName = $flatName;
    }


    public function setRoomNUmber($roomNUmber)
    {
        $this->roomNUmber = $roomNUmber;
    }
}