<?php
    class Model{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getDb(){
            return $this->db;
        }

        public function setDb($db){
            $this->db = $db;
        }
    }
?>