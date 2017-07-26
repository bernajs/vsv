<?php
  $usuario = $Usuario->get_data($uid);
  $usuario = $usuario[0];
  $quintas = $Usuario->get_quintas($uid);
  if($quintas){
    $lista_quintas = '';
    foreach ($quintas as $quinta) {
      $lista_quintas .= '
      <div class="col-md-3 col-12 mt-md-4 mt-2">
        <div class="card text-center">
          <img class="card-img-top" src="" alt="Card image cap">
          <div class="card-block text-center pt-3">
            <div class="row" style="height:44px;"><div class="col-12 align-self-center">
            <h6 class="card-title ct mb-0">'.$quinta['nombre'].'</h6>
            </div>
            <div class="col-12 align-self-center">
            <p class="card-text">
            <span>Direccion</span><br>
            <span>Servicios</span>
            </div>
            </div>
          </p>
          </div>
        </div>
        <div class="acciones-quinta text-center">
        <a class="ct openEdicion" data-toggle="modal" data-target="#modalEdicion" data-id="'.$quinta['id'].'">Solicitar edición <span class="clg"> | </span></a>
        <a href="../index.php?call=quinta&id='.$quinta['id'].'" target="_blank" class="ct"> Vista previa <span class="clg"> | </span></a>
        <a class="ct onResena" data-id="'.$quinta['id'].'"> Reseñas</a>
      </div>
      </div>
      ';
    }
  }
?>
<div class="row justify-content-between">
  <div class="col-12 col-md-3 text-center profile-pic py-4 mr-md-4">
    <img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="img-fluid rounded-circle"alt="">
    <h6 class="mt-4 ct"><?php echo $usuario['nombre']; ?></h6>
    <span>Tipo de suscripción</span><br>
    <span>Desde: <?php echo date('d-m-Y', strtotime($usuario['created_at'])); ?></span>
  </div>
  <div class="col-12 col-md-8 profile-info py-md-5 px-md-5">
    <form id="frmUsuario">
        <div class="row">
          <div class="col-12 form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" class="form-control isRequired">
          </div>
          <div class="col-6 form-group">
            <label for="apellido">Apellidos</label>
            <input type="text" name="apellido" id="apellido" value="<?php echo $usuario['apellido']; ?>" class="form-control isRequired">
          </div>
          <div class="col-6 form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" value="<?php echo $usuario['correo']; ?>" class="form-control isRequired">
          </div>
          <div class="col-6 form-group">
            <label for="celular">Celular</label>
            <input type="text" name="celular" id="celular" value="<?php echo $usuario['celular']; ?>" class="form-control isRequired isNumber">
          </div>
          <div class="col-6 form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="<?php echo $usuario['telefono']; ?>" class="form-control isRequired isNumber">
          </div>
          <div class="col-6 form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" value="<?php echo $usuario['contrasena']; ?>" class="form-control isRequired">
          </div>
          <div class="col-6 form-group">
            <label for="confirmar_contrasena">Confirmar contraseña</label>
            <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" value="<?php echo $usuario['contrasena']; ?>" class="form-control isRequired">
          </div>
          <div class="col-6 offset-3 text-center form-group">
            <a class="btn btn-primary fwidth br-50 bs onUpdate cw">Guardar</a>
          </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $uid; ?>">
    </form>
  </div>
  <div class="col-12 p-4 bw mt-5">
    <div class="row">
      <div class="col-12">
        <h5 class="my-3 ct">Mis quintas</h5>
        <hr>
      </div>
      <div class="col-12 mt-3">
        <div class="row">
          <?php echo $lista_quintas; ?>
        </div>
      </div>
      <div class="col-md-6 col-10 mt-5">
        <button type="button" name="button" class="btn btn-primary fwidth bs" data-toggle="modal" data-target="#myModal">REGISTRAR NUEVA QUINTA</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Quinta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="" id="frmQuinta" action="index.html" method="post">
            <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="calle">Calle</label>
                    <input type="text" name="calle" id="calle" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="colonia">Colonia</label>
                    <input type="text" name="colonia" id="colonia" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="cp">Código postal</label>
                    <input type="text" name="cp" id="cp" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="form-group col-6">
                  <label for="estado">Estado</label>
                  <select name="estado" id="estado" class="form-control isRequired">
                    <option value=""></option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durango">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Mexico">México</option>
                    <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo Leon">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Queretaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosi">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                    <option value="Yucatan">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                  </select>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="zona">Zona</label>
                    <input type="text" name="zona" id="zona" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="municipio">Municipio</label>
                    <input type="text" name="municipio" id="municipio" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="lat">Latitud</label>
                    <input type="text" name="lat" id="lat" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="lng">Longitud</label>
                    <input type="text" name="lng" id="lng" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="tipo_evento">Tipo de evento</label>
                    <input type="text" name="tipo_evento" id="tipo_evento" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="capacidad">Capacidad</label>
                    <input type="text" name="capacidad" id="capacidad" class="form-control isRequired" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" rows="2" cols="30" id="descripcion" class="form-control isRequired"></textarea>
                  </div>
                </div>
            </div>
            <input type="hidden" name="fotos" value="">
            <input type="hidden" name="videos" value="">
            <input type="hidden" name="id_usuario" value="<?php echo $uid; ?>">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <a class="btn btn-primary bs onQuinta cw">ENVIAR</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solicitar edición</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="" id="frmEdicion">
            <h6>Redacta los cambios que quieres hacer en tu Quinta</h6>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <textarea name="edicion" class="form-control"></textarea>
                </div>
              </div>
            </div>
            <input type="hidden" name="id" id="id_edicion" value="">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <a class="btn btn-primary bs onEdicion cw">ENVIAR</a>
      </div>
    </div>
  </div>
</div>

<style media="screen">
  .card-block{background-color: #fbfbfb;}
  .profile-pic, .profile-info{background-color: white;}
  .acciones-quinta{font-size: 12px;}
</style>
<script type="text/javascript">
  $('.openEdicion').click(function(){
    var id = $(this).data('id');
    console.log(id);
    $('#id_edicion').val(id);
  })
</script>
