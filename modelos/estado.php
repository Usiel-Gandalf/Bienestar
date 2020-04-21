<?php
require_once("conexion.php");
require_once("../librerias/comprobarEntidades.php");
require_once("../librerias/registrarEntidades.php");

  function procesamientoEstadoInfo($nombreArchivo, $posicionClaveEdo, $posicionNombreEdo)
  {
    $fp = fopen($nombreArchivo, "r");
    $rows = 0;
    $estadosNoRegistrados = 0;
    $estadosRegistrados = 0;

    while ($datos = fgetcsv($fp, 0, ";")) {
      $rows ++;

      if ($rows>1) {
        $resultadoComprobarEstado = comprobarEstado($datos[$posicionClaveEdo]);

        if (mysqli_num_rows($resultadoComprobarEstado)>0) {
            $estadosNoRegistrados ++;
        }else {
          $resultadoRegistrarEstado = registrarEstado($datos[$posicionClaveEdo], $datos[$posicionNombreEdo]);
          $estadosRegistrados ++;
        }
      }
    }

    $resultadosRegistros = "Estados no agregados por duplicidad: ".$estadosNoRegistrados."<br>Estados agregados: ".$estadosRegistrados;
    return $resultadosRegistros;
  }

 ?>
