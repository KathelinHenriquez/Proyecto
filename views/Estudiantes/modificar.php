<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Estudiante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once 'views/header.php';
    ?>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6 mt-4">
                <?php
                    $estudiante = $this->estudiantes;
                ?>
                <h4 class="text-primary text-center pb-2">Detalles del estudiante</h4>
                <form action="<?=constant('URL')?>estudiante/modificar" method="POST" id="frmEstudiante">
                    ID
                    <input type="text" class="form-control" name="txtId" value="<?=$estudiante[0]['id']?>" readonly>                                            
                    Nombres
                    <input type="text" class="form-control" name="txtNombres" value="<?=$estudiante[0]['nombre']?>">
                    Apellidos
                    <input type="text" class="form-control" name="txtApellidos" value="<?=$estudiante[0]['apellidos']?>">
                    Edad
                    <input type="text" class="form-control" name="txtEdad"  value="<?=$estudiante[0]['edad']?>" >
                    Fecha de Nacimiento
                    <input type="date" class="form-control" name="txtFechaNa" value="<?=$estudiante[0]['fechaNa']?>" >
                    Contacto
                    <input type="text" class="form-control" name="txtContacto" value="<?=$estudiante[0]['contacto']?>" >
                    Grado
                    <select id="" class="form-control" name="sGrado">
                        <?php
                            foreach ($this->grados as $value) {
                        ?>
                        <option value="<?=$value['id']?>" <?=($value['id']==$estudiante[0]['grado'])?'selected':'';?>><?=$value['grado']?></option>
                        <?php
                            }
                        ?>                        
                    </select>
                    Representante
                    <input type="text" class="form-control" name="txtRepre" value="<?=$estudiante[0]['representante']?>" >
                    Direccion
                    <input type="text-area" class="form-control" name="txtDireccion" value="<?=$estudiante[0]['direccion']?>" >
                    
                    <button class="btn btn-primary mt-2 btn-block btn-sm" id="btnModificar">Modificar</button>
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