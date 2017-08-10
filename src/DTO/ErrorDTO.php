<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 7:02 AM
 */

class ErrorDTO
{
    private $statuscode;
    private $errortext;

public function setStatus($statuscode)
{
$this->statuscode=$statuscode;
}
public function getStatus(){
    return $this->statuscode;
}
public function setErrortext($errortext){
    $this->errortext=$errortext;
}
public function getErrortext(){
    return $this->errortext;
}
}
