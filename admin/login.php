<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Title -->
  <title>Control de acceso</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta charset="UTF-8">
  <meta name="description" content="Eleve admin" />
  <meta name="keywords" content="admin,dashboard" />
  <meta name="author" content="Steelcoders" />

  <!-- Styles -->
  <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css" />
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">

  <!-- Theme Styles -->
  <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
            <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body class="">
  <div class="loader-bg"></div>
  <div class="loader">
    <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>
        <div class="gap-patch">
          <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
      <div class="spinner-layer spinner-teal lighten-1">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>
        <div class="gap-patch">
          <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
      <div class="spinner-layer spinner-yellow">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>
        <div class="gap-patch">
          <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
      <div class="spinner-layer spinner-green">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>
        <div class="gap-patch">
          <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="mn-content valign-wrapper">
    <main class="mn-inner container">
      <div class="valign">
        <div class="row">
          <div class="col s12 m8 l6 offset-l3 offset-m2">
            <div class="card white darken-1 card-panel hoverable">
              <div class="card-content ">
                <div class="col s8 m8 l8 offset-m1 offset-l1 offset-s1">
                  <center><img class="responsive-img" src="assets/images/logo.png" alt="" style="max-width:200px; height:auto; width:100%;"></center>
                </div>
                <div class="row div-login">
                  <form id="frmLogin" name="formLogin">
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="email" type="email" class="validate">
                        <label for="email">Correo</label>
                      </div>
                      <div class="input-field col s12">
                        <input id="password" type="password" class="validate">
                        <label for="password">Contraseña</label>
                      </div>
                      <div class="col s12 m12 l12">
                        <a class="waver-effect waves-light btn onClickLoginAdmin">Entrar</a>
                      </div>
                      <br>
                      <div class="col s8 m8 l8" style="display:none;">
                        <a href="recover.php">Recuperar contraseña</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Javascripts -->
  <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
  <script src="assets/plugins/materialize/js/materialize.min.js"></script>
  <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
  <script src="assets/js/alpha.min.js"></script>
  <script type="text/javascript" src="../js/init.js"></script>

</body>

</html>