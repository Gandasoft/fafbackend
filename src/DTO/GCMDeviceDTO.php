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

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * @return mixed
     */
    public function getAndroidVersion()
    {
        return $this->androidVersion;
    }

    /**
     * @return mixed
     */
    public function getDateregistered()
    {
        return $this->dateregistered;
    }

    /**
     * @return mixed
     */
    public function getGcmdeviceID()
    {
        return $this->gcmdeviceID;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return mixed
     */
    public function getRegistrationID()
    {
        return $this->registrationID;
    }

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param mixed $androidVersion
     */
    public function setAndroidVersion($androidVersion)
    {
        $this->androidVersion = $androidVersion;
    }

    /**
     * @param mixed $dateregistered
     */
    public function setDateregistered($dateregistered)
    {
        $this->dateregistered = $dateregistered;
    }

    /**
     * @param mixed $gcmdeviceID
     */
    public function setGcmdeviceID($gcmdeviceID)
    {
        $this->gcmdeviceID = $gcmdeviceID;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @param mixed $registrationID
     */
    public function setRegistrationID($registrationID)
    {
        $this->registrationID = $registrationID;
    }

    /**
     * @param mixed $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * @param mixed $UserID
     */
    public function setUserID($UserID)
    {
        $this->UserID = $UserID;
    }
}