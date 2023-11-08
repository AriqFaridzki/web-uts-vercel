<?php 
require_once __DIR__.'/../config/database_operation.php';
require __DIR__.'/../model/pesanan_model.php';
include __DIR__.'/../model/user_model.php';
include __DIR__.'/../model/Lokasi_masuk_model.php';

class book_controller{
    
    private $pesanan_model;
    private $user_model;
    private $lokasi_model;

    

    function __construct(){
        $this->pesanan_model = new Pesanan_model();
        $this->user_model = new User_model();
        $this->lokasi_model = new Lokasi_masuk_model();
        // $this->pesanan_object = new Pesanan;
    }

    public function isSet(){
        return isset(
                $_POST['tanggal-berangkat'],
                $_POST['Tanggal-Pulang'],
                $_POST['nama-depan'],
                $_POST['nama-belakang'],
                $_POST['alamat'],
                $_POST['email'],
                $_POST['nomor-telp'],   
                $_POST['gender'],
                $_POST['umur'],
                $_POST['jumlah-pengunjung'],
                $_POST['tempat-masuk']
        );
    }

    public function isSetGET(){

        if(isset($_GET['id_pesanan'])){
            return $_GET['id_pesanan'];
        }else{
            echo "ada yang gk keambil";
            var_dump($_GET);
            return false;
        }

    }

    public function getDataPesananById($id){
        $id_pesanan = $this->isSetGET(); // Get the id_pesanan from GET parameters

        if ($id_pesanan !== null) {
            $pesanan = $this->pesanan_model->getPesananByID($id_pesanan);
            if ($pesanan !== null) {
                return $pesanan;
            } else {
                echo "Pesanan not found.";
            }
        } else {
            echo "id_pesanan is not set in GET parameters.";
        }
    }

    public function getPesananData(){
        $result = $this->getDataPesananById($this->isSetGET());

        return $pesanan = new Pesanan(
            $result->getIdPesanan(),
            $result->getIdUser(), 
            $result->getIdLokasiMasuk(), 
            $result->getTglMasuk(), 
            $result->getTglKeluar(), 
            $result->getJmlPengujung(), 
            $result->getTotalHarga() 
            ); 
    }

    public function updateDataPesanan(Pesanan $pesanan){
        return $this->pesanan_model->updatePesananByID($pesanan);
    }

    public function getUserByID($id){
        return $this->user_model->getUserByID($id)[0];
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
        // $this->insertPostUserData
        $userLastInsertedId = $this->insertPostUserData();
        $userObject = $this->user_model->getUserByID($userLastInsertedId)[0];
        $lokasiObject = $this->getPostLokasiMasuk();
        return new Pesanan(null,
            $userObject->getIdUser(),
            $lokasiObject->getIdLokasiMasuk(), // butuh buat lokasi masuk
            $_POST['tanggal-berangkat'],
            $_POST['Tanggal-Pulang'],
            $_POST['jumlah-pengunjung'],
            (int)($_POST['jumlah-pengunjung']) * 10000,
        );
    }

    public function getAllLokasiMasuk(){
        return $this->lokasi_model->getAllTempatMasuk();
    }

    public function getPostLokasiMasuk(){
        if($this->isSet()){
            $userObject = $this->lokasi_model->getTempatMasukById((int) $_POST['tempat-masuk'])[0];
            return new LokasiMasuk(
                (int)$_POST['tempat-masuk'],
                $userObject->getNamaLokasi(),
                $userObject->getAlamat(),
                $userObject->getMapLink(),
                $userObject->getJenisLokasi()
            );
        }
        
    }
 
    public function submitBook(){

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        sleep(1);
        $user = $this->getPostUserData();
        $pesanan = $this->getPostPesananData();

        if($this->isSet()){

            $this->user_model->insertUser($user);
            sleep(3);
            $this->pesanan_model->insertPesanan($pesanan);
            sleep(1);
            header("location:../index.php");
            echo "<script> alert('Berhasil Submit Pesanan !');</script>";

        } else {
            echo "<script> alert('Gagal Submit Pesanan');</script>";
        }
    }
}

}


$test = new book_controller();
$test->submitBook();

// $test->getAllLokasiMasuk();

// var_dump($_POST);
// var_dump((int)$_POST['tempat-masuk']);
// var_dump($test->getPostLokasiMasuk());

// $res = $test->getPostUserData();
// var_dump($res);
// var_dump($test->isSet());
// echo $_POST['nama-depan'];
// // $userLastInsertedId = $test->insertPostUserData();
// $resultLastId = $test->getPostPesananData();
// var_dump($resultLastId->getTotalHarga());
// echo $resultLastId->getNamaDepan();
// var_dump($resultLastId)
//  'ID terakhir dimasukan : '.$resultLastId['id_user'];
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

// var_dump($_POST);

?>

