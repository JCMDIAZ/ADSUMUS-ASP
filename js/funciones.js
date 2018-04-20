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
	var offset = 400;
	var duration = 400;
	$(window).scroll(function() {
		if ($(this).scrollTop() > offset) {
			$(".back-to-top").fadeIn(duration);
		} else {
			$(".back-to-top").fadeOut(duration);
		}
	});
	$('.back-to-top').click(function() {
		$('html,body').animate({
			scrollTop: 0
		}, 1000);
		return false;
	});
	/* Asignamos los valores a los input hidden del buton finalizar servicio */
	$("#finalizarButton").click(function() {
		$("#fecha_cita_posterior2").val(function() {
			return $("#fecha_cita_posterior").val();
		});
		$("#observaciones2").val(function() {
			return $("#observaciones").val();
		});
		$("#material_utilizado2").val(function() {
			return $("#material_utilizado").val();
		});
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
