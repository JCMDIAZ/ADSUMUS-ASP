<div class="container" style="margin-top:30px">
  <h3>Busqueda</h3>
    <hr>
<form>
  <div class="row">
    <div class="form-group col-md-3 col-sm-6 mb-3">
      <label for="FolioS">Folio del Servicio:</label>
      <input type="text" class="form-control" id="FolioS" placeholder="">
    </div>

    <div class="form-group col-md-3 col-sm-6 mb-3">
      <label for="RazonLS">Razón Social:</label>
      <input type="text" class="form-control" id="RazonLS" placeholder="">
    </div>

    <div class="form-group col-md-3 col-sm-6 mb-3">
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
    <div class="form-group col-md-3 col-sm-6 mb-3">
      <label for="EjecutivoLS">Ejecutivo:</label>
      <select class="form-control" name="EjecutivoLS" id="EjecutivoLS" placeholder="Selecciona una Opción">
        <?php
          $this->Mdl_funciones->Select2("Ejecutivo",$ejecutivos);
         ?>
      </select>
    </div>
    <?php } ?>
    <?php if($this->session->userdata('perfil')=='Administrador') { ?>
    <div class="form-group col-md-6 col-sm-6 mb-3">
    <button type="button" class="btn btn-success" id="tamañoA">Buscar</button>
    </div>
    <div class="form-group col-md-6 col-sm-6 mb-3">
    <button type="button" class="btn btn-warning" id="tamañoB">Editar</button>
    </div>
    <?php } ?>
    <?php if($this->session->userdata('perfil')=='Ejecutivo') { ?>
    <div class="form-group col-md-12 col-sm-6 mb-3">
    <button type="button" class="btn btn-success" id="tamañoA">Buscar</button>
    </div>
    <div class="form-group col-md-12 col-sm-6 mb-3">
    <button type="button" class="btn btn-warning" id="tamañoB">Editar</button>
  </div>
    <div class="form-group col-md-12 col-sm-6 mb-3">
    <button type="button" class="btn btn-primary" id="tamañoB">Atender</button>
    </div>
    <?php } ?>

</form>


<table id="table2" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-active">
            <th></th>
            <th>Folio</th>
            <th>Fecha de Solicitud</th>
            <th>Razón Social</th>
            <th>Ejecutivo Asignado</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody>
      <?php foreach ($mostrar as $row): ?>
    <tr>
      <td><input type="radio" id="check" name="check" value="<?php echo $row->id_servicio  ?>"></td>
      <td><?php echo $row->id_servicio ?></td>
      <td><?php echo $row->Fecha_elaboracion ?></td>
      <td><?php echo $row->Razon_social_cliente ?></td>
      <td><?php echo $row->Ejecutivo_asignado ?></td>
      <td><?php echo $row->Estatus_servicio ?></td>
    </tr>
      <?php endforeach; ?>
    </tbody>
    </tbody>
</table>

</div>
</div>
