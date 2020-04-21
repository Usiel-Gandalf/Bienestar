<?php
require_once("../librerias/main.php");
require_once("../librerias/registrarEntidades.php");

  function procesamientoMainInfo($becarios)
  {
    $municipio = 0;
    $municipioExistente = 0;
    $localidad = 0;
    $localidadExistente = 0;
    $escuela = 0;
    $escuelaExistente = 0;
    $becarioExistente = 0;
    $becario = 0;
    for($i=0; $i < count($becarios); $i++) {
      $fecha = $becarios[$i]["fechaNacimiento"];

      $fecha_formato = date($fecha);
      $fecha_formato = strtotime($fecha_formato);
    $anio = date('Y', $fecha_formato);
    echo $anio;
    //  echo date("Y", strtotime($fecha_formato));
      echo "<br>";
      //echo $fecha_formato."<br>";
    }

  }

 ?>
