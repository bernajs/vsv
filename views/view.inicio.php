<?php
// Quintas destacadas
$quintas_destacadas = $Service->get_quintas_destacadas();
$quitnas_destacadas_pr = '';
if($quintas_destacadas){
  foreach ($quintas_destacadas as $quinta) {
    $calificacion = get_calificacion($quinta['calificacion']);
    $quintas_destacadas_pr .= '
    <div class="bg">
      <img src="http://placehold.it/940x528" class="image-fluid text-center">
      <div class="servicios-quinta row justify-content-between py-2">
      <div class="col-2 text-center center-text">
        <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
      </div>
      <div class="col-2 text-center center-text">
        <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
      </div>
      <div class="col-2 text-center center-text">
        <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
      </div>
      <div class="col-2 text-center center-text">
        <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
      </div>
      <div class="col-2 text-center center-text">
        <img src="http://www.dickson-constant.com/medias/images/catalogue/api/6088-gris-680.jpg" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
      </div>
    </div>
        <div class="row card-description">
          <div class="col text-center mt-2">'.$calificacion.'
            <div class="row quinta-title align-items-center text-center"><div class="col"><h4 class="m-0">'.$quinta['nombre'].'</h4></div></div>
            <div class="col-6 offset-3 mt-3">
            <a href="index.php?call=quinta&id='.$quinta['id'].'" class="btn btn-primary fwidth bs cw mb-2">Ver quinta</a>
            </div>
          </div>
      </div>
    </div>
    ';
  }
}
// <span>'.$quinta['descripcion'].'</span>

// Servicios destacados
$servicios_destacados = $Service->get_servicios_destacados();
$servicios_destacados_pr = '';
 if($servicios_destacados){
   foreach ($servicios_destacados as $servicio) {
     $detalles = json_decode($servicio['info']);
     $servicios_destacados_pr .= '
     <div class="col-md-3 col-6 align-items-stretch animated mt-md-0 mt-2 px-md-2 px-1">
       <div class="card text-center">
         <img class="card-img-top img-fluid" src="admin/uploads/servicio/'.$servicio['imagen'].'" alt="Card image cap">
         <div class="card-block py-2">
           <h5 class="card-title mb-0">'.$servicio['nombre'].'</h5>
         </div>
       </div>
     </div>
     ';
   }
 }

 // Promociones activas
 $promociones = $Service->get_promociones_activas();
 $promociones_pr = '';
 $promociones_swiper = '';
 if($promociones){
   foreach ($promociones as $promocion) {
     $promociones_pr .= '<img class="img-fluid" src="admin/uploads/promocion/'.$promocion['imagen'].'">';
     $promociones_swiper .= '<div class="swiper-slide"><img class="img-fluid" src="https://dummyimage.com/1960x640/000/fff"></div>';
 }
 }
 ?>

<div class="row filtro-fondo">
  <div class="col-12 col-md-3 offset-md-1 col-filtro cw">
    <div class="row align-items-center filtro-1 bp">
      <div class="col-12">
        <h2 class="text-center">Encuentra tu quinta</h2>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label for="evento">Evento</label>
          <select class="form-control" id="evento" name="evento">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
          </select>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="municipio">Municipio</label>
          <select class="form-control" id="municipio" name="municipio">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
          </select>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="personas">Personas</label>
          <select class="form-control" id="personas" name="personas">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
          </select>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="fecha">Fecha</label>
          <input type="date" id="fecha" name="fecha" class="form-control">
      </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="horario">Horario</label>
          <select class="form-control" id="horario" name="horario">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
          </select>
        </div>
      </div>
      <div class="col-12">
        <button type="button" class="btn fwidth bs btn-primary fwidth center-block onBuscar shadow">Buscar Quintas</button>
      </div>
    </div>
  </div>
</div>
<div class="main-container mt-md-5 mb-md-5 mt-4 mb-4">
<div class="row sliders row-eq-height">
  <div class="col-sm-12 pr-md-4 col-md-8 slider-left p-0 mb-2">
    <div class="slider">
      <?php echo $promociones_pr; ?>
    </div>
  </div>
  <div class="col-sm-8 col-md-4 col-lg-4 mt-2 mt-sm-0 slider-right">
    <div class="slider2">
      <?php echo $quintas_destacadas_pr; ?>
    </div>
  </div>
</div>
</div>
<div class="row servicios-destacados mt-md-5 pb-5">
  <div class="col-12 mt-md-5">
    <h2 class="my-5">Servicios destacados</h2>
  </div>
    <div class="col-12">
      <div class="row justify-content-around">
    <?php echo $servicios_destacados_pr; ?>
  </div>
  </div>
</div>
  <style media="screen">
  .filtro-fondo{
    padding:50px 3%;
    background: url('img/fondo.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  .servicios-destacados{
    background: url('img/5.jpg') no-repeat center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-color: darkgray;
    background-blend-mode: color-dodge;
  }
  .sub-header{display: none;}
  .slider-principal{padding:0px;}
  .main-container, .servicios-destacados {padding: 0px 10%;}
  .sliders{
    padding:0px!important;
    background-color: white;
    margin-top: 20px;
  }
  .servicios-quinta{
    border-bottom: 1px solid lightgray;
  }
  .container{margin-top: 0px !important;margin-bottom: 0px !important;}
  .container{width:100%;}
  .slider3 img, .slider2 img{
    width: 100%;
    height: 100%;
  }

  .slider2 .slick-next{right: -20px; color:#9e9e9e !important;}
  .slider2 .slick-prev{left: -20px; color:#9e9e9e !important;}
  .slider2 .slick-next::before{ color:#9e9e9e !important;}
  .slider2 .slick-prev::before{color:#9e9e9e !important;}
  .card-description, .servicios-quinta{background-color: #eaeae8}

  .slider2  img{display: inline;}

.slick-prev:before {
    content: "";
    font-family: 'FontAwesome';
    font-size: 22px;
}
.slick-next:before {
    content: "";
    font-family: 'FontAwesome';
    font-size: 22px;
}
      /*Div servicios*/
      .servicios-destacados-title{
        margin:40px 0px;
      }
      .quinta-title{height: 52px;}

  </style>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slick({autoplay:true, speed:1000, autoplaySpeed:5000, pauseOnFocus:true,adaptiveHeight: false});
    $('.slider3').slick({autoplay:true, speed:1000, autoplaySpeed:5000, pauseOnFocus:true,adaptiveHeight: false});
    $('.slider2').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: false,
      autoplay: true,
      pauseOnFocus:true
    });
  });

  $('.animated').hover(function(){$(this).addClass('pulse');}, function(){$(this).removeClass('pulse');})
  var swiper = new Swiper('.swiper-container', {
  });


  $(document).ready(function () {
      var img_array = [1, 2, 3, 4, 5],
          newIndex = 0,
          index = 0,
          interval = 5000;
      (function changeBg() {

          //  --------------------------
          //  For random image rotation:
          //  --------------------------

          //  newIndex = Math.floor(Math.random() * 10) % img_array.length;
          //  index = (newIndex === index) ? newIndex -1 : newIndex;

          //  ------------------------------
          //  For sequential image rotation:
          //  ------------------------------

          index = (index + 1) % img_array.length;

          $('.filtro-fondo').css('background', function () {
              $('.filtro-fondo').animate({
                  backgroundColor: 'transparent'
              }, 1000, function () {
                  setTimeout(function () {
                      $('.filtro-fondo').animate({
                          backgroundColor: 'rgb(255,255,255)'
                      }, 1000);
                  }, 3000);
              });
              return 'url(img/'+img_array[index] + '.jpg) no-repeat center center fixed';
          });
          setTimeout(changeBg, interval);
      })();
  });
  </script>
