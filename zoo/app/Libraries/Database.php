<?php

namespace Libraries;

use PDO;

class Database
{
  private static $instance = NULL;
  public $host, $user, $pass, $db;

  public function __construct()
  {
    $this->host = 'localhost';
    $this->user = 'dev';
    $this->pass = 'dev';
    $this->db = 'zmsdb';
  }

  private function __clone()
  {
  }

  public static function getInstance()
  {
    if (!isset(self::$instance)) {
      $instance = new self(); // create an instance of the Database class to access connection properties
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      self::$instance = new PDO("mysql:host=" . $instance->host . ";dbname=" . $instance->db, $instance->user, $instance->pass, $pdo_options);
    }
    return self::$instance;
  }

   // Getter methods
   public function getHost()
   {
       return $this->host;
   }

   public function getUser()
   {
       return $this->user;
   }

   public function getPass()
   {
       return $this->pass;
   }

   public function getDb()
   {
       return $this->db;
   }
}
