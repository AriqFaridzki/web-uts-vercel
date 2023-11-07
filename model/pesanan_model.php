<?php 

require __DIR__.'/../object/Pesanan.php';
// include_once __DIR__.'/../config/database_operation.php';

class Pesanan_model {

    private $operation;

    function __construct() {
        $this->operation = new database_operation();
    }

    function getAllPesananData($limit) {
        $query = "SELECT * FROM pesanan LIMIT $limit";
        $arrayData = array($limit);
        $valueType = "i";

        $result = $this->operation->get_op($query,$arrayData,$valueType);
        $pesananList = [];

        foreach ($result as $row) {
            $pesananList[] = new Pesanan(
                $row["id_pesanan"],
                $row["id_user"],
                $row["id_lokasi_masuk"],
                $row["tgl_masuk"],
                $row["tgl_keluar"],
                $row["jml_pengujung"],
                $row["total_harga"],
                $row["updated_at"],
                $row["created_at"]
            );
        }

        return $pesananList;
    }

    function getPesananByID($id) {
        $query = "SELECT * FROM pesanan WHERE id_pesanan = ?";
        $arrayData = array($id);
        $valueType = "i";
        $result = $this->operation->get_op($query, $arrayData, $valueType);

        if ($result) {
            $row = $result[0];
            return new Pesanan(
                $row["id_pesanan"],
                $row["id_user"],
                $row["id_lokasi_masuk"],
                $row["tgl_masuk"],
                $row["tgl_keluar"],
                $row["jml_pengujung"],
                $row["total_harga"],
                $row["updated_at"],
                $row["created_at"]
            );
        }

        return null;
    }

    function insertPesanan(Pesanan $pesanan) {
        $arrayData = array(
            $pesanan->getIdUser(),
            $pesanan->getIdLokasiMasuk(),
            $pesanan->getTglMasuk(),
            $pesanan->getTglKeluar(),
            $pesanan->getJmlPengujung(),
            $pesanan->getTotalHarga(),
            $pesanan->getUpdatedAt(),
            $pesanan->getCreatedAt()
        );

        $valueType = "iissiiss";
        $query = "INSERT INTO pesanan (id_user, id_lokasi_masuk, tgl_masuk, tgl_keluar, jml_pengujung, total_harga, updated_at, created_at) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $result = $this->operation->dml_op($query, $arrayData, $valueType);

        if ( $result > 0) {
            return true;
        } else {
            return false;
        }
    }

    function updatePesananByID(Pesanan $pesanan) {
        $id = $pesanan->getIdPesanan();
        $arrayData = array(
            $pesanan->getIdUser(),
            $pesanan->getIdLokasiMasuk(),
            $pesanan->getTglMasuk(),
            $pesanan->getTglKeluar(),
            $pesanan->getJmlPengujung(),
            $pesanan->getTotalHarga(),
            $pesanan->getUpdatedAt(),
            $pesanan->getCreatedAt()
        );

        $valueType = "iissiiss";
        $query = "UPDATE pesanan SET 
            id_user = ?,
            id_lokasi_masuk = ?,
            tgl_masuk = ?,
            tgl_keluar = ?,
            jml_pengujung = ?,
            total_harga = ?,
            updated_at = ?,
            created_at = ?
        WHERE id_pesanan = $id";

        if ($this->operation->dml_op($query, $arrayData, $valueType)) {
            echo 'Pesanan berhasil diupdate';
        } else {
            echo 'Gagal mengupdate pesanan';
        }
    }

    function deletePesananByID($id) {
        $query = "DELETE FROM pesanan WHERE id_pesanan = ?";
        $arrayData = array($id);
        $valueType = "i";

        if ($this->operation->dml_op($query, $arrayData, $valueType)) {
            echo 'Pesanan berhasil dihapus';
        } else {
            echo 'Gagal menghapus pesanan';
        }
    }
}




?>