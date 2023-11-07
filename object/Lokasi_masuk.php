<?php 

class LokasiMasuk {
    private $id_lokasi_masuk;
    private $nama_lokasi;
    private $alamat;
    private $map_link;
    private $jenis_lokasi;

    public function __construct($id_lokasi_masuk=null, $nama_lokasi, $alamat, $map_link, $jenis_lokasi) {
        $this->id_lokasi_masuk = $id_lokasi_masuk;
        $this->nama_lokasi = $nama_lokasi;
        $this->alamat = $alamat;
        $this->map_link = $map_link;
        $this->jenis_lokasi = $jenis_lokasi;
    }

    public function getIdLokasiMasuk() {
        return $this->id_lokasi_masuk;
    }

    public function setIdLokasiMasuk($id_lokasi_masuk) {
        $this->id_lokasi_masuk = $id_lokasi_masuk;
    }

    public function getNamaLokasi() {
        return $this->nama_lokasi;
    }

    public function setNamaLokasi($nama_lokasi) {
        $this->nama_lokasi = $nama_lokasi;
    }

    public function getAlamat() {
        return $this->alamat;
    }

    public function setAlamat($alamat) {
        $this->alamat = $alamat;
    }

    public function getMapLink() {
        return $this->map_link;
    }

    public function setMapLink($map_link) {
        $this->map_link = $map_link;
    }

    public function getJenisLokasi() {
        return $this->jenis_lokasi;
    }

    public function setJenisLokasi($jenis_lokasi) {
        $this->jenis_lokasi = $jenis_lokasi;
    }
}


?>