<?php foreach ($evaluacion as $valor) { ?>
  <input type="hidden" name="preg1" id="preg1" value="<?php echo $valor->Pregunta_1 ?>">
  <input type="hidden" name="preg2" id="preg2" value="<?php echo $valor->Pregunta_2 ?>">
  <input type="hidden" name="preg3" id="preg3" value="<?php echo $valor->Pregunta_3 ?>">
  <input type="hidden" name="preg4" id="preg4" value="<?php echo $valor->Pregunta_4 ?>">
<?php } ?>
<div id="page-content-wrapper">
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 mt-3 col-12">
    <a href="#menu-toggle" class="pt-3" id="menu-toggle"><i class="fas fa-bars fa-2x"></i></a>
    <h1 class="h2"><?php echo $tipo ?></h1>
  </div>

  <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

  </div>
  </div>
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
