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

    

    /**
     * 
     * @param $query jangan lupa memakai struktur prepared statement
     * @param $values strukturnya ("sss", "values....")
     */
    public function dml_op($query,$values,$withkey=null){
        $prepare = $this->connect->prepare($query);

        if (!$prepare) {
            return $this->connect->error;
        }

        if ($values) {
            $valueTypes = ''; // Template tipe data

            foreach ($values as $value) {
                if (is_int($value)) {
                    $valueTypes .= 'i'; // Integer
                } elseif (is_double($value)) {
                    $valueTypes .= 'd'; // Double
                } else {
                    $valueTypes .= 's'; // String
                }
            }

            // Binding parameter dinamis
            $params = array($valueTypes);
            foreach ($values as $value) {
                $params[] = $value;
            }

            $bind_params = array();
            foreach ($params as $key => $value) {
                $bind_params[] = &$params[$key];    
            }

            call_user_func_array(array($prepare, 'bind_param'), $bind_params);
        }

        $result = $prepare->execute();

        if ($result) {
            echo "Query berhasil dijalankan.";
        } else {
            echo "Error: " . $prepare->error;
        }

        $prepare->close();


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
        // $prepare = $this->connect->prepare();
    }
    

    // public function FunctionName($result){
    //     return
    // }

}


$op = new database_operation();
$hasil = $op->get_op("SELECT * FROM user LIMIT 10"); 
echo print_r($hasil);

// foreach ($hasil as $data => $value) {
//     print_r("Test : ".$hasil .$value);
// }

// $query = "INSERT INTO lokasi_masuk (nama_lokasi, alamat, jenis_lokasi) VALUES (?, ?, ?)";
// $values = array(
//     'nama_lokasi' => ['value' => "Gerbang A", 'type' => 's'], // String
//     'alamat' => ['value' => "Jl. Sesuatu yang sangat keren", 'type' => 's'], // String
//     'jenis_lokasi' => ['value' => "pintu_masuk", 'type' => 's'] // Integer
// );
// echo "Ariq";
// $op->dml_op($query, $values);


?>