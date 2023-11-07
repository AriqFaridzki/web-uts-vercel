<?php 

class Creds {
    private $id_user;
    private $username;
    private $password;
    private $roles;

    public function __construct($id_user=null, $username, $password, $roles) {
        $this->id_user = $id_user;
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRoles() {
        return $this->roles;
    }

    public function setRoles($roles) {
        $this->roles = $roles;
    }
}


?>