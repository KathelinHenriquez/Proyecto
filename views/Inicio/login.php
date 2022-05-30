<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-lg-4 col-md-4 col-sm-12 card">
                <div class="card-body">
                    <h2 class="text-center pt-3">Login</h2>  
                    <form action="<?=constant('URL')?>inicio/index" method="POST">
                        Usuario
                        <input type="text" class="form-control" name="txtUsuario">
                        Contraseña
                        <input type="password" class="form-control" name="txtPass">
                        <button class="btn btn-primary mt-4 mb-4 btn-block btn-sm">Iniciar sesión</button>
                    </form> 
                </div>                               
            </div> 
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>