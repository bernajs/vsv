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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- <link rel="stylesheet" href="css/animationscss.css"> -->
    <link rel="stylesheet" href="css/fullcalendar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.css" />
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>
    <script src="http://momentjs.com/downloads/moment-with-locales.js" charset="utf-8"></script>

    <style media="screen">
      .clima-div{display:none;top:90px;background-color: white;border-radius: 5px; padding: 10px;}
      .ver_clima{cursor: pointer; padding-top: 10px;}
      .icons-subheader{display: inline-block;border-right: 1px lightgray solid;padding:10px 12px 10px 10px; cursor: pointer;}
      .iredes{font-size: 17px;width:40px;}
      .sub-nav span{color: #BBBBBD;font-size: 20px;}
      .sub-nav{background-color:rgb(255, 255, 255);}
      .navbar{border-top: 1px solid lightgray;}
      .goLogin{color:black !important;border:1px black solid;}
      .goLogin:hover{background-color:black;border:1px black solid;color:white !important;}

      .sub-header{background-color: black;margin:0px 0px 40px 0px;width:100%;padding-left: auto;}
      .sub-header .container{padding: 50px;}
      .fb{padding-left: 13px;}
    </style>
  </head>

  <body>
    <div class="datos-header px-5 bw">
      <div class="col-12 pl-0">
        <span class="icons-subheader pr-2"> <i class="fa fa-phone mr-2" aria-hidden="true"></i>(81) 88808358</span>
        <span class="icons-subheader iredes fb"><i class="fa fa-facebook" aria-hidden="true"></i></span>
        <span class="icons-subheader iredes"><i class="fa fa-twitter" aria-hidden="true"></i></span>
        <span class="icons-subheader iredes"><i class="fa fa-instagram" aria-hidden="true"></i></span>
        <span class="float-right ver_clima">Ver pronóstico del clima <i class="fa fa-sun-o" aria-hidden="true"></i></span>
      </div>
    </div>
    <div class="col-3 clima-div bp">
      <?php include('views/view.clima.php'); ?>
    </div>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse px-4 px-md-5">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <i class="cs fa fa-bars" aria-hidden="true"></i>
      </button>
      <a class="navbar-brand" href="index.php"><img src="img/quintear_logo.png" class="img-fluid" alt=""></a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto py-3">
          <li class="nav-item mx-2 align-middle <?php if ($active == '' || $active == 'index') {
    echo 'active';
}?>">
            <a class="nav-link" href="index.php?call=quintas">Quintas</a>
          </li>
          <li class="nav-item mx-2 align-middle <?php if ($active == 'servicio') {
    echo 'active';
}?>">
            <a class="nav-link" href="index.php?call=servicios">Servicios</a>
          </li>
          <li class="nav-item mx-2 align-middle">
            <a class="nav-link" href="#">Mapa</a>
          </li>
          <li class="nav-item mx-2 align-middle">
            <a class="nav-link" href="#">Contacto</a>
          </li>
          <?php if ($uid): ?>
            <li class="ml-2 align-middle"><a href="index.php?call=perfil" class="btn btn-primary nb goLogin cs">Mi perfil</a></li>
          <?php else: ?>
          <li class="ml-2 align-middle"><a href="login.php" class="btn btn-primary nb goLogin cs">Iniciar sesión</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
    <div class="sub-header cw">
      <div class="container px-md-0">
        <div class="row">
          <div class="col-12 align-self-center">

          </div>
        </div>
        <h1>Resultados</h1>
        <div class="content">
        <p>Descripción de la búsqueda realizada</p>
      </div>
      </div>
    </div>
    <div class="container my-5">
      <?php
if (isset($_GET['call'])) {
    if (file_exists('views/view.'.$_GET['call'].'.php')) {
        include('views/view.'.$_GET['call'].'.php');
    } else {
        include('views/view.inicio.php');
    }
} else {
    include('views/view.inicio.php');
}
?>
    </div>
    <footer>
      <div class="">
        <div class="col-12 div-suscribete bt py-4 px-3 p-md-5">
          <div class="row align-items-center">
          <div class="col-12 col-md-6 offset-md-1">
            <h3>Suscribete</h3>
            <span>Conoce nuevos lugares y promociones en nuestro boletín mensual.</span>
          </div>
          <div class="col-12 col-md-5 mt-2 mt-md-0 float-md-right">
            <div class="row">
              <div class="col-md-8 offset-md-4">
                <input type="text" placeholder="Tu email" id="email_suscribete" name="email_suscribete" class="form-control">
                <a class="btn btn-primary btn-suscribirme bs">Suscribirme</a>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="col-12 div-info bh p-3 p-md-5">
          <div class="row justify-content-around">
            <div class="col-3">
              <div class="row">
                <div class="col-md-10 offset-md-2 f-interes">
              <h4>Ligas de interés</h4>
              <ul>
                <li><a href="/inicio">Inicio</a></li>
                <li><a href="/nosotros">Nosotros</a></li>
                <li><a href="/faq">FAQ</a></li>
                <li><a href="/servicios">Servicios</a></li>
                <li><a href="/Mapa">Mapa</a></li>
              </ul>
            </div>
          </div>
            </div>
            <div class="col-3">
              <div class="row">
                <div class="col-8 offset-md-4 f-cuenta">
              <h4>Cuenta</h4>
              <ul>
                <li><a href="/accesar">Accesar</a></li>
                <li><a href="/cuenta">Mi cuenta</a></li>
                <li><a href="/logout.php">Salir</a></li>
              </ul>
            </div>
          </div>
            </div>
            <div class="col-3">
              <div class="row">
                <div class="col-8 offset-md-4 f-contacto">

              <h4>Contacto</h4>
              <address class="">
              <strong>CSV</strong><br>
              Dirección #234, Mty <br>
              Tel. 81 81828340 <br>
              vsv@mail.com <br>
              <a href="http://instagram.com" class="pr-2 pr-md-4"><i class="cp fa fa-facebook" aria-hidden="true"></i></a>
              <a href="http://facebook.com" class="pr-2 pr-md-4"><i class="cp fa fa-instagram" aria-hidden="true"></i></a>
              <a href="http://twitter.com"><i class="cp fa fa-twitter" aria-hidden="true"></i></a>
              </address>
            </div>
          </div>
            </div>
            <div class="col-12">
              <hr>
              <div class="row">
                <div class="col-12 text-md-left text-center col-md-4 offset-md-1">
                  <span>Quintear 2017. Derechos Reservados.</span>
                </div>
                <div class="col-12 text-md-right text-center col-md-4 offset-md-2">
                  <a  href="aviso-de-privacidad.php">Privacidad</a>
                  <a class="ml-md-5 ml-2" href="index.php?call=terminos">Términos y condiciones</a>
                </div>
              </div>
          </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.js"></script>
    <script src="js/app.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.ver_clima').click(function(){
    $('.clima-div').show('slow');
  })
  $('.close_clima').click(function(){
    $('.clima-div').hide('slow');
  })
  moment.locale('es');
})
</script>
  </body>
</html>
