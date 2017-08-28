<?php
class Userutil extends DBUtil{

    public function createUser(UserDTO $userdto)
    {
       // require_once 'PassHarsh.php';

        //first check if user already exists in db

//            //generate password hash
//            $password_hash=PassHarsh::hash($password);
//            //Generation API key
//            $api_key=$this->generateApiKey();
        //insert query
        try {
            $stamnt = $this->db->prepare("INSERT INTO fafdb.users (Username,Password,Age,Gender,phone_number,UserTypes) VALUES 
            
            (:username,:password,:age,:gender,:phonenumber,:usertype)");
            $stamnt->execute([
                "username" => $userdto->getUsername(),
                "password" => $userdto->getPassword(),
                "age" => $userdto->getAge(),
                "gender" => $userdto->getGender(),
                "phonenumber" => $userdto->getPhonenumber(),
                "usertype" => $userdto->getUsertype(),


            ]);
            $message = new MessageDTO(200, "success", "record inserted into DB");
            return $message;
        } catch (PDOException $e) {
            $error = new MessageDTO(704, "database insertion error", "your record could not be served " . $e->getMessage());
            return $error;


        }
    }

    /**
     * @param String $username user login email id
     * @param String $password User login password
     * @return  boolean User login status success/fail
     */
    public function checkLogin($username,$password){
        //fetching user email
//        $stment=$this->db->prepare("SELECT password FROM fafdb.users WHERE Username=?");
//        $stment->bind_param("s",$username);
//        $stment->execute();
//        //$stment->bind_result($password_harsh);
//        $stment->store_result();
//        if($stment->num_rows >0 ){
//            //found user with the username
//            //now verify password
//            $stment->fetch();
//            $stment->close();
//            if(PassHarsh::check_password($password_harsh,$password)){
//                return TRUE;
//            }else{
//                //user password is incorrect
//                return FALSE;
//            }}else{
//            $stment->close();
//            //user with the given username does not exist
//
//        }

    }

    /**
     * checking for duplicate user by username
     * @param String Username
     * @return boolean
     */
    private function isUserExists($username){
        $stment=$this->db->prepare("SELECT id from Users WHERE Username=:");
        $stment=bindParam("s",$username);
        $stment->execute();
        $stment->store_result();
        $num_rows=$stment->num_rows();
        $stment->close();
        return $num_rows>0;
    }
    /**
     * fetch user by username
     * @param String username
     * */
    public function getUserByUsername($username){
        $stment=$this->db->prepare("SELECT id,username,password,Age,Gender,phone_number,UserTypes FROM fafdb.users WHERE username=:username");
        $stment->bindParam("username",$username);
        $stment->execute();
        $user=$stment->fetchObject();
        return $user;

    }
    /**
     * Fetch user by api_key
     * @param String $id user id primary key in user table
     * */
    public function getApiKeyById($id){
        $stment=$this->db->prepare('SELECT password From fafdb.users WHERE id=?');
        $stment->bind_param("i",$id);
        if($stment->execute()){
            $user=$stment->get_result()->fetch_assoc();
            $stment->close();
            return $user;
        }else{
            return NULL;
        }
    }

    /**
     * Fetching userid by apikey
     * @param $api_keyfor fetching the user by apikey
     */
    public function getUserId($username){
        $stment=$this->db->prepare("SELECT id FROM fafdb.users WHERE Username=:username");
        $stment->bindParam("username",$username);
        $stment->execute();
        $user=$stment->fetch();
            return $user;

    }

    /**
     * Validating if an api key exists in the database
     * @param String $api_key user api key
     * @return boolean
     */
    public function isValidApiKey($api_key){
        $stment=$this->db->prepare("SELECT id,username from Users WHERE password=:api_key");
        $stment->bind_param("s",$api_key);
        $stment->execute();
        $stment->store_result();
        $num_rows=$stment->num_rows();
        $stment->close();
        return $num_rows >0;
    }
    public function generateApiKey(){
        return md5(uniqid(rand(),true));
    }
}