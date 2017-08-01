<?php
include_once('admin/_class/class.quinta.php');
include_once('admin/_class/class.evento.php');
include_once('admin/_class/class.zona.php');
$Evento = new Evento();
$Quinta = new Quinta();
$Zona = new Zona();

if(isset($_GET['evento'])) $id_evento = $_GET['evento'];
if(isset($_GET['zona'])) $id_zona = $_GET['zona'];

$eventos = $Evento->set_status(1)->get_data();
if($eventos){foreach ($eventos as $key => $evento) {
    $selected = '';
    if($id_evento = $evento['id']) $selected = 'selected';
    $buffer_eventos .= '<option value="'.$evento['id'].'" '.$selected.'>'.$evento['nombre'].'</option>';
}}

$zonas = $Zona->set_status(1)->get_data();
if($zonas){foreach ($zonas as $key => $zona) {
    $selected = '';
    if($id_zona = $zona['id']) $selected = 'selected';
    $buffer_zonas .= '<option value="'.$zona['id'].'" '.$selected.'>'.$zona['nombre'].'</option>';
}}
?>
<button type="button" name="button" class="hidden-sm-down btn btn-secondary show-quintas btn-show-quintas opacity-0">Mostrar listado</button>
<div id="map" class="hidden-sm-down col-12 quintas-mapa opacity-0 hidden-sm-down" style="height:100vh;position:absolute;">
</div>
  <div class="row my-md-5">
    <!-- <div class="col-12">
      <div class="row">
        <div id="map" class="col-12 quintas-mapa" style="height:100vh;position:absolute;">
        </div>
      </div>
    </div> -->
    <div class="col-12 col-md-4 filtro-quinta">
      <div class="row">
        <div class="col-12 bp cw p-4">
          <form id="frmBuscar">
            <h3 class="text-center">Encuentra tu Quinta</h3>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="evento">Evento</label>
                  <select class="form-control" id="evento" name="evento">
                    <?php echo $buffer_eventos ?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="zona">Zona</label>
                  <select class="form-control" id="zona" name="zona">
                    <?php echo $buffer_zonas; ?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Fecha</label>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    <input type="datetime" id="fecha" name="fecha" data-toggle="datepicker" value="" class="form-control isRequired" aria-describedby="basic-addon1">
                  </div>
                </div>
              </div>
              <!-- <div class="col-6">
<div class="form-group">
<label for="horario">Horario</label>
<select class="form-control" id="horario" name="horario">
<option value="1">1</option>
<option value="1">1</option>
<option value="1">1</option>
<option value="1">1</option>
</select>
</div>
</div> -->
              <!-- <div class="col-6">
<div class="form-group">
<label for="personas">Personas</label>
<select class="form-control" id="personas" name="personas">
<option value="1">1</option>
<option value="1">1</option>
<option value="1">1</option>
</select>
</div>
</div> -->
              <div class="col-12">
                <a class="btn fwidth bs btn-primary fwidth center-block onBuscar shadow cw">Buscar quintas</a>
              </div>
            </div>
          </form>
        </div>
        <div class="col-12 py-4 bw">
          <h4 class="marginb-10">Buscar por precio</h4>
          <b>$ 0</b>
          <input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]" />
          <b>$ 1, 000</b>
        </div>
        <div class="col-12 filtro-calificacion pt-4 bw">
          <h4 class="">Buscar por calificación</h4>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" id="calificacion" name="calificacion" group="calificacion" value="5">
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" id="calificacion" name="calificacion" group="calificacion" value="4">
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" id="calificacion" name="calificacion" group="calificacion" value="3">
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" id="calificacion" name="calificacion" group="calificacion" value="2">
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" id="calificacion" name="calificacion" group="calificacion" value="1">
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </label>
          </div>
        </div>
        <div class="col-12 pt-4 bw">
          <h4>Buscar por servicios</h4>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" id="servicio" name="calificacion" group="calificacion" value="5"> Servicio 1
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" id="servicio" name="calificacion" group="calificacion" value="5"> Servicio 2
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" id="servicio" name="calificacion" group="calificacion" value="5"> Servicio 3
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" id="servicio" name="calificacion" group="calificacion" value="5"> Servicio 4
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" id="servicio" name="calificacion" group="calificacion" value="5"> Servicio 5
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-8 div-listado-quintas px-md-4 pt-md-0" id="quintas">
      <div class="row">
        <div class="col-md-6 col-12 hidden-md-up">
          <a class="show-quintas-m mr-2 ct"><i class="fa fa-list mr-2" aria-hidden="true"></i>Listado</a>
          <a class="show-mapas-m ct"><i class="fa fa-map mr-2" aria-hidden="true"></i>Mapa</a>
        </div>
        <div class="col-md-6 col-12 hidden-sm-down">
          <a class="show-quintas mr-2 ct"><i class="fa fa-list mr-2" aria-hidden="true"></i>Listado</a>
          <a class="show-mapas ct"><i class="fa fa-map mr-2" aria-hidden="true"></i>Mapa</a>
        </div>
        <div class="col-md-3 col-12 offset-md-3 mt-md-0 mt-2 form-inline">
          <div class="form-group">
            <!-- <label for="evento">Ordenar por: </label> -->
            <select class="form-control form-control-sm orderBy" id="ordenar" name="ordenar">
              <option value="">Ordenar por: </option>
              <option value="calificacion" class="sort" data-sort="nombre">Calificación</option>
              <option value="nombre" class="sort" data-sort="nombre">Nombre</option>
              <option value="precio" class="sort" data-sort="precio">Precio</option>
            </select>
          </div>
        </div>
      </div>
      <!-- <input type="text" class="search" /> -->
      <div class="col-12 mt-2 quintas-mapa hidden-lg-up opacity-m0" id="mapMovil" style="height:400px;">
      </div>
      <div class="col-12 quintas">
        <ul class="list p-0">
          <div class="row quinta py-2 py-md-0">
            <div class="col-12 col-md-5 pl-md-0 image">
              <div class="card mb-md-0">
                <!-- <img class="card-img-top" src="" alt="Card image cap"> -->
                <div class="card-block">
                  <h4 class="card-title">Card title</h4>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-7 py-4 quinta-descripcion">
              <div class="row">
                <div class="col-12">
                  <span class="float-right">Comentarios: 8</span>
                  <h4>$650</h4>
                  <p class="my-4 descripcion">Lorem ipsum dolor sithhhhhhhhhhhhhhhhhhhhhhh amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  <div class="row">
                    <div class="col-4">
                      <i class="fa fa-star-o" aria-hidden="true"></i>
                      <i class="fa fa-star-o" aria-hidden="true"></i>
                      <i class="fa fa-star-o" aria-hidden="true"></i>
                      <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <div class="col-6 offset-2">
                      <a href="index.php?call=quinta&id=1" class="btn btn-primary fwidth shadow bs cw">Ver más</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </ul>
        <nav aria-label="Page navigation example">
        <ul class="pagination"></ul>
      </nav>
      </div>
    </div>
  </div>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" />
  <style media="screen">
    .filtro-quinta {
      /*padding:  0px 20px 0px 0px;*/
    }

    .div-listado-quintas {
      padding: 20px;
    }

    .btn-cuadrado {
      position: relative;
      padding: 10px 15px;
      border: 1px solid black;
      width: 100%;
      cursor: pointer;
    }

    .quintas {
      margin-top: 20px;
    }

    .quinta {
      margin-top: 10px;
      padding: 0px 5px 0px 0px;
    }

    .quinta h4 {
      margin: 0px !important;
    }

    .card {
      padding: 5px !important;
      position: absolute;
      width: 100%;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
      color: white;
    }

    .card-block {
      padding: 5px;
    }
    .btn-show-quintas{
      position: absolute;
      z-index: 100;
      right: 0;
    }

    .image {
      clear: both;
      padding: 0px;
      background: url('img/2.jpg') no-repeat center;
      background-size: cover;
    }
    .quinta-descripcion {
      background-color: #f7f7f7;
    }
    .descripcion{
      height: 74px !important;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .opacity-0{opacity: 0; transition: 1s}
    .opacity-1{opacity: 1;transition: 1s}
    .opacity-5{opacity: .8;transition: 1s}

    .opacity-m0{opacity: 0; transition: 1s;position:fixed !important;}
    .opacity-m1{opacity: 1; transition: 1s;position:relative !important;}

  </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT7FCS3i7CvHh15kc4bLkqrDMa3G5SaiA&callback=initMap"></script>
  <script type="text/javascript">
  $("#ex2").slider({});
  </script>
  <script>
    $(document).ready(function(e) {
      $('.show-mapas').click(function() {
        $('.div-listado-quintas').hide().addClass('opacity-0').removeClass('opacity-1');
        $('#map, .btn-show-quintas').removeClass('opacity-0').addClass('opacity-1');
        $('.bw').addClass('opacity-5');
      })
      $('.show-quintas').click(function() {
        $('.div-listado-quintas').show().removeClass('opacity-0').addClass('opacity-1');
        $('.bw').removeClass('opacity-5');
        $('#map, .btn-show-quintas').addClass('opacity-0').removeClass('opacity-1');
      })

      $('.show-mapas-m').click(function() {
        $('.quintas, .orderBy').hide();
        $('#mapMovil').show().addClass('opacity-m1').removeClass('opacity-m0');;
      })
        $('.show-quintas-m').click(function() {
        $('#mapMovil').hide().addClass('opacity-m0').removeClass('opacity-m1');
        $('.quintas').show();
      })

      $('#ordenar').change(function(){
        var name = $(this).val();
        quintaList.sort(name, { order: "asc" });
      })

    $('#ex2').change(function(){
      console.log($(this).val());
    })

    $('input[name="radio"]').click(function(){
    })
    })
  </script>

  <script>
    function initMap() {
      // var quinta = <?php echo ($quinta['coordenadas']); ?>;
      var quinta;
      if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: pos
      });
      mapMovil = new google.maps.Map(document.getElementById('mapMovil'), {
        zoom: 12,
        center: pos
      });
      new google.maps.Marker({
            position: pos,
            icon: 'img/bluedot_retina.png',
            map: map
          });
          new google.maps.Marker({
                position: pos,
                icon: 'img/bluedot_retina.png',
                map: mapMovil
              });
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  }

    }




  </script>
