<br />
<main class="container ">
  <h3>Módulo Usuarios</h3>
  <hr>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">Agregar</button>
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
        <main class="container ">
        <form action="Nuevo" method="post" class="" id="agregar">

            <div class="col-12 bg-white">
                <div class="row">

                    <div class="form-group col-sm-12">
                        <label for="Nombre">Nombre:</label>
                        <input class=" form-control" type = "text"  name = "nombre" id="Nombre">
                    </div>
                    <div class="form-group col-sm-12">
                            <label for="Correo">Correo Electrónico:</label>
                            <input  class="form-control" type="email" name="correo" id="Correo">
                    </div>

                    <div class="form-group col-sm-12">
                            <label for="Perfil_Usuario">Perfil del Usuario:</label>
                            <select name="perfil_usuario" id="Perfil_Usuario" class="form-control" >
                              <?php
                                $this->Mdl_funciones->Select("Perfil_Usuario",$Tipos);
                               ?>
                            </select>
                    </div>

                    <div class="form-group col-sm-12">
                    <label for="ContraseñaU" >Contraseña del Usuario:</label>
        				 	  <input class="form-control" type="password" name="contraseñaU" id="ContraseñaU" required>
                    </div>

                    <div class="form-group col-sm-12">
                    <label for="ContraseñaC">Confirmar Contraseña:</label>
        				 	  <input class="form-control" type="password" name="contraseñaC" id="ContraseñaC">
                    </div>

                    <div class="form-group col-sm-12">
                           <label for="Fecha_Alta">Fecha de Alta:</label>
                           <input class="form-control" type="date" name="fecha_Alta" id="Fecha_Alta" min="1950-01-01" max="2100-01-01">
                    </div>

                    <div class="form-group col-sm-12">
                      <select name="estatus" id="Estatus" class="form-control" placeholder="Selecciona una Opción">
                        <?php
                          $this->Mdl_funciones->Select("Estatus_usuario",$Tipos);
                         ?>
                      </select>
                    </div>

                  </div>
                </div>
        </form>
        </main>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
