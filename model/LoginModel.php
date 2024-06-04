<?php

    class LoginModel{
        private $db;
        private $user;
        public function __construct(){
            require_once("ConnectDB.php");
            $this->db=Connect::connect();
            $this->user=array();
        }

        public function getUser($email, $password) {
            $consulta = $this->db->query("SELECT * FROM usuarios where CorreoElectronico='$email' and Password='$password'");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
                $this->user[]=$filas;
            }
            return $this->user;
        }
    }
?>