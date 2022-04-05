<?php
include "protec.php";
include "conexion.php";
  $sql="SELECT usuario, victorias from scoreboard GROUP BY usuario_id ORDER BY victorias DESC LIMIT 1";
  $res=mysqli_query($link,$sql);
  if(mysqli_num_rows($res)){
    $primer=mysqli_fetch_array($res);
  }
  $sql="SELECT usuario, victorias FROM scoreboard GROUP BY usuario_id ORDER BY victorias DESC LIMIT 1,1";
  $res=mysqli_query($link,$sql);
  if(mysqli_num_rows($res)){
    $segundo=mysqli_fetch_array($res);
  }
  $sql="SELECT usuario, victorias FROM scoreboard GROUP BY usuario_id ORDER BY victorias DESC LIMIT 2,1";
  $res=mysqli_query($link,$sql);
  if(mysqli_num_rows($res)){
    $tercero=mysqli_fetch_array($res);
  }
  $sql=sprintf("SELECT usuario, victorias, empates, derrotas FROM scoreboard WHERE usuario_id='%d'", $_SESSION["usuario_id"]);
  $res=mysqli_query($link,$sql);
  if(mysqli_num_rows($res)){
    $u=mysqli_fetch_array($res);
  }
?>
<!doctype html>
<html lang="es">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>jugamos?</title>
 </head>
 <body>
     <?php include "navbar.php"; ?>
<br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div style="height: 100px;" class="card">
                <div class="card-body">
                <form method="POST" action="juego.php">
                  <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                      <select name="eleccion" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option value="1">papel</option>
                        <option value="2">piedra</option>
                        <option value="3">tijera</option>
                      </select>
                    </div>
                    <div class="col-auto my-1">
                      <div class="custom-control custom-checkbox mr-sm-2">
                        <input name="preferencia" type="checkbox" value="on" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Recordar esta opcion</label>
                      </div>
                    </div>
                    <div class="col-auto my-1">
                      <button type="submit" class="btn btn-danger">Jugar  <i class="bi bi-controller"></i></button>
                    </div>
                  </div>
                </form>
                </div>
                </div>
            </div>
            <div class="col">
                <div style="height: 100px;" class="card">
                <div class="card-body">
                <?php if(isset($_GET["op"])){
                        if($_GET["op"]=="VICTORIA"){ ?>
                          <div class="alert alert-success" role="alert">VICTORIA!!</div> <?php 
                        }else{
                          if($_GET["op"]=="DERROTA"){ ?>
                            <div class="alert alert-danger" role="alert">DERROTA!!</div> <?php               
                          }else{
                            if($_GET["op"]=="EMPATE"){ ?>
                              <div class="alert alert-warning" role="alert">EMPATE!!</div> <?php         
                            }}}
                      }else{ ?>
                          <div class="alert alert-primary" role="alert">JUGUEMOS!!!</div> <?php
                      } ?>
                </div>
                </div>
            </div>            
        </div>
    </div>
    <br>
    <div class="container">
      <div class="row-md-4">
          <div class="card">
            <div class="card-body">
              <table class="table">
                <thead>
              <tr style="background-color:#f2e016">   
                <th scope="col">Usuario</th>
                <th scope="col">Victorias</th>
                <th scope="col">Derrotas</th>
                <th scope="col">Empates</th>
              </tr>  
                </thead>
                <tbody>
                <tr style="background-color:#418ef2">
                <td><?php print_r($u["usuario"]); ?></td>
                <td><?php print_r($u["victorias"]); ?></td>
                <td><?php print_r($u["derrotas"]); ?></td>
                <td><?php print_r($u["empates"]); ?></td>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
    <br>
    <div class="container";>
      <div class="row-md-4">
        <div class="card">
          <div class="card-body">
          <table class="table table-bordered border-warning">
            <thead>
              <tr style="background-color:#f2e016">
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Victorias</th>
              </tr>
            </thead>
            <tbody>
              <tr style="background-color:#02e606">
                <th scope="row"><i class="bi bi-trophy"></i></th>
                <td><?php print_r($primer["usuario"]); ?> </td>
                <td><?php print_r($primer["victorias"]); ?></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td><?php print_r($segundo["usuario"]); ?></td>
                <td><?php print_r($segundo["victorias"]); ?></td>
              <tr>
                <th scope="row">3</th>
                <td><?php print_r($tercero["usuario"]); ?></td>
                <td><?php print_r($tercero["victorias"]); ?></td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="text-center">
    <button type="button" class="btn btn-secondary"><a href="index.php">SALIR</a></button>
    </div>
 <!-- Javascript -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"crossorigin="anonymous"></script>
 </body>
</html>