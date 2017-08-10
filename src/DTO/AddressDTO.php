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

    /**
     * @param mixed $flat_id
     */
    public function setFlatId($flat_id)
    {
        $this->flat_id = $flat_id;
    }

    /**
     * @param mixed $Surburb
     */
    public function setSurburb($Surburb)
    {
        $this->Surburb = $Surburb;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getFlatId()
    {
        return $this->flat_id;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @param mixed $Longtd
     */
    public function setLongtd($Longtd)
    {
        $this->Longtd = $Longtd;
    }

    /**
     * @param mixed $street_name
     */
    public function setStreetName($street_name)
    {
        $this->street_name = $street_name;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $Street_address
     */
    public function setStreetAddress($Street_address)
    {
        $this->Street_address = $Street_address;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLongtd()
    {
        return $this->Longtd;
    }

    /**
     * @return mixed
     */
    public function getStreetAddress()
    {
        return $this->Street_address;
    }

    /**
     * @return mixed
     */
    public function getStreetName()
    {
        return $this->street_name;
    }

    /**
     * @return mixed
     */
    public function getSurburb()
    {
        return $this->Surburb;
    }
}
