<?php foreach ($evaluacion as $valor) { ?>
  <input type="hidden" name="preg1" id="preg1" value="<?php echo $valor->Pregunta_1 ?>">
  <input type="hidden" name="preg2" id="preg2" value="<?php echo $valor->Pregunta_2 ?>">
  <input type="hidden" name="preg3" id="preg3" value="<?php echo $valor->Pregunta_3 ?>">
  <input type="hidden" name="preg4" id="preg4" value="<?php echo $valor->Pregunta_4 ?>">
<?php } ?>
  <?php foreach ($ejecutivo as $valor) { ?>
    <div class="container-fluid">
      <div class="row">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $valor->Usuario; ?></h1>
  </div>

  <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
  <table class="table table-responsive{-sm}">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Perfil</th>
        <th scope="col">Correo</th>
        <th scope="col">Estatus</th>
        <th scope="col">Fecha de alta</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row"><?php echo $valor->id_usuario; ?></th>
        <td><?php echo $valor->Usuario; ?></td>
        <td><?php echo $valor->Perfil; ?></td>
        <td><?php echo $valor->Correo; ?></td>
        <td><?php echo $valor->Estatus; ?></td>
        <td><?php echo $valor->Fecha_alta; ?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
  <p class="font-italic">Promedio de evaluación de cada pregunta de los servicios realizados por <b><?php echo $valor->Usuario; ?></b></p>
  <?php } ?>

  <table class="table table-responsive{-sm}">
    <thead>
      <tr>
        <th>#</th>
        <th>Pregunta</th>
        <th>Evaluación Promedio</th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=0;$i<count($preguntas);$i++) { ?>
      <tr>
        <th scope="row"><?php echo $preguntas[$i]->Valor ?></th>
        <td><?php echo $preguntas[$i]->Descripcion ?></td>
        <?php $columna = 'Pregunta_'.($i+1); ?>
        <td><?php echo $evaluacion[0]->$columna; ?></td>
      </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>
<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script>
  var ctx = document.getElementById("myChart");
  var preg1 = $("#preg1").val();
  var preg2 = $("#preg2").val();
  var preg3 = $("#preg3").val();
  var preg4 = $("#preg4").val();
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Pregunta 1", "Pregunta 2", "Pregunta 3", "Pregunta 4"],
      datasets: [{
        label: 'Promedio de todos los servicios ()',
        data: [preg1,preg2,preg3,preg4],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false,
      }
    }
  });
</script>
