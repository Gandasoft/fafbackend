<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 6:07 AM
 */
class userTypeUtil extends DBUtil{
    #find all user types
    public function getUsertypes(){
        $stamnt=$this->db->prepare("SELECT * FROM fafdb.usertypes");
        $stamnt->execute();
        $usertypes=$stamnt->fetchAll();

        return $usertypes;
    }
    #get usertype by id
    public function getUsertypeById($id){
        $stamnt=$this->db->prepare("SELECT * FROM fafdb.usertypes WHERE id=:id");
        $stamnt->bindParam("id",$id);
        $stamnt->execute();
        $usertype=$stamnt->fetchObject();
        return $usertype;
    }
    public function getIdByUsertype($type){
        $stamnt=$this->db->prepare("SELECT * FROM fafdb.usertypes WHERE Type=:type");
        $stamnt->bindParam("type",$type);
        $stamnt->execute();
        $usertype=$stamnt->fetch();
        return $usertype;
    }

}