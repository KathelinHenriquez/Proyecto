<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Estudiante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once 'views/header.php';
    ?>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6 mt-4">
                <h2 class="text-center pt-3">Nuevo estudiante</h2>  
                <form action="<?=constant('URL')?>estudiante/agregar" method="POST" id="frmEstudiantes">
                    Nombres
                    <input type="text" class="form-control" name="txtNombre" placeholder="Carlos Eduardo">
                    Apellidos
                    <input type="text" class="form-control" name="txtApellidos" placeholder="Gomez Lopez">
                    Edad
                    <input type="number" class="form-control" name="txtEdad">
                    Fecha de Nacimiento
                    <input type="date" class="form-control" name="txtFechaNa" >
                    Contacto(Celular)
                    <input type="text" class="form-control" name="txtContacto" placeholder="4567-1234">
                    Grado                   
                    <select class="form-control" name="sGrado" >
                        <?php
                            $datos = $this->grados;
                            foreach ($datos as $value) {
                        ?>
                            <option value="<?=$value['id']?>"><?=$value['grado']?></option>
                        <?php        
                            }
                        ?>                        
                    </select>
                    Representante
                    <input type="text" class="form-control" name="txtRepre" placeholder="Rosa Alvarez">
                    Direccion
                    <input type="text-area" class="form-control" name="txtDireccion">
                    
                    <button class="btn btn-primary mt-2 btn-block btn-sm" id="btnAdd">Agregar</button>
                </form>
                <a href="<?=constant('URL')?>estudiante/index" class="btn btn-block btn-primary mt-3">Volver</a>   
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <?php
        require_once 'views/footer.php';
    ?>
    <script>
        var url = "<?=constant('URL')?>"; 
    </script>
    <script src="<?=constant('URL')?>public/js/jquery-3.6.0.min.js"></script>
    <script src="<?=constant('URL')?>public/js/estudiantes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>