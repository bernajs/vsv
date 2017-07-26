<?php
// include_once("_inc/inc.head.php");
$seccion_activa = '';
if(isset($_GET['call'])){
    $seccion_activa = $_GET['call'];
}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Eleve</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
        i{
          font-size: 150px !important;
        }
        </style>
  </head>

  <body>
    <div class="container">
      <div class="row text-center">
        <!-- <img src="img/quintear_logo.png" class="img-fluid text-center" alt=""> -->
        <div class="col-xs-12 col-md-12 col-lg-12 text-center margint-40">
          <h2 class="negrita">¡GRACIAS!</h2>
          <p class="subtitulo txt-gris-claro">Tu solicitud ha sido enviada y entrará al proceso de autorización. Te pedimos un <br>poco de tiempo para darte respuesta en tiempo máximo de 24 horas.</p>
        </div>
        <div class="col-xs-12 col-md-12 col-lg-12 text-center">
          <i class="fa fa-check cs" aria-hidden="true"></i>
          <p class="margint-40"><a href="index.php" class="subtitulo txt-morado-claro">Ir a la página de inicio</a></p>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>

  </html>
