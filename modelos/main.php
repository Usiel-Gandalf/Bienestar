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
      $nombre = $becarios[$i]["nombreBecario"];
      $fecha_sin_formato = str_replace("/", "", $fecha);
    //$uno = "2001-12-3";
     $anio = substr($fecha_sin_formato, -4);
     $mes = substr($fecha_sin_formato, -6, 2);
     $dia = substr($fecha_sin_formato, -8, 2);
     $fecha_con_formato= $anio."-".$mes."-".$dia;
    // $fecha_formateada = date($fecha_con_formato);
     //echo $fecha_formateada;
     //$fecha_con_formato = new Date($fecha_con_formato);
     //$fecha1 = date("d-m-Y", strtotime($uno));
     //$fecha1 = date_format($fecha_con_formato);
     //echo gettype($fecha1);
     //$fecha2 = (date)$fecha1;
     echo $fecha_con_formato;
      //fecha($fecha_con_formato);
      global $conexion;
      $registrar = "INSERT INTO fecha(fecha) VALUES('$nombre')";
      $comprobarConsulta = mysqli_query($conexion, $registrar);
      echo "<br>";


    }

    //echo $registrarFecha;
  }

 ?>
