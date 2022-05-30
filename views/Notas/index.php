<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas Estudiante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once 'views/header.php';
        $estudiante = $this->estudiantes;
        $materia = $this->materias;
        $nota = $this->notas;
    ?>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6 mt-4">
                <h2 class="text-center pt-3">Ingresar Notas</h2>  
                <form action="<?=constant('URL')?>nota/agregar" method="POST" id="frmNotas">
                <input class="form-control" type="hidden" value="<?php echo $estudiante[0]["id"] ?>" name="txtEstudiante">
                Materia:    
                <select class="form-control" name="sMateria">
                        <?php
                            foreach ($materia as $value) {
                        ?>
                        <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
                        <?php
                            }
                        ?>                        
                </select>
                Nota:
                <input type="number" class="form-control" name="txtNota">
                <button class="btn btn-primary mt-2 btn-block btn-sm" id="btnAddN">Agregar</button>
                </form>
                <a href="<?=constant('URL')?>estudiante/index" class="btn btn-block btn-primary mt-3">Volver</a>   
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
    <div class="col-12">
        <h1>Notas de <?php echo $estudiante[0]['nombre'] ?></h1>
    </div>
    <div class="col-12 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Puntaje</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sumatoria = 0; 
                    foreach($nota as $nota){ 
                        $sumatoria += $nota["nota"];            
                ?>
                    <tr>
                        <td>
                    <select id="" class="form-control" name="sGrado" disabled>
                        <?php
                            foreach ($materia as $value) {
                        ?>
                        <option value="<?=$value['id']?>" <?=($value['id']==$nota['idmateria'])?'selected':'';?>><?=$value['nombre']?></option>
                        <?php
                            }
                        ?>                        
                    </select>
                        </td>
                        <td>
                            <form action="<?=constant('URL')?>nota/modificarN" method="POST" class="form-inline" id="frmActualizar">
                                <input type="hidden" type="number" value="<?php echo $nota["idestudiante"] ?>" name="idestudiante">
                                <input type="hidden" type="number" value="<?php echo $nota["idmateria"] ?>" name="idmateria">
                                <input value="<?php echo $nota["nota"] ?>" required min="0" name="nota" type="number" class="form-control">
                                
                                <button id="btnModificar" class="btn btn-primary mx-2">Modificar</button>
                            </form>
                        </td>
                        
                    </tr>
                    <?php }?>
            </tbody>
            <tfoot>
                <tr>
                    <td>Promedio</td>
                    <td>
                        <strong>
                            <?php
                            $promedio = $sumatoria / count($materia);
                            echo $promedio;
                            ?>
                        </strong>
                    </td>
                </tr>
            </tfoot>
        </table>
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
    <script src="<?=constant('URL')?>public/js/notas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>

