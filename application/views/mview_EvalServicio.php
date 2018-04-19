  <div id="page-content-wrapper">
    <div class="container-fluid">
      <main role="main" class="col-md-11 col-lg-11 mx-auto pt-4 mx-auto">
        <a href="#menu-toggle" id="menu-toggle"><i class="fas fa-bars fa-2x"></i></a>
        <div id='Servicios'>
          <div class="py-4 text-center">
              <h2>Servicios</h2>
          </div>
            <table class="table table-sm table-hover table-responsive{-sm|-md}" id="tabla_Servicios">
              <thead>
                <tr>
                  <th>Tipo</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($servicios as $valor) { ?>
                <tr>
                  <td><a href="<?php echo base_url() ?>Evaluacion/Servicio/<?php echo $valor->Descripcion ?>"><?php echo $valor->Descripcion ?></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
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
