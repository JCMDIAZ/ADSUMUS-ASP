<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="/img/logo.png" />
    <meta charset="utf-8">
    <title>Adsumus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo base_url()?>css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.css ">
    <link rel="stylesheet" href="<?php echo base_url()?>css/estilos.css">

    <script src="<?php echo base_url()?>js/JQuery.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.js"></script>
    <script src="<?php echo base_url()?>js/jquery-mask.js"></script>
    <script src="<?php echo base_url()?>js/popper.min.js"></script>
    <script src="<?php echo base_url()?>js/funciones.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="Inicio">
      <div class="logo">

      </div></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
         <?php $this->ci =& get_instance();
         if ($this->ci->uri->segment(1)== 'Inicio') {?>
          <li class="nav-item active">
            <a class="nav-link" href="Inicio" >Servicios</a>
          </li>
        <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="Inicio" >Servicios</a>
          </li>
        <?php }
        if($this->ci->uri->segment(1)== 'ModuloU') {
        ?>
        <li class="nav-item active">
          <a class="nav-link" href="ModuloU">Usuarios</a>
        </li>
        <?php
      }else {
        ?><li class="nav-item">
          <a class="nav-link" href="ModuloU">Usuarios</a>
        </li>
        <?php
      }
      if ($this->session->userdata('perfil')=='Administrador' and $this->ci->uri->segment(1)== 'Levantamiento_servicio') {

         ?>
          <li class="nav-item active">
            <a class="nav-link" href="Levantamiento_servicio">Levantar Servicio</a>
          </li>
        <?php }elseif($this->session->userdata('perfil')=='Administrador'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="Levantamiento_servicio">Levantar Servicio</a>
          </li>
        <?php }
        if ($this->ci->uri->segment(1)=='Atencion_servicio') { ?>
          <li class="nav-item active">
            <a class="nav-link" href="Atencion_servicio" data-toggle="modal" data-target="#exampleModalCenter">Atención del servicio</a>
          </li>
        <?php } else{  ?>
          <li class="nav-item ">
            <a class="nav-link" href="Atencion_servicio" data-toggle="modal" data-target="#exampleModalCenter">Atención del servicio</a>
          </li>
        <?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="Logout">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </nav>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Código de Activación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="Atencion_servicio" method="POST">
          <div class="modal-body">
              <input type="text" class="form-control codigo" placeholder="Introduce el código de activación" name="activacion" required>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Aceptar</button>
          </div>
      </form>
    </div>
  </div>
</div>
