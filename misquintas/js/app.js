/* USER */
var Cliente;

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
        $(document).on("click", "a.onAsociarme", function (e) {_self.asociarme(e);});
        $(document).on("click", "a.onEdicion", function (e) {_self.edicion(e);});
        $(document).on("click", "a.onFbLogin", function (e) {_self.fb_login(e);});
        $(document).on("click", "a.onLogin", function (e) {_self.login(e);});
        $(document).on("click", "a.onLoginQuinta", function (e) {_self.login_quinta(e);});
        $(document).on("click", "a.onQuinta", function (e) {_self.quinta(e);});
        $(document).on("click", "a.onRecover", function (e) {_self.recover(e);});
        $(document).on("click", "a.onRegistro", function (e) {_self.registro(e);});
        $(document).on("click", "a.onUpdate", function (e) {_self.update(e);});
        $(document).on("click", "a.socioLogin", function (e) {_self.socioLogin(e);});
        $('.isRequired').keyup(function () {$(this).parent().removeClass('has-danger');});
        $('.isNumber').keyup(function () { this.value = this.value.replace(/[^0-9\.]/g, ''); });
        // (e.currentTarget.dataset.id);
    },
    asociarme: function () {
        var _self = this;
        var info = DAO.toObject($("#frmRegistro").serializeArray());
        if (!_self.validate("#frmRegistro")) {swal('Error', 'Por favor llena los campos marcados'); return;}
        // if(!info.terminos){swal('l', 'Por favor acepta los términos y condiciones'); return;}
        DAO.execute("../_ctrl/ctrl.usuario.php", {
                exec: "asociarme",
                data: info
            }, function (r) {
                if (r.status == 202) {
                    swal("","Felicidades, tu registro se ha completado correctamente.","success");
                    // swal({title: "",text: "Felicidades, tu registro se ha completado correctamente",type: "success",confirmButtonColor: "#a0d758",confirmButtonText: "Ok",closeOnConfirm: true,},
                    // function(isConfirm){if (isConfirm) {location.href = 'index.php';}});
                    setTimeout(function(){location.href = 'index.php';},2000)
                } else if (r.status == 404) {
                    swal("Ya hay una cuenta registrada con el correo ingresado.");
                }
            });
    },
    quinta: function () {
        var _self = this;
        var info = DAO.toObject($("#frmQuinta").serializeArray());
        if (!_self.validate("#frmQuinta")) {swal('', 'Por favor llena los campos marcados', 'error');return false;};
        info.destacado = 0;
        info.videos = 0;
        DAO.execute("../_ctrl/ctrl.quinta.php", {
                exec: "save",
                data: info
            }, function (r) {
                if (r.status == 202) {
                    swal("", "Felicidades, tu Quinta ha sido registrada, uno de nuestros administradores se pondrá en contacto contigo para activarla.", "success");
                    setTimeout(function(){location.reload();}, 2000);
                } else if (r.status == 404) {
                    swal("", "Ya hay una Quinta registrada con el nombre ingresado.", "error");
                }
            });
    },
    edicion: function () {
        var _self = this;
        var info = DAO.toObject($("#frmEdicion").serializeArray());
        if (!_self.validate("#frmEdicion")) {swal('', 'Por favor llena los campos marcados', 'error');return false;};
        DAO.execute("../_ctrl/ctrl.quinta.php", {
                exec: "edicion",
                data: info
            }, function (r) {
                if (r.status == 202) {
                    swal("", "Felicidades, Tu edición ha sido enviada al administrador para que la apruebe.", "success");
                    $('#cambio').val('');
                    $('.modal .close').click();
                } else if (r.status == 404) {
                    swal("", "Ocurrió un error, por favor vuelve a intentarlo.", "error");
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
    socioLogin: function () {
        var _self = this;
        var info = DAO.toObject($("#frmLogin").serializeArray());
        if (!_self.validate("#frmLogin")) {swal('', 'Por favor llena los campos marcados','error');return false;};
        DAO.execute("../_ctrl/ctrl.usuario.php", {
            exec: "login",
            data: info
        }, function (r) {
            if (r.status == 202) {
                swal("","Bienvenido", "success");
                setTimeout(function () {
                    location.href = r.redirect;
                }, 1000);
            } else if (r.status == 404) {
                swal("", "Algo salió mal, por favor vuelve a intentarlo.", "error");
            } else {
                swal("",'Usuario o contraseña incorrectos', "error");
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
    update: function () {
        var _self = this;
        var info = DAO.toObject($("#frmUsuario").serializeArray());
        if (!_self.validate("#frmUsuario")) {swal('', 'Por favor llena los campos marcados', 'error'); return;}
        if (!isValidEmail(info.correo)) {swal('','Por favor ingresa un email válido.', 'error');return;}
        DAO.execute("../_ctrl/ctrl.usuario.php", {
                exec: "update",
                data: info
            }, function (r) {
                if (r.status == 202) {
                    swal("", "Felicidades, tu perfil ha sido actualizado.", "success");
                } else {
                    swal("", "Ocurrió un error, por favor vuelvea intentarlo.", "error");
                }
            });
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
