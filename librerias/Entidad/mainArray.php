<?php
//include_once 'municipioArray.php';
include_once 'arrayUnico.php';
function formatoArray($becarios)
{
  $regionArray = array();
  $municipioArray = array();
  $numeroMunicipio = array();
  $localidadArray = array();
  $escuelaArray = array();
  $becarioArray = array();
  $bancoArray = array();
  $array_final = array();

  $b = 0;
  for($i=0; $i < count($becarios); $i++) {
    $clave_region = $becarios[$i]["claveRegion"];
    $clave_municipio = $becarios[$i]["claveMunicipio"];
    $nombre_municipio = $becarios[$i]["nombreMunicipio"];
    $clave_localidad = $becarios[$i]["claveLocalidad"];
    $nombre_localidad = $becarios[$i]["nombreLocalidad"];
    $clave_escuela = $becarios[$i]["claveEscuela"];
    $nombre_escuela = $becarios[$i]["nombreEscuela"];
    $clave_becario = $becarios[$i]["claveBecario"];
    $nombre_becario = $becarios[$i]["nombreBecario"];
    $apellido_paterno = $becarios[$i]["apellidoPaterno"];
    $apellido_materno = $becarios[$i]["apellidoMaterno"];
    $genero_beacario = $becarios[$i]["generoBecario"];
    $fecha_nacimiento = $becarios[$i]["fechaNacimiento"];
    $curp_becario = $becarios[$i]["curpBecario"];
    $clave_banco = $becarios[$i]["claveBanco"];
    $nombre_banco = $becarios[$i]["nombreBanco"];
    $municipio_array = [
      $clave_municipio,
      $nombre_municipio,
      $clave_region
    ];
    $localidad_array = [
      $clave_localidad,
      $nombre_localidad,
      $clave_municipio
    ];
    $escuela_array = [
      $clave_escuela,
      $nombre_escuela,
      $clave_localidad
    ];
    $becario_array = [
      $clave_becario,
      $nombre_becario,
      $apellido_paterno,
      $apellido_materno,
      $genero_beacario,
      $fecha_nacimiento,
      $curp_becario,
      $clave_localidad,
      $clave_banco
    ];
    $banco_array = [
      $clave_banco,
      $nombre_banco
    ];

$b++;
    //array_push($regionArray, $region_array);
    array_push($municipioArray, $municipio_array);
    array_push($localidadArray, $localidad_array);
    array_push($escuelaArray, $escuela_array);
    array_push($becarioArray, $becario_array);
    array_push($bancoArray, $banco_array);
  }

  $municipio_sin_redundancia = array_values($municipioArray);
  $municipio_array_final = super_unique($municipio_sin_redundancia);
  $municipio_array_final = array_values($municipio_array_final);

  $localidad_sin_redundancia = array_values($localidadArray);
  $localidad_array_final = super_unique($localidad_sin_redundancia);
  $localidad_array_final = array_values($localidad_array_final);

  $escuela_sin_redundancia = array_values($escuelaArray);
  $escuela_array_final = super_unique($escuela_sin_redundancia);
  $escuela_array_final  = array_values($escuela_array_final);

  $becario_array_final = array_values($becarioArray);

  $banco_sin_redundancia = array_values($bancoArray);
  $banco_array_final = super_unique($banco_sin_redundancia);
  $banco_array_final = array_values($banco_array_final);

  $array_final =[
    $municipio_array_final,
    $localidad_array_final,
    $escuela_array_final,
    $becario_array_final,
    $banco_array_final
  ];

  for ($i=0; $i <count($array_final) ; $i++) {
      for ($f=0; $f <count($array_final[$i]) ; $f++) {
        for ($g=0; $g <count($array_final[$i][$f]) ; $g++) {
          echo $array_final[$i][$f][$g];
          echo "<br>";
        }
        echo "<br>";
      }
      echo "<br><br>";
  }

}
 ?>
