<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 12:11 PM
 */
class AddressDTO{
    private $id;
    private $street_name;
    private $Street_address;
    private $lat;
    private $Longtd;
    private $Surburb;
    private $flat_id;
    public function __construct(array $data){

       $this->street_name=$data['Street_name'];
       $this->Street_address=$data['Lat'];
       $this->lat=$data['Lat'];
       $this->Surburb=$data['SUrburb'];
       $this->flat_id=$data['flat_id'];

    }

    public function setFlatId($flat_id)
    {
        $this->flat_id = $flat_id;
    }


    public function setSurburb($Surburb)
    {
        $this->Surburb = $Surburb;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getFlatId()
    {
        return $this->flat_id;
    }


    public function setLat($lat)
    {
        $this->lat = $lat;
    }


    public function setLongtd($Longtd)
    {
        $this->Longtd = $Longtd;
    }


    public function setStreetName($street_name)
    {
        $this->street_name = $street_name;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function setStreetAddress($Street_address)
    {
        $this->Street_address = $Street_address;
    }


    public function getLat()
    {
        return $this->lat;
    }


    public function getLongtd()
    {
        return $this->Longtd;
    }


    public function getStreetAddress()
    {
        return $this->Street_address;
    }


    public function getStreetName()
    {
        return $this->street_name;
    }

    public function getSurburb()
    {
        return $this->Surburb;
    }
}
