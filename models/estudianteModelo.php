<?php
    class estudianteModelo extends Model{
        private $id;
        private $nombre;
        private $apellidos;
        private $edad;
        private $fechaNa;
        private $contacto;
        private $grado;
        private $representante;
        private $direccion;

        public function __construct(){
            parent::__construct();
        }

        public function getId(){
            return $this->id;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellidos(){
            return $this->apellidos;
        }
        public function getEdad(){
            return $this->edad;
        }
        public function getFechaNa(){
            return $this->fechaNa;
        }
        public function getContacto(){
            return $this->contacto;
        }
        public function getGrado(){
            return $this->grado;
        }
        public function getRepresentante(){
            return $this->representante;
        }
        public function getDireccion(){
            return $this->direccion;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        public function setEdad($edad){
            $this->edad = $edad;
        }
        public function setFechaNa($fechaNa){
            $this->fechaNa = $fechaNa;
        }
        public function setContacto($contacto){
            $this->contacto = $contacto;
        }
        public function setGrado($grado){
            $this->grado = $grado;
        }
        public function setRepresentante($representante){
            $this->representante = $representante;
        }
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }

        public function listadoEstudiantes(){
            $arreglo = [];
            $sql = "SELECT p.id, p.nombre, p.apellidos, p.edad, p.contacto, g.id as grado
            FROM estudiante p INNER JOIN grado g ON g.id=p.grado";
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_object()){
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function listadoGrado(){
            $arreglo = [];
            $sql = "SELECT* FROM grado";
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_object()){
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }
        public function listadoMateria(){
            $arreglo = [];
            $sql = "SELECT* FROM materias";
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_object()){
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }
        public function notaFiltrado(){
            $arreglo = [];
            $sql = "SELECT idestudiante, idmateria, nota FROM notas WHERE idestudiante=".$this->id;
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_object()){
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function insertarEstudiantes(){
            $sql = "INSERT INTO estudiante(nombre, apellidos, edad, fechaNa, contacto, grado, representante, direccion) 
            VALUES ('".$this->nombre."','".$this->apellidos."',".$this->edad.",'".$this->fechaNa."','".$this->contacto."',".$this->grado.",'".$this->representante."','".$this->direccion."')";
            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }

        public function estudianteFiltrado(){
            $arreglo = [];
            $sql = "SELECT * FROM estudiante WHERE id=".$this->id;
            $datos = $this->getDb()->conectar()->query($sql);
            while($fila = $datos->fetch_object()){
                $arreglo[] = json_decode(json_encode($fila),true);
            }
            return $arreglo;
        }

        public function modificarEstudiante(){
            $sql = "UPDATE estudiante 
            SET nombre='".$this->nombre."', apellidos='".$this->apellidos."', edad=".$this->edad.",fechaNa='".$this->fechaNa."', contacto='".$this->contacto."', grado=".$this->grado.",representante='".$this->representante."', direccion='".$this->direccion."'  WHERE id=".$this->id;
            // print_r($sql).die();
            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }

        public function eliminarEstudiante(){
            $sql = "DELETE FROM estudiante WHERE id=".$this->id;
            $res = $this->getDb()->conectar()->query($sql);
            return ($res===TRUE)?true:false;
        }
    }
?>