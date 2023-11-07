<?php 

// include __DIR__.'/../config/database_operation.php';
require __DIR__.'/../object/User.php';

class User_model{

    private $operation;

    function __construct(){
        $this->operation = new database_operation();
    }

    /**
     * @return object User
     */
    function getAllUserData($limit){
        $query = "SELECT * FROM user LIMIT $limit";
        $arrayData = array($limit);
        $valueType = "i";
        // echo $query;
        $list_user = [];
        $result = $this->operation->get_op($query,$arrayData,$valueType);

        
        foreach ($result as $row) {
            $list_user[] = new User(
                $row["id_user"],
                $row["nama_depan"],
                $row["nama_belakang"],
                $row["alamat"],
                $row["email"],
                $row["no_telp"],
                $row["gender"],
                $row["umur"]
            );
        }

        return $list_user;
    }

    /**
     * @return object User
     */
    function getUserByID($id){
        $query = "SELECT * FROM user WHERE id_user = ?";
        $arrayData = array($id);
        $valueType = "i";
        $list_user = [];



        $result = $this->operation->get_op($query,$arrayData,$valueType);
        
        foreach ($result as $row) {
            $list_user[] = new User(
                $row["id_user"],
                $row["nama_depan"],
                $row["nama_belakang"],
                $row["alamat"],
                $row["email"],
                $row["no_telp"],
                $row["gender"],
                $row["umur"]
            );
        }
        // var_dump($result);

        return $list_user;
    }

    function updateUserByID(User $user){
        $id = $user->getIdUser();
        $arrayData = array(
            $user->getNamaDepan(),
            $user->getNamaBelakang(),
            $user->getAlamat(),
            $user->getEmail(),
            $user->getNoTelp(),
            $user->getGender(),
            $user->getUmur(),
        );

        // value type dalam data yang akan input
        $valueType = "ssssssi";

        $query = "UPDATE user SET 
            nama_depan = ?,
            nama_belakang = ?,
            alamat = ?,
            email = ?,
            no_telp = ?,
            gender = ?,
            umur = ?
        WHERE id_user = $id";

        if ($this->operation->dml_op($query, $arrayData,$valueType)){
            echo 'berhasil di update';
        } else {
            echo "gagal lmao";
        }
        
    }

    /**
     * @param of User
     */
    function insertUser(User $user) {
        $arrayData = array(
            $user->getNamaDepan(),
            $user->getNamaBelakang(),
            $user->getAlamat(),
            $user->getEmail(),
            $user->getNoTelp(),
            $user->getGender(),
            $user->getUmur()
        );
    
        // Value type dalam data yang akan diinput
        $valueType = "ssssssi";
    
        $query = "INSERT INTO user (nama_depan, nama_belakang, alamat, email, no_telp, gender, umur) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $lastInsertedId = $this->operation->dml_op($query, $arrayData, $valueType);
        if ($lastInsertedId > 0) {
            return $lastInsertedId;
        } else {
            return null;
        }
    }

    /**
     * @return object User
     */
    function getUserByName($nama_depan, $nama_belakang=null){
        $listNama = [];
        $query = "SELECT * FROM user WHERE nama_depan = ? OR nama_belakang = ? ";
        $valueType = "ss";
        $arrayData = array($nama_depan, $nama_belakang);
        $result = $this->operation->get_op($query,$arrayData,$valueType);
        if ($result == 0){
            foreach ($result as $row) {
                $listNama[] = new User(
                     $row["id_user"],
                     $row["nama_depan"],
                     $row["nama_belakang"],
                     $row["alamat"],
                     $row["email"],
                     $row["no_telp"],
                     $row["gender"],
                     $row["umur"]
                 );
            }

            return $listNama;
        } else {
            return 0;
        }
        
    }

    function deleteUserById($id) {
        $query = "DELETE FROM user WHERE id_user = ?";
    
        $arrayData = array($id);
    
        $valueType = "i";
    
        if ($this->operation->dml_op($query, $arrayData, $valueType)) {
            echo 'Data pengguna berhasil dihapus';
        } else {
            echo 'Gagal menghapus data pengguna';
        }
    }
}

$test = new User_model;

// $result = $test->getUserByID(100);
// var_dump($result);
// $test->updateUserByID($user);

// Buat instance User
// $user = new User(null,"John", "Doe", "123 Main St", "john@example.com", "123456789", "laki", 30);
// // $test->insertUser($user);
// $test->deleteUserById(96);


/**
 * 
 */

// foreach ($result as $row) {
//     foreach ($row as $key => $value) {
//         echo "$key:: $value";
//     }
// }

// $list_user = [];
// foreach ($result as $row) {
//     $list_user[] = new User(
//         $row["id_user"],
//         $row["nama_depan"],
//         $row["nama_belakang"],
//         $row["alamat"],
//         $row["email"],
//         $row["no_telp"],
//         $row["gender"],
//         $row["umur"]
//     );
// }


// foreach ($list_user as $user) {
//     // Di sini Anda dapat mengakses properti objek dan melakukan operasi dengan objek
//     echo "ID User: " . $user->getIdUser() . "<br>";
//     echo "Nama Depan: " . $user->getNamaDepan() . "<br>";
//     echo "Nama Belakang: " . $user->getNamaBelakang() . "<br>";
//     echo "Alamat: " . $user->getAlamat() . "<br>";
//     echo "Email: " . $user->getEmail() . "<br>";
//     echo "No. Telp: " . $user->getNoTelp() . "<br>";
//     echo "Gender: " . $user->getGender() . "<br>";
//     echo "Umur: " . $user->getUmur() . "<br>";

//     // Lakukan operasi lain jika diperlukan
// }
?>