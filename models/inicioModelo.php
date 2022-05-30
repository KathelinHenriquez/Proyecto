<?php
    class InicioModelo extends Model{
        private $usuario;
        private $pass;
        private $nivel;

        public function __construct(){
            parent::__construct();
        }

        public function getUsuario(){
            return $this->usuario;
        }
        public function getPass(){
            return $this->pass;
        }
        public function getNivel(){
            return $this->nivel;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        public function setPass($pass){
            $this->pass = $pass;
        }
        public function setNivel($Nivel){
            $this->nivel = $nivel;
        }

        public function validarLogin(){
            $nivel = "";
            $sql = "SELECT nivel FROM usuario 
            WHERE usuario='".$this->usuario."' AND pass='".$this->pass."'";
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_assoc()){
                $nivel = $fila['nivel'];
            }
            return $nivel;
        }
    }
?>