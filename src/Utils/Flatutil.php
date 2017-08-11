<?php
class flatUtil extends DBUtil   {
    public function getflats(){
        $stamnt=$this->db->prepare("SELECT * FROM fafdb.flat");
        $stamnt->execute();
        $flats=$stamnt->fetchAll();
        return $flats;
    }
    public function getflatbyid($id){
        $stamnt=$this->db->prepare("SELECT * FROM fafdb.flat WHERE id=:id");
        $stamnt->bindParam("id",$id);
        $stamnt->execute();
        $flat=$stamnt->fetchObject();
        return $flat;
    }
    public function Searchflat($query){
        $stamnt=$this->db->prepare("SELECT * FROM fafdb.flat WHERE UPPER(flat_name) LIKE :querystring");
        $querystring="%".$query."%";
        $stamnt->bindParam("querystring",$querystring);
        $stamnt->execute();
        $matchingflats=$stamnt->fetchAll();
        return $matchingflats;
    }

}

