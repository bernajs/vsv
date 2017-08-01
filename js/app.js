/* USER */
var Cliente;
var quintaList;
var quintas;

Cliente = {
    init: function () {
        var _self = this;
        this.order = Array();
        this.me = null;
        _self.addEventListeners();
    },
    /* EVENT LISTENERS */
    addEventListeners: function () {
        var _self = this;
        $(document).on("click", "a.onFbLogin", function (e) {_self.fb_login(e);});
        $(document).on("click", "a.onLogin", function (e) {_self.login(e);});
        $(document).on("click", "a.onBuscar", function (e) {_self.buscar(e);});
        $(document).on("click", "a.addFavorito", function (e) {_self.add_favorito(e);});
        $(document).on("click", "a.delFavorito", function (e) {_self.del_favorito(e);});
        $(document).on("click", "a.onLoginQuinta", function (e) {_self.login_quinta(e);});
        $(document).on("click", "a.socioLogin", function (e) {_self.socioLogin(e);});
        $(document).on("click", "a.onAsociarme", function (e) {_self.asociarme(e);});
        $(document).on("click", "a.onRegistro", function (e) {_self.registro(e);});
        $(document).on("click", "a.onRecover", function (e) {_self.recover(e);});
        $(document).on("click", "a.onQuinta", function (e) {_self.quinta(e);});
        $(document).on("click", "a.onReservar", function (e) {_self.reservar(e);});
        $(document).on("click", "a.onUpdate", function (e) {_self.update(e);});
        $('.isRequired').change(function () {$(this).parent().removeClass('has-danger');});
        $('.isNumber').keyup(function () { this.value = this.value.replace(/[^0-9\.]/g, ''); });
        // (e.currentTarget.dataset.id);
    },
    asociarme: function () {
        var _self = this;
        var info = DAO.toObject($("#frmRegistro").serializeArray());
        if (!_self.validate("#frmRegistro")) {swal('', 'Por favor llena los campos marcados', 'error'); return;}
        // if(!info.terminos){swal('l', 'Por favor acepta los términos y condiciones'); return;}
        DAO.execute("../_ctrl/ctrl.usuario.php", {
                exec: "asociarme",
                data: info
            }, function (r) {
                if (r.status == 202) {
                    swal("Felicidades, tu registro se ha completado correctamente.");
                    // swal({title: "",text: "Felicidades, tu registro se ha completado correctamente",type: "success",confirmButtonColor: "#a0d758",confirmButtonText: "Ok",closeOnConfirm: true,},
                    // function(isConfirm){if (isConfirm) {location.href = 'index.php';}});
                    setTimeout(function(){location.href = 'index.php';},2000)
                } else if (r.status == 404) {
                    swal("Ya hay una cuenta registrada con el correo ingresado.");
                }
            });
    },
    registro: function () {
        var _self = this;
        var info = DAO.toObject($("#frmRegistro").serializeArray());
        if (!_self.validate("#frmRegistro")) {swal('', 'Por favor llena los campos marcados', 'error'); return;}
        // if(!info.terminos){swal('l', 'Por favor acepta los términos y condiciones'); return;}
        DAO.execute("_ctrl/ctrl.usuario.php", {
                exec: "asociarme",
                data: info
            }, function (r) {
                if (r.status == 202) {
                    swal("Felicidades, "+r.nombre+" tu registro se ha completado correctamente.");
                    $('.paso-pago').click();
                    $('#id_usuario').val(r.uid);
                    // swal({title: "",text: "Felicidades, tu registro se ha completado correctamente",type: "success",confirmButtonColor: "#a0d758",confirmButtonText: "Ok",closeOnConfirm: true,},
                    // function(isConfirm){if (isConfirm) {location.href = 'index.php';}});
                    // setTimeout(function(){location.href = 'index.php';},2000)
                } else if (r.status == 404) {
                    swal("Ya hay una cuenta registrada con el correo ingresado.");
                }
            });
    },
    buscar: function () {
        var _self = this;
        var info = DAO.toObject($("#frmBuscar").serializeArray());
        if (!_self.validate("#frmBuscar")) {swal('', 'Por favor llena los campos marcados', 'error'); return;}
        DAO.execute("_ctrl/ctrl.service.php", {
                exec: "buscar",
                data: info
            }, function (r) {
                if (r.status == 202) {
                  var data = r.data;
                  var buffer = '';
                  quintas = data;
                  data.forEach(function(element){
                    buffer+=html_quinta(element);
                  });
                  $('.list').html(buffer);
                  var options = {valueNames: [ 'nombre', 'precio', 'calificacion' ], page: 3,pagination: true};
                  quintaList = new List('quintas', options);
                  // quintaList.sort('nombre', { order: "asc" });
                  // quintaList.sort('nombre', { order: "asc" });
                  $('.pagination li').addClass('page-item');
                } else if (r.status == 404) {
                    swal("No se encontró ninguna Quinta con la información seleccionado.");
                }
            });
    },
    reservar: function () {
        var _self = this;
        var info = DAO.toObject($("#frmReservar").serializeArray());
        if (!_self.validate("#frmReservar")) {swal('', 'Por favor llena los campos marcados', 'error'); return;}
        if (!isValidEmail(info.correo)) {swal('Error','Por favor ingresa un email válido.');return;}
        DAO.execute("_ctrl/ctrl.service.php", {
                exec: "reservar",
                data: info
            }, function (r) {
                if (r.status == 202) {
                    swal("Felicidades, tu reservacion se ha generado con éxito.");
                    setTimeout(function(){location.href = "index.php?call=perfil";}, 1000);
                } else {
                    swal("Ocurrió un error, por favor vuelvea intentarlo.");
                }
            });
    },
    quinta: function () {
        var _self = this;
        var info = DAO.toObject($("#frmQuinta").serializeArray());
        if (!_self.validate("#frmQuinta")) {swal('error', 'Por favor llena los campos marcados');return false;};
        info.destacado = 0;
        info.videos = 0;
        DAO.execute("../admin/_ctrl/ctrl.quinta.php", {
                exec: "save",
                data: info
            }, function (r) {
                if (r.status == 202) {
                    swal("Felicidades, tu Quitna ha sido registrada, uno de nuestros administradores se pondrá en contacto contigo para activarla.");
                    location.reload();
                    // $('#myModal').modal('close')
                } else if (r.status == 404) {
                    swal("Ya hay una Quinta registrada con el nombre ingresado.");
                }
            });
    },
    recover: function () {
        var _self = this;
        var correo = $('#recover_email').val();
        if (!correo) {
            return false;
        };
        DAO.execute("_ctrl/ctrl.cliente.php", {
            exec: "recover",
            data: correo
        }, function (r) {
            if (r.status == 202) {
                swal("La contraseña se ha enviado a tu correo electrónico.");
                // location.href = 'home.php';
            } else if (r.status == 404) {
                swal("El correo ingresado no coincide con ninguna cuenta registrada.");
            }

        });
    },
    login: function () {
        var _self = this;
        var info = DAO.toObject($("#frmLogin").serializeArray());
        if (!_self.validate("#frmLogin")) {swal('', 'Por favor llena los campos marcados','error');return false;};
        DAO.execute("_ctrl/ctrl.usuario.php", {
            exec: "login",
            data: info
        }, function (r) {
            if (r.status == 202) {
                swal("Bienvenido");
                // $('#id_usuario').val(r.uid);
                setTimeout(function () {
                    location.href = r.redirect;
                }, 1000);
            } else if (r.status == 404) {
                swal("Algo salió mal, por favor vuelve a intentarlo.");
            } else {
                swal('Usuario o contraseña incorrectos');
            }
        });

    },
    add_favorito: function (e) {
        var id = (e.currentTarget.dataset.qid);
        var uid = (e.currentTarget.dataset.uid);
        if(!uid){swal('','Para agregar a favorito debes de estar registrado', 'error');return;}
        DAO.execute("_ctrl/ctrl.usuario.php", {
            exec: "favorito",
            data: {'id':id, 'uid':uid}
        }, function (r) {
            if (r.status == 202) {
              $('.addFavorito').addClass('delFavorito').removeClass('addFavorito').attr('data-fid', r.fid).text('Eliminar de favoritos');
            } else{
                swal("Algo salió mal, por favor vuelve a intentarlo.");
            }
        });
    },
    del_favorito: function (e) {
        var fid = (e.currentTarget.dataset.fid);
        DAO.execute("_ctrl/ctrl.usuario.php", {
            exec: "del_favorito",
            data: fid
        }, function (r) {
            if (r.status == 202) {
              $('.delFavorito').addClass('addFavorito').removeClass('delFavorito').text('Agregar a favoritos');
            } else{
                swal("Algo salió mal, por favor vuelve a intentarlo.");
            }
        });
    },
    login_quinta: function () {
        var _self = this;
        var info = DAO.toObject($("#frmLogin").serializeArray());
        if (!_self.validate("#frmLogin")) {swal('error', 'Por favor llena los campos marcados');return false;};
        DAO.execute("_ctrl/ctrl.usuario.php", {
            exec: "login",
            data: info
        }, function (r) {
            if (r.status == 202) {
                swal("Bienvenido");
                $('#id_usuario').val(r.uid);
                $('.paso-pago').click();
                // setTimeout(function () {
                //     location.href = r.redirect;
                // }, 1000);
            } else if (r.status == 404) {
                swal("Algo salió mal, por favor vuelve a intentarlo.");
            } else {
                swal('Usuario o contraseña incorrectos');
            }
        });

    },
    socioLogin: function () {
        var _self = this;
        var info = DAO.toObject($("#frmLogin").serializeArray());
        if (!_self.validate("#frmLogin")) {swal('error', 'Por favor llena los campos marcados');return false;};
        DAO.execute("../_ctrl/ctrl.usuario.php", {
            exec: "login",
            data: info
        }, function (r) {
            if (r.status == 202) {
                swal("Bienvenido");
                setTimeout(function () {
                    location.href = r.redirect;
                }, 1000);
            } else if (r.status == 404) {
                swal("Algo salió mal, por favor vuelve a intentarlo.");
            } else {
                swal('Usuario o contraseña incorrectos');
            }
        });
    },
    fb_login: function () {
        var _self = this;
        var info = DAO.toObject($("#frmLogin").serializeArray());
        DAO.execute("_ctrl/ctrl.cliente.php", {
            exec: "fb_login",
            data: info
        }, function (r) {
            if (r.status == 202) {
                swal("Bienvenido.");
                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else if (r.status == 404) {
                swal("Algo salió mal, por favor vuelve a intentarlo.");
            }
        });

    },
    get_reservaciones: function (id, fecha) {
      $('.status').removeClass('reservado selected');
        DAO.execute("_ctrl/ctrl.service.php", {
            exec: "get_reservaciones",
            data: {'id': id, 'fecha': fecha}
        }, function (r) {
            if (r.status == 202) {
              var horarios = r.horarios;
              horarios.forEach(function(element){$('.horario-'+element.id_horario+' .status').addClass('reservado');})
              $('')
            } else if (r.status == 404) {
                // swal("Algo salió mal, por favor vuelve a intentarlo.");
            }
        });
    },
    update: function () {
        var _self = this;
        var info = DAO.toObject($("#frmUsuario").serializeArray());
        if (!_self.validate("#frmUsuario")) {swal('', 'Por favor llena los campos marcados', 'error'); return;}
        if (!isValidEmail(info.correo)) {swal('','Por favor ingresa un email válido.', 'error');return;}
        DAO.execute("_ctrl/ctrl.usuario.php", {
                exec: "update",
                data: info
            }, function (r) {
                if (r.status == 202) {
                    swal("Felicidades, tu perfil ha sido actualizado.");
                } else {
                    swal("Ocurrió un error, por favor vuelvea intentarlo.");
                }
            });
    },
    filtro: function () {

    },
    validate: function (form) {
  		var flag = true;
  		$(form + " .isRequired").each(function (index) {
  			if ($(this).val() == "" || $(this).val() == "NULL" || $(this).val() == null) {
  				$(this).parent().addClass("has-danger");
  				flag = false;
  			}
  		});
  		return flag;
  	}
};

$(window).on('load', function () {
    Cliente.init();
    DAO.init();
});

function isValidEmail(email) {
	var re = /\S+@\S+\.\S+/;
	return re.test(email);
}

DAO = {
    init: function () {
        var _self = this;
    },
    toObject: function (form) {
        var data = {};
        $.each(form, function (key, element) {
            data[element.name] = element.value;
        });
        return data;
    },
    execute: function (ctrl, data, callback) {
        $.ajax({
            type: "POST",
            url: ctrl,
            data: data,
            dataType: "json",
            success: function (r) {
                callback(r);
            },
            error: function (r) {
                console.log(r);
            }
        });
    }
};

function calificacion(calificacion){
  var buffer = '';
  var activo;
  for (var i = 1; i <= calificacion; i++) {
    calificacion >= i ? activo = 'cp' : activo = 'cg';
    buffer += '<i class="fa fa-star '+activo+'" aria-hidden="true"></i>';
    }
    return buffer;
  }
  function sort(a, b) {
  if (Math.abs(b.values().name.localeCompare(a.values().name)) == 1) {
    return b.values().name.localeCompare(a.values().name)
  } else {
    return a.values().born - b.values().born;
  }
}
function format_precio(precio){return Number(precio).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');}
function html_quinta(element){
  return `<li><div class="row quinta py-2 py-md-0 animated fadeIn">
    <div class="col-12 col-md-5 pl-md-0 image">
      <div class="card mb-md-0">
        <!-- <img class="card-img-top" src="" alt="Card image cap"> -->
        <div class="card-block">
          <h4 class="card-title nombre">`+element.quinta.nombre+`</h4>
          <span class="calificacion c`+element.quinta.calificacion+`">`+calificacion(element.quinta.calificacion)+`</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-7 py-4 quinta-descripcion">
      <div class="row">
        <div class="col-12">
          <span class="float-right">Comentarios: `+element.comentarios+`</span>
          <h4 class="precio">$`+format_precio(element.quinta.menor_precio)+`</h4>
          <p class="my-4 descripcion">`+element.quinta.descripcion+`</p>
          <div class="row">
            <div class="col-4">
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <div class="col-6 offset-2">
              <a data-id="`+element.quinta.id_quinta+`" class="btn btn-primary fwidth shadow bs cw ver">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div></li>`;
}
