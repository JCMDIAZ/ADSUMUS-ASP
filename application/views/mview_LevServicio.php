<div class="container">
   <div class="py-4 text-center">
       <h3>Levantamiento de servicios</h3>
   </div>
    <form action="Levantamiento_servicio" method="POST">
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="folio">Folio del Servicio</label>
                <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio del servicio" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="razon">Razón Social del Cliente</label>
                <input list="razon" class='form-control' name="razon">
                <datalist id="razon">
                    <option value="Prueba"></option>
                    <option value="Prueba2"></option>
                </datalist>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="elaboracion">Fecha de Elaboración</label>
                <input type="datetime" class="form-control" id="elaboracion" name="elaboracion" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="nombre_solicitante">Nombre del Solicitante</label>
                <input type="text" class="form-control" id="nombre_solicitante" name="nombre_solicitante" required>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="correo_solicitante">Correo del Solicitante</label>
                <input type="email" class="form-control" id="correo_solicitante" name="correo_solicitante" placeholder="you@example.com" required>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="direccion_cliente">Dirección del Cliente</label>
                <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" >
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="ubicacion_servicio">Ubicación del Servicio</label>
                <input type="text" class="form-control" id="ubicacion_servicio" name="ubicacion_servicio" >
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="telefono_solicitante">Teléfono del Solicitante</label>
                <input type="text" class="form-control telefono" id="telefono_solicitante" name="telefono_solicitante" >
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="tipo_servicio">Tipo de Servicio</label>
                <select class="form-control" id="tipo_servicio" name="tipo_servicio" >
                    <?php Select($tipo_servicio); ?>
                </select>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="descripcion_servicio">Descripción del Servicio</label>
                <textarea class="form-control" id="descripcion_servicio" name="descripcion_servicio"></textarea>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="ejecutivo_asignado">Ejecutivo Asignado</label>
                <select class="form-control" id="ejecutivo_asignado" name="ejecutivo_asignado" required>
                    <?php SelectUsuarios($ejecutivos,""); ?>
                </select>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="fecha_cita_programada">Fecha Programada de Cita</label>
                <input type="date" class="form-control" id="fecha_cita_programada" name="fecha_cita_programada">
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="observaciones">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="observaciones" disabled>
                </textarea>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="material_utilizado">Material Utilizado</label>
                <textarea class="form-control" id="material_utilizado" name="material_utilizado" disabled>
                </textarea>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="fecha_cita_posterior">Fecha Cita Posterior</label>
                <input type="date" class="form-control" id="fecha_cita_posterior" name="fecha_cita_posterior" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="fecha_hora_inicio">Fecha y Hora de Inicio</label>
                <input type="datetime" class="form-control" id="fecha_hora_inicio" name="fecha_hora_inicio" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="fecha_hora_terminado">Fecha y Hora de Terminado</label>
                <input type="datetime" class="form-control" id="fecha_hora_terminado" name="fecha_hora_terminado" disabled>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <label for="estatus">Estatus del Servicio</label>
                <input type="text" id="estatus" name="estatus" value="" class="form-control" disabled>
            </div>
            <div class="col-md-6 col-sm-6 mb-3 mx-auto">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Aceptar</button>
            </div>
        </div>
    </form>
</div>
