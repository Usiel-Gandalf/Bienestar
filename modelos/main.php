<?php
require_once("../librerias/main.php");
require_once("../librerias/registrarEntidades.php");
require_once 'conexion.php';

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
      echo $fecha;
      echo "<br>";


    }

    //echo $registrarFecha;
  }

 ?>
