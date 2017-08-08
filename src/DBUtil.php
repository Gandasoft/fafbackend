<?php
/**
 * class that handles all db operations
 */

class DBUtil{
    private $settings;
    private $db;

    public function createUser($username,$password,$Age,$gender,$phone_number,$type){
        require_once 'PassHarsh.php';
        $response=array();
        //first check if user already exists in db
        if(!$this->isUserExists($username)){
            //generate password hash
            $password_hash=PassHarsh::hash($password);
            //Generation API key
            $api_key=$this->generateApiKey();
            //insert query
            $stmnt =$this->db->prepare("INSERT INTO Users(Username, Password, Age, Gender, UserTypes, phone_number, api_key) Values(?,?,?,?,?,?,?)");
            $stmnt->bind_param("sssssss",$username,$password_hash,$Age,$gender,$phone_number,$type,$api_key);
            $result=$stmnt->execute();
            $stmnt->close();
            //check for successful insertion
            if($result){
                //user successfully inserted
                return USER_CREATED_SUCCESSFULLY;
            }else{
                return USER_CREATE_FAILED;
            }


        }else{
            return USER_ALREADY_EXISTED;
        }
        return $response;
    }

    /**
     * @param String $username user login email id
     * @param String $password User login password
     * @return  boolean User login status success/fail
     */
    public function checkLogin($username,$password){
        //fetching user email
        $stment=$this->db->prepare("SELECT password FROM Users WHERE Username=?");
        $stment->bind_param("s",$username);
        $stment->execute();
        $stment->bind_result($password_harsh);
        $stment->store_result();
        if($stment->num_rows >0 ){
            //found user with the username
            //now verify password
            $stment->fetch();
            $stment->close();
            if(PassHarsh::check_password($password_harsh,$password)){
                return TRUE;
            }else{
                //user password is incorrect
                return FALSE;
            }}else{
            $stment->close();
            //user with the given username does not exist

        }

    }

    /**
     * checking for duplicate user by username
     * @param String Username
     * @return boolean
     */
    private function isUserExists($username){
        $stment=$this->db->prepare("SELECT id from Users WHERE Username=?");
        $stment=bind_param("s",$username);
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
       $stment=$this->db->prepare('SELECT username,email,api_key,Age,Gender,phone_number,User_Types WHERE username=?');
       $stment->bind_param("s",$username);
       if($stment->execute()){
           $user=$stment->get_result()->fetch_assoc();
           $stment->close();
           return $user;
       }else{
           return NULL;
       }

   }
   /**
    * Fetch user by api_key
    * @param String $id user id primary key in user table
    * */
   public function getApiKeyById($id){
       $stment=$this->db->prepare('SELECT api_key WHERE id=?');
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
   public function getUserId($api_key){
       $stment=$this->db->prepare('SELECT id WHERE api_key=?');
       $stment->bind_param("s",$api_key);
       if($stment->execute()){
           $user_id=$stment->get_result()->fetch_assoc();
           $stment->close();
           return $user_id;
       }else{
           return NULL;
       }
   }

    /**
     * Validating if an api key exists in the database
     * @param String $api_key user api key
     * @return boolean
     */
    public function isValidApiKey($api_key){
        $stment=$this->db->prepare("SELECT id from Users WHERE api_key=?");
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
    public function getflats(){
        $stamnt=$this->db->prepare("SELECT * FROM fafdb.flat");
        $stamnt->execute();
        $flats=$stamnt->fetchAll();
        return $flats;
    }
}