<?php
    class Controller {
        private $view;
        private $model;

        public function __construct(){
            session_start();
            $this->view = new View();
        }

        public function loadModel($modelo){
            $urlModelo = 'models/'.$modelo.'Modelo.php';
            if(file_exists($urlModelo)){
                require_once $urlModelo;
                $nombreModelo = $modelo.'Modelo';
                $this->model = new $nombreModelo();
            }
        }

        public function getView(){
            return $this->view;
        }
        public function getModel(){
            return $this->model;
        }
    }
?>