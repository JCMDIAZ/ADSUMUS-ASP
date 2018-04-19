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
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
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

function Display(Seccion, button) {
	$(".block").css("display", "none");
	$("a").removeClass("active");
	$("#" + Seccion + "").css("display", "block");
	$(button).addClass("active");
}
