<?php 

//dirnya

require '../config/database_operation.php';
require '../object/Creds.php';

class Creds {
    private $operation;

    function __construct() {
        $this->operation = new database_operation();
    }

    function getCredsByUsername($username) {
        $query = "SELECT * FROM creds WHERE username = ?";
        $arrayData = array($username);
        $valueType = "s";

        $result = $this->operation->get_op($query, $arrayData, $valueType);

        if ($result) {
            $credsList = [];

            foreach ($result as $row) {
                $credsList[] = new Creds(
                    $row["id_user"],
                    $row["username"],
                    $row["password"],
                    $row["roles"]
                );
            }

            return $credsList;
        } else {
            return null;
        }
    }

    function getCredsById($id) {
        $query = "SELECT * FROM creds WHERE id_user = ?";
        $arrayData = array($id);
        $valueType = "i";

        return $this->operation->get_op($query, $arrayData, $valueType);
    }

    function updateUserCreds(Creds $creds) {
        $id = $creds->getIdUser();
        $arrayData = array(
            $creds->getUsername(),
            $creds->getPassword(),
            $creds->getRoles()
        );

        $valueType = "sss";

        $query = "UPDATE creds SET 
            username = ?,
            password = ?,
            roles = ?
        WHERE id_user = $id";

        if ($this->operation->dml_op($query, $arrayData, $valueType)) {
            echo 'Berhasil diupdate';
        } else {
            echo "Gagal lmao";
        }
    }

    function insertCreds(Creds $creds) {
        $arrayData = array(
            $creds->getUsername(),
            $creds->getPassword(),
            $creds->getRoles()
        );

        $valueType = "sss";

        $query = "INSERT INTO creds (username, password, roles) VALUES (?, ?, ?)";

        if ($this->operation->dml_op($query, $arrayData, $valueType)) {
            echo 'Berhasil diinsert';
        } else {
            echo 'Gagal lmao';
        }
    }

    function deleteCredsById($id) {
        $query = "DELETE FROM creds WHERE id_user = ?";

        $arrayData = array($id);

        $valueType = "i";

        if ($this->operation->dml_op($query, $arrayData, $valueType)) {
            echo 'Data pengguna berhasil dihapus';
        } else {
            echo 'Gagal menghapus data pengguna';
        }
    }


}


?>