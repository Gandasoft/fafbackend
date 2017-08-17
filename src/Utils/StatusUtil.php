<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/17/17
 * Time: 6:47 AM
 */

class StatusUtil extends DBUtil
{
    public function getStatusid($value){
        $stment=$this->db->prepare("SELECT status_id FROM fafdb.status WHERE type=:type");
        $stment->bindParam("type",$value);
        $stment->execute();
        $user=$stment->fetch();
        return $user;

    }

}