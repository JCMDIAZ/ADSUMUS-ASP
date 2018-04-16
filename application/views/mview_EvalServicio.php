        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div id='Servicios'>
          <div class="py-4 text-center">
            <h2>Servicios</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm" id="tabla_Servicios">
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
