<div class="container"  style="margin-top:30px">
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
        <?php $prm=array('onsubmit'=>'return Validar()') ?>
        <?php echo form_open("Ctr_Principal/add", $prm);?>

            <div class="col-12 bg-white">
                <div class="row">

                    <div class="form-group col-sm-12">
                        <label for="Nombre">Nombre:</label>
                        <input class=" form-control" type = "text"  name = "Usuario1"  id="Nombre"required>
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
        				 	  <input class="form-control" type="password" name="ContraseñaC" id="ContraseñaC" required>
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

<!--  Modal Editar Usuarios -->
<div class="modal " id="modal_form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                  &times;</button>
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
            				 	  <input class="form-control" type="password" name="Contraseña" id="ContraseñaUE" required>
                        </div>

                        <div class="form-group col-sm-12">
                          <label for="ContraseñaCE">Confirmar Contraseña:</label>
                          <input class="form-control" type="password" name="Contraseña" id="ContraseñaCE" required>
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
