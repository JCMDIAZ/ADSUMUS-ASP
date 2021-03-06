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
    <!-- CSS-Estilos Generales -->
    <link rel="stylesheet" href="<?php echo base_url()?>css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.css ">
    <link rel="stylesheet" href="<?php echo base_url()?>css/estilos.css">
    <link href="<?php echo base_url()?>css/fontawesome-all.css" rel="stylesheet">
    <!-- JS-Script Generales -->
    <script src="<?php echo base_url()?>js/JQuery.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.js"></script>
    <script src="<?php echo base_url()?>js/jquery-mask.js"></script>
    <script src="<?php echo base_url()?>js/popper.min.js"></script>
    <script src="<?php echo base_url()?>js/funciones.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
    </script>
  </head>

  <body>
    <!-- Scroll hasta arriba -->
    <a href="#" class="back-to-top"><i class="fas fa-chevron-circle-up"></i></a>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="<?php echo base_url()?>Inicio">
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
            <a class="nav-link" href="<?php echo base_url()?>Inicio" >Servicios</a>
          </li>
        <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>Inicio" >Servicios</a>
          </li>
        <?php }
        if($this->ci->uri->segment(1)== 'ModuloU' AND $this->session->userdata('perfil')=='Administrador') {
        ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url()?>ModuloU">Usuarios</a>
        </li>
        <?php
      }elseif($this->session->userdata('perfil')=='Administrador') {
        ?><li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>ModuloU">Usuarios</a>
        </li>
        <?php
      }
      if ($this->session->userdata('perfil')=='Administrador' and $this->ci->uri->segment(1)== 'Levantamiento_servicio') {

         ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url()?>Levantamiento_servicio">Levantar Servicio</a>
          </li>
        <?php }elseif($this->session->userdata('perfil')=='Administrador'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>Levantamiento_servicio">Levantar Servicio</a>
          </li>
        <?php } ?>
        <?php if ($this->ci->uri->segment(1)=='Evaluacion' and $this->session->userdata('perfil')=='Administrador') { ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>Evaluacion/Servicio" >Estadísticas</a>
          </li>
        <?php } elseif($this->session->userdata('perfil')=='Administrador'){  ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url() ?>Evaluacion/Servicio">Estadísticas</a>
          </li>
        <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>Logout">Cerrar Sesión</a>
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
        <input id="ocultoSeleccionado" type="hidden" name="idSeleccionado" value="">
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
