  <div id="page-content-wrapper">
    <div class="container-fluid">
      <main role="main" class="col-md-11 col-lg-11 mx-auto pt-4 mx-auto">
        <a href="#menu-toggle" id="menu-toggle"><i class="fas fa-bars fa-2x"></i></a>
        <div id='Servicios'>
          <div class="py-4 text-center">
              <h2>Empresas</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-sm table-hover" id="tabla_Servicios">
              <thead>
                <tr>
                  <th>Nombre de la Empresa</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($empresas as $valor) { ?>
                <tr>
                  <td><a href="<?php echo base_url() ?>Evaluacion/Empresa/<?php echo $valor->Razon_social_cliente ?>"><?php echo $valor->Razon_social_cliente ?></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div><!-- Cierre table-responsive -->
        </div><!-- Cierre #servicios -->
      </main>
    </div><!-- Cierre #container-fluid -->
  </div><!-- Cierre #page-content-wrapper -->
</div><!-- Cierre #wrapper -->

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
feather.replace()
</script>
</body>
</html>
