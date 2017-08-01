<?php
  include_once('../admin/_class/class.usuario.php');
  $Usuario = new Usuario();
  
 ?>
<div class="row">
  <div class="col-12 mb-4 cw">
    <div class="row justify-content-between">
      <div class="col-md-3 col-12 py-3 detalle text-center bt">
        <h2 class="mb-0 text-center"><i class="fa text-left fa-calendar-minus-o" aria-hidden="true"></i> 28</h2>
        <span class="text-center">Reservaciones</span>
      </div>
      <div class="col-md-3 col-12 py-3 detalle text-center bs">
        <h2 class="mb-0 text-center"><i class="fa text-left fa-usd" aria-hidden="true"></i> 13,025.00</h2>
        <span class="text-center">Ganancias totales</span>
      </div>
      <div class="col-md-3 col-12 py-3 detalle text-center bp">
        <h2 class="mb-0 text-center"><i class="fa text-left fa-star-o" aria-hidden="true"></i> 22</h4>
        <span class="text-center">Reseñas</span>
      </div>
    </div>
  </div>
  <div class="col-12 mt-3">
    <div class="row justify-content-between">
      <div class="col-12 col-md-6">
        <div class="row">
          <div class="col-md-11 col-12 mb-4 bw p-4">
            <div id='calendar'></div>
          </div>
          <div class="col-md-11 col-12 bw mt-md-3 mb-4 mb-md-0 p-4">
              <div class="row">
                <div class="col-12 agendar">
                  <h4 class="">Agendar mi calendario</h4>
                  <hr>
                  <form>
                    <div class="row justify-content-center">
                      <div class="col-6 form-group">
                        <label for="mes">Mes</label>
                        <select name="mes" id="mes" class="form-control">
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <div class="col-3 form-group">
                        <label for="dia">Día</label>
                        <select name="dia" id="dia" class="form-control">
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <div class="col-3 form-group">
                        <label for="Año">Año</label>
                        <select name="Año" id="Año" class="form-control">
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <div class="col-12 form-group">
                        <label for="horario">Horario</label>
                        <select name="horario" id="horario" class="form-control">
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                        </select>
                      </div>
                      <div class="col-12 form-group">
                        <button type="button" name="button" class="btn btn-primary fwidth bs">AGENDAR</button>
                        </select>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-12 px-4 py-5 bw">
        <div class="row align-items-center">
          <div class="col-11">
            <div class="row">
              <div class="col-6 align-self-center">
                <h6 class="mb-0 ct">Historial de pagos</h6>
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
  </div>
</div>
<!--  Calendario -->
<link rel="stylesheet" href="../css/fullcalendar.min.css">
<script src="http://momentjs.com/downloads/moment-with-locales.js" charset="utf-8"></script>
<script src="../js/plugins/fullcalendar.min.js" charset="utf-8"></script>
<!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js">
<script src="../admin/assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
<style media="screen">
  .detalle, .agendar{
    background-color: white;
  }
  .agendar{
    /*padding:50px;*/
  }
  .total{border-bottom: 1px solid;}
  body{background-color: #EFF2F7;}
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
  $(document).ready(function(){
    $('#calendar').fullCalendar({})
    $('#example').DataTable();
    $('#example_filter').addClass('float-md-right');
  })
</script>
