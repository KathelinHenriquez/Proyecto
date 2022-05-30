<?php
    class Estudiante extends Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            if(isset($_SESSION['nivel'])){
                $pagina = 'Estudiantes/index';
                $this->getView()->loadView($pagina);
            } else {
                $pagina = 'Inicio/login';
                $this->getView()->loadView($pagina);
            }            
        }

        public function mostrarEstudiantes(){
            // Consulta a base de datos
            $datos = $this->getModel()->listadoEstudiantes();
            // print_r($datos);
            $tr = '';
            foreach ($datos as $value) {
                $urlEditar = constant('URL').'estudiante/modificar?id='.$value['id'];
                $urlEliminar = constant('URL').'estudiante/eliminar?id='.$value['id'];
                $urlNota = constant('URL').'estudiante/notas?id='.$value['id'];
                $tr .='<tr>
                <td>'.$value['id'].'</td>
                <td>'.$value['nombre'].'</td>
                <td>'.$value['apellidos'].'</td>
                <td>'.$value['edad'].'</td>
                <td>'.$value['contacto'].'</td>
                <td>'.$value['grado'].'</td>
                <td class="text-center">                             
                <div class="btn-group">';
                if($_SESSION['nivel']==1){
                    $tr .= '<a href="'.$urlEliminar.'" class="btn btn-primary btn-sm" id="btnEliminar">Eliminar</a>
                    <a href="'.$urlEditar.'" class="btn btn-dark btn-sm">Modificar</a>
                    <a href="'.$urlNota.'" class="btn btn-info btn-sm">Notas</a>';
                }  else{
                    echo('Acceso denegado');
                }          
                $tr .= '</div>
                </td>
                </tr>';
            }
            echo $tr;
        }

        public function nuevo(){
            if($_SESSION['nivel']==1){
                $this->getView()->grados = $this->getModel()->listadoGrado();
                $pagina = 'Estudiantes/nuevo';
                $this->getView()->loadView($pagina);
            } else {
                $pagina = 'Estudiantes/index';
                $this->getView()->loadView($pagina);
            }            
        }

        public function agregar(){
            if(!empty($_POST)){
                $this->getModel()->setNombre($_POST["txtNombre"]);
                $this->getModel()->setApellidos($_POST["txtApellidos"]);
                $this->getModel()->setEdad($_POST["txtEdad"]);
                $this->getModel()->setFechaNa($_POST["txtFechaNa"]);
                $this->getModel()->setContacto($_POST["txtContacto"]);
                $this->getModel()->setGrado($_POST["sGrado"]);
                $this->getModel()->setRepresentante($_POST["txtRepre"]);
                $this->getModel()->setDireccion($_POST["txtDireccion"]);

                $respuesta = $this->getModel()->insertarEstudiantes();
                echo $respuesta;
            }
        }

        public function modificar(){
            if($_SESSION['nivel']==1){
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->getModel()->setId($id);
                    $this->getView()->estudiantes = $this->getModel()->estudianteFiltrado();
    
                    $this->getView()->grados = $this->getModel()->listadoGrado();
                    $pagina = 'Estudiantes/modificar';
                    $this->getView()->loadView($pagina);                
                } else {
                    // print_r($_POST);
                    $this->getModel()->setId($_POST["txtId"]);
                    $this->getModel()->setNombre($_POST["txtNombres"]);
                    $this->getModel()->setApellidos($_POST["txtApellidos"]);
                    $this->getModel()->setEdad($_POST["txtEdad"]);
                    $this->getModel()->setFechaNa($_POST["txtFechaNa"]);
                    $this->getModel()->setContacto($_POST["txtContacto"]);
                    $this->getModel()->setGrado($_POST["sGrado"]);
                    $this->getModel()->setRepresentante($_POST["txtRepre"]);
                    $this->getModel()->setDireccion($_POST["txtDireccion"]);
    
                    $res = $this->getModel()->modificarEstudiante();
                    echo $res;
                }
            }   else{
                $pagina = 'Estudiantes/index';
                $this->getView()->loadView($pagina); 
            }                    
        }
        public function notas(){
            if($_SESSION['nivel']==1){
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $this->getModel()->setId($id);
                    $this->getView()->estudiantes = $this->getModel()->estudianteFiltrado();
    
                    $this->getView()->materias = $this->getModel()->listadoMateria();
                    $this->getView()->notas = $this->getModel()->notaFiltrado();
                    $pagina = 'Notas/index';
                    $this->getView()->loadView($pagina); 
                }
            }
        }

        public function eliminar(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $this->getModel()->setId($id);

                $res = $this->getModel()->eliminarEstudiante();
                echo $res;
            }
        }
        

    }
?>