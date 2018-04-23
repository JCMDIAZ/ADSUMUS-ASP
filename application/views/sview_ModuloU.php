<div class="container"  style="margin-top:30px">
  <h3>Módulo Usuarios</h3>
    <hr>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">Agregar Usuario</button>
        <div class="table-responsive">
          <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr class="table-active">
                    <th>Usuarios</th>
                    <th>Perfil</th>
                    <th>Estatus</th>
                    <th id="hidden">Opciones</th>
                </tr>
            </thead>
              <tbody>
              </tbody>
          </table>
        </div>
</div>

<!-- Inicio de los Script del Modulo Usuario -->
<script src="<?php echo base_url()?>jquery/jquery.js"></script>
<script src="<?php echo base_url()?>jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>jquery/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>jquery/jquery-ui.js"></script>
<script src="<?php echo base_url()?>javascript/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/jquery-mask.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/datatables/js/dataTables.bootstrap.js"></script>
<!-- Fin de los Script del Modulo Usuario -->

<!-- Modal Agregar Usuario  -->
<div class="modal fade" id="modal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Alta de Usuarios</h5>
          <button type="button" class="close" data-dismiss="modal" arial-label="Close">
          &times;
          </button>
      </div>
      <div class="modal-body">
        <?php $prm=array( 'id'=>'Registrar', 'onsubmit'=>'return Validar()') ?>
        <?php echo form_open("Ctr_Principal/add", $prm);?>

        <div class="col-12 bg-white">
          <div class="row">

            <div class="form-group col-sm-12">
              <label for="Nombre">Nombre:</label>
                <input class=" form-control" type = "text"  name = "Usuario1"  id="Nombre" required>
            </div>

            <div class="form-group col-sm-12">
              <label for="Correo">Correo Electrónico:</label>
                <input  class="form-control" type="email" name="Correo1" id="Correo" required>
            </div>

            <div class="form-group col-sm-12">
              <label for="Perfil">Perfil del Usuario:</label>
                <select name="Perfil1" class="form-control" id="Perfil"  required>
                  <?php
                    $this->Mdl_funciones->Select("Perfil_Usuario",$Tipos);
                   ?>
                </select>
            </div>

            <div class="form-group col-sm-12">
              <label for="ContraseñaU" >Contraseña del Usuario:</label>
				 	      <input class="form-control" type="password" name="Contraseña1"  id="ContraseñaU"  required>
            </div>

            <div class="form-group col-sm-12">
              <label for="ContraseñaC">Confirmar Contraseña:</label>
  				 	    <input class="form-control" type="password" name="Contraseña2" id="ContraseñaC" required>
            </div>

            <div class="form-group col-sm-12">
              <label for="Fecha_Alta">Fecha de Alta:</label>
                <input class="form-control" type="date" name="Fecha_alta" min="1950-01-01" max="2100-01-01" id="Fecha_Alta" disabled>
            </div>

            <div class="form-group col-sm-12">
              <label for="Estatus">Estatus:</label>
                <select name="Estatus1" class="form-control" placeholder="Selecciona una Opción"  id="Estatus" required>
                  <?php
                    $this->Mdl_funciones->Select("Estatus_usuario",$Tipos);
                   ?>
                </select>
            </div>

            <div class="form-group col-sm-12 alertas alert alert-danger" role="alert" hidden="true" id="MostrarAlerta">

            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">

        <button class="btn btn-primary form-control" name="submit">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>


<!--  Modal Editar Usuarios -->
<div class="modal " id="modal_form">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" arial-label="Close">
            &times;
          </button>
      </div>
        <div class="modal-body">

          <form action="#" id="form" >
            <input type="hidden" value="" name="id"/>

            <div class="col-12 bg-white">
              <div class="row">

                <div class="form-group col-sm-12">
                  <input name="id_usuario" class="form-control" type="hidden">
                </div>

                <div class="form-group col-sm-12 aviso1">
                  <label for="NombreE">Nombre:</label>
                    <input class="form-control" type="text"  name="Usuario" id="NombreE" required>
                    <div></div><!-- No Borrar Validacion del Form Editar Usuario-->
                </div>

                <div class="form-group col-sm-12 aviso2">
                  <label for="CorreoE">Correo Electrónico:</label>
                    <input  class="form-control" type="email" name="Correo" id="CorreoE" required>
                      <div></div> <!-- No Borrar Validacion del Form Editar Usuario-->
                </div>

                <div class="form-group col-sm-12 avisoS1">
                  <label for="PerfilE">Perfil del Usuario:</label>
                    <select name="Perfil" class="form-control" id="PerfilEditar" required>
                      <?php
                        $this->Mdl_funciones->Select("Perfil_Usuario",$Tipos);
                       ?>
                    </select>
                </div>

                <div class="form-group col-sm-12 aviso3">
                  <label for="ContraseñaUE" >Contraseña del Usuario:</label>
      				 	    <input class="form-control" type="password" name="Password1" id="ContraseñaUE" required>
                    <div></div> <!-- No Borrar Validacion del Form Editar Usuario-->
                </div>

                <div class="form-group col-sm-12 aviso4">
                  <label for="ContraseñaCE">Confirmar Contraseña:</label>
                    <input class="form-control" type="password" name="Password2" id="ContraseñaCE" required>
                    <div></div> <!-- No Borrar Validacion del Form Editar Usuario-->
                </div>

                <div class="form-group col-sm-12">
                  <label for="Fecha_AltaE">Fecha de Alta:</label>
                   <input class="form-control" type="text" name="Fecha_alta" min="1950-01-01" max="2100-01-01"  id="Fecha_AltaE" disabled>
                </div>

                <div class="form-group col-sm-12 avisoS2">
                  <label for="EstatusE">Estatus:</label>
                    <select name="Estatus" class="form-control" placeholder="Selecciona una Opción" id="EstatusE" required>
                      <?php
                        $this->Mdl_funciones->Select("Estatus_usuario",$Tipos);
                       ?>
                    </select>
                </div>

                <div class="form-group col-sm-12 alertas2 alert alert-danger" role="alert" hidden="true" id="MostrarAlerta2">
                  <div></div>
                </div>
              </div>
            </div>
          </form>
        </div>

      <div class="modal-footer">
          <button type="button" id="btnSave" onclick="fn_step1()" class="btn btn-primary form-control">Guardar</button>
          <button  type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- Cierre del Modal-Content -->
  </div><!-- Cierre del Modal-Dialog -->
</div><!-- Cierre del Modal -->
<!-- Fin del Modal Editar Usuario  -->

<!-- Inico de Ajax del Modulo Usuarios -->
<script type="text/javascript">
  var save_method; //Guardar el Metodo String
  var table;
//Inicio del Data Table
$(document).ready(function() {
  table = $('#table').DataTable({
    language: {
    "decimal": "",
    "emptyTable": "No hay Información",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ Entradas",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "zeroRecords": "Sin Datos Encontrados",
    "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
                }
    },
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Carga los Datos para la Table en Codigo AJAX
    "ajax": {
        "url": "Ctr_Principal/ajax_list",
        "type": "POST"
    },

    //Set column definition initialisation properties.
    "columnDefs": [
        {
            "targets": [ 1 ], //first column
            "orderable": false, //set not orderable
        },
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },

    ],
  });
});
//Fin del Data Table
function Validar() {
	var pass1 = document.getElementById("ContraseñaU").value;
	var pass2 = document.getElementById("ContraseñaC").value;
	var ok = true;
	if (pass1 != pass2) {
		document.getElementById("ContraseñaU").style.borderColor = "#E34234";
		document.getElementById("ContraseñaC").style.borderColor = "#E34234";
		ok = false;
	}
}

$('#Registrar').submit(function(e) {
e.preventDefault();
var link = $(this).attr('action');
var form = $(this).serialize();
$.ajax({
  url : link,
  type: "POST",
  dataType: "JSON",
  data: form,
  success:function(data) {
    console.log(data);
    if (data == 'Agregado Correctamente') {
      alert(data);
      window.location.reload();
    }else {
      $('#MostrarAlerta').removeAttr('hidden');
        $('.alertas').html(data);
    }
  }});
});

function editarUsuarios(id){
  save_method = 'update';
  $('#form')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string

  //Carga los Datos al Ajax
  $.ajax({
    url : "Ctr_Principal/ajax_edit/"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data){
        $('[name="id_usuario"]').val(data.id_usuario);
        $('[name="Usuario"]').val(data.Usuario);
        $('[name="Correo"]').val(data.Correo);
        $('[name="Perfil"]').val(data.Perfil);
        $('[name="Password1"]').val(data.Contraseña);
        $('[name="Password2"]').val(data.Contraseña);
        $('[name="Fecha_alta"]').val(data.Fecha_alta);
        $('[name="Estatus"]').val(data.Estatus);
        $('#modal_form').modal('show'); // Muestra el Modal
    },
    // error: function (jqXHR, textStatus, errorThrown){
    //     alert('Error al Obtener Datos de AJAX');
    // }
  });
}

//Inicio validacion para el modulo usuario
function fn_step1(){
    var r1 = frm_validation("Usuario");
    var r2 = frm_validation("Correo");
    var r3 = frm_validation("Password1");
    var r4 = frm_validation("Password2");
    var r5 = frm_validation("Perfil");
    var r6 = frm_validation("Estatus");

    var pass1 = $('[name=Password1]');
	  var pass2 = $('[name=Password2]');
    var valor1 = pass1.val();
  	var valor2 = pass2.val();
  	var vacio = "La contraseña no puede estar vacía";


     if (r1 === false || r2 === false || r3 === false || r4 === false || r5 === false || r6 === false) {
       return false;
    }else{
        if (valor1 != valor2) {
          document.getElementById("ContraseñaUE").style.borderColor = "#E34234";
      		document.getElementById("ContraseñaCE").style.borderColor = "#E34234";
          $('#MostrarAlerta2').removeAttr('hidden');
          $(".alertas2 div").text("¡Upps! Las contraseñas no coiciden.");
          return false;
        }

        if(valor1.length<6 || valor1.length>20){
          document.getElementById("ContraseñaUE").style.borderColor = "#E34234";
          document.getElementById("ContraseñaCE").style.borderColor = "#E34234";
          $('#MostrarAlerta2').removeAttr('hidden');
          $(".alertas2 div").text("¡Upps! La contraseña debe estar formada entre 6-20 carácteres.");
          return false;
      	}

        save();
        window.location.reload();
    }
}


// Validacion del formulario modulo usuario
function frm_validation(name) {
  if(name === "Usuario"){
    var nombre =  $("#NombreE").val();
    if(nombre === null || nombre.length === 0 || nombre === ""){
      $('#NombreE').addClass("is-invalid");
      $("#NombreE").removeClass("is-valid");
      $(".aviso1 div").addClass("invalid-feedback");
      $(".aviso1 div").text("Campo Requerido");
      $(".aviso1 div").show();
      return false;
   }else {
     $("#NombreE").removeClass("is-invalid");
     $("#NombreE").addClass("is-valid");
     return true;
   }
 }

 if (name === "Correo" ) {
  var correo = $("#CorreoE").val();
   if(correo === null || correo.length === 0 || correo === ""){
     $('#CorreoE').addClass("is-invalid");
     $("#CorreoE").removeClass("is-valid");
     $(".aviso2 div").addClass("invalid-feedback");
     $(".aviso2 div").text("Campo Requerido");
     $(".aviso2 div").show();
     return false;
   }else {
    $("#CorreoE").removeClass("is-invalid");
    $("#CorreoE").addClass("is-valid");
    return true;
   }
 }

 if (name === "Password1" ) {
   var contraseña = $("#ContraseñaUE").val();
   if(contraseña === null ||  contraseña === ""){
     $('#ContraseñaUE').addClass("is-invalid");
     $("#ContraseñaUE").removeClass("is-valid");
     $(".aviso3 div").addClass("invalid-feedback");
     $(".aviso3 div").text("La contraseña no puede estar vacía");
     $(".aviso3 div").show();
     return false
   }else {
     $("#ContraseñaUE").removeClass("is-invalid");
     $("#ContraseñaUE").addClass("is-valid");
    return true;
   }
 }

 if (name === "Password2" ) {
  var contraseña2 = $("#ContraseñaCE").val();
   if(contraseña2 === null || contraseña2 === ""){
     $('#ContraseñaCE').addClass("is-invalid");
     $("#ContraseñaCE").removeClass("is-valid");
     $(".aviso4 div").addClass("invalid-feedback");
     $(".aviso4 div").text("La contraseña no puede estar vacía");
     $(".aviso4 div").show();
     return false
   }else {
    $("#ContraseñaCE").removeClass("is-invalid");
    $("#ContraseñaCE").addClass("is-valid");
    return true;
   }
 }

 if (name === "Perfil" ) {
  var perfil = $("#PerfilEditar").val();
   if(perfil === null || perfil.length === 0 || perfil === ""){
     $('#PerfilEditar').addClass("is-invalid");
     $("#PerfilEditar").removeClass("is-valid");
     $(".avisoS1 div").addClass("invalid-feedback");
     $(".avisoS1 div").text("Campo Requerido");
     $(".avisoS1 div").show();
     return false
   }else {
    $("#PerfilEditar").removeClass("is-invalid");
    $("#PerfilEditar").addClass("is-valid");
    return true;
   }
 }

 if (name === "Estatus" ) {
  var estatus = $("#EstatusE").val();
   if(estatus === null || estatus.length === 0 || estatus === ""){
     $('#EstatusE').addClass("is-invalid");
     $("#EstatusE").removeClass("is-valid");
     $(".avisoS2 div").addClass("invalid-feedback");
     $(".avisoS2 div").text("Campo Requerido");
     $(".avisoS2 div").show();
     return false
   }else {
    $("#EstatusE").removeClass("is-invalid");
    $("#EstatusE").addClass("is-valid");
    return true;
    }
 }
}
//Fin de las pruebas de validacion para el modulo usuario


function reloadTable(){
  table.ajax.reload(null,false); //Recarga la Tabla de Usuarios
  $('#deleteList').hide();
};

function save(){
      $('#btnSave').text('Guardando...'); // Cambia el Texto del Boton Guardar
      $('#btnSave').attr('disabled',true); //set button disable
      var url;
      if(save_method == 'add') {
          url = "Ctr_Principal/ajax_add";
      } else {
          url = "Ctr_Principal/ajax_update";
      }
      // ajax adding data to database
      $.ajax({
          url : url,
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON",
          success: function(data)
          {
            if(data.status){ //if success close modal and reload ajax table
                $('#modal_form').modal('hide');
                reloadTable();
            }
            else{
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Guardar'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
          },
      });
}
</script>
<!-- Fin de Ajax del Modulo Usuarios -->
