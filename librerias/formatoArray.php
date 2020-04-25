<?php
function formatoArray($array)
{
  $municipioArray = array();
  $localidadArray = array();
  $escuelaArray = array();
  $becarioArray = array();

  for($i=0; $i < count($array); $i++) {
    $clave_municipio = $array[$i]["claveMunicipio"];
    $clave_localidad = $array[$i]["claveLocalidad"];
    $clave_escuela = $array[$i]["claveEscuela"];
    $clave_becario = $array[$i]["claveBecario"];

    array_push($municipioArray, $clave_municipio);
    array_push($localidadArray, $clave_localidad);
    array_push($escuelaArray, $clave_escuela);
    array_push($becarioArray, $clave_becario);
  }
  $estado_sin_redundancia = array_unique($municipioArray);
  $region_sin_redundancia = array_unique($localidadArray);
  $municipio_sin_redundancia = array_unique($escuelaArray);
  $becario_sin_redundancia = array_unique($becarioArray);

//  $tam = count($region_sin_redundancia);
     print_r($municipio_sin_redundancia);
//echo $tam;

}
 ?>
