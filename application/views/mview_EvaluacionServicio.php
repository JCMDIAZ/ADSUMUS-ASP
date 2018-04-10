<!DOCTYPE html>
<html>
<title>Adsumus</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.css ">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
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
  background-color: #4CAF50;
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
</style>
<body>

<form id="regForm" action="" method="post">
  <h1 class="display-5">ADSUMUS</h1>
  <h4>Evaluación del servicio prestado</h4>
  <hr>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <h5>Como calificas el servicio prestado?</h5>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion" value="5" class="custom-control-input" id="excelente" required>
        <label class="custom-control-label" for="excelente">Excelente</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion" value="4" class="custom-control-input" id="muybueno" required>
        <label class="custom-control-label" for="muybueno">Muy Bueno</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion" value="3" class="custom-control-input" id="bueno" required>
        <label class="custom-control-label" for="bueno">Bueno</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion" value="2" class="custom-control-input" id="regular" required>
        <label class="custom-control-label" for="regular">Regular</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion" value="1" class="custom-control-input" id="deficiente" required>
        <label class="custom-control-label" for="deficiente">Deficiente</label>
      </div>
    </div>
    <div class="tab">
      <h5>Como calificas el servicio prestado por el ejecutivo?</h5>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion2" value="5" class="custom-control-input" id="excelente2" required>
      <label class="custom-control-label" for="excelente2">Excelente</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion2" value="4" class="custom-control-input" id="muybueno2" required>
      <label class="custom-control-label" for="muybueno2">Muy Bueno</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion2" value="3" class="custom-control-input" id="bueno2" required>
      <label class="custom-control-label" for="bueno2">Bueno</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion2" value="2" class="custom-control-input" id="regular2" required>
      <label class="custom-control-label" for="regular2">Regular</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion2" value="1" class="custom-control-input" id="deficiente2" required>
      <label class="custom-control-label" for="deficiente2">Deficiente</label>
    </div>
  </div>
  <div class="tab">
    <h5>Como calificas la limpieza del servicio?</h5>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion3" value="5" class="custom-control-input" id="excelente3" required>
        <label class="custom-control-label" for="excelente3">Excelente</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion3" value="4" class="custom-control-input" id="muybueno3" required>
        <label class="custom-control-label" for="muybueno3">Muy Bueno</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion3" value="3" class="custom-control-input" id="bueno3" required>
        <label class="custom-control-label" for="bueno3">Bueno</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion3" value="2" class="custom-control-input" id="regular3" required>
        <label class="custom-control-label" for="regular3">Regular</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" name="evaluacion3" value="1" class="custom-control-input" id="deficiente3" required>
        <label class="custom-control-label" for="deficiente3">Deficiente</label>
      </div>
    </div>
    <div class="tab">
    <h5>Como calificas el tiempo que se realizo el servicio?</h5>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion4" value="5" class="custom-control-input" id="excelente4" required>
      <label class="custom-control-label" for="excelente4">Excelente</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion4" value="4" class="custom-control-input" id="muybueno4" required>
      <label class="custom-control-label" for="muybueno4">Muy Bueno</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion4" value="3" class="custom-control-input" id="bueno4" required>
      <label class="custom-control-label" for="bueno4">Bueno</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion4" value="2" class="custom-control-input" id="regular4" required>
      <label class="custom-control-label" for="regular4">Regular</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" name="evaluacion4" value="1" class="custom-control-input" id="deficiente4" required>
      <label class="custom-control-label" for="deficiente4">Deficiente</label>
    </div>
  </div>
  <div class="tab">Pregunta 4:

  </div>
  <div class="tab">Final:
    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
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
    <span class="step"></span>
  </div>
</form>

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
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
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
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
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
</script>

</body>
</html>
