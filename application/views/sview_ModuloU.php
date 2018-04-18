<div class="container"  style="margin-top:30px">
  <h3>Módulo Usuarios</h3>
    <hr>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">Agregar Usuario</button>
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
<!-- Script del Modulo Usuario -->
<script src="<?php echo base_url()?>jquery/jquery.js"></script>
<script src="<?php echo base_url()?>jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>jquery/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>jquery/jquery-ui.js"></script>
<script src="<?php echo base_url()?>javascript/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/jquery-mask.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/datatables/js/dataTables.bootstrap.js"></script>
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
                <input  class="form-control" type="email" name="Correo1" id="Correo">
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

            <div class="form-group col-sm-12 alertas">

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

          <form action="#" id="form">
            <input type="hidden" value="" name="id"/>

            <div class="col-12 bg-white">
              <div class="row">

                <div class="form-group col-sm-12">
                  <input name="id_usuario" class="form-control" type="hidden">
                </div>

                <div class="form-group col-sm-12">
                  <label for="NombreE">Nombre:</label>
                    <input class=" form-control" type = "text"  name = "Usuario" id="NombreE" required>
                </div>

                <div class="form-group col-sm-12">
                  <label for="CorreoE">Correo Electrónico:</label>
                    <input  class="form-control" type="email" name="Correo" id="CorreoE">
                </div>

                <div class="form-group col-sm-12">
                  <label for="PerfilE">Perfil del Usuario:</label>
                    <select name="Perfil" class="form-control" id="PerfilE"  required>
                      <?php
                        $this->Mdl_funciones->Select("Perfil_Usuario",$Tipos);
                       ?>
                    </select>
                </div>

                <div class="form-group col-sm-12">
                  <label for="ContraseñaUE" >Contraseña del Usuario:</label>
      				 	    <input class="form-control" type="password" name="Contraseña" id="ContraseñaU2" required>
                </div>

                <div class="form-group col-sm-12">
                  <label for="ContraseñaCE">Confirmar Contraseña:</label>
                    <input class="form-control" type="password" name="Contraseña" id="ContraseñaE2" required>
                </div>

                <div class="form-group col-sm-12">
                  <label for="Fecha_AltaE">Fecha de Alta:</label>
                   <input class="form-control" type="text" name="Fecha_alta" min="1950-01-01" max="2100-01-01"  id="Fecha_AltaE" disabled>
                </div>

                <div class="form-group col-sm-12">
                  <label for="EstatusE">Estatus:</label>
                    <select name="Estatus" class="form-control" placeholder="Selecciona una Opción" id="EstatusE" required>
                      <?php
                        $this->Mdl_funciones->Select("Estatus_usuario",$Tipos);
                       ?>
                    </select>
                </div>
              </div>
            </div>
          </form>
        </div>
      <div class="modal-footer">
          <button type="button" id="btnSave" onclick="save()" class="btn btn-primary form-control">Guardar</button>
          <button  type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- Cierre del Modal-Content -->
  </div><!-- Cierre del Modal-Dialog -->
</div><!-- Cierre del Modal -->


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
//Fin del Data Table
$("input").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
});
$("textarea").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
});
$("select").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
});
});

function Validar() {
	var pass1 = document.getElementById("ContraseñaU").value;
	var pass2 = document.getElementById("ContraseñaC").value;
	var ok = true;
	if (pass1 != pass2) {
		alert("Las Contraseñas no Coiciden");
		document.getElementById("ContraseñaU").style.borderColor = "#E34234";
		document.getElementById("ContraseñaC").style.borderColor = "#E34234";
		ok = false;
	}else {

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
        $('[name="Contraseña"]').val(data.Contraseña);
        $('[name="Contraseña"]').val(data.Contraseña);
        $('[name="Fecha_alta"]').val(data.Fecha_alta);
        $('[name="Estatus"]').val(data.Estatus);
        $('#modal_form').modal('show'); // Muestra el Modal
    },
    error: function (jqXHR, textStatus, errorThrown){
        alert('Error al Obtener Datos de AJAX');
    }
  });
}

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
          error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
            $('#btnSave').text('Guardar'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
          }
      });
}
</script>
<!-- Fin de Ajax del Modulo Usuarios -->
