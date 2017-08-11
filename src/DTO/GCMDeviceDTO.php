<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 12:44 PM
 */
class GCMDeviceDTO{
    private $gcmdeviceID;
    private $registrationID;
    private $product;
    private $UserID;
    private $model;
    private $serialNumber;
    private $androidVersion;
    private $manufacturer;
    private $dateregistered;


    public function getUserID()
    {
        return $this->UserID;
    }


    public function getAndroidVersion()
    {
        return $this->androidVersion;
    }


    public function getDateregistered()
    {
        return $this->dateregistered;
    }

    public function getGcmdeviceID()
    {
        return $this->gcmdeviceID;
    }


    public function getManufacturer()
    {
        return $this->manufacturer;
    }


    public function getModel()
    {
        return $this->model;
    }


    public function getProduct()
    {
        return $this->product;
    }


    public function getRegistrationID()
    {
        return $this->registrationID;
    }


    public function getSerialNumber()
    {
        return $this->serialNumber;
    }


    public function setAndroidVersion($androidVersion)
    {
        $this->androidVersion = $androidVersion;
    }


    public function setDateregistered($dateregistered)
    {
        $this->dateregistered = $dateregistered;
    }


    public function setGcmdeviceID($gcmdeviceID)
    {
        $this->gcmdeviceID = $gcmdeviceID;
    }


    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }


    public function setModel($model)
    {
        $this->model = $model;
    }


    public function setProduct($product)
    {
        $this->product = $product;
    }


    public function setRegistrationID($registrationID)
    {
        $this->registrationID = $registrationID;
    }


    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
    }
}