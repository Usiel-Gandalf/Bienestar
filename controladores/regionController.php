<?php
require_once("../modelos/region.php");
function procesamientoRegionController($nombreArchivo)
{
  $fp = fopen($nombreArchivo, "r");
  $fila = 0;
  $posicionReg;
  $posicionClaveReg;
  $posicionNombreReg;
  $posicionClaveEdo;

  while ($datos = fgetcsv($fp, 0, ";")) {
    $numeroColumnas = count($datos);

    for ($i=0; $i <$numeroColumnas ; $i++) {
      if ($datos[$i] == "REGION") {
      $posicionReg = $i;
      }

      if ($datos[$i] == "ID_REGION") {
      $posicionClaveReg = $i;
      }

      if ($datos[$i] == "NOM_REG") {
      $posicionNombreReg = $i;
      }

      if ($datos[$i] == "CVE_EDO") {
        $posicionClaveEdo = $i;
      }
    }
  }
  $regionInfo = procesamientoRegionInfo($nombreArchivo, $posicionReg, $posicionClaveReg, $posicionNombreReg, $posicionClaveEdo);
  echo $regionInfo;
}
 ?>
