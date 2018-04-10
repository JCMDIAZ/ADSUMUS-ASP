<?php
//Crea las opciones del select  dependiendo el campo que se le pase de parametro
function Select($campo){
    foreach($campo as $tipo){
        if($tipo->Campo === 'Blanco'){?>
        <option value="<?php echo $tipo->Valor ?>" disabled selected><?php echo $tipo->Descripcion ?></option>
<?php }else{ ?>
        <option value="<?php echo $tipo->Valor ?>"><?php echo $tipo->Descripcion ?></option>
<?php
        }
    }
}
// Select para un campo con un valor ya seleccionado
function Select2($campo,$selected){
    foreach($campo as $tipo){
        if($tipo->Descripcion == $selected){ ?>
        <option value="<?php echo $tipo->Valor ?>" selected><?php echo $tipo->Descripcion ?></option>
            <?php
        }else if($tipo->Campo == 'Blanco' and $tipo->Descripcion != $selected){?>
        <option value="<?php echo $tipo->Valor ?>" disabled selected><?php echo $tipo->Descripcion ?></option>
<?php  }else{ ?>
        <option value="<?php echo $tipo->Valor ?>"><?php echo $tipo->Descripcion ?></option>
<?php
        }
    }
}

//Crea las opciones del select de los perfiles ejecutivo
function SelectUsuarios($campo,$selected){
?>
        <option value="" disabled selected>Selecciona una Opción</option>
<?php
    foreach($campo as $tipo){
      if($tipo->Usuario == $selected){ ?>
        <option value="<?php echo $tipo->id_usuario ?>" selected><?php echo $tipo->Usuario ?></option>
<?php }else { ?>
    <option value="<?php echo $tipo->id_usuario ?>"><?php echo $tipo->Usuario ?></option>
    <?php }
}
}

function Select10($nombre,$select,$selected,$campo){
    foreach ($select as $tipo) {
        if($tipo->Campo == $nombre and $tipo->Descripcion == $selected->$campo){
             echo '<option value="'.$tipo->Descripcion.'" selected ="selected">'.$tipo->Descripcion.'</option>';
        }else if ($tipo->Campo == $nombre) {
              echo '<option value="'.$tipo->Descripcion.'">'.$tipo->Descripcion.'</option>';
         }
    }
}

// Funcion crea codigos aleatorios
function NumeroAleatorio(){
    $valoresRandom = array();

    //Se crea el primer número aleatorio
    $valorRandomPrimero = mt_rand(1000,9999);
    //Se inserta
    array_push($valoresRandom, $valorRandomPrimero);

    //Se crea variable para iterar
    $x = 1;

    //El if describe el paso 6. y else describe el paso 7
    while ($x <= 3) {
        $siguienteValorRadom = mt_rand(1000,9999);
        if(in_array($siguienteValorRadom, $valoresRandom)){
            continue;
        }else{
            array_push($valoresRandom, $siguienteValorRadom);
            $x++;
        }
    }
    return end($valoresRandom);
}
?>
