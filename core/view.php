<?php
    class View{
        public function __construct(){

        }

        public function loadView($pagina){
            require_once 'views/'.$pagina.'.php';
        }
    }
?>