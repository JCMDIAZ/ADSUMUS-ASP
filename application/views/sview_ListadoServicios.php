<div class="container" style="margin-top:30px">
  <h3>Busqueda</h3>
    <hr>
<form>
  <div class="row">
    <div class="form-group col-md-4 col-sm-6 mb-3">
      <label for="FolioS">Folio del Servicio:</label>
      <input type="text" class="form-control" id="FolioS" placeholder="">
    </div>

    <div class="form-group col-md-4 col-sm-6 mb-3">
      <label for="RazonLS">Razón Social:</label>
      <input type="text" class="form-control" id="RazonLS" placeholder="">
    </div>

    <div class="form-group col-md-4 col-sm-6 mb-3">
      <label for="EstatusLS">Estatus:</label>
      <?php if($this->session->userdata('perfil')=='Administrador') { ?>
      <select class="form-control" name="EstatusLS" id="EstatusLS" placeholder="Selecciona una Opción">
        <?php
          $this->Mdl_funciones->Select("Estatus_servicio",$Tipos);
         ?>
      </select>
      <?php } ?>
      <?php if($this->session->userdata('perfil')=='Ejecutivo') { ?>
      <select class="form-control" name="EstatusLS" id="EstatusLS" placeholder="Selecciona una Opción">
        <?php
          $this->Mdl_funciones->Select("Estatus_servicioE",$Tipos);
         ?>
      </select>
      <?php } ?>
    </div>

    <?php if($this->session->userdata('perfil')=='Administrador') { ?>
    <div class="form-group col-md-4 col-sm-6 mb-3">
      <label for="EjecutivoLS">Ejecutivo:</label>
      <select class="form-control" name="EjecutivoLS" id="EjecutivoLS" placeholder="Selecciona una Opción">
        <?php
          $this->Mdl_funciones->Select2("Ejecutivo",$ejecutivos);
         ?>
      </select>
    </div>
    <?php } ?>


</div>
</form>
</div>
