<br />
<main class="container ">
  <h3>Módulo Usuarios</h3>
  <hr>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">Agregar</button>
  <button type="button" class="btn btn-warning" >Editar</button>
</main>



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
