<?php

use LDAP\Connection;

require "./database_connector.php";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "taman_nasional";

class database_operation{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "taman_nasional";
    private $connection;
    private $connect;
    function __construct() {
        $this->connection = new database_connector(
            $this->servername,
            $this->username,
            $this->password,
            $this->database);

        $this->connect = $this->connection->connect();
    }

    

    

    public function dml_op($query,$values,$withkey){

    }

    /**
     * untuk mengambil data dari database
     * @return array datanya
     * tolong jangan lupa memakai fetch_assoc() untuk mengambil datanya
     */
    public function get_op($query,$values=null){
        $result = $this->connect->query($query);
        if($result->num_rows > 0){
            return $result;
        } else {
            return array();
        }
    }

    public function ddl_op($query,$values){

    }
    

    // public function FunctionName($result){
    //     return
    // }

}

$op = new database_operation();
$hasil = $op->get_op("SELECT * FROM user LIMIT 10"); 
// print_r($hasil["id_user"] = 2);

foreach ($hasil as $data => $value) {
    print_r("Test : ".$hasil .$value);
}


?>