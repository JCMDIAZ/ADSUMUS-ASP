$(document).ready(function() {
	$(".telefono").mask("99-9999-9999");
	$(".codigo").mask("9999");
	$("#atservicio").submit(function(e) {
		e.preventDefault();
		ActualizarDatos('ActualizarServicio/', this);
	})
	$("#success").hide();
	$("#warning").hide();

	$("#tabla_Servicios tr").click(function() {
		var href = $(this).find("a").attr("href");
		if (href) {
			window.location = href;
		}
	})
});

function ActualizarDatos(url, datos) {
	var id = $("#folio").val();
	$.ajax({
		url: url + id,
		type: 'post',
		data: new FormData(datos),
		processData: false,
		contentType: false
	}).done(function(data) {
		console.log(data);
		if (data == 'pendiente') {
			$("input[name=estatus]").val('Pendiente');
			$("#success").show();
			$("#warning").hide();
		} else if (data != 'error') {
			$("#success").show();
			$("#warning").hide();
		} else {
			$("#warning").show();
			$("#success").hide();
		}
	}).fail(function() {
		alert("error");
	});
}

function Validar() {
	var pass1 = document.getElementById("ContraseñaU").value;
	var pass2 = document.getElementById("ContraseñaC").value;
	var ok = true;
	if (pass1 != pass2) {
		alert("Las Contraseñas no Coiciden");
		document.getElementById("ContraseñaU").style.borderColor = "#E34234";
		document.getElementById("ContraseñaC").style.borderColor = "#E34234";
		ok = false;
	}
	return ok;
}

function Display(Seccion, button) {
	$(".block").css("display", "none");
	$("a").removeClass("active");
	$("#" + Seccion + "").css("display", "block");
	$(button).addClass("active");
}
