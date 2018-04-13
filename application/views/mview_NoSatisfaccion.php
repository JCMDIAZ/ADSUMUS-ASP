<!DOCTYPE html>
<html>
<head>
<title>Adsumus</title>
<link rel="icon" href="/img/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.css ">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="<?php echo base_url()?>css/fontawesome-all.css" rel="stylesheet">
<script src="<?php echo base_url()?>js/JQuery.js"></script>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    background-color: #f1f1f1;
  }

  #regForm {
    padding: 0px 80px 20px 80px;
  }

  h1 {
    text-align: center;
  }

  input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }

  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    background-color: #ffdddd;
  }

  /* Hide all steps by default: */
  .tab {
    display: none;
  }

  button.btn {
    background-color: #F15A22;
    color: #ffffff;
    border: none;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.8;
  }

  #prevBtn {
    background-color: #bbbbbb;
  }

  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }
  .step.active {
    opacity: 1;
  }

  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #4CAF50;
  }
  h4{
    text-align: center;
    padding-bottom: 10px;
  }
  p{
    text-align: center;
  }
  div.wizard{
    background-color: #ffffff;
    margin: 2.5em auto;
    font-family: Raleway;
    width: 70%;
    min-width: 300px;
    border-radius: 25px;
  }
@media only screen and (max-height:400px){
  div.wizard{
    margin: 1em auto;
  }
}
  div.titulo{
    padding-top: 10px;
    background-color: #2B2B28;
    color: #ffffff;
    border-radius: 25px 25px 0 0;
  }
  .logo{
    float: left;
    background-image: url("../img/adsumus-logo.png");
    background-repeat: no-repeat;
    width: 100%;
    height: 55px;
    padding-left: 30px;
  }
  .container{
    padding-bottom: 15px;
  }

  .clearfix{
    content: '';
    clear: both;
    display: block;
  }
  div.custom-control{
    margin-bottom: 5px;
  }
  div.custom-control:last-child{
    margin-bottom: 0px;
  }
  @media only screen and (max-width:600px){
    .logo{
      background-position: center;
    }
    h4{
      font-size: 1em;
    }
  }
</style>
</head>
<body>
<input type="hidden" name="token" value="<?php echo $token; ?>" id="token">
  <div class="wizard">
    <div class="titulo clearfix">
      <div class="logo">
      </div>
      <h4 class="modulo">No satisfacción del servicio</h4>
    </div>
    <form id="noSatis" action="" method="post">
        <div class="container">
          <div class="row">
            <div class="col-md-6 offset-md-6 mx-auto">
              <label for="folio">Folio del servicio</label>
              <input type="text" class="form-control" name="folio" value="<?php echo $folio; ?>" disabled id="folio">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 offset-md-6 mx-auto">
              <label for="detalle">Detalle</label>
              <textarea class="form-control" name="detalle" id="detalle" required></textarea>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 offset-md-6 mx-auto">
              <label for="fecha">Fecha de Nueva Cita</label>
              <input type="date"class="form-control" name="fecha" id="fecha" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 offset-md-6 mx-auto">
              <label for="nuevoFolio">Nuevo Folio</label>
              <input type="text"class="form-control" name="nuevoFolio" id="nuevoFolio" disabled>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 offset-md-6 mx-auto">
              <button type="submit" class="btn" name="submit" id="submit">Aceptar</button>
            </div>
          </div>
        </div>
    </form>
  </div>
<script type="text/javascript">
  $(document).ready(function() {
    $("#noSatis").submit(function(e){
      e.preventDefault();
      MandarDatos("<?php echo base_url() ?>"+"No_satisfaccion_servicio/",this);
    })
  });
  function MandarDatos(url,datos){
    var id = $("#token").val();
    $.ajax({
      url: url+id,
      type: 'post',
      data: new FormData(datos),
      processData: false,
      contentType: false
    }).done(function(data){
      console.log(data);
      $("input[name=nuevoFolio]").val(data);
      $("input[name=nuevoFolio]").attr('class','form-control border border-success');
      $("button").prop('disabled',true);
      $("textarea").prop('disabled',true);
      $("input").prop('disabled',true);
      alert('Se reabrio el servicio con un nuevo numero de folio. \nFolio: #'+data);
    })
  }
</script>
</body>
</html>
