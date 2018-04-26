<div class="container" style="margin-top:30px">
       <h3>Atención del servicio</h3>
   <hr>
   <?php
    foreach($servicio as $columna){
    ?>
    <form action="" method="POST" id="atservicio" >
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="folio">Folio del Servicio</label>
                <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio del servicio" value="<?php echo $columna->id_servicio; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="razon">Razón Social del Cliente</label>
                <input list="razon" class='form-control' name="razon" value="<?php echo $columna->Razon_social_cliente; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="elaboracion">Fecha de Elaboración</label>
                <input type="date" class="form-control" id="elaboracion" name="elaboracion" value="<?php echo $columna->Fecha_elaboracion; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="nombre_solicitante">Nombre del Solicitante</label>
                <input type="text" class="form-control" id="nombre_solicitante" name="nombre_solicitante" value="<?php echo $columna->Nombre_solicitante; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="correo_solicitante">Correo del Solicitante</label>
                <input type="email" class="form-control" id="correo_solicitante" name="correo_solicitante" placeholder="you@example.com" value="<?php echo $columna->Correo_solicitante; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="direccion_cliente">Dirección del Cliente</label>
                <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" value="<?php echo $columna->Direccion_cliente; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="ubicacion_servicio">Ubicación del Servicio</label>
                <input type="text" class="form-control" id="ubicacion_servicio" name="ubicacion_servicio" value="<?php echo $columna->Ubicacion_servicio; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="telefono_solicitante">Teléfono del Solicitante</label>
                <input type="text" class="form-control telefono" id="telefono_solicitante" name="telefono_solicitante" value="<?php echo $columna->Telefono_solicitante; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="tipo_servicio">Tipo de Servicio</label>
                <select class="form-control" id="tipo_servicio" name="tipo_servicio" disabled>
                    <?php Select2($tipo_servicio, $columna->Tipo_servicio); ?>
                </select>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="ejecutivo_asignado">Ejecutivo Asignado</label>
                <select class="form-control" id="ejecutivo_asignado" name="ejecutivo_asignado" disabled>
                    <?php SelectUsuarios($ejecutivos,$columna->Ejecutivo_asignado); ?>
                </select>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="fecha_cita_programada">Fecha Programada de Cita</label>
                <input type="date" class="form-control" id="fecha_cita_programada" name="fecha_cita_programada" value="<?php echo $columna->Fecha_cita_programada; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="fecha_cita_posterior">Fecha cita posterior</label>
                <input type="date" class="form-control" id="fecha_cita_posterior" name="fecha_cita_posterior" value="<?php echo $columna->Fecha_cita_posterior; ?>" >
            </div>
            <div class="col-md-12 col-sm-12 mb-3">
                <label for="descripcion_servicio">Descripción del Servicio</label>
                <textarea class="form-control" id="descripcion_servicio" name="descripcion_servicio" disabled><?php echo $columna->Descripcion_servicio; ?></textarea>
            </div>
            <div class="col-md-12 col-sm-12 mb-3">
                <label for="observaciones">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="observaciones" ><?php echo $columna->Observaciones; ?></textarea>
            </div>
            <div class="col-md-12 col-sm-12 mb-3">
                <label for="material_utilizado">Material Utilizado</label>
                <textarea class="form-control" id="material_utilizado" name="material_utilizado"><?php echo $columna->Material_utilizado; ?></textarea>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="fecha_hora_inicio">Fecha y Hora de Inicio</label>
                <input type="datetime" class="form-control" id="fecha_hora_inicio" name="fecha_hora_inicio" value="<?php echo $columna->Fecha_hora_inicio; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="fecha_hora_terminado">Fecha y Hora de Terminado</label>
                <input type="datetime" class="form-control" id="fecha_hora_terminado" name="fecha_hora_terminado" value="<?php echo $columna->Fecha_hora_terminado; ?>" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="estatus">Estatus del Servicio</label>
                <input type="text" name="estatus" id="estatus" value="<?php echo $columna->Estatus_servicio ?>" class="form-control" disabled>
            </div>
            <?php if ($columna->Detalle_reabierto != null): ?>
            <div class="col-md-12 col-sm-12 mb-3">
              <label for="detalle">Detalle de reabierto</label>
              <textarea name="detalle" id="detalle" class="form-control border border-warning" disabled><?php echo $columna->Detalle_reabierto ?></textarea>
            </div>
            <?php endif; ?>
            <div class="col-md-4 col-sm-6 mb-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar cambios</button>
            </div>
            <div class="col-md-4 offset-md-4 col-sm-6 mb-3">
                <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#Terminacion" id="finalizarButton">Finalizar servicio</button>
            </div>
            <div class="col-md-12 col-sm-12 alert alert-success " role="alert" id="success" >
              El servicio se actualizo correctamente.
            </div>
            <div class="col-md-12 col-sm-12 alert alert-warning" role="alert" id="warning">
              No modificaste ningún campo.
            </div>
        </div>
    </form>
</div>
<!-- Modal -->
<div class="modal fade" id="Terminacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Código de Terminación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="Terminado" method="POST" id="terminacionForm">
        <input type="hidden" class="form-control" id="fecha_cita_posterior2" name="fecha_cita_posterior2" value="">
        <input type="hidden" class="form-control" id="observaciones2" name="observaciones2" >
        <input type="hidden" class="form-control" id="material_utilizado2" name="material_utilizado2">
          <div class="modal-body">
              <input type="text" name="servicio_id" value="<?php echo $columna->id_servicio; ?>" hidden>
              <input type="text" class="form-control codigo" placeholder="Introduce el código de terminación" name="terminacion" required>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Aceptar</button>
          </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
