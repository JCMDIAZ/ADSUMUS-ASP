<div class="container" style="margin-top:30px">
  <h3>Buscador de Servicios</h3>
    <hr>
<!-- tabla de buscador servicios-->
<div class="row">
  <div class="col col-md-3" id="filter_col1" data-column="0">
    <label for="col0_filter">Folio del Servicio:</label>
    <input type="number" class="column_filter form-control" id="col0_filter">
  </div>

  <div class="col col-md-3" id="filter_col2" data-column="2">
    <label for="col2_filter">Razón Social:</label>
    <input type="text" class="column_filter form-control" id="col2_filter">
  </div>

  <div class="col col-md-3" id="filter_col4" data-column="3">
    <label for="col3_filter">Estatus:</label>
    <select  class="column_filter form-control" id="col3_filter">
      <?php
        $this->Mdl_funciones->Select("Estatus_servicio",$Tipos);
       ?>
     </select>
  </div>

<?php if($this->session->userdata('perfil')=='Administrador') { ?>
  <div class="col col-md-3" id="filter_col5" data-column="4">
    <label for="col4_filter">Ejecutivo:</label>
    <select  class="column_filter form-control" id="col4_filter">
      <?php
        $this->Mdl_funciones->Select3("Ejecutivo",$ejecutivos);
       ?>
     </select>
  </div>
<?php } ?>

</div>

  <table cellpadding="4" class="container table-responsive" style="width: 100%; margin: 0 auto 2em auto;">
		<thead>
		</thead>
					<tbody>
					</tbody>
				</table>

  <div class="container table-responsive">
    <table id="tabla_servicios" class="table table-bordered table-hover estilos" style="width:100%">
      <?php if ($this->session->userdata('perfil')=='Administrador') {?>
        <thead>
          <tr class="table-active">
              <th>Folio</th>
              <th>Fecha de Solicitud</th>
              <th>Razón Social</th>
              <th>Estatus</th>
              <th>Ejecutivo Asignado</th>
              <th>Opciones</th>
          </tr>
        </thead>
      <?php } else{?>
      <thead>
        <tr class="table-active">
            <th></th>
            <th>Folio</th>
            <th>Fecha de Solicitud</th>
            <th>Razón Social</th>
            <th>Estatus</th>
            <th>Ejecutivo Asignado</th>
            <th>Opciones</th>
        </tr>
      </thead>
    <?php } ?>
      <tbody>
<?php if ($this->session->userdata('perfil')=='Administrador') {?>
  <?php foreach ($tablas as $row): ?>
    <tr>
        <td><?= $row->id_servicio?></td>
        <td><?= $row->Fecha_elaboracion?></td>
        <td><?= $row->Razon_social_cliente?></td>
        <td><?= $row->Estatus_servicio?></td>
        <td><?= $row->Ejecutivo_asignado?></td>
        <td><a href="<?php echo base_url().'Informacion/'.$row->id_servicio?>"  id="tamañoB" class="btn btn-warning btn-sm btn-block" title="Editar el #Folio <?php echo $row->id_servicio?>">Editar</a></td>
    </tr>
  <?php endforeach; ?>
<?php }else {?>

  <?php foreach ($tablas as $row): ?>
    <tr>
        <td class="details-control" id="valor"><p class="descrip" hidden><?= $row->Descripcion_servicio ?></p></td>
        <td><?= $row->id_servicio?></td>
        <td><?= $row->Fecha_elaboracion?></td>
        <td><?= $row->Razon_social_cliente?></td>
        <td><?= $row->Estatus_servicio?></td>
        <td><?= $row->Ejecutivo_asignado?></td>
        <td><a class="btn btn-warning btn-sm btn-block" title="Atender el #Folio <?php echo $row->id_servicio?>" onclick="Atender(<?php echo $row->id_servicio?>)">Atender</a></td>
    </tr>
    <?php endforeach; ?>
<?php } ?>

      </tbody>
    </table>
  </div>
</div>
<!-- Inicio de los Script del Buscador Servicios -->
<script src="<?php echo base_url()?>jquery/jquery.js"></script>
<script src="<?php echo base_url()?>jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>jquery/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>jquery/jquery-ui.js"></script>
<script src="<?php echo base_url()?>javascript/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/jquery-mask.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/datatables/js/dataTables.bootstrap.js"></script>
<!-- Fin de los Script del Buscador Servicios -->


<!-- Inicio de Buscador de Servicios -->
<script type="text/javascript">
/* Formatting function for row details - modify as you need */
function format ( d, p) {
    // `d` is the original data object for the row
    return '<table class="table-bordered" style="width:100%">'+
        '<tr class="table-warning">'+
            '<td style="width:15%"><i><b>Descripción del Servicio:</b></i></td>'+
            '<td>'+p+'</td>'+
        '</tr>'+
    '</table>';
}

$(document).ready(function() {
    var table = $('#tabla_servicios').DataTable({
     "ordering": false,
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

    });

  $('input.global_filter').on( 'keyup click', function () {
		filterGlobal();
	});

	$('input.column_filter, select.column_filter').on( 'keyup change', function () {
		filterColumn( $(this).parents('div').attr('data-column') );
	});

  $('#tabla_servicios tbody').on('click', 'td.details-control', function (){
    var tr = $(this).closest('tr');
    var row = table.row( tr );
    var texto = $(this).find('p').text();

    if ( row.child.isShown() ) {
      // This row is already open - close it
      row.child.hide();
      tr.removeClass('shown');
    }
    else {
      // Open this row
      row.child( format(row.data(),texto) ).show();
      tr.addClass('shown');
    }
  });

});


function filterGlobal () {
	$('#tabla_servicios').DataTable().search(
		$('#global_filter').val()
	).draw();
}

function filterColumn ( i ) {
	$('#tabla_servicios').DataTable().column( i ).search(
		$('#col'+i+'_filter').val()
	).draw();
}

function Atender(id){
    $('#ocultoSeleccionado').val(id);
    $('#exampleModalCenter').modal('show');
    console.log(id);
}

//Fin de Buscador de Servicios
</script>
