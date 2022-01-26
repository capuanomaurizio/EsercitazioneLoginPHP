<?php
    class Utente{
        public $username;
        public $email;
        public $password;

        public function __construct($u, $e, $p){
            $this->username = $u;
            $this->email = $e;
            $this->password = $p;
        }
        
        public function getUsername(){
            return $this->username;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }
    }
?>