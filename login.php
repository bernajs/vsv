<?php
include_once('admin/_class/class.service.php');
include_once('_inc/inc.head.php');
$Service = new Service();
if (isset($_GET['call'])) {
    $active = $_GET['call'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Quintear</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.css" />
    <style media="screen">
      .main{position: absolute;left: 25%;top: 50%;margin-left: -150px;margin-top: -150px;}
      .left-children-1{background-color: #3e3e3e; height: 18.750em;}
      .left-children-2{background-color: #6d6d6d; height: 18.750em;}
      .left-parent{padding:0px;}
      body{background-color: black;}
      .parent-right{background-color: white; padding-top: 5em;}
      .left-parent a{border:1px solid white; background: transparent; color:white !important;}
      .descripcion-registro{font-size: 12px;}
      .btn-secondary:hover{color:black !important;}
      body{
        background: url('img/quintear-bg-login-usuarios.jpg') no-repeat center center fixed;
        background-size: cover;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="row mt-md-3 mt-5">
        <div class="col-md-8 offset-md-2 col-12">
          <div class="row shadow">
        <div class="col-6 left-parent cw">
          <div class="col-12 p-md-5 pt-5  left-children-1">
            <h6 class="text-center my-3">¿Aún no tienes una cuenta?</h6>
            <p class="descripcion-registro text-center mb-4">Descripción de por qué te conviene estar en la plataforma, para que te animes a  registrarte</p>
            <div class="row">
              <div class="col-md-8 offset-md-2 col-10 offset-1">
                <a href="misquintas/registro.php" class="btn btn-secondary fwidth">Registrarme</a>
              </div>
            </div>
          </div>
          <div class="col-12 p-md-5 pt-5 left-children-2">
            <div class="row align-items-center mt-5">
              <div class="col-12">
              <h6 class="text-center">Acceso a Socios con Quinta</h6>
              <div class="row">
                <div class="col-md-8 offset-md-2 col-10 offset-1">
                  <a href="misquintas/login.php" class="btn btn-secondary fwidth">Ingresar</a>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-6 parent-right px-md-5">
          <img src="img/quintear_logo.png" alt="Quintear" class="img-fluid text-center">
          <p class="text-center my-5">Acceso a usuarios</p>
          <form id="frmLogin" class="row align-items-center">
            <div class="col-12 form-group">
              <label for="correo">Correo</label>
              <input type="email" name="correo" id="correo" class="form-control isRequired" value="">
            </div>
            <div class="col-12 form-group">
              <label for="contrasena">Contraseña</label>
              <input type="password" name="contrasena" id="contrasena" class="form-control isRequired" value="">
            </div>
            <div class="col-12 form-group text-center">
              <a class="btn btn-primary bs mb-3 fwidth cw onLogin">INGRESAR</a>
              <span> Olvidé mis accesos</span>
            </div>
          </form>
        </div>
      </div>
      </div>
    </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.js"></script>
    <script src="js/app.js" charset="utf-8"></script>
  </body>
</html>
