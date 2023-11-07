<?php 

require __DIR__.'../object/Lokasi_masuk.php';

class Lokasi_masuk_model {
    private $operation;

    function __construct() {
        $this->operation = new database_operation();
    }

    function getTempatMasukAll($limit) {
        $query = "SELECT * FROM tempat_masuk LIMIT $limit";
        $arrayData = array($limit);
        $valueType = "i";

        $result = $this->operation->get_op($query,$arrayData,$valueType);

        if ($result) {
            $tempatMasukList = [];

            foreach ($result as $row) {
                $tempatMasukList[] = new LokasiMasuk(
                    $row["id_tempat_masuk"],
                    $row["nama_lokasi"],
                    $row["alamat"],
                    $row["map_link"],
                    $row["jenis_lokasi"]
                );
            }

            return $tempatMasukList;
        } else {
            return null;
        }
    }

    function getTempatMasukById($id) {
        $query = "SELECT * FROM tempat_masuk WHERE id_tempat_masuk = ?";
        $arrayData = array($id);
        $valueType = "i";

        return $this->operation->get_op($query, $arrayData, $valueType);
    }

    function getTempatMasukByName($nama_lokasi) {
        $query = "SELECT * FROM tempat_masuk WHERE nama_lokasi = ?";
        $arrayData = array($nama_lokasi);
        $valueType = "s";

        $result = $this->operation->get_op($query, $arrayData, $valueType);

        if ($result) {
            $tempatMasukList = [];

            foreach ($result as $row) {
                $tempatMasukList[] = new LokasiMasuk(
                    $row["id_tempat_masuk"],
                    $row["nama_lokasi"],
                    $row["alamat"],
                    $row["map_link"],
                    $row["jenis_lokasi"]
                );
            }

            return $tempatMasukList;
        } else {
            return null;
        }
    }

    function updateTempatMasuk(LokasiMasuk $tempatMasuk) {
        $id = $tempatMasuk->getIdLokasiMasuk();
        $arrayData = array(
            $tempatMasuk->getNamaLokasi(),
            $tempatMasuk->getAlamat(),
            $tempatMasuk->getMapLink(),
            $tempatMasuk->getJenisLokasi()
        );

        $valueType = "ssss";

        $query = "UPDATE tempat_masuk SET 
            nama_lokasi = ?,
            alamat = ?,
            map_link = ?,
            jenis_lokasi = ?
        WHERE id_tempat_masuk = $id";

        if ($this->operation->dml_op($query, $arrayData, $valueType)) {
            echo 'Berhasil diupdate';
        } else {
            echo "Gagal lmao";
        }
    }

    function insertTempatMasuk(LokasiMasuk $tempatMasuk) {
        $arrayData = array(
            $tempatMasuk->getNamaLokasi(),
            $tempatMasuk->getAlamat(),
            $tempatMasuk->getMapLink(),
            $tempatMasuk->getJenisLokasi()
        );

        $valueType = "ssss";

        $query = "INSERT INTO tempat_masuk (nama_lokasi, alamat, map_link, jenis_lokasi) VALUES (?, ?, ?, ?)";

        if ($this->operation->dml_op($query, $arrayData, $valueType)) {
            echo 'Berhasil diinsert';
        } else {
            echo 'Gagal lmao';
        }
    }

    function deleteTempatMasukById($id) {
        $query = "DELETE FROM tempat_masuk WHERE id_tempat_masuk = ?";

        $arrayData = array($id);

        $valueType = "i";

        if ($this->operation->dml_op($query, $arrayData, $valueType)) {
            echo 'Data tempat masuk berhasil dihapus';
        } else {
            echo 'Gagal menghapus data tempat masuk';
        }
    }
}



?>