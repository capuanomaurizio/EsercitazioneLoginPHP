<?php
    class Utente{
        public $name;
        public $username;
        public $email;
        public $password;

        public function __construct($n, $u, $e, $p){
            $this->name = $n;
            $this->username = $u;
            $this->email = $e;
            $this->password = $p;
        }
        
        public function getName(){
            return $this->name;
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