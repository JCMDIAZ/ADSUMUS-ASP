<!DOCTYPE html>
<html>
<title>Adsumus</title>
<link rel="icon" href="/img/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.css ">
<link href="<?php echo base_url()?>css/FuenteGoogle.css" rel="stylesheet">
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

button {
  background-color: #F15A22;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
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
}
p{
  text-align: center;
}
div.wizard{
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  width: 70%;
  min-width: 300px;
  border-radius: 25px;
}
div.titulo{
  padding-top: 10px;
  background-color: #2B2B28;
  color: #ffffff;
  border-radius: 25px 25px 0 0;
}
.logo{
  float: left;
  background-image: url("../../img/adsumus-logo.png");
  background-repeat: no-repeat;
  width: 100%;
  height: 55px;
  padding-left: 30px;
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
div.contenedor{
  padding: 30px;
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
<body>
  <div class="wizard">
    <div class="titulo clearfix">
      <div class="logo">
      </div>
      <?php if(isset($titulo)){ ?>
        <h4><?php echo $titulo; ?></h4>
      <?php }else{ ?>
        <h4>Evaluación del servicio prestado</h4>
      <?php } ?>
      <hr>
    </div>
    <div class="contenedor">
      <?php if(isset($mensaje)){ ?>
        <p><i class="fas fa-exclamation-triangle fa-9x"></i></p>
        <p><?php echo $mensaje; ?></p>
      <?php }else{ ?>
        <p><i class="far fa-check-circle fa-9x"></i></p>
        <p>Felicidades, has terminado la evaluación</p>
      <?php } ?>
    </div>
</div>
</body>
</html>
