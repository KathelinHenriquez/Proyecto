<?php
class notaModelo extends Model{
        private $idEstudiante;
        private $idMateria;
        private $nota;

        public function __construct(){
            parent::__construct();
        }
        public function getIdEstudiante(){
            return $this->idEstudiante;
        }
        public function getIdMateria(){
            return $this->idMateria;
        }
        public function getNota(){
            return $this->nota;
        }


        public function setIdEstudiante($idEstudiante){
            $this->idEstudiante = $idEstudiante;
        }
        public function setIdMateria($idMateria){
            $this->idMateria = $idMateria;
        }
        public function setNota($nota){
            $this->nota = $nota;
        }
        public function modificarNota(){
            $sql = "UPDATE notas 
            SET idestudiante=".$this->idEstudiante.", idmateria=".$this->idMateria.", nota=".$this->nota."  WHERE idestudiante=".$this->idEstudiante." and idmateria=".$this->idMateria;
            // print_r($sql).die();
            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }
        
        public function insertarNotas(){
            $sql = "INSERT INTO notas (idestudiante, idmateria, nota) 
            VALUES (".$this->idEstudiante.",".$this->idMateria.",".$this->nota.")";
            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }

        


}


?>