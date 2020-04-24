<?php

function formatoArray($array)
{
  $CE = null; //clave estado de comparacion
  $CR = null; //clave region de comparacion

  $estado =[];
  $region1 = array();

  for($i=0; $i < count($array); $i++) {
    $clave_estado = $array[$i]["claveEstado"];
    $clave_region = $array[$i]["claveRegion"];
    if ($clave_estado != $CE) {
      $estadoClave = ["clave_estado"=>$clave_estado];
      array_push ($estado , $estadoClave);
      $CE=$clave_estado;
    }
    if ($clave_region != $CR){
      $clave_region;
      array_push ($region1, $clave_region);
      $CR = $clave_region;
      //echo $clave_region."<br>";
    }

  }
   $a = array_unique($region1);
foreach ($a as $key => $value) {
  echo $value;
}

}
 ?>
