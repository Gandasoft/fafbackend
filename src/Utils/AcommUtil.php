<?php
class AcommUtil extends DBUtil{
    public function getAcommid($value){
        $stment=$this->db->prepare("SELECT id FROM fafdb.accommodation WHERE Type=:type");
        $stment->bindParam("type",$value);
        $stment->execute();
        $accom=$stment->fetch();
        return $accom;

    }}