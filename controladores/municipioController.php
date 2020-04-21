<?php
require_once("../modelos/municipio.php");
function procesamientoMunicipioController($nombreArchivo)
{
  $fp = fopen($nombreArchivo, "r");
  $fila = 0;
  $posicionClaveMun;
  $posicionNombreMun;
  $posicionClaveReg;

  while ($datos = fgetcsv($fp, 0, ";")) {
    $numeroColumnas = count($datos);

    for ($i=0; $i <$numeroColumnas ; $i++) {
      if ($datos[$i] == "CVE_MUN") {
      $posicionClaveMun = $i;
      }

      if ($datos[$i] == "NOM_MUN") {
      $posicionNombreMun = $i;
      }

      if ($datos[$i] == "ID_REGION") {
      $posicionClaveReg = $i;
      }
    }
  }

  $municipioInfo = procesamientoMunicipioInfo($nombreArchivo, $posicionClaveMun, $posicionNombreMun, $posicionClaveReg);
  echo $municipioInfo;

}
 ?>
