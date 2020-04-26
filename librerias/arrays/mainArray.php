<?php
//include_once 'municipioArray.php';
function formatoArray($becarios)
{
  $regionArray = array();
  $municipioArray = array();
  $numeroMunicipio = array();
  $localidadArray = array();
  $escuelaArray = array();
  $becarioArray = array();
  $b = 0;
  for($i=0; $i < count($becarios); $i++) {
    $clave_region = $becarios[$i]["claveRegion"];
    $clave_municipio = $becarios[$i]["claveMunicipio"];
    $clave_localidad = $becarios[$i]["claveLocalidad"];
    $clave_escuela = $becarios[$i]["claveEscuela"];
    $clave_becario = $becarios[$i]["claveBecario"];

    array_push($regionArray, $clave_region);
    array_push($municipioArray, $clave_municipio);
    array_push($localidadArray, $clave_localidad);
    array_push($escuelaArray, $clave_escuela);
    array_push($becarioArray, $clave_becario);
  }
  $region_sin_redundancia = array_unique($regionArray);
  $municipio_sin_redundancia = array_unique($municipioArray);
  $localidad_sin_redundancia = array_unique($localidadArray);
  $escuela_sin_redundancia = array_unique($escuelaArray);
  $becario_sin_redundancia = array_unique($becarioArray);

  $municipio_sin_redundancia = json_encode(array_values($municipio_sin_redundancia));
  print_r($municipio_sin_redundancia);
  //echo count($becario_sin_redundancia);
  //$array_municipio_final = arrayMunicipio($municipio_sin_redundancia, $becarios);
  //print_r($array_municipio_final);

}
 ?>
