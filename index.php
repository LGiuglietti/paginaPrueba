<!doctype html>
<html lang="es">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Plantilla Básica</title>
 </head>
 <body>
    <div class="container">
        <br>
        <div class="row">
            <div class="col">
                <div class="card">   
                <div class="card-body">
                    <?php if(isset($_GET["op"])){
                        if($_GET["op"]=="CREADO"){ ?>
                            <div class="alert alert-success" role="alert">Usuario creado!!</div>
                    <?php }} ?>
                    <form method="POST" action="login.php">
                      <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario">
                        <label for="pass">Contraseña</label>
                        <input type="password" class="form-control" name="pass">
                        <br>
                        <?php if(isset($_GET["op"])){
                                    if($_GET["op"]=="RESTRINGIDO"){ ?>
                            <div class="alert alert-danger" role="alert">no hagas cagadas...</div>
                            <?php }} ?>
                        <?php if(isset($_GET["op"])){
                                    if($_GET["op"]=="INCORRECTO"){ ?>
                            <div class="alert alert-danger" role="alert">Usuario y/o contraseña incorrecto/s</div>
                            <?php }} ?>
                      </div>
                      <button type="submit" class="btn btn-primary">Confirmar</button>
                      <br><br>
                     <P> No tenes una cuenta?  &nbsp; <i class="bi bi-arrow-right"></i>   <a href="registro.php"> registrate!</a> </p>
                </div>
                </div>
            </div>
        </div>
    </div>
 <!-- Javascript -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"crossorigin="anonymous"></script>
 </body>
</html>