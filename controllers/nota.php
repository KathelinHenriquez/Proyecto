<?php
    class Nota extends Controller{
        public function __construct(){
            parent::__construct();
        }

        public function agregar(){
            if(!empty($_POST)){
                echo($_POST);
                $this->getModel()->setIdEstudiante($_POST["txtEstudiante"]);
                $this->getModel()->setIdMateria($_POST["sMateria"]);
                $this->getModel()->setNota($_POST["txtNota"]);

                $respuesta = $this->getModel()->insertarNotas();
                echo $respuesta;
                }
            }
            public function modificarN(){
                if($_SESSION['nivel']==1){
                        print_r($_POST);
                        $this->getModel()->setIdEstudiante($_POST["idestudiante"]);
                        $this->getModel()->setIdMateria($_POST["idmateria"]);
                        $this->getModel()->setNota($_POST["nota"]);
        
                        $res = $this->getModel()->modificarNota();
                        echo $res;
                    }                
            }
        
    }
?>