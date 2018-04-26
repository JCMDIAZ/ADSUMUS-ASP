<div id="page-content-wrapper">
<div class="container-fluid">
<main role="main" class="col-md-11 col-lg-11 pt-4 mx-auto">
  <a href="#menu-toggle" id="menu-toggle"><i class="fas fa-bars fa-2x"></i></a>
<div id='Ejecutivos'>
  <div class="py-4 text-center">
    <h2>Ingenieros</h2>
  </div>
<div class="table-responsive">
  <table class="table table-sm table-hover" id="tabla_Servicios">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($ejecutivos as $valor) { ?>
      <tr>
        <td><a href="<?php echo base_url() ?>Evaluacion/Ejecutivo/<?php echo $valor->id_usuario ?>"><?php echo $valor->id_usuario ?></a></td>
        <td><?php echo $valor->Usuario ?></td>
        <td><?php echo $valor->Estatus ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
</div>
</main>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
feather.replace()
</script>
</body>
</html>
