<?php
require_once("conexion.php");
require_once("../librerias/comprobarEntidades.php");
require_once("../librerias/registrarEntidades.php");

  function procesamientoRegionInfo($nombreArchivo, $posicionReg, $posicionClaveReg, $posicionNombreReg, $posicionClaveEdo)
  {
    $fp = fopen($nombreArchivo, "r");
    $rows = 0;
    $regionesNoRegistradas = 0;
    $regionesRegistradas = 0;

    while ($datos = fgetcsv($fp, 0, ";")) {
      $rows ++;

      if ($rows>1) {
        $resultadoComprobarRegion = comprobarRegion($datos[$posicionClaveReg]);

        if (mysqli_num_rows($resultadoComprobarRegion)>0) {
            $regionesNoRegistradas ++;
        }else {
          $resultadoRegistrarRegion = registrarRegion($datos[$posicionReg], $datos[$posicionClaveReg], $datos[$posicionNombreReg], $datos[$posicionClaveEdo]);
          $regionesRegistradas ++;
        }
      }
    }

    $resultadosRegistros = "<br>Regiones no agregadas por duplicidad: ".$regionesNoRegistradas."<br>Nuevas regiones agregadas: ".$regionesRegistradas;
    return $resultadosRegistros;
  }

 ?>
