<div id="page-content-wrapper">
            <div class="container-fluid">
              <div class="row">
              <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
<main role="main" class="col-md-9 col-lg-10 mx-auto pt-4">
          <div id='Servicios'>
          <div class="py-4 text-center">
            <h2>Servicios</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-sm table-hover" id="tabla_Servicios">
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
          </div>
        </main>
</div>
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
    <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
  });
    </script>
  </body>
</html>
