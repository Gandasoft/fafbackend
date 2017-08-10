<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 12:10 PM
 */
class AdvertsDTO{
    private $AdvertID;
    private $AdvertOwner;
    private $AccomodationType;
    private $price;
    private  $Flat;
    private $status;

    /**
     * @return mixed
     */
    public function getAccomodationType()
    {
        return $this->AccomodationType;
    }

    /**
     * @return mixed
     */
    public function getAdvertID()
    {
        return $this->AdvertID;
    }

    /**
     * @return mixed
     */
    public function getAdvertOwner()
    {
        return $this->AdvertOwner;
    }

    /**
     * @return mixed
     */
    public function getFlat()
    {
        return $this->Flat;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $AccomodationType
     */
    public function setAccomodationType($AccomodationType)
    {
        $this->AccomodationType = $AccomodationType;
    }

    /**
     * @param mixed $AdvertID
     */
    public function setAdvertID($AdvertID)
    {
        $this->AdvertID = $AdvertID;
    }

    /**
     * @param mixed $AdvertOwner
     */
    public function setAdvertOwner($AdvertOwner)
    {
        $this->AdvertOwner = $AdvertOwner;
    }

    /**
     * @param mixed $Flat
     */
    public function setFlat($Flat)
    {
        $this->Flat = $Flat;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}