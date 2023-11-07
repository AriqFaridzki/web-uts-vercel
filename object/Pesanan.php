<?php 

class Pesanan {
    private $id_pesanan;
    private $id_user;
    private $id_lokasi_masuk;
    private $tgl_masuk;
    private $tgl_keluar;
    private $jml_pengujung;
    private $total_harga;
    private $updated_at;
    private $created_at;

    public function __construct($id_pesanan=null, $id_user, $id_lokasi_masuk, $tgl_masuk, $tgl_keluar, $jml_pengujung, $total_harga, $updated_at=null, $created_at=null) {
        $this->id_pesanan = $id_pesanan;
        $this->id_user = $id_user;
        $this->id_lokasi_masuk = $id_lokasi_masuk;
        $this->tgl_masuk = $tgl_masuk;
        $this->tgl_keluar = $tgl_keluar;
        $this->jml_pengujung = $jml_pengujung;
        $this->total_harga = $total_harga;
        $this->updated_at = $updated_at;
        $this->created_at = $created_at;
    }

    public function getIdPesanan() {
        return $this->id_pesanan;
    }

    public function setIdPesanan($id_pesanan) {
        $this->id_pesanan = $id_pesanan;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function getIdLokasiMasuk() {
        return $this->id_lokasi_masuk;
    }

    public function setIdLokasiMasuk($id_lokasi_masuk) {
        $this->id_lokasi_masuk = $id_lokasi_masuk;
    }

    public function getTglMasuk() {
        return $this->tgl_masuk;
    }

    public function setTglMasuk($tgl_masuk) {
        $this->tgl_masuk = $tgl_masuk;
    }

    public function getTglKeluar() {
        return $this->tgl_keluar;
    }

    public function setTglKeluar($tgl_keluar) {
        $this->tgl_keluar = $tgl_keluar;
    }

    public function getJmlPengujung() {
        return $this->jml_pengujung;
    }

    public function setJmlPengujung($jml_pengujung) {
        $this->jml_pengujung = $jml_pengujung;
    }

    public function getTotalHarga() {
        return $this->total_harga;
    }

    public function setTotalHarga($total_harga) {
        $this->total_harga = $total_harga;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
}


?>