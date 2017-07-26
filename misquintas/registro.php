
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

    <!--  -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->
    <style media="screen">
      body{background-color: black;}
      .left-parent{height: 100vh}
      @media (max-width: 576px) { .left-parent{height: auto !important;} }
      .right-parent{background: url('../img/5.jpg') no-repeat center center fixed;}
      .container{margin-left: 0px; width:100%}
      textarea{height:50px;}
    </style>
  </head>

  <body>
    <div class="container">
      <div class="main row justify-content-center">
        <div class="left-parent col-12 col-md-6 bw p-5">
          <div class="row">
            <div class="col-12 p-md-5">
              <img src="../img/quintear_logo.png" class="img-fluid" alt="">
              <h4 class="my-4">Registro</h4>
              <span>Requisitos para el registro de usuario</span><br>
              <span>Requisitos para el registro de usuario</span><br>
              <span>Requisitos para el registro de usuario</span><br>
              <span>Requisitos para el registro de usuario</span><br>
              <span>Requisitos para el registro de usuario</span><br>
              <p class="mt-4">
                Para poder asociarte necesitas cumplir con los requisitos mencionados y llenar la siguiente forma para completar el pre registro de tu cuenta. Tus datos se enviarán  para solicitar la autorización de tu cuenta y se te notificará en cuanto puedas comenzar a utilizarla
              </p>
            </div>
          </div>
        </div>
        <div class="right-parent col-12 col-md-6 px-md-5 px-4 py-5">
          <div class="row">
            <div class="col-12 col-lg-10 pt-5 pb-md-5 pb-5 px-5 child bw">
              <form id="frmRegistro">
                <div class="row">
                  <div class="form-group col-12">
                    <!-- <label for="nombre">Nombre</label> -->
                    <input type="text" name="nombre" id="nombre" class="form-control isRequired" value="" placeholder="Nombre">
                  </div>
                  <div class="form-group col-12">
                    <!-- <label for="correo">Correo</label> -->
                    <input type="email" name="correo" id="correo" class="form-control isRequired" value="" placeholder="Correo">
                  </div>
                  <div class="form-group col-6">
                    <!-- <label for="telefono">Teléfono</label> -->
                    <input type="text" name="telefono" id="telefono" class="form-control isRequired" value="" placeholder="Teléfono">
                  </div>
                  <div class="form-group col-6">
                    <!-- <label for="celular">Celular</label> -->
                    <input type="text" name="celular" id="celular" class="form-control isRequired" value="" placeholder="Celular">
                  </div>
                  <div class="form-group col-6">
                    <!-- <label for="celular">Celular</label> -->
                    <input type="password" name="contrasena" id="contrasena" class="form-control isRequired" value="" placeholder="Contraseña">
                  </div>
                  <div class="form-group col-6">
                    <!-- <label for="celular">Celular</label> -->
                    <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" class="form-control isRequired" value="" placeholder="Confirmar contraseña">
                  </div>
                  <div class="form-group col-12">
                    <!-- <label for="comentarios">Comentarios</label> -->
                    <textarea name="comentarios" id="comentarios" class="form-control isRequired" rows="8" cols="80" placeholder="Comentarios"></textarea>
                  </div>
                  <div class="col-12 form-check">
                    <p class="mt-3">Aquí pudiera ir una breve descripción de los términos y  condiciones para el registro de usuario por ejemplo.</p>
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="terminos" id="terminos" value="">
                      Leí y acepto los términos
                    </label>
                  </div>
                  <div class="col-12 mt-2">
                    <a class="onAsociarme btn btn-primary fwidth bs onRegistro cw">Asociarme</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container -->
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.js"></script>
    <script src="../js/app.js" charset="utf-8"></script>
  </body>
</html>
