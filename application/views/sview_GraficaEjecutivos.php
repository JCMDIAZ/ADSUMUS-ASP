<?php foreach ($evaluacion as $valor) { ?>
  <input type="hidden" name="preg1" id="preg1" value="<?php echo $valor->Pregunta_1 ?>">
  <input type="hidden" name="preg2" id="preg2" value="<?php echo $valor->Pregunta_2 ?>">
  <input type="hidden" name="preg3" id="preg3" value="<?php echo $valor->Pregunta_3 ?>">
<?php } ?>
  <?php foreach ($ejecutivo as $valor) {  ?>
    <div id="page-content-wrapper">
    <div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-4 col-12 mx-auto">
    <a href="#menu-toggle" id="menu-toggle"><i class="fas fa-bars fa-2x"></i></a>
    <h1 class="h2"><?php echo $valor->Usuario; ?></h1>
  </div>
  <br>
  <div class="table-responsive">
  <table class="table">
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
  </div>
  <br>
  <?php if ($serviciosEval != false) { ?>
  <p class="font-italic">Gráfica del promedio de evaluación de los servicios dados por <b><?php echo $valor->Usuario; ?></b></p>
  <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
  <br>
  <br>
  <p class="font-italic">Promedio de evaluación de cada pregunta de los servicios realizados por <b><?php echo $valor->Usuario; ?></b></p>
  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Pregunta</th>
        <th>Evaluación Promedio</th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=0;$i<count($preguntas)-1;$i++) { ?>
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
  <br>
  <br>
  <p class="font-italic">Gráfica de relación entre los servicios con sus respectivas evaluaciónes</p>
  <canvas class="my-4" id="serviciosEval" width="900" height="380"></canvas>
  <br>
  <p class="font-italic">Calificación obtenidas de cada pregunta de los servicios realizados por <b><?php echo $valor->Usuario; ?></b></p>
  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Id Servicio</th>
        <th>Pregunta 1</th>
        <th>Pregunta 2</th>
        <th>Pregunta 3</th>
        <th>Sugerencias</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Decodificamos el json para poder manejarlo como objetos
      $serviciosEvalDecode = json_decode($serviciosEval);
      for($i=0;$i<count($serviciosEvalDecode);$i++) { ?>
      <tr>
        <th scope="row"><?php echo $serviciosEvalDecode[$i]->f_id_servicio ?></th>
        <td><?php echo $serviciosEvalDecode[$i]->Pregunta_1 ?></td>
        <td><?php echo $serviciosEvalDecode[$i]->Pregunta_2 ?></td>
        <td><?php echo $serviciosEvalDecode[$i]->Pregunta_3 ?></td>
        <td><?php echo $serviciosEvalDecode[$i]->Sugerencias ?></td>
      </tr>
    <?php } /*Termina ciclo for de serviciosEvalDecode*/
  }else{?>
    <h4>El ingeniero aún no cuenta con servicios evaluados</h4>
<?php }//Termina ciclo if/else de serviciosEval
    }/*Termina foreach del Ingeniero*/ ?>
    </tbody>
  </table>
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
  var servicios = <?php echo $serviciosEval ?>;
  console.log(servicios);
  var ctx = document.getElementById("myChart");
  var ctx2 = document.getElementById("serviciosEval");
  var preg1 = $("#preg1").val();
  var preg2 = $("#preg2").val();
  var preg3 = $("#preg3").val();
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Pregunta 1", "Pregunta 2", "Pregunta 3"],
      datasets: [{
        label: 'Promedio de todos los servicios ()',
        data: [preg1,preg2,preg3],
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
  // Creamos array que almacena los datos de cada linea de la grafica
  var datosServicios = [];
  var valores = [];
  var labels = [];
  for (var i = 0; i < 3; i++) {
      valores = [];
      switch (i) {
        case 0:
          for (var j = 0; j < servicios.length; j++) {
            valores.push(servicios[j].Pregunta_1);
            labels.push("Servicio "+servicios[j].f_id_servicio);
          }
          var color = "#00A388";
          var pregunta = 'Pregunta 1';
          break;
        case 1:
          for (var j = 0; j < servicios.length; j++) {
            valores.push(servicios[j].Pregunta_2);
          }
          var color = "#71CC91";
          var pregunta = 'Pregunta 2';
          break;
        case 2:
          for (var j = 0; j < servicios.length; j++) {
            valores.push(servicios[j].Pregunta_3);
          }
          var color = "#C6EB98";
          var pregunta = 'Pregunta 3';
          break;
        default:
      }
    datosServicios.push({
      label: pregunta,
      data: valores,
      lineTension: 0,
      backgroundColor: 'transparent',
      borderColor: color,
      borderWidth: 4,
      pointBackgroundColor: color
    });
  }
  console.log(datosServicios);
  console.log(labels);
  //
  var myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
      labels: labels,
      datasets: datosServicios
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
        display: true,
      }
    }
  });
</script>
