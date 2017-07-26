<div class="row justify-content-between">
  <div class="col-6 px-4 py-5 bw">
    <div class="row align-items-center">
      <div class="col-12">
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
  <div class="col-12 col-md-5 bw p-5">
    <div class="row">
      <div class="col-12">
        <canvas id="myChart" width="auto" height="200"></canvas>
      </div>
      <div class="col-12 text-center total mt-5 pb-3">
        <h1 class="">Total: <b class="">$35,600</b></h1>
        <span>Ganancias totales del mes: <span class="ct">Abril 17</span></span>
      </div>
    </div>
  </div>
</div>

<style media="screen">
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
</style>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js">
<script src="../admin/assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
<script>
$('#example').DataTable();
$('#example_filter').addClass('float-md-right');
Chart.defaults.global.legend.display = false;
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            // borderWidth:   1
        }]
    },
    options : {
        scales : {
            xAxes : [ {
                gridLines : {
                    display : false
                }
            } ],
            yAxes : [ {
                gridLines : {
                    display : false
                }
            } ]
        }
    }
});
</script>
