<?php
    class App{
        public function __construct(){
            $url = $_GET['url'];
            $urlArreglo = explode("/", $url);
            $controlador = array_key_exists(0,$urlArreglo)?$urlArreglo[0]:"";
            $metodo = array_key_exists(1,$urlArreglo)?$urlArreglo[1]:"";
            // print_r($metodo);
            $urlControlador = 'controllers/'.$controlador.'.php';
            if(file_exists($urlControlador)){
                require_once $urlControlador;
                $controller = new $controlador();
                $controller->loadModel($controlador);
                if(method_exists($controller, $metodo)){
                    $controller->$metodo();
                }
            }
        }
    }
?>