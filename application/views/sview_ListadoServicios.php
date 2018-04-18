<div class="container" style="margin-top:30px">
  <h3>Buscador de Servicios</h3>
    <hr>
      <form>
        <div class="row" style="justify-content:center;">

          <div class="form-group col-md-3 col-sm-6 mb-3">
            <label for="FolioS">Folio del Servicio:</label>
            <input type="number" min="0" class="form-control" id="FolioS" onkeyup="search()" >
          </div>

          <div class="form-group col-md-3 col-sm-6 mb-3">
            <label for="RazonLS">Razón Social:</label>
            <input type="text" class="form-control" id="RazonLS" onkeyup="search()" >
          </div>

          <div class="form-group col-md-3 col-sm-6 mb-3">
            <label for="EstatusLS">Estatus:</label>
            <?php if($this->session->userdata('perfil')=='Administrador') { ?>
            <select class="form-control" name="EstatusLS" id="EstatusLS" onchange="search()">
              <?php
                $this->Mdl_funciones->Select("Estatus_servicio",$Tipos);
               ?>
            </select>
            <?php } ?>
            <?php if($this->session->userdata('perfil')=='Ejecutivo') { ?>
            <select class="form-control" name="EstatusLS" id="EstatusLS" onchange="search()">
              <?php
                $this->Mdl_funciones->Select("Estatus_servicioE",$Tipos);
               ?>
            </select>
            <?php } ?>
          </div>

          <?php if($this->session->userdata('perfil')=='Administrador') { ?>
          <div class="form-group col-md-3 col-sm-6 mb-3">
            <label for="EjecutivoLS">Ejecutivo:</label>
            <select class="form-control" name="EjecutivoLS" id="EjecutivoLS" onchange="search()">
              <?php
                $this->Mdl_funciones->Select2("Ejecutivo",$ejecutivos);
               ?>
            </select>
          </div>
          <?php } ?>

          <?php if($this->session->userdata('perfil')=='Administrador') { ?>
            <div class="col-md-4 col-sm-4 mb-3 mx-auto">
              <button type="button" class="btn btn-warning btn-sm btn-block" id="tamañoB">Editar</button>
            </div>
          <?php } ?>

          <?php if($this->session->userdata('perfil')=='Ejecutivo') { ?>
            <div class="col-md-4 col-sm-4 mb-3 mx-auto">
              <a class="nav-link" href="<?php echo base_url()?>Atencion_servicio" data-toggle="modal" data-target="#exampleModalCenter">
                <button type="button" class="btn btn-warning btn-sm btn-block" id="tamañoA">Atender</button>
              </a>
          <?php } ?>
          </form>
  </div>
</div>

<!-- BUSCADOR -->
<div id="resultados">
</div>

<script>
//Inicio de Buscador de Servicios
$(document).ready(function(){
  search();
  $('#tamañoB').on('click',function() {
    if (valor = $('input[name="check"]:checked').val()) {
      window.location = "Informacion/"+valor;
    }else {
      alert('Ningún Servicio Seleccionado');
    }
  })
});

function search() {
  var search = $('#FolioS').val();
  var razon = $('#RazonLS').val();
  var estatus = $('#EstatusLS').val();
  var ejecutivo = $('#EjecutivoLS').val();

  $.ajax({
    url:"<?php echo base_url(); ?>Ctr_Principal/fetch",
    method:"POST",
    data:{search:search,razon:razon,estatus:estatus,ejecutivo:ejecutivo},
    success:function(data){
      $('#resultados').html(data);
    }
  });
}
//Fin de Buscador de Servicios
</script>
<script src="<?php echo base_url()?>jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>js/jquery-mask.js"></script>
