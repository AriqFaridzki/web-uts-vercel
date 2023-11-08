<?php
require __DIR__.'/../config/database_operation.php';
require __DIR__.'/../model/Creds_model.php';
class Login_controller{

    private $creds_model;

    function __construct()
    {   
        $this->creds_model = new Creds_model();

    }

    public function login(){
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $user = $_POST['username'];
            $password = $_POST['password'];
    
            var_dump($this->creds_model->checkAuth($user, $password));
            if($this->creds_model->checkAuth($user, $password)){
                echo "Mabar gan ghassss";
                header('location:../view/pesanan_table.php');
            } else {
                // echo "<script> alert('Password atau username salah') </script>";
                // header('location:../view/login.html');
            }
    
        } else {
            echo "Username and password not provided in the POST request.";
        }
    }

}

$execute = new Login_controller();
var_dump(isset($_POST['username']) && isset($_POST['password']));
$execute->login();

?>
