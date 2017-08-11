<?php
class AdvertsUtil extends DBUtil {
    public function getAdvertByID($id){
        $stamnt=$this->db->prepare("SELECT * FROM fafdb.adverts WHERE id=:id");
        $stamnt->bindParam("id",$id);
        $stamnt->execute();
        $Advert=$stamnt->fetchObject();
        return $Advert;
    }
    public function getAllAdverts(){
        $stamnt=$this->db->prepare("SELECT  A.* FROM fafdb.Adverts A JOIN
           fafdb.users B ON A.Advert_owner=B.id LEFT JOIN fafdb.status c ON A.status=C.status_id
  LEFT JOIN fafdb.flat as D ON A.Flat=D.id LEFT JOIN fafdb.accommodation E ON A.Accomodation_type=E.id");

        $stamnt->execute();
        $Adverts=$stamnt->fetchAll();
        return $Adverts;
    }
    public function getAdvertsByOwner($ownerID){
        $stamnt=$this->db->prepare("SELECT A.* FROM (fafdb.adverts A JOIN fafdb.users B ON A.Advert_owner
  =B.id WHERE B.id=:id)LEFT JOIN fafdb.status c ON A.status=C.status_id
  LEFT JOIN fafdb.flat as D ON A.Flat=D.id LEFT JOIN fafdb.accommodation E ON A.Accomodation_type=E.id");
        $stamnt->bindParam("id",$ownerID);
        $stamnt->execute();
        $flat=$stamnt->fetchObject();
        return $flat;
    }
    public function getAdvertsBystatus($status){
        $stamnt=$this->db->prepare("SELECT A.* FROM fafdb.adverts A JOIN fafdb.users B ON A.Advert_owner
  =B.id LEFT JOIN fafdb.status c ON A.status=C.status_id WHERE c.status_id=:status
  LEFT JOIN fafdb.flat as D ON A.Flat=D.id LEFT JOIN fafdb.accommodation E ON A.Accomodation_type=E.id");
        $stamnt->bindParam("status",$status);
        $stamnt->execute();
        $adverts=$stamnt->fetchAll();
        return $adverts;
    }
    public function getAdByAcommType($accom){

            $stamnt=$this->db->prepare("SELECT A.* FROM (fafdb.adverts A JOIN fafdb.users B ON A.Advert_owner
  =B.id WHERE B.id=:id)LEFT JOIN fafdb.status c
  LEFT JOIN fafdb.flat as D ON A.Flat=D.id LEFT JOIN fafdb.accommodation E ON A.Accomodation_type=E.id WHERE E.id=:accom");
            $stamnt->bindParam("accom",$accom);
            $stamnt->execute();
            $adverts=$stamnt->fetchAll();
            return $adverts;

    }

    public function getAdvertsByPrice($price){
        $stamnt=$this->db->prepare("SELECT A.* FROM fafdb.adverts A JOIN fafdb.users B ON A.Advert_owner
  =B.id LEFT JOIN fafdb.status c ON A.status=C.status_id
  LEFT JOIN fafdb.flat as D ON A.Flat=D.id LEFT JOIN fafdb.accommodation E ON A.Accomodation_type=E.id WHERE A.price=:price");
        $stamnt->bindParam("price",$price);
        $stamnt->execute();
        $Adverts=$stamnt->fetchAll();
        return $Adverts;
    }
    public function AddAdvert(AdvertsDTO $advertDTO,FlatDTO $flatDTO){
        /*we need the flatDTO to get ID for the flat
        *add the flatDTO first into the DB then use the ID to fill in the flat field of this object
         * insert the advertDTO into the db
         */
        $id=$flatDTO->getFlatID();
        $stamnt=$this->db=prepare("INSERT INTO fafdb.adverts (Advert_owner,Accomodation_type,price,Flat,status)VALUES 
            ((SELECT id FROM users where Username:=username),(SELECT id FROM fafdb.accomodation WHERE Type=:type),:price:,
            :flat,(SELECT status_id FROM fafdb.status WHERE type=:status))");
       $result=$stamnt->execute([
           "username"=>$advertDTO->getAdvertOwner(),
           "type"=>$advertDTO->getAccomodationType(),
           "price"=>$advertDTO->getPrice(),
           "flat"=>$id,
           "status"=>$advertDTO->getStatus()

       ]);
       if(!$result){
           $error =new MessageDTO("704","your record could not be served");
           return $error;

       }else{

       }

    }
}