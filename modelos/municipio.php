<?php
require_once("conexion.php");
require_once("../librerias/comprobarEntidades.php");
require_once("../librerias/registrarEntidades.php");

  function procesamientoMunicipioInfo($nombreArchivo, $posicionClaveMun, $posicionNombreMun, $posicionClaveReg)
  {
    $fp = fopen($nombreArchivo, "r");
    $rows = 0;
    $municipiosNoRegistrados = 0;
    $municipiosRegistrados = 0;

    while ($datos = fgetcsv($fp, 0, ";")) {
      $rows ++;

      if ($rows>1) {
        $resultadoComprobarMunicipio = comprobarMunicipio($datos[$posicionClaveMun]);

        if (mysqli_num_rows($resultadoComprobarMunicipio)>0) {
            $municipiosNoRegistrados ++;
        }else {
          $resultadoRegistrarMunicipio = registrarMunicipio($datos[$posicionClaveMun], $datos[$posicionNombreMun], $datos[$posicionClaveReg]);
          $municipiosRegistrados ++;
        }
      }
    }

    $resultadosRegistros = "<br>Municipios no agregadas por duplicidad: ".$municipiosNoRegistrados."<br>Nuevos municipios agregados: ".$municipiosRegistrados;
    return $resultadosRegistros;
  }

 ?>
