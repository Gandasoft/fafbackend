<?php
/**
 * handles database connection
 */
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');
define('DB_NAME','fafdb');


define('USER_CREATED_SUCCESSFULLY',0);
define('USER_CREATE_FAILED',1);
define('USER_ALREADY_EXISTED',2);
class DBConnect{

    private $connection;
    public function connect()
    {
      require __DIR__.'/../src/settings.php';
        //connecting to mysql database
        $this->connection=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
        //check for database connection error
        if(mysqli_connect_errno()){
            echo "failed to connect to Mysql".mysqli_connect_error();
        }

        return $this->connection;
    }

}