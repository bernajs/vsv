<?php
 $horarios = $Service->get_horarios($id);
 if($horarios){
   foreach ($horarios as $key => $horario) {
     $buffer_horarios .= '<div class="col-12 horario mt-4 horario-'.$horario['id'].'" data-id="'.$horario['id'].'" data-precio="'.$horario['precio'].'">
                   <h6 class="mb-0">'.$horario['nombre'].'</h6>
                   Entre un horario de: <span class="horario_detalle">'.date('H:i', strtotime($horario['inicio'])).' a '.date('H:i', strtotime($horario['fin'])).'</span>
                   <span class="status"></span>
                 </div>';
   }
 }else{
   $buffer_horarios.='<div class="col-12 horario mt-4"><h4>Esta Quinta no tiene ningún horario por el momento</div>';
 }

 if($uid){
   $usuario = $Service->get_usuario($uid);
   $usuario = $usuario[0];
 }
 ?>

<div class="">
  <div class="row px-0 pasos">
    <div class="col-12 col-md-4 paso text-center bp cw">
      <h4 class=""><p class="no-paso-p"><span class="no-paso">1</span></p><span class="nombre-paso">Reservación</span></h4>
      <span>Selecciona la fecha y horario</span>
    </div>
    <div class="col-12 col-md-4 paso text-center bh cw">
      <h4 class=""><p class="no-paso-p"><span class="no-paso">2</span></p><span class="nombre-paso">Log in</span></h4>
      <span>Ingresa a tu cuenta</span>
    </div>
    <div class="col-12 col-md-4 paso text-center bh cw">
      <h4><p class="no-paso-p"><span class="no-paso">3</span></p><span class="nombre-paso">Pago</span></h4>
      <span>Realiza el pago y agenda</span>
    </div>
  </div>
  <div class="row reservacion mt-4">
    <div class="col-12 text-center my-4">
        <h4>1. Reservación</h4>
    </div>
    <div class="col-12">
      <div class="row">
        <div class="col-12 col-md-6">
          <h5>Opciones de renta</h5>
          <div class="row">
            <?php echo $buffer_horarios; ?>
            <div class="col-12 mt-4">
              <span class="ct ver_clima">Ver pronostico del clima <i class="fa fa-sun-o" aria-hidden="true"></i></span>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 mt-4">
          <div id='calendar'></div>
          <span class="float-right mt-4">SIGUIENTE >  <a class="cp paso-login">LOG IN</span></a>
        </div>
      </div>
    </div>
  </div>
  <?php if (!$uid): ?>
  <div class="row login-registro mt-4">
    <div class="col-12">
      <div class="row justify-content-center">
        <div class="col-12 text-center my-4">
            <h4>2. Log in</h4>
        </div>
          <div class="col-12 col-md-6 login">
            <form id="frmLogin">
              <div class="row">
                <div class="col-12 col-md-10">
                  <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" id="correo" value=""class="form-control isRequired">
                  </div>
              </div>
              <div class="col-12 col-md-10">
                <div class="form-group">
                  <label for="contrasena">Contrasena</label>
                  <input type="password" name="contrasena" value="" id="contrasena" class="form-control isRequired">
                </div>
              </div>
              <div class="col-12 col-md-10">
                  <a class="btn btn-primary mx-auto fwidth p-3 bs onLoginQuinta cw">ACCESAR</a>
                  <button type="button" name="button" class="btn btn-primary mx-auto fwidth p-3 mt-3">ACCESAR CON FACEBOOK</button>
              </div>
              <div class="col-12 col-md-10 mt-2 text-center">
                <span class="">Olvidé mis accesos</span>
              </div>
              </div>
            </form>
          </div>
          <div class="col-12 col-md-5 offset-md-1 registro mt-4 mt-md-0">
            <form id="frmRegistro">
              <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control isRequired">
                  </div>
                </div>
                <div class="col-12 col-md-12">
                  <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" id="correo" class="form-control isRequired">
                  </div>
                </div>
                <div class="col-6 col-md-6">
                  <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control isRequired">
                  </div>
                </div>
                <div class="col-6 col-md-6">
                  <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" id="celular" class="form-control isRequired">
                  </div>
                </div>
                <div class="col-6 col-md-6">
                  <div class="form-group">
                    <label for="contrasena">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" class="form-control isRequired">
                  </div>
                </div>
                <div class="col-6 col-md-6">
                  <div class="form-group">
                    <label for="confirmar_contrasena">Confirmar contraseña</label>
                    <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" class="form-control isRequired">
                  </div>
                </div>
                <div class="col-12 col-md-12">
                  <div class="form-group">
                    <label for="comentarios">Comentarios</label>
                    <input type="text" name="comentarios" id="comentarios" class="form-control isRequired">
                  </div>
                </div>
                <div class="col-12 col-md-12">
                  <a class="btn btn-primary fwidth bs p-3 onRegistro cw">REGISTRARME</a>
                </div>
                <div class="col-12 form-check">
                  <p class="mt-3">Aquí pudiera ir una breve descripción de los términos y  condiciones para el registro de usuario por ejemplo.</p>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="" value="">
                    Leí y acepto los términos
                  </label>
                </div>
              </div>
            </form>
          </div>
          <div class="col-6 mt-3 regresar">
            <a class="paso-reservacion float-right">< REGRESAR</a>
          </div>
          <div class="col-6 mt-3">
            <a class="paso-pago">SIGUIENTE > <a class="cp">PAGAR</a></a>
          </div>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="row login-registro">
    <div class="col-12">
      <h1>Bienvenido <?php echo $usuario['nombre'].' '.$usuario['apellido']; ?></h1>
    </div>
    <div class="col-12 mt-3 regresar">
      <a class="paso-reservacion text-center">< REGRESAR</a>
      <a class="paso-pago text-center">SIGUIENTE > <a class="cp">PAGAR</a></a>
    </div>
  </div>
<?php endif; ?>

  <div class="row pago mt-4">
    <div class="col-12">
    <div class="row justify-content-between">
    <div class="col-12 my-5">
      <h4 class="text-center">3. Pago</h4>
    </div>
    <div class="col-12 col-md-5">
      <h4 class="">Tu reservación</h4>
      <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
      <div class="row">
        <div class="col-12 detalles-pago">
          <hr>
          <span>Quinta: </span> <span class="float-right"><?php echo $quinta['nombre']; ?></span>
          <hr>
        </div>
        <div class="col-12 detalles-pago">
          <span>Fecha: </span> <span class="float-right label-fecha">30/Abril/2017</span>
          <hr>
        </div>
        <div class="col-12 detalles-pago">
          <span>Servicio: </span> <span class="float-right label-servicio">Renta de mesas y sillas</span>
          <hr>
        </div>
        <div class="col-12 detalles-pago">
          <span>Horario: </span> <span class="float-right label-horario">Matutino 4 horas</span>
          <hr>
        </div>
        <div class="col-12 detalles-pago-total text-center">
          <span class="text-center">Total: </span> <span class="float-right label-precio"><b class="precio">$5,000.00</b></span>
          <hr>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-5">
      <div class="row">
        <div class="col-12">
          <span>Total a pagar:</span>
          <h3 class="total-pagar pt-2 precio">$5,000.00</h3>
      </div>
      <div class="col-12 mt-2">
        <form id="frmReservar">
          <div class="row">
            <div class="col-12 form-group">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control isRequired" value="">
            </div>
            <div class="col-12 form-group">
              <label for="correo">Correo</label>
              <input type="email" name="correo" id="correo" class="form-control isRequired" value="">
            </div>
            <div class="col-12 form-group">
              <label for="titular">Titular de la tarjeta</label>
              <input type="text" name="titular" id="titular" class="form-control isRequired" value="">
            </div>
            <div class="col-12 form-group">
              <label for="tarjeta">Tarjeta</label>
              <input type="text" name="tarjeta" id="tarjeta" class="form-control isRequired isNumber" value="">
            </div>
            <div class="col-6 form-group">
              <label for="vigencia">Vigencia</label>
              <input type="text" name="vigencia" id="vigencia" class="form-control isRequired" value="">
            </div>
            <div class="col-6 form-group">
              <label for="cvv">No. Seguridad (CVV)</label>
              <input type="text" name="cvv" id="cvv" class="form-control isRequired isNumber" value="">
            </div>
            <input type="hidden" name="id_horario" id="id_horario" value="">
            <input type="hidden" name="fecha" id="fecha" value="">
            <input type="hidden" name="precio" id="precio" value="">
            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $uid; ?>">
            <input type="hidden" name="id_quinta" id="id_quinta" value="<?php echo $id; ?>">
            <div class="col-12 form-group">
                <a class="btn btn-primary br-50 fwidth bs b-2 onReservar cw">PAGAR</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
    </div>
  </div>
</div>

<!-- Calendario -->
<!-- <link rel="stylesheet" href="css/fullcalendar.min.css"> -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css">
<!-- <script src="js/plugins/fullcalendar.js" charset="utf-8"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/es.js"></script>
<style media="screen">
.status{height: 30px;width: 30px; background-color: green;}
.reservado{background-color: red;}
.horario{cursor: pointer}
.libre{background-color: green;}
.selected{background-color: yellow;}
.paso{
  border: .3px solid white;
  padding: 10px;
}
  .no-paso-p{
    height: 50px;width: 50px !important;
    background-color: lightgray;
    border-radius: 50px;
    margin: 0px !important;
    display: inline-block;
  }
  .total-pagar{border-bottom: 2px solid lightgray; padding-bottom: 8px;}
  .no-paso{
    position: relative;
    top: 25%;
    color:black;
  }
  .nombre-paso{
    position: relative;
    left: 12px;
    top: 12px;
  }

  .horario{
    padding: 10px;
    background-color: white;
    border: 1px solid lightgray;
  }

  .horario img, .horario .status{
    position: absolute;
    height: 30px;
    width: 30px;
    border-radius: 50px;
    top: 25%;
    right: 20px;
  }

  .regresar, .login{border-right: 1px solid lightgray;}
  .paso{cursor: pointer;}
  .login-registro, .pago{
    display: none;
  }
  .selected-day{background-color: lightgray;}
  .fc-past{color:#a0a0a0}
  td{cursor: pointer;}
</style>
<script type="text/javascript">
$(document).ready(function(){

var id = <?php echo $id; ?> ;
var uid = <?php if($uid) echo $uid; else echo 'null'; ?>;
var fecha = moment().format('YYYY-MM-DD');
var horario;
var fechaInit = '<?php if($fecha) echo $fecha;?>';
!fechaInit ? fechaInit = moment().format('YYYY-MM-DD') : fechaInit = moment(fechaInit).format('YYYY-DD-MM');
Cliente.get_reservaciones(id, fecha);
 $('#calendar').fullCalendar({
   header: {
    left: 'prev,next',
    center: 'title',
    right: 'false'
},
// defaultDate:moment(fechaInit).format('DD-MM-YYYY'),
// year: moment(fechaInit).format('YYYY'),
// month: moment(fechaInit).format('MM'),
// day: moment(fechaInit).format('DD'),
/* This constrains it to today or later */
 eventConstraint: {
     start: moment().format('YYYY-MM-DD'),
     end: '2100-01-01' // hard coded goodness unfortunately
 },
      defaultView: 'month',
          dayClick: function(date, jsEvent, view) {
            if($(this).hasClass('fc-past')) return;
            $('.selected-day').removeClass('selected-day');
            $(this).addClass('selected-day');
            fecha = moment(date).format('YYYY-MM-DD');
            Cliente.get_reservaciones(id, fecha);
            // if (view.name === "month") {
            //     $('#calendar').fullCalendar('gotoDate', date);
            //     $('#calendar').fullCalendar('changeView', 'agendaDay');
            // }
        },
        select: function(start, end) {
          if(start.isBefore(moment())) {
            $('#calendar').fullCalendar('unselect');
          return false;
    }
}
    })
    // console.log(fechaInit);
    $('.fc-button-group button').removeClass().addClass('btn btn-secondary');
// $('#calendar').fullCalendar('gotoDate', fechaInit);
    $('.horario').click(function(e){
      if($(this).children('.status').hasClass('reservado')){alert('Este horario ya está ocupado');return;}
      $('.status').removeClass('selected');
      var id_horario = $(this).data('id');
      var precio = $(this).data('precio');
      var horario = $(this).children('.horario_detalle').text();
      $(this).children('.status').addClass('selected');
      $('#fecha').val(fecha);
      $('.precio').html(format_precio(precio));
      $('.label-horario').html(horario);
      $('.label-fecha').html(moment(fecha).format('DD/MMM/YYYY'));
      $('#id_horario').val(id_horario);
      $('#precio').val(precio);
    })

    var reservacion = $('.reservacion');
    var login_registro = $('.login-registro');
    var pago = $('.pago');

    $('.paso-reservacion').click(function(){
      login_registro.hide('slow');
      pago.hide('slow');
      reservacion.show('slow');
    })
    $('.paso-login').click(function(){
      if(!$('#id_horario').val()){alert('Debes de seleccionar un horario');return;}
      login_registro.show('slow');
      pago.hide('slow');
      reservacion.hide('slow');
      if(uid){$('.paso-pago').click();}
    })
    $('.paso-pago').click(function(){
      login_registro.hide('slow');
      pago.show('slow');
      reservacion.hide('slow');
    })
})

</script>
