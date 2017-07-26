<?php

include_once('admin/_class/class.usuario.php');
include_once('admin/_class/class.quinta.php');
$Quinta = new Quinta();
$Usuario = new Usuario();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $quinta = $Service->get_quinta($id);
  if($quinta){
    $quinta = $quinta[0];
    $calificacion = get_calificacion($quinta['calificacion']);
    $fotos = json_decode($quinta['fotos']);
    if($fotos){foreach ($fotos as $foto) {if($foto) $quinta_fotos .= '<div class="swiper-slide" style="background-image:url(admin/uploads/imagenes_quinta/'.$foto.')"></div>';}}
    $caracteristicas = $Service->get_caracteristicas_quinta($id);
    if($caracteristicas) foreach ($caracteristicas as $caracteristica) {
      // $quinta_caracteristicas .='<div class="swiper-slide" style="background-image:url(admin/uploads/caracteristica/'.$caracteristica['imagen'].')"></div>';
      $quinta_caracteristicas .= '<div class="col-2 text-center center-text">
              <img src="admin/uploads/caracteristica/'.$caracteristica['imagen'].'" style="height:20px;width:20px;border-radius:50px; background-color:lightgray">
            </div>';

    }
    $resenas = $Quinta->get_resenas($id);
    if($resenas) {foreach ($resenas as $i=>$resena) {
      $buffer_resenas = '<div class="col-12 resena mb-4">
                <p>
                  <b>'.$resena['nombre'].' '.$resena['apellido'].'</b> <span class="float-right">'.date('d-m-Y',strtotime($resena['created_at'])).'</span>
                </p>
                <p class="mb-0 text-truncate">'.$resena['resena'].'.</p>
                '.get_calificacion($resena['calificacion']).'
                <hr>
              </div>';
              if($i == 1){$buffer_resenas .= '<div class="col-12"><a>Ver más</a></div>';}
    }}else{$buffer_resenas = '<div class="col-12"><h4>Esta quinta aún no tiene ninguna reseña</h4></div>';}
  }else{Redirect('http://localhost/mobkii/vsv/index.php');}
}
if($uid){$favorito = $Usuario->get_favoritos($uid, $id);}
if($favorito){$txtFav = '<a class="delFavorito cw" data-fid="'.$favorito[0]['id'].'" data-qid="'.$id.'" data-uid="'.$uid.'">Eliminar de favoritos</a>';}
else{$txtFav = '<a class="addFavorito cw" data-fid="'.$favorito['id'].'" data-qid="'.$id.'" data-uid="'.$uid.'">Agregar a favoritos</a>';}
$buffer_subheader = '<div class="row">
        <div class="col-12 col-md-8">
          <h1>'.$quinta['nombre'].'</h1>
          <p>
          '.$calificacion.'
          </p>
        </div>
        <div class="col-12 col-md-4">
          <div class="row">
            <div class="col-7 offset-md-5">
              <a href="index.php?call=reservar&id'.$id.'" class="btn btn-primary fwidth shadow bs cw py-3 mb-2">Reservar</a>
              <i class="text-danger fa fa-heart" aria-hidden="true"></i>
              '.$txtFav.'
            </div>
          </div>
        </div>
      </div>';
?>
  <div class="row slider-mapa">
    <div class="col-12 col-md-6 px-0 pr-md-2 pl-md-0 slider-quinta pr-md-3">
      <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <?php echo $quinta_fotos; ?>
          </div>
          <!-- Add Arrows -->
          <div class="swiper-button-next swiper-button-white"></div>
          <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper-container gallery-thumbs mb-md-0 mb-5">
          <div class="swiper-wrapper">
            <?php echo $quinta_fotos; ?>
          </div>
      </div>
    </div>
    <div class="col-md-6 col-12 mt-md-0 mt-5">
      <div class="row">
      <div class="col-12 my-2">
      <div class="row justify-content-between">
        <?php echo $quinta_caracteristicas; ?>
      <!-- <div class="col-2 text-center center-text">
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
      </div> -->
    </div>
    </div>
    <div id="map" class="col-12" style="height:335px;">
    </div>
    <div class="col-12 my-2 py-2 bg-danger text-white">
      <div class="row">
        <div class="col-2 text-center align-self-center">
          <span style="font-size:50px;"><i class="fa fa-lock" aria-hidden="true"></i></span>
        </div>
        <div class="col-10 align-self-center">
          <span><b>Suscríbete</b><br>Para ver más detalles de esta quinta es  necesario tener una cuenta personal.</span>
        </div>
    </div>
    </div>
  </div>
  </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-8 pt-4">
      <h2 class="mb-2">Descripción</h2>
      <p class="mb-0">Descripción</p>
      <p><?php echo $quinta['descripcion'];?></p>
      <hr>
      <div class="row">
        <div class="col-12">
        <p>Especificaciones</p>
          <div class="row">
            <div class="col-12">
                <button class="btn btn-secondary fwidth my-2 text-left" type="button" data-toggle="collapse" data-target="#terminos" aria-expanded="false" aria-controls="terminos">
                  Términos <span class="float-right"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                </button>
              <div class="collapse" id="terminos">
                <div class="card card-block pl-0">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-secondary fwidth text-left" type="button" data-toggle="collapse" data-target="#cancelaciones" aria-expanded="false" aria-controls="cancelaciones">
                Cancelaciones <span class="float-right"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
              </button>
              <div class="collapse" id="cancelaciones">
                <div class="card card-block pl-0">
                  Loreffm ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 pt-4">
      <h4>Reseñas</h4>
      <div class="row">
        <?php echo $buffer_resenas; ?>
      </div>
    </div>
  </div>

<div class="my-5">
  <?php include_once('views/view.reservar.php'); ?>
</div>

<style media="screen">
  .servicio{
    border: 1px solid lightgray;
    padding: 10px 0px;
  }
  .mapa-quinta{background-color: lightgray;}

  .slider-mapa{padding-bottom: 40px;}
  .fc-header-right{display: none !important;}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.css">


<style media="screen">
.swiper-container {
  width: 100%;
  height: 375px;
  margin-left: auto;
  margin-right: auto;
}
.swiper-slide {
  background-size: cover;
  background-position: center;
}
.gallery-top {
  width: 100%;
}
.gallery-thumbs {
  height: 20%;
  box-sizing: border-box;
  padding: 10px 0;
}
.gallery-thumbs .swiper-slide {
  width: 25%;
  height: 100%;
  opacity: 0.4;
}
.resena{cursor: pointer;}
.gallery-thumbs .swiper-slide-active {
  opacity: 1;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT7FCS3i7CvHh15kc4bLkqrDMa3G5SaiA&callback=initMap"></script>
<script type="text/javascript">
var galleryTop = new Swiper('.gallery-top', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 10,
});
var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    centeredSlides: true,
    slidesPerView: 'auto',
    touchRatio: 0.2,
    slideToClickedSlide: true
});
galleryTop.params.control = galleryThumbs;
galleryThumbs.params.control = galleryTop;

$(document).ready(function(){
  $('.sub-header .container').html(`<?php echo $buffer_subheader ?>`);

  $('.resena .text-truncate').click(function(){if($(this).hasClass('text-truncate')){$(this).removeClass('text-truncate');}else{$(this).addClass('text-truncate');}})
})
</script>

<!--Maps -->
  <script>
  function initMap() {
    var quinta = <?php echo ($quinta['coordenadas']); ?>;
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: quinta
    });
    var marker = new google.maps.Marker({
      position: quinta,
      map: map
    });
  }
</script>
