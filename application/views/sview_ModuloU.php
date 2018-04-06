<div class="container" >
  <h3>Módulo Usuarios</h3>
    <hr>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">Agregar Usuario</button>
        <!-- <button id="deleteList" class="btn btn-danger" style="display: none;" onclick="deleteList()">Eliminar Lista</button> -->
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" style="width:100%">
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
<script src="<?php echo base_url()?>jquery/jquery.js"></script>
<script src="<?php echo base_url()?>jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>jquery/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>jquery/jquery-ui.js"></script>
<script src="<?php echo base_url()?>javascript/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/jquery-mask.js"></script>

<script type="text/javascript">
  var save_method; //for save method string
  var table;

// Initialise a datepicker

   $(function() {
     $("#datepicker").datepicker();
   });

$(document).ready(function() {
    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "Ctr_Principal/ajax_list",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ 0 ], //first column
                "orderable": false, //set not orderable
            },
            {
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },

        ],


    });
    //set input/textarea/select event when change value, remove class error and remove text help block
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

    //check all
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
        showBottomDelete();
    });
});

function showBottomDelete()
{
  var total = 0;

  $('.data-check').each(function()
  {
     total+= $(this).prop('checked');
  });

  if (total > 0)
      $('#deleteList').show();
  else
      $('#deleteList').hide();
}

function eliminarUsuario(id)
{
    if(confirm('¿Esta Seguro de Eliminar al Usuario?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "Ctr_Principal/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reloadTable();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

function deleteList()
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    if(list_id.length > 0)
    {
        if(confirm('¿Esta Seguro de Eliminar la Lista con '+list_id.length+' Datos?'))
        {
            $.ajax({
                type: "POST",
                data: {id:list_id},
                url: "Ctr_Principal/ajax_list_delete",
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        reloadTable();
                    }
                    else
                    {
                        alert('Failed.');
                    }

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
    else
    {
        alert('no data selected');
    }
}
</script>





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
        <?php echo form_open("Ctr_Principal/add");?>

            <div class="col-12 bg-white">
                <div class="row">

                    <div class="form-group col-sm-12">
                        <label for="Nombre">Nombre:</label>
                        <input class=" form-control" type = "text"  name = "Usuario" required>
                    </div>
                    <div class="form-group col-sm-12">
                            <label for="Correo">Correo Electrónico:</label>
                            <input  class="form-control" type="email" name="Correo">
                    </div>

                    <div class="form-group col-sm-12">
                            <label for="Perfil">Perfil del Usuario:</label>
                            <select name="Perfil" class="form-control"  required>
                              <?php
                                $this->Mdl_funciones->Select("Perfil_Usuario",$Tipos);
                               ?>
                            </select>
                    </div>

                    <div class="form-group col-sm-12">
                    <label for="ContraseñaU" >Contraseña del Usuario:</label>
        				 	  <input class="form-control" type="password" name="Contraseña"  required>
                    </div>

                    <div class="form-group col-sm-12">
                    <label for="ContraseñaC">Confirmar Contraseña:</label>
        				 	  <input class="form-control" type="password" name="contraseñaC" required>
                    </div>

                    <div class="form-group col-sm-12">
                           <label for="Fecha_Alta">Fecha de Alta:</label>
                           <input class="form-control" type="date" name="Fecha_alta" min="1950-01-01" max="2100-01-01" disabled>
                    </div>

                    <div class="form-group col-sm-12">
                      <label for="Estatus">Estatus:</label>
                      <select name="Estatus" class="form-control" placeholder="Selecciona una Opción" required>
                        <?php
                          $this->Mdl_funciones->Select("Estatus_usuario",$Tipos);
                         ?>
                      </select>
                    </div>

                  </div>
                </div>
        </main>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary form-control" name="submit">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
