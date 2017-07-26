<?php
if($uid){$usuario = $Service->get_usuario($uid);$usuario = $usuario[0];}
else{header("Location: http://localhost/mobkii/vsv/index.php");}
 ?>
<div class="row justify-content-between">
  <div class="col-12 profile-info py-md-5 px-md-5 py-1 px-1">
    <form>
        <!-- <div class="row">
          <div class="col-6 form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="" class="form-control">
          </div>
          <div class="col-6 form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" value="" class="form-control">
          </div>
          <div class="col-6 form-group">
            <label for="correo">Correo</label>
            <input type="text" name="correo" value="" class="form-control">
          </div>
          <div class="col-6 form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" value="" class="form-control">
          </div>
          <div class="col-6 form-group">
            <label for="contrasena">Contraseña</label>
            <input type="text" name="contrasena" value="" class="form-control">
          </div>
          <div class="col-6 form-group">
            <label for="confirmar_contrasena">Confirmar contraseña</label>
            <input type="text" name="confirmar_contrasena" value="" class="form-control">
          </div>
          <div class="col-6 offset-3">
            <button type="button" name="button" class="btn btn-primary bt fwidth">Guardar</button>
          </div>
        </div> -->
<div class="row">
  <div class="col-md-6 col-12 mt-3">
    <div class="form-group row">
      <label for="nombre" class="col-md-2 col-3 col-form-label">Nombre:</label>
      <div class="col-md-10 col-9">
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>">
      </div>
    </div>
  </div>
  <div class="col-md-6 col-12 mt-3">
    <div class="form-group row">
      <label for="apellidos" class="col-md-2 col-3 col-form-label">Apellidos:</label>
      <div class="col-md-10 col-9">
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario['apellido']; ?>">
      </div>
    </div>
  </div>
  <div class="col-md-6 col-12 mt-3">
    <div class="form-group row">
      <label for="correo" class="col-md-2 col-3 col-form-label">Correo:</label>
      <div class="col-md-10 col-9">
        <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $usuario['correo']; ?>">
      </div>
    </div>
  </div>
  <div class="col-md-6 col-12 mt-3">
    <div class="form-group row">
      <label for="telefono" class="col-md-2 col-3 col-form-label">Teléfono:</label>
      <div class="col-md-10 col-9">
        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usuario['telefono']; ?>">
      </div>
    </div>
  </div>
  <div class="col-md-6 col-12 mt-3">
    <div class="form-group row">
      <label for="contrasena" class="col-md-2 col-3 col-form-label">Contraseña:</label>
      <div class="col-md-10 col-9">
        <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo $usuario['contrasena']; ?>">
      </div>
    </div>
  </div>
  <div class="col-md-6 col-12 mt-3">
    <div class="form-group row">
      <label for="confirmar_contrasena" class="col-md-2 col-3 col-form-label">Confirmar:</label>
      <div class="col-md-10 col-9">
        <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" value="<?php echo $usuario['contrasena']; ?>">
      </div>
    </div>
  </div>
  <div class="col-md-6 col-12 mt-3 offset-md-3">
    <button type="button" name="button" class="btn btn-primary bs fwidth">Guardar</button>
  </div>
</div>
    </form>
  </div>
  <div class="col-12 tabla-info mt-5 p-5 pt-0">
    <ul class="nav nav-tabs ct mb-4" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#historial" role="tab">Historial de reservaciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#metodos" role="tab">Métodos de pago</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#favoritos" role="tab">Favoritos</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="historial" role="tabpanel">
        <table id="example" class="table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Periodo</th>
                <th>Fecha de pago</th>
                <th>Servicio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Enero</td>
                <td>01-ene-2017</td>
                <td>Premium</td>
                <td class="pagado">Aprobado</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Enero</td>
                <td>01-ene-2017</td>
                <td>Premium</td>
                <td class="pagado">Aprobado</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Enero</td>
                <td>01-ene-2017</td>
                <td>Premium</td>
                <td class="pagado">Aprobado</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Enero</td>
                <td>01-ene-2017</td>
                <td>Premium</td>
                <td class="pagado">Aprobado</td>
            </tr>
        </tbody>
    </table>
      </div>
      <div class="tab-pane" id="metodos" role="tabpanel">...</div>
      <div class="tab-pane" id="favoritos" role="tabpanel">...</div>
    </div>
  </div>
</div>

<style media="screen">
body{background-color: #e8e6e6;}
.navbar a {color: black !important;}
.sub-header{margin-top: 0px;}
.profile-pic, .profile-info, .tabla-info{
    background-color: white;
  }

  .acciones-quinta{font-size: 12px;}

  .item-info{
    border: 1px solid lightgray;
  padding:15px;
  }

  .item-info-content{
    background-color: lightgray;
    border: 1px solid lightgray;
    height: 150px;
  }

  #example_info, .dataTables_length label, th, label{color:#16b8ff !important}


  .total{border-bottom: 1px solid;}
  body{background-color: #e8e6e6;}
    h4{display: inline;}
    .datatable{background-color: lightgray;}
    .form-group label{color:#16b8ff !important}
    select{
      height: 27px !important;
  font-size: 12px !important;
  padding: 5px !important;
    }
    .pagado::before{
      content: '● ';
    }
    .pagado{
      color: #a0d758 !important;
    }
    /*td{color: #eceeef;}*/
    th.sorting, th.sorting_asc{font-size: 12px !important; color: #16b8ff !important;}
    td{padding:3px !important;}
    .dataTables_paginate{display: none !important;}
    .dataTables_wrapper label, .dataTables_info{color: #16b8ff !important;}
  /*.profile  -info{padding:50px;}*/
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js">
<script src="admin/assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var fecha = '<?php echo $usuario['created_at']; ?>';
    fecha = moment(fecha).format('DD/MM/YYYY');
    $('.sub-header h1').html('Mi perfil'); $('.sub-header p').html('Miebro desde: ' + fecha);
    $(document).ready(function() {
      $('#example').DataTable();
      $('#example_filter').addClass('float-md-right');
} );
  })
</script>
