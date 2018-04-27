<?php header("Content-Type: text/html;charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="<?php echo base_url() ?>/img/logo.png" />
    <meta charset="utf-8">
    <title>Adsumus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo base_url()?>css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.css ">
    <link rel="stylesheet" href="<?php echo base_url()?>css/estilos.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/estilosSideBar.css">
    <link href="<?php echo base_url()?>css/fontawesome-all.css" rel="stylesheet">

    <script src="<?php echo base_url()?>js/JQuery.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.js"></script>
    <script src="<?php echo base_url()?>js/jquery-mask.js"></script>
    <script src="<?php echo base_url()?>js/popper.min.js"></script>
    <script src="<?php echo base_url()?>js/funciones.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <style >
      body{
        min-height: 75rem;
        padding-top: 4.5rem;
      }
    </style>
  </head>
  <body>
    <!-- Scroll hasta arriba -->
    <a href="#" class="back-to-top"><i class="fas fa-chevron-circle-up"></i></a>
    <!-- Empieza nav principal  -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="<?php echo base_url() ?>Inicio"> <div class="logo"> </div></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
         <?php $this->ci =& get_instance();
         if ($this->ci->uri->segment(1)== 'Inicio') {?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>Inicio" >Servicios</a>
          </li>
        <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Inicio" >Servicios</a>
          </li>
        <?php }
        if($this->ci->uri->segment(1)== 'ModuloU') { ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url() ?>ModuloU">Usuarios</a>
        </li>
        <?php }else {?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>ModuloU">Usuarios</a>
        </li>
        <?php } if ($this->session->userdata('perfil')=='Administrador' and $this->ci->uri->segment(1)== 'Levantamiento_servicio') { ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>Levantamiento_servicio">Levantar Servicio</a>
          </li>
        <?php }elseif($this->session->userdata('perfil')=='Administrador'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Levantamiento_servicio">Levantar Servicio</a>
          </li>
        <?php } ?>
        <?php if ($this->ci->uri->segment(1)=='Evaluacion' and $this->session->userdata('perfil')=='Administrador') { ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>Evaluacion/Servicio" >Estadísticas</a>
          </li>
        <?php } elseif($this->session->userdata('perfil')=='Administrador'){  ?>
          <li class="nav-item ">
            <a class="nav-link" href="Evaluacion/Servicio">Estadísticas</a>
          </li>
        <?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Logout">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </nav><!-- Termina nav principal  -->
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
      <!-- Empieza sideBar de estadisticas  -->
      <div id="wrapper" class="">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        Estadísticas
                    </h6>
                </li>
                <?php $this->ci =& get_instance();
                if ($this->ci->uri->segment(2)=='Servicio') {?>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url() ?>Evaluacion/Servicio" ><span data-feather="activity"></span>  Por servicio</a>
                </li>
              <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>Evaluacion/Servicio" ><span data-feather="activity"></span>  Por servicio</a>
                </li>
              <?php }
              if ($this->ci->uri->segment(2)=='Ejecutivo') {
              ?>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url() ?>Evaluacion/Ejecutivo"><span data-feather="user"
                    ></span>  Por Ingeniero</a>
                </li>
              <?php }else{  ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>Evaluacion/Ejecutivo"><span data-feather="user"
                    ></span>  Por Ingeniero</a>
                </li>
              <?php }
              if ($this->ci->uri->segment(2)=='Empresa') {
              ?>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url() ?>Evaluacion/Empresa"><span data-feather="briefcase"></span>  Por empresa</a>
                </li>
              <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>Evaluacion/Empresa"><span data-feather="briefcase"></span>  Por empresa</a>
                </li>
              <?php } ?>
            </ul>
        </div>
        <!-- Termina sideBar de estadisticas  -->
