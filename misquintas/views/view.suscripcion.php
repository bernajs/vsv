<div class="row justify-content-between">
  <div class="col-12 col-md-5 px-4 py-5 bw">
    <div class="row">
      <div class="col-12">
        <div class="pb-4 ct">
        <h4>Suscripción</h4>
        <span class="float-right">Tu suscripción vence en <b>5 días</b></span>
        <hr>
      </div>
        <p>En esta sección se podrá ver el detalle de la suscripción  del usuario. Se podrá tener la opción para modificar el  tipo de suscripción, datos de la tarjeta y el historial de  suscripción</p>
        <h6 class="ct">Tipo de suscripcion</h6>
        <form>
          <div class="row">
            <div class="col-12 form-check">
              <label class="form-check-label">
                <input type="radio" name="" value="">
                Regular
              </label>
            </div>
            <div class="col-12 form-check">
              <label class="form-check-label">
                <input type="radio" name="" value="">
                Premium
              </label>
            </div>
              <div class="form-group col-12 mt-4">
                <h6 class="ct">Datos de la tarjeta</h6>
                <label for="titular">Titular</label>
                <input type="text" name="titular" id="titular" class="form-control" value="">
              </div>
              <div class="form-group col-12">
                <label for="tarjeta">Número de tarjeta</label>
                <input type="text" name="tarjeta" id="tarjeta" class="form-control" value="">
              </div>
              <div class="form-group col-6">
                <label for="tipo">Tipo de tarjeta</label>
                <select class="form-control" name="tipo">
                  <option value="1">1</option>
                  <option value="1">1</option>
                  <option value="1">1</option>
                </select>
              </div>
              <div class="form-group col-3">
                <label for="mes">Expiración</label>
                <select class="form-control" name="mes">
                  <option value="1">1</option>
                  <option value="1">1</option>
                  <option value="1">1</option>
                </select>
              </div>
              <div class="form-group col-3">
                <label for="dia">Día</label>
                <select class="form-control" name="dia">
                  <option value="1">1</option>
                  <option value="1">1</option>
                  <option value="1">1</option>
                </select>
              </div>
              <div class="col-12">
                <button type="button" name="button" class="btn btn-primary fwidth bs">EDITAR TARJETA</button>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-12 mt-md-0 mt-4 px-4 py-5 bw">
    <div class="row align-items-center">
      <div class="col-12">
        <div class="row">
          <div class="col-6 align-self-center">
            <h6 class="mb-0 ct">Detalle de suscripciones</h6>
          </div>
          <div class="col-6 align-self-center">
            <div class="float-right">
              <select class="form-control pt-2" name="mes">
                <option value="enero">Enero</option>
                <option value="enero">Enero</option>
                <option value="enero">Enero</option>
                <option value="enero">Enero</option>
                <option value="enero">Enero</option>
              </select>
            </div>
          </div>
        </div>
        <hr>
      </div>
  <div class="col-12 mt-3">
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
  </div>
  </div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js">
<script src="../admin/assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<style media="screen">
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
</style>

<script type="text/javascript">
$('#example').DataTable();
$('#example_filter').addClass('float-md-right');
</script>
