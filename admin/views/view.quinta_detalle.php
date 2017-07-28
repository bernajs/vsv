<?php
require_once('_class/class.quinta.php');
$Quinta = new Quinta();
// Variables
$data['nombre'] = '';
$data['municipio'] = '';
$data['zona'] = '';
$data['ciudad'] = '';
$data['lat'] = '';
$data['fotos'] = '';
$data['videos'] = '';
$data['lng'] = '';
$data['capacidad'] = '';
$data['destacado'] = '';
$data['evento'] = '';
$data['descripcion'] = '';
$data['status'] = '';
$data['estado'] = '';
$data['id_usuario'] = '';
$action = 'save';
$id = '';
$lista_fotos= '';
$title = 'Agregar quinta';

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $quinta = $Quinta->get_data($id);
  $data['usuario'] = $quinta[0]['usuario'];
  $data['nombre'] = $quinta[0]['nombre'];
  $direccion = json_decode($quinta[0]['direccion']);
  $data['destacado'] = $quinta[0]['destacado'];
  $data['municipio'] = $quinta[0]['municipio'];
  $fotos = ($quinta[0]['fotos']);
  $data['videos'] = $quinta[0]['videos'];
  $data['ciudad'] = $quinta[0]['ciudad'];
  $data['descripcion'] = $quinta[0]['descripcion'];
  $data['destacado'] = $quinta[0]['destacado'];
  $data['capacidad'] = $quinta[0]['capacidad'];
  $data['id_usuario'] = $quinta[0]['id_usuario'];
  $data['estado'] = $quinta[0]['estado'];
  $data['status'] = $quinta[0]['status'];
  $data['zona'] = $quinta[0]['zona'];
  $coordenadas = json_decode($quinta[0]['coordenadas']);
  $data['lat'] = $coordenadas->lat;
  $data['lng'] = $coordenadas->lng;
  $action = 'update';
  $title = 'Editando quinta';


  $caracteristicas = $Quinta->get_caracteristicas();
  $qcaracteristicas = $Quinta->get_caracteristicas_quinta($id);

  $lista_caracteristicas = '';
  foreach ($caracteristicas as $caracteristica) {
    $checked = '';
    foreach ($qcaracteristicas as $qcaracteristica) {
      if($qcaracteristica['id'] == $caracteristica['id']){
        $checked = 'checked';
      }
    }
    $lista_caracteristicas .= '<div class="form-check col-6">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" '.$checked.' name="caracteristica[]" value="'.$caracteristica['id'].'">
      '.$caracteristica['nombre'].'
      </label>
    </div>';
  }

  if(isset($_GET['cambio'])){
    $id_cambio = $_GET['cambio'];
    $cambio = $Quinta->cambios_pendientes($id_cambio, $id);
    $cambio = $cambio[0];
  }
}else{
  $caracteristicas = $Quinta->get_caracteristicas();
  $lista_caracteristicas = '';
  foreach ($caracteristicas as $caracteristica) {
    $checked = '';
    $lista_caracteristicas .= '<div class="form-check col-6">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" '.$checked.' name="caracteristica[]" value="'.$caracteristica['id'].'">
      '.$caracteristica['nombre'].'
      </label>
    </div>';
  }
}
 ?>

<div class="card">
  <div class="card-header pb-0">
    <h4 class="card-title"><?php echo $title; ?></h4>
    <?php if($id && $data['status'] == 0): ?>
      <div class="row">
      <button type="button" data-id="<?php echo $id; ?>" data-action="aprobar" class="btn btn-outline-primary mt-1 onQuinta">Aprobar Quinta</button>
      <button type="button" data-id="<?php echo $id; ?>" data-action="rechazar" class="btn btn-outline-primary mt-1 onQuinta">Rechazar Quinta</button>
    </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-2">
        <button style="display:block;display:none;" type="button" data-id="<?php echo $id; ?>" class="btn btn-outline-primary mt-1 btn-show-cambio">Mostrar solicitud de cambio</button>
      </div>
    </div>
  </div>
  <div class="card-body collapse in">
    <div class="card-block">
      <div class="tab-content px-1 pt-1">
        <div role="tabpanel" class="tab-pane active" id="datos-content" aria-expanded="true" aria-labelledby="datos">
          <div class="row">
            <div class="col-12">
                <div class="row">
                  <?php if(!$data['id_usuario']): ?>
                  <div class="form-group col-6">
                    <label for="dueno">Dueño</label>
                    <input type="text" id="dueno" name="dueno" class="form-control isRequired" placeholder="Ingresa el correo del dueño de la Quinta">
                  </div>
                  <div class="form-group col-3">
                    <button type="button" name="button" class="btn btn-primary onBuscarDueno" style="margin-top:27.78px;">Buscar</button>
                  </div>
                <?php endif ?>
                  <form id="frmQuinta" name="frmQuinta">
                  <div class="form-group col-12">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control isRequired" value="<?php echo $data['nombre']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control isRequired">
                      <option <?php if($data['estado']=='' ){echo "selected";} ?> value=""></option>
                      <option <?php if($data['estado']=='Aguascalientes' ){echo "selected";} ?> value="Aguascalientes">Aguascalientes</option>
                      <option <?php if($data['estado']=='Baja California' ){echo "selected";} ?> value="Baja California">Baja California</option>
                      <option <?php if($data['estado']=='Baja California Sur' ){echo "selected";} ?> value="Baja California Sur">Baja California Sur</option>
                      <option <?php if($data['estado']=='Campeche' ){echo "selected";} ?> value="Campeche">Campeche</option>
                      <option <?php if($data['estado']=='Coahuila de Zaragoza' ){echo "selected";} ?> value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                      <option <?php if($data['estado']=='Colmima' ){echo "selected";} ?> value="Colima">Colima</option>
                      <option <?php if($data['estado']=='Chiapas' ){echo "selected";} ?> value="Chiapas">Chiapas</option>
                      <option <?php if($data['estado']=='Chihuahua' ){echo "selected";} ?> value="Chihuahua">Chihuahua</option>
                      <option <?php if($data['estado']=='Distrito Federal' ){echo "selected";} ?> value="Distrito Federal">Distrito Federal</option>
                      <option <?php if($data['estado']=='Durango' ){echo "selected";} ?> value="Durango">Durango</option>
                      <option <?php if($data['estado']=='Guanajuato' ){echo "selected";} ?> value="Guanajuato">Guanajuato</option>
                      <option <?php if($data['estado']=='Guerrero' ){echo "selected";} ?> value="Guerrero">Guerrero</option>
                      <option <?php if($data['estado']=='Hidalgo' ){echo "selected";} ?> value="Hidalgo">Hidalgo</option>
                      <option <?php if($data['estado']=='Jalisco' ){echo "selected";} ?> value="Jalisco">Jalisco</option>
                      <option <?php if($data['estado']=='Mexico' ){echo "selected";} ?> value="Mexico">México</option>
                      <option <?php if($data['estado']=='Michoacan de Ocampo' ){echo "selected";} ?> value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                      <option <?php if($data['estado']=='Morelos' ){echo "selected";} ?> value="Morelos">Morelos</option>
                      <option <?php if($data['estado']=='Nayarit' ){echo "selected";} ?> value="Nayarit">Nayarit</option>
                      <option <?php if($data['estado']=='Nuevo Leon' ){echo "selected";} ?> value="Nuevo Leon">Nuevo León</option>
                      <option <?php if($data['estado']=='Oaxaca' ){echo "selected";} ?> value="Oaxaca">Oaxaca</option>
                      <option <?php if($data['estado']=='Puebla' ){echo "selected";} ?> value="Puebla">Puebla</option>
                      <option <?php if($data['estado']=='Queretaro' ){echo "selected";} ?> value="Queretaro">Querétaro</option>
                      <option <?php if($data['estado']=='Quintana Roo' ){echo "selected";} ?> value="Quintana Roo">Quintana Roo</option>
                      <option <?php if($data['estado']=='San Luis Potosi' ){echo "selected";} ?> value="San Luis Potosi">San Luis Potosí</option>
                      <option <?php if($data['estado']=='Sinaloa' ){echo "selected";} ?> value="Sinaloa">Sinaloa</option>
                      <option <?php if($data['estado']=='Sonora' ){echo "selected";} ?> value="Sonora">Sonora</option>
                      <option <?php if($data['estado']=='Tabasco' ){echo "selected";} ?> value="Tabasco">Tabasco</option>
                      <option <?php if($data['estado']=='Tamaulipas' ){echo "selected";} ?> value="Tamaulipas">Tamaulipas</option>
                      <option <?php if($data['estado']=='Tlaxcala' ){echo "selected";} ?> value="Tlaxcala">Tlaxcala</option>
                      <option <?php if($data['estado']=='Veracruz de Ignacio de la Llave' ){echo "selected";} ?> value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                      <option <?php if($data['estado']=='Yucatan' ){echo "selected";} ?> value="Yucatan">Yucatán</option>
                      <option <?php if($data['estado']=='Zacatecas' ){echo "selected";} ?> value="Zacatecas">Zacatecas</option>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="municipio">Municipio</label>
                    <input type="text" id="municipio" name="municipio" class="form-control isRequired" value="<?php echo $data['municipio']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="zona">Zona</label>
                    <input type="text" id="zona" name="zona" class="form-control isRequired" value="<?php echo $data['zona']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" id="ciudad" name="ciudad" class="form-control isRequired" value="<?php echo $data['ciudad']; ?>">
                  </div>
                  <div class="form-group col-3">
                    <label for="lat">Latitud</label>
                    <input type="text" id="lat" name="lat" class="form-control isRequired" value="<?php echo $data['lat']; ?>">
                  </div>
                  <div class="form-group col-3">
                    <label for="lng">Longitud</label>
                    <input type="text" id="lng" name="lng" class="form-control isRequired" value="<?php echo $data['lng']; ?>">
                  </div>
                  <div class="form-group col-6">
                    <label for="capacidad">Capacidad</label>
                    <input type="text" id="capacidad" name="capacidad" class="form-control isRequired" value="<?php echo $data['capacidad']; ?>">
                  </div>
                  <div class="form-group col-4">
                    <label for="evento">Tipo de evento</label>
                    <select class="form-control isRequired" name="evento" id="evento">
                      <option value="1">uno</option>
                      <option value="2">dos</option>
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <label for="status">Destacado</label>
                    <select class="form-control isRequired" name="destacado" id="destacado">
                      <option value="0" <?php if($data['destacado'] == 0) echo 'selected'; ?>>No destacado</option>
                      <option value="1" <?php if($data['destacado'] == 1) echo 'selected'; ?>>Destacado</option>
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <label for="status">Estado (Activa/inactiva)</label>
                    <select class="form-control isRequired" name="status" id="status">
                      <option value="0" <?php if($data['status'] == 0) echo 'selected'; ?>>Inactivo</option>
                      <option value="1" <?php if($data['status'] == 1) echo 'selected'; ?>>Activo</option>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="8" cols="50" class="form-control isRequired"><?php echo $data['descripcion'];?></textarea>
                  </div>
                  <div class="form-group col-6">
                    <label for="videos">Vídeos</label>
                    <input type="text" id="videos" name="videos" class="form-control isRequired" value="<?php echo $data['videos']; ?>">
                  </div>
                  <div class="col-12">
                    <h4>Servicios</h4>
                    <div class="row p-10 caracteristicas">
                      <?php echo $lista_caracteristicas; ?>
                    </div>
                  </div>
                  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                  <input type="hidden" name="fotos[]" id="fotos">
                  <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $data['id_usuario']; ?>">
                </div>
              </form>
            </div>
            <!-- <div class="row"> -->
              <div class="col-12 mb-20 pt-10">
                <hr>
                <h4>Fotos</h4>
              </div>
              <div class="col-12">
                <div class="dropzone" id="dz_fotos"></div>
              </div>
              <?php if($fotos != '[]' || $fotos != '[""]'): ?>
              <div class="col-12 mt-20">
                <h4>Lista de fotos</h4>
                  <div class="col-12">
                    <div class="row lista-fotos p-10" style="border: 1px solid lightgray; border-radius: 5px;">

                    </div>
                  </div>
                <!-- <button type="button" name="button" class="btn btn-primary onSubirFotos">Subir fotos</button> -->
              </div>
            <?php endif ?>
              <div class="col-7 offset-md-3">
                <button style="width:100%;" type="button" id="onSubirFotos" class="btn btn-outline-primary preSave mt-20" data-form="#frmQuinta" data-src="quinta" data-action="<?php echo $action; ?>">Guardar</button>
                <button style="width:100%;display:none;" type="button" id="onSave" class="btn btn-outline-primary onSave mt-20" data-form="#frmQuinta" data-src="quinta" data-action="<?php echo $action; ?>">Guardar</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if ($cambio): ?>
<div class="col-xl-3 col-lg-6 col-xs-12 div-cambio">
            <div class="card bg-primary mb-0">
              <i class="icon-close white font-large-2 float-xs-right" style="cursor:pointer;"></i>
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body white">
                                <h3><strong class="text-xs-left">Cambio:</strong></h3>
                                <p class="text-justify"><?php echo $cambio['cambio']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button style="displat:inline;width:50%;border-radius:0px;" type="button" data-action="aprobar" data-id="<?php echo $cambio['id']?>" class="btn btn-secondary onCambio">Aprobar</button>
            <button style="displat:inline;width:50%;border-radius:0px;" type="button" data-action="rechazar" data-id="<?php echo $cambio['id']?>" class="btn btn-secondary onCambio float-xs-right">Rechazar</button>
        </div>
<?php endif; ?>

<link rel="stylesheet" href="assets/css/dropzone.css">

<style media="screen">
  .card{border: 1px solid #ccd6e6;}
  .card-img-top{height: 150px; width:150px;}
  .caracteristicas{
    border: 1px solid #ccd6e6;
    border-radius: 5px;
    margin-right: 2.5px;
    margin-left: 2.5px;
  }
  .div-cambio{
    color:white;position:fixed;top:113px;right:30px;width:350px;
  }
  .div-cambio .bg-primary{opacity: 1;transition: opacity 1s;}
  .div-cambio .bg-primary:hover{opacity: .2;transition: opacity 1s;z-index: 0;}
</style>

<script src="assets/js/dropzone.js"></script>
<script src="assets/js/bootstrap-tokenfield.js"></script>
<script type="text/javascript">
$('#videos').tokenfield();
$('#videos').on('tokenfield:removedtoken', function (e) {
  if(!confirm('¿Desea eliminar este video?')) {e.preventDefault();}
})

$('.icon-close ').click(function(){
  $('.div-cambio').hide();$('.btn-show-cambio').show();
})
$('.btn-show-cambio').click(function(){
  $(this).hide();
  $('.div-cambio').show();
});


var fotos = <?php if($fotos) print_r($fotos); else echo "[]";?>;
if (fotos.length) $('#fotos').val(fotos);
var id = <?php if($id) echo($id); else echo "null";?>;
var isFotos = false;

Dropzone.autoDiscover = false;
var id_caracteristica;
var myFotos = new Dropzone("#dz_fotos", {
  url: "uploads/upload.php",
  addRemoveLinks: true,
  dictRemoveFile: 'Eliminar',
  autoProcessQueue: false,
  maxFilesize: 10,
  dictDefaultMessage: "Arrastre las fotos que desea subir (límite 10)",
  parallelUploads: 10
});

myFotos.on('sending', function(file, xhr, formData) {
  var name = Math.floor(Math.random() * 100) + '' + Date.now() + '.' +file.name.split('.')[1];
  fotos.push(name);
  // var folder = 'imagenes_quinta'+id+'/fotos';
  formData.append('folder', 'imagenes_quinta');
  formData.append('name', name);
});

$('.preSave').click(function(){
  isFotos ? myFotos.processQueue() : $('.onSave').click();
})

    myFotos.on('addedfile', function(file) {
      isFotos = true;
    });

myFotos.on("queuecomplete", function (file) {
  $('#fotos').val(fotos);
  $('.onSave').click();
});



// Fotos
fotos.forEach(function(element){
  if(element == '') return;
  var foto = '<div class="col-3">\
                      <div class="card mb-0 p-5 mb-1">\
                      <a href="uploads/imagenes_quinta/'+element+'" target="_blank">\
                        <div class="card-body center">\
                          <img class="card-img-top img-fluid" src="uploads/imagenes_quinta/'+element+'" alt="Card image cap">\
                        <div class="card-block p-0 center">\
                        </a>\
                          <a href="javascript:void(0);" class="btn btn-sm btn-danger onDeleteImagen" data-id="'+id+'" data-path="imagenes_quinta" data-imagen="'+element+'" style="margin-top:2px;">Eliminar</a>\
                        </div>\
                      </div>\
                    </div>\
                    </div>';
  $('.lista-fotos').append(foto)
})
</script>
