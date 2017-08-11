<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 7:02 AM
 */

class MessageDTO
{
    private $statuscode;
    private $messagetype;
    private $messagetext;

    function __construct($statuscode, $messagetype, $messagetext)
    {
        $this->statuscode = $statuscode;
        $this->messagetext = $messagetext;
        $this->messagetype = $messagetype;
    }

    public function getErrortext()
    {
        return $this->errortext;
    }

    public function getMessagetext()
    {
        return $this->messagetext;
    }

    public function getMessagetype()
    {
        return $this->messagetype;
    }

    public function getStatuscode()
    {
        return $this->statuscode;

    }

    public function setErrortext($errortext)
    {
        $this->errortext = $errortext;
    }

    public function setMessagetext($messagetext)
    {
        $this->messagetext = $messagetext;
    }

    public function setMessagetype($messagetype)
    {
        $this->messagetype = $messagetype;
    }

    public function setStatuscode($statuscode)
    {
        $this->statuscode = $statuscode;
    }
}