<!DOCTYPE html>
<html>
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
  background-image: url("../img/adsumus-logo.png");
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
<input type="hidden" name="token" value="<?php echo $token; ?>" id="token">
  <div class="wizard">
    <div class="titulo clearfix">
      <div class="logo">
      </div>
      <h4 class="">Evaluación del servicio prestado</h4>
      <hr>
    </div>
  <form id="regForm" action="" method="post">
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <h5>Como calificas el servicio prestado?</h5>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion" value="5" class="custom-control-input" id="excelente" onchange="this.className='custom-control-input '" required>
        <label class="custom-control-label" for="excelente">Excelente</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion" value="4" class="custom-control-input" id="muybueno" onchange="this.className='custom-control-input '" required>
        <label class="custom-control-label" for="muybueno">Muy Bueno</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion" value="3" class="custom-control-input" id="bueno" onchange="this.className='custom-control-input '" required>
        <label class="custom-control-label" for="bueno">Bueno</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion" value="2" class="custom-control-input" id="regular" onchange="this.className='custom-control-input '" required>
        <label class="custom-control-label" for="regular">Regular</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion" value="1" class="custom-control-input" id="deficiente" onchange="this.className='custom-control-input '" required>
        <label class="custom-control-label" for="deficiente">Deficiente</label>
      </div>
    </div>
  <div class="tab">
      <h5>Como calificas el servicio prestado por el ejecutivo?</h5>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion2" value="5" class="custom-control-input" id="excelente2" onchange="this.className='custom-control-input '" required>
      <label class="custom-control-label" for="excelente2">Excelente</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion2" value="4" class="custom-control-input" id="muybueno2" onchange="this.className='custom-control-input '" required>
      <label class="custom-control-label" for="muybueno2">Muy Bueno</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion2" value="3" class="custom-control-input" id="bueno2" onchange="this.className='custom-control-input '" required>
      <label class="custom-control-label" for="bueno2">Bueno</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion2" value="2" class="custom-control-input" id="regular2" onchange="this.className='custom-control-input '" required>
      <label class="custom-control-label" for="regular2">Regular</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion2" value="1" class="custom-control-input" id="deficiente2" onchange="this.className='custom-control-input '" required>
      <label class="custom-control-label" for="deficiente2">Deficiente</label>
    </div>
  </div>
  <div class="tab">
    <h5>Como calificas la limpieza del servicio?</h5>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion3" value="5" class="custom-control-input" id="excelente3" onchange="this.className='custom-control-input '" required>
        <label class="custom-control-label" for="excelente3">Excelente</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion3" value="4" class="custom-control-input" id="muybueno3" onchange="this.className='custom-control-input '" required>
        <label class="custom-control-label" for="muybueno3">Muy Bueno</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion3" value="3" class="custom-control-input" id="bueno3" onchange="this.className='custom-control-input '" required>
        <label class="custom-control-label" for="bueno3">Bueno</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion3" value="2" class="custom-control-input" id="regular3" onchange="this.className='custom-control-input '" required>
        <label class="custom-control-label" for="regular3">Regular</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion3" value="1" class="custom-control-input" id="deficiente3" onchange="this.className='custom-control-input '" required>
        <label class="custom-control-label" for="deficiente3">Deficiente</label>
      </div>
    </div>
  <div class="tab">
      <h5>Como calificas el tiempo que se realizo el servicio?</h5>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion4" value="5" class="custom-control-input" onchange="this.className='custom-control-input '" id="excelente4" required>
        <label class="custom-control-label" for="excelente4">Excelente</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion4" value="4" class="custom-control-input" onchange="this.className='custom-control-input '" id="muybueno4" required>
        <label class="custom-control-label" for="muybueno4">Muy Bueno</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion4" value="3" class="custom-control-input" onchange="this.className='custom-control-input '" id="bueno4" required>
        <label class="custom-control-label" for="bueno4">Bueno</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion4" value="2" class="custom-control-input" onchange="this.className='custom-control-input '" id="regular4" required>
        <label class="custom-control-label" for="regular4">Regular</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion4" value="1" class="custom-control-input" onchange="this.className='custom-control-input '" id="deficiente4" required>
        <label class="custom-control-label" for="deficiente4">Deficiente</label>
      </div>
    </div>
    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
</div>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length-1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  if (n==4) {
    $("button").remove();
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= (x.length)) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = false;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].checked == true) {
      // add an "invalid" class to the field:
      y[i].className += " valid";
      // and set the current valid status to false
      valid = true;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
$(document).ready(function() {
  $("#regForm").submit(function(e){
    e.preventDefault();
    MandarDatos("Evaluacion_servicio/",this);
  })
});
function MandarDatos(url,datos){
  var id = $("#folio").val();
  $.ajax({
    url: url+id,
    type: 'post',
    data: new FormData(datos),
    processData: false,
    contentType: false
  }).done(function(data){
    debugger;
  })
}
</script>

</body>
</html>
