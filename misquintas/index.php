<?php include_once('../_inc/inc.usuario.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Quintear - Socios</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
<style media="screen">
  .container{margin-top: 80px;}
  .navbar a{color:white !important;}
  body{background-color: #EFF2F7;}
</style>


    <!--  -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>

  <body>

    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top bt cw">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Navbar</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?call=reservaciones">Escritorio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?call=suscripcion">Suscripción</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?call=perfil">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?call=historial">Pagos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Salir</a>
          </li>
          <li class="nav-item dropdown">
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container mb-4">
      <?php
if (isset($_GET['call'])) {
    if (file_exists('views/view.'.$_GET['call'].'.php')) {
        include('views/view.'.$_GET['call'].'.php');
    } else {
        include('views/view.perfil.php');
    }
} else {
    include('views/view.perfil.php');
}
?>

    </div><!-- /.container -->
    <!-- <footer>
      <div class="row justify-content-center">
        <div class="col-12 div-suscribete">
          <div class="row align-items-center">
          <div class="col">
          <h3>Suscribete</h3>
          <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
          </div>
          <div class="col">
            <div class="form-group">
              <input type="text" id="email_suscribete" name="email_suscribete" class="form-control">
              <a class="btn btn-primary btn-suscribirme">Suscribirme</a>
            </div>
          </div>
        </div>
      </div>
        <div class="col-12 div-info">
          <div class="row justify-content-center">
            <div class="col-4">
              <h4>Ligas de interés</h4>
              <ul>
                <li><a href="/inicio">Inicio</a></li>
                <li><a href="/nosotros">Nosotros</a></li>
                <li><a href="/faq">FAQ</a></li>
                <li><a href="/servicios">Servicios</a></li>
                <li><a href="/Mapa">Mapa</a></li>
              </ul>
            </div>
            <div class="col-4">
              <h4>Cuenta</h4>
              <ul>
                <li><a href="/accesar">Accesar</a></li>
                <li><a href="/cuenta">Mi cuenta</a></li>
                <li><a href="/logout.php">Salir</a></li>
              </ul>
            </div>
            <div class="col-4">
              <h4>Contacto</h4>
              <address class="">
              <strong>CSV</strong><br>
              Dirección #234, Mty <br>
              Tel. 81 81828340 <br>
              vsv@mail.com <br>
              </address>
            </div>
          </div>
        </div>
        <div class="col-12 div-terminos">
          <span class="float-left">VSV 2017. Derechos Reservados</span>
          <span class="float-right">Privacidad</span>
          <span class="float-right">Términos y condiciones</span>
        </div>
      </div>
    </footer> -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
$('.card img').attr('src', 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15c69f7d077%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15c69f7d077%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22118.0546875%22%20y%3D%2297.2%22%3E318x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.js"></script>
<script src="js/app.js" charset="utf-8"></script>
  </body>
</html>
