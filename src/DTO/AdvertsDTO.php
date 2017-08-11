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

    function __construct(array $data)
    {
        $this->AdvertOwner=$data['Advert_owner'];
        $this->AccomodationType=$data['Accomodation_type'];
        $this->price=$data['price'];
        $this->Flat=$data['Flat'];
        $this->status=$data['status'];
    }

    public function getAccomodationType()
    {
        return $this->AccomodationType;
    }


    public function getAdvertID()
    {
        return $this->AdvertID;
    }


    public function getAdvertOwner()
    {
        return $this->AdvertOwner;
    }

    public function getFlat()
    {
        return $this->Flat;
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function setAccomodationType($AccomodationType)
    {
        $this->AccomodationType = $AccomodationType;
    }


    public function setAdvertID($AdvertID)
    {
        $this->AdvertID = $AdvertID;
    }


    public function setAdvertOwner($AdvertOwner)
    {
        $this->AdvertOwner = $AdvertOwner;
    }


    public function setFlat($Flat)
    {
        $this->Flat = $Flat;
    }


    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function setStatus($status)
    {
        $this->status = $status;
    }

}