<?php

class database_connector {
  private $servername = "";
  private $username = "";
  private $password = "";
  private $database = "";

  function __construct($servername,$username,$password,$database){
    $this->servername = $servername;
    $this->username = $username;
    $this->password = $password;
    $this->database = $database;
  }

  private function mysqli(){
    return new mysqli(
      $this->servername,  
      $this->username, 
      $this->password, 
      $this->database);
  }

  public function connect(){
    $status = $this->mysqli();
    if($status->connect_error){
      return ("Connection failed: " . $status->connect_error);
    } else {
      // echo "Connected successfully";
      return $status;
    }
  }


}

$servername = "localhost";
$username = "root";
$password = "";
$database = "taman_nasional";

$connector = new database_connector($servername,$username,$password,$database);

$connector->connect();

?> 