<?php
class flatUtil extends DBUtil   {
    public function getflats(){
        $stamnt=$this->db->prepare("SELECT * FROM fafdb.flat");
        $stamnt->execute();
        $flats=$stamnt->fetchAll();
        return $flats;
    }
}

