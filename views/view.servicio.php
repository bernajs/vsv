<?php

$categorias = $Service->get_categorias(true);
$categorias_options = '';
if($categorias){
  foreach ($categorias as $categoria) {
    // $categorias_options .= '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
    // $categorias_options .= '<li class="list-group-item onBuscarServicio" data-id="'.$categoria['id'].'">'.$categoria['nombre'].'</li>';
    $categorias_options .= '<h6 class="onBuscarServicio my-3" data-id="'.$categoria['id'].'">'.$categoria['nombre'].'</h6>';
  }
}
?>

<div class="row">
  <!-- <div class="col-12 filtro-servicio">
    <div class="row">
      <div class="form-group col-12">
        <label for="servicio">Tipo de servicio</label>
        <select class="form-control" name="categoria" id="categoria">
          <?php echo $categorias_options; ?>
        </select>
      </div>
      <div class="button-group col-6 offset-3">
        <button type="button" name="button" class="btn btn-primary fwidth br-50 onBuscarServicio">Buscar servicio</button>
      </div>
    </div>
  </div> -->
  <div class="col-12 col-md-4 mt-4">
    <h4 class="mb-2">Categorías</h4>
    <ul class="list-group">
      <?php echo $categorias_options ?>
    </ul>
  </div>
  <div class="col-12 col-md-8 my-4">
    <div class="row">
      <div class="col-12 mb-4">
        <h3 class="">Resultados para: <span class="categoria-nombre"></span></h3>
      </div>
      <div class="col-12 lista_servicios">

      </div>
    </div>
  </div>
</div>


<style media="screen">
  .filtro-servicio{
    background-color: lightgray;
    padding: 50px;
  }
  .servicio{
    padding: 20px;
  }
  .detalles-servicio{
    font-size: 8px !important;
    color: gray;
  }

.categorias-servicio{font-size: 12px;}
  .categoria-descripcion{background-color: #f7f7f7;}
h6{cursor: pointer;}
  li{cursor: pointer;}
</style>

<script type="text/javascript">
$('.sub-header h1').html('Servicios'); $('.sub-header p').html('');
$('.onBuscarServicio').click(function(){
  var id = $(this).data('id');
  var categoria = $(this).html();
  // $('li').removeClass('active');
  // $(this).addClass('active');
  get_servicios(id, categoria);
})

var id = <?php if(isset($_GET['id'])){echo $_GET['id'];}else{echo 'null';} ?>;
if(id) get_servicios(id);

function get_servicios(id){
  $.ajax({
    url: '_ctrl/ctrl.service.php',
    type: 'POST',
    data: {'exec': 'get_servicios_by_categoria', 'data': id},
    success(r){
      var r = JSON.parse(r);
      if(r.status == 202){
        var buffer = '';
        var lista_categorias = '';
        var img_categoria = '';
        if(!r.servicios) return;
        r.servicios.forEach(function(element){
          lista_categorias = '';img_categoria='';
          if(element.categorias){element.categorias.forEach(function(categoria){
            lista_categorias += categoria.nombre +', ';
            img_categoria += '<img src="admin/uploads/categoria/'+categoria.imagen+'" alt="'+categoria.nombre+'" style="height:20px;width:20px;border-radius:50px; background-color:lightgray; margin-right: 5px;">';
          });lista_categorias = lista_categorias.substring(0, lista_categorias.length - 2);}

          var info = JSON.parse(element.servicio.info);
          buffer += '\
          <div class="row servicio animated pulse pb-0">\
              <div class="col-12 col-md-5 p-0 img-categoria" style="background: url(admin/uploads/servicio/'+element.servicio.imagen+') no-repeat center center;">\
              </div>\
              <div class="col-12 col-md-7 mt-md-0 py-3 categoria-descripcion">\
                <div class="row">\
                  <div class="col-12">\
                    <h4 class="mb-0">'+element.servicio.nombre+'</h4>\
                    <p class="categorias-servicio mb-0">Categorias: <span class="ct">'+lista_categorias+'</span></p>\
                    <p>'+info.descripcion+'</p>\
                  </div>\
                  <div class="col-md-4 col-12 text-center">\
                  '+img_categoria+'\
                  </div>\
                  <div class="col-md-8 col-12">\
                <div class="row" style="height:24px;">\
                  <div class="col-12 align-self-center text-center"><span class="float-md-right detalles-servicio ct"> '+info.telefono+' <span class="ch">|</span>  '+info.correo+' <span class="ch">|</span> '+info.pagina+'</span></div>\
                  </div>\
                </div>\
              </div>\
              </div>\
          </div>\
          ';
        });
        console.log(r);
        $('.lista_servicios').html(buffer).hide().show();
        $('.categoria-nombre').html(r.categoria.nombre);
      }else{alert('Esta categoría aún no tiene ningún servicio');$('.lista_servicios').html('');}
    }
  })
}
</script>
