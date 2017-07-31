var User, Dao, Crud, Files;

/* GLOBAL CRUD */
Crud = {
	init: function () {
		var _self = this;
		_self.addEventListeners();
	},
	addEventListeners: function () {
		var _self = this;
		$(document).on("click", "button.onQuinta", function (e) { _self.quinta(e); });
		$(document).on("click", "button.onCambio", function (e) { _self.cambio(e); });
		$(document).on("click", "button.onSave", function (e) { _self.save(e); });
		$(document).on("click", "a.onDelete", function (e) { _self.delete(e); });
		$(document).on("click", "a.onDeleteImagen", function (e) { _self.delete_imagen(e); });
		$(document).on("click", "button.onClickApprove", function (e) { _self.approve(e); });
		$(document).on("click", "button.onBuscarDueno", function (e) { _self.get_dueno(e); });
		$(document).on("click", "a.onDestacado", function (e) { _self.destacado(e); });
		$('.isRequired').on('keyup', (function () {$(this).parent().removeClass('has-danger');}));
		$('.isNumber').keyup(function () { this.value = this.value.replace(/[^0-9\.]/g, ''); });
	},
	cambio: function (e) {
		var id = $(e.target).data("id");
		var action = $(e.target).data("action");
		if(!confirm('¿Desea '+action+' este cambio?')) return;
		Dao.execute('quinta',
			{exec: action+"_cambio",data: id},
			function (r) {
				if (r.status == 202) {
					alert("El cambio se "+action+" correctamente.");
					location.reload();
				}else{
					alert("Algo sucedio mal, por favor vuelva a intentarlo.");
				}
			});
	},
	quinta: function (e) {
		var action = $(e.target).data("action");
		var id = $(e.target).data("id");
		if(!confirm('¿Desea '+action+' esta Quinta?')) return;
		Dao.execute('quinta',
			{exec: action,data: id},
			function (r) {
				if (r.status == 202) {
					alert("La Quinta se "+action+" correctamente.");
					location.reload();
				}else{
					alert("Algo sucedio mal, por favor vuelva a intentarlo.");
				}
			});
	},
	save: function (e) {
		_self = this;
		var formData = Dao.toObject($($(e.target).data("form")).serializeArray());
		var action = $(e.target).data("action");
		var src = $(e.target).data("src");
		if (!_self.validate($(e.target).data("form"))) { alert('Por favor llena los campos marcados');return false; };
		Dao.execute(src,
			{
				exec: action,
				data: formData
			},
			function (r) {
				if (r.status == 202) {
					alert("El registro se ha guardado correctamente.");
					r.redirect ? location.href = r.redirect : location.reload();
					// location.reload();
				} else if (r.status == 409) {
					alert("Ya existe un "+src+" con el nombre ingresado.");
				}else{
					alert("Algo sucedio mal, por favor vuelva a intentarlo.");
				}
			});
	},
	delete: function (e) {
		_self = this;
		var el;
		if (!confirm("Por favor confirme la eliminación del registro")) { return; }
		if (e.target.tagName.toLowerCase() == "i") { el = $(e.target).parent(); } else { el = $(e.target); }
		var id = el.data("id");
		var src = el.data("src");
		var data = { id: id };
		if(src == 'horario') data.quinta = el.data("quinta");
		Dao.execute(src,
			{
				exec: "delete",
				data: data
			},
			function (r) {
				if (r.status == 202) {
					alert("Registro eliminado correctamente");
					location.reload();
				} else if (r.status == 500) {
					alert("Algo sucedio mal, por favor vuelva a intentarlo.");
				}
			});
	},
	delete_imagen: function (e) {
		_self = this;
		var el;
		if (!confirm("Por favor confirme la eliminación de la imagen")) { return; }
		if (e.target.tagName.toLowerCase() == "i") { el = $(e.target).parent(); } else { el = $(e.target); }
		var imagen = el.data("imagen");
		var path = el.data("path");
		var id = el.data("id");
		Dao.execute('files',
			{
				exec: "delete_imagen",
				data: { 'path': path, 'imagen': imagen, 'id': id }
			},
			function (r) {
				if (r.status == 202) {
					alert("Imagen eliminada correctamente");
					location.reload();
				} else if (r.status == 500) {
					alert("Algo sucedio mal, por favor vuelva a intentarlo.");
				}
			});
	},
	get_dueno: function (e) {
		var correo = $('#dueno').val();
		!correo ? alert('Debes ingresar un correo') : true;
		Dao.execute('quinta',
			{
				exec: "get_dueno",
				data: { 'correo': correo }
			},
			function (r) {
				if (r.status == 202) {
					$('#dueno').val(correo);
					$('#id_usuario').val(r.id);
					alert('El usuario encontado con el correo ' + correo +' es '+r.dueno);
				} else if (r.status == 404) {
					alert("No se encontró ningun usuario con el correo ingresado.");
				}
			});
	},
	destacado: function (e) {
		_self = this;
		var el;
		if (e.target.tagName.toLowerCase() == "i") { el = $(e.target).parent(); } else { el = $(e.target); }
		var id = el.data("id");
		var destacado = el.data("destacado");
		var src = el.data("src");
		console.log(destacado);
		if(destacado == 1) {if (!confirm("¿Desea eliminar de destacados este "+src+"?")) { return; }} else{if (!confirm("¿Desea agregar a destacados este "+src+"?")) { return; }}
		Dao.execute(src,
			{
				exec: "destacado",
				data: { "id": id, "destacado": destacado }
			},
			function (r) {
				if (r.status == 202) {
					if(destacado == 1){$('.onDestacado .'+id).removeClass('destacado').addClass('ndestacado'); $('.onDestacado.'+id).data('destacado', 0);}
					else {$('.onDestacado .'+id).removeClass('ndestacado').addClass('destacado');  $('.onDestacado.'+id).data('destacado', 1);}
				} else if (r.status == 500) {
					alert("Algo sucedio mal, por favor vuelva a intentarlo.");
				}
			});
	},
	approve: function (e) {
		_self = this;
		var el;
		var dia = $('#dia').val();
		if (e.target.tagName.toLowerCase() == "i") { el = $(e.target).parent(); } else { el = $(e.target); }
		var frecuencia = el.data("frecuencia");
		if(!dia && frecuencia =='semana'){alert("Selecciona un dia"); return;}
		if (!confirm("¿Desea aprobar este credito?")) { return; }
		var uid = el.data("uid");
		var id = el.data("id");
		var src = el.data("src");
		var inicio_pago = $('#inicio_pago').val();
		var empleo = Dao.toObject($('#frmEmpleo').serializeArray());
		var personal = Dao.toObject($('#frmPersonal').serializeArray());
		var banco = Dao.toObject($('#frmReferencia').serializeArray());
		Dao.execute(src,
			{
				exec: "approve",
				data: { uid: uid, id: id, dia: dia, inicio_pago:inicio_pago, empleo: empleo, personal: personal, banco: banco }
			},
			function (r) {
				if (r.status == 202) {
					alert("Crédito aprobado.");
					location.reload();
				} else if (r.status == 500) {
					alert("Algo sucedio mal, por favor vuelva a intentarlo.");
				}
			});
	},
	cancel: function (e) {
		_self = this;
		var el;
		if (!confirm("¿Desea cancelar este credito?")) { return; }
		if (e.target.tagName.toLowerCase() == "i") { el = $(e.target).parent(); } else { el = $(e.target); }
		var id = el.data("id");
		var src = el.data("src");
		Dao.execute(src,
			{
				exec: "cancel",
				data: { id: id }
			},
			function (r) {
				if (r.status == 202) {
					alert("Crédito cancelado.");
					location.reload();
				} else if (r.status == 500) {
					alert("Algo sucedio mal, por favor vuelva a intentarlo.");
				}
			});
	},
	view: function (e) {
		_self = this;
		var el;
		if (e.target.tagName.toLowerCase() == "i") { el = $(e.target).parent(); } else { el = $(e.target); }
		var id = el.data("id");
		var src = el.data("src");
		Dao.execute(src,
			{
				exec: "view",
				data: { id: id }
			},
			function (r) {
				if (r.status == 202) {
					alert("Row deleted successfully.");
					location.reload();
				} else if (r.status == 500) {
					alert("Something went wrong, please try agan.");
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
}

/* DATA ACCESS OBJECT*/
Dao = {
	init: function () {
		var _self = this;
	},
	toObject: function (form) {
		var data = {};
		$.each(form, function (key, element) {
			if (element.name.indexOf("[]") >= 0) {
				var aux = data[element.name];
				if (aux == null) { aux = ""; }
				data[element.name] = aux + element.value + "|";
			} else {
				data[element.name] = element.value;
			}
		});
		return data;
	},
	execute: function (ctrl, data, callback) {
		$.ajax({
			type: "POST",
			url: '_ctrl/ctrl.' + ctrl + '.php',
			data: data,
			dataType: "json",
			success: function (r) { callback(r); },
			error: function (r) { console.log(r); }
		});
	}
}

$(window).load(function () {
	Crud.init();
});


/* UTILITIES */
function isValidEmail(email) {
	var re = /\S+@\S+\.\S+/;
	return re.test(email);
}

function _GET() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
		vars[key] = value;
	});
	return vars;
}
