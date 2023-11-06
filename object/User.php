<?php 

class User {
    private $id_user;
    private $nama_depan;
    private $nama_belakang;
    private $alamat;
    private $email;
    private $no_telp;
    private $gender;
    private $umur;

    public function __construct($id_user, $nama_depan, $nama_belakang, $alamat, $email, $no_telp, $gender, $umur) {
        $this->id_user = $id_user;
        $this->nama_depan = $nama_depan;
        $this->nama_belakang = $nama_belakang;
        $this->alamat = $alamat;
        $this->email = $email;
        $this->no_telp = $no_telp;
        $this->gender = $gender;
        $this->umur = $umur;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function getNamaDepan() {
        return $this->nama_depan;
    }

    public function setNamaDepan($nama_depan) {
        $this->nama_depan = $nama_depan;
    }

    public function getNamaBelakang() {
        return $this->nama_belakang;
    }

    public function setNamaBelakang($nama_belakang) {
        $this->nama_belakang = $nama_belakang;
    }

    public function getAlamat() {
        return $this->alamat;
    }

    public function setAlamat($alamat) {
        $this->alamat = $alamat;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNoTelp() {
        return $this->no_telp;
    }

    public function setNoTelp($no_telp) {
        $this->no_telp = $no_telp;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getUmur() {
        return $this->umur;
    }

    public function setUmur($umur) {
        $this->umur = $umur;
    }
}


?>