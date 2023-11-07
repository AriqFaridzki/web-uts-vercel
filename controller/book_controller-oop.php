<?php 
require_once __DIR__.'/../config/database_operation.php';
require __DIR__.'/../model/pesanan_model.php';
include __DIR__.'/../model/user_model.php';

class book_controller{
    
    private $pesanan_model;
    private $user_model;

    

    function __construct(){
        $this->pesanan_model = new Pesanan_model();
        $this->user_model = new User_model();
        // $this->pesanan_object = new Pesanan;
    }

    public function isSet(){
        return isset(
                $_POST['jumlah-kendaraan'],
                $_POST['tanggal-berangkat'],
                $_POST['Tanggal-Pulang'],
                $_POST['nama-depan'],
                $_POST['nama-belakang'],
                $_POST['alamat'],
                $_POST['email'],
                $_POST['nomor-telp'],   
                $_POST['gender'],
                $_POST['umur'],
                $_POST['jumlah-pengunjung']
        );
    }

    public function getPostUserData(){
            if($this->isSet()){
            return new User(null, 
                    $_POST['nama-depan'],
                    $_POST['nama-belakang'],
                    $_POST['alamat'],
                    $_POST['email'],
                    $_POST['nomor-telp'],   
                    $_POST['gender'],
                    $_POST['umur']
                );
            }
    }

    public function insertPostUserData() {
        $lastInsertedId = $this->user_model->insertUser($this->getPostUserData());
        return $lastInsertedId;
    }

    public function getPostPesananData(){
        $userLastInsertedId = $this->insertPostUserData();
        $userObject = $this->user_model->getUserByID($userLastInsertedId);

        if($this->isSet()){
            return new Pesanan(null, 
                    $userObject->getIdUser
                    $_POST['jumlah-kendaraan'],
                    $_POST['tanggal-berangkat'],
                    $_POST['Tanggal-Pulang'],
                    $_POST['jumlah-pengunjung']
                );

                $id_pesanan = null,
    $id_user,
    $id_lokasi_masuk,
    $tgl_masuk,
    $tgl_keluar,
    $jml_pengujung,
    $total_harga,
    $updated_at,
    $created_at
        }
    }

    
    public function submitBook(){
        $user = $this->getPostUserData();


        if($this->isSet()){

            $this->user_model->insertUser($user);
            sleep(3)
            $this->pesanan_model->insertPesanan()
        }

    }

}

$test = new book_controller();
$res = $test->getPostUserData();

                // echo $_POST['jumlah-kendaraan'];
                // echo $_POST['tanggal-berangkat'];
                // echo $_POST['Tanggal-Pulang'];
                // echo $_POST['nama-depan'];
                // echo $_POST['nama-belakang'];
                // echo $_POST['alamat'];
                // echo $_POST['email'];
                // echo $_POST['nomor-telp'];
                // echo $_POST['gender'];
                // echo $_POST['umur'];
                // echo $_POST['jumlah-pengunjung'];



?>

