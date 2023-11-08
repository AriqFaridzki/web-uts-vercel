<?php  
include __DIR__.'/../config/database_operation.php';
include __DIR__.'/../model/pesanan_model.php';
include __DIR__.'/../model/User_model.php';
include __DIR__.'/../model/Lokasi_masuk_model.php';


class List_pesanan_controller{

    private $pesanan_model;
    private $user_model;
    private $lokasi_model;

    function __construct(){
        $this->pesanan_model = new pesanan_model();
        $this->user_model = new User_model();
        $this->lokasi_model = new Lokasi_masuk_model();
    }

    public function getBookCount(){

        return $this->pesanan_model->getCountPesananData();

    }

    public function getAllBook($limit){
        return $this->pesanan_model->getAllPesananData($limit);
    }

    public function getLokasiById($id){
        return $this->lokasi_model->getTempatMasukById($id)[0];
    }

    public function getUserById($id){
        return $this->user_model->getUserByID($id)[0];
    }
    

} 

// $list_pesanan = new List_pesanan_controller();



// var_dump($test->getAllBook(10));

?>