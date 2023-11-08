<?php 

require __DIR__.'/../object/Lokasi_masuk.php';

class Lokasi_masuk_model {
    private $operation;

    function __construct() {
        $this->operation = new database_operation();
    }

    function getAllTempatMasuk($limit=null) {
        if($limit==null){
            $query = "SELECT * FROM lokasi_masuk WHERE 1=?";
            $arrayData = array(1);
            $valueType = "i";
        }else{
            $query = "SELECT * FROM lokasi_masuk LIMIT $limit";
            $arrayData = array($limit);
            $valueType = "i";
        }

        $tempatMasukList = [];

        $result = $this->operation->get_op($query,$arrayData,$valueType);

        foreach ($result as $row) {
                $tempatMasukList[] = new LokasiMasuk(
                    $row["id_lokasi_masuk"],
                    $row["nama_lokasi"],
                    $row["alamat"],
                    $row["map_link"],
                    $row["jenis_lokasi"]
                );
        }

        return $tempatMasukList;
    }

    function getTempatMasukById($id) {
        $query = "SELECT * FROM lokasi_masuk WHERE id_lokasi_masuk = ?";
        $arrayData = array($id);
        $valueType = "i";
        $list_lokasi = [];

        $result = $this->operation->get_op($query, $arrayData, $valueType);

        foreach ($result as $row) {
            $list_lokasi[] = new LokasiMasuk(null,
            $row["nama_lokasi"],
            $row["alamat"],
            $row["map_link"],
            $row["jenis_lokasi"]
        );
           
        }

        return $list_lokasi;
    }

    function getTempatMasukByName($nama_lokasi) {
        $query = "SELECT * FROM lokasi_masuk WHERE nama_lokasi = ?";
        $arrayData = array($nama_lokasi);
        $valueType = "s";

        $result = $this->operation->get_op($query, $arrayData, $valueType);

        if ($result) {
            $tempatMasukList = [];

            foreach ($result as $row) {
                $tempatMasukList[] = new LokasiMasuk(
                    $row["id_lokasi_masuk"],
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

        $query = "UPDATE lokasi_masuk SET 
            nama_lokasi = ?,
            alamat = ?,
            map_link = ?,
            jenis_lokasi = ?
        WHERE id_lokasi_masuk = $id";

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

        $query = "INSERT INTO lokasi_masuk (nama_lokasi, alamat, map_link, jenis_lokasi) VALUES (?, ?, ?, ?)";

        if ($this->operation->dml_op($query, $arrayData, $valueType)) {
            echo 'Berhasil diinsert';
        } else {
            echo 'Gagal lmao';
        }
    }

    function deleteTempatMasukById($id) {
        $query = "DELETE FROM lokasi_masuk WHERE id_lokasi_masuk = ?";

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