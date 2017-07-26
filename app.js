/* USER */
var Customer;

Customer = {
    init: function () {
        var _self = this;
        this.order = Array();
        this.me = null;
        _self.addEventListeners();
    },
    /* EVENT LISTENERS */
    addEventListeners: function () {
        var _self = this;
        $(document).on("click", "a.onFbLogin", function (e) {
            _self.fb_login(e);
        });
        $(document).on("click", "a.onLogin", function (e) {
            _self.login(e);
        });
        $(document).on("click", "a.onRegister", function (e) {
            _self.register(e);
        });
        $(document).on("click", "a.onRecover", function (e) {
            _self.recover(e);
        });
    },
    register: function () {
        var _self = this;
        var info = DAO.toObject($("#frmRegister").serializeArray());
        if (!_self.validateForm("#frmRegister")) {shakeModal();return false;};
        if (info.password != info.confirm_password) {swal("Las contraseñas no coinciden");shakeModal();return;}
        if (info.captcha == '') {$('.captcha-label').show();return;}
        if(isNaN(info.telefono) || info.telefono.length < 10){swal("El número de teléfono no es válido");shakeModal();return;}
        if (!info.fb_id) {info.fb_id == ''}

        DAO
            .execute("_ctrl/ctrl.cliente.php", {
                exec: "register",
                data: info
            }, function (r) {
                if (r.status == 202) {
                    swal("Felicidades, tu registro se ha completado correctamente.");
                    setTimeout(function(){
                      location.href = 'home.php';
                    }, 2000)
                } else if (r.status == 404) {
                    shakeModal();
                    swal("Ya hay una cuenta registrada con el correo ingresado.");
                }

            });
    },
    recover: function () {
        var _self = this;
        var correo = $('#recover_email').val();
        if (!correo) {
            shakeModal();
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
                shakeModal();
                swal("El correo ingresado no coincide con ninguna cuenta registrada.");
            }

        });
    },
    login: function () {
        var _self = this;
        var info = DAO.toObject($("#frmLogin").serializeArray());
        if (!_self.validateForm("#frmLogin")) {
            shakeModal();
            return false;
        };
        DAO.execute("_ctrl/ctrl.cliente.php", {
            exec: "login",
            data: info
        }, function (r) {
            if (r.status == 202) {
                swal("Bienvenido");
                setTimeout(function () {
                  location.href="https://eleve.mx/credito";
                    // location.reload();
                }, 1000);
            } else if (r.status == 404) {
                swal("Algo salió mal, por favor vuelve a intentarlo.");
            } else {
                swal('Usuario o contraseña incorrectos');
                shakeModal();
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
                    location.ref="eleve.mx/credito";
                    // location.reload();
                }, 1000);
            } else if (r.status == 404) {
                shakeModal();
                swal("Algo salió mal, por favor vuelve a intentarlo.");
            }
        });

    },
    validateForm: function (form) {
        var flag = true;
        $(form + " .isRequired").each(function (index) {
            if ($(this).val() == "" || $(this).val() == "NULL" || $(this).val() == null) {
                $(this).addClass("invalid");
                flag = false;
            }
        });
        return flag;
    }
};

$(window).load(function () {
    Customer.init();
    DAO.init();
    // actualizar_calculadora();
});

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
