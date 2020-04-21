<?php
require_once("conexion.php");
require_once("../librerias/comprobarEntidades.php");
require_once("../librerias/registrarBecario.php");

  function procesamientoBecarioInfo($nombreArchivo, $posicionClaveBecario, $posicionNombreBecario,
  $posicionApellidoPBecario, $posicionApellidoMBecario, $posicionGeneroBecario, $posicionFechaNaBecario,
  $posicionCurpBecario, $posicionClaveEsc)

  {
    $fp = fopen($nombreArchivo, "r");
    $rows = 0;
    $becariosNoRegistrados = 0;
    $becariosRegistrados = 0;

    while ($datos = fgetcsv($fp, 0, ";")) {
      $rows ++;

      if ($rows>1) {
        $resultadoComprobarBecario = comprobarBecario($datos[$posicionClaveBecario]);

        if (mysqli_num_rows($resultadoComprobarBecario)>0) {
            $becariosNoRegistrados ++;
        }else {
          $resultadoregistrarBecario = registrarBecario($datos[$posicionClaveBecario], $datos[$posicionNombreBecario],
          $datos[$posicionApellidoPBecario], $datos[$posicionApellidoMBecario], $datos[$posicionGeneroBecario],
          $datos[$posicionFechaNaBecario], $datos[$posicionCurpBecario], $datos[$posicionClaveEsc]);

          $becariosRegistrados ++;
        }
      }
    }

    $resultadosRegistros = "<br>Becarios no registrados: ".$becariosNoRegistrados."<br>Nuevos becarios registrados: ".$becariosRegistrados;
    return $resultadosRegistros;
  }

 ?>
