<?php

use LDAP\Connection;

require __DIR__.'/database_connector.php';

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
     * @param $values sebagai isi valuenya bertipe array
     * @param $value_types sebagai tipe datanya (s : string, d : Double, i : Integer, b : Blob)
     * @param $withkey digunakan untuk jika ingin mengambil id setelah di input
     */
    public function dml_op($query, $values, $value_types, $withkey = null)
{
    $prepare = $this->connect->prepare($query);

    if (!$prepare) {
        echo "Error: " . $this->connect->error;
        return;
    }

    $prepare->bind_param($value_types, ...$values);

    $result = $prepare->execute();

    if ($result) {
        $lastInsertedId = $this->connect->insert_id; // Dapatkan lastInsertedId setelah eksekusi
        $prepare->close();
        return $lastInsertedId;
    } else {
        return $prepare->error;
        $prepare->close();
    }
}
    

    /**
     * untuk mengambil data dari database
     * @return array datanya
     * tolong jangan lupa memakai fetch_assoc() untuk mengambil datanya
     */
    public function get_op($query,$values,$value_types){
        $prepare = $this->connect->prepare($query);

        if (!$prepare) {
            echo "Error: " .$this->connect->error;
            return;
        }

        $prepare->bind_param($value_types, ...$values);

        $result = $prepare->execute();
        if ($result) {
            return $prepare->get_result();
            $prepare->close();
        } else {
            return $prepare->error;
            $prepare->close();
        }
    }

    public function get_row_count($query){
        $res = $this->connect->query($query);

        if ($res !== false) {
            $row_count = $res->num_rows;
            return $row_count;
        } else {
            // Handle query error
            return false;
    }
    }

    public function ddl_op($query,$values){
        // $prepare = $this->connect->prepare();
    }
    

    // public function FunctionName($result){
    //     return
    // }

}


// $op = new database_operation();

// $hasil = $op->get_op("SELECT * FROM user LIMIT 20"); 
// echo $hasil;

// foreach ($hasil as $row) {
//     // Mengambil data spesifik dari setiap baris
//     $id_user = $row['id_user'];
//     $nama_depan = $row['nama_depan'];
//     $nama_belakang = $row['nama_belakang'];
//     $alamat = $row['alamat'];
//     $email = $row['email'];
//     $no_telp = $row['no_telp'];
//     $gender = $row['gender'];
//     $umur = $row['umur'];

//     // Cetak data atau lakukan operasi lainnya
//     echo "ID User: $id_user, Nama Depan: $nama_depan, Nama Belakang: $nama_belakang, Alamat: $alamat, Email: $email, No. Telp: $no_telp, Gender: $gender, Umur: $umur<br>";
// }

// $query = "INSERT INTO lokasi_masuk (nama_lokasi, alamat, jenis_lokasi) VALUES (?, ?, ?)";
// $values = array("Gerbang A", "Jl. Sesuatu yang sangat keren","pintu_masuk");
// $types = "sss";
// // $values = array(
// //     'nama_lokasi' => ['value' => "Gerbang A", 'type' => 's'], // String
// //     'alamat' => ['value' => "Jl. Sesuatu yang sangat keren", 'type' => 's'], // String
// //     'jenis_lokasi' => ['value' => "pintu_masuk", 'type' => 's'] // Integer
// // );
// // echo "Ariq";
// $result =$op->dml_op($query, $values, $types);
// print_r($result);

?>