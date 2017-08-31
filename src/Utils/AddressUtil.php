<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/10/17
 * Time: 2:25 PM
 */
Class AddressUtil extends DBUtil
{
    public function addAddress(AddressDTO $adDTO)
    {
        try
        {
            $stamnt = $this->db->prepare("INSERT INTO fafdb.Address (Street_Name,Street_Address,Lat,Longtd,flat_id)VALUES 
            (:Street_Name,:Street_Address,:Lat,:Longtd,:Surburb,:flat_id)");
            $stamnt->execute([
                "Street_Name" => $adDTO->getStreetName(),
                "Street_Address" => $adDTO->getStreetAddress(),
                "Lat" => $adDTO->getLat(),
                "Longtd" => $adDTO->getLongtd(),
                "Surburb"=>$adDTO->getSurburb(),
                "flat_id"=>$adDTO->getFlatId()

            ]);
            $message = new MessageDTO(200, "success", "record inserted into DB");
            return $message;
        }

        catch
        (PDOException $e){
            $error = new MessageDTO("704", "database insertion error", "your record could not be served " . $e->getMessage());
            return $error;
        }
    }



    }