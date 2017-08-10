<?php
/**
 * class that handles all db operations
 */

abstract class DBUtil{


  protected $db;
  public function __construct($db)
  {
      $this->db=$db;
  }

}