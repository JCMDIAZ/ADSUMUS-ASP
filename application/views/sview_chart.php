    <!--<form action="" method="post">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <label for="id">Id de la evaluacion</label>
            <input type="text" name="id" id='id' class="form-control">
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </div>
        </div>
      </div>
    </form>
    <?php
    $evaluacion = $this->Mdl_Consultas->DatosRow('t_dat_evaluacion','f_id_servicio','1');
    echo json_encode($evaluacion);
     ?>
    <div class="chart-container">
    <canvas id="myChart" width="200" height="200"></canvas>
  </div>
  <p id="demo"></p>
<script>
  var data = JSON.parse('<?php echo json_encode($evaluacion);?>');
  console.log(data[0].id_evaluacion);
    var options = {
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          stacked: true,
          gridLines: {
            display: true,
            color: "rgba(255,99,132,0.2)"
          }
        }],
        xAxes: [{
          gridLines: {
            display: false
          }
        }]
      }
    };
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["Pregunta 1", 'Pregunta 2',"Pregunta 3","Pregunta 4"],
            datasets: [{
                label: "Servicio 14",
                backgroundColor: 'rgb(0, 140, 255)',
                borderColor: 'rgb(0, 0, 0)',
                data: [data[0].Pregunta_1, data[0].Pregunta_2, data[0].Pregunta_3, data[0].Pregunta_4],
            }]
        },

        // Configuration options go here
        options: options
    });

  </script>-->
  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <link rel="icon" href="/img/logo.png" />
      <meta charset="utf-8">
      <title>Adsumus</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="stylesheet" href="<?php echo base_url()?>css/dataTables.bootstrap.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.css ">
      <link rel="stylesheet" href="<?php echo base_url()?>css/estilos.css">

      <script src="<?php echo base_url()?>js/JQuery.js"></script>
      <script src="<?php echo base_url()?>js/bootstrap.js"></script>
      <script src="<?php echo base_url()?>js/jquery-mask.js"></script>
      <script src="<?php echo base_url()?>js/popper.min.js"></script>
      <script src="<?php echo base_url()?>js/funciones.js"></script>
      <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
      </script>
      <style >
        body{
          min-height: 75rem;
          padding-top: 4.5rem;
        }
      </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="Inicio">
        <div class="logo">

        </div></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           <?php $this->ci =& get_instance();
           if ($this->ci->uri->segment(1)== 'Inicio') {?>
            <li class="nav-item active">
              <a class="nav-link" href="Inicio" >Servicios</a>
            </li>
          <?php }else{ ?>
            <li class="nav-item">
              <a class="nav-link" href="Inicio" >Servicios</a>
            </li>
          <?php }
          if($this->ci->uri->segment(1)== 'ModuloU') {
          ?>
          <li class="nav-item active">
            <a class="nav-link" href="ModuloU">Usuarios</a>
          </li>
          <?php
        }else {
          ?><li class="nav-item">
            <a class="nav-link" href="ModuloU">Usuarios</a>
          </li>
          <?php
        }
        if ($this->session->userdata('perfil')=='Administrador' and $this->ci->uri->segment(1)== 'Levantamiento_servicio') {

           ?>
            <li class="nav-item active">
              <a class="nav-link" href="Levantamiento_servicio">Levantar Servicio</a>
            </li>
          <?php }elseif($this->session->userdata('perfil')=='Administrador'){ ?>
            <li class="nav-item">
              <a class="nav-link" href="Levantamiento_servicio">Levantar Servicio</a>
            </li>
          <?php }
          if ($this->ci->uri->segment(1)=='Atencion_servicio') { ?>
            <li class="nav-item active">
              <a class="nav-link" href="Atencion_servicio" data-toggle="modal" data-target="#exampleModalCenter">Atención del servicio</a>
            </li>
          <?php } else{  ?>
            <li class="nav-item ">
              <a class="nav-link" href="Atencion_servicio" data-toggle="modal" data-target="#exampleModalCenter">Atención del servicio</a>
            </li>
          <?php } ?>

            <li class="nav-item">
              <a class="nav-link" href="Logout">Cerrar Sesión</a>
            </li>
          </ul>
        </div>
      </nav>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Código de Activación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="Atencion_servicio" method="POST">
            <div class="modal-body">
                <input type="text" class="form-control codigo" placeholder="Introduce el código de activación" name="activacion" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

          <h2>Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>
              </tbody>
            </table>
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

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
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
  </body>
</html>
