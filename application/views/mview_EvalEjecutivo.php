<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<div id='Ejecutivos'>
  <div class="py-4 text-center">
    <h2>Ejecutivos</h2>
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
