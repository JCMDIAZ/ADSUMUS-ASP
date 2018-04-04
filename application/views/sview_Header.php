<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Adsumus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url()?>/css/bootstrap.css ">
    <link rel="stylesheet" href="<?php echo base_url()?>/css/estilos.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/css/dataTables.bootstrap.css">
    <script src="<?php echo base_url()?>js/JQuery.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.js"></script>
    <script src="<?php echo base_url()?>js/jquery-mask.js"></script>
    <script src="<?php echo base_url()?>js/popper.min.js"></script>
    <script src="<?php echo base_url()?>js/funciones.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>js/dataTables.bootstrap.js"></script>
</script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Adsumus</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
         <?php ?>
          <li class="nav-item active">
            <a class="nav-link" href="Inicio">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Levantamiento_servicio">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Logout">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </nav>
